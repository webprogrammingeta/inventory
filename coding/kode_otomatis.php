<?php

	date_default_timezone_set("Asia/Jakarta");
    $date = date("Ymd");
    $query = mysqli_query($koneksi, "SELECT max(id_pengajuan) as kodeTerbesar FROM tbl_pengajuan_peminjaman");
    $data = mysqli_fetch_array($query);
    $idpeminjaman = $data['kodeTerbesar'];
    $urutan = (int) substr($idpeminjaman, 11, 3);
    $urutan++;
    $huruf = "PJ";
    $idpeminjaman = $huruf .$date. sprintf("%03s", $urutan);


	?>