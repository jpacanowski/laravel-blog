@include('admin/header')
@include('admin/navbar')

    <main class="content">

      <h1>Add new post</h1>

      @if ($message = Session::get('failed'))
        <div class="alert-failed">{{ $message }}</div>
      @endif

      <form class="form" method="POST" action="/posts/store">

        @csrf

        <label for="post_title">Post title:</label>
        <input id="post_title" name="title" type="text" value="" />

        <!-- <label for="post_url">Post URL:</label>
        <input id="post_url" name="post_url" type="url" /> -->

        <!-- <label for="post_tags">Post tags:</label>
        <input id="post_tags" name="post_tags" type="text" placeholder="e.g. linux,ubuntu,nginx" value="" /> -->

        <!-- <div class="form__group">
          <div class="form__content"> -->
            <label for="post_content">Post content:</label>
            <textarea id="post_content" name="body"></textarea>
          <!-- </div> -->

          <!-- <div class="form__tags">
            <label for="post_tags">Post tags:</label>
            <input id="post_tags" type="hidden" name="tags" />
            <input id="enter_tags" type="text" name="" placeholder="Enter tags..." />

            <ul class="tags_list"></ul>
          </div> -->
        <!-- </div> -->

        <input type="submit" value="Publish" />

        <script src="/ckeditor/ckeditor.js"></script>
        <script>CKEDITOR.replace('post_content');</script>

      </form>

    </main>

  </body>
</html>
