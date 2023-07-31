<?php 
// Buka sessi
   include 'koneksi.php';
   include 'base.php';
   session_start();
  // Cek Sessi
   if (empty($_SESSION['nama_lengkap']) or empty($_SESSION['level'])) {
    echo "<script>alert('Silahkan login terlebih dahulu!');document.location='$base_url'</script>";
   }

 ?>