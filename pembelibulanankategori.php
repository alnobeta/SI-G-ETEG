<!DOCTYPE html>
<!-- Template by Quackit.com -->
<!-- Images by various sources under the Creative Commons CC0 license and/or the Creative Commons Zero license. 
Although you can use them, for a more unique website, replace these images with your own. -->
<html lang="en">
<head>
    <?php
        include 'koneksi.php';

        $username = $_SESSION['username'];
        $getid = $_GET['id'];
           $urlaktif = $_SERVER['REQUEST_URI'];
        $q = mysql_query("SELECT * FROM kategori");

        $sql = mysql_query("SELECT * FROM pembeli WHERE username = '$username'");

        while ($nama = mysql_fetch_array($sql)) {
            $namadepan = $nama['nama_depan'];
            $namabelakang = $nama['nama_belakang'];
        }
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>SI G-ETEG</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/pembelibulanankategori.css" rel="stylesheet">
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
                <a class="navbar-brand" href="pembelibulanan.php">
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
                                }
                            ?>
                        </ul>
                    </li>
                    <li>
                        <a href="helppembelibulanan.php">HELP</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php
                                echo $namadepan . " " . $namabelakang;
                            ?>
                            <span class="caret"></span>
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
        <div class="row">
            <div class="col-md-10 col-md-offset-1 " >
                <center>
                    <h1 style="margin-top:-10px; text-align:left; margin-left:40px; font-weight:bold;">
                        <?php
                            $sql = mysql_fetch_array(mysql_query("SELECT kategori FROM kategori WHERE id_kategori = '$getid'"));
                            echo $sql['kategori'];
                        ?>
                    </h1>
                    <legend></legend>
                </center>
            </div>
        </div>
        <div class="container">
        <div class="row">
            <?php
                $q1 = mysql_query("SELECT * FROM produk pr JOIN penjual p ON pr.id_penjual = p.id_penjual JOIN kategori k ON pr.id_kategori = k.id_kategori WHERE pr.id_kategori = '$getid'");
                $banyak = mysql_num_rows($q1);
                for ($i=0; $i < $banyak; $i++) { 
                    for ($j=1; $j <= 2; $j++) { 
                        while ($dataproduk = mysql_fetch_array($q1)) {
                            $idproduk = $dataproduk['id_produk'];
                            $namapenjual = $dataproduk['nama_depan']. " " .$dataproduk['nama_belakang'];
                            $waktu = $dataproduk['waktu_post'];
                            echo "<div class=\"col-md-6\">";
                            echo "<div class=\"box\">";
                            echo "<center>";
                            echo "<form class=\"form-horizontal\" action=\"belibulanan.php\" method=\"post\">";
                            echo "<div class=\"col-md-4\">";
                            echo "<div class=\"form-group\">";
                            echo "<img class=\"img-responsif\" src=\"imageview.php?image_id=$idproduk\" style=\"height:100px; widht:100px;\">";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class=\"col-md-8\">";
                            echo "<div class=\"form-group\">";
                            echo "<h2 style=\"text-align:left;\">".$dataproduk['nama_produk']."</h2>";
                            echo "<p style=\"text-align:left; color:black; font-weight:bold; font-size:15px;\">".$namapenjual."</p>";
                            echo "<p style=\"text-align:left; font-size:14px;color:black;\">".$dataproduk['keterangan_produk']."</p>";
                            echo "<p style=\"text-align:left; color:black;\">Harga  : Rp. ".$dataproduk['harga']."/Kg</p>";
                            echo "<p style=\"text-align:left; color:black;\">Stok   : ".$dataproduk['stok']." Kg</p>";
                            echo "<p style=\"text-align:right; color:black; font-size:12px;\">".$waktu."</p>";
                            echo "</div>";
                            echo "<div class=\"form-horizontal\">";
                            echo "<div class=\"form-group\">";
                            echo "<label for=\"stok\" class=\"col-sm-6 control-label\">Banyaknya</label>";
                            echo "<div class=\"col-sm-1\">";
                            echo "<input style=\"width:90px;\" type=\"text\" name=\"stok\" placeholder=\"Kg \">";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class=\"form-group\">";
                            echo "<label for=\"tanggal\" class=\"col-sm-6 control-label\">Tanggal Distribusi</label>";
                            echo "<div class=\"col-sm-6\">";
                            echo "<input type=\"date\" class=\"form-control\" aria-describedby=\"basic-addon1\" name=\"tanggal\" required>";
                            echo "</div>";
                            echo "</div>";
                            echo "<input type=\"hidden\" name=\"idpesanan\" value=\"$idproduk\">";
                            echo "<input type=\"hidden\" name=\"urlaktif\" value=\"$urlaktif\">";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class=\"form-group\">";
                            echo "<div class=\"col-sm-offset-5 col-sm-10\">";
                            echo "<input type=\"submit\" class=\"btn btn-primary btn-lg\" style=\"padding:10px; border-radius:10px; margin-top:22px;\" name=\"beli\" value=\"Beli\">";
                            echo "</div>";
                            echo "</div>";
                            echo "</form>";
                            echo "</center>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                }
            ?>
        </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="page-footer">
        <!-- Copyright etc -->
        <div class="small-print">
            <div class="container">
                <p>Copyright &copy; SI G-ETEK 2016</p>
        	</div>
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
