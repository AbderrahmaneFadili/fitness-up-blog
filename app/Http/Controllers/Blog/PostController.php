<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    //get post by id
    public function index(Post $post)
    {
        $post = Post::find($post->id);

        return view('blog.post', [
            'post' => $post
        ]);
    }

    //create post : add
    public function create()
    {
        //get all categories for select options
        $categories = Category::all();


        $data = [
            'categories' => $categories
        ];

        return view('blog.add', $data);
    }

    //create post : post
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

    //delete post : post
    public function destroy(Post $post)
    {

        $post->delete();
        return redirect()->route('blog');
    }

    public function edit(Post $post)
    {
        $categories = Category::where('id', '<>', $post->category_id)->get();

        $data = [
            "post" => $post,
            'categories' => $categories
        ];

        return view('blog.edit', $data);
    }

    public function update(Request $request, Post $post)
    {
        $editPost = Post::find($post->id);


        //store post
        //create image new name
        if ($request->image) {
            $newImageName = time() . '-' . $request->title  . '.' . $request->image->extension();

            //move the image to the public/images folder
            $request->image->move(public_path('images'), $newImageName);
        }


        $editPost->update([
            'image_path' => $request->image ?  $newImageName : $editPost->image_path,
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category,
        ]);

        return redirect()->route('post', [
            'post' => $editPost
        ]);
    }
}
