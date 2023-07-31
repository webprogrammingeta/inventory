<?php

include 'templates/header.php';

$id = $_SESSION['id'];
$query = "select * from `tbl_user` where `id` = '$id'; ";
if(count(fetchAll($query)) > 0){
    foreach(fetchAll($query) as $row){
        $kode = $row['kd_user'];
        $query = "INSERT INTO `log_akses` (`id_log`,`id_user`,`tanggal_log`,`activity_log`)VALUES(NULL,'$kode',CURRENT_TIMESTAMP,'login')";
    }
    // $query .= "DELETE FROM `tbl_transaksi` WHERE `tbl_transaksi`.`id` = '$id';";
    if(performQuery($query)){
        // echo "alert('Data status berhasil disimpan !');";
    }else{
        echo "<script>alert('Transaksi tidak dapat diproses.Silakan coba lagi !');'</script>";
    }
}else{
    echo " Terjadi kesalahan,Coba lagi!";
}
unset($_SESSION['id']);
unset($_SESSION['nama_lengkap']);
unset($_SESSION['password']);
unset($_SESSION['level']);
unset($_SESSION['foto']);
session_destroy();

echo "<script>alert('Anda berhasil Logout !');document.location='http://localhost:8080/sarpas/'</script>";
?>
