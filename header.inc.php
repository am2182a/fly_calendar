<?php include("connect.inc.php");
$link = mysqli_connect("localhost","root","", "fly_calendars");
session_start();
if (!isset($_SESSION["user_login"])) {
	$username = ""; 
}
else {
	$username = $_SESSION["user_login"]; 
	
}

?> 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css"/>
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400" rel="stylesheet"> 
<title>Fly Calendars</title>
</head>

<body> 
	<div class="headerMenu">
		<div id="wrapper">
			<div class="logo">
				<img src = "images/logo.PNG" alt="logo"/>
			</div>
			<h1 id="headertitle">FLY CALENDARS</h1> 
			<div class="searchBox">
				<form action="search.php" method="GET" id="search">
					<input type="text" name="q" size="60" placeholder="Search"/>
				</form>
			</div>
			<?php
			if (!$username) {
			echo '<div id="menu">
				<a href="#">Home</a>
				<a href="#">About</a>
				<a href="#">Sign Up</a>
				<a href="#">Sign In</a>
			</div>';
			} else {
				echo '<div id="menu">
				<a href="#">Home</a>
				<a href="'.$username.'">Profile</a>
				<a href="account_settings.php">Settings</a>
				<a href="logout.php">Logout</a>
			</div>';
			}
				?>
		</div>
	</div>
	<div id=wrapper>