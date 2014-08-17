<?php
session_start();
if (isset($_SESSION['user']))
{
	header("Location:userhome.php");
}
else
{
?>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<div >
	<h1> Register </h1>
	<form name='regform' action='register.php' method='POST'>
		Name <input class='textbox' type='text' name='name' /> 
		Username <input class='textbox' type='text' name='username'/>
		Password <input class='textbox' type='password' name='passwd'/>
		<input class='btn' type='submit' value='Submit' />
	</form>
</div>

<?php
}

 
 ?>
 