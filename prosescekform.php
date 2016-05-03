<?php
   session_start();

   include_once 'koneksiawal.php';

   $username = $email = $password = $namadepan = $namabelakang = $alamat = $kecamatan = $kodepos = $noHp = $jenisuser = $jenispembeli = "";
   $penghitung = 0;

   if (isset($_POST['daftar'])) {
   	if ($_POST['jenis-kecamatan'] == "Pilih Kecamatan") {
   		setcookie("daftarErr", " Harap Isi Kecamatan Anda ", time()+3);
   		header("location:daftar.php");
   	}
   	else{
   		$username = mysql_escape_string($_POST['username']);
         $_SESSION["username"] = $_POST['username'];
   		$email = $_POST['email'];
   		$password = md5($_POST['password']);
   		$namadepan = mysql_escape_string($_POST['namadepan']);
   		$namabelakang = mysql_escape_string($_POST['namabelakang']);
   		$alamat = mysql_escape_string($_POST['alamat']);
   		$kecamatan = mysql_escape_string($_POST['jenis-kecamatan']);
   		$kodepos = $_POST['kodepos'];
   		$noHp = $_POST['nomorhp'];
         if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $banyakData = mysql_num_rows(mysql_query("SELECT username FROM user"));

            $data = mysql_fetch_array(mysql_query("SELECT username, email FROM user"));

            while ($penghitung <= $banyakData) {
               if ($username == $data['username'] && $email == $data['email']) {
                  setcookie("daftarErr", " Username dan Email Telah Digunakan ", time()+3);
                  header("location:daftar.php");
               }
               elseif ($username == $data['username'] && $email != $data['email']) {
                  setcookie("daftarErr", " Username Telah Digunakan ", time()+3);
                  header("location:daftar.php");
               }
               elseif ($username != $data['username'] && $email == $data['email']) {
                  setcookie("daftarErr", " Email Telah Digunakan ", time()+3);
                  header("location:daftar.php");
               }
               else{
                  if ($_POST['jenis-user'] == 'Customer') {
                     setcookie("jenisuser","Customer");
                     $jenisuser = $_POST['jenis-user'];
                     if ($_POST['jenis-cust'] == 'CustHarian') {
                        $jenispembeli = 1;
                        $ins = mysql_query("INSERT INTO user VALUES('".$username."','".$email."','".$password."')");
                        if ($ins) {
                           $ins1 = mysql_query("INSERT INTO pembeli(id_jenis_pembeli,username,nama_depan,nama_belakang,alamat,kecamatan,kodepos,noHp) VALUES('".$jenispembeli."','".$username."','".$namadepan."','".$namabelakang."','".$alamat."','".$kecamatan."','".$kodepos."','".$noHp."')");
                           if ($ins1) {
                              $rand = rand(111111, 999999);
                              setcookie("orderan", $rand);
                              header("location:pembeliharian.php");
                           }
                           else{
                              mysql_error();
                           }
                        }
                        else{
                           mysql_error();
                        }
                     }
                     elseif ($_POST['jenis-cust'] == 'CustBulanan'){
                        $jenispembeli = 2;
                        $ins2 = mysql_query("INSERT INTO user VALUES('".$username."','".$email."','".$password."')");
                        if ($ins2) {
                           $ins3 = mysql_query("INSERT INTO pembeli(id_jenis_pembeli,username,nama_depan,nama_belakang,alamat,kecamatan,kodepos,noHp) VALUES('".$jenispembeli."','".$username."','".$namadepan."','".$namabelakang."','".$alamat."','".$kecamatan."','".$kodepos."','".$noHp."')");
                           if ($ins3) {
                              $rand = rand(111111, 999999);
                              setcookie("orderan", $rand);
                              header("location:pembelibulanan.php");
                           }
                           else{
                              mysql_error();
                           }
                        }
                        else{
                           mysql_error();
                        }
                     }
                     else{
                        setcookie("daftarErr", " Harap Isi Jenis Pembeli Anda ", time()+3);
                        header("location:daftar.php");
                     }
                  }
                  elseif ($_POST['jenis-user'] == 'Pedagang') {
                     setcookie("jenisuser","Pedagang");
                     $jenisuser = $_POST['jenis-user'];
                     $ins4 = mysql_query("INSERT INTO user VALUES('".$username."','".$email."','".$password."')");
                     if ($ins4) {
                        $ins5 = mysql_query("INSERT INTO penjual(username,nama_depan,nama_belakang,alamat,kecamatan,kodepos,noHp) VALUES('".$username."','".$namadepan."','".$namabelakang."','".$alamat."','".$kecamatan."','".$kodepos."','".$noHp."')");
                        if ($ins5) {
                           $rand = rand(111111, 999999);
                           setcookie("orderan", $rand);
                           header("location:pedagang.php");
                        }
                        else{
                           mysql_error();
                        }
                     }
                     else{
                        mysql_error();
                     }
                  }
                  else{
                     setcookie("daftarErr", " Harap Isi Jenis Pendaftaran Anda ", time()+3);
                     header("location:daftar.php");
                  }
               }
               $penghitung = $penghitung +1;
            }
         }
         else{
            setcookie("daftarErr", " INVALID EMAIL FORMAT ");
            header("location:daftar.php");
         }			
  		}
  	}
   elseif (isset($_POST['login'])) {
      $username = $pass = "";
      $username = $_POST['username'];
      $_SESSION["username"] = $_POST['username'];
      $pass = md5($_POST['password']);

      $sql = mysql_num_rows(mysql_query("SELECT * FROM user WHERE username = '$username' && password = '$pass'"));

      if ($sql == 1) {
         $q = mysql_num_rows(mysql_query("SELECT * FROM pembeli WHERE username = '$username'"));
         if ($username == 'admin') {
            header("location:admin.php");
         }
         elseif ($q == 1) {
            setcookie("orderan", $rand);
            $q1 = mysql_fetch_array(mysql_query("SELECT id_jenis_pembeli FROM pembeli WHERE username = '$username'"));
            if ($q1['id_jenis_pembeli'] == 1) {
               $rand = rand(111111, 999999);
               setcookie("jenisuser","Customer");
               header("location:pembeliharian.php");
            }
            else{
               $rand = rand(111111, 999999);
                setcookie("jenisuser","Customer");
               header("location:pembelibulanan.php");
            }
         }
         else{
            $rand = rand(111111, 999999);
            setcookie("orderan", $rand);
            setcookie("jenisuser","Pedagang");
            header("location:pedagang.php");
         }
      }
      else{
         setcookie("loginErr","Password Salah", time()+3);
         header("location:index.php");
      }

      // echo $_SESSION["username"];
   }
?>
