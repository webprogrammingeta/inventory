<?php

      $id = $_GET['id'];
      $conn = mysqli_connect("localhost","root","","db_kalvarisarpas");
      $query = mysqli_query($conn,"DELETE FROM tbl_komisi WHERE id = '$id' ");
      header('location: komisi.php?delete=1');
?>