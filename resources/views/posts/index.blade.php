@extends('layouts.app')

@section('title', 'Posts')

@section('content')
  @foreach ($posts as $post)
    <div class="pl-4">
      <div class="card" style="width: 18rem;">
        <img src="{{ URL::to('/') }}/images/{{ $post->image->filename }}" class="card-img-top" alt={{ $post->image->filename }}>
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          @if($post->edited)
            <p class="card-text"><i>(Edited)</i></p>
          @endif
          @foreach ($post->tags as $tag)
            <div class="border border-dark rounded @if($tag->type == "Map") map_tag_color @elseif ($tag->type == "Character") character_tag_color @else default_tag_color @endif">
              {{ $tag->type }}
            </div>
            <br>
          @endforeach
          <p class="card-text">Posted by <a class = "text-dark" href="{{ url('user_page', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a></p>
          <div class="row pl-3">
            <a href="{{ url('comments_per_post', ['post_id' => $post->id]) }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Comments</a>
            @if(Gate::allows('update-post', $post))
              <div class="dropdown pl-2">
                <button class="btn btn-secondary btn-lg dropdown-toggle active" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Actions
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ route('posts.edit', ['post_id' => $post->id]) }}">Edit Post</a>
                  <a class="dropdown-item" href="{{ route('posts.delete', ['post_id' => $post->id])}}">Delete Post</a>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    <br>
  @endforeach
  {{ $posts->links() }}
@endsection
