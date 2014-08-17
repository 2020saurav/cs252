<?php
include ("../ws_db.php");
session_start();
if(isset($_SESSION['user']))
{
	$user=$_SESSION['user'];
	$row=mysql_query("select * from user where login='$user'" , $db);
	$result=mysql_fetch_array($row);

?>


	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<form action="upload_file.php" method="post"
	enctype="multipart/form-data">
	<label for="file">Filename:</label>
	<input type="file" name="file" id="file"><br>
	<input type="submit" name="submit" value="Submit">
	</form>




<?php

	$userId = $result[0]['id'];
	$fileList=mysql_query("select file_id from upload_history where user_id='$userId'" , $db);
	if(mysql_num_rows($fileList))
	{
		echo "Uploaded Files:<br/>";
		while($fileArray = mysql_fetch_assoc($fileList))
		{
			$fileName = $fileArray['file_id'];
			$path = realpath(dirname(__FILE__) . '/../ws_uploads/'
			echo "<a href='/../ws_uploads/".$fileName."'>".$fileName."</a><br/>";
		}

	}
	

}


else
{
	header("Location:index.php?error=notLoggedIn");
}
?>