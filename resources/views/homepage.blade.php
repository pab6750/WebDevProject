@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
  <div class="jumbotron">
    <h1 class="display-4">Welcome to DnD Maps!</h1>
    <p class="lead">This is a service that allows you to share your creations with other people, as well as give feedback to theirs!</p>
    <hr class="my-4">
    <a class="btn btn-dark btn-lg" href="{{ route('posts.index') }}" role="button">Click to see more</a>
</div>
@endsection
