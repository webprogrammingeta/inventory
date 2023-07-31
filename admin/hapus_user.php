<?php
      $id = $_GET['id'];
      $conn = mysqli_connect("localhost","root","","db_kalvarisarpas");
      $query = mysqli_query($conn,"DELETE FROM tbl_user WHERE id = '$id' ");
       header('location: user.php?delete=1');
?>