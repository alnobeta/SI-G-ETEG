<!DOCTYPE html>
<!-- Template by Quackit.com -->
<!-- Images by various sources under the Creative Commons CC0 license and/or the Creative Commons Zero license. 
Although you can use them, for a more unique website, replace these images with your own. -->
<html lang="en">
<head>
    <?php
        include 'koneksi.php';

        $username = $_SESSION['username'];
        $urlaktif = apache_getenv("REQUEST_URI");
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
    <link href="css/help.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
</head>
<body>
    <?php
        if (isset($_COOKIE['pesanErr'])) {
            $pesanErr = $_COOKIE['pesanErr'];
        }
        else{
            $pesanErr = "";
        }
    ?>
    <!-- Navigation -->
    <nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"  href="pembeliharian.php">
                	<span class="glyphicon glyphicon-fire"></span> 
                	SI G-ETEG
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PRODUK <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="about-us">
                            <?php
                                while ($data = mysql_fetch_array($q)) {
                                    $id = $data['id_kategori'];
                                    $kategori = $data['kategori'];
                                    echo "<li><a href=\"pembelihariankategori.php?id=$id\">".$kategori."</a></li>";
                                    $daftarkategori[] = $kategori;
                                    $idkategori[] = $id;
                                }
                            ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart fa-2x"></i><span>&nbsp;&nbsp;<?php echo mysql_num_rows($sql1);?></span><span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="about-us" style="width:415px">
                            <li>
                                <table>
                                    <tbody>
                                        <?php
                                            $totalHarga = "";
                                            while ($datapemesanan = mysql_fetch_array($sql1)) {
                                                $idgambar = $datapemesanan['id_produk'];
                                                $idpemesanan = $datapemesanan['id_pemesanan'];
                                                $totalHarga += $datapemesanan['total_harga'];
                                                echo "<tr style=\"height:60px;\">";
                                                echo "<td style=\"border-bottom:2px; solid #bcbcbc;\">";
                                                echo "&nbsp;&nbsp;";
                                                echo "<img class=\"img-responsif\" src=\"imageview.php?image_id=$idgambar\" style=\"height:50px; widht:50px; border:1px solid black;\">";
                                                echo "</td>";
                                                echo "<td style=\"padding-left:4px; border-bottom:2px solid #bcbcbc;\">";
                                                echo "<label style=\"margin-bottom:-80px;\">".$datapemesanan['nama_produk']."</label>";
                                                echo "<p style=\"font-size:13px; margin-left:10px;\">".$datapemesanan['kategori']."</label>";
                                                echo "</td>";
                                                echo "<td style=\"padding-left:4px; border-bottom:2px solid #bcbcbc; padding-right:7px;\">";
                                                echo "<p style=\"font-size:13px; margin-left:10px;\">".$datapemesanan['banyak']."</label>";
                                                echo "</td>";
                                                echo "<td style=\"padding-left:4px; border-bottom:2px solid #bcbcbc;\">";
                                                echo "<p style=\"font-size:13px; margin-left:10px;\">".$datapemesanan['total_harga']."</label>";
                                                echo "</td>";
                                                echo "<td style=\"padding-left:14px; border-bottom:2px solid #bcbcbc;\">";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                            echo "<tr style=\"height:10px;\">";
                                            echo "<td style=\"width:150px;\">";
                                            echo "<p style=\"font-size:13px; margin-top:10px; margin-right:-200px; float:right;\">Total   : </p>";
                                            echo "</td>";
                                            echo "<td style=\"width:250px;\">";
                                            echo "<p style=\"font-size:13px; margin-top:10px; margin-right:-90px;float:right;\">".$totalHarga."</p>";
                                            echo "</td>";
                                            echo "</tr>";
                                        ?>
                                    </tbody>
                                </table>
                                <table class="button">
                                    <tbody>
                                        <tr style="height:10px; ">
                                            <td style="padding-left:19px;  width:400px; ">
                                                <a href="keranjang.php" class="btn btn-primary btn-lg" style="font-size:12px; padding:7px; border-radius:7px; float:right;">Keranjang Belanja</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">HELP</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php
                                echo $namadepan . " " . $namabelakang;
                            ?>
                            <span class="caret">
                            </span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="about-us">
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>

                </ul>               
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

	<!-- Intro Section -->
     <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 " >
                    <div class="box">
                        <h1 style="margin-top:-10px; font-weight:bold; ">BANTUAN</h1>
                        <legend></legend>  
                        <h3 style="text-align:left;margin-top:-10px; font-weight:bold; ">Beli Produk</h3>
                        <legend></legend> 
                           <div class="col-md-12">
                               <table>
                                   <tbody>
                                       <tr>
                                           <td><label class="nomor">1.</label></td>
                                            <td class="nomor1">
                                                <label class="isi">Pilih Produk yang anda inginkan dengan mengklik "BACA SELENGKAPNYA", dan masukkan berapa produk yang anda inginkan dalam satuan Kg.
                                                </label>
                                            </td>
                                       </tr>

                                       <tr>
                                           <td><label class="nomor">2.</label></td>
                                            <td class="nomor1">
                                                <label class="isi2">Klik Pesan dan produk yang anda inginkan akan tersimpan di keranjang belanja.</label>
                                            </td>
                                       </tr>
                                   </tbody>
                               </table>
                           </div>                     
                           <legend></legend>
                           <h3 style="text-align:left;margin-top:-10px; font-weight:bold; ">Keranjang Belanja</h3>
                        <legend></legend> 
                           <div class="col-md-12">
                               <table>
                                   <tbody>
                                       <tr>
                                           <td><label class="nomor">1.</label></td>
                                            <td class="nomor1">
                                                <label class="isi">Setelah anda Selesai Memilih Produk yang ingin anda pesan. pergi ke keranjang belanja untuk melanjutkan aktifitas pembelian
                                                </label>
                                            </td>
                                       </tr>

                                       <tr>
                                           <td><label class="nomor">2.</label></td>
                                            <td class="nomor1">
                                                <label class="isi">Dalam Keranjang belanja anda dapat mengubah banyak pesanan produk yang anda pilih atatu menghapus produk yang telah anda pilih.
                                                </label>
                                            </td>
                                       </tr>

                                       <tr>
                                           <td><label class="nomor">3.</label></td>
                                            <td class="nomor1">
                                                <label class="isi">Ketika anda ingin mengubah banyak pesanan produk yang anda inginkan. isikan banyak produk baru dalam form dan klik simbol &crarr;
                                                </label>
                                            </td>
                                       </tr>

                                       <tr>
                                           <td><label class="nomor">4.</label></td>
                                            <td class="nomor1">
                                                <label class="isi2">Ketika anda ingin menghapus produk yang anda pilih, klik simbol &times;
                                                </label>
                                            </td>
                                       </tr>
                                       <tr>
                                           <td><label class="nomor">5.</label></td>
                                            <td class="nomor1">
                                                <label class="isi">terdapat total pembelian semua transaksi yang anda lakukan. Yang akan anda bayarkan ketika produk yang anda beli telah sampai.
                                                </label>
                                            </td>
                                       </tr>

                                       <tr>
                                           <td><label style="margin-bottom:27px;" class="nomor">6.</label></td>
                                            <td class="nomor1">
                                                <label class="isi">Pilih jadwal pendistribusian. Pilih hari ini jika anda menginginkan produk yang anda beli langsung di kirim di hari anda memilih produk.
                                                Dan pilih hari lain ketika anda menginginkan produk di kirim di hari sesuai keinginan anda.
                                                </label>
                                            </td>
                                       </tr>
                                        <tr>
                                           <td><label class="nomor">7.</label></td>
                                            <td class="nomor1">
                                                <label class="isi">Klik selesai belanja ketika anda akan mengakhiri pembelian. Dan anda akan mendapatkan Nomor Order yang nantinya digunakan
                                                untuk verifikasi saat pesanan anda datang.
                                                </label>
                                            </td>
                                       </tr>
                                   </tbody>
                               </table>
                           </div>
                     
                           <legend></legend>
                            
                            
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="page-footer">
        <!-- Copyright etc -->
        <div class="small-print">
            <p>Copyright &copy; SI G-ETEK 2015</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    
    <!-- Custom Javascript -->
    <script src="js/custom.js"></script>

    <script src="js/ShowHide.js"></script>

    <script src="js/ShowHideTgl.js"></script>
</body>
</html>