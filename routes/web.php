<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegsiterController;
use App\Http\Controllers\Blog\PostCommentController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\PostLikeController;
use App\Http\Controllers\Blog\PostsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

////// Blog Routes
/// Posts routes
Route::get('/blog', [PostsController::class, 'index'])->name('blog');
Route::get('/post/{post}', [PostController::class, 'index'])->name('post');
//Add post Routes
Route::get('blog/add', [PostController::class, 'create'])->name('blog.add')->middleware(['auth']);
Route::post('blog/add', [PostController::class, 'store']);

//Register Routes
Route::get('/register', [RegsiterController::class, 'index'])->name('register');
Route::post('/register', [RegsiterController::class, 'store']);

//Login Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

//logout Route
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Post likes routes
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('post.likes.store');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('post.likes.destroy');

//Comments Routes
Route::post('/comments/add/{post}', [PostCommentController::class, 'store'])->name('comments.add');


Route::get('/user/profile', function () {
    return view('user.profile');
});

Route::get('/user/edit/profile', function () {
    return view('user.edit');
});
