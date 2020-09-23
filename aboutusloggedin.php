<?php   require_once '/opt/lampp/htdocs/TECHTEAM-SITE/TECHTEAM-SITE/scripts/authenticator.php'; 

if(!$_SESSION["username"]){
	 header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/register.php");
}

if(!$_SESSION["company"] or !$_SESSION["country"] or !$_SESSION["city"] or !$_SESSION["gender"] or !$_SESSION["birthday"]) {
	$bool=true;
	}
else{
	$bool=false;
}
?>

<html>
<head>
	<title> TechTeam </title>
	<link rel="stylesheet" href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/landingpage.css">
</head>

<body>
	<div class="background">
			<div class="navigation">
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/loggedin.php">Home</a>
				<a>About us</a>
				<div class="navigation-right">
					<a href="loggedin.php?logout=1">Logout</a>
					<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.php">Account</a>
				</div>
			</div>
			<?php if($bool): ?>
			<div id="alerts">
						<script>
						</script>
						<h4> Finish setting up account! </h4>
				</div>
			<?php endif; ?>
			<div class="information"> 
                    <h1> Introducing the TEAM in </h2><br>
                     <h2> TechTeam Tech Solutions.</h1><br>
                    
			</div>
			
	
	<div class="rows">
            
        </div>
</div>
	
	
</body>

</html>