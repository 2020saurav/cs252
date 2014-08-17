<?php
include ("../ws_db.php");

if(isset($_SESSION['user'])) 
{
	header( "Location:userhome.php" );
}

else
{
	$user = addslashes($_POST['username']);
	$invalidu=!preg_match('/^[a-zA-Z0-9]+$/', $user); 
	if($invalidu>0)
	{ 
		header("Location:index.php?error=invalidUser");
	}
	else
	{
		$pass = md5($_POST['password']);
		$result=mysql_query("select * from user where login='$user' AND password='$pass'", $db);
		$row = mysql_fetch_array($result);
		$rowCheck = mysql_num_rows($result);
		if($rowCheck == 1)
		{
			session_start();
			$_SESSION['user']=$_POST['username'];
			header("Location:userhome.php");
		}
		else 
		{
			header("Location:index.php?error=failedLogin");
		}
	}
}
?>