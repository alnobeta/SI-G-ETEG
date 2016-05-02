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
                <div class="col-md-10 col-md-offset-1 " >
                    <div class="box">
                        <h1 style="margin-top:-10px; font-weight:bold; ">BANTUAN</h1>
                        <legend></legend>  
                        <h3 style="text-align:left;margin-top:-10px; font-weight:bold; ">Posting Produk</h3>
                        <legend></legend> 
                           <div class="col-md-12">
                               <table>
                                   <tbody>
                                       <tr>
                                           <td><label class="nomor">1.</label></td>
                                            <td class="nomor1">
                                                <label class="isi2">Pilih file gambar produk yang akan di posting.</label>
                                            </td>
                                       </tr>

                                       <tr>
                                           <td><label class="nomor">2.</label></td>
                                            <td class="nomor1">
                                                <label class="isi2">Pilih kategori produk, dan beri nama produk postingan.</label>
                                            </td>
                                       </tr>
                                       <tr>
                                           <td><label class="nomor">3.</label></td>
                                            <td class="nomor1">
                                                <label class="isi">isikan jumlah stok yang tersedia dan harga yang sesuai, tambahkan keterangan untuk menarik perhatian pembeli.</label>
                                            </td>
                                       </tr>
                                   </tbody>
                               </table>
                           </div>
                        <legend></legend>  
                        <h3 style="text-align:left;margin-top:-10px; font-weight:bold; ">Update dan Hapus Postingan</h3>
                        <legend></legend> 
                           <div class="col-md-12">
                               <table>
                                   <tbody>
                                       <tr>
                                           <td><label class="nomor">1.</label></td>
                                            <td class="nomor1">
                                                <label class="isi2">Masukkan Harga atau Stock baru dalam produk, dan klik Update.</label>
                                            </td>
                                       </tr>

                                       <tr>
                                           <td><label class="nomor">2.</label></td>
                                            <td class="nomor1">
                                                <label class="isi2">Klik simbol &times; untuk menghapus postingan.</label>
                                            </td>
                                       </tr>
                                   </tbody>
                               </table>
                           </div>
                            <legend></legend>
                            <h3 style="text-align:left;margin-top:-10px; font-weight:bold; ">Jadwal Distribusi</h3>
                        <legend></legend> 
                           <div class="col-md-12">
                               <table>
                                   <tbody>
                                       <tr>
                                            <td class="nomor1">
                                                <label class="isi2">Jadwal Distribusi adalah jadwal dimana anda harus mengirimkan produk yang dipesan pembeli
                                                ke alamat yang tertera di Jadwal Distribusi, Siapkan kurir untuk mengantarkan produk pesanan dan juga untuk perantara
                                                pembayaran.</label>
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