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
	<nav class="navbar navbar-default" role="navigation">
		<a style="float:right; margin-right:20px;" href="logout.php"><h3><b>LOGOUT</b></h3></a>
	</nav>
	

	<form action="upload_file.php" method="post"
	enctype="multipart/form-data">
	<label for="file">Filename:</label>
	<input type="file" name="file" id="file"><br>
	<input type="submit" name="submit" value="Submit">
	</form>

<?php

	$row=mysql_query("select * from user where login='$user'" , $db);
	$userDetail = mysql_fetch_assoc($row);

	$userId =$userDetail['id'];
	$fileList=mysql_query("select file_id from upload_history where user_id='$userId'" , $db);
	if(mysql_num_rows($fileList))
	{
		echo "Uploaded Files:<br/>";
		while($fileArray = mysql_fetch_assoc($fileList))
		{
			$fileName = $fileArray['file_id'];
			echo "<a href='ws_uploads/".$fileName."'>".$fileName."</a><br/>";
		}
	}
}
else
{
	header("Location:index.php?error=notLoggedIn");
}
?>