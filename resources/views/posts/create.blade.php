@extends('layouts.app')

@section('title', 'New Post')

@section('content')
  <form class="pl-4" method="POST" action="{{ route('posts.store', ['user_id' => Auth::user()->id]) }}" style="padding-right: 50rem;">
    @csrf
    <div class="form-group">
      <label for="title">Title Post</label>
      <textarea class="form-control" name="title" id="title" rows="3">{{ old('title') }}</textarea>
    </div>
    <div class="form-group">
      <label for="image">Image File</label>
      <input type="file" class="form-control-file" name="image" id="image">
    </div>
    <div>
      <button type="submit" class="btn btn-dark">Post</button>
    </div>
  </form>
@endsection
