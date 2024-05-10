<?php
    include 'db.php';
    session_start();
    // Check if the user is logged in, if not, redirect to login.php
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Admin GABUS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body onload="startTime()">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <div class="main-content">

                <header id="page-topbar">
                    <div class="navbar-header">
                        <div class="navbar-brand-box d-flex align-items-left">
                            <span style="color: azure; font-size: 15px;"">
                               <b>Admin GABUS 2024</b>
                            </span>
                        </div>
                        <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>
                </header>
                <div class="topnav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                            
                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">
                                            <i class="mdi mdi-view-dashboard mr-2 active"></i>Beranda
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="presensi.php">
                                            <i class="mdi mdi-account mr-2 active"></i>Absensi Peserta
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="laporan-bendahara.php">
                                            <i class="mdi mdi-cash-multiple mr-2 active"></i>Laporan Bendahara
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="data-peserta.php">
                                            <i class="mdi mdi-account mr-2 active"></i>Data Peserta
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="logout.php">
                                            <i class="mdi mdi-logout-variant mr-2 active"></i>Log Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div> 
                </div>            

                               
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="font-size-16">Beranda</h4>
                                    
                                </div>
                            </div>
                        </div>
                        
                        

                        <script>
                            function startTime() {
                            const today = new Date();
                            
                            var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei'
                            , 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            var day = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu', 'Minggu'];

                            let h = today.getHours();
                            let m = today.getMinutes();
                            let s = today.getSeconds();
                            let d = today.getDay()-1;
                            let dt = today.getDate(); 
                            let mo = today.getMonth();
                            let y = today.getFullYear();
                            let hari = day[d];
                            let bulan = month[mo];
                            m = checkTime(m);
                            s = checkTime(s);
                            document.getElementById('txt').innerHTML = hari + ", "+ dt + " " + bulan + " "+ y + " - " + h + ":" + m + ":" + s;
                            setTimeout(startTime, 1000);
                            }

                            function checkTime(i) {
                            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                            return i;
                            }
                        </script>     
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card text-right">
                                <span id="txt" class="badge font-size-13">Primary</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="card bg-info border-info">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h3 class="card-title mb-0 text-white">Jumlah Pendaftar <span><i class="mdi mdi-account"></i></span></h3>
                                        </div>
                                        <div class="row d-flex align-items-center mb-4">
                                            <div class="col-12">
                                                <h2 class="text-center text-white">
                                                    <?php
                                                        $present = mysqli_query($conn, "SELECT * FROM tb_peserta");
                                                        $presentRow = mysqli_num_rows($present);
                                                        echo $presentRow;
                                                    ?>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                            <div class="col-6">
                                <div class="card bg-secondary border-secondary">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h3 class="card-title mb-0 text-white">Jumlah Sekolah <span><i class="mdi mdi-school"></i></span></h3>
                                        </div>
                                        <div class="row d-flex align-items-center mb-4">
                                            <div class="col-12">
                                                <h2 class="text-center text-white">
                                                    <?php
                                                        $presentSc = mysqli_query($conn, "SELECT namaSekolah, COUNT(*) as count FROM tb_peserta GROUP BY namaSekolah;");
                                                        $presentRows = mysqli_num_rows($presentSc);
                                                        echo $presentRows;
                                                    ?>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card bg-light border-light">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <h3 class="card-title text-dark text-center">Sisa Saldo <span><i class="mdi mdi-cash-multiple"></i></span></h3>
                                            <span></span>
                                        </div>
                                        <div class="row d-flex align-items-center mb-4">
                                            <div class="col-12">
                                                <h2 style="text-align: center;" class="text-dark">
                                                    Rp
                                                    <?php
                                                    
                                                    ?>
                                                </h2>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="card bg-danger">
                                    <a href="">
                                        <div class="card-body">
                                            <div class="m-n2">
                                                <h4 class="text-center text-light font-size-16">
                                                    Ajukan Laporan
                                                    <span><i class="mdi mdi-newspaper"></i></span>
                                                </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                        <!-- end row-->


                        
                      
                        
    
    

                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center text-lg-left">
                                    <script>document.write(new Date().getFullYear())</script> © GABUS .All Right Reserved
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-right d-none d-lg-block">
                                    Design & Develop by Ajik
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/simplebar.min.js"></script>

         <!-- Morris Js-->
        <script src="../plugins/morris-js/morris.min.js"></script>
        <!-- Raphael Js-->
        <script src="../plugins/raphael/raphael.min.js"></script>

        <!-- Morris Custom Js-->
        <script src="assets/pages/dashboard-demo.js"></script>


        <!-- App js -->
        <script src="assets/js/theme.js"></script>

    </body>

</html>