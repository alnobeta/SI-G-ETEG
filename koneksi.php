<?php
	include 'prosescekform.php';

	if ($_SESSION["username"] == 'admin') {
		$namahost = "ap-cdbr-azure-east-c.cloudapp.net";
		$user = "badeb5841ddff5";
		$password = "b46ffbd0";
		$database = "sigetek";
		mysql_connect($namahost,$user,$password,$database) or die("Failed");
		mysql_select_db($database) or die("Database not exist");
	}
	elseif ($_COOKIE['jenisuser'] == 'Customer') {
	$namahost = "ap-cdbr-azure-east-c.cloudapp.net";
		$user = "badeb5841ddff5";
		$password = "b46ffbd0";
		$database = "sigetek";
		mysql_connect($namahost,$user,$password) or die("Failed");
		mysql_select_db($database) or die("Database not exist");
	}
	elseif ($_COOKIE['jenisuser'] == 'Pedagang'){
	$namahost = "ap-cdbr-azure-east-c.cloudapp.net";
		$user = "badeb5841ddff5";
		$password = "b46ffbd0";
		$database = "sigetek";
		mysql_connect($namahost,$user,$password) or die("Failed");
		mysql_select_db($database) or die("Database not exist");
	}
?>
