@extends('layouts.app')

@section('title', 'Comments')

@section('content')
  <div class="pb-3 pl-3">
    <a class="btn btn-dark" href="{{ route('comments.create', ['post_id' => $post_id]) }}">Post Comment</a>
  </div>
  @foreach($comments as $comment)
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Comment by <a class = "text-dark" href="{{ url('user_page', ['id' => $comment->user->id]) }}">{{ $comment->user->name }}</a></h5>
        <p class="card-text">{{ $comment->description }}</p>
      </div>
    </div>
  @endforeach
@endsection
