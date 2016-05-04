<!DOCTYPE html>
<!-- Template by Quackit.com -->
<!-- Images by various sources under the Creative Commons CC0 license and/or the Creative Commons Zero license. 
Although you can use them, for a more unique website, replace these images with your own. -->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>SI G-ETEG</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/daftar.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script language='JavaScript'>
        var ajaxRequest;
        function getAjax(){ //mengecek apakah web browser support AJAX atau tidak
            try{
                // Opera 8.0+, Firefox, Safari
                ajaxRequest = new XMLHttpRequest();
            }
            catch (e){
                // Internet Explorer Browsers
                try{
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch (e){
                    try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                    }
                }
            }
        }

        function validasiUsername(keyEvent){ //fungsi untuk mengambil nilai setiap huruf yang dimasukkan
            keyEvent = (keyEvent) ? keyEvent: window.event;
            input = (keyEvent.target) ? keyEvent.target: keyEvent.srcElement;
            if (input.value){ //jika input dimasukkan, masuk ke fungsi cekEmail
                cekUsername("validasi/cekusername.php?input=" + input.value);
            }
        }

        function validasiEmail(keyEvent){ //fungsi untuk mengambil nilai setiap huruf yang dimasukkan
            keyEvent = (keyEvent) ? keyEvent: window.event;
            input = (keyEvent.target) ? keyEvent.target: keyEvent.srcElement;
            if (input.value){ //jika input dimasukkan, masuk ke fungsi cekEmail
                cekEmail("validasi/cekemail.php?input=" + input.value);
            }
        }

        function validasiPass(keyEvent,pilihan){ //fungsi untuk mengambil nilai setiap huruf yang dimasukkan
            keyEvent = (keyEvent) ? keyEvent: window.event;
            input = (keyEvent.target) ? keyEvent.target: keyEvent.srcElement;
            if (input.value){ //jika input dimasukkan, masuk ke fungsi cekEmail
                if (pilihan == 1){
                    cekPass("validasi/cekpass.php?password=1&input=" + input.value,1); //mengirim inputan ke file cekpass.php
                }
                else if (pilihan == 2){
                    pass = document.getElementById("pass").value; //mengambil nilai dari form password yang telah dicek
                    cekPass("validasi/cekpass.php?password=2&pass=" + pass + "&input=" + input.value,2); //mengirim inputan konfirmasi password
                }
            }
        }

        function validasiKodePos(keyEvent){ //fungsi untuk mengambil nilai setiap huruf yang dimasukkan
            keyEvent = (keyEvent) ? keyEvent: window.event;
            input = (keyEvent.target) ? keyEvent.target: keyEvent.srcElement;
            if (input.value){ //jika input dimasukkan, masuk ke fungsi cekEmail
                cekKodePos("validasi/cekkodepos.php?input=" + input.value);
            }
        }

        function cekUsername(fileCek){ //fungsi untuk menampilkan hasil pengecekan
            getAjax();
            ajaxRequest.open("GET",fileCek);
            ajaxRequest.onreadystatechange = function(){
                document.getElementById("istimewa").innerHTML = ajaxRequest.responseText;
            }
            ajaxRequest.send(null);
        }

        function cekEmail(fileCek){ //fungsi untuk menampilkan hasil pengecekan
            getAjax();
            ajaxRequest.open("GET",fileCek);
            ajaxRequest.onreadystatechange = function(){
                document.getElementById("nice").innerHTML = ajaxRequest.responseText;
            }
            ajaxRequest.send(null);
        }

        function cekPass(fileCek,keterangan){ //fungsi untuk menampilkan hasil pengecekan
            getAjax();
            ajaxRequest.open("GET",fileCek);
            ajaxRequest.onreadystatechange = function(){
                if (keterangan == 1){
                    document.getElementById("hasil").innerHTML = ajaxRequest.responseText; //hasil cek kekuatan password
                }
                else if (keterangan == 2){
                    document.getElementById("cocok").innerHTML = ajaxRequest.responseText; //hasil cek konfirmasi password
                }
            }
            ajaxRequest.send(null);
        }

        function cekKodePos(fileCek){ //fungsi untuk menampilkan hasil pengecekan
            getAjax();
            ajaxRequest.open("GET",fileCek);
            ajaxRequest.onreadystatechange = function(){
                document.getElementById("mantap").innerHTML = ajaxRequest.responseText;
            }
            ajaxRequest.send(null);
        }
    </script>
    <style type="text/css">
        .error{
            color: #000080;
        }
    </style>
    
</head>

<body>
    <?php
        if (isset($_COOKIE['daftarErr'])) {
            $daftarErr = $_COOKIE['daftarErr'];
        }
        else{
            $daftarErr = "";
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
                <a class="navbar-brand" href="index.php">
                    <span class="glyphicon glyphicon-fire"></span> 
                    SI G-ETEG
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a href="helpawal.php">HELP</a>
                    </li>

                    <li>
                        <a href="daftar.php">DAFTAR</a>
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
                        <h1 style="margin-top:-10px; font-weight:bold; ">DAFTAR</h1>
                        <h3 class="error"><?php echo $daftarErr;?></h3>
                        <div class="col-md-3">
                            <h3>Detail Akun</h3>
                        </div>
                        <legend></legend>
                        <form method="POST" action="prosescekform.php" class="form-horizontal" style="margin-top:30px;">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="username" class="col-sm-3 control-label">Username *</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="username" placeholder="Username" onkeyup="validasiUsername(event)" required>
                                    </div>
                                    <div class="col-sm-6" style="text-align:left; margin-left: -30px; margin-top:5px; padding:0px; color:black;">
                                        <span id="istimewa"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">E-Mail *</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="email" placeholder="Email" onkeyup="validasiEmail(event)" required>
                                    </div>
                                    <div class="col-sm-2" style="text-align:left;margin-left: -30px; margin-top:5px; padding:0px; color:black;">
                                        <span id="nice"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label">Password *</label>
                                    <div class="col-sm-3">
                                        <input type="password" name="password" placeholder="Password" onkeyup="validasiPass(event,1)" id="pass" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="retype" class="col-sm-3 control-label">Ulangi Password *</label>
                                    <div class="col-sm-3" style="padding-right: 0px; padding-left: 0px;">
                                        <input type="password" onkeyup="validasiPass(event,2)" placeholder="Re-type Password" required>
                                    </div>
                                    <div class="col-sm-6" style="text-align:left; margin-left: -30px; margin-top:5px; padding:0px; color:black;">
                                        <span id="cocok"></span>
                                    </div>
                                </div>
                            </div>
                            <legend></legend>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="namadepan" class="col-sm-3 control-label">Nama Depan *</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="namadepan" placeholder="Nama Depan" required>
                                    </div>
                                    <label for="namabelakang" class="col-sm-2 control-label">Nama Belakang </label>
                                    <div class="col-sm-3">
                                        <input type="text" name="namabelakang" placeholder="Nama Belakang" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="col-sm-3 control-label">Alamat *</label>
                                    <div class="col-sm-4">
                                        <input  type="text" name="alamat" style="width:250px;" placeholder="Alamat" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan" class="col-sm-3 control-label">Kecamatan *</label>
                                    <div class="col-sm-3">
                                        <select name="jenis-kecamatan">
                                            <option>Pilih Kecamatan</option>
                                            <option>Blimbing</option>
                                            <option>Kedungkandang</option>
                                            <option>Klojen</option>
                                            <option>Lowokwaru</option>
                                            <option>Sukun</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kodepos" class="col-sm-3 control-label">Kode Pos *</label>
                                    <div class="col-sm-3" style="padding-right: 0px; padding-left: 0px;">
                                        <input type="text" onkeyup="validasiKodePos(event)" name="kodepos" placeholder="Kode Pos" required>
                                    </div>
                                    <div class="col-sm-2" style="margin-left: -75px; padding:0px; color:#000080;">
                                        <span id="mantap"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomorhp" class="col-sm-3 control-label">Nomor HP</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="nomorhp" placeholder="Nomor Handphone/Telepon" style="width:250px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h3>Detail User</h3>
                            </div>
                            <legend></legend>
                            <div id="jenisUser">
                                <div class="form-group">
                                    <label for="jenis-user" class="col-sm-5 control-label">Jenis User *
                                    </label>
                                    <div class="col-sm-2">
                                        <label class="radio">
                                            <input type="radio" name="jenis-user" value="Customer"> Pembeli
                                        </label>
                                    </div>
                                    <div class="col-sm-1">
                                        <label class="radio">
                                            <input type="radio" name="jenis-user"  value="Pedagang"> Penjual
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="jenisCustomer">
                                <div class="form-group">
                                    <label for="jenis-pembeli" class="col-sm-5 control-label">Jenis Pembeli *</label>
                                    <div class="col-sm-2">
                                        <label class="radio">
                                            <input name="jenis-cust" type="radio" value="CustHarian">Harian
                                        </label>
                                    </div>
                                    <div class="col-sm-1">
                                        <label class="radio">
                                            <input type="radio" name="jenis-cust" value="CustBulanan"> Bulanan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <p style="font-align:left; font-size:14px; color:black;">Klik "DAFTAR" jika anda menyetujui Aturan SI G-ETEK</p>
                            </div>
                            <legend></legend>
                            <input type="submit" class="btn btn-primary btn-lg" name="daftar" value="DAFTAR" />
                        </form>
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

</body>

</html>
