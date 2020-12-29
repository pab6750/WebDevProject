<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display all posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //function used to paginate the data.
        $posts = Post::paginate(10);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($user_id, Request $request)
    {

      //data validation
      $validatedData = $request->validate([
        'title' => 'required|max:512',
        'picture' => 'required',
      ]);

      $last_id = Post::get()->last()->id;

      $post = new Post;
      $post->title = $validatedData['title'];
      $post->user_id = $user_id;

      $post->save();

      if(!is_null($request['tag_checkbox_1']))
      {
        $post->tags()->attach($request['tag_checkbox_1']);
      }

      if(!is_null($request['tag_checkbox_2']))
      {
        $post->tags()->attach($request['tag_checkbox_2']);
      }

      $post->image()->delete();
      $post->image()->create(['filename' => $validatedData['picture']]);

      session()->flash('message', 'Post created successfully');

      return $this->show_per_user($user_id);
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post]);
    }

    /**
    * Display all posts for a user.
    *
    */
    public function show_per_user($user_id)
    {
      $posts = User::findOrFail($user_id)->posts()->latest()->get();

      return view('posts_per_user.show_per_user', ['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        return view('posts.edit', ['post_id' => $post_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($post_id, Request $request)
    {
        $post = Post::findOrFail($post_id);

        $validatedData = $request->validate([
          'title' => 'required|max:512',
          'picture' => 'required',
        ]);

        $post->title = $validatedData['title'];
        $post->edited = 1;

        $post->save();

        $post->tags()->detach();

        if(!is_null($request['tag_checkbox_1']))
        {
          $post->tags()->attach($request['tag_checkbox_1']);
        }

        if(!is_null($request['tag_checkbox_2']))
        {
          $post->tags()->attach($request['tag_checkbox_2']);
        }

        $post->image()->delete();
        $post->image()->create(['filename' => $validatedData['picture']]);

        session()->flash('message', 'Post edited successfully');

        return $this->show_per_user($post->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
      $post = Post::findOrFail($post_id);

      $post->delete();

      return $this->show_per_user($post->user_id);
    }
}
