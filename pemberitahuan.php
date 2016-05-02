<!DOCTYPE html>
<!-- Template by Quackit.com -->
<!-- Images by various sources under the Creative Commons CC0 license and/or the Creative Commons Zero license. 
Although you can use them, for a more unique website, replace these images with your own. -->
<html lang="en">
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
    <link href="css/pemberitahuan.css" rel="stylesheet">
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
                                    echo "<li><a href=\"pembelibulanankategori.php?id=$id\">".$kategori."</a></li>";
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
                                                $totalHarga += $datapemesanan['harga'];
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
                                                echo "<p style=\"margin-top:-10px\">";
                                                echo "<a style=\"color:red; font-size:15px;\" href=\"hapuspesanan.php?idpesanan=$idpemesanan\"><i class=\"fa fa-times\"></i></a>";
                                                echo "</p>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                            echo "<tr style=\"height:10px;\">";
                                            echo "<td style=\"width:270px;\">";
                                            echo "<p styl=\"font-size:13px; margin-top:10px; float:right;\">Total   : </p>";
                                            echo "</td>";
                                            echo "<td style=\"width:270px;\">";
                                            echo "<p styl=\"font-size:13px; margin-top:10px; float:right;\">".$totalHarga."</p>";
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
                <div class="col-md-6 col-md-offset-3">
                    <div class="box" style="margin-top:50px;">
                        <center>
                            <p style="color:black;">Terima Kasih anda telah berbelanja menggunakan <br>SI G-ETEK</p>
                            <label>Nomor Order anda adalah : </label><br>
                            <label style="font-size:20px;"><?php echo $_COOKIE["orderan"]; ?></label> <br><br>
                            <p style="color:black;">Nomor order harap disimpan, sebgai tanda verivikasi saat pengantaran barang</p><br>
                            <p style="color:black;">Terima Kasih</p><br><br>
                            <a href="pembeliharian.php" class="btn btn-primary btn-lg"  style="padding:9px; border-radius:10px;">Selesai </a>
                        </center>
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