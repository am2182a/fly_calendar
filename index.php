
<?php include("header.inc.php"); ?>
<?php
$reg = @$_POST['reg'];

$fn = ""; 
$ln = "";
$un = "";
$em = "";
$em2 = "";
$pswd = "";
$pswd2="";
$d = "";
$u_check="";

$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$em = strip_tags(@$_POST['email']);
$em2 = strip_tags(@$_POST['email2']);
$pswd = strip_tags(@$_POST['password']);
$pswd2 = strip_tags(@$_POST['password2']);
$d = date("Y-m-d");

$link = mysqli_connect("localhost","root","", "fly_calendars");
if ($reg) {
	if($em==$em2) {
		$u_check = mysqli_query($link, "SELECT username FROM users WHERE username = '$un'");
		$check=mysqli_num_rows($u_check); 
	if ($check == 0) {
		if ($fn&&$ln&&$un&&$em&&$em2&&$pswd&&$pswd2) {
			if  ($pswd == $pswd2) {
				if ((strlen($un)>25)|| (strlen($fn)>25) || (strlen($ln) > 25)) {
					echo "The maximum limit for username, first name, or last name is 25 characters!";
				}
				else {
					if (strlen($pswd)>30 || strlen($pswd)<5) {
						echo "Your password must be between 5 and 30 characters long";
					}
					else {
					$pswd = md5($pswd);
					$pswd2 = md5($pswd2); 
					$query = mysqli_query($link, "INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$pswd','$d','0')");
					die("<h2>Welcome to Fly Calendars!</h2> Log in to get started...");
					}
				}
			}
			else {
				echo "Your passwords don't match!"; 
			}
		}
		else {
			echo "Please fill in all the fields!";
		}
	}
		else {
			echo "Username already taken"; 
		}
	}
	else {
		echo "Your emails do not match"; 
	}
}
$login = @$_POST['login'];
if($login) {
if(isset($_POST["user_login"]) && isset($_POST["password_login"])) {
	$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]);
	$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]);
	$password_login  = md5($password_login);
	$sql = mysqli_query($link, "SELECT id FROM users WHERE username = '$user_login' AND password = '$password_login' LIMIT 1");
	$userCount = mysqli_num_rows($sql); 
	if ($userCount == 1) {
		while($row = mysqli_fetch_array($sql)) {
			$id = $row["id"];
		}
		$_SESSION["id"] = $id; 
		$_SESSION["user_login"] = $user_login; 
		header("location: home.php"); 
		exit();
	}
		else {
			echo "That information is incorrect, try again";
		}
		exit();
}
}
?>
	<div class="signup">
	<table> 
		<tr>
			<td width="450px" valign="top">
				<h2> Already a Member? Sign in Below!</h2>
				<form action = "index.php" method="POST">
					<input type="text" name="user_login" size="25" placeholder="Username"/> <br/><br/>
					<input type="password" name="password_login" size="25" placeholder="Password"/> <br/><br/>
					<input type="submit" name="login" value="Login"/> 
				</form>
			</td>
			<td width="350px" valign="top">
				<h2> Sign Up Below</h2>
				<form action="index.php" method="POST">
					<input type="text" name="fname" size="25" placeholder="First Name"/> <br/><br/>
					<input type="text" name="lname" size="25" placeholder="Last Name"/> <br/><br/>
					<input type="text" name="username" size="25" placeholder="Username"/> <br/><br/>
					<input type="text" name="email" size="25" placeholder="Email"/> <br/><br/>
					<input type="text" name="email2" size="25" placeholder="Email Confirmed"/> <br/><br/>
					<input type="password" name="password" size="25" placeholder="Password"/> <br/><br/>
					<input type="password" name="password2" size="25" placeholder="Confirm Password"/> <br/><br/>
					<input type="submit" name="reg" value="Sign Up!"/> 
				</form>
			</td>
		</tr>
	</table>
	</div>
<?php include("footer.inc.php"); ?>