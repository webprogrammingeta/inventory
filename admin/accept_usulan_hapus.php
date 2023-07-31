<?php
include "../config/config.php";

$id = $_GET["id"];
$query = "select * from `tbl_usulan_penghapusan` where `id` = '$id'; ";
if (count(fetchAll($query)) > 0) {
    foreach (fetchAll($query) as $row) {
        $kode = $row["kd_usulan_penghapusan"];
        $kdbarang = $row["kode_barang"];
        $nmbarang = $row["nama_barang"];
        $ket = $row["keterangan_usulan"];
        $query = "INSERT INTO `tbl_penghapusan`(`id`,`kd_penghapusan`,`kd_barang`,`nama_barang`,`keterangan_usulan`,`status_usulan`,`tanggal_disetujui`)VALUES(NULL,'$kode','$kdbarang','$nmbarang','$ket','ok',CURRENT_TIMESTAMP);";
    }
    // hapus barang
    $query .= "DELETE FROM `tbl_barang` WHERE `tbl_barang`.`kd_barang` = '$kdbarang';";

    // update
    $query .= "UPDATE `tbl_usulan_penghapusan` SET status_usulan_penghapusan = 'sudah dikonfirmasi' WHERE `tbl_usulan_penghapusan`.`id` = '$id';";
    if (performQuery($query)) {
        echo "<script>document.location='approval_hapus.php?update=1'</script>";
    } else {
        echo "<script>alert('Data Penghapusan tidak dapat diproses.Silakan coba lagi !');document.location='approval_hapus.php'</script>";
    }
} else {
    echo "Terjadi kesalahan, Coba lagi !";
}

?>
