<!DOCTYPE html>
<html lang="en">

  @include ('layouts.dashboard.head')

	<body>		
		<div class="page login-page">
	      <div class="container d-flex align-items-center">
	        <div class="form-holder has-shadow">
	          <div class="row">
	            <!-- Logo & Information Panel-->
	            <div class="col-lg-6">
	              <div class="info d-flex align-items-center">
	                <div class="content">
	                  <div class="logo">
	                    <h1>Registration</h1>
	                  </div>
	                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	                </div>
	              </div>
	            </div>
	            <!-- Form Panel    -->
	            <div class="col-lg-6 bg-white">
	              <div class="form d-flex align-items-center">
	                <div class="content">
	                  <form id="registration-form" action="/apply" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
	                      <input id="register-username" type="text" name="name" required class="input-material">
	                      <label for="register-username" class="label-material">Full Name</label>
	                    </div>

						<div class="container-fluid">
	                    <div class="row">
						<div class="col-md-6 col-sm-6">

							<div class="form-group">
		                      <input id="register-email" type="email" name="email" required class="input-material">
		                      <label for="register-email" class="label-material">Email Address</label>
		                    </div>

		                    <div class="form-group">
		                      <input id="register-password" type="password" name="password" required class="input-material">
		                      <label for="register-password" class="label-material">password</label>
		                    </div>

		                    <div class="form-group">
		                      <input id="confirm-password" type="password" name="password_confirmation" required class="input-material">
		                      <label for="confirm-password" class="label-material">Confirm password</label>
		                    </div>

						</div>
						<div class="col-md-1 col-sm-1"></div>
						<div class="col-md-5 col-sm-5">
							
							<div class="form-group">
		                      <input id="pnum" type="text" name="phone_number" required class="input-material">
		                      <label for="pnum" class="label-material">Phone Number</label>
		                    </div>

		                    <div class="form-group">
		                      <input id="institution" type="text" name="institution" required class="input-material">
		                      <label for="institution" class="label-material">Institution/ Organization</label>
		                    </div>

		                    <div class="form-group">
		                      <input id="city" type="text" name="city" required class="input-material">
		                      <label for="city" class="label-material">City</label>
		                    </div>

						</div>
	                    </div>
	                    </div>

	                    <div class="form-group terms-conditions">
	                      <input id="license" type="checkbox" class="checkbox-template">
	                      <label for="license">Agree the terms and policy</label>
	                    </div>
	                    
	                    <input id="register" type="submit" value="Register" class="btn btn-primary">
	                  </form><small>Already have an account? </small><a href="/login" class="signup">Login</a>
					
						@include ('layouts.errors')
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	      <div class="copyrights text-center">
	        <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
	        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
	      </div>
	    </div>
	
	@include ('layouts.dashboard.scripts')
	</body>

</html>	
