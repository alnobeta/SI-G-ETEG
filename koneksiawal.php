<?php
	$namahost = "ap-cdbr-azure-southeast-b.cloudapp.net";
	$user = "b1593d69c89b34";
	$password = "26a41baa";
	$database = "sigetek";
	mysql_connect($namahost,$user,$password) or die("Failed");
	mysql_select_db($database) or die("Database not exist");
?>
