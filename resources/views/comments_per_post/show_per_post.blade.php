@extends('layouts.app')

@section('title', 'Comments')

@section('content')
  <!-- Find the current post -->
  <?php
    use App\Models\Post;
    $post = Post::findOrFail($post_id);
  ?>

  <!-- Find out if the user is logged in or not -->
  @guest
    <?php $isLoggedIn = False;?>
  @else
    <?php $isLoggedIn = True;?>
  @endguest

  <!-- If the post has no comments, the following string is showed on screen -->
  @if(count($comments) == 0)
    <h3 class="pl-3">OOF. SUCH EMPTINESS :(</h3>
  @else
    <!-- Display the original post -->
    <div class="pl-3">
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
        </div>
      </div>
    </div>
    <br>
    <!-- Show the comments for this post -->
    @foreach($comments as $comment)
      <div class="pl-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Comment by <a class = "text-dark" href="{{ url('user_page', ['id' => $comment->user->id]) }}">{{ $comment->user->name }}</a></h5>
            @if($comment->edited)
              <p class="card-text"><i>(Edited)</i></p>
            @endif
            <p class="card-text">{{ $comment->description }}</p>
            @guest
            @else
              <!-- Actions dropdown appear only if the user is authorised -->
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
            @endguest
          </div>
        </div>
      </div>
    @endforeach
    <br>
    @guest
    @else
    <!-- Form to post a new comment -->
    <div class="pl-3" id="root">
      Post a new Comment:
      <br>
      <input type="text" id="input" v-model="newCommentDescription"></input>
      <button v-on:click="createComment" class="btn btn-dark">Post</button>
    </div>
    @endguest
  @endif

  @if($isLoggedIn)
    <script type="application/javascript">

      var newComment = new Vue({
        el: "#root",
        data: {
          comments: [],
          newCommentDescription: '',
          authors: {},
        },
        methods: {
          createComment: function() {

            axios.post("{{ route('api.comments.store', ['user_id' => Auth::user()->id, 'post_id' => $post_id]) }}",
            {
              description: this.newCommentDescription,

            }).then(response => {

              this.comments.push(response.data);
              this.newCommentDescription = '';
              alert("Comment saved successfully!");

            }).catch(response => {

              console.log(response);

            });
          },
        },
        mounted() {

          let self = this;

          function getComments() {
            return axios.post("{{ route('api.comments_per_post', ['post_id' => $post_id])}}");
          }

          function getAuthors() {
            return axios.post("{{ route('api.comments.get_authors', ['post_id' => $post_id])}}");
          }

          axios.all([getComments(), getAuthors()])
            .then(axios.spread(function (c, a) {
              self.comments = c.data;

              let authorInfo = a.data;

              for(let i = 0; i < authorInfo.length; i++){
                self.authors[authorInfo[i].id] = authorInfo[i];
              }
            }));
        },
      });
    </script>
  @endif
@endsection
