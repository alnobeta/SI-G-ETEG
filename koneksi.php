<?php
	include 'prosescekform.php';

	if ($_SESSION["username"] == 'admin') {
		$namahost = "13.67.61.25";
		$user = "admin";
		$password = "admin";
		$database = "sigetek";
		mysql_connect($namahost,$user,$password) or die("Failed");
		mysql_select_db($database) or die("Database not exist");
	}
	elseif ($_COOKIE['jenisuser'] == 'Customer') {
		$namahost = "13.67.61.25";
		$user = "pembeli";
		$password = "pembeli";
		$database = "sigetek";
		mysql_connect($namahost,$user,$password) or die("Failed");
		mysql_select_db($database) or die("Database not exist");
	}
	elseif ($_COOKIE['jenisuser'] == 'Pedagang'){
		$namahost = "13.67.61.25";
		$user = "penjual";
		$password = "penjual";
		$database = "sigetek";
		mysql_connect($namahost,$user,$password) or die("Failed");
		mysql_select_db($database) or die("Database not exist");
	}
?>
