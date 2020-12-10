@extends('layouts.app')

@section('title', 'Post')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
        <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>
      </div>
      <div class="col-6">
        {{ $post->title }}
      </div>
      <div class="col">

      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <img src={{ $post->picturep }} alt="Image" width="100", height="100">
      </div>
    </div>
  </div>
@endsection
