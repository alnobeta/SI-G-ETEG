<?php

	$input = $_GET['input']; //menangkap password yang diinput oleh user
	$cek = $_GET['password']; //menangkap nilai apakah untuk input password atau konfirmasi
	$pass = $_GET['pass']; //menangkap nilai dari form password yang diisi
	if ( $cek == 1 ){ //untuk melakukan pengecekan kekuatan password
		/*if (ereg("^[[:punct:]]+[[:alnum:]]",$input) || ereg("^[[:alnum:]]+[[:punct:]]",$input) ){
			echo "Kuat";
		}
		else if (ereg("^[[:alnum:]]",$input)){
			echo "Sedang";
		}
		else{
			echo "Lemah";
		}*/
	}
	else if ( $cek == 2 ){ //untuk melakukan pengecekan konfirmasi password
		if ($pass == $input) echo "Cocok";
		else echo "Sandi Tidak Cocok, Ulangi Lagi";
	}
?>