<div class="blog-masthead">
  <div class="container">
    <nav class="nav">
      <a class="nav-link" href="/">Home</a>
      @if(!Auth::check())
        <a class="nav-link" href="/login">Login</a>
        <a class="nav-link" href="/apply">Register</a>
        <a class="nav-link ml-auto" href="/admin/login">Admin</a>
      @endif

      @if(Auth::check())

        @if(Auth::guard('web')->check())
          <a class="nav-link" href="/posts/create">Create Post</a>
        @elseif (Auth::guard('admin')->check())
          @if(Auth::id() == 1)
            <a class="nav-link" href="/master">Dashboard</a>
          @else
            <a class="nav-link" href="/admin">Dashboard</a>
          @endif
        @endif

        <a class="nav-link" href="{{ $url }}">Logout</a>
        <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
      @endif
      
    </nav>
  </div>
</div>