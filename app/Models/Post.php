<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory, Sluggable;
    // property fillable -> fild mana yang boleh diisi
    // protected $fillable = ['title', 'excerpt', 'body'];

    // poperty guarded -> fild yg tidak boleh diisi
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    // relasi antar tabel 
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // Jika ingin route model binding untuk selalu menggunakan kolom database selain id 
    //menggunakan method getRoutekeyName()
    
    public function getRoutekeyName () {
        return 'slug';
    }

    public function sluggable():array {
        return [
            'slug' => ['source' => 'title']
        ];
    }

    // local scope -> menentukan kumpulan query yg dapat digunakan kembali
    // orWhere -> untuk mengambungkan query

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search){
                $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        // whereHas -> mengabungkan query beserta relasi database nya
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function($query, $author){
            return $query->whereHas('author', function($query) use ($author){
                $query->where('username', $author);
            });
        });
    }
}



