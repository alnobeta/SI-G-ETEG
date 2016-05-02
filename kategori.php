<!DOCTYPE html>
<!-- Template by Quackit.com -->
<!-- Images by various sources under the Creative Commons CC0 license and/or the Creative Commons Zero license. 
Although you can use them, for a more unique website, replace these images with your own. -->
<html lang="en">
<head>
    <?php
        include_once 'koneksi.php';
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>SI G-ETEG</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/admin.css" rel="stylesheet">
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
    a.popup-linkdel {
        text-align: center;
        margin:auto;
        position: relative;
        height: 30px;
        width: 100px;
        color: #000;
        text-decoration: none;
        background: rgba(255,255,255,0.4);
        border-left: 10px solid #de3246;
        /*border-radius: 3px;
        box-shadow: 0 5px 0px 0px #eea900;*/
        display: block;
    }
    a.popup-linkdel:hover {
        background: rgba(255,255,255,0.4);
        box-shadow: -5px 5px -5px 5px #000;
        -webkit-transition:all 1s;
        -moz-transition:all 1s;
        transition:all 1s;
        border-color: red;
    }
    a.popup-link {
        text-align: center;
        margin:auto;
        position: relative;
        height: 30px;
        width: 100px;
        color: #000;
        text-decoration: none;
        background: rgba(255,255,255,0.4);
        border-left: 10px solid yellowgreen;
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
        #popuptambahkategori {
        visibility: hidden;
        opacity: 0;
        margin-top: -900px;
    }
    #popuptambahkategori:target {
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
    #popupdelete {
        visibility: hidden;
        opacity: 0;
        margin-top: -900px;
    }
    #popupdelete:target {
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
    #popupedit {
        visibility: hidden;
        opacity: 0;
        margin-top: -900px;
    }
    #popupedit:target {
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
        text-align: left;
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
        text-align: center;
        padding: 8px;
    }
    .popup-form .input-group input[type="submit"]:focus {
        box-shadow: inset #ea7722;
        border-color: white;
    }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <a class="navbar-brand" href="Admin.php">
                <span class="glyphicon glyphicon-fire"></span> 
                SI G-ETEG
            </a>
            <!-- Navbar links -->
            <div class=" navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="logout.php" style="float:right;">Logout</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
    <div id="wrapper" class="active">
        <div id="sidebar-wrapper">
            <ul id="sidebar_menu" class="sidebar-nav">
                <li class="sidebar-brand"><a id="menu-toggle" href="Admin.php">ADMIN<span style="margin-right:-50px;" id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
            </ul>
            <ul class="sidebar-nav" id="sidebar">
                <li><a href="admin.php">Edit User<span style="margin-right:-50px;"  class="sub_icon glyphicon glyphicon-user"></span></a></li>
                <li><a href="editkategori.php">Edit Kategori<span style="margin-right:-50px;"  class="sub_icon glyphicon glyphicon-tags"></span></a></li>
                <li><a href="lihattrans.php">Lihat Transaksi<span style="margin-right:-50px;"  class="sub_icon glyphicon glyphicon-stats"></span></a></li>
            </ul>
        </div>
        <section class="intro">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="box">
                            <center>
                                <h1 style="margin-top:-10px;">KATEGORI</h1>
                                <legend></legend>
                                <table class="table table-bordered " style="border:3px solid white;">
                                    <thead style="border:3px solid white;">
                                        <tr id="bold" class="danger">
                                            <th style="width:50px;border:3px solid rgba(255,255,255,0.5);" class="text-center" ><label>No.</label></th>
                                            <th style="width:350px; border:3px solid rgba(255,255,255,0.5);"class="text-center" ><label>Nama Kategori</label></th>
                                            <th style="width:150px;border:3px solid rgba(255,255,255,0.5);" colspan="2"; class="text-center" ><label>Aksi</label></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $q = mysql_query("SELECT * FROM kategori");
                                            while ($data = mysql_fetch_array($q)) {
                                                $idkat = $data['id_kategori'];
                                                echo "<tr>";
                                                echo "<td style=\"border:3px solid rgba(255,255,255,0.5);\"class=\"text-center\">".$data['id_kategori']."</td>";
                                                echo "<td style=\"padding-right:-87px; border:3px solid rgba(255,255,255,0.5);\">".$data['kategori']."</td>";
                                                echo "<td style=\"border:3px solid rgba(255,255,255,0.5); border-right:none;\" class=\"text-center\"><a href=\"?id=$idkat#popupedit\" style=\"font-size:15px; border-left:9px solid #9acd32; margin-left:50px;\" class=\"btn btn-primary btn-lg popup-linkdel\">EDIT</a></td>";
                                                echo "<td style=\"border:3px solid rgba(255,255,255,0.5); border-left:none;\" class=\"text-center\" ><a href=\"?id=$idkat#popupdelete\" style=\"font-size:15px; border-left:9px solid #de3246; margin-right:50px;\" class=\"btn btn-primary btn-lg popup-linkdel\">HAPUS</a></td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <a href="#popuptambahkategori" class="btn btn-primary btn-lg" style=" background-color:yellowgreen;font-size:16px; padding:9px; border-radius:7px;">TAMBAH KATEGORI</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <footer class="page-footer">
        <div class="container">
            <p>Copyright &copy; SI G-ETEK 2015</p>
        </div>
    </footer>
    <div class="popup-wrapper" id="popupdelete">
        <div class="popup-container">
            <br>
            <center>
                <label style="font-family:georgia; font-size:20px;">HAPUS KATEGORI</label>
                <legend></legend>
            </center>
            <table>
                <?php
                    $idk = $_GET['id'];
                    $q = mysql_query("SELECT * FROM kategori WHERE id_kategori = $idk");
                    while ($data1 = mysql_fetch_array($q)) {
                        $idkateg = $data1['id_kategori'];
                        $namakat = $data1['kategori'];
                    }
                ?>
                <tbody>
                    <tr>
                        <td style="width:250px;">
                            <p style="font-size:17px; margin-top:10px;float:left; padding-left:80px;">
                                <label>Nama Kategori</label>
                            </p>
                        </td>
                        <td>:</td>
                        <td style="width:160px; ">
                            <p style="font-size:16px;  margin-top:10px; float:left; padding-left:9px;"><?php echo $namakat;?></p>
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr style="height:10px; ">
                        <td style="padding-left:19px;  width:400px; ">
                            <a href="deletekategori.php?id=<?php echo $idkateg; ?>" class="btn btn-primary btn-lg" style="font-size:12px; padding:9px; border-radius:7px; float:right;">Hapus</a>
                        </td>
                        <td style="padding-left:19px;">
                            <a href="kategori.php" class="btn btn-primary btn-lg" style=" background-color:#DE3246;font-size:12px; padding:9px; border-radius:7px; float:right;">Batal</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <div class="popup-wrapper" id="popupedit">
        <div class="popup-container">
            <br>
            <center>
                <label style="font-family:georgia; font-size:20px;">EDIT KATEGORI</label>
                <legend></legend>
            </center>
            <form action="updatekategori.php" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td style="width:250px;">
                                <p style="font-size:17px; margin-top:10px;float:left; padding-left:80px;">
                                    <label>Nama Kategori</label>
                                </p>
                            </td>
                            <td><input style="margin-left:-9px; float:left;" type="text" name="kategori" placeholder="<?php echo $namakat; ?>"><br>
                                <input type="hidden" name="idkategori" value="<?php echo $idkateg; ?>"></td>
                            <td style="width:200px; ">
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr style="height:10px; ">
                            <td style="padding-left:19px;  width:400px; ">
                                <input type="submit" name="update" class="btn btn-primary btn-lg" style="font-size:12px; padding:9px; border-radius:7px; float:right;" value="Update">
                            </td>
                            <td style="padding-left:19px; padding-right:94px;">
                                <a href="kategori.php" class="btn btn-primary btn-lg" style=" background-color:#DE3246;font-size:12px; padding:9px; border-radius:7px; float:right;">Batal</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <div class="popup-wrapper" id="popuptambahkategori">
        <div class="popup-container">
            <br>
            <center>
                <label style="font-family:georgia; font-size:20px;">TAMBAH KATEGORI</label>
                <legend></legend>
            </center>
            <form action="tambahkategori.php" method="POST">
                <table>
                <tbody>
                        <tr>
                            <td style="width:250px;">
                                <p style="font-size:17px; margin-top:10px;float:left; padding-left:80px;">
                                    <label>Nama Kategori</label>
                                </p>
                            </td>
                            <td><input style="margin-left:-9px; float:left;" type="text" name="kategori" placeholder="Nama Kategori"><br>
                            <td style="width:200px; ">
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr style="height:10px; ">
                            <td style="padding-left:19px;  width:400px; ">
                                <input type="submit" name="simpan" class="btn btn-primary btn-lg" style="font-size:12px; padding:9px; border-radius:7px; float:right;" value="Tambah">
                            </td>
                            <td style="padding-left:19px; padding-right:94px;">
                                <a href="kategori.php" class="btn btn-primary btn-lg" style=" background-color:#DE3246;font-size:12px; padding:9px; border-radius:7px; float:right;">Batal</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
    <script src="js/navbar.js"></script>
</body>
</html>