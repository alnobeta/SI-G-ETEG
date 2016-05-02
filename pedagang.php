<!DOCTYPE html>
<!-- Template by Quackit.com -->
<!-- Images by various sources under the Creative Commons CC0 license and/or the Creative Commons Zero license. 
Although you can use them, for a more unique website, replace these images with your own. -->
<html lang="en">

<head>
    <?php
        include 'koneksi.php';

        $username = $_SESSION['username'];
        date_default_timezone_set("Asia/Jakarta");
        $q = mysql_query("SELECT * FROM kategori");

        $sql = mysql_query("SELECT * FROM penjual WHERE username = '$username'");

        while ($nama = mysql_fetch_array($sql)) {
            $namadepan = $nama['nama_depan'];
            $namabelakang = $nama['nama_belakang'];
        }

        $q2 = mysql_query("SELECT * FROM produk pr JOIN penjual p ON pr.id_penjual = p.id_penjual WHERE p.username = '$username' ORDER BY pr.waktu_post DESC");
        if (isset($_COOKIE['updateErr'])) {
            $updateErr = $_COOKIE['updateErr'];
        }
        else{
            $updateErr = "";
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
    <script type="text/javascript">
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };
    </script>
    <?php
        $pesanErr = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $q1 = mysql_fetch_array(mysql_query("SELECT * FROM penjual WHERE username = '$username'"));
            $gambar = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
            $penjual = $q1['id_penjual'];
            $kategoriproduk = mysql_escape_string($_POST['kategoriproduk']);
            $namaproduk = mysql_escape_string($_POST['namaproduk']);
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];
            $keterangan = mysql_escape_string($_POST['keterangan']);
            $waktu = date("y-m-d H:i:s");

            if (!preg_match("/^[0-9]*$/",$stok)) {
                $pesanErr = "Stok Hanya Bisa Diisi oleh Angka";
                $stok ="";  //kosongkan variabel $nomor
            }
            elseif (!preg_match("/^[0-9]*$/",$harga)) {
                $pesanErr = "Harga Hanya Bisa Diisi oleh Angka";
                $harga ="";  //kosongkan variabel $nomor
            }
            else{
                $ins = mysql_query("INSERT INTO produk(id_kategori,id_penjual,nama_produk,keterangan_produk,gambar_produk,stok,harga,waktu_post) VALUES('".$kategoriproduk."','".$penjual."','".$namaproduk."','".$keterangan."','".$gambar."','".$stok."','".$harga."','".$waktu."')");
                echo "<meta http-equiv='refresh' content='0; url=pedagang.php'>";
            }
        }
    ?>
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
                <a class="navbar-brand" href="pedagang.php">
                	<span class="glyphicon glyphicon-fire"></span> 
                	SI G-ETEG
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="jadwaldistribusi.php">LIHAT JADWAL DISTRIBUSI</a>
                    </li>
                    <li>
                        <a href="helppedagang.php">HELP</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php
                                echo $namadepan . " " . $namabelakang;
                            ?>
                            <span class="caret"></span></a>
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
                <div class="col-md-6 col-md-offset-3 " >
                    <div class="box">
                        <center>
                            <h1 style="margin-top:-10px;">POSTING PRODUK</h1>
                            <h4 class="error"><?php echo $pesanErr;?></h4>
                            <legend></legend>
                            <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div id="atas">
                                        <img id="uploadPreview" style="height:50px; widht:50px;">
                                    </div>
                                    <div id="bawah">
                                        <label for="gambar" class="col-sm-4 control-label">Ambil Gambar *</label>
                                        <div class="col-sm-6">
                                            <input id="uploadImage" type="file" name="gambar" onchange="PreviewImage();">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kategori" class="col-sm-4 control-label">Kategori Produk *</label>
                                    <div class="col-sm-4">
                                        <select name="kategoriproduk">
                                            <?php
                                                while ($data = mysql_fetch_array($q)) {
                                                    $id = $data['id_kategori'];
                                                    $kategori = $data['kategori'];
                                                    echo "<option value=\"$id\">".$kategori."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="namaproduk" class="col-sm-4 control-label">Nama Produk *</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="namaproduk" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="stok" class="col-sm-4 control-label">Jumlah Stock *</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="stok" placeholder="Kg" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga" class="col-sm-4 control-label">Harga *</label>
                                    <div class="col-sm-1">
                                        <input type="text" name="harga" placeholder="Rp." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan" class="col-sm-4 control-label">Keterangan *</label>
                                    <div class="col-sm-1">
                                        <textarea name="keterangan" placeholder="Keterangan" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-5 col-sm-10">
                                        <input type="submit" class="btn btn-primary btn-lg" name="simpan" value="SIMPAN" />
                                    </div>
                                </div>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <legend></legend>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 " >
                <center>
                    <h1 style="margin-top:-10px;">PRODUK</h1>
                    <legend></legend>
                </center>
            </div>
        </div>
        <div class="container">
        <div class="row">
            <?php
                $banyak = mysql_num_rows($q2);
                for ($i=0; $i < $banyak; $i++) { 
                    for ($j=0; $j <= 1; $j++) {
                        while ($dataproduk = mysql_fetch_array($q2)) {
                            $id = $dataproduk['id_produk'];
                            $hargalama = $dataproduk['harga'];
                            $stoklama = $dataproduk['stok'];
                            echo "<div class=\"col-md-6\">";
                            echo "<div class=\"box\">";
                            echo "<center>";
                            echo "<div id=\"atas\">";
                            echo "<a style=\"float:right; color:red; font-size:30px; margin-right:10px; text-decoration:none;\" href=\"delete.php?id=$id\">";
                            echo "<i class=\"fa fa-times\">";
                            echo "</i>";
                            echo "</a>";
                            echo "</div>";
                            echo "<div id=\"bawah\">";
                            echo "<h1 style=\"margin-top:-10px;\">".$dataproduk['nama_produk']."</h1>";
                            echo "</div>";
                            echo $updateErr;
                            echo "<legend></legend>";
                            echo "<form class=\"form-horizontal\" action=\"updateproduk.php?id=$id\" method=\"POST\">";
                            echo "<div class=\"col-md-4\">";
                            echo "<div class=\"form-group\">";
                            echo "<img src=\"imageview.php?image_id=$id\" style=\"height:100px; widht:100px;\">";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class=\"col-md-8\">";
                            echo "<div class=\"form-group\">";
                            echo $dataproduk['keterangan_produk'];
                            echo "</div>";
                            echo "<div class=\"form-inline\">";
                            echo "<div class=\"form-group\">";
                            echo "<label for=\"harga\" class=\"col-sm-3 control-label\">Harga</label>";
                            echo "<div class=\"col-sm-1\">";
                            echo "<input style=\"width:90px;\" type=\"text\" name=\"harga\" placeholder=\"$hargalama\">";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class=\"form-group\">";
                            echo "<label for=\"stok\" class=\"col-sm-3 control-label\">Stok</label>";
                            echo "<div class=\"col-sm-1\">";
                            echo "<input style=\"width:50px;\" type=\"text\" name=\"stok\" placeholder=\"$stoklama\">";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class=\"form-group\">";
                            echo "<div class=\"col-sm-offset-5 col-sm-10\">";
                            echo "<input type=\"submit\" class=\"btn btn-primary btn-lg\" name=\"update\" value=\"UPDATE\" style=\"padding:10px; border-radius:10px; margin-top:22px;\">";
                            echo "</div>";
                            echo "</div>";
                            echo "</form>";
                            echo "</center>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    echo "<br>";
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