<?php
    include 'db.php';

    // session_start();
    // $user = $_GET['user'];

    // if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    //     header("location: login.php");
    //     exit;
    // }

    $queryData = mysqli_query($conn, "SELECT * ,ts.nm_sekolah as nmSekolah FROM tb_peserta tp JOIN tb_sekolah ts ON ts.id=tp.namaSekolah where username='".$user."'");
    $dataDiri = mysqli_fetch_object($queryData);

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
    <link rel="shortcut icon" href="https://i.ibb.co/c3CgSMh/logo-genius.png">

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
                <a data-scroll href="#header" class="navbar-brand"><img src="img/logo-gabus.png" class="img-circle" alt="Logo"></a>

            </div>

        <!-- Main Nav -->
        <div class="navbar-collapse collapse navbar-primary" role="navigation">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="auth.php?user=<?php echo $user ?>"><span class="fa fa-home" aria-hidden="true"></span> BERANDA</a></li>
                <!-- <li><a href="peserta.php"><span class="fa fa-address-card-o" aria-hidden="true"></span> PESERTA</a></li> -->
                <li class="active"><a href="auth-data.php?user=<?php echo $user;?>"><span class="fa fa-pencil" aria-hidden="true"></span> DATA DIRI</a></li>
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

    <section class="form-pendaftaran margin-bottom-100">

<div class="container form">
    <div class="">

        <form method="post" action="send-database.php">

            <h3><b>Data Pribadi</b></h3><a href="auth.php?user=<?php echo $user ?>" class="btn btn-signin btn-primary margin-top-10">Kembali</a>
            <hr>

            <div class="col-md-12">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Lengkap</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" required name="nama" value="<?php echo $dataDiri->name?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">No WA</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" required name="noWA" value="<?php echo $dataDiri->noWA?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Asal Sekolah</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" required name="username" value="<?php echo $dataDiri->nmSekolah?>" disabled>
                        </div> 
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>

                        <div class="col-sm-10">
                            <textarea class="form-control form-textarea" name="alamat"  placeholder="<?php echo $dataDiri->alamat?>" disabled></textarea>
                        </div>
                    </div>

                    <div class="form-group margin-top-30">
                        <label class="col-sm-2 control-label">Peminatan</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" required name="username" value="<?php echo $dataDiri->peminatan?>" disabled>
                        </div> 
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pilihan Jurusan Kampus 1</label>

                        <div class="col-sm-10">
                        <input type="text" class="form-control" required name="username" value="<?php echo $dataDiri->pil1?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pilihan Jurusan Kampus 2</label>

                        <div class="col-sm-10">
                        <input type="text" class="form-control" required name="username" value="<?php echo $dataDiri->pil2?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pilihan Jurusan Kampus 3</label>

                        <div class="col-sm-10">
                        <input type="text" class="form-control" required name="username" value="<?php echo $dataDiri->pil3?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pilihan Jurusan Kampus 4</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" required name="username" value="<?php echo $dataDiri->pil4?>" disabled>
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2">Presale</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" required name="username" value="<?php echo $dataDiri->presale?>" disabled>
                        </div>
                        </div>

                    <br>
                    
            </div>

        </form>

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

