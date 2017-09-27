@extends ('layouts.master')

@section ('content')

	<h1>Register</h1>

	<form action="/apply" method="POST">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" class="form-control" id="name" name="name" 
			placeholder="Full name: ex. Sanz Moses Valle" required>
		</div>

		<div class="row">
			<div class="col-md-6 col-sm-6">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" name="email" 
					placeholder="Email ex. sanzmoses@gmail.com" required>
				</div>

				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" class="form-control" id="password" name="password" required>
				</div>

				<div class="form-group">
					<label for="password_confirmation">Password Confirmation:</label>
					<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Register</button>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="card">
					<div class="card-block">
						<div class="form-group">
							<label for="phone_number">Phone Number:</label>
							<input type="text" class="form-control form-control-sm" id="phone_number" name="phone_number" placeholder="ex. 639074239571" required>
						</div>

						<div class="form-group">
							<label for="institution">Institution:</label>
							<input type="text" class="form-control form-control-sm" id="institution" name="institution" placeholder="School Name/ Organization Name" required>
						</div>

						<div class="form-group">
							<label for="city">City:</label>
							<input type="text" class="form-control form-control-sm" id="city" name="city" placeholder="City: ex. Davao" required>
						</div>

					</div>
				</div>
			</div>
		</div>



		@include ('layouts.errors')
	</form>

@endsection