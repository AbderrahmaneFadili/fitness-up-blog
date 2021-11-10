<?php

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
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/login', function () {
    return view('auth.login');
});
