<?php 

$server = "localhost";
$user = "root";
$pass = "";
$db = "db_kalvarisarpas";

$koneksi = mysqli_connect($server,$user,$pass,$db) 
	or die(mysqli_error($koneksi));

$base_url = "http://localhost/sarpas/";

