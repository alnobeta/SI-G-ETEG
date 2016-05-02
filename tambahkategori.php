<?php
	include_once 'koneksi.php';
	$nama = $_POST['kategori']; 

	$queries = mysql_query("INSERT INTO kategori(kategori) VALUES('".$nama."')"); 

	if ($queries) {
		header("location:kategori.php");
	}
	else{
		echo mysql_error();
	}
?>