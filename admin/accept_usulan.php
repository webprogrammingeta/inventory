<?php
include "../config/config.php";

$id = $_GET["id"];
$query = "select * from `tbl_usulan_pengadaan` where `id` = '$id'; ";
if (count(fetchAll($query)) > 0) {
    foreach (fetchAll($query) as $row) {
        $kode = $row["id_usulan"];
        $komisi = $row["komisi"];
        $namabrg = $row["nama_barang"];
        $harga = $row["harga"];
        $ket = $row["keterangan_usulan"];
        $query = "INSERT INTO `tbl_pengadaan` (`id`,`id_pengadaan`,`komisi`,`nama_barang`,`harga`,`keterangan_usulan`, `status_usulan`,`tanggal_disetujui`)VALUES(NULL, '$kode', '$komisi','$namabrg','$harga','$ket','ok',CURRENT_TIMESTAMP);";
    }
    // hapus
    // $query .= "DELETE FROM `tbl_usulan_pengadaan` WHERE `tbl_usulan_pengadaan`.`id` = '$id';"

    // update
    $query .= "UPDATE `tbl_usulan_pengadaan` SET status_usulan = 'sudah dikonfirmasi' WHERE `tbl_usulan_pengadaan`.`id` = '$id';";
    if (performQuery($query)) {
        echo "<script>document.location='approval_usulan.php?update=1'</script>";
    } else {
        echo "<script>alert('Data Pengadaan tidak dapat diproses.Silakan coba lagi !');document.location='approval_usulan.php'</script>";
    }
} else {
    echo "Terjadi kesalahan, Coba lagi !";
}

?>
