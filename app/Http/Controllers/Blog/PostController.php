<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index($id)
    {
        return view('blog.post');
    }

    public function create(Request $request)
    {
        //get all categories
        $categories = Category::all();

        $data = ['categories' => $categories];

        return view('blog.add', $data);
    }
}
