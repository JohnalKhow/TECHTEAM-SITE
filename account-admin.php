<?php require_once '/opt/lampp/htdocs/TECHTEAM-SITE/TECHTEAM-SITE/scripts/authenticator.php';

if (!$_SESSION["username"]) {
	header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/register.php");
}

if (!$_SESSION["company"] or !$_SESSION["country"] or !$_SESSION["city"] or !$_SESSION["gender"] or !$_SESSION["birthday"]) {
	$bool = true;
} else {
	$bool = false;
}

if ($_SESSION["priveleges"] == 1) {
	header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.php");
}

$data = mysqli_query($sqlConnect2, "SELECT * FROM `history` ");


?>

<html>

<head>
	<title> TechTeam </title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.css?version=12">
</head>

<body>
	<div class="background">
		<div class="navigation">
			<a>Admin Control</a>
			<div class="navigation-right">
				<a href="account.php?logout=1">Logout</a>
			</div>
		</div>

		<div class="rows">

			<div class="account-navigation">
				<img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/user-icon.png" id="user-icon">
				<a href="" class="active">Order History</a>
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/orders-admin.php">Job Orders</a>
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/accepted-admin.php">Accepted Orders</a>
			</div>

			<div class="order-history">
				<?php echo "<table style='width:110%'><tr><td>Order ID:</td><td>Project Name:</td><td>Handler:</td><td>Status:</td><td>Repository:</td><td>Completion Date:</td></tr><tr></tr><tr></tr><tr></tr>";
				?>
				<?php while ($SR = mysqli_fetch_array($data)) :
					$project = $SR["project"];
					$handler = $SR["handler"];
					$status = $SR["status1"];
					$repository = $SR["repository"];
					$date = $SR["date1"];
					$orderid = $SR["orderid"];
					echo "<tr><td>" . $orderid . "</td> <td>" . $project . "</td> <td>" . $handler . "</td><td>" . $status . "</td><td>" . $repository . "</td><td>" . $date . "</td></tr> <tr></tr>";
				?>
				<?php endwhile; ?>
				<?php echo "</table>"; ?>
			</div>

		</div>




	</div>

</body>

</html>