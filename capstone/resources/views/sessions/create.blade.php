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
                    <h1>Admin Login</h1>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form id="login-form" method="POST" action="/login">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input id="login-username" type="text" name="email" required="" class="input-material">
                      <label for="login-username" class="label-material">Email</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required="" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                    </div><button type="submit" class="btn btn-primary">Login</button>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="/apply" class="signup">Signup</a>
                </div>
              </div>
              @include('layouts.errors')
            </div>

          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>

  @include ('layouts.dashboard.scripts')

  </body>

</html>