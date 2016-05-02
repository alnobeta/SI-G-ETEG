<?php
	include_once 'koneksi.php';
	date_default_timezone_set("Asia/Jakarta");
	$id = $_GET['id'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$waktu = date("y-m-d H:i:s");


	if (!preg_match("/^[0-9]*$/",$stok)) {
		setcookie("updateErr", "Stok Hanya Bisa Diisi oleh Angka", time()+3);
		header("location:pedagang.php");
	}
	elseif (!preg_match("/^[0-9]*$/",$harga)) {
		setcookie("updateErr", "Harga Hanya Bisa Diisi oleh Angka", time()+3);
		header("location:pedagang.php");
	}
	else{
		if ($harga != NULL && $stok == NULL) {
			$sql = mysql_query("UPDATE produk SET harga = '".$harga."', waktu_post = '".$waktu."' WHERE id_produk = '$id'");
			if ($sql) {
				header("location:pedagang.php");
			}
			else{
				mysql_error();
			}
		}
		elseif ($harga == NULL && $stok != NULL) {
			$sql = mysql_query("UPDATE produk SET stok = '".$stok."', waktu_post = '".$waktu."' WHERE id_produk = '$id'");
			if ($sql) {
				header("location:pedagang.php");
			}
			else{
				mysql_error();
			}
		}
		elseif($harga != NULL && $stok != NULL){
			$sql = mysql_query("UPDATE produk SET harga = '".$harga."', stok = '".$stok."', waktu_post = '".$waktu."' WHERE id_produk = '$id'");
			if ($sql) {
				header("location:pedagang.php");
			}
			else{
				mysql_error();
			}
		}
		else{
			header("location:pedagang.php");
		}
	}
?>