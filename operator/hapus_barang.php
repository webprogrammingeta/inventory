<?php
	  include '../config/config.php';
	  
      $id = $_GET['id'];
      $conn = mysqli_connect("localhost","root","","db_kalvarisarpas");
      $query = mysqli_query($conn,"DELETE FROM tbl_barang WHERE id = '$id' ");
      header('location: barang.php?delete=1');
?>