<!--====== footer PART START ======-->
<footer class="footer-area footer-area-2 footer-area-1 bg_cover">
      <div class="footer-overlay">
          <div class="container position-relative">
              <!-- <div class="row">
                  <div class="col">
                      <center>
                          <h2 class="title" style="color: white;">
                              Kantor Hukum
                          </h2>
                          <h4 class="title" style="color: white;">
                              Universitas Sebelas Maret
                          </h4>
                      </center>
                  </div>
              </div> row -->
              <div class="row">
                <div class="col-md-6">
                          <h2 class="title" style="color: white;">
                              Kantor Hukum
                          </h2>
                          <h4 class="title" style="color: white;">
                              Universitas Sebelas Maret
                          </h4>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i>kantorhukumuns@gmail.com</p>
                    <p><i class="fa fa-map-o" aria-hidden="true"></i>Jl. Ir. Sutami No.36, Kentingan, Jebres, Surakarta</p>
                </div>
                <div class="col-md-6 profile">
                        <h4 class="title" style="color: white;">
                              Lainnya
                        </h4>
                    <p><a href="/TugasPokok">tentang KH</a></p>
                    <p><a href="/TugasPokok">Produk Hukum</a></p>
                    <p><a href="/TugasPokok">Peraturan PerPu</a></p>
                    <p><a href="/TugasPokok">Berita</a></p>
                    <p><a href="/TugasPokok">SOP</a></p>
                    <p><a href="/TugasPokok">Template SK</a></p>
                </div>

            </div>
              <div class="row">
                  <div class="col-lg-12">
                      <div class="footer-copyright">
                          &copy; <?= Date('Y') ?> Kantor Hukum UNS. All Right Reserved.
                      </div> <!-- footer copyright -->
                  </div>
              </div> <!-- row -->
          </div> <!-- container -->
      </div>
  </footer>

  <!--====== footer PART ENDS ======-->
  <!--====== BACK TO TOP ======-->
  <div class="back-to-top back-to-top-2">
      <a href="">
          <i class="fas fa-arrow-up"></i>
      </a>
  </div>
  <!--====== BACK TO TOP ======-->




    <!--====== footer PART START ======-->
    <footer class="footer-area footer-area-2 footer-area-1 bg_cover">
      <div class="footer-overlay">
          <div class="container position-relative">
              <div class="row">
                  <div class="col">
                      <center>
                          <h2 class="title" style="color: white;">
                              Kantor Hukum
                          </h2>
                          <h4 class="title" style="color: white;">
                              Universitas Sebelas Maret
                          </h4>
                      </center>
                  </div>
              </div> <!-- row -->
              <div class="row">
                  <div class="col-lg-12">
                      <div class="footer-copyright">
                          &copy; <?= Date('Y') ?> <a href="https://kantorhukum.uns.ac.id/">Kantor Hukum.</a> All Right Reserved.
                      </div> <!-- footer copyright -->
                  </div>
              </div> <!-- row -->
          </div> <!-- container -->
      </div>
  </footer>

  <!--====== footer PART ENDS ======-->
  <!--====== BACK TO TOP ======-->
  <div class="back-to-top back-to-top-2">
      <a href="">
          <i class="fas fa-arrow-up"></i>
      </a>
  </div>
  <!--====== BACK TO TOP ======-->



  <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mx-auto">
                   <li class="nav-item">
                       <a class="nav-link" href="/">Beranda</a>
                   </li>
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                           Tentang KH
                       </a>
                       <div class="dropdown-menu">
                           <a class="dropdown-item" href="/Profil">Profil</a>
                           <a class="dropdown-item" href="/TugasPokok">Tugas Pokok</a>
                           <a class="dropdown-item" href="/StrukturOrganisasi">Struktur</a>
                       </div>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="/ProdukHukum">Produk Hukum</a>
                   </li>
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                           Peraturan Perundang-undangan
                       </a>
                       <div class="dropdown-menu">
                           <a class="dropdown-item" href="https://bphn.jdihn.go.id/">Undang Undang</a>
                           <a class="dropdown-item" href="https://jdih.setneg.go.id/">Peraturan Pemerintah</a>
                           <a class="dropdown-item" href="http://jdih.kemendikbud.go.id/">Peraturan Mentri</a>
                       </div>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="/#berita">Berita</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="/LegalDraft">SOP</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="/Template">Template SK</a>
                   </li>
               </ul>
               <div>
                   <div class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" style="color: #555555;" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                           <i class="fas fa-user-circle fa-lg"></i>
                       </a>
                       <div class="dropdown-menu dropdown-menu-right">
                           <a class="dropdown-item" style="color: #555555;" href="/sso-logout"> Keluar <i class="fas fa-sign-out fa-sm"></i></a>
                       </div>