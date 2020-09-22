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
//INIT
$countries = array("AF" => "Afghanistan",
"AX" => "Åland Islands",
"AL" => "Albania",
"DZ" => "Algeria",
"AS" => "American Samoa",
"AD" => "Andorra",
"AO" => "Angola",
"AI" => "Anguilla",
"AQ" => "Antarctica",
"AG" => "Antigua and Barbuda",
"AR" => "Argentina",
"AM" => "Armenia",
"AW" => "Aruba",
"AU" => "Australia",
"AT" => "Austria",
"AZ" => "Azerbaijan",
"BS" => "Bahamas",
"BH" => "Bahrain",
"BD" => "Bangladesh",
"BB" => "Barbados",
"BY" => "Belarus",
"BE" => "Belgium",
"BZ" => "Belize",
"BJ" => "Benin",
"BM" => "Bermuda",
"BT" => "Bhutan",
"BO" => "Bolivia",
"BA" => "Bosnia and Herzegovina",
"BW" => "Botswana",
"BV" => "Bouvet Island",
"BR" => "Brazil",
"IO" => "British Indian Ocean Territory",
"BN" => "Brunei Darussalam",
"BG" => "Bulgaria",
"BF" => "Burkina Faso",
"BI" => "Burundi",
"KH" => "Cambodia",
"CM" => "Cameroon",
"CA" => "Canada",
"CV" => "Cape Verde",
"KY" => "Cayman Islands",
"CF" => "Central African Republic",
"TD" => "Chad",
"CL" => "Chile",
"CN" => "China",
"CX" => "Christmas Island",
"CC" => "Cocos (Keeling) Islands",
"CO" => "Colombia",
"KM" => "Comoros",
"CG" => "Congo",
"CD" => "Congo, The Democratic Republic of The",
"CK" => "Cook Islands",
"CR" => "Costa Rica",
"CI" => "Cote D'ivoire",
"HR" => "Croatia",
"CU" => "Cuba",
"CY" => "Cyprus",
"CZ" => "Czech Republic",
"DK" => "Denmark",
"DJ" => "Djibouti",
"DM" => "Dominica",
"DO" => "Dominican Republic",
"EC" => "Ecuador",
"EG" => "Egypt",
"SV" => "El Salvador",
"GQ" => "Equatorial Guinea",
"ER" => "Eritrea",
"EE" => "Estonia",
"ET" => "Ethiopia",
"FK" => "Falkland Islands (Malvinas)",
"FO" => "Faroe Islands",
"FJ" => "Fiji",
"FI" => "Finland",
"FR" => "France",
"GF" => "French Guiana",
"PF" => "French Polynesia",
"TF" => "French Southern Territories",
"GA" => "Gabon",
"GM" => "Gambia",
"GE" => "Georgia",
"DE" => "Germany",
"GH" => "Ghana",
"GI" => "Gibraltar",
"GR" => "Greece",
"GL" => "Greenland",
"GD" => "Grenada",
"GP" => "Guadeloupe",
"GU" => "Guam",
"GT" => "Guatemala",
"GG" => "Guernsey",
"GN" => "Guinea",
"GW" => "Guinea-bissau",
"GY" => "Guyana",
"HT" => "Haiti",
"HM" => "Heard Island and Mcdonald Islands",
"VA" => "Holy See (Vatican City State)",
"HN" => "Honduras",
"HK" => "Hong Kong",
"HU" => "Hungary",
"IS" => "Iceland",
"IN" => "India",
"ID" => "Indonesia",
"IR" => "Iran, Islamic Republic of",
"IQ" => "Iraq",
"IE" => "Ireland",
"IM" => "Isle of Man",
"IL" => "Israel",
"IT" => "Italy",
"JM" => "Jamaica",
"JP" => "Japan",
"JE" => "Jersey",
"JO" => "Jordan",
"KZ" => "Kazakhstan",
"KE" => "Kenya",
"KI" => "Kiribati",
"KP" => "Korea, Democratic People's Republic of",
"KR" => "Korea, Republic of",
"KW" => "Kuwait",
"KG" => "Kyrgyzstan",
"LA" => "Lao People's Democratic Republic",
"LV" => "Latvia",
"LB" => "Lebanon",
"LS" => "Lesotho",
"LR" => "Liberia",
"LY" => "Libyan Arab Jamahiriya",
"LI" => "Liechtenstein",
"LT" => "Lithuania",
"LU" => "Luxembourg",
"MO" => "Macao",
"MK" => "Macedonia, The Former Yugoslav Republic of",
"MG" => "Madagascar",
"MW" => "Malawi",
"MY" => "Malaysia",
"MV" => "Maldives",
"ML" => "Mali",
"MT" => "Malta",
"MH" => "Marshall Islands",
"MQ" => "Martinique",
"MR" => "Mauritania",
"MU" => "Mauritius",
"YT" => "Mayotte",
"MX" => "Mexico",
"FM" => "Micronesia, Federated States of",
"MD" => "Moldova, Republic of",
"MC" => "Monaco",
"MN" => "Mongolia",
"ME" => "Montenegro",
"MS" => "Montserrat",
"MA" => "Morocco",
"MZ" => "Mozambique",
"MM" => "Myanmar",
"NA" => "Namibia",
"NR" => "Nauru",
"NP" => "Nepal",
"NL" => "Netherlands",
"AN" => "Netherlands Antilles",
"NC" => "New Caledonia",
"NZ" => "New Zealand",
"NI" => "Nicaragua",
"NE" => "Niger",
"NG" => "Nigeria",
"NU" => "Niue",
"NF" => "Norfolk Island",
"MP" => "Northern Mariana Islands",
"NO" => "Norway",
"OM" => "Oman",
"PK" => "Pakistan",
"PW" => "Palau",
"PS" => "Palestinian Territory, Occupied",
"PA" => "Panama",
"PG" => "Papua New Guinea",
"PY" => "Paraguay",
"PE" => "Peru",
"PH" => "Philippines",
"PN" => "Pitcairn",
"PL" => "Poland",
"PT" => "Portugal",
"PR" => "Puerto Rico",
"QA" => "Qatar",
"RE" => "Reunion",
"RO" => "Romania",
"RU" => "Russian Federation",
"RW" => "Rwanda",
"SH" => "Saint Helena",
"KN" => "Saint Kitts and Nevis",
"LC" => "Saint Lucia",
"PM" => "Saint Pierre and Miquelon",
"VC" => "Saint Vincent and The Grenadines",
"WS" => "Samoa",
"SM" => "San Marino",
"ST" => "Sao Tome and Principe",
"SA" => "Saudi Arabia",
"SN" => "Senegal",
"RS" => "Serbia",
"SC" => "Seychelles",
"SL" => "Sierra Leone",
"SG" => "Singapore",
"SK" => "Slovakia",
"SI" => "Slovenia",
"SB" => "Solomon Islands",
"SO" => "Somalia",
"ZA" => "South Africa",
"GS" => "South Georgia and The South Sandwich Islands",
"ES" => "Spain",
"LK" => "Sri Lanka",
"SD" => "Sudan",
"SR" => "Suriname",
"SJ" => "Svalbard and Jan Mayen",
"SZ" => "Swaziland",
"SE" => "Sweden",
"CH" => "Switzerland",
"SY" => "Syrian Arab Republic",
"TW" => "Taiwan, Province of China",
"TJ" => "Tajikistan",
"TZ" => "Tanzania, United Republic of",
"TH" => "Thailand",
"TL" => "Timor-leste",
"TG" => "Togo",
"TK" => "Tokelau",
"TO" => "Tonga",
"TT" => "Trinidad and Tobago",
"TN" => "Tunisia",
"TR" => "Turkey",
"TM" => "Turkmenistan",
"TC" => "Turks and Caicos Islands",
"TV" => "Tuvalu",
"UG" => "Uganda",
"UA" => "Ukraine",
"AE" => "United Arab Emirates",
"GB" => "United Kingdom",
"US" => "United States",
"UM" => "United States Minor Outlying Islands",
"UY" => "Uruguay",
"UZ" => "Uzbekistan",
"VU" => "Vanuatu",
"VE" => "Venezuela",
"VN" => "Viet Nam",
"VG" => "Virgin Islands, British",
"VI" => "Virgin Islands, U.S.",
"WF" => "Wallis and Futuna",
"EH" => "Western Sahara",
"YE" => "Yemen",
"ZM" => "Zambia",
"ZW" => "Zimbabwe");
$error_reg=array();
$error_log=array();
$error_acc=array();
$username ="";
$email= "";
$project= $project2= $status= $status2= $handler= $handler2= $remarks= $remarks2= $repository = $repository2 = $proj_limit= "";

