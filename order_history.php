<?php   require_once '/opt/lampp/htdocs/TECHTEAM-SITE/TECHTEAM-SITE/scripts/authenticator.php'; 

$counter=0;
if(!$_SESSION["username"]){
	 header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/register.php");
}

if (!$_SESSION["company"] or !$_SESSION["country"] or !$_SESSION["city"] or !$_SESSION["gender"] or !$_SESSION["birthday"]) {
	$bool = true;
} else {
	$bool = false;
}
	$id=$_SESSION["id"];

	
	$data=mysqli_query($sqlConnect2,"SELECT * FROM `history` WHERE id='$id' ORDER BY date1 DESC ");
	

	if($_SESSION["priveleges"]==0) {
		header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account-admin.php");
	}

?>

<html>
<head>
	<title> TechTeam </title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.css?version=7">
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
			<?php if($bool): ?>
			<div class="alerts">
					<h4> Finish setting up account!</h4>
			</div>
			<?php endif; ?>
			<div class="account-navigation">
				<img src="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/assets/Images/user-icon.png" id="user-icon">
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account.php">Account</a>
				<a href="http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/account_orders.php">Order Status</a>
				<a href="#" class="active">Order History</a> 
			</div>
				<div class="order-history">
				<?php echo "<table style='width:120%'><tr><td>Project Name:</td><td>Handler:</td><td>Status:</td><td>Repository:</td><td>Completion Date:</td></tr><tr></tr><tr></tr><tr></tr>"; 
					 ?> 
				<?php while($SR=mysqli_fetch_array($data)): 
							$counter++; 
							$project= $SR["project"];
							$handler = $SR["handler"];
							$status = $SR["status1"];
							$repository = $SR["repository"];
							$date = $SR["date1"]; 
							echo "<tr><td>".$counter.".". $project . "</td> <td>". $handler . "</td><td>". $status ."</td><td>". $repository . "</td><td>" . $date ."</td></tr> <tr></tr>"; 
							?>	
				<?php endwhile; ?>
				<?php echo "</table>"; ?>
				</div>
							
									

			</div>
			
	</div>
		
	</body>
	</html>