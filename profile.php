<?php include( "header.inc.php"); ?>
<link rel="stylesheet" href="css/style.css"/>
<?php
if (isset($_GET['u'])) {
	$username = mysqli_real_escape_string($link, $_GET['u']); 
	if (ctype_alnum($username)) {
		
		
	$check = mysqli_query($link, "SELECT username, first_name FROM users WHERE username = '$username'");
	if (mysqli_num_rows($check) === 1) {
		$get = mysqli_fetch_assoc($check);
		$username = $get['username'];
		$firstname = $get['first_name'];
		//$lastname = $get['last_name']; 
	}
		else
		{
			 echo "<meta http-equiv=\"refresh\" content=\"0; url=http:localhost/FlyCalendars/index.php\">";
			 exit(); 
		}
		}
}
?>
<div class="postForm"> Post form will go here....</div>
<div class="profilePosts">Your Posts will go here ...</div>
<img src="" heigh="250" width="200" alt = "<?php echo $username; ?>'s Profile" title="<?php echo $username; ?>'s Profile" />
<br /> 
<div class="textHeader"><?php echo $username; ?>'s Profile</div>
<div class="profileLeftSideContent">Some content about this person's profile...</div>
<div class="textHeader"><?php echo $username; ?>'s Friends</div>
<div class="profileLeftSideContent">
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
</div>