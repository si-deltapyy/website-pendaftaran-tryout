<?php
  include 'db.php';

      if(isset($_POST['submit'])){
        
        $salt = "gabusgenius";

        $name = $_POST['nama'];
        $email = $_POST['email'];
        $userName = $_POST['username'];
        $noWA = $_POST['noWA'];
        $namaSekolah = $_POST['namaSekolahan'];
        $namaSekolah2 = $_POST['namaSekolahan2'];
        $alamat = $_POST['alamat'];
        $peminatan = $_POST['peminatanJurusan'];
        $pil1 = $_POST['pilihan1'];
        $pil2 = $_POST['pilihan2'];
        $pil3 = $_POST['pilihan3'];
        $pil4 = $_POST['pilihan4'];
        $presale = $_POST['Presale1'];
        
        $getMaxId =  mysqli_query($conn, "SELECT MAX(RIGHT(idPeserta, 4)) AS id FROM tb_peserta");
        $idPeserta = mysqli_fetch_object($getMaxId);
        $generateId = 'TOGAB'.date('Y').sprintf("%04s",$idPeserta->id + 1);

        $generatePass = rand(10000,90000);
        $pass = md5($generatePass);

        $id = $idPeserta->id + 1;
        $sekolah = '';

        if($namaSekolah === '67'){
          $sekolah = $namaSekolah2;
        }else{
          $sekolah = $namaSekolah;
        }

        echo $sekolah;

        date_default_timezone_set("Asia/Bangkok");
			  $dt = date("d M Y / H:i:s");

        $cek = mysqli_query($conn, "SELECT * FROM tb_peserta WHERE username='".$userName."'");

        if(mysqli_num_rows($cek) > 0){
          echo '<script>alert("Username sudah ada")</script>';
          echo '<script>window.location="register.php"</script>';
        }else{
            $insert = mysqli_query($conn, "INSERT INTO tb_peserta VALUES (
                '".$id."',
                '".$generateId."',
                '".$name."',
                '".$email."',
                '".$userName."',
                '".$pass."',
                '".$noWA."',
                '".$sekolah."',
                '".$alamat."',
                '".$peminatan."',
                '".$pil1."',
                '".$pil2."',
                '".$pil3."',
                '".$pil4."',
                '".$presale."',
                0,
                0,
                '".$dt."')");
          if($insert){
            echo '<script>window.location="send-wa.php?pass='.$generatePass.'&user='.$userName.'&name='.$name.'"</script>';
          }else{
            echo 'Error inserting data..';
          } 
        }
        
        
      }

      if(isset($_POST['login'])){

        session_start();

        $user = $_POST['username'];
        $pass = $_POST['password'];

        $queryLogin = mysqli_query($conn, "SELECT * FROM tb_peserta 
            WHERE username='".$user."' AND password='".md5($pass)."'");
        
        $validation = mysqli_num_rows($queryLogin);

        if($validation === 0){
          $_SESSION["loggedin"] = true;
          echo '<script>window.location="auth.php?user='.$user.'"</script>';
        }else{
          echo '<script>alert("Username dan Password tidak ditemukan !!")</script>';
          echo '<script>window.location="login.php"</script>';
        }
      }

      if(isset($_POST['bayar'])){

        $idPeserta = $_POST['idPeserta'];
        $namaPeserta = $_POST['namaPeserta'];
        $jenisPembayaran = $_POST['jenisPembayaran'];

        $targetDirectory = "pathImg/";
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }

        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file ". basename($_FILES["image"]["name"]). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }

        $getMaxId =  mysqli_query($conn, "SELECT MAX(id) AS id FROM tb_transaksi");
        $idP = mysqli_fetch_object($getMaxId);
        $id = $idP->id + 1;


        $queryBayar = mysqli_query($conn, "INSERT INTO tb_transaksi VALUES(
          '".$id."',
          '".$idPeserta."',
          '".$namaPeserta."',
          '".$jenisPembayaran."',
          '".basename($_FILES["image"]["name"])."',
          0,
          '')");

        $queryUpdate = mysqli_query($conn, "UPDATE tb_peserta SET statusPeserta = 'Bayar' WHERE idPeserta='".$idPeserta."'");
        $queryUser = mysqli_query($conn, "SELECT * FROM tb_peserta WHERE idPeserta='".$idPeserta."'");
        $user = mysqli_fetch_object($queryuser);

        echo '<script>window.location="auth.php?user='.$user->id.'"</script>';
      }

      // UPDATE tb_peserta SET 
      // statusPeserta = 'Bayar' WHERE id = 3;
?>