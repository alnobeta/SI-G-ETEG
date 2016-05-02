<?php
	include 'koneksi.php';

	$id = $_GET['id'];
	$s = 4;
	$query = "CALL tampil_jadwal('".$s."')";
	$result = mysql_query($query) or die(mysql_error());
	$arr = array();
	while ($row = mysql_fetch_assoc($result)) {
		$temp = array(
			"date" => $row["jadwal_distribusi"],       
			"Nama" => $row["Nama"],
			"nama_produk" => $row["nama_produk"],
			"banyak" => $row['banyak'],
			"total_harga" => $row['total_harga']);
		array_push($arr, $temp);
	}
	$data = json_encode($arr);
	echo $data
?>