<!DOCTYPE html>
<!-- Template by Quackit.com -->
<!-- Images by various sources under the Creative Commons CC0 license and/or the Creative Commons Zero license. 
Although you can use them, for a more unique website, replace these images with your own. -->
<html lang="en">
<head>
    <?php
        include 'koneksi.php';

        $username = $_SESSION['username'];
           $urlaktif = $_SERVER['REQUEST_URI'];
        $q = mysql_query("SELECT * FROM kategori");
          $web= "http://g-eteg.azurewebsites.net";
      $fix= $web.$urlaktif;

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
    
    <style type="text/css">
/* untuk pemakaian di blog/website anda, yang di copy hanya css di bawah ini*/

    /* style untuk link popup */
    a.popup-link {

        text-align: center;

        margin:auto;
        position: relative;
        height: 30px;
        width: 190px;
        color: #000;
        text-decoration: none;
        background: rgba(255,255,255,0.4);
        border-left: 10px solid red;
        /*border-radius: 3px;
        box-shadow: 0 5px 0px 0px #eea900;*/
        display: block;
    }
    a.popup-link:hover {
        background: rgba(255,255,255,0.4);
        box-shadow: -5px 5px -5px 5px #000;
        -webkit-transition:all 1s;
        -moz-transition:all 1s;
        transition:all 1s;
    }
    /* end link popup*/

    /*style untuk popup */  
    #popup {
        visibility: hidden;
        opacity: 0;
        margin-top: -900px;
    }
    #popup:target {
        visibility:visible;
        opacity: 1;
        background-color: rgba(0,0,0,0.8);
        position: fixed;
        top:0;
        left:0;
        right:0;
        bottom:0;
        margin:0;
        z-index: 99999999999;
        -webkit-transition:all 1s;
        -moz-transition:all 1s;
        transition:all 1s;
    }

    @media (min-width: 768px){
        .popup-container {
            width:600px;
        }
    }
    @media (max-width: 767px){
        .popup-container {
            width:100%;
        }
    }
    .popup-container {
        position: relative;
        margin:8% auto;
        padding:30px 50px;
        background-color: #EFF3F5;
        color:#333;
        border-radius: 10px;
    }

    a.popup-close {
        border-radius: 7px;

        position: absolute;
        top:3px;
        right:3px;
        background-color: red;
        padding:7px 10px;
        font-size: 20px;
        text-decoration: none;
        line-height: 1;
        color:#fff;
    }

    /* style untuk isi popup */


    .popup-form {
        margin:10px auto;
    }
        .popup-form h2 {
            margin-bottom: 5px;
            font-size: 37px;
            text-transform: uppercase;
        }
        .popup-form .input-group {
            margin:10px auto;
        }
            .popup-form .input-group input {
                /*padding:17px;*/
                text-align: center;
                margin-bottom: 10px;
                border-radius:3px;
                font-size: 16px; 
                display: block;
                width: 100%;
            }
            .popup-form input[type="submit"] {
                background-color: yellowgreen;
                color: #fff;
                border: 0;
                cursor: pointer;
                margin: -6px 210px;

                padding: 7px 20px;
            }
            .popup-form .input-group input[type="submit"]:focus {
                box-shadow: inset 0 3px 7px 3px #ea7722;
            }


    </style>
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
                <a class="navbar-brand"  href="pembelibulanan.php">
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
        <?php
            for ($i=0; $i < count($daftarkategori); $i++) {
                $listkategori = $idkategori[$i];
                echo "<div class=\"row\">";
                echo "<div class=\"col-md-10 col-md-offset-1\">";
                echo "<h1 style=\"color:black; font-weight:bold; margin-top:20px; text-align:left; margin-left:30px;\">".$daftarkategori[$i]."</h1>";
               
                echo "<legend></legend>";
                echo "</div>";
                echo "</div>";
                echo "<div class=\"container\">";
                echo "<div class=\"row\">";
                $q1 = mysql_query("SELECT * FROM produk pr JOIN penjual p ON pr.id_penjual = p.id_penjual JOIN kategori k ON pr.id_kategori = k.id_kategori WHERE pr.id_kategori = '$listkategori'");
                    for ($k=1; $k <= 3; $k++) { 
                        while ($dataproduk = mysql_fetch_array($q1)) {
                            $id = $dataproduk['id_produk'];
                            $namapenjual = $dataproduk['nama_depan']. " " .$dataproduk['nama_belakang'];
                            $waktu = $dataproduk['waktu_post'];
                            echo "<div class=\"col-md-4\">";
                            echo "<div class=\"panel panel-default\" id=\"panell\">";
                            echo "<div class=\"panel-body\">";
                            echo "<center>";
                            echo "<img class=\"img-responsif\" src=\"imageview.php?image_id=$id\" style=\"height:100px; widht:100px;\">";
                            echo "</center>";
                            echo "<div id=\"pembungkus-popup\">";
                            echo "<div class=\"page-header\">";
                            echo "<h2 style=\"text-align:left; color:black;\">".$dataproduk['nama_produk']."</h2>";
                            echo "<p style=\"text-align:left; color:black;\">".$namapenjual."</p>";
                            echo "<p style=\"text-align:right; color:black; font-size:12px;\">".$waktu."</p>";
                            echo "</div>";
                            echo "<p style=\"text-align:left; color:black;\">Rp. ".$dataproduk['harga']."</p>";
                            echo "<p style=\"text-align:left; color:black;\">".$dataproduk['stok']." Kg</p>";
                            echo "<legend></legend>";
                            echo "<a href=\"?id=$id&#popup\" class=\"popup-link\"><p style=\"color:black; font-size:15px; margin-left:-4px;\">Baca Selengkapnya</p></a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                echo "</div>";
                echo "</div>";
            }
        ?>
    </section>
    <footer class="page-footer">
        <!-- Copyright etc -->
        <div class="small-print">
            <p>Copyright &copy; SI G-ETEK 2016</p>
        </div>
    </footer>
    <div class="popup-wrapper" id="popup">
        <div class="popup-container">
            <br>
            <?php
                $idb = $_GET['id'];

                $queries = mysql_query("SELECT * FROM produk pr JOIN penjual p ON pr.id_penjual = p.id_penjual JOIN kategori k ON pr.id_kategori = k.id_kategori WHERE pr.id_produk = '$idb'");

                while ($penjelasanproduk = mysql_fetch_array($queries)) {
                    $namapedagang = $penjelasanproduk['nama_depan']. " " .$penjelasanproduk['nama_belakang'];
                    echo "<center>";
                    echo "<img class=\"img-responsif\" src=\"imageview.php?image_id=$idb\" style=\"height:100px; widht:100px;\">";
                    echo "</center>";
                    echo "<h2 style=\"text-align:left; color:black;\">".$penjelasanproduk['nama_produk']."</h2>";
                    echo "<p style=\"text-align:left; color:black;\">".$namapedagang."</p>";
                    echo "<p style=\"text-align:left; color:black;\">Rp. ".$penjelasanproduk['harga']."</p>";
                    echo "<p style=\"text-align:left; color:black;\">".$penjelasanproduk['stok']." Kg</p>";
                    echo "<p style=\"text-align:left; color:black;\">".$penjelasanproduk['keterangan_produk']."</p>";
                }
            ?>
            <form action="belibulanan.php" method="POST" class="popup-form">
                <div class="form-horizontal" style="margin:20px; ">
                    <div class="form-group">
                        <label for="stok" class="col-sm-8 control-label">Banyak </label>
                        <div class="col-sm-1">
                            <input style="width:90px;" type="text" name="stok" placeholder="Kg.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="col-sm-8 control-label">Tanggal Distribusi</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" aria-describedby="basic-addon1" name="tanggal" required>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="idpesanan" value="<?php echo $idb; ?>">
                <input type="hidden" name="urlaktif" value="<?php echo $fix; ?>">
                <input style="margin-top:px;" type="submit" name="pesan" value="PESAN">
                <a class="popup-close" href="pembelibulanan.php">X</a>
            </form>
        </div>
    </div> 
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
