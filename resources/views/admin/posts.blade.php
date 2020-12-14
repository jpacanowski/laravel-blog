@include('admin.header')
@include('admin.navbar')

    <main class="content">

      <h1>Posts</h1>

      @if ($message = Session::get('success'))
        <div class="alert-success">{{ $message }}</div>
      @endif

      <ul class="posts">

        @foreach ($posts as $post)

          @if($post->status === 'published')
            <li class="post-entry">
              <div class="row">
                <h3><a href="/{{$post->slug}}">{{ $post->title }}</a></h3>
                <span>{{ $post->visits_count }} views</span>
              </div>
              <div class="row">
                <ul class="post-entry-menu">
                  <li>
                    <a href="/admin/posts/edit/{{$post->id}}" class="btn-edit">Edytuj</a>
                  </li>
                  <li>
                    <form class="form_delete" method="POST" action="/posts/delete/{{$post->id}}">
                      @csrf
                      @method('DELETE')
                      <!-- <a href="/admin/posts/delete/{{$post->id}}" class="btn-delete" onclick="event.target.parentNode.submit(); return false;">Usuń</a> -->
                      <button type="submit" class="btn-delete">Usuń</button>
                    </form>
                  </li>
                </ul>
                <time>{{ $post->created_at }}</time>
              </div>
            </li>
          @else
            <li class="post-entry">
              <div class="row">
                <h3><a href="/{{$post->slug}}">{{ $post->title }}</a><span class="post-status">— Draft</span></h3>
                <span>{{ $post->visits_count }} views</span>
              </div>
              <div class="row">
                <ul class="post-entry-menu">
                  <li>
                    <a href="/admin/posts/edit/{{$post->id}}" class="btn-edit">Edytuj</a>
                  </li>
                  <li>
                    <form class="form_delete" method="POST" action="/posts/delete/{{$post->id}}">
                      @csrf
                      @method('DELETE')
                      <!-- <a href="/admin/posts/delete/{{$post->id}}" class="btn-delete" onclick="event.target.parentNode.submit(); return false;">Usuń</a> -->
                      <button type="submit" class="btn-delete">Usuń</button>
                    </form>
                  </li>
                  <li>
                    <form class="form_delete" method="POST" action="/posts/publish/{{$post->id}}">
                      @csrf
                      @method('POST')
                      <button type="submit" class="btn-publish">Opublikuj</button>
                    </form>
                  </li>
                </ul>
                <time>{{ $post->created_at }}</time>
              </div>
            </li>
          @endif

        @endforeach

      </ul>

      <a class="button" href="/admin/posts/create">Add a new post</a>

    </main>

  </body>
</html>
