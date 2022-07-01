<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index']);

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "active" => "about"
    ]);
});


Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/{post:slug}', [PostController::class, 'show']);
Route::get('/category', [PostController::class, 'Cartegories']);
Route::get('/category/{category:slug}', [PostController::class, 'showPost']);
Route::get('/authors/{author:username}', [PostController::class, 'authors']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'Logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/posts/createSlug', [DashboardPostsController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostsController::class)->middleware('auth');