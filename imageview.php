<?php
    include_once 'koneksi.php';
    if(isset($_GET['image_id'])) {
        $sql = "SELECT * FROM produk WHERE id_produk=".$_GET['image_id'];
		$result = mysql_query("$sql")
		 or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());
        	$row = mysql_fetch_array($result);
		//header("Content-type: " . $row["imageType"]);
        echo $row["gambar_produk"];
       
	
	}
	mysql_close($conn);
?>
