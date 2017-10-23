<div class="tagline-upper text-center text-heading text-shadow mt-5 d-none d-lg-block">SAVE OUR SCHOOL NETWORK</div>
  <div class="tagline-lower text-center text-heading text-expanded text-shadow text-uppercase mb-5 d-none d-lg-block">Defend <b>children's</b> <a>Right</a> to Education!</div>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-faded py-lg-4">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">SOS NETWORK</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
          <i class="glyphicon glyphicon-align-justify"></i>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto text-black">
          <li class="nav-item px-lg-4 news">
            <a class="nav-link text-uppercase text-expanded" href="/">News
              <span class="sr-only">(current)</span>
            </a>
          <li class="nav-item px-lg-4 stories">
            <a class="nav-link text-uppercase text-expanded" href="/stories">Stories</a>
          </li>
          </li>
          @if(!Auth::check())
            <li class="nav-item px-lg-4 about">
              <a class="nav-link text-uppercase text-expanded" href="/about">About</a>
            </li>
            <li class="nav-item px-lg-4 members">
              <a class="nav-link text-uppercase text-expanded" href="/members">Members</a>
            </li>
            <li class="nav-item px-lg-4 register">
              <a class="nav-link text-uppercase text-expanded" href="/register">Register</a>
            </li>
            <li class="nav-item px-lg-4 devs">
              <a class="nav-link text-uppercase text-expanded" href="/developers">Devs</a>
            </li>
          @endif

          @if(Auth::guard('web')->check())
          <li class="nav-item px-lg-4 create">
            <a class="nav-link text-uppercase text-expanded" href="/posts/create">Create Post</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/logout">{{ Auth::user()->name }}</a>
          </li>
          {{-- <a class="nav-link" href="/posts/create">Create Post</a>
          <a class="nav-link" href="{{ $url }}">Logout</a>
          <a class="nav-link ml-auto" href="#"></a> --}}
          @endif

        </ul>
      </div>
    </div>
  </nav>