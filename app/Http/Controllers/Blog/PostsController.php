<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        $posts = Post::latest()->paginate(5);
        $data = [
            'posts' => $posts,
            'categories' => $categories
        ];
        return view('blog.index', $data);
    }
}
