<!-- Bootstrap core JavaScript -->
<script src="{{ asset('js/landing/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/landing/popper/popper.min.js') }}"></script>
<script src="{{ asset('js/landing/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/landing/jquery/myjquery.js') }}"></script>

<script>
	@if(session('page'))
		var session = @php
			echo "'".session('page')."'";
		@endphp
	@endif

	//this code does not work on mozilla, use jquery instead on myjquery file
	// document.getElementById('toggleProfile').addEventListener('click', function () {
	//   [].map.call(document.querySelectorAll('.profile'), function(el) {
	//     el.classList.toggle('profile--open');
	//   });
	// });
</script>