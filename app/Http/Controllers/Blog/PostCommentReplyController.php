<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\PostComment;
use App\Models\PostCommentReply;
use Illuminate\Http\Request;

class PostCommentReplyController extends Controller
{
    //
    public function store(Request $request, PostComment $postComment)
    {
        $this->validate($request, [
            'reply' => 'required|max:255',
        ]);


        $postComment->replies()->create([
            'user_id' => $request->user()->id,
            'body' => $request->reply,
        ]);

        return back();
    }

    public function destroy(PostCommentReply $postCommentReply)
    {
        $postCommentReply->delete();
        return back();
    }
}
