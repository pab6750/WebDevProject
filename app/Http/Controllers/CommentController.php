<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display all comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();

        return view('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new comment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($post_id)
    {
        return view('comments.create', ['post_id' => $post_id]);
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($user_id, $post_id, Request $request)
    {

        //data validation
        $validatedData = $request->validate([
          'description' => 'required|max:512'
        ]);

        $comment = new Comment;

        $comment->description = $validatedData['description'];
        $comment->post_id = $post_id;
        $comment->user_id = $user_id;

        $comment->save();

        return $this->show_per_post($post_id);
    }

    /**
     * Display one specific comment.
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
     * Show the form for editing the specified comment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($comment_id)
    {
        return view('comments.edit', ['comment_id' => $comment_id]);
    }

    /**
     * Update the specified resource in comment.
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
     * Remove the specified comment from storage.
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

    /**
    * returns a list containing all the comments for a post.
    *
    */
    public function api_show_per_post($post_id)
    {
        $comments = Post::findOrFail($post_id)->comments;
        return $comments;
    }

    /**
    * Saves a newly created comment into storage.
    *
    */
    public function api_store($user_id, $post_id, Request $request)
    {

        $comment = new Comment;

        $validatedData = $request->validate([
          'description' => 'required|max:256'
        ]);

        $comment->description = $validatedData['description'];
        $comment->post_id = $post_id;
        $comment->user_id = $user_id;

        $comment->save();

        session()->flash('message', 'Comment posted successfully');

        return $comment;
    }

    /**
    * returns a list containing all the authors of the comments for a post.
    *
    */
    public function api_get_authors($post_id)
    {
        $comments = Post::findOrFail($post_id)->comments;

        $authors = array();

        for($i = 0; $i < count($comments); $i++)
        {
          $authors[] = $comments[$i]->user;
        }

        return $authors;
    }
}
