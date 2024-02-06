<html>
<body>
<div id="forgot-password-form" class="card m-auto p-2" style="display: none;">
        <div class="card-body">
          <div name="login-form" class="login-form">
            <div class="logo">
              <img src="images/prof.jpg" class="profile"/>
              <h1 class="logo-caption"><span class="tweak">F</span>orget <span class="tweak">P</span>assword</h1>
            </div> <!-- logo class -->

            <div id="email-number-fields">
              <p class="h6 text-center text-light">Enter email and contact number below to reset username and password<p>
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-envelope text-white"></i></span>
                </div>
                <input id="email" type="email" class="form-control" placeholder="enter email" required>
              </div> <!--input-group class -->

              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
                </div>
                <input id="contact_number" type="number" class="form-control" placeholder="enter contact number" onkeyup="validate();" required>
              </div> <!-- input-group class -->

              <div class="form-group">
                <button class="btn btn-default btn-block btn-custom" onclick="verifyEmailNumber();">Verify</button>
              </div>
            </div>
			</div>
			<div id="username-password-fields" style="display: none;">
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
                </div>
                <input id="username" type="text" class="form-control" placeholder="enter username" onblur="notNull(this.value, 'username_error');" >
              </div> <!--input-group class -->
              <code class="text-light small font-weight-bold float-right mb-2" id="username_error" style="display: none;"></code>

              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-lock text-white"></i></span>
                </div>
                <input id="password" type="text" class="form-control" placeholder="enter password" onkeyup="validatePassword();" >
              </div> <!-- input-group class -->
              <code class="text-light small font-weight-bold float-right mb-2" id="password_error" style="display: none;"></code>

              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
                </div>
                <input id="confirm_password" type="password" class="form-control" placeholder="confirm password" onkeyup="validatePassword();" >
              </div> <!-- input-group class -->
              <code class="text-light small font-weight-bold float-right mb-2" id="confirm_password_error" style="display: none;"></code>
              <div class="form-group">
                <button class="btn btn-default btn-block btn-custom" onclick="updateUsernamePassword();">Reset Password</button>
              </div>
			   <div class="card-footer">
				  <div class="text-center">
					<a class="text-light" onclick="displayLoginForm();" style="cursor: pointer;">Login here</a>
				  </div>
				</div> <!-- cord-footer class -->
	</div>
	</div>
</div>
</body>
</html>