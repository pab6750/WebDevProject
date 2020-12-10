@extends('layouts.app')

@section('title', 'Edit Comment')

@section('content')
  <form method="POST" action="{{ route('comments.update', ['comment_id' => $comment_id])}}">
    @csrf
    <h4 class="pl-4">Enter comment text:</h4>
    <div class="form-group pl-4" style="padding-right: 50rem;">
      <textarea class="form-control" name="description" rows="3" value="{{ old('description') }}"></textarea>
    </div>
    <div class="pl-4">
      <button type="submit" class="btn btn-dark">Edit</button>
    </div>
  </form>
@endsection
