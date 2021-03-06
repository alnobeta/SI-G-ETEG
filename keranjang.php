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
    <link href="css/pedagang.css" rel="stylesheet">
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
            .popup-form .input-group input[type="submit"] {
                background-color: yellowgreen;
                color: #fff;
                border: 0;
                cursor: pointer;
                margin-top: -19px;
            }
            .popup-form .input-group input[type="submit"]:focus {
                box-shadow: inset 0 3px 7px 3px #ea7722;
            }
            .error{
                color: #000080;
            }
    </style>
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
                    <li>
                        <a href="#">HELP</a>
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
                                                echo "<p style=\"margin-top:-10px\">";
                                                echo "<a style=\"color:red; font-size:15px;\" href=\"hapuspesanan.php?idpesanan=$idgambar\"><i class=\"fa fa-times\"></i></a>";
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
                <div class="col-md-8 col-md-offset-2 " >
                    <div class="box" style="margin-top:50px;">
                        <center>
                            <h1 style="margin-top:-10px;">KERANJANG BELANJA</h1>
                            <h3 class="error"><?php echo $pesanErr;?></h3>
                            <legend></legend>
                            <br>
                                <div class="form-group">
                                    <table>
                                        <tr style="background-color:rgba(255,255,255,0.5);">
                                            <td style="padding-left:10px;width:140px; height:30px;">Gambar</td>
                                            <td style="width:200px; padding-right:15px;padding-left:10px;">NamaProduk</td>
                                            <td style="width:100px; padding-left:25px; padding-right:25px;">Jumlah</td>
                                            <td style="width:130px;" class="text-right">Harga Satuan</td>
                                            <td style="width:150px; padding-right:10px;"class="text-right">Total</td>
                                            <td style="width:15px; padding-right:10px;"class="text-right"></td>
                                        </tr>
                                            <?php
                                                $totalPembelian = "";
                                                $tampil = mysql_query("SELECT * FROM pemesanan p join produk pr ON p.id_produk = pr.id_produk JOIN kategori k ON pr.id_kategori = k.id_kategori");
                                                echo "<tbody>";
                                                while ($datapembelian = mysql_fetch_array($tampil)) {
                                                    $idp = $datapembelian['id_pemesanan'];
                                                    $idg = $datapembelian['id_produk'];
                                                    $bb = $datapembelian['banyak'];
                                                    $totalPembelian += $datapembelian['total_harga'];
                                                    echo "<form class=\"form-horizontal\" action=\"updatepesanan.php?id=$idp\" method=\"POST\">";
                                                    echo "<div class=\"form-group\">";
                                                    echo "<tr>";
                                                    echo "<td style=\"border-bottom: 1px solid rgba(255,255,255,0.5)\">";
                                                    echo "<center>";
                                                    echo "&nbsp&nbsp;";
                                                    echo "<img class=\"img-responsif\" src=\"imageview.php?image_id=$idg\" style=\"height:70px; widht:70px; margin:5px; border:1px solid black;\">";
                                                    echo "</center>";
                                                    echo "</td>";
                                                    echo "<td style=\"border-bottom: 1px solid rgba(255,255,255,255,0.5)\">";
                                                    echo "<label style=\"margin-bottom:-80px;\">".$datapembelian['nama_produk']."</label>";
                                                    echo "<p style=\"font-size:13px; margin-left:10px;\">".$datapembelian['kategori']."</p>";
                                                    echo "</td>";
                                                    echo "<td style=\"border-bottom:1px solid rgba(255,255,255,0.5)\">";
                                                    echo "<center>";
                                                    echo "<input type=\"text\" style=\"width:45px; margin-left:2px;\" name=\"stokbaru\" placeholder=\"$bb\">&nbsp;Kg ";
                                                    echo "<input type=\"submit\" style=\"width:25px; background-color:white;font-size:16px;\"value=\"&crarr;\">";
                                                    echo "</center>";
                                                    echo "</td>";
                                                    echo "<td style=\"border-bottom: 1px solid rgba(255,255,255,0.5);\" class=\"text-right\">";
                                                    echo "<label style=\"margin-bottom:-80px;\">".$datapembelian['harga']."</label>";
                                                    echo "</td>";
                                                    echo "<td style=\"border-bottom: 1px solid rgba(255,255,255,0.5);\" class=\"text-right\">";
                                                    echo "<label style=\"margin-bottom:-80px;\">".$datapembelian['total_harga']."</label>";
                                                    echo "</td>";
                                                    echo "<td style=\"border-bottom: 1px solid rgba(255,255,255,0.5);\" class=\"text-right\">";
                                                    echo "<center>";
                                                    echo "<a style=\"float:right; color:red; margin-top:3px; font-size:17px; padding-left:10px;\" href=\"hapuspesanan.php?idpesanan=$idp\"><i class=\"fa fa-times\"></i></a>";
                                                    echo "</center>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    echo "</div>";
                                                    echo "</form>";
                                                }
                                                echo "</tbody>";
                                                echo "<tr class=\"jumlahpembelians\" style=\"height:50px;\">";
                                                echo "<td style=\"border-bottom: 1px solid rgba(255,255,255,0.5);\">";
                                                echo "</td>";
                                                echo "<td style=\"border-bottom: 1px solid rgba(255,255,255,0.5);\">";
                                                echo "</td>";
                                                echo "<td style=\"border-bottom: 1px solid rgba(255,255,255,0.5);\">";
                                                echo "</td>";
                                                echo "<td style=\"border-bottom: 1px solid rgba(255,255,255,0.5);\" class=\"text-right\">";
                                                echo "<label style=\"margin-bottom:-80px;\">Total Pembelian :</label>";
                                                echo "</td>";
                                                echo "<td style=\"border-bottom: 1px solid rgba(255,255,255,0.5);\" class=\"text-right\">";
                                                echo "<label style=\"margin-bottom:-80px\">". $totalPembelian ."</label>";
                                                echo "</td>";
                                                echo "</tr>";
                                                echo "<form class=\"form-horizontal\" action='prosespencatatan.php' method=\"POST\">";
                                                echo "<tr class=\"jumlahpembelians\" style=\"height:60px;\">";
                                                echo "<td style=\"border-bottom: 1px solid rgba(255,255,255,0.5);\">";
                                                echo "</td>";
                                                echo "<td style=\"border-bottom: 1px solid rgba(255,255,255,0.5);\">";
                                                echo "</td>";
                                                echo "<td  colspan=\"2\" style=\"border-bottom: 1px solid rgba(255,255,255,0.5);\" class=\"text-right\">";
                                                echo "<label style=\"margin-bottom:-80px;\" >Jadwal Distribusi :</label>";
                                                echo "</td>";
                                                echo "<td  colspan=\"2\" style=\"border-bottom: 1px solid rgba(255,255,255,0.5);\" class=\"text-right\">";
                                                echo "<input type=\"radio\" name=\"tgldistribusi\" value=\"hariini\"> Hari Ini &nbsp;&nbsp;";
                                                echo "<input type=\"radio\" name=\"tgldistribusi\" value=\"harilain\"> Hari Lain";
                                                echo "<div id=\"tanggal\">";
                                                echo "<center>";
                                                echo "<input style=\"margin-left:18px; width:150px;\" type=\"date\" class=\"form-control\" aria-describedby=\"basic-addon1\" name=\"tanggal\">";
                                                echo "</center>";
                                                echo "</div>";
                                                echo "</td>";
                                                echo "<td style=\"border-bottom: 1px solid rgba(255,255,255,0.5);\" class=\"text-right\">";
                                                echo "</td>";
                                                echo "</tr>";
                                                echo "<tr class=\"jumlahpembelian\" style=\"height:60px;\">";
                                                echo "<td>";
                                                echo "</td>";
                                                echo "<td>";
                                                echo "</td>";
                                                echo "<td>";
                                                echo "</td>";
                                                echo "<td class=\"text-right\" style=\"padding-right:20px;\">";
                                                echo "<a href=\"pembeliharian.php\" class=\"btn btn-primary btn-lg\" style=\"padding:9px; border-radius:10px;\">Lanjutkan Belanja</a>";
                                                echo "</td>";
                                                echo "<td>";
                                                echo "<input type=\"submit\" class=\"btn btn-primary btn-lg\" name=\"selesai\" value=\"Selesai Belanja\" style=\"padding:9px; border-radius:10px;\"/>";
                                                echo "</td>";
                                                echo "</tr>";
                                                echo "</form>";
                                                echo "</tbody>";
                                            ?>
                                    </table>
                                </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="page-footer">
        <!-- Copyright etc -->
        <div class="small-print">
        	<div class="container">
        		<p>Copyright &copy; SI G-ETEK 2015</p>
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