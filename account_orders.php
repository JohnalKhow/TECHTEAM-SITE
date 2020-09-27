<?php require_once '/opt/lampp/htdocs/TECHTEAM-SITE/TECHTEAM-SITE/scripts/authenticator.php';

if (!$_SESSION["username"]) {
	header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/register.php");
}

if (isset($_POST["add-btn"])) {
	header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/loggedin.php");
}

if (!$_SESSION["company"] or !$_SESSION["country"] or !$_SESSION["city"] or !$_SESSION["gender"] or !$_SESSION["birthday"]) {
	$bool = true;
} else {
	$bool = false;
}


if ($_SESSION["priveleges"] == 0) {
	header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account-admin.php");
}

?>

<html>

<head>
	<title> TechTeam </title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.css?version=5">

</head>

<body>
	<div class="background">
		<div class="navigation">
			<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/loggedin.php">Home</a>
			<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/aboutusloggedin.php">About us</a>
			<div class="navigation-right">
				<a href="account.php?logout=1">Logout</a>
				<a>Account</a>
			</div>
		</div>


		<div class=rows>

			<?php if ($bool) : ?>
				<div class="alerts">
					<h4> Finish setting up account!</h4>
				</div>
			<?php endif; ?>

			<?php if (empty($_SESSION['project']) and empty($_SESSION['project2'])) : ?>
				<div class="project-alerts">
					<h4> No active projects!</h4>
				</div>
				<form class="add-empty" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<button type="submit" name="add-btn" class="add-button">+</button>
				</form>

			<?php elseif (empty($_SESSION['project'])) : ?>
				<div class="project-1">
					<label id="project-names"> <?php echo $_SESSION["project2"]; ?> </label>
					<br>
					<label id="label">Deadline: <?php echo $_SESSION["dead1"]; ?></label><br>
					<?php if ($_SESSION['status2'] == 1) : ?>
						<label id="label">Status: 20% </label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:20%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Order Confirmed </label>
						<form class="cancel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="cancel-2" class="complete-cancel">Cancel Order</button>
						</form>
						<br>
					<?php elseif ($_SESSION['status2'] == 2) : ?>
						<label id="label">Status: 40%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:40%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Assigned to Handler </label>
						<form class="cancel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="cancel-2" class="complete-cancel">Cancel Order</button>
						</form>
						<br>
					<?php elseif ($_SESSION['status2'] == 3) : ?>
						<label id="label">Status: 60%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:60%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Coding </label>
						<form class="cancel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="cancel-2" class="complete-cancel">Cancel Order</button>
						</form>
						<br>
					<?php elseif ($_SESSION['status2'] == 4) : ?>
						<label id="label">Status: 80%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:80%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Bug Fixing</label>
						<br>
					<?php elseif ($_SESSION['status2'] == 5) : ?>
						<label id="label">Status: 100%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:100%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Submitted for revisions</label>
						<form class="complete" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="complete-2" class="complete-cancel">Complete Order</button>
						</form>
						<br>
					<?php endif; ?>
					<br><label id="label">Customer Remarks: </label>
					<label id="body-text"> <?php echo $_SESSION["remarks2"]; ?> </label> <br>
					<label id="label">Specifications: </label>
					<label id="body-text"> <?php echo $_SESSION["specs2"]; ?> </label> <br>
					<label id="label">Handler: </label>
					<label id="body-text"> <?php echo $_SESSION["handler2"]; ?> </label><br>
					<label id="label">Repository Link: </label>
					<label id="body-text"> <?php echo $_SESSION["repository2"]; ?> </label><br>

					<form class="add" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<button type="submit" name="add-btn" class="add-button">+</button>
					</form>

				</div>



			<?php elseif (empty($_SESSION['project2'])) : ?>
				<div class="project-1">
					<label id="project-names"> <?php echo $_SESSION["project"]; ?> </label>
					<br>
					<label id="label">Deadline: <?php echo $_SESSION["dead1"]; ?></label><br>
					<?php if ($_SESSION['status'] == 1) : ?>
						<label id="label">Status: 20%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:20%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Order Confirmed </label>
						<form class="cancel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="cancel-1" class="complete-cancel">Cancel Order</button>
						</form>
						<br>
					<?php elseif ($_SESSION['status'] == 2) : ?>
						<label id="label">Status: 40%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:40%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Assigned to Handler </label>
						<form class="cancel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="cancel-1" class="complete-cancel">Cancel Order</button>
						</form>
						<br>
					<?php elseif ($_SESSION['status'] == 3) : ?>
						<label id="label">Status: 60%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:60%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Coding </label>
						<form class="cancel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="cancel-1" class="complete-cancel">Cancel Order</button>
						</form>
						<br>
					<?php elseif ($_SESSION['status'] == 4) : ?>
						<label id="label">Status: 80%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:80%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Bug Fixing</label>
						<br>
					<?php elseif ($_SESSION['status'] == 5) : ?>
						<label id="label">Status: 100%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:100%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Submitted for revisions</label>
						<form class="complete" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="complete-1" class="complete-cancel">Complete Order</button>
						</form>
						<br>
					<?php endif; ?>
					<br><label id="label">Customer Remarks: </label>
					<label id="body-text"> <?php echo $_SESSION["remarks"]; ?> </label> <br>
					<label id="label">Specifications: </label>
					<label id="body-text"> <?php echo $_SESSION["specs1"]; ?> </label> <br>
					<label id="label">Handler: </label>
					<label id="body-text"> <?php echo $_SESSION["handler"]; ?> </label><br>
					<label id="label">Repository Link: </label>
					<label id="body-text"> <?php echo $_SESSION["repository"]; ?> </label><br>
					<form class="add" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<button type="submit" name="add-btn" class="add-button">+</button>
					</form>

				</div>



			<?php else : ?>
				<div class="project-1">
					<label id="project-names"> <?php echo $_SESSION["project"]; ?> </label>
					<br>
					<label id="label">Deadline: <?php echo $_SESSION["dead1"]; ?></label><br>
					<?php if ($_SESSION['status'] == 1) : ?>
						<label id="label">Status: 20%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:20%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Order Confirmed </label>
						<form class="cancel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="cancel-1" class="complete-cancel">Cancel Order</button>
						</form>
						<br>
					<?php elseif ($_SESSION['status'] == 2) : ?>
						<label id="label">Status: 40%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:40%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Assigned to Handler </label>
						<form class="cancel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="cancel-1" class="complete-cancel">Cancel Order</button>
						</form>
						<br>
					<?php elseif ($_SESSION['status'] == 3) : ?>
						<label id="label">Status: 60%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:60%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Coding </label>
						<form class="cancel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="cancel-1" class="complete-cancel">Cancel Order</button>
						</form>
						<br>
					<?php elseif ($_SESSION['status'] == 4) : ?>
						<label id="label">Status: 80%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:80%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Bug Fixing</lab>
							<br>
						<?php elseif ($_SESSION['status'] == 5) : ?>
							<label id="label">Status: 100%</label>
							<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
								<div class="w3-container w3-blue w3-round-xlarge" style="width:100%; height: 10%; ">
								</div>
							</div>
							<label id="status"> Submitted for revisions</label>
							<form class="complete" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
								<button type="submit" name="complete-1" class="complete-cancel">Complete Order</button>
							</form>
							<br>
						<?php endif; ?>
						<br><label id="label">Customer Remarks: </label>
						<label id="body-text"> <?php echo $_SESSION["remarks"]; ?> </label> <br>
						<label id="label">Specifications: </label>
						<label id="body-text"> <?php echo $_SESSION["specs1"]; ?> </label> <br>
						<label id="label">Handler: </label>
						<label id="body-text"> <?php echo $_SESSION["handler"]; ?> </label><br>
						<label id="label">Repository Link: </label>
						<label id="body-text"> <?php echo $_SESSION["repository"]; ?> </label><br><br>
				</div>

				<div class="project-2">
					<label id="project-names"> <?php echo $_SESSION["project2"]; ?> </label>
					<br>
					<label id="label">Deadline: <?php echo $_SESSION["dead2"]; ?></label><br>
					<?php if ($_SESSION['status2'] == 1) : ?>
						<label id="label">Status: 20%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:20%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Order Confirmed </label>
						<form class="cancel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="cancel-2" class="complete-cancel">Cancel Order</button>
						</form>
						<br>
					<?php elseif ($_SESSION['status2'] == 2) : ?>
						<label id="label">Status: 40%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:40%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Assigned to Handler </label>
						<form class="cancel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="cancel-2" class="complete-cancel">Cancel Order</button>
						</form>
						<br>
					<?php elseif ($_SESSION['status2'] == 3) : ?>
						<label id="label">Status: 60%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:60%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Coding </label>
						<form class="cancel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="cancel-2" class="complete-cancel">Cancel Order</button>
						</form>
						<br>
					<?php elseif ($_SESSION['status2'] == 4) : ?>
						<label id="label">Status: 80%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:80%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Bug Fixing</label>
						<br>
					<?php elseif ($_SESSION['status2'] == 5) : ?>
						<label id="label">Status: 100%</label>
						<div class="w3-light-grey w3-round-xlarge" style="width:50%; position: relative; left: 35%; box-shadow: 3px 3px 9px 3px rgba(0, 0, 0, .2);">
							<div class="w3-container w3-blue w3-round-xlarge" style="width:100%; height: 10%; ">
							</div>
						</div>
						<label id="status"> Submitted for revisions</label>
						<form class="complete" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
							<button type="submit" name="complete-2" class="complete-cancel">Complete Order</button>
						</form>
						<br>
					<?php endif; ?>
					<br><label id="label">Customer Remarks: </label>
					<label id="body-text"> <?php echo $_SESSION["remarks2"]; ?> </label> <br>
					<label id="label">Specifications: </label>
					<label id="body-text"> <?php echo $_SESSION["specs2"]; ?> </label> <br>
					<label id="label">Handler: </label>
					<label id="body-text"> <?php echo $_SESSION["handler2"]; ?> </label><br>
					<label id="label">Repository Link: </label>
					<label id="body-text"> <?php echo $_SESSION["repository2"]; ?> </label><br>
				</div>
			<?php endif; ?>

			<div class="account-navigation">
				<img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/user-icon.png" id="user-icon">
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.php">Account</a>
				<a href="#" class="active">Order Status</a>
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/order_history.php">Order History</a>
			</div>
		</div>


	</div>

</body>

</html>