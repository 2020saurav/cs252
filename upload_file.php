<?php

include ("../ws_db.php");
session_start();
if(isset($_SESSION['user']))
{
	$user=$_SESSION['user'];
}

else
{
	header("Location:index.php?error=notLoggedIn");
}

if ($_FILES["file"]["error"] > 0) 
{
	//echo "Error: " . $_FILES["file"]["error"] . "<br>";
		header("Location:userhome.php?error=fileNotUploaded");
	
} 
else 
{
	$row=mysql_query("select * from user where login='$user'" , $db);
	$userDetail = mysql_fetch_assoc($row);

	$userId =$userDetail['id'];

	$timestamp=time();

	
	$fileId=$userId."u".$timestamp.$_FILES["file"]["name"];

	if(move_uploaded_file($_FILES["file"]["tmp_name"],"../ws_uploads/".$fileId))
	{
		mysql_query("INSERT INTO upload_history (user_id, file_id, timestamp)
			VALUES ('$userId','$fileId','$timestamp')" , $db);
		
			header("Location:userhome.php?success=fileUploaded");
		
	}
	else
	{
		header("Location:userhome.php?error=fileNotUploaded");
	}
}
?>