if(!empty($_SESSION['id'])){
	$job_data=mysqli_query($sqlConnect,"SELECT * FROM orders WHERE id='$_SESSION[id]'");

		if(!$job_data) {
			die();
		}
		while($job=mysqli_fetch_array($job_data)) {
			$project= $job["project"];
			$project2= $job["project2"];
			$status=  $job["status1"];
			$status2=  $job["status2"];
			$handler= $job["handler"];
			$handler2= $job["handler2"];
			$remarks= $job["remarks"];
			$remarks2= $job["remarks2"];
			$repository = $job["repository"];
			$repository2 = $job["repository2"];
			$proj_limit= $job["proj_limit"];
		}
		$_SESSION['project']=  $project;
		$_SESSION['project2']= $project2;
		$_SESSION['status'] =$status;
		$_SESSION['status2'] =$status2;
		$_SESSION['handler'] =$handler;
		$_SESSION['handler2'] =$handler2;
		$_SESSION['remarks'] =$remarks;
		$_SESSION['remarks2'] =$remarks2;
		$_SESSION['repository'] =$repository;
		$_SESSION['repository2'] =$repository2;
		$_SESSION['proj_limit'] =$proj_limit;
}

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
	
	$checker=mysqli_query($sqlConnect, "SELECT * FROM credentials WHERE email='$email'");
	$counter=mysqli_num_rows($checker);
	
	if($counter>0){
		array_push($error_reg, "Account already exists!");
	}
	
	if(count($error_reg)==0){
		$username = trim_data($username);
		$password = trim_data($password);
		$email    = trim_data($email);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$register = "INSERT INTO `credentials` (`username`, `pass`, `email`, `id`, `company`, `country`, `city`, `gender`,  `birthday`, `priveleges`) VALUES ('$username', '$password', '$email', NULL, NULL, NULL, NULL, NULL, NULL, '1' )";
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
		$passwordAuth = $SR["pass"];
		$email = $SR["email"];
		$id = $SR["id"];
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
		$_SESSION['id']=$id;
		$_SESSION['company'] =$company;
		$_SESSION['country'] =$country;
		$_SESSION['city'] =$city;
		$_SESSION['gender'] =$gender;
		$_SESSION['birthday'] =$birthday;
		$_SESSION['priveleges'] =$priveleges;
		$_SESSION['key']=$passwordAuth;

		header("location: http://Localhost/TECHTEAM-SITE/TECHTEAM-SITE/loggedin.php");
	}
	else {
		$email= "";
		array_push($error_log,"Wrong Credentials!");
	}
		
	}
	
}

