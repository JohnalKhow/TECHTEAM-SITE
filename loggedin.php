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
	<link rel="stylesheet" href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/landingpage.css?version=1">
</head>

<body>
	<div class="background">
			<div class="navigation">
				<a>Home</a>
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/aboutusloggedin.php">About us</a>
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
					<h1> Introducing, TechTeam Tech Solutions.</h1>
			</div>
			
			<div class="slideshow">
			<div class="slides">
                <img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/TECHTEAM_Logo.png" style="width:100%">
            </div>

            <div class="slides">
                <img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/Sample_Program.png" style="width:100%">
            </div>

            <div class="slides">
                <img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/thanos.png" style="width:100%">
            </div>


		</div>
	<br>
	<div style="text-align:center">
		<span class="dot"></span>
		<span class="dot"></span>
		<span class="dot"></span>
	</div>	
	
	<div class="rows">
            <div class="information"> 
                <h1>Products</h1>
            </div>
            <div class="product-navigation">
                <a href="http://localhost/TECHTEAM-SITE/TECHTEAM-SITE/POS-product.php">
                    <img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/game.png" id="products">
                </a>
                <a href="http://localhost/TECHTEAM-SITE/TECHTEAM-SITE/IMS-product.php">
                    <img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/Sample_Program.png" id="products">
                </a>
                <a href="http://localhost/TECHTEAM-SITE/TECHTEAM-SITE/web-product.php">
                    <img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/POS.png" id="products">
                </a>
            </div>
        </div>
</div>
	
<script>
var index = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("slides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  index++;
  if (index > slides.length) {index = 1}
  slides[index-1].style.display = "block";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>
	
</body>

</html>