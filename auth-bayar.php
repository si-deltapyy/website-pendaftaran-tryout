<?php
    include 'db.php';

    session_start();
    $user = $_GET['user'];

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
    <link rel="stylesheet" href="css/new.css" type="text/css">

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
                <li><a href="auth.php?user=<?php echo $user ?>"><span class="fa fa-home" aria-hidden="true"></span> BERANDA</a></li>
                <!-- <li><a href="peserta.php"><span class="fa fa-address-card-o" aria-hidden="true"></span> PESERTA</a></li> -->
                <li><a href="auth-data.php?user=<?php echo $user;?>"><span class="fa fa-pencil" aria-hidden="true"></span> DATA DIRI</a></li>
                <li class="active"><a href="auth-bayar.php?user=<?php echo $user;?>"><span class="fa fa-money" aria-hidden="true"></span> PEMBAYARAN</a></li>
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

    <!-- Start Form-pendaftaran -->
    <?php
        if($dataBayar->statusPeserta === 'Belum Bayar'){?>
            <section class="form-pendaftaran margin-bottom-100">

                <div class="container form">
                    <div class="">

                        <form method="post" action="send-database.php" enctype="multipart/form-data">

                            
                            <h3><b>TAGIHANMU:</b> 
                            <?php 
                            if($dataBayar->presale === 'Presale 1'){
                                echo "Rp. 25.000";
                            }if($dataBayar->presale === 'Presale 2'){
                                echo "Rp. 30.000";
                            }if($dataBayar->presale === 'Presale 3'){
                                echo "Rp. 40.000";
                            }
                            ?></h3>
                            <p>
                                Harap melakukan pembayaran pada merchant dibawah ini dan upload bukti pembayaran untuk dilakukannya verivikasi oleh tim GABUS 2024.
                            </p>
                            <div class="col-md-4">
                            <p>
                                <b>BRI</b><br>
                                <i>a. n Natasha Risa Wibowo</i><br>
                                <a href="#">0140 0110 6082 508</a>
                            </p>
                            <p>
                                <b>BNI</b><br>
                                <i>a. n Petir Harsa Samudra</i><br>
                                <a href="#">1574939222</a>
                            </p>
                            </div>
                            <div class="col-md-4">
                            <p>
                                <b>DANA</b><br>
                                <i>a. n Wisni Afifah Puspita Sari </i><br>
                                <a href="#">081226277760</a>
                            </p>
                            <p>
                                <b>SHOPEEPAY</b><br>
                                <i>a. n maulinafati</i><br>
                                <a href="#">082134161777</a>
                            </p>
                            </div>
                            <div class="col-md-4">
                            <p>
                                <b>GOPAY</b><br>
                                <i>a. n Wisni Afifah Puspita Sari </i><br>
                                <a href="#">081226277760</a>
                            </p>
                            <p>
                                <b>COD</b><br>
                                <i>Menyesuaikan Situasi dan Kondisi</i><br>
                                <a href="https://wa.me/6281384066256">Hubungi Admin</a>
                            </p>
                            </div>
                            
                            

                            <hr>
                            <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">No Peserta</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" required name="idPeserta" value="<?php echo $dataBayar->idPeserta?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Peserta</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" required name="namaPeserta" value="<?php echo $dataBayar->name?>">
                                        </div>
                                    </div>
                                    <div class="form-group margin-top-30">
                                        <label class="col-sm-2 control-label">Pembayaran Via</label>

                                        <div class="col-sm-10">
                                            <select class="form-control" required name="jenisPembayaran">
                                                <option value="0">-- Pilih Merchant --</option>
                                                <option value="BRI">BRI</option>
                                                <option value="BNI">BNI</option>
                                                <option value="DANA">DANA</option>
                                                <option value="SHOPEEPAY">SHOPEEPAY</option>
                                                <option value="GOPAY">GOPAY</option>
                                                <option value="COD">COD</option>
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Upload Bukti</label>

                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" required name="image">
                                        </div>
                                    </div>

                                    <br>
                                    <input type="submit" name="bayar" placeholder="bayar">
                                    <!-- <input type="submit" class="btn btn-primary margin-top-10" name="bayar" onclick="return confirm('Pastikan Datamu Diisi Dengan Benar')" placeholder="Upload"> -->
                            </div>

                        </form>

                    </div>
                </div>

            </section>
    <?php
        }if($dataBayar->statusPeserta === 'Bayar' && $dataBayarUser->userValidation === '0'){?>
            <section class="login margin-bottom-50">

                <div class="container">
                    <div class="row">

                        <div class="card card-container">
                            <H3><b>Terima Kasih</b></H3>
                            <p>Pembayaran mu sedang dalam Proses Verifikasi oleh Tim GABUS 2024. Harap Tunggu 1x24 Jam atau bisa lebih cepat</p><br>
                            <footer>Hormat  GABUS 2024</footer>
                        </div>

                    </div>
                </div>

            </section>
    <?php
        }if($dataBayar->statusPeserta === 'Bayar' && $dataBayarUser->userValidation === '1'){?>
            <section class="login margin-bottom-50">

                <div class="container">
                    <div class="row">

                        <div class="card card-container">
                            <H3><b>Selamat !!</b></H3>
                            <p>Pembayaran mu berhasil divalidasi oleh Tim GABUS 2024</p><br>
                            <p>Jangan lupa untuk Cetak E-Ticketing pada (<a href="informasi-jadwal.html">Lihat Jadwal</a>). Jika ada kendala harap hubungi kami (<a href="https://wa.me/6285876204872">Hubungi Admin</a>)</p><br>
                            <footer>Hormat  GABUS 2024</footer>
                        </div>

                    </div>
                </div>

            </section>
    <?php
        }?>
    <!-- /End Form-pendaftaran -->

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
                    <img src="https://i.ibb.co/c3CgSMh/logo-gabus.png" alt="Logo-genius">
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