if(isset($_POST["save-btn"])){
	$id=$_SESSION["id"];
	if(empty($_REQUEST["old-password"])){
		if(empty($_REQUEST["username"]))
	    	array_push($error_acc,"Enter Full Name!");
		if(empty($_REQUEST["email"]) or !preg_match('/@/', $_REQUEST["email"]) or !strpos(($_REQUEST["email"]), "."))
			   array_push($error_acc,"Invalid Email!");
		if(empty($_REQUEST["birthday"]))
			array_push($error_acc,"Invalid Birthday");
		if(empty($_REQUEST["gender"]))
			array_push($error_acc,"Invalid Choice!");
		if(empty($_REQUEST["company"]))
			array_push($error_acc,"Enter Company!");
		if(empty($_REQUEST["country"]))
			array_push($error_acc,"Enter Country!");
		if(empty($_REQUEST["city"]))
			array_push($error_acc,"Invalid Address!");
		
		$checker=mysqli_query($sqlConnect, "SELECT * FROM credentials WHERE email='$email'");
		$counter=mysqli_num_rows($checker);

		if($counter>0){
				array_push($error_acc, "Email is already registered!");
		}
			
		if(count($error_acc)==0){
			$username = trim_data($_REQUEST["username"]);
			$email    = trim_data($_REQUEST["email"]);
			$birthday = trim_data($_REQUEST["birthday"]);
			$gender   = trim_data($_REQUEST["gender"]);
			$company  = trim_data($_REQUEST["company"]);
			$country  = trim_data($_REQUEST["country"]);
			$city     = trim_data($_REQUEST["city"]);
			$update = "UPDATE `credentials` SET username='$username', email='$email', company='$company', country='$country', city='$city', gender='$gender', birthday='$birthday' WHERE id='$id'";
			mysqli_query($sqlConnect,$update);
			$_SESSION['username']=$username;
			$_SESSION['email']=$email;
			$_SESSION['company'] =$company;
			$_SESSION['country'] =$country;
			$_SESSION['city'] =$city;
			$_SESSION['gender'] =$gender;
			$_SESSION['birthday'] =$birthday;
			$_SESSION['changes']=true;
			$_SESSION['priveleges'] =1;
			header("Refresh:0");
			}
	}

	else {
	$password=trim_data($_REQUEST["old-password"]);
	if($_REQUEST["cnfrmPassword"] !== $_REQUEST["new-password"])
		array_push($error_acc,"Passwords don't match!");
	if(!password_verify($password, $_SESSION['key']))
		array_push($error_acc,"Incorrect Old Password!");
	if(empty($_REQUEST["username"]))
		array_push($error_acc,"Enter Full Name!");
	if(empty($_REQUEST["email"]) or !preg_match('/@/', $_REQUEST["email"]) or !strpos(($_REQUEST["email"]), "."))
		   array_push($error_acc,"Invalid Email!");
	if(empty($_REQUEST["birthday"]))
		array_push($error_acc,"Invalid Birthday");
	if(empty($_REQUEST["gender"]))
		array_push($error_acc,"Invalid Choice!");
	if(empty($_REQUEST["company"]))
		array_push($error_acc,"Enter Company!");
	if(empty($_REQUEST["country"]))
		array_push($error_acc,"Enter Country!");
	if(empty($_REQUEST["city"]))
		array_push($error_acc,"Invalid Address!");
	
	$checker=mysqli_query($sqlConnect, "SELECT * FROM credentials WHERE email='$email'");
	$counter=mysqli_num_rows($checker);

	if($counter>0){
			array_push($error_acc, "Email is already registered!");
	}
		
	if(count($error_acc)==0){
		$new_password=trim_data($_REQUEST["new-password"]);
		$new_password = password_hash($new_password, PASSWORD_DEFAULT);
		$username = trim_data($_REQUEST["username"]);
		$email    = trim_data($_REQUEST["email"]);
		$birthday = trim_data($_REQUEST["birthday"]);
		$gender   = trim_data($_REQUEST["gender"]);
		$company  = trim_data($_REQUEST["company"]);
		$country  = trim_data($_REQUEST["country"]);
		$city     = trim_data($_REQUEST["city"]);
		$update = "UPDATE `credentials` SET username='$username', email='$email', pass='$new_password', company='$company', country='$country', city='$city', gender='$gender', birthday='$birthday' WHERE id='$id'";
		mysqli_query($sqlConnect,$update);
		$_SESSION['username']=$username;
		$_SESSION['email']=$email;
		$_SESSION['company'] =$company;
		$_SESSION['country'] =$country;
		$_SESSION['city'] =$city;
		$_SESSION['gender'] =$gender;
		$_SESSION['birthday'] =$birthday;
		$_SESSION['changes']=true;
		$_SESSION['key']=$new_password;
		$_SESSION['priveleges'] =1;
		header("Refresh:0");
		}

	}

}

if(isset($_POST["cancel-1"])){
	$_SESSION["project"]="";
	$_SESSION["status"]="";
	$_SESSION["handler"]="";
	$_SESSION["remarks"]="";
	$_SESSION["repository"]="";
	$proj_limit= $_SESSION["proj_limit"] - 1;
	$id= $_SESSION["id"];
	$update = "UPDATE `orders` SET project=NULL, status1=NULL, handler=NULL, remarks=NULL, repository='To be updated by the project handler', proj_limit='$proj_limit' WHERE id='$id' ";
	mysqli_query($sqlConnect,$update);
}

if(isset($_POST["cancel-2"])){
	$_SESSION["project2"]="";
	$_SESSION["status2"]="";
	$_SESSION["handler2"]="";
	$_SESSION["remarks2"]="";
	$_SESSION["repository2"]="";
	$proj_limit= $_SESSION["proj_limit"] - 1;
	$id= $_SESSION["id"];
	$update = "UPDATE `orders` SET project2=NULL, status2=NULL, handler2=NULL, remarks2=NULL, repository2='To be updated by the project handler', proj_limit='$proj_limit' WHERE id='$id' ";
	mysqli_query($sqlConnect,$update);
}



function trim_data($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

