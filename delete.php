<?php
	include_once 'koneksi.php';
	$id = $_GET['id'];

	$sql = mysql_query("DELETE FROM produk WHERE id_produk = '$id'");
	if ($sql) {
		header("location:pedagang.php");
	}
	else{
		echo "produk tidak ada";
	}
?>