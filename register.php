<?php
include ("../ws_db.php");
session_start();
if(isset($_SESSION['user'])) 
{
	header("Location:userhome.php");
}
else {
	if(empty($_POST['username']))  
	{
		header( "Location: newuser.php?error=noUserName" );
	}
	else
	{
		$invalidUser=0;
		$name=$_POST['name'];
		$username=$_POST['username'];
		$invalidUser=!preg_match('/^[a-zA-Z0-9\_]+$/', $username); 
		$password=md5($_POST['passwd']);

		$result=mysql_query("SELECT * FROM user WHERE login='$username'" ,$db);
		$rowCheck = mysql_num_rows($result);
		if($rowCheck==0)
		{
			
			$add=mysql_query("INSERT INTO user (login, password, Name)
			VALUES ('$username','$password','$name')" , $db);
			session_start();
			$_SESSION['user']=$_POST['username'];
			header("Location:userhome.php?success=registered");
			
		}
		else {

			header("Location:newuser.php?error=loginAlreadyExists");
		}
	}
}
?>