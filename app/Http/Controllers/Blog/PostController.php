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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required|max:255',
            'body' => 'required|max:255',
            'category' => 'required',
        ]);

        //store post
        //create image new name
        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();

        //move the image to the public/images folder
        $request->image->move(public_path('images'), $newImageName);



        $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image_path' => $newImageName,
            'category_id' => $request->category
        ]);


        return back()->with('status', 'Post Created !');
    }
}
