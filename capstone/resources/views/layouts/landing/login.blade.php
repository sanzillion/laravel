<div class="container-1">
  <div class="profile">
    <button class="profile__avatar">
     <img id="toggleProfile" src="{{ asset('images/sos-logo1.jpg') }}" alt="Avatar"> 
    </button>
    <div class="profile__form">
      <div class="profile__fields">
        <form id="login" action="/login" method="POST">
          {{ csrf_field() }}
          <div class="field">
            <input type="text" id="fieldUser" name="email" class="input" required />
            <label for="fieldUser" class="label">Email</label>
          </div>
          <div class="field nomarginBtm">
            <input type="password" id="fieldPassword" name="password" class="input" required />
            <label for="fieldPassword" class="label">Password</label>
          </div>
          <div class="field">
            <a href="/password/reset" id="forgotPass">forgot Password?</a>
          </div>
          <div class="profile__footer" align="center">
            <button style="color: black" class="btn login" type="submit" onclick="form.submit()">Login</button>
          </div>
          <div class="field nomarginBtm" align="center">
            <a id="registerbtn" href="/register">Register</a>
          </div>
        </form>
      </div>
     </div>
  </div>
</div>