<?php
	   
	    $id = $_GET['id'];
        $conn = mysqli_connect("localhost","root","","db_kalvarisarpas");
        $query = mysqli_query($conn,"DELETE FROM tbl_ruangan WHERE id = '$id' ");
        header('location: ruangan.php?delete=1');
?>