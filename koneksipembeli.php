<?php
	$namahost = "localhost";
	$user = "pembeli";
	$password = "pembeli";
	$database = "sigetek";
	mysql_connect($namahost,$user,$password) or die("Failed");
	mysql_select_db($database) or die("Database not exist");
?>