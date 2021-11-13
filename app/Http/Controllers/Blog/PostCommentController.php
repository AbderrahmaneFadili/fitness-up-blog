<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{

    //m:post add comment
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

    //delete comment
    public function destroy(PostComment $postComment)
    {
        //delete a post comment
        $postComment->delete();

        return back();
    }
}
