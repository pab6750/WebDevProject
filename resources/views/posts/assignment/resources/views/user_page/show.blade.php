@extends('layouts.app')

@section('title', $user_page->user->name)
@section('id', $user_page->user->id)

@section('content')
  <h1> {{ $user_page->user->name }}</h1>

  <a class="btn btn-dark" href="{{ url('posts_per_user', ['user_id' => $user_page->user->id]) }}" role="button">Posts</a>
  <a class="btn btn-dark" href="{{ url('comments_per_user', ['user_id' => $user_page->user->id]) }}" role="button">Comments</a>
@endsection
