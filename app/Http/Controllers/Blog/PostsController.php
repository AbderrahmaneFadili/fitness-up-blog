<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index()
    {
        $data = [
            'posts' => [
                [
                    'id' => 1,
                    'title' => 'This is the title',
                    'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis nobis sint saepe provident
                            reprehenderit sunt adipisci. Eu....',
                    'image' => 'https://images.pexels.com/photos/4056723/pexels-photo-4056723.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500',
                ],
                [
                    'id' => 2,
                    'title' => 'This is the title',
                    'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis nobis sint saepe provident
                            reprehenderit sunt adipisci. Eu....',
                    'image' => 'https://images.pexels.com/photos/4056723/pexels-photo-4056723.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500',
                ],
                [
                    'id' => 3,
                    'title' => 'This is the title',
                    'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis nobis sint saepe provident
                            reprehenderit sunt adipisci. Eu....',
                    'image' => 'https://images.pexels.com/photos/4056723/pexels-photo-4056723.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500',
                ],
            ]
        ];
        return view('blog.index', $data);
    }
}
