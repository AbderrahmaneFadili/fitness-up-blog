<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegsiterController;
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

Route::get('/blog', function () {

    $data = [
        'posts' => [
            [
                'title' => 'This is the title',
                'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis nobis sint saepe provident
                            reprehenderit sunt adipisci. Eu....',
                'image' => 'https://images.pexels.com/photos/4056723/pexels-photo-4056723.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500',
            ],
            [
                'title' => 'This is the title',
                'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis nobis sint saepe provident
                            reprehenderit sunt adipisci. Eu....',
                'image' => 'https://images.pexels.com/photos/4056723/pexels-photo-4056723.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500',
            ],
            [
                'title' => 'This is the title',
                'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis nobis sint saepe provident
                            reprehenderit sunt adipisci. Eu....',
                'image' => 'https://images.pexels.com/photos/4056723/pexels-photo-4056723.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500',
            ],
        ]
    ];
    return view('blog.index', $data);
})->name('blog');

//Register Routes
Route::get('/register', [RegsiterController::class, 'index'])->name('register');
Route::post('/register', [RegsiterController::class, 'store']);

//Login Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

//logout Route
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/user/profile', function () {
    return view('user.profile');
});

Route::get('/user/edit/profile', function () {
    return view('user.edit');
});
