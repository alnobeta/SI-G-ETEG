<?php
	include_once 'koneksi.php';
	$id = $_GET['id'];
	$stok = $_POST['stokbaru'];

	echo $id;

	echo $_POST['stokbaru'];

	$sel = mysql_fetch_array(mysql_query("SELECT id_produk FROM pemesanan WHERE id_pemesanan = '$id'"));
	$idproduk = $sel['id_produk'];

	$sel1 = mysql_fetch_array(mysql_query("SELECT harga FROM produk WHERE id_produk = '$idproduk'"));

	$harga = $sel1['harga'];
	$hargabaru = $stok * $harga;

	$sql = mysql_query("UPDATE pemesanan SET banyak = '".$stok."', total_harga = '".$hargabaru."' WHERE id_pemesanan = '$id'");

	if ($sql) {
		header("location:keranjang.php");
	}
	else{
		mysql_error();
	}
?>