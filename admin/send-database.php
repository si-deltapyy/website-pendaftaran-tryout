<?php
    include 'db.php';

    if(isset($_POST['login'])){

        session_start();

        $pass = $_POST['password'];

        $queryLogin = mysqli_query($conn, "SELECT * FROM tb_user WHERE pass='".md5($pass)."'");
        $data = mysqli_fetch_object($queryLogin);
        $validation = mysqli_num_rows($queryLogin);

        if($validation > 0){
          if($data->isAdmin === 0){
            $_SESSION["loggedin"] = true;
            echo '<script>window.location="index.php"</script>';

          }else{
            $_SESSION["loggedin"] = true;
            echo '<script>window.location="auth-user.php"</script>';
          }
        }else{
          echo '<script>alert("Username dan Password tidak ditemukan !!")</script>';
          echo '<script>window.location="login.php"</script>';
        }
      }

?>