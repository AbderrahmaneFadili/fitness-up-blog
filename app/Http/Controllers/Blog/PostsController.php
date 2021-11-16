<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //blog
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

    //store POST
    public function store(Request $request, Category $category)
    {
        $categories = Category::all();

        $posts =  Post::where('category_id', $category->id)->paginate(5);

        $data = [
            'posts' => $posts,
            'categories' => $categories
        ];

        return view('blog.index', $data);
    }

    //search POST
    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required:max:300',
        ]);


        $categories = Category::all();

        $posts =  Post::where(
            'title',
            'like',
            '%' . $request->search . '%'
        )->orWhere('body', 'like', '%' . $request->search . '%')->paginate(5);

        $data = [
            'posts' => $posts,
            'categories' => $categories
        ];

        return view('blog.index', $data);
    }
}
