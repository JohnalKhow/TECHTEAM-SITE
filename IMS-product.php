<?php   require_once '/opt/lampp/htdocs/TECHTEAM-SITE/TECHTEAM-SITE/scripts/authenticator.php'; 

?>

<html>
<head>
    <title> TechTeam </title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/products.css?version=7">
</head>

<body>
    <div class="background">
        <?php if(empty($_SESSION['username'])): ?>
        <div class="navigation">
            <a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/home.html" >Home</a>
            <a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/aboutus.php">About us</a>
            <div class="navigation-right">
                <a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/register.php">Login/Register</a>
            </div>
        </div>

        <?php else: ?>
            <div class="navigation">
            <a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/loggedin.php">Home</a>
            <a href="#about">About us</a>
            <div class="navigation-right">
                <a href="loggedin.php?logout=1">Logout</a>
                <a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.php">Account</a>
            </div>
        </div>

        <?php endif; ?>
    

        <div class="rows">
        <label class="product-name">Inventory Management Systems</label>
		<br>
        

        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/logo.png" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/sample program.png" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/game.png" style="width:100%">
            </div>
        </div>

        <?php if(empty($_SESSION['username'])): ?>
            <label class="body-text">Description:</label><br><br>
            <p class="description"><?php echo $IMS_desc; ?></p><br>
            <div class="bullets">
            <li>Full database integration</li>
            <li>Comes with a Graphical User Interface</li>
            <li>Full database integration</li>
            </div>
            
            <form id="Account" class="form-input-not" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<button type="submit" name="purchase-not" class="buy">Buy</button>
            </form>

        <?php else: ?>
            <label class="body-text">Description:</label><br><br>
            <p class="description"><?php echo $IMS_desc; ?></p><br>
            <div class="bullets">
            <li>Full database integration</li>
            <li>Comes with a Graphical User Interface</li>
            <li>Full database integration</li>
            </div>

            <form id="Account" class="form-input" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label>Order Details:</label><br>
                <input type="text" name="project-name" class="form-textbox-lengthy" maxlength="8"  placeholder="Program Name">
				<input type="text" name="remarks" class="form-textbox-lengthy" placeholder="Remarks">
				<input type="text" name="specifications" class="form-textbox-lengthy" placeholder="Specifications e.g. Operating System">
				<br><br>
				<label id="labels">Deadline: </label> 
                <input type="date" id="deadline" name="dead1" >
                <input  type="hidden" name="type" value="IMS" >
				<button type="submit" name="purchase" class="buy">Order</button>
            </form>

            <?php if(count($error_buy) > 0): ?>
                    <div id="alerts">
					<?php foreach($error_buy as $error): ?>
						<li><?php echo $error."<br>";?> </li>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
            
        <?php endif; ?>
    
        <br>

        <div style="text-align:left">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>


        </div>


    </div>
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 3000);
        }
    </script>


</body>

</html>
	