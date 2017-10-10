<!DOCTYPE html>
<html lang="en">

	@include ('layouts.landing.head')

	<body>
     	@if ($flash = session('message'))
	      <div id="flash-message" class="alert alert-success" role="alert">
	        {{ $flash }}
	      </div>
	     @endif
		@include('layouts.errors')

		@include ('layouts.landing.nav')
		@yield ('content')

		@include ('layouts.landing.scripts')
		@include ('layouts.scripts')
		@yield ('scripts')

	</body>
</html>