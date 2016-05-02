<?php
	include_once 'koneksi.php';
	$pesanan = $_GET['idpesanan'];

	$sql = mysql_query("DELETE FROM pemesanan WHERE id_pemesanan = '$pesanan'");

	if ($sql) {
		header("location:keranjang.php");
	}
	else{
		mysql_error();
	}
?>