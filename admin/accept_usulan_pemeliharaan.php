<?php
    include '../config/config.php';

    $id = $_GET['id'];
    $query = "select * from `tbl_usulan_pemeliharaan` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $a = $row['id_pemeliharaan'];
            $b = $row['kd_barang'];
            $c = $row['nama_barang'];
            $d = $row['keterangan_pemeliharaan'];
            $e = $row['interval'];
            $f = $row['periode'];
            $g = $row['gambar'];
            $h = $row['biaya'];
            $query = "INSERT INTO `tbl_pemeliharaan`(`id`,`id_pemeliharaan`,`kd_barang`,`nama_barang`,`keterangan_pemeliharaan`,`interval`,`periode`,`biaya`,`tanggal_disetujui`,`gambar`)VALUES(NULL,'$a','$b','$c','$d','$e','$f','$h',CURRENT_TIMESTAMP,'$g');";
        }
        // hapus barang
        // $query .= "DELETE FROM `tbl_barang` WHERE `tbl_barang`.`kd_barang` = '$kdbarang';";
        
        // update
        $query .= "UPDATE `tbl_usulan_pemeliharaan` SET status_usulan = 'berhasil dikonfirmasi' WHERE `tbl_usulan_pemeliharaan`.`id` = '$id';";
        if(performQuery($query)){
            echo "<script>document.location='approval_pemeliharaan.php?=update=1'</script>";
        }else{
            echo "<script>alert('Data Pemeliharaan tidak dapat diproses.Silakan coba lagi !');document.location='approval_pemeliharaan.php'</script>";
        }
    }else{
        echo "Terjadi kesalahan, Coba lagi !";
    }
    
?>
