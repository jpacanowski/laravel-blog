@include('admin.header')
@include('admin.navbar')

    <main class="content">

      <h1>Posts</h1>

      {{ 'flash(post_message)' }}

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
                    <a href="/admin/posts/update/{{$post->id}}" class="btn-edit">Edytuj</a>
                  </li>
                  <li>
                    <form class="form_delete" method="POST" action="admin/posts/delete/{{$post->id}}">
                      <input type="hidden" name="_method" value="DELETE" />
                      <input type="hidden" name="_token" value="{{ 'csrf_token()' }}" />
                      <a href="/admin/posts/delete/{{$post->id}}" class="btn-delete" onclick="event.target.parentNode.submit(); return false;">Usuń</a>
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
                    <a href="/admin/posts/update/{{$post->id}}" class="btn-edit">Edytuj</a>
                  </li>
                  <li>
                    <form class="form_delete" method="POST" action="admin/posts/delete/{{$post->id}}">
                      <input type="hidden" name="_method" value="DELETE" />
                      <input type="hidden" name="_token" value="{{ 'csrf_token()' }}" />
                      <a href="/admin/posts/delete/{{$post->id}}" class="btn-delete" onclick="event.target.parentNode.submit(); return false;">Usuń</a>
                    </form>
                  </li>
                  <li>
                    <a href="/admin/posts/publish/{{$post->id}}" class="btn-publish">Opublikuj</a>
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