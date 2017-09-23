    <div class="blog-masthead">
      <div class="container">
        <nav class="nav">
          <a class="nav-link" href="/">Home</a>
          <a class="nav-link" href="#">New features</a>
          <a class="nav-link" href="#">Press</a>
          <a class="nav-link" href="#">New hires</a>
          
          @if(Auth::check())
            <a class="nav-link" href="/posts/create">Create Post</a>
            <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
          @endif
          
        </nav>
      </div>
    </div>