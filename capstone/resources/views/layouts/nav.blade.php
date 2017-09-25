    <div class="blog-masthead">
      <div class="container">
        <nav class="nav">
          <a class="nav-link" href="/">Home</a>
          <a class="nav-link" href="/login">Login</a>
          <a class="nav-link" href="/register">Register</a>
          
          @if(Auth::check())
            <a class="nav-link" href="/posts/create">Create Post</a>
            <a class="nav-link" href="{{ $url }}">Logout</a>
            <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
          @endif
          
        </nav>
      </div>
    </div>