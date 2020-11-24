@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
  <form class="centre_div pt-3">
    <div class="form-group">
      <label for="InputUsername">Username</label>
      <input type="email" class="form-control" id="InputUsername" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="inputEmail">Email address</label>
      <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="inputPassword">Password</label>
      <input type="password" class="form-control" id="inputPassword">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
