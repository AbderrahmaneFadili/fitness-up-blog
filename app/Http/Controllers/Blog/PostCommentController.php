<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{

    public function store(Request $request, Post $post)
    {
        //validate comment
        $this->validate($request, [
            'comment' => 'required|max:300',
        ]);
        //add comment
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $request->comment,
        ]);


        return back();
    }
}
