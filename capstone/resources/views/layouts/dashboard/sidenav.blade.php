<nav class="side-navbar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    <div class="avatar">
      @if(auth()->user()->level == "superuser")
        <i class="fa fa-universal-access" style="font-size: 3.5em;"></i>
      @else
        <i class="fa fa-user-circle" style="font-size: 3.5em;"></i>
      @endif
      {{-- <img src="" alt="..." class="img-fluid rounded-circle"> --}}
    </div>
    <div class="title">
      <h1 class="h4">{{ ucfirst(auth()->user()->name) }}</h1>
      <p>{{ ucfirst(auth()->user()->level) }}</p>
    </div>
  </div>
  <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
  <ul class="list-unstyled sidebar">
  @if(auth()->user()->level == "superuser")
    <li class="master"> <a href="/master"><i class="fa fa-user-secret"></i>
    <span class="badge bg-orange text-violet float-right">3</span>Master</a></li>        
  @endif
    <li class="acc"> <a href="#"> <i class="fa fa-address-card"></i>
    <span class="badge bg-orange text-violet float-right">10</span>Account</a></li>
    <li class="admin"> <a href="/admin"><i class="fa fa-area-chart"></i>
    <span class="badge bg-orange text-violet float-right">12</span>Dashboard</a></a></li>
    <li class="blog"> <a href="/blog"> <i class="fa fa-send"></i>
    <span class="badge bg-orange text-violet float-right">2</span>Blog Posts </a></li>
    <li class="file"> <a href="/file"> <i class="fa fa-folder-open"></i>
    <span class="badge bg-orange text-violet float-right">5</span>File Management </a></li>
    <li class="sms"> <a href="/sms"> <i class="fa fa-phone-square"></i>
    <span class="badge bg-orange text-violet float-right">6</span>SMS feature </a></li>
    <li class="docs"> <a href="#"> <i class="fa fa-rocket"></i>Documentation</a></li>
    <hr>
    <span class="heading">Extras</span>
    <li style="margin-top: 20px;"><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-cloud-download"></i>Downloadables </a>
      <ul id="dashvariants" class="collapse list-unstyled">
        <li><a href="#"><i class="fa fa-file-word-o"></i> Docs</a></li>
        <li><a href="#"><i class="fa fa-database"></i> SQL Database</a></li>
        <li><a href="#"><i class="fa fa-file"></i> Test Entries</a></li>
        <li><a href="#"><i class="fa fa-file-excel-o"></i> Activity Logs</a></li>
      </ul>
    </li>
{{--   </ul><span class="heading">Extras</span>
  <ul class="list-unstyled">
    <li> <a href="#"> <i class="icon-flask"></i>Demo </a></li>
    <li> <a href="#"> <i class="icon-screen"></i>Demo </a></li>
    <li> <a href="#"> <i class="icon-mail"></i>Demo </a></li>
    <li> <a href="#"> <i class="icon-picture"></i>Demo </a></li>
  </ul> --}}
</nav>