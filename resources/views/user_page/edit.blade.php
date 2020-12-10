@extends('layouts.app');

@section('title', 'Edit User')

@section('content')
  <form class="pl-4" method="POST" action="{{ route('user_page.update', ['user_page_id' => $user_page_id]) }}" style="padding-right: 50rem;">
    @csrf
    <div class="form-group">
      <label for="username">User Name</label>
      <textarea class="form-control" name="username" id="username" rows="3">{{ old('username') }}</textarea>
    </div>
    <div class="form-group">
      <label for="profile_pic">Image File</label>
      <input type="file" class="form-control-file" name="profile_pic" id="profile_pic">
    </div>
    <div class="pt-3">
      <button type="submit" class="btn btn-dark">Edit</button>
    </div>
  </form>
@endsection
