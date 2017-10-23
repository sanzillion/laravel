<!DOCTYPE html>
<html lang="en">

	@include ('layouts.landing.head')
	@yield ('extrahead');

	<body>
     	@if ($flash = session('message'))
	      <div id="flash-message" class="alert alert-success" role="alert">
	        {{ $flash }}
	      </div>
	     @endif
		@include('layouts.errors')

		@include ('layouts.landing.nav')
		@yield ('content')

		@if(!Auth::guard('web')->check())
			@include ('layouts.landing.login')
		@endif

		@include ('layouts.landing.footer')

		@include ('layouts.landing.scripts')
		@include ('layouts.scripts')
		@yield ('scripts')

	</body>
</html>