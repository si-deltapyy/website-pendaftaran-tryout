<?php
    include 'db.php';
    // session_start();
    // // Check if the user is logged in, if not, redirect to login.php
    // if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    //     header("location: login.php");
    //     exit;
    // }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Super Admin</title>
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
                            <img style="width: 25px;" src="assets/images/favicon.ico" alt="logo">
                            <span style="color: azure; font-size: 15px;"">
                               <b>Super Admin</b>
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
                                            <a class="nav-link" href="auth-user.php">
                                                <i class="mdi mdi-view-dashboard mr-2 active"></i>Beranda
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
                                    <h4 class="font-size-16">Input Data</h4>
                                    
                                <span id="txt" class="badge badge-dark font-size-13">Primary</span>
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
                            document.getElementById('txt').innerHTML = hari + ", "+ dt + " " + bulan + " "+ y ;
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
                                <div class="card bg-success border-success">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h5 class="card-title mb-0 text-white">Daftar User <span><i class="mdi mdi-account-check"></i></span></h5>
                                        </div>
                                        <div class="row d-flex align-items-center mb-4">
                                            <div class="col-12">
                                                <h4 class="d-flex align-items-center mb-0 text-white">
                                                    <a href="user.php" class="text-white">Manage user</a><i class="mdi mdi-arrow-right"></i>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                            <div class="col-12">
                                <div class="card bg-info border-info">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h5 class="card-title mb-0 text-white">Pengumuman <span><i class="mdi mdi-newspaper"></i></span></h5>
                                        </div>
                                        <div class="row d-flex align-items-center mb-4">
                                            <div class="col-12">
                                                <h4 class="d-flex align-items-center mb-0 text-white">
                                                    <a href="pengumuman.php" class="text-white">Buat Pengumuman</a><i class="mdi mdi-arrow-right"></i>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                            <!-- <div class="col-12">
                                <div class="card bg-secondary border-secondary">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h5 class="card-title mb-0 text-white">Tabungan & Dana Sosial <span><i class="mdi mdi-cash-usd"></i></span></h5>
                                        </div>
                                        <div class="row d-flex align-items-center mb-4">
                                            <div class="col-12">
                                                <h4 class="d-flex align-items-center mb-0 text-white">
                                                    <a href="#" class="text-white">Isi Laporan Tabungan dan Dana Sosial</a><i class="mdi mdi-arrow-right"></i>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> end col -->
                        </div>
                        


                        
                      
                        
    
    

                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center text-lg-left">
                                    <script>document.write(new Date().getFullYear())</script> © Karangtaruna Mekar Asri
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