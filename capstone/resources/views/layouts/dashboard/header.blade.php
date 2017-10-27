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
        <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red">12</span></a>
          <ul aria-labelledby="notifications" class="dropdown-menu">
            <li><a rel="nofollow" href="#" class="dropdown-item"> 
                <div class="notification">
                  <div class="notification-content"><i class="fa fa-envelope bg-green"></i>Activities updates</div>
                  <div class="notification-time"><small>4 minutes ago</small></div>
                </div></a></li>
            <li><a rel="nofollow" href="#" class="dropdown-item"> 
                <div class="notification">
                  <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                  <div class="notification-time"><small>4 minutes ago</small></div>
                </div></a></li>
            <li><a rel="nofollow" href="#" class="dropdown-item"> 
                <div class="notification">
                  <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                  <div class="notification-time"><small>4 minutes ago</small></div>
                </div></a></li>
            <li><a rel="nofollow" href="#" class="dropdown-item"> 
                <div class="notification">
                  <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                  <div class="notification-time"><small>4 minutes ago</small></div>
                </div></a></li>
            <li><a rel="nofollow" href="#" class="dropdown-item"> 
                <div class="notification">
                  <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                  <div class="notification-time"><small>10 minutes ago</small></div>
                </div></a></li>
          </ul>
        </li>
        <!-- Messages                        -->
        <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange">10</span></a>
          <ul aria-labelledby="notifications" class="dropdown-menu">
            <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                <div class="msg-profile"> <img src="{{ asset('images/sandy.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
                <div class="msg-body">
                  <h3 class="h5">Sanz Moses</h3><span>Sent You Message</span>
                </div></a></li>
            <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                <div class="msg-profile"> <img src="{{ asset('images/zak1.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
                <div class="msg-body">
                  <h3 class="h5">Zak Zailon</h3><span>Sent You Message</span>
                </div></a></li>
            <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                <div class="msg-profile"> <img src="{{ asset('images/wasme.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
                <div class="msg-body">
                  <h3 class="h5">Aljon Khuzan</h3><span>Sent You Message</span>
                </div></a></li>
            <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages    </strong></a></li>
          </ul>
        </li>
        <!-- Logout    -->
        <li class="nav-item"><a href="/admin/logout" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
      </ul>
    </div>
  </div>
</nav>
</header>