<?php require_once '/opt/lampp/htdocs/TECHTEAM-SITE/TECHTEAM-SITE/scripts/authenticator.php';

if (!$_SESSION["username"]) {
	header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/register.php");
}

if (!$_SESSION["company"] or !$_SESSION["country"] or !$_SESSION["city"] or !$_SESSION["gender"] or !$_SESSION["birthday"]) {
	$bool = true;
} else {
	$bool = false;
}

if ($_SESSION["priveleges"]==1){
	header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.php");
}


?>

<html>

<head>
	<title> TechTeam </title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.css?version=8">
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

		<div class="rows">
				<select name="country" >
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
				<a href="" class="active">Order History</a>
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/orders-admin.php">Job Orders</a>
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/root-admin.php">Root priveleges</a>
			</div>

		</div>




	</div>

</body>

</html>