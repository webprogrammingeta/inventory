<?php

      $id = $_GET['id'];
      $conn = mysqli_connect("localhost","root","","db_kalvarisarpas");
      $query = mysqli_query($conn,"DELETE FROM tbl_kategori WHERE id = '$id' ");
      header('location: kategori.php?delete=1');
?>