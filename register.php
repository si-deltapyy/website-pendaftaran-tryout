<?php
    include 'db.php';
    $sekolah = mysqli_query($conn, "SELECT id, nm_sekolah FROM tb_sekolah");
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
                <li><a href="index.php"><span class="fa fa-home" aria-hidden="true"></span> BERANDA</a></li>
                <li class="active"><a href="register.php"><span class="fa fa-pencil" aria-hidden="true"></span> REGISTER</a></li>

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
                <li><a href="login.php"><span class="fa fa-key" aria-hidden="true"></span> LOGIN</a></li>
            </ul>
        </div>

        </div>
    </nav>
    <!-- /End Navigation -->

    <!-- ini buat spasi antara navbar dan greeting section -->
    <div class="margin-bottom-100"></div>

    <!-- Start Form-pendaftaran -->
    <section class="form-pendaftaran margin-bottom-100">

        <div class="container form">
            <div class="">

                <form method="post" action="send-database.php">

                    <h3><b>Form Pendaftaran</b></h3>

                    <hr>
                    <div class="col-md-12">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Lengkap</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="nama" placeholder="Masukan Nama Lengkap Anda*">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" required name="email" placeholder="Masukan Email Aktif*">
                                </div>
                            </div>
                           <div class="form-group">
                                <label class="col-sm-2 control-label">Username</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="username" placeholder="Masukan Username*">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">No WA</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control" required name="noWA" placeholder="Ketikkan 08xxxxx" pattern="" minlength="10" maxlength="13">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Asal Sekolah</label>

                                <div class="col-sm-10">
                                    <select class="form-control" required name="namaSekolahan" id="pilihan">
                                        <option value="0">-- Pilih Sekolah --</option>
                                        <?php 
                                            foreach ($sekolah as $x) { ?>
                                            <option value="<?php echo $x["id"]?>"><?php echo $x["nm_sekolah"]?></option>
                                           <?php }
                                        ?>
                                    </select>
                                </div> 
                            </div>

                            <script>
                                document.getElementById('pilihan').addEventListener('change', function() {
                                var pilihan = this.value;
                                if (pilihan === '67') {
                                    document.getElementById('input-lainnya').style.display = 'block';
                                } else {
                                    document.getElementById('input-lainnya').style.display = 'none';
                                }
                                });
                            </script>

                            <div class="form-group" id="input-lainnya" >
                                <label class="col-sm-2 control-label"></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="namaSekolahan2" placeholder="Ketikkan Nama Sekolahan Lainnya">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Alamat</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control form-textarea" name="alamat"  placeholder=" Masukkan Alamat"></textarea>
                                </div>
                            </div>

                            <div class="form-group margin-top-30">
                                <label class="col-sm-2 control-label">Peminatan</label>

                                <div class="col-sm-10">
                                    <select class="form-control" required name="peminatanJurusan">
                                        <option value="0">-- Pilih Peminatan --</option>
                                        <option value="Saintek">Saintek</option>
                                        <option value="Soshum">Soshum</option>
                                    </select>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pilihan Jurusan Kampus 1</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="pilihan1" placeholder="ex: S1 - Teknik Mesin UNDIP*">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pilihan Jurusan Kampus 2</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="pilihan2" placeholder="ex: S1 - Teknik Mesin UNS*">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pilihan Jurusan Kampus 3</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="pilihan3" placeholder="ex: S1 - Teknik Mesin UGM*">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pilihan Jurusan Kampus 4</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="pilihan4" placeholder="ex: S1 - Teknik Mesin UMS*">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2">Presale</label>

                                <div class="col-sm-10">
                                    <input type="radio" id="Presale1" name="Presale1" value="Presale 1" class="custom-control-input">
                                    <label class="custom-control-label" for="Presale1">Presale 1</label>
                                    <input type="radio" id="Presale2" name="Presale2" value="Presale 2" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="Presale2"><s>Presale 2</s></label>
                                    <input type="radio" id="Presale3" name="Presale3" value="Presale 3" class="custom-control-input" disabled>
                                    <label class="custom-control-label" for="Presale3"><s>Presale 3</s></label>
                                </div>
                            </div>

                            <br>
                            <input type="submit" class="btn btn-primary btn-signin margin-top-10" name="submit" onclick="return confirm('Pastikan Datamu Diisi Dengan Benar')" placeholder="submit">
                    </div>

                </form>

            </div>
        </div>

    </section>
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
