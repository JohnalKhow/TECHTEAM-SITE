<?php require_once '/opt/lampp/htdocs/TECHTEAM-SITE/TECHTEAM-SITE/scripts/authenticator.php';

if (!$_SESSION["username"]) {
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
    <link rel="stylesheet" href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/landingpage.css?version=1">
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
        <?php if ($bool) : ?>
            <div id="alerts">
                <script>
                </script>
                <h4> Finish setting up account! </h4>
            </div>
        <?php endif; ?>
        <div class="information">
            <h1> TechTeam Tech Solutions.</h1><br>
        </div>



        <div class="row-container">
            <div class="information">
                <h3>What is TechTeam Tech Solutions? </h3>
            </div>
            <div class="paragraph">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;TechTeam Tech Solutions is a company that wants to make a change in the hardware/software e-commerce market.
                    TechTeam offers a wide variety of products to its customers which they can make a job request of
                    in the TechTeam website. </p>
            </div>
            <div class="information">
                <h3>Our History? </h3>
            </div>
            <div class="paragraph">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;TechTeam Tech Solutions was started by a group of highschool students who sought to hone
                    their technological knowledge through various works and projects. Through these projects and works,
                    the company was able to gain a reputation for fulfilling projects among students and small companies.
                    This became the foundation of the company pursuing more professional level works that could be used
                    in bigger companies. </p>
            </div>
            <div class="information">
                <h3>Our Mission?</h3>
            </div>
            <div class="paragraph">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;TechTeam Tech Solutions aims to create quality digital solutions whilst keeping the costs relatively low. TechTeam does not forget their roots, as such, they make sure that their products
                    and services are open to customers from the lower end of the spectrum to the higher end. </p>
            </div>
            <div class="information">
                <h3>Our Vision?</h3>
            </div>
            <div class="paragraph">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;TechTeam Tech Solutions will be one of the top pioneers in the hardware/software e-commerce market. </p>
            </div>
            <div class="information">
                <h3>Got any questions?</h3>
            </div>
            <div class="paragraph">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;You can contact us using the contact details below:</p><br>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cellphone Number: &nbsp;&nbsp;&nbsp;&nbsp;09950657161</li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Support Email: &nbsp;&nbsp;&nbsp;&nbsp;TECHTEAM@TTeam.com</li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Follow us on Twitter and Instagram: &nbsp;&nbsp;&nbsp;&nbsp;@TechTeamSol</li>
            </div>
        </div>
    </div>


</body>

</html>