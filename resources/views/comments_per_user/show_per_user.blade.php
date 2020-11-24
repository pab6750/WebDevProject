@extends('layouts.app')

@section('title', 'Comments')

@section('content')
  @foreach($comments as $comment)
    <div class="pl-5">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Comment by <a class = "text-dark" href="{{ url('user_page', ['id' => $comment->user->id]) }}">{{ $comment->user->name }}</a></h5>
          <p class="card-text">{{ $comment->description }}</p>
        </div>
      </div>
    </div>
  @endforeach
@endsection
