<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function createComment($id, Request $request) {
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->topic_id = $id;
        $comment->score = 0;
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->back()->with('success', 'Comment created');
    }
}
