<?php
	include_once 'koneksi.php';

	$username = $_SESSION['username'];

	$sql = mysql_fetch_array(mysql_query("SELECT * FROM pembeli WHERE username = '$username'"));
	$idpembeli = $sql['id_pembeli'];
	$namalengkap = $sql['nama_depan'] . " " . $sql['nama_belakang'];

	$id = $_POST['idpesanan'];
	$banyak = $_POST['banyak'];
	$url = $_POST['urlaktif'];

	

	$q1 = mysql_fetch_array(mysql_query("SELECT * FROM produk pr JOIN penjual p ON pr.id_penjual = p.id_penjual JOIN kategori k ON pr.id_kategori = k.id_kategori WHERE pr.id_produk = '$id'"));

	$totalHarga = $banyak * $q1['harga'];
	$hitungStok = $q1['stok'] - $banyak;

	if ($hitungStok < 0) {
		setcookie("pesanErr", " Stok Tidak Tersedia Untuk Pemesanan Sebanyak $banyak kg", time()+3);
		header("location:$url#popup");
	}
	else{
		$ins = mysql_query("INSERT INTO pemesanan(id_pembeli,id_produk,nama_produk,banyak,total_harga) VALUES('".$idpembeli."','".$id."','".$q1['nama_produk']."','".$banyak."','".$totalHarga."')");
			
		if ($ins) {
			echo "sini";
			header("location:$url");
		}
		else{
			echo mysql_error();
			
		}
	}
?>
