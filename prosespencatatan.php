<!DOCTYPE html>
<head>
        <?php
                include 'koneksi.php';

                $username = $_SESSION['username'];
                $q = mysql_query("SELECT * FROM kategori");

                $sql = mysql_query("SELECT * FROM pembeli WHERE username = '$username'");

                while ($nama = mysql_fetch_array($sql)) {
                        $namadepan = $nama['nama_depan'];
                        $namabelakang = $nama['nama_belakang'];
                }

                $sql1 = mysql_query("SELECT * FROM pemesanan p join produk pr ON p.id_produk = pr.id_produk JOIN kategori k ON pr.id_kategori = k.id_kategori");
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>SI G-ETEG</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
        <link href="css/pembeliharian.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Custom Fonts from Google -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/loading.css"/>
	<script type="text/javascript" data-src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" data-src="js/loading.js"></script>
</head>
<body>
    <h1>JJjkbjkvhjkh</h1>
	<div id="hidden">
        <div id="progress-bar"></div>
        <div id="loading"></div>
        <?php
            include_once 'koneksi.php';

            if (isset($_POST['selesai'])) {
                date_default_timezone_set("Asia/Jakarta");
                $username = $_SESSION['username'];
                $nomor = $_COOKIE['orderan'];
                $waktu = date("y-m-d H:i:s");
                $dikirim = $_POST['tanggal'];
                $q = mysql_query("SELECT * FROM pemesanan");
                $sql = mysql_query("SELECT * FROM pembeli WHERE username = '$username'");
                $jenis = mysql_fetch_array(mysql_query("SELECT jenis_pembeli FROM pembeli p join jenis_pembeli j ON p.id_jenis_pembeli = j.id_jenis_pembeli WHERE p.username = '$username'")) ;
                while ($nama = mysql_fetch_array($sql)) {
                    $namalengkap = $nama['nama_depan'] . " " . $nama['nama_belakang'];
                }
                while ($pemesanan = mysql_fetch_array($q)) {
                    $transaksi[] = $pemesanan['banyak'] ." Kg ". $pemesanan['nama_produk'];
                }
                $catatan_transaksi = implode(",", $transaksi);

                if ($_POST['tgldistribusi'] == 'hariini') {
                    $dikirim = $waktu;
                    $ins = mysql_query("CALL catat_transaksi('".$nomor."','".$namalengkap."','".$jenis['jenis_pembeli']."','".$catatan_transaksi."','".$dikirim."','".$waktu."')");
                    if ($ins) {
                        mysql_query("COMMIT;");
                        mysql_query("CALL clear_data()");
                        echo "<meta http-equiv='refresh' content='5; url=pemberitahuan.php'>";
                    }
                    else{
                        mysql_query("ROLLBACK;");
                        mysql_error();
                        header("location:keranjang.php");
                    }
                }
                elseif ($_POST['tgldistribusi'] == 'harilain') {
                    $dikirim = $_POST['tanggal'];
                    $queries = mysql_query("SELECT * FROM pemesanan p JOIN produk pr ON p.id_produk = pr.id_produk");
                    while ($data = mysql_fetch_array($queries)) {
                        $idpembeli = $data['id_pembeli'];
                        $idproduk = $data['id_produk'];
                        $idpenjual = $data['id_penjual'];
                        $banyak = $data['banyak'];
                        $total_harga = $data['total_harga'];
                        $insjadwal = mysql_query("INSERT INTO jadwal_distribusi(id_pembeli,id_penjual,id_produk,banyak,total_harga,jadwal_distribusi) VALUES('".$idpembeli."','".$idpenjual."','".$idproduk."','".$banyak."','".$total_harga."','".$dikirim."')");
                    }
                    $ins = mysql_query("CALL catat_transaksi('".$nomor."','".$namalengkap."','".$jenis['jenis_pembeli']."','".$catatan_transaksi."','".$dikirim."','".$waktu."')");
                    if ($ins) {
                        mysql_query("COMMIT;");
                        mysql_query("CALL clear_data()");
                        echo "<meta http-equiv='refresh' content='5; url=pemberitahuan.php'>";
                    }
                    else{
                        mysql_query("ROLLBACK;");
                        mysql_error();
                        header("location:keranjang.php");
                    }
                }
                else{
                    mysql_query("ROLLBACK;");
                    setcookie("pesanErr", " Harap Isi Jadwal Pendistribusian ", time()+3);
                    header("location:keranjang.php");
                }
            }
        ?>
    </div>
</body>