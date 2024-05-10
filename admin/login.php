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
        <meta charset="utf-8" />
        <title>Login - Admin</title>
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

    <body>
 
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-6 m-auto">
                            <div class="d-flex align-items-center min-vh-100">
                                <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-5">
                                                <p class="text-muted ">Silahkan masukkan password anda.</p>
                                                <form class="user" method="post" action="send-database.php">
                                                    <div class="form-group">
                                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                                    </div>
                                                    <input class="btn btn-success btn-block waves-effect waves-light" type="submit" name="login" id="sumbit" value="Masuk">
                                                </form>
                                                <!-- end row -->
                                            </div> <!-- end .padding-5 -->
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </div> <!-- end .w-100 -->
                            </div> <!-- end .d-flex -->
                        </div> <!-- end col-->
                    </div> <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end page -->
        
            <!-- jQuery  -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/bootstrap.bundle.min.js"></script>
            <script src="assets/js/metismenu.min.js"></script>
            <script src="assets/js/waves.js"></script>
            <script src="assets/js/simplebar.min.js"></script>
        
            <!-- App js -->
            <script src="assets/js/theme.js"></script>
        
        </body>
        
        </html>