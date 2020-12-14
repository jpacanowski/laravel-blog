@include('admin.header')
@include('admin.navbar')

    <main class="content">

      <h1>Edit post</h1>

      <form class="form" action="/posts/update/{{$post->id}}" method="post">

        <label for="post_title">Post title:</label>
        <input id="post_title" name="post_title" type="text" value="{{$post->title}}" />

        <label for="post_content">Post content:</label>
        <textarea id="post_content" name="post_content">{{$post->body}}</textarea>

        <input type="submit" value="Update" />

        <script src="/ckeditor/ckeditor.js"></script>
        <script>CKEDITOR.replace('post_content');</script>

      </form>

    </main>

  </body>
</html>
