<?php
session_start();

require '/opt/lampp/htdocs/TECHTEAM-SITE/TECHTEAM-SITE/scripts/private.php';
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
	header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/home.html");
}

if(isset($_POST["register-btn"])){
	$username= $_REQUEST["username"];
	$password= $_REQUEST["password"];
	$email= $_REQUEST["email"];
	if($_REQUEST["cnfrmPassword"] !== $password)
		array_push($error_reg,"Passwords don't match!");
	if(empty($username))
	    array_push($error_reg,"Enter Full Name!");
	if(empty($email) or !preg_match('/@/', $email) or !strpos($email, "."))
	   array_push($error_reg,"Invalid Email!");
	if(empty($password))
		array_push($error_reg,"Enter Password!");
	
	$checker=mysqli_query($sqlConnect, "SELECT * FROM credentials WHERE email='$email' AND username='$username'");
	$counter=mysqli_num_rows($checker);
	
	if($counter>0){
		array_push($error_reg, "Account already exists!");
	}
	
	if(count($error_reg)==0){
		$username = trim_data($username);
		$password = trim_data($password);
		$email    = trim_data($email);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$register = "INSERT INTO `credentials` (`username`, `password`, `email`, `id`, `company`, `country`, `city`, `gender`,  `birthday`, `priveleges`) VALUES ('$username', '$password', '$email', NULL, NULL, NULL, NULL, NULL, NULL, '1' )";
		mysqli_query($sqlConnect,$register);
		$_SESSION['username']=$username;
		$_SESSION['email']=$email;
		$_SESSION['company'] =NULL;
		$_SESSION['country'] =NULL;
		$_SESSION['city'] =NULL;
		$_SESSION['gender'] =NULL;
		$_SESSION['birthday'] =NULL;
		$_SESSION['priveleges'] =1;
		header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/loggedin.php");
	}
}

if(isset($_POST["login-btn"])){
	$email=$_REQUEST["email"];
	$password=$_REQUEST["password"];
	$passwordAuth="";
	if(empty($_REQUEST["email"]))
		array_push($error_log,"Enter credentials!");
	$data=mysqli_query($sqlConnect,"SELECT * FROM credentials WHERE email='$email'");
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
		$priveleges = $SR["priveleges"];
	}
	if(count($error_log)==0){
		$password= trim_data($password);
		if(password_verify($password, $passwordAuth)){
		$_SESSION['username']= $username;
		$_SESSION['email']= $email;
		$_SESSION['company'] =$company;
		$_SESSION['country'] =$country;
		$_SESSION['city'] =$city;
		$_SESSION['gender'] =$gender;
		$_SESSION['birthday'] =$birthday;
		$_SESSION['priveleges'] =$priveleges;
		header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/loggedin.php");
	}
	else {
		$email= "";
		array_push($error_log,"Wrong Credentials!");
	}
		
	}
	
}

function trim_data($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

