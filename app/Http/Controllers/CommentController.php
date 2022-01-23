<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
    * Get all comments
    *
    * @return Comments
    */
    public function index()
    {
        $comments = Comment::topcomments()->latest()->get();
        return view('comments', compact('comments'));
    }

    /**
    * Create new comment
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
            'author' => 'required',
            'reply_id' => 'filled',
        ]);
        $comment_id = Comment::create($request->all())->id;
        return Comment::find($comment_id);
    }
}
