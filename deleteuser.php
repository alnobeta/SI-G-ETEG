<?php
	include_once 'koneksi.php';
	$user = $_GET['username'];

	$sql = mysql_query("DELETE FROM user WHERE username = '$user'");
	if ($sql) {
		header("location:Admin.php");
	}
	else{
		mysql_error();
	}
?>