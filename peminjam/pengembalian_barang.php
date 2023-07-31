<?php
    
    include '../config/config.php';

    $id = $_GET['id'];
    $query = "select * from `tbl_peminjaman` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $a = $row['id_peminjaman'];
            $b = $row['kd_barang'];
            $c = $row['nama_barang'];
            $d = $row['jumlah'];
            $e = $row['nama_peminjam'];
            $f = $row['no_telp'];
            $g = $row['keterangan_peminjaman'];
            $h = $row['status'];
            $i = $row['tanggal_peminjaman'];

            // INSERT PENGEMBALIAN
            $query = "INSERT INTO `tbl_pengembalian`(`id`,`id_pengembalian`,`kd_barang`,`nama_barang`,`jumlah`,`nama_peminjam`,`no_telp`,`keterangan_pengembalian`,`status`,`tanggal_kembali`)VALUES(NULL, '$a', '$b','$c','$d','$e','$f','Terima Kasih','selesai',CURRENT_TIMESTAMP);";
        }
        // UPDATE PENGAJUAN PEMINJAMAN
        $query .= "UPDATE `tbl_pengajuan_peminjaman` SET status = 'sudah dikembalikan' WHERE `tbl_pengajuan_peminjaman`.`id_pengajuan` = '$a';";

        // UPDATE PEMINJAMAN
         $query .= "UPDATE `tbl_peminjaman` SET status = 'sudah dikembalikan' WHERE `tbl_peminjaman`.`id` = '$id';";

        if(performQuery($query)){
            echo "<script>alert('Data Pengembalian berhasil dikonfirmasi !');document.location='index.php'</script>";
        }else{
            echo "<script>alert('Data Pengembalian tidak dapat diproses. Silakan coba lagi !');document.location='index.php'</script>";
        }
    }else{
        echo "Terjadi kesalahan, Coba lagi !";
    }
    
?>





