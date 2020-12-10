@extends('layouts.app')

@section('title', $user_page->user->name)
@section('id', $user_page->user->id)

@section('content')
  <div class="inline-info">

    <img src="{{ URL::to('/') }}/images/{{ $user_page->user->image->filename }}" class="rounded pl-4" alt="Profile Pic" width="200" height="200">
    <div class="pl-4">
      <h1> {{ $user_page->user->name }}</h1>
      <p><i><b>"{{ $user_page->description }}"</b></i></p>
    </div>
  </div>

  <div class="pl-4">
    <a class="btn btn-dark" href="{{ url('posts_per_user', ['user_id' => $user_page->user->id]) }}" role="button">Posts</a>
    <a class="btn btn-dark" href="{{ url('comments_per_user', ['user_id' => $user_page->user->id]) }}" role="button">Comments</a>
  </div>
  @if(Gate::allows('update-user_page', $user_page))
    <div class="pl-4 pt-4">
      <a class="btn btn-dark" href="{{ route('user_page.edit', ['user_page_id' => $user_page->id]) }}" role="button">Edit User</a>
      <a class="btn btn-danger" href="{{ route('user.delete', ['user_id' => $user_page->user->id]) }}" role="button">Delete User</a>
    </div>
  @endif
@endsection
