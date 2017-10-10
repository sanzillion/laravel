<!-- Bootstrap core JavaScript -->
<script src="{{ asset('js/landing/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/landing/jquery/myjquery.js') }}"></script>
<script src="{{ asset('js/landing/popper/popper.min.js') }}"></script>
<script src="{{ asset('js/landing/bootstrap/js/bootstrap.min.js') }}"></script>

<script>
	@if(session('page'))
		var session = @php
			echo "'".session('page')."'";
		@endphp
	@endif
</script>