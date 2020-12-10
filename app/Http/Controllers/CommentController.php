<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();

        return view('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($post_id)
    {
        return view('comments.create', ['post_id' => $post_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($user_id, $post_id, Request $request)
    {

        $validatedData = $request->validate([
          'description' => 'required|max:512'
        ]);

        $comment = new Comment;

        $comment->description = $validatedData['description'];
        $comment->post_id = $post_id;
        $comment->user_id = $user_id;

        $comment->save();

        session()->flash('message', 'Comment posted successfully');

        return $this->show_per_post($post_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $comment = Comment::findOrFail($id);

      return view('comment.show', ['comment' => $comment]);
    }

    /**
    * Display all the comments for one post.
    *
    */
    public function show_per_post($post_id)
    {
      $comments = Post::findOrFail($post_id)->comments;

      return view('comments_per_post.show_per_post', ['comments' => $comments, 'post_id' => $post_id]);
    }

    /**
    * Display all the comments for one user.
    *
    */
    public function show_per_user($user_id)
    {
      $comments = User::findOrFail($user_id)->comments;

      return view('comments_per_user.show_per_user', ['comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($comment_id)
    {
        return view('comments.edit', ['comment_id' => $comment_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($comment_id, Request $request)
    {
        $comment = Comment::findOrFail($comment_id);

        $validatedData = $request->validate([
          'description' => 'required|max:512'
        ]);

        $comment->description = $validatedData['description'];
        $comment->edited = 1;

        $comment->save();

        session()->flash('message', 'Comment edited successfully');

        return $this->show_per_user($comment->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->delete();

        return $this->show_per_user($comment->user_id);
    }
}
