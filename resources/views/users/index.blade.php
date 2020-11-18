@extends('layouts.app')

@section('title', 'All Users');

@section('content')
  @foreach ($users as $user)
    <div class="container">
      <div class="row">
        <div class="col">
          {{ $user->name }}
        </div>
        <div class="col-6">
          {{ $user->email }}
        </div>
      </div>
    </div>
  @endforeach
@endsection
