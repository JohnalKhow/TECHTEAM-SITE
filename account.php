<?php   require_once 'C:/xampp/htdocs/Project/scripts/authenticator.php'; 

if(!$_SESSION["username"]){
	 header("location: http://Localhost/Project/register.php");
}

if(!$_SESSION["company"] or !$_SESSION["country"] or !$_SESSION["city"] or !$_SESSION["gender"] or !$_SESSION["birthday"]) {
	$bool= true;
	}
	
?>

<html>
<head>
	<title> TechTeam </title>
	<link rel="stylesheet" href="http://Localhost/Project/account.css">
</head>

<body>
	<div class="background">
			<div class="navigation">
				<img src="http://Localhost/Project/assets/logo.png" id="logo">
				<a href="http://Localhost/Project/loggedin.php">Home</a>
				<a href="#products">Products</a>
				<a href="#about">About</a>
				<div class="navigation-right">
					<a href="account.php?logout=1">Logout</a>
					<a>Account</a>
				</div>
			</div>
			
			<?php if($bool): ?>
			<div id="alerts">
					<h4> Finish setting up account!</h4>
			</div>
			<?php endif; ?>
			
			<div class="account-navigation">
				<img src="http://Localhost/Project/assets/images/user-icon.png" id="user-icon">
				<a href="#" class="active">Account</a>
				<a href="#">Order Status</a>
				<a href="#">Link 2</a>
				<a href="#">Link 3</a>
				<a href="#">Link 4</a>
			</div>
			
	</div>
		
	</body>
	</html>