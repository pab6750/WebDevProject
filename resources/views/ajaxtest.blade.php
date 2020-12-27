<html>
  <head>
    <title>AJAX Test</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js" integrity="sha512-DZqqY3PiOvTP9HkjIWgjO6ouCbq+dxqWoJZ/Q+zPYNHmlnI2dQnbJ5bxAHpAMw+LXRm4D72EIRXzvcHQtE8/VQ==" crossorigin="anonymous"></script>
  </head>
  <body>
    <h1>Enclosures</h1>
    <div id="root">
      <ul>
        <li v-for="enclosure in enclosures">@{{ enclosure }}</li>
      </ul>
    </div>

    <div class="pl-3" id="root">
      <input type="text" v-model="newCommentDescription"></input>
      <button v-on:click="createComment">Post</button>
    </div>
  </body>
  <script>
    var app = new Vue({
      el: "#root",
      data: {
        enclosures: ["north", "west"],
        newEnclosureName: '',
      },
      methods: {
        createEnclosure: function() {
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
        }
      }
    });
  </script>
</html>
