<?php
      $id = $_GET['id'];
      $conn = mysqli_connect("localhost","root","","db_kalvarisarpas");
      $query = mysqli_query($conn,"DELETE FROM tbl_merk WHERE id = '$id' ");
      header('location: merk.php?delete=1');
?>