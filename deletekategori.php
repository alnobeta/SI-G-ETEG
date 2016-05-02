<?php
	include_once 'koneksi.php';
	$id = $_GET['id'];

	$sql = mysql_query("DELETE FROM kategori WHERE id_kategori = '$id'");
	if ($sql) {
		header("location:kategori.php");
	}
	else{
		echo "produk tidak ada";
	}
?>