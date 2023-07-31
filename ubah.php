<?php

    include 'config/config.php';
    include 'config/base.php';

    session_start();
    $id = $_SESSION['id'];
    $query = "select * from `tbl_user` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $pass =md5($_POST['password']);
            // $pass = $_POST['password'];
            $id = $_POST['idd'];
             $query .= "UPDATE `tbl_user` SET password = '$pass' WHERE `tbl_user`.`id` = '$id';";
             session_destroy();
        }
        if(performQuery($query)){
            header('location:index.php?success');
        }else{
            echo "<script>alert('Terjadi Kesalahan Silakan coba lagi !');document.location='$base_url'</script>";
        }
    }else{
        echo "Terjadi kesalahan, Coba lagi !";
    }
    
?>
