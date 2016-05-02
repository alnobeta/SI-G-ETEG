<?php
	include_once 'koneksiawal.php';

	$q = mysql_query("SELECT password FROM user");

	while ($data = mysql_fetch_array($q)) {
		$file = 'password.txt';
		$bb = '\n';
		$isi = $data['password'] . $bb;
		$handle = fopen($file, 'a');
		if( $handle ) {
			fwrite($handle, $isi);
			fclose($handle);
		}
	}
	header("location:bacadekripsi.php");
?>