<?php
	include_once 'koneksi.php';

	date_default_timezone_set("Asia/Jakarta");

	$username = $_SESSION['username'];
	$q = mysql_query("SELECT * FROM pembeli p join jenis_pembeli j ON p.id_jenis_pembeli = j.id_jenis_pembeli WHERE p.username = '$username'");
	while ($data = mysql_fetch_array($q)) {
		$idpembeli = $data['id_pembeli'];
		$namalengkap = $data['nama_depan'] . " " . $data['nama_belakang'];
		$jenis_pembeli = $data['jenis_pembeli'];
	}
	

	$id = $_POST['idpesanan'];
	$banyak = $_POST['stok'];
	$tanggal = $_POST['tanggal'];
	$waktu = date("y-m-d H:i:s");
	$url = $_POST['urlaktif'];

	$q1 = mysql_fetch_array(mysql_query("SELECT * FROM produk pr JOIN penjual p ON pr.id_penjual = p.id_penjual JOIN kategori k ON pr.id_kategori = k.id_kategori WHERE pr.id_produk = '$id'"));

	$totalHarga = $banyak * $q1['harga'];
	$catatan_transaksi = $banyak . " Kg " . $q1['nama_produk'];

	$ins = mysql_query("INSERT INTO jadwal_distribusi(id_pembeli,id_penjual,id_produk,banyak,total_harga,jadwal_distribusi) VALUES('".$idpembeli."','".$q1['id_penjual']."','".$id."','".$banyak."','".$totalHarga."','".$tanggal."')");
	$sp = mysql_query("CALL catat_transaksi('".$namalengkap."','".$jenis_pembeli."','".$catatan_transaksi."','".$tanggal."','".$waktu."')");

	if ($ins ) {
		mysql_query("COMMIT;");
		header("location:$url");
	}
	else{
		mysql_query("ROLLBACK;");
		mysql_error();
	}
?>
