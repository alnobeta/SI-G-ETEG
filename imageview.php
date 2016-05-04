<?php
    include_once 'koneksi.php';
    if(isset($_GET['image_id'])) {
        $sql = "SELECT * FROM produk WHERE id_produk=" . $_GET['image_id'];
		$result = mysql_query("$sql")
        	$row = mysql_fetch_array($result);
		//header("Content-type: " . $row["imageType"]);
        echo $row["gambar_produk"];
        or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());
	
	}
	mysql_close($conn);
?>
