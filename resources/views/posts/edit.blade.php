@extends('layouts.app')

@section('title', 'Update Post')

@section('content')
  <form class="pl-4" method="POST" action="{{ route('posts.update', ['post_id' => $post_id]) }}" style="padding-right: 50rem;">
    @csrf
    <div class="form-group">
      <label for="title">Title Post</label>
      <textarea class="form-control" name="title" id="title" rows="3">{{ old('title') }}</textarea>
    </div>
    <div class="form-group">
      <label for="picture">Image File</label>
      <input type="file" class="form-control-file" name="picture" id="picture">
    </div>
    <div>
      <select class="custom-select mr-sm-2" id="tag" name="tag">
        <option selected>Select Tag</option>
        <option value="1">Map</option>
        <option value="2">Character</option>
      </select>
    </div>
    <div class="pt-3">
      <button type="submit" class="btn btn-dark">Edit</button>
    </div>
  </form>
@endsection
