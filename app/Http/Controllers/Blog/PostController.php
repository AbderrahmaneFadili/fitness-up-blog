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

    public function create()
    {
        //get all categories for select options
        $categories = Category::all();


        $data = [
            'categories' => $categories
        ];

        return view('blog.add', $data);
    }

    public function store(Request $request)
    {

        //validate input
        $this->validate($request, [
            'image_path' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required|max:255',
            'body' => 'required|max:255',
            'category' => 'required',
        ]);

        //store post
        //get the image_path
        $image_path = $request->file('image_path')->store('public/images/image-uploads');

        $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image_path' => $image_path,
            'category_id' => $request->category
        ]);


        return back()->with('status', 'Post Created !');
    }
}
