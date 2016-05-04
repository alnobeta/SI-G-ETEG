<?php
$namahost = "ap-cdbr-azure-east-c.cloudapp.net";
	$user = "badeb5841ddff5";
	$password = "b46ffbd0";
	$database = "sigetek";
	$database = "sigetek";
	mysql_connect($namahost,$user,$password) or die("Failed");
	mysql_select_db($database) or die("Database not exist");

	$input = $_GET['input'];


	if (filter_var($input,FILTER_VALIDATE_EMAIL)) {
		echo "Email Valid";
		$q = mysql_fetch_array(mysql_query("SELECT email from user WHERE email = '$input'"));
		if ($q['email'] == $input) {
			echo ", Namun Sudah Digunakan";
		}
		else{
			echo " dan Tersedia";
		}
	}
	else{
		echo "Email Tidak Valid";
	}
?>
