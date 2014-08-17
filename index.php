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
	<div class="well col-md-offset-4 col-md-4 " style="margin-top:10%;">
	    
		<form action='login.php' method='POST'>
			<h3 class ="form-group" style="text-align:center">LOGIN</h3>
			<div class="form-group">
				Username: <input type='text' class='form-control' name='username' placeholder='Enter your username'/>
			</div>
			<div class="form-group">
				Password: <input type='password' class='form-control' name='password' placeholder='Enter your password'/>
			</div>
			<div class="form-group" style="padding-top:20px;">

				<a href='newuser.php' class = 'btn btn-default col-md-offset-2 col-md-4'>REGISTER </a>
				<button class = 'btn btn-primary col-md-offset-1 col-md-4' type='submit'> LOGIN </button>
				
			</div>
		</form>
			
			
	</div>

	<?php

}
?>