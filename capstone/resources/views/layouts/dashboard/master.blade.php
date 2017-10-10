<!DOCTYPE html>
<html lang="en">

  @include ('layouts.dashboard.head')

  <body>
  
  <div class="page home-page">
	   @include ('layouts.dashboard.header')
     @if ($flash = session('message'))
      <div id="flash-message" class="alert alert-success" role="alert">
        {{ $flash }}
      </div>
     @endif
     <div class="page-content d-flex align-items-stretch">
       @include ('layouts.dashboard.sidenav')
       <div class="content-inner">
         @yield ('content')
       </div>
       
       
     </div>
  </div>

  @include ('layouts.landing.scripts')
  @include ('layouts.scripts')
  @yield ('scripts')

  </body>
</html>
