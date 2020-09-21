<?php   require_once '/opt/lampp/htdocs/TECHTEAM-SITE/TECHTEAM-SITE/scripts/authenticator.php'; 

if(!$_SESSION["username"]){
	 header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/register.php");
}

if(!$_SESSION["company"] or !$_SESSION["country"] or !$_SESSION["city"] or !$_SESSION["gender"] or !$_SESSION["birthday"]) {
	$bool= true;
	}
	
?>

<html>
<head>
	<title> TechTeam </title>
	<link rel="stylesheet" href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.css">
</head>

<body>
	<div class="background">
			<div class="navigation">
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/loggedin.php">Home</a>
				<a href="#about">About Us</a>
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
				<img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/images/user-icon.png" id="user-icon">
				<a href="#" class="active">Account</a>
				<a href="#">Order Status</a>
				<a href="#">Link 2</a>
				<a href="#">Link 3</a>
				<a href="#">Link 4</a>
			</div>
			
	</div>
		
	</body>
	</html>