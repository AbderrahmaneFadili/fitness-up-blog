<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegsiterController;
use App\Http\Controllers\Blog\PostCommentController;
use App\Http\Controllers\Blog\PostCommentReplyController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\PostLikeController;
use App\Http\Controllers\Blog\PostsController;
use App\Http\Controllers\User\UserController;
use App\Models\PostCommentReply;
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
Route::delete('blog/delete/{post}', [PostController::class, 'destroy'])->name('blog.delete');
Route::get('blog/edit/{post}', [PostController::class, 'edit'])->name('blog.edit');
Route::put('blog/edit/{post}', [PostController::class, 'update'])->name('blog.edit');

//Get Posts by category
Route::post('blog/post/{category}', [PostsController::class, 'store'])->name('blog.post.category');
//Get post by title Or Body (Search)
Route::post('/blog', [PostsController::class, 'search'])->name('blog.search');

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
Route::delete('comments/delete/{postComment}', [PostCommentController::class, 'destroy'])->name('comments.delete');

//Comment Replies Routes
Route::post('/reply/add/{postComment}', [PostCommentReplyController::class, 'store'])
    ->name('reply.add');

Route::delete('/reply/delete/{postCommentReply}', [PostCommentReplyController::class, 'destroy'])
    ->name('replies.delete');

//User Routes
Route::get('/user/profile/{user}', [UserController::class, 'index'])->name('user.profile');
Route::get('/user/edit/profile/{user}', [UserController::class, 'edit'])->name('user.profile.edit');
Route::put('/user/edit/profile/{user}', [UserController::class, 'update'])->name('user.profile.edit');
Route::delete('/user/edit/profile/{user}', [UserController::class, 'destroy'])->name('user.profile.delete');
