    <div class="blog-masthead">
      <div class="container">
        <nav class="nav">
          <a class="nav-link" href="/">Home</a>
          @if(!Auth::check())
            <a class="nav-link" href="/login">Login</a>
            <a class="nav-link" href="/apply">Register</a>
          @endif

          @if(Auth::check())

            @if(Auth::guard('web')->check())
              <a class="nav-link" href="/posts/create">Create Post</a>
            @elseif (Auth::guard('admin')->check())
              <a class="nav-link" href="/master">Dashboard</a>
            @endif

            <a class="nav-link" href="{{ $url }}">Logout</a>
            <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
          @endif
          
        </nav>
      </div>
    </div>