<?php
	include 'prosescekform.php';

	if ($_SESSION["username"] == 'admin') {
		$namahost = "localhost";
		$user = "admin";
		$password = "admin";
		$database = "sigetek";
		mysql_connect($namahost,$user,$password) or die("Failed");
		mysql_select_db($database) or die("Database not exist");
	}
	elseif ($_COOKIE['jenisuser'] == 'Customer') {
		$namahost = "localhost";
		$user = "pembeli";
		$password = "pembeli";
		$database = "sigetek";
		mysql_connect($namahost,$user,$password) or die("Failed");
		mysql_select_db($database) or die("Database not exist");
	}
	elseif ($_COOKIE['jenisuser'] == 'Pedagang'){
		$namahost = "localhost";
		$user = "penjual";
		$password = "penjual";
		$database = "sigetek";
		mysql_connect($namahost,$user,$password) or die("Failed");
		mysql_select_db($database) or die("Database not exist");
	}
?>