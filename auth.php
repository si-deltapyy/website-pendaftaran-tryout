<?php
    include 'db.php';
    session_start();
    $user = $_GET['user'];
    // Check if the user is logged in, if not, redirect to login.php
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
    }

    $queryData = mysqli_query($conn, "SELECT * FROM tb_peserta where username='".$user."'");
    $dataBayar = mysqli_fetch_object($queryData);
    $queryDataUser = mysqli_query($conn, "SELECT * FROM tb_transaksi where idPeserta='".$dataBayar->idPeserta."'");
    $dataBayarUser = mysqli_fetch_object($queryDataUser);

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
    <link href="css/baru.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/new.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Start Navigation -->
    <nav id="navigation" class="navbar navbar-inverse navbar-fixed-top" role=navigation"">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a data-scroll href="#header" class="navbar-brand"><img src="img/logo-gabus.png" class="img-circle" alt="Logo"></a></a>

            </div>

        <!-- Main Nav -->
        <div class="navbar-collapse collapse navbar-primary" role="navigation">
            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="auth.php?user=<?php echo $user ?>"><span class="fa fa-home" aria-hidden="true"></span> BERANDA</a></li>
                <!-- <li><a href="peserta.php"><span class="fa fa-address-card-o" aria-hidden="true"></span> PESERTA</a></li> -->
                <li><a href="auth-data.php?user=<?php echo $user;?>"><span class="fa fa-pencil" aria-hidden="true"></span> DATA DIRI</a></li>
                <li><a href="auth-bayar.php?user=<?php echo $user;?>"><span class="fa fa-money" aria-hidden="true"></span> PEMBAYARAN</a></li>
                <li><a href="cetak-ticket.php?user=<?php echo $user;?>"><span class="fa fa-print" aria-hidden="true"></span> CETAK E-Ticket</a></li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-question-circle-o" aria-hidden="true"></span> BANTUAN <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="https://wa.me/6285729711056" target="_blank">Chat Admin</a></li>
                        <li role="separator" class="divider"></li>
                    </ul>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="fa fa-key" aria-hidden="true"></span> LOGOUT</a></li>
            </ul>
        </div>

        </div>
    </nav>
    <!-- /End Navigation -->

    <!-- ini buat spasi antara navbar dan greeting section -->
    <div class="margin-bottom-100"></div>

    <section>

        <div class="box">
            <div class="rows">

                <div class="isi">

                    <h4>Selamat Datang <b><?php echo $user;?></b> !</h4>
                    <p>Terima Kasih telah mendaftar di Try Out SNBT GABUS yang diadakan oleh GENIUS UNS.</p><br><br>
                    

                    <?php
                        if($dataBayar->statusPeserta === 'Belum Bayar'){?>
                            <p>Jangan lupa selesaikan tagihan pembayaranmu..</p>
                            <a href="auth-bayar.php?user=<?php echo $user ?>" class="btn btn-primary btn-block btn-signin margin-top-10">Cek Pembayaran</a>
                    <?php
                        }if($dataBayar->statusPeserta === 'Bayar' && $dataBayarUser->userValidation === '0'){?>
                            <p>Harap Tunggu 1x24 Jam atau bisa lebih cepat. Pembayarnmu masih dalam proses Validasi</p>
                    <?php
                        }if($dataBayar->statusPeserta === 'Bayar' && $dataBayarUser->userValidation === '1'){?>
                            <p>Silahkan Cetak Tiket sesuai waktu yang telah ditentukan.</p>
                            <a href="cetak-ticket.php?user=<?php echo $user ?>" class="btn btn-primary btn-block btn-signin margin-top-10">Cetak Tiket</a>
                    <?php
                        }?>
                </div>

            </div>
        </div>

    </section>

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
                    <img src="https://i.ibb.co/c3CgSMh/logo-genius.png" alt="nusacaraka">
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
