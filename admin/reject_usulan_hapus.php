<?php
 include '../config/config.php';
    
    $id = $_GET['id'];
    $query = "UPDATE `tbl_usulan_penghapusan` SET status_usulan_penghapusan = 'ditolak' WHERE `tbl_usulan_penghapusan`.`id` = '$id';";
        if(performQuery($query)){
            echo "<script>document.location='approval_hapus.php?gagal=1'</script>";
        }else{
            echo "Tidak dapat diproses, Coba Lagi!";
        }
?>