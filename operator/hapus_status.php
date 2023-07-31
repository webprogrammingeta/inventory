<?php

      $id = $_GET['id'];
      $conn = mysqli_connect("localhost","root","","db_kalvarisarpas");
      $query = mysqli_query($conn,"DELETE FROM tbl_status WHERE id = '$id' ");
       header('location: status.php?delete=1');
?>