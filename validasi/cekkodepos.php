<?php
	$input = strlen($_GET['input']);

	if ($input < 5) {
		echo "Kode Pos Kurang";
	}
	elseif ($input > 5) {
		echo "Kode Pos Lebih";
	}
	else{
		echo "Kode Pos Valid";
	}
?>