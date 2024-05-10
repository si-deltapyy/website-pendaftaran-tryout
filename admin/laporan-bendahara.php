<?php
    include 'db.php';
    $accepted = mysqli_query($conn, "SELECT * FROM tb_transaksi where userValidation=1");
    $reqVerification = mysqli_query($conn, "SELECT * FROM tb_transaksi where userValidation=0");
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

        <link href="../plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />

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
                               <b>Admin GABUS</b>
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
                                    <h4 class="font-size-16"><a href="index.html"><i class="mdi mdi-backspace text-dark"></i></a>  Pembayaran Peserta</h4>
                                    
                                <span id="txt" class="badge badge-dark font-size-13">Primary</span>
                                </div>
                            </div>
                        </div>

                        <!-- ganti code disini -->

                        <div class="row">
                            <div class="col-6">
                                <div class="card bg-primary">
                                    <div class="card-body">
                                        <div class="mb-1">
                                            <h5 class="card-title text-center text-white">Menunggu Verifikasi</h5>
                                        </div>
                                        <div class="align-items-center">
                                            <div class="col-12 mb-n4">
                                                <h3 class="text-white text-center">
                                                    <?php 
                                                        $reqVerificationRow = mysqli_num_rows($reqVerification);
                                                        echo $reqVerificationRow;
                                                    ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-secondary">
                                    <div class="card-body">
                                        <div class="mb-1">
                                            <h5 class="card-title text-center text-white">Accepted</h5>
                                        </div>
                                        <div class="align-items-center">
                                            <div class="col-12 mb-n4">
                                                <h3 class="text-white text-center">
                                                    <?php 
                                                        $acceptedRow = mysqli_num_rows($accepted);
                                                        echo $acceptedRow;
                                                    ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Verivikasi Pembayaran</h4>
    
                                        <table style="width: 100%;" id="basic-datatable" class="table dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No Peserta</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Pembayaran</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                        foreach ($reqVerification as $x) { ?>
                                                <tr>
                                                        <td><?php echo $x["idPeserta"]?></td>
                                                        <td><?php echo $x['nama']?></td>
                                                        <td><?php echo $x["jenisBayar"]?></td>
                                                    <td>
                                                        <a href="cek.php?id=lihatLB&user=<?php echo $x['id']?>" class="btn btn-confirm btn-info"><i class="mdi mdi-eye"></i></a>
                                                        <a href="cek.php?id=accLB&user=<?php echo $x['id']?>" class="btn btn-confirm btn-success"><i class="mdi mdi-check-bold"></i></a>
                                                        <a href="cek.php?id=deleteLB&user=<?php echo $x['id']?>" class="btn btn-confirm btn-danger"><i class="mdi mdi-close-circle"></i></a>
                                                    </td>
                                                </tr>
                                                    <?php }
                                                    ?>
                                            </tbody>
                                        </table>
    
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Accepted</h4>
    
                                        <table style="width: 100%;" id="basic-datatable" class="table dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No Peserta</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Pembayaran</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                        foreach ($accepted as $x) { ?>
                                                <tr>
                                                        <td><?php echo $x["idPeserta"]?></td>
                                                        <td><?php echo $x['nama']?></td>
                                                        <td><?php echo $x["jenisBayar"]?></td>
                                                    <td>
                                                        <a href="cek.php?id=lihatLB&user=<?php echo $x['id']?>" class="btn btn-confirm btn-info"><i class="mdi mdi-eye"></i></a>
                                                    </td>
                                                </tr>
                                                    <?php }
                                                    ?>
                                            </tbody>
                                        </table>
    
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>

                        <!-- sampe sini -->


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
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap4.js"></script>
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="../plugins/datatables/buttons.html5.min.js"></script>
        <script src="../plugins/datatables/buttons.flash.min.js"></script>
        <script src="../plugins/datatables/buttons.print.min.js"></script>
        <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="../plugins/datatables/dataTables.select.min.js"></script>
        <script src="../plugins/datatables/pdfmake.min.js"></script>
        <script src="../plugins/datatables/vfs_fonts.js"></script>

        <script src="assets/pages/datatables-demo.js"></script>

        <!-- App js -->
        <script src="assets/js/theme.js"></script>
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

    </body>

</html>