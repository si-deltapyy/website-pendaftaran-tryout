<?php
session_start();
// Check if the user is already logged in, if yes, redirect to auth.php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: auth.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Unicode -->
    <meta charset="UTF-8">
    <!-- IE Compatiblity -->
    <meta http-equiv="X-UA Compatible" content="IE=edge">
    <!-- First Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page Description -->
    <meta name="description" content="">
    <!-- Page Keywords -->
    <meta name="keywords" content="">
    <!-- Site Author -->
    <meta name="author" content="zuhri">

    <!-- Title Of template -->
    <title>Gabus 2024 - Genius UNS</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/logo-gabus.png">

    <!-- Google fonts Raleway -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <!-- Google Font Titillium Web  -->
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">

    <!-- Load CSS Files -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/lib/icomoon/icomoon.css" rel="stylesheet" type="text/css">
    <link href="css/desain.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/baru.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Start Heading -->
    <!-- <section class="heading hidden-xs">
        <div class="heading-logo">
            <img class="img-responsive" src="img/Logo_heading.png" alt="Logo-Heading">
        </div>

        <div class="heading-profile">
            <p><span class="fa fa-map-marker" aria-hidden="true"></span> : Jl. Banda Aceh – Medan Km. 16.5, Aceh Besar, Indonesia</p>
            <p>
                <span class="fa fa-phone" aria-hidden="true"></span> Telepon : 0651-7556-100
            </p>
            <p>
                <span class="fa fa-envelope" aria-hidden="true""></span> Email : info@pesantrenimamsyafii.sch.id
            </p>
        </div>

    </section> -->
    <!-- End Heading -->

    <!-- Start Navigation -->
    <nav id="navigation" class="navbar navbar-inverse navbar-fixed-top" role=navigation"">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a data-scroll href="#header" class="navbar-brand"><img src="img/logo-gabus.png" class="img-circle" alt="Logo"></a>

            </div>

        <!-- Main Nav -->
        <div class="navbar-collapse collapse navbar-primary" role="navigation">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php"><span class="fa fa-home" aria-hidden="true"></span> BERANDA</a></li>
                <!-- <li><a href="peserta.php"><span class="fa fa-address-card-o" aria-hidden="true"></span> PESERTA</a></li> -->
                <li><a href="register.php"><span class="fa fa-pencil" aria-hidden="true"></span> REGISTER</a></li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-info-circle" aria-hidden="true"></span> INFORMASI <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="informasi-jadwal.html">Jadwal</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="pengumuman.php">Pengumuman</a></li>
                        <li role="separator" class="divider"></li>
                    </ul>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-question-circle-o" aria-hidden="true"></span> BANTUAN <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="informasi-prosedur.html">Prosedur</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" target="_blank">Chat Admin</a></li>
                        <li role="separator" class="divider"></li>
                    </ul>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="login.php"><span class="fa fa-key" aria-hidden="true"></span> LOGIN</a></li>
            </ul>
        </div>

        </div>
    </nav>
    <!-- /End Navigation -->

    <!-- ini buat spasi antara navbar dan greeting section -->
    <div class="margin-bottom-100"></div>

    <!-- Start Login -->
    <section class="login margin-bottom-50">

        <div class="container">
            <div class="row">

                <div class="card card-container">
                <img src="img/logo-gabus.png" class="profile-img-card" alt="Logo">
                    <p id="profile-name" class="profile-name-card"></p>

                    <form class="form-signin" method="post" action="send-database.php">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <br><input type="password" name="password" class="form-control" placeholder="Password" required>
                        <br>
                        <!-- <a href="reset-password.php">Lupa Sandi ?</a> -->
                        <input type="submit" class="btn btn-lg btn-primary btn-block btn-signin" type="text" name="login" value="Log In">
                    </form>

                </div>

            </div>
        </div>

    </section>
    <!-- /End Login -->

    <!-- Start Footer -->
    <!-- <footer id="footer" class="footer">
        <p>&copy; copright 2017. create by Zuhri. All Right Reserved.</p>
    </footer> -->
    <!-- /End Footer -->
          
    <!-- Start Footer -->
     <div id="footer" class="footer">

        <div class="container padding-top-50">
            <div class="row">

                <div class="col-md-6 ten">
                    <h4>Tentang</h4>
                    <p>Gladhen SNBT Bareng GENIUS atau sering dikenal dengan GABUS adalah Try Out yang diselenggarakan oleh Keluarga Mahasiswa Sragen In UNS (GENIUS)</p>
                </div>

                <div class="col-md-6 profile">
                    <h4>Profile</h4>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:info@gabus.my.id">info@gabus.my.id</a></p>
                    <p><i class="fa fa-instagram" aria-hidden="true"></i> <a href="https://instagram.com/gabus_genius">gabus_genius</a></p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i>  <a href="https://wa.me/6285729711056">085729711056</a></p>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <h5>Supported By</h5>
                    <div class="sponsor">
                    <img src="https://i.ibb.co/SxGB85V/asd.png" alt="nusacaraka">
                    </div>
                </div>
            
            </div>
        </div>

        <hr>

        <div class="container  copyright">
            <p><a class="as" href="index.php">Genius</a> &copy; copright 2024. All Right Reserved.</p>
        </div>

    </div>
    <!-- /End Footer -->

    <!-- Load Js Core Files -->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/bootstrap/bootstrap.min.js"></script>

</body>

</html>
