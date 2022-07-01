<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;


class PostController extends Controller
{
    public function index(){
        return view('posts', [
            "title" => "Post",
            // data diambil yang paling terbaru latest
            // untuk mengurangi lazyload atau pengulangan query bisa menggunakan method with
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post', [
            "title" => "single post",
            "post" => $post
        ]);
    }

    public function Cartegories(){
        return view('categories', [
            "title" => "Post Categories",
            "category" => Category::all()
        ]);
    }
}
