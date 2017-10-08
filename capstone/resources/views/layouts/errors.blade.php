	@if(count($errors ))
	<div id="flash-message" class="error-report">
		<div class="alert alert-primary">
		<h1><i class="fa fa-exclamation-triangle"></i>&nbsp Errors</h1>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
	@endif

	@if(session('error'))
		<div class="alert alert-danger">
			{{ session('error') }}
		</div>
	@endif