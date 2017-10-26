@extends ('layouts.landing.master')

@section ('extrahead')
    <head>
       
    </head>
@endsection

@section ('content')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row bg-white">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row box">
                    <div class="col-md-12 text-center">
                        <h1>SOS Registration</h1>
                        <hr>
                    </div>

                    <div class="col-md-12">

                     <form id="registration-form" action="/apply" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group form-material">
                          <input id="register-username" type="text" name="name" required class="input-material">
                          <label for="register-username" class="label-material">Full Name</label>
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">

                                    <div class="form-group form-material">
                                      <input id="register-email" type="email" name="email" required class="input-material">
                                      <label for="register-email" class="label-material">Email Address</label>
                                    </div>

                                    <div class="form-group form-material">
                                      <input id="register-password" type="password" name="password" required class="input-material">
                                      <label for="register-password" class="label-material">password</label>
                                    </div>

                                    <div class="form-group form-material">
                                      <input id="confirm-password" type="password" name="password_confirmation" required class="input-material">
                                      <label for="confirm-password" class="label-material">Confirm password</label>
                                    </div>
                                </div>
                            {{-- <div class="col-md-1 col-sm-1"></div> --}}
                                <div class="col-md-6 col-sm-6">
                                    
                                    <div class="form-group form-material">
                                      <input id="pnum" type="text" name="phone_number" required class="input-material">
                                      <label for="pnum" class="label-material">Phone Number</label>
                                    </div>

                                    <div class="form-group form-material">
                                      <input id="institution" type="text" name="institution" required class="input-material">
                                      <label for="institution" class="label-material">Institution/ Organization</label>
                                    </div>

                                    <div class="form-group form-material">
                                      <input id="city" type="text" name="city" required class="input-material">
                                      <label for="city" class="label-material">City</label>
                                    </div>

                                </div>
                                <div class="col-md-12 col sm 12">
                                    <div class="form-group form-material terms-conditions">
                                      <input id="license" type="checkbox" class="checkbox-template">
                                      <label for="license">Agree the terms and policy</label> <br>
                                        <input id="register" type="submit" value="Register" class="btn btn-sanz"> &nbsp
                                    </div>
                                </div>
                            </div>
                        </div>
                      </form>

                      <small>Already have an account? </small><a href="/login" class="signup">Login</a>
                    
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

@endsection

@section ('scripts')
  <script>

  </script>
@endsection