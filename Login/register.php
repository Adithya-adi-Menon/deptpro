<?php include("includes/header.php"); ?>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/back.jpg');">
			<div class="wrap-login100">
				<form method="post" action="logic.php" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="CareTaker Name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf1fa;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Enter phone">
						<input class="input100" type="tel" name="phone" placeholder="Phone ">
						<span class="focus-input100" data-placeholder="&#xf2b6;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Enter address">
						<input class="input100" type="text" name="address" placeholder="Address">
						<span class="focus-input100" data-placeholder="&#xf2b9;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="cpass" placeholder="Confirm Password">
                        
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<input type="hidden" name="role" value="caretaker">


					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">SignUp</button>
						
					</div>
					

					<div class="text-center p-t-90">
						<a class="txt1" href="login.php">
							Already registered ?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
<?php 
      include("includes/footer.php");  
?>