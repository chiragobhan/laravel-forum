<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment($request->all());

        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->context = $request->context;

        $comment->save();

        $comment = new Comment;
        $post = new Post;
        $comments = $post::find($request->post_id)->comment;
        return redirect()->back()->with('comments', $comments);
    }

    public function show($userId)
    {
        $commentList = new Comment;
        $commentCollection = $commentList->where('user_id', $userId)->get();
        //dd($commentCollection);
        return view('comments')->with('comments', $commentCollection);
    }

    public function edit($commentId)
    {
        $comment = new Comment();
        $comment = $comment->where('id', $commentId)->get();
        $comment = $comment[0];
        return view('comment')->with('commentData', $comment);
    }

    public function update(Request $request)
    {
        $comment = new Comment();
        $commentData = $request->all();
        $comment = $comment->where('id', $commentData['comment_id'])->get();
        $comment = $comment[0];
        $comment->context = $request->context;
        $comment->save();

        return redirect()->back();
    }

    public function destroy(Request $request, $commentId)
    {
        $comment = new Comment();
        $comment->destroy($commentId);
        return redirect()->back();
    }
}
