<?php
    include 'db.php';
    $id = $_GET['id'];
    $user = $_GET['user'];

    if($id === 'lihatDP'){

        $cekPeserta = mysqli_query($conn, "SELECT * FROM tb_peserta WHERE id='".$user."'");
        $pesertaRow = mysqli_fetch_object($cekPeserta);
        echo '<script>window.location="laporan-bendahara.php"</script>';

    }if ($id === 'lihatLB'){

        $cekTransaksi = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE id='".$user."'");
        $path = mysqli_fetch_object($cekTransaksi);
        echo '<script>window.location="../pathImg/'.$path->path.'"</script>';

    }if ($id === 'deleteLB'){

        $queryDelete = mysqli_query($conn,"DELETE FROM tb_transaksi WHERE id='".$user."'");
        echo '<script>window.location="laporan-bendahara.php"</script>';

    }if ($id === 'deleteDP'){

        $queryDelete = mysqli_query($conn,"DELETE FROM tb_peserta WHERE id='".$user."'");
        echo '<script>window.location="data-peserta.php"</script>';

    }if ($id === 'accLB'){

        $queryUpdate = mysqli_query($conn, "UPDATE tb_transaksi SET userValidation = 1 WHERE id='".$user."'");
        echo '<script>window.location="laporan-bendahara.php"</script>';
    }if ($id === 'editP'){

    }if ($id === 'hapusP'){
        
    }

?>