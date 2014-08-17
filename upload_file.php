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
	echo "Error: " . $_FILES["file"]["error"] . "<br>";
} 
else 
{
	$row=mysql_query("select * from user where login='$user'" , $db);
	$result=mysql_fetch_array($row);
	$userId =$result[0]['id'];

	$timestamp=time();
	echo $userId;
	
	$fileId=$userId."u".$timestamp.$_FILES["file"]["name"];

	if(move_uploaded_file($_FILES["file"]["tmp_name"],"../ws_uploads/".$fileId))
	{
		mysql_query("INSERT INTO upload_history (user_id, file_id, timestamp)
			VALUES ('$userId','$fileId','$timestamp')" , $db);


	}
}
?>