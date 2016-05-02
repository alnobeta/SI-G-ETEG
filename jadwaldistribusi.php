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
            $idpenjual = $nama['id_penjual'];
        }

        $q2 = mysql_query("SELECT * FROM produk pr JOIN penjual p ON pr.id_penjual = p.id_penjual WHERE p.username = '$username'");

        $day[0] = "Sunday";
        $day[1] = "Monday";
        $day[2] = "Tuesday";
        $day[3] = "Wednesday";
        $day[4] = "Thursday";
        $day[5] = "Friday";
        $day[6] = "Saturday";

        $day["Sunday"] = 0;
        $day["Monday"] = 1;
        $day["Tuesday"] = 2;
        $day["Wednesday"] = 3;
        $day["Thursday"] = 4;
        $day["Friday"] = 5;
        $day["Saturday"] = 6;

        $bulan = date("n");
        $thisbulan = date("F");
        $bulanini = date("m");
        $tanggal = date("j");
        $hariini = date("l");
        $hari = $day[$hariini];
        $tahun = date("Y");

        $query = mysql_query("SELECT CONCAT(p.nama_depan,\" \", p.nama_belakang) AS Nama, pr.nama_produk, j.banyak, j.total_harga,j.jadwal_distribusi FROM jadwal_distribusi j JOIN pembeli p ON j.id_pembeli = p.id_pembeli JOIN penjual pn ON j.id_penjual = pn.id_penjual JOIN produk pr ON j.id_produk = pr.id_produk JOIN kategori k ON pr.id_kategori = k.id_kategori WHERE j.id_penjual = $idpenjual && month(j.jadwal_distribusi) = $bulanini");
        $hitung = mysql_num_rows($query);

        if ($hitung != 0) {
            while($e=mysql_fetch_array($query)){
                $tglevent[] = $e['jadwal_distribusi'];
                $judulacara[] = $e['Nama'];
            }
            switch($bulan){
                case 1 : $jhari = 31; break;
                case 2 :
                    $sisa = $tahun%4;
                    if(!$sisa){
                        $jhari = 29;
                    }else{
                        $jhari = 28;
                    } break;
                case 3 : $jhari = 31; break;
                case 4 : $jhari = 30; break;
                case 5 : $jhari = 31; break;
                case 6 : $jhari = 30; break;
                case 7 : $jhari = 31; break;
                case 8 : $jhari = 31; break;
                case 9 : $jhari = 30; break;
                case 10 : $jhari = 31; break;
                case 11 : $jhari = 30; break;
                case 12 : $jhari = 31; break;
            }
            //kode untuk mencari hari pada tanggal 1
            //---------------------
            $t1 = 1-($tanggal%7);
            $tanggal1 = $t1+$hari;
            if($tanggal1<0){
                $tanggal1=$tanggal1+7;
            }
            $hari1 = $day[$tanggal1];
            if($tanggal1==0 || $tanggal1==1 || $tanggal1==2 || $tanggal1==3 || $tanggal1==4){
                $jbaris = 5;
            }else{
                $jbaris = 6;
            }
        }
        else{
            $tglevent = NULL;
            $judulacara = "";
            switch($bulan){
                case 1 : $jhari = 31; break;
                case 2 :
                    $sisa = $tahun%4;
                    if(!$sisa){
                        $jhari = 29;
                    }else{
                        $jhari = 28;
                    } break;
                case 3 : $jhari = 31; break;
                case 4 : $jhari = 30; break;
                case 5 : $jhari = 31; break;
                case 6 : $jhari = 30; break;
                case 7 : $jhari = 31; break;
                case 8 : $jhari = 31; break;
                case 9 : $jhari = 30; break;
                case 10 : $jhari = 31; break;
                case 11 : $jhari = 30; break;
                case 12 : $jhari = 31; break;
            }
            //kode untuk mencari hari pada tanggal 1
            //---------------------
            $t1 = 1-($tanggal%7);
            $tanggal1 = $t1+$hari;
            if($tanggal1<0){
                $tanggal1=$tanggal1+7;
            }
            $hari1 = $day[$tanggal1];
            if($tanggal1==0 || $tanggal1==1 || $tanggal1==2 || $tanggal1==3 || $tanggal1==4){
                $jbaris = 5;
            }else{
                $jbaris = 6;
            }
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
    <!-- Core CSS File. The CSS code needed to make eventCalendar works -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'> 
    <style>
        table.tblkal {border-collapse:collapse;font-size:12pt;
            color:black;font-family:verdana;}
        a.tgl{color:black;text-decoration:none;}
        td.nhari{color:white;  padding: 10px; height: 40px;}
    </style>

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
                <div class="col-md-12">
                <center>
                    <table border="2" bordercolor="#ababab" class="tblkal" cellpadding="5" cellspacing="1">
                        <tr><td class="text-center" style="font-size:40px; background-color:rgb(230,230,230); font-family:georgia;" colspan=7><font color=black>
                            (<?php echo "$thisbulan-$tahun";?>)</td>
                        </tr>
                        <tr>
                            <td style="background-color:red;border-bottom:7px solid rgba(0,0,0,0.5);" width="14%" valign="middle" class="nhari"><b style="color:black;"><center>Minggu</center></b></td>
                            <td style="background-color:rgba(255,255,255,0.5);border-bottom:7px solid rgba(0,0,0,0.5);" width="14%" valign="middle" class="nhari"><b style="color:black;"><center>Senin</center></b></td>
                            <td style="background-color:rgba(255,255,255,0.5);border-bottom:7px solid rgba(0,0,0,0.5);" width="14%" valign="middle" class="nhari"><b style="color:black;"><center>Selasa</center></b></td>
                            <td style="background-color:rgba(255,255,255,0.5);border-bottom:7px solid rgba(0,0,0,0.5);" width="14%" valign="middle" class="nhari"><b style="color:black;"><center>Rabu</center></b></td>
                            <td style="background-color:rgba(255,255,255,0.5);border-bottom:7px solid rgba(0,0,0,0.5);" width="14%" valign="middle" class="nhari"><b style="color:black;"><center>Kamis</center></b></td>
                            <td style="background-color:rgba(255,255,255,0.5);border-bottom:7px solid rgba(0,0,0,0.5);" width="14%" valign="middle" class="nhari"><b style="color:black;"><center>Jumat</center></b></td>
                            <td style="background-color:rgba(255,255,255,0.5);border-bottom:7px solid rgba(0,0,0,0.5);" width="14%" valign="middle" class="nhari"><b style="color:black;"><center>Sabtu</center></b></td>
                         </tr>
                         <?php
                            //kode untuk menampilkan tanggal dalam bentuk tabel
                            //-------------------------------------------------
                            $dayi = 0;
                            $dayx = 1;
                            for($i=0;$i<$jbaris;$i++){
                                echo "<tr style=\"height:70px; text-align:center;\">";
                                for($j=0;$j<7;$j++){
                                    if($j==0){
                                        $bgcolor="red";
                                    }else{
                                        $bgcolor="white";
                                    }
                                    if($dayi>=$day[$hari1]&&$dayx<=$jhari){
                                        if($dayx<10){
                                            $dayx2 = "0".$dayx;
                                        }else{
                                            $dayx2 = $dayx;
                                        }
                                        $date = "$tahun-$bulanini-$dayx2";
                                        $k=0;
                                        $class = "normal";
                                        $title = "";
                                        while($k<count($tglevent)){
                                            if($date==$tglevent[$k]){
                                                $class = "event";
                                                $bgcolor = "lightblue";
                                                $title = $judulacara[$k];
                                                break;
                                            }
                                            $k++;
                                        }
                                        if($dayx==$tanggal){
                                            echo "<td bgcolor=$bgcolor>$dayx</td>";
                                        }else{
                                            echo "<td bgcolor=$bgcolor><a title=\"$title\" class=\"tgl\" href=\"jadwaldistribusi.php?tgl=$date#popup\">$dayx</a></td>";
                                        }
                                        $dayx++;
                                    }else{
                                        echo "<td bgcolor=$bgcolor> </td>";
                                    }
                                    $dayi++;
                                }
                                echo "</tr>";
                            }
                            //-------------------drz---------------------------:)
                        ?>
                    </table>
                    </center>
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

    <div class="popup-wrapper" id="popup">
        <div class="popup-container" style="margin-top:20px;">
            <br>
            <center>
            <h2 style="margin-top:-20px;">Jadwal Pendistribusian</h2>
            <legend></legend>
            </center>
            <table>
                <tbody>
                <?php
                    $tgl = $_GET['tgl'];
                    $sel = mysql_query("SELECT CONCAT(p.nama_depan,\" \", p.nama_belakang) AS Nama, pr.nama_produk, j.banyak, j.total_harga,j.jadwal_distribusi, p.alamat FROM jadwal_distribusi j JOIN pembeli p ON j.id_pembeli = p.id_pembeli JOIN penjual pn ON j.id_penjual = pn.id_penjual JOIN produk pr ON j.id_produk = pr.id_produk JOIN kategori k ON pr.id_kategori = k.id_kategori WHERE j.jadwal_distribusi = '$tgl'");
                    while ($data = mysql_fetch_array($sel)) {
                        $namalengkap = $data['Nama'];
                        $produk = $data['nama_produk'];
                        $banyak = $data['banyak'];
                        $harga = $data['total_harga'];
                        $jadwaldist = $data['jadwal_distribusi'];
                        $alamat = $data['alamat'];
                        echo "<tr>";
                        echo "<td><label>Nama Pembeli</label></td>";
                        echo "<td style=\"padding-left:50px;\"><p>:</p></td>";
                        echo "<td style=\"padding-left:10px;\"><p>".$namalengkap."</p></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><label>Nama Produk</label></td>";
                        echo "<td style=\"padding-left:50px;\"><p>:</p></td>";
                        echo "<td style=\"padding-left:10px;\"><p>".$produk."</p></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><label>Jumlah</label></td>";
                        echo "<td style=\"padding-left:50px;\"><p>:</p></td>";
                        echo "<td style=\"padding-left:10px;\"><p>".$banyak."</p></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><label>Total Harga</label></td>";
                        echo "<td style=\"padding-left:50px;\"><p>:</p></td>";
                        echo "<td style=\"padding-left:10px;\"><p>".$harga."</p></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><label>Tanggal</label></td>";
                        echo "<td style=\"padding-left:50px;\"><p>:</p></td>";
                        echo "<td style=\"padding-left:10px;\"><p>".$jadwaldist."</p></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td style=\"border-bottom:1px solid black;\"><label>Alamat</label></td>";
                        echo "<td style=\"padding-left:50px; border-bottom:1px solid black;\"><p>:</p></td>";
                        echo "<td style=\"padding-left:10px; border-bottom:1px solid black;\"><p>".$alamat."</p></td>";
                        echo "</tr>";

                    }
                ?>
                </tbody>
            </table>


                <a class="popup-close" href="jadwaldistribusi.php">X</a>
            
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