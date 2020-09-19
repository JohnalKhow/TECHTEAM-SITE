<?php
session_start();

require 'C:/xampp/htdocs/Project/scripts/private.php';
$sqlConnect = mysqli_connect(HOST,USER,PASS);
if(!$sqlConnect) {
    die();
}
$selectDB = mysqli_select_db($sqlConnect,DB);
if(!$selectDB) {
    die("Can't find the database!".mysqli_error());
}

$error_reg=array();
$error_log=array();
$username ="";
$email= "";

if(isset($_GET["logout"])){
	session_destroy();
	header("location: http://Localhost/Project/home.html");
}

if(isset($_POST["register-btn"])){
	$username= $_REQUEST["username"];
	$password= $_REQUEST["password"];
	$email= $_REQUEST["email"];
	if($_REQUEST["cnfrmPassword"] !== $password)
		array_push($error_reg,"Passwords don't match!");
	if(empty($username))
	    array_push($error_reg,"Enter Username!");
	if(empty($email))
	   array_push($error_reg,"Enter Email!");
	if(empty($password))
		array_push($error_reg,"Enter Password!");
	
	$checker=mysqli_query($sqlConnect, "SELECT * FROM credentials WHERE email='$email' AND username='$username'");
	$counter=mysqli_num_rows($checker);
	
	if($counter>0){
		array_push($error_reg, "Email/Username is taken!");
	}
	
	if(count($error_reg)==0){
		$password = password_hash($password, PASSWORD_DEFAULT);
		$register = "INSERT INTO `credentials` (`username`, `password`, `email`, `id`, `company`, `country`, `city`, `gender`,  `birthday` ) VALUES ('$_POST[username]', '$password', '$_POST[email]', NULL, NULL, NULL, NULL, NULL, NULL)";
		mysqli_query($sqlConnect,$register);
		$_SESSION['username']=$_POST["username"];
		$_SESSION['email']=$_POST["email"];
		header("location: http://Localhost/Project/loggedin.php");
	}
}

if(isset($_POST["login-btn"])){
	$username=$_REQUEST["username"];
	$password=$_REQUEST["password"];
	if(empty($_REQUEST["username"]))
		array_push($error_log,"Enter Username!");
	$username= $_REQUEST["username"];
	$data=mysqli_query($sqlConnect,"SELECT * FROM credentials WHERE username='$username'");
	if(!$data) {
		die();
	}
	while($SR=mysqli_fetch_array($data)) {
		$username = $SR["username"];
		$passwordAuth = $SR["password"];
		$email = $SR["email"];
		$company = $SR["company"];
		$country = $SR["country"];
		$city = $SR["city"];
		$gender = $SR["gender"];
		$birthday = $SR["birthday"];
	}
	if(count($error_log)==0){
		if(password_verify($password, $passwordAuth)){
		$_SESSION['username']= $username;
		$_SESSION['email']= $email;
		$_SESSION['company'] =$company;
		$_SESSION['country'] =$country;
		$_SESSION['city'] =$city;
		$_SESSION['gender'] =$gender;
		$_SESSION['birthday'] =$birthday;
		header("location: http://Localhost/Project/loggedin.php");
	}
	else {
		$email= "";
		array_push($error_log,"Wrong Credentials!");
	}
		
	}
	
}


?>

