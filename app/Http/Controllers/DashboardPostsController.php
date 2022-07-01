<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *27:42
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataPosts = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        //jika image nya ada
        if($request->file('image')){
            $dataPosts['image'] = Storage::putFile('posts-images', $request->file('image'));
        }

        $dataPosts['user_id'] = auth()->user()->id;
        // limit string menjadi 200 kata
        $dataPosts['excerpt'] = Str::of(strip_tags($request->body))->limit(200);

        Post::create($dataPosts);

        return redirect('/dashboard/posts')->with('success', 'berhasil menambahkan postingan baru');
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if($post->author->id != auth()->user()->id){
            abort(403);
        }

        return view('dashboard.posts.read', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if($post->author->id != auth()->user()->id){
            abort(403);
        }


        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        // handle untuk slug yang baru
        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $dataPost = $request->validate($rules);

        if($request->file('image')){
            // mendelete image yg sudah tidak terpakai
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $dataPost['image'] = Storage::putFile('posts-images', $request->file('image'));
        }

        $dataPost['user_id'] = auth()->user()->id;
        // limit string menjadi 200 kata
        $dataPost['excerpt'] = Str::of(strip_tags($request->body))->limit(200);

        Post::where('id', $post->id)
                ->update($dataPost);

        return redirect('/dashboard/posts')->with('success', 'berhasil update postingan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // delete image di folder storage
        if($post->image){
            Storage::delete($post->image);
        }
        
        Post::destroy($post->id);

        return redirect('dashboard/posts')->with('success', 'berhasil delete postingan');
    }

    public function checkSlug(Request $request) {

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }   
}
