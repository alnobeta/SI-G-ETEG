<?php
	include_once 'koneksi.php';
	$id = $_POST['idkategori'];
	$nama = $_POST['kategori'];

	$queries = mysql_query("UPDATE kategori SET kategori = '".$nama."' WHERE id_kategori = '$id'");

	if ($queries) {
		header("location:kategori.php");
	}
	else{
		echo mysql_error();
	}
?>