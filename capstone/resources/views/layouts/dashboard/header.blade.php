{{-- <div class="blog-header">
      <div class="container">

		@if (Auth::guard('admin')->id() == 1)
        	<h1 class="blog-title">Master</h1>
        	<p class="lead blog-description">Superuser Dashboard.</p>
      	@else
        	<h1 class="blog-title">Admin</h1>
        	<p class="lead blog-description">General Admin Dashboard.</p>
      	@endif
        
      </div>
</div> --}}

<header class="header">
<nav class="navbar">
  <!-- Search Box-->
  <div class="search-box">
    <button class="dismiss"><i class="icon-close"></i></button>
    <form id="searchForm" action="#" role="search">
      <input type="search" placeholder="What are you looking for..." class="form-control">
    </form>
  </div>
  <div class="container-fluid">
    <div class="navbar-holder d-flex align-items-center justify-content-between">
      <!-- Navbar Header-->
      <div class="navbar-header">
        <!-- Navbar Brand --><a href="/" class="navbar-brand">
          <div class="brand-text brand-big hidden-lg-down"><span>Save Our</span><strong> School</strong></div>
          <div class="brand-text brand-small"><strong>SOS</strong></div></a>
        <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
      </div>
      <!-- Navbar Menu -->
      <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
        <!-- Search-->
        {{-- <li class="nav-item d-flex align-items-center" style="margin-right: 12px;"><a id="search" href="#"><i class="icon-search"></i></a></li> --}}
        <!-- Notifications-->
        <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i>
          @if($notif['count'] > 0)
            <span class="badge bg-red">{{ $notif['count'] }}</span>
          @endif
          </a>

          <ul aria-labelledby="notifications" class="dropdown-menu">

            @if ($notif['count'] > 0)

              @if ($notif['txt'] > 0)
                <li><a rel="nofollow" href="/sms" class="dropdown-item"> 
                  <div class="notification">
                    <div class="notification-content"><i class="fa fa-envelope bg-red"></i>{{ $notif['txt'] }} pending text msgs</div>
                    <div class="notification-time"><small>{{ $notif['txttime'] }}</small></div>
                  </div></a></li>
              @endif

              @if ($notif['apply'] > 0)
                <li><a rel="nofollow" href="/admin/manage" class="dropdown-item"> 
                  <div class="notification">
                    <div class="notification-content"><i class="fa fa-address-book bg-green"></i>{{ $notif['apply'] }} user application </div>
                    <div class="notification-time"><small>{{ $notif['applytime'] }}</small></div>
                  </div></a></li>
              @endif

              @if ($notif['entry'] > 0)
                <li><a rel="nofollow" href="/blog" class="dropdown-item"> 
                  <div class="notification">
                    <div class="notification-content"><i class="fa fa-pencil bg-blue"></i>{{ $notif['entry'] }} blog entries</div>
                    <div class="notification-time"><small>{{ $notif['entrytime'] }}</small></div>
                  </div></a></li>
              @endif

              @if ($notif['files'] > 0)
                <li><a rel="nofollow" href="/sms" class="dropdown-item"> 
                  <div class="notification">
                    <div class="notification-content"><i class="fa fa-upload bg-orange"></i>{{ $notif['files'] }} new files uploaded</div>
                    <div class="notification-time"><small>{{ $notif['filestime'] }}</small></div>
                  </div></a></li>
              @endif

            @else
              <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> No notifications </strong></a></li> 
            @endif

          </ul>
        </li>
        <!-- Messages                        -->
        <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i>
        @if($notif['msg']->count() > 0)
          <span class="badge bg-orange">{{ $notif['msg']->count() }}</span>
        @endif
        </a>
          <ul aria-labelledby="notifications" class="dropdown-menu">
            @if ($notif['msg']->count() > 0)
              @foreach ($notif['msg'] as $msg) 
                <li><a rel="nofollow" href="/account" class="dropdown-item d-flex"> 
                  <div class="msg-profile"><i class="fa fa-user-circle-o text-lg"></i></div>
                  <div class="msg-body">
                    <h3 class="h5">{{ $msg->from }}</h3><span>Sent You Message</span>
                  </div></a></li>
              @endforeach
            @else
              <li><a rel="nofollow" href="/account" class="dropdown-item all-notifications text-center"> <strong>Read all messages</strong></a></li>
            @endif
          </ul>
        </li>
        <!-- Logout    -->
        <li class="nav-item"><a href="/admin/logout" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
      </ul>
    </div>
  </div>
</nav>
</header>