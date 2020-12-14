@include('admin.header')
@include('admin.navbar')

    <main class="content">

      <h1>Edit post</h1>

      @if ($message = Session::get('success'))
        <div class="alert-success">{{ $message }}</div>
      @elseif ($message = Session::get('failed'))
        <div class="alert-failed">{{ $message }}</div>
      @endif

      <form class="form" action="/posts/update/{{$post->id}}" method="post">

        @csrf
        @method('PUT')

        <label for="post_title">Post title:</label>
        <input id="post_title" name="title" type="text" value="{{$post->title}}" />

        <label for="post_content">Post content:</label>
        <textarea id="post_content" name="body">{{$post->body}}</textarea>

        <input type="submit" value="Update" />

        <script src="/ckeditor/ckeditor.js"></script>
        <script>CKEDITOR.replace('post_content');</script>

      </form>

    </main>

  </body>
</html>
