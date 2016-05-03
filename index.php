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
    <link href="css/awal.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script>
    var hidden = false;
    function action() {
        hidden = !hidden;
        if(hidden) {
            document.getElementById('#login').style.visibility = 'hidden';
        } else {
            document.getElementById('#login').style.visibility = 'visible';
        }
    }
    </script>
    <style type="text/css">
    /* untuk pemakaian di blog/website anda, yang di copy hanya css di bawah ini*/
    /* style untuk link popup */
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
            width:430px;
            height: 300px;
        }
    }
    @media (max-width: 767px){
        .popup-container {
            width:auto;
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
    </style>
</head>
<body>
    <?php
        if (isset($_COOKIE['loginErr'])) {
            $loginErr = $_COOKIE['loginErr'];
        }
        else{
            $loginErr = "";
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
                <a class="navbar-brand"  href="index.php">
                    <span class="glyphicon glyphicon-fire"></span> 
                    SI G-ETEG
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#popup">LOGIN</a>
                    </li>
                    <li>
                        <a href="helpawal.php">HELP ME PLEASE</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
    <!-- Intro Section -->
    <section class="intro">
        <h3 class="error"><?php echo $loginErr;?></h3>
        <div class="container">
        <center>
        <div class="box" style="margin-top:50px;">
            <div class="row">
                <center>
                <div class="col-md-12" >
                    <h1><img src="images/logo.png"></h1>
                </div>
                </center>
            </div>
            <div class="row">
                <center>
                <div class="col-md-12" >
                    <h1 id="geteg"><img style="margin-top:-60px;" src="images/enam.png"></h1>
                </div>
                </center>
            </div>
        </div>
        </center>
        </div>
    </section>
    <footer class="page-footer">
        <!-- Copyright etc -->
        <div class="small-print">
            <p>Copyright &copy; SI G-ETEK 2015</p>
        </div>
    </footer>
    <div class="popup-wrapper" id="popup">
        <div class="popup-container">
            <div class="panel-header" style="margin-bottom:-40px;">
                <div class="col-md-12">
                    <center>
                        <div id="atas">
                            <a style="float:right; color:red; margin-top:-20px;font-size:30px; margin-right:-55px; text-decoration:none;" href="index.php"><i class="fa fa-times"></i></a>
                        </div>
                        <div id="bawah">
                            <h1 style="margin-top:-10px;">LOGIN</h1>
                        </div>
                    </center>
                </div>
                <legend></legend>
            </div>
            <div class="panel-body">
                <div id="pembungkus-popup">
                    <div class="page-body">
                        <form class="form-horizontal" style="margin-top:30px;" action="prosescekform.php" method="POST">
                            <center>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-5 control-label">User Name</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="username" placeholder="User Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-5 control-label">Password</label>
                                    <div class="col-sm-3">
                                        <input type="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-lg" name="login" id="login" value="LOGIN" onClick="action();" style="border-radius:10px; padding:10px 40px;">
                            </center>
                        </form>

                        <br>
                        <legend></legend>
                        <center>
                            <a href="daftar.php" style="text-decoration:none; "><p style="margin-top:-10px; color:black ">Akun Baru</p></a>
                        </center>
                    </div>
                </div>
            </div>
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
    <script src="js/ShowHideTgl.js"></script>
</body>
</html>
