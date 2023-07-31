<?php
    
    include '../config/config.php';

    $id = $_GET['id'];
    $query = "select * from `tbl_pengajuan_peminjaman` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            // $a = $row['id_pengajuan'];
            // $b = $row['nama_barang'];
            // $g = $row['kd_barang'];
            // $c = $row['harga'];
            // $d = $row['nama_peminjam'];
            // $e = $row['no_telp'];
            // $f = $row['keterangan_peminjaman'];
            // $query = "INSERT INTO `tbl_peminjaman`(`id`,`id_peminjaman`,`kd_barang`,`nama_barang`,`jumlah`,`nama_peminjam`,`no_telp`,`keterangan_peminjaman`,`status`,`tanggal_peminjaman`)VALUES(NULL, '$a', '$b','$g','$c','$d','$e','$f','disetujui',CURRENT_TIMESTAMP);";
            $query .= "UPDATE `tbl_pengajuan_peminjaman` SET status = 'disetujui' WHERE `tbl_pengajuan_peminjaman`.`id` = '$id';";
        }
        // hapus  
        // $query .= "DELETE FROM `tbl_usulan_pengadaan` WHERE `tbl_usulan_pengadaan`.`id` = '$id';";
        // $query .= "UPDATE `tbl_pengajuan_peminjaman` SET status = 'disetujui' WHERE `tbl_pengajuan_peminjaman`.`id` = '$id';";
        if(performQuery($query)){
            echo "<script>alert('Data peminjaman berhasil dikonfirmasi !');document.location='index.php'</script>";
        }else{
            echo "<script>alert('Data peminjaman tidak dapat diproses. Silakan coba lagi !');document.location='index.php'</script>";
        }
    }else{
        echo "Terjadi kesalahan, Coba lagi !";
    }
    
?>
