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
      <label for="picture">Image File</label>
      <input type="file" class="form-control-file" name="picture" id="picture">
    </div>
    <div class="form-check form-check-inline pt-1">
      <input class="form-check-input" type="checkbox" id="tag_checkbox_1" name="tag_checkbox_1" value="1">
      <label class="form-check-label" for="tag_checkbox_1">Map</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="tag_checkbox_2" name="tag_checkbox_2" value="2">
      <label class="form-check-label" for="tag_checkbox_2">Character</label>
    </div>
    <div class="pt-3">
      <button type="submit" class="btn btn-dark">Post</button>
    </div>
  </form>
@endsection
