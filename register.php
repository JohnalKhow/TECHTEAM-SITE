
<?php   require_once 'C:/xampp/htdocs/Project/scripts/authenticator.php'; ?>

<html>
<head>
	<title> TechTeam </title>
	<link rel="stylesheet" href="http://Localhost/Project/credentials.css">
</head>

<body>
	<div class="background">
			<div class="navigation">
				<img src="http://Localhost/Project/assets/logo.png" id="logo">
				<a href="http://Localhost/Project/home.html">Home</a>
				<a href="#products">Products</a>
				<a href="#support">About</a>
				<div class="navigation-right">
					<a>Login/Register</a>
				</div>
			</div>
			
			<div class="rows">
				<div class="information"> 
					<h3> Hello </h3>
				</div>
				
				<div class="button-container">
					<div id="buttons"></div>
						<button type="button" class="choose-btn" onclick="Login()">Login</button>
						<button type="button" class="choose-btn" onclick="SignUp()"> Sign Up</button>
				</div>
				
				<form id="SignUp" class="form-input" action="http://Localhost/Project/register.php" method="post">
					<input type="text" name="username" value= "<?php echo $username; ?>" class="form-textbox" placeholder="Username">
					<input type="text" name="email" value= "<?php echo $email; ?>" class="form-textbox" placeholder="Email Address">
					<input type="password" name="password" class="form-textbox" placeholder="Password">
					<input type="password" name="cnfrmPassword" class="form-textbox" placeholder="Confirm Password">
					<button type="submit" name="register-btn" class="submit-button">Proceed</button>
				</form>	
				
				<form id="Login" class="form-input" action="http://Localhost/Project/register.php" method="post">
					<input type="text" name="username" value= "<?php echo $username; ?>" class="form-textbox" placeholder="Username">
					<input type="password" name="password" class="form-textbox" placeholder="Password">
					<button type="submit" name="login-btn" class="submit-button" >Proceed</button>
				</form>	
				
				<?php if(count($error_reg) > 0): ?>
					<div id="alerts">
						<script>
							document.getElementById("Login").style.left= "-400px";
							document.getElementById("SignUp").style.left = "50px";
							document.getElementById("buttons").style.left = "110px";
						</script>
						<h4> Could not register! Try again! </h4>
					</div>
					<div id="error_reg">
					<?php foreach($error_reg as $error): ?>
						<li><?php echo $error."<br>";?> </li>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				
				<?php if(count($error_log) > 0): ?>
					<div id="alerts">
						<script>
							document.getElementById("Login").style.left= "50px";
							document.getElementById("SignUp").style.left = "450px";
							document.getElementById("buttons").style.left = "0px";
						</script>
						<h4> Could not Login! Try again! </h4> 
					</div>
					<div id="error_log">
					<?php foreach($error_log as $error): ?>
						<li><?php echo $error. "<br>";?> </li>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
		</div>	
	</div>
	
	<script>
		var login_box= document.getElementById("Login");
		var signup_box= document.getElementById("SignUp");
		var button_containers= document.getElementById("buttons");

		function Login(){
			login_box.style.left= "50px";
			signup_box.style.left = "450px";
			button_containers.style.left = "0px";
			error_reg.style.left= "500px";
			alerts.style.left= "500px";
		}
	
		function SignUp(){
			login_box.style.left= "-400px";
			signup_box.style.left = "50px";
			button_containers.style.left = "110px";
			error_log.style.left= "500px";
			alerts.style.left= "500px";
		}
	</script>
	
</body>

</html>