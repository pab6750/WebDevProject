@extends('layouts.app')

@section('title', 'New Post')

@section('content')
  <form class="pl-4" method="POST" action="{{ route('posts.store')}}" style="padding-right: 50rem;">
    @csrf
    <div class="form-group">
      <label for="title">Title Post</label>
      <textarea class="form-control" id="title" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="image">Image File</label>
      <input type="file" class="form-control-file" id="image">
    </div>
  </form>
@endsection
