<?php require_once '/opt/lampp/htdocs/TECHTEAM-SITE/TECHTEAM-SITE/scripts/authenticator.php';

if (!$_SESSION["username"]) {
	header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/register.php");
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
	<link rel="stylesheet" href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.css?version=10">
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

		<div class="rows">
			<form id="Account" class="form-input" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<label id="labels">Full Name and Email :</label><br>
				<input type="text" name="username" value="<?php echo $_SESSION["username"]; ?>" class="form-textbox-lengthy" placeholder="Full Name">
				<input type="text" name="email" value="<?php echo $_SESSION["email"]; ?>" class="form-textbox" placeholder="Email Address">
				<br><br>
				<label id="labels">Birthday :</label>
				<input type="date" id="birthday" name="birthday" value="<?php echo $_SESSION["birthday"]; ?>">
				<label id="labels">Gender :</label>
				<label id="labels">Male </label>
				<input type="radio" name="gender" value="Male" <?php echo ($_SESSION['gender'] == "Male") ? 'checked="checked"' : ''; ?>>
				<label id="labels">Female </label>
				<input type="radio" name="gender" value="Female" <?php echo ($_SESSION['gender'] == "Female") ? 'checked="checked"' : ''; ?>>
				<label id="labels">LGBTQ+ </label>
				<input type="radio" name="gender" value="LGBTQ+" <?php echo ($_SESSION['gender'] == "LGBTQ+") ? 'checked="checked"' : ''; ?>>
				<br><br>
				<label id="labels">Country :</label><br>
				<select name="country">
					<?php foreach ($countries as $key => $val) { ?>
						<option value="<?php echo $key; ?>" <?php
															if ($key == $_SESSION['country']) echo ' selected="selected"'; ?>><?php echo $val; ?></option><?php
																																						} ?>
				</select>
				<br><br>
				<label id="labels">Company Details :</label><br>
				<input type="text" name="company" class="form-textbox-lengthy" value="<?php echo $_SESSION["company"]; ?>" placeholder="Company Name">
				<input type="text" name="city" id="form-textbox-lengthiest" value="<?php echo $_SESSION["city"]; ?>" placeholder="Full Company Address">
				<br><br>
				<label id="labels">Change Password :</label><br>
				<input type="password" name="old-password" class="form-textbox" placeholder="Old Password">
				<input type="password" name="new-password" class="form-textbox" placeholder="New Password">
				<input type="password" name="cnfrmPassword" class="form-textbox" placeholder="Confirm Password"><br>
				<button type="submit" name="save-btn" class="submit-button">Save</button>
			</form>

			<?php if ($bool) : ?>
				<div class="alerts">
					<h4> Finish setting up account!</h4>
				</div>
			<?php endif; ?>



			<?php if (count($error_acc) > 0) : ?>
				<div id="errors">
					<h4>Could not save!</h4>
				</div>
				<div id="error_acc">
					<?php foreach ($error_acc as $error) : ?>
						<li><?php echo $error . "<br>"; ?> </li>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="account-navigation">
				<img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/user-icon.png" id="user-icon">
				<a href="" class="active">Account</a>
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account_orders.php">Order Status</a>
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/order_history.php">Order History</a>
			</div>

		</div>




	</div>

</body>

</html>