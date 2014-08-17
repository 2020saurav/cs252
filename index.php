<?php

session_start();
if (isset($_SESSION['user']))
{
	header("Location:userhome.php");
}
else
{
	?>
	
	<title>Webserver Assignment</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<div>
	    
		<form action='login.php' method='POST'>
			Username: <input type='text' class='textbox' name='username' />
			Password: <input type='password' class='textbox' name='password'/>
			<input class = 'btn' type='submit' value='LOGIN'>
		</form>
			
		<a href='newuser.php'><input class = 'btn' type='submit' value='REGISTER'></a>
			
	</div>

	<?php

}
?>