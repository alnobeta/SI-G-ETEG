<?php
	$namahost = "localhost";
	$user = "root";
	$password = "";
	$database = "sigetek";
	mysql_connect($namahost,$user,$password) or die("Failed");
	mysql_select_db($database) or die("Database not exist");

	$input = $_GET['input'];
	$panjang = strlen($input);

	if ($panjang < 4) {
		echo "Username Minimal 4 karakter";
	}
	else{
		$q = mysql_fetch_array(mysql_query("SELECT username FROM user WHERE username = '$input'"));
		if ($q['username'] == $input) {
			echo "Username Telah Digunakan";
		}
		else{
			echo "Username Tersedia";
		}
	}
?>