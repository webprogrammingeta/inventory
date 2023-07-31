<?php
  
    include '../config/config.php';

    $id = $_GET['id'];
    $query .= "UPDATE `tbl_pengajuan_peminjaman` SET status = 'ditolak' WHERE `tbl_pengajuan_peminjaman`.`id` = '$id';";
    // $query = "DELETE FROM `tbl_transaksi` WHERE `tbl_transaksi`.`id` = '$id';";
        if(performQuery($query)){
            echo "<script>alert('Data peminjaman berhasil dibatalkan !');document.location='index.php'</script>";
        }else{
            echo "Tidak dapat diproses, Coba Lagi!";
        }

?>