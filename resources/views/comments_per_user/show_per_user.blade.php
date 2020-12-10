@extends('layouts.app')

@section('title', 'Comments')

@section('content')
  @foreach($comments as $comment)
    <div class="pl-3">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Comment by <a class = "text-dark" href="{{ url('user_page', ['id' => $comment->user->id]) }}">{{ $comment->user->name }}</a></h5>
          @if($comment->edited)
            <p class="card-text"><i>(Edited)</i></p>
          @endif
          <p class="card-text">{{ $comment->description }}</p>
          @if(Gate::allows('update-comment', $comment))
            <div class="dropdown">
              <button class="btn btn-secondary btn-lg dropdown-toggle active" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('comments.edit', ['comment_id' => $comment->id])}}">Edit Comment</a>
                <a class="dropdown-item" href="{{ route('comments.delete', ['comment_id' => $comment->id])}}">Delete Comment</a>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  @endforeach
@endsection
