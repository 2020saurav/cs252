<?php
session_start();
if (isset($_SESSION['user']))
{
	header("Location:userhome.php");
}
else
{
?>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css"/>
<div class="well col-md-offset-4 col-md-4 " style="margin-top:10%;">
	
	<form name='regform' action='register.php' method='POST'>
		<h3 class ="form-group" style="text-align:center">Register</h3>
		<div class="form-group">
			Name  <input class='form-control' placeholder="Enter your Full Name" type='text' name='name' />
		</div> 
		<div class="form-group">
			Username <input class='form-control' type='text' name='username' placeholder="Choose a username"/>
		</div>
		<div class='form-group'>
			Password <input class='form-control' type='password' name='passwd' placeholder="Choose a password"/>
		</div>
		<div class='form-group'>

			<button class='btn btn-primary col-md-offset-3 col-md-6' type='submit' /> REGISTER </button>
		</div>
	</form>
</div>

<?php
}

 
 ?>
 