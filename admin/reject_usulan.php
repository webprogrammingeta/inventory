<?php

    include '../config/config.php';
    
    $id = $_GET['id'];
    $query = "UPDATE `tbl_usulan_pengadaan` SET status_usulan = 'ditolak' WHERE `tbl_usulan_pengadaan`.`id` = '$id';";
    // $query = "DELETE FROM `tbl_transaksi` WHERE `tbl_transaksi`.`id` = '$id';";
        if(performQuery($query)){
            echo "<script>document.location='approval_usulan.php?gagal=1'</script>";
        }else{
            echo "Tidak dapat diproses, Coba Lagi!";
        }

?>