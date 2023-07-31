<?php
 include '../config/config.php';
    
    $id = $_GET['id'];
    $query = "UPDATE `tbl_usulan_pemeliharaan` SET status_usulan = 'ditolak' WHERE `tbl_usulan_pemeliharaan`.`id` = '$id';";
        if(performQuery($query)){
            echo "<script>document.location='approval_pemeliharaan.php?gagal=1'</script>";
        }else{
            echo "Tidak dapat diproses, Coba Lagi!";
        }
?>