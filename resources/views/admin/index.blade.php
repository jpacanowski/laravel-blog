@include('admin.header')
@include('admin.navbar')

    <main class="content">

      <h1>Dashboard</h1>

      <ul class="dashboard">
        <li>
          <div class="infobox">
            <div class="infobox-inner">
              <p>{{ app()::VERSION }}</p>
              <h3>Laravel version</h3>
            </div>
          </div>
        </li>
        <li>
          <div class="infobox">
            <div class="infobox-inner">
              <p>1.0</p>
              <h3>CMS version</h3>
            </div>
          </div>
        </li>
        <li>
          <div class="infobox">
            <div class="infobox-inner">
              <p>{{ $posts_count }}</p>
              <h3>Posts number</h3>
            </div>
          </div>
        </li>
        <li>
          <div class="infobox">
            <div class="infobox-inner">
              <p>{{ $drafts_count }}</p>
              <h3>Drafts number</h3>
            </div>
          </div>
        </li>
      </ul>

    </main>

    <script src="/admin/js/time.js"></script>
    <script src="/admin/js/main.js"></script>

  </body>
</html>
