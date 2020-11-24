@extends('layouts.app')

@section('title', 'Posts')

@section('content')
  @foreach ($posts as $post)
    <div class="card" style="width: 18rem;">
      <img src="{{ URL::to('/') }}/images/{{ $post->image }}" class="card-img-top" alt={{ $post->image }}>
      <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">Posted by <a class = "text-dark" href="{{ url('user_page', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a></p>
        <a href="{{ url('comments_per_post', ['post_id' => $post->id]) }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Comments</a>
      </div>
    </div>
    <br>
  @endforeach
  {{ $posts->links() }}
@endsection
