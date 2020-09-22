<?php   require_once '/opt/lampp/htdocs/TECHTEAM-SITE/TECHTEAM-SITE/scripts/authenticator.php'; 

if(!$_SESSION["username"]){
	 header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/register.php");
}

if (!$_SESSION["company"] or !$_SESSION["country"] or !$_SESSION["city"] or !$_SESSION["gender"] or !$_SESSION["birthday"]) {
	$bool = true;
} else {
	$bool = false;
}
	
?>

<html>
<head>
	<title> TechTeam </title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.css?version=4">
</head>

<body>
	<div class="background">
			<div class="navigation">
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/loggedin.php">Home</a>
				<a href="#about">About us</a>
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
			
			<div class=rows>
			<div class="account-navigation">
				<img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/user-icon.png" id="user-icon">
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.php">Account</a>
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account_orders.php">Order Status</a>
				<a href="#" class="active">Order History</a>
			</div>
			</div>
			
	</div>
		
	</body>
	</html>