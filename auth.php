<?php 

// panggil koneksi database
include 'config/koneksi.php';
include 'config/config.php';
include 'config/base.php';

	// $pass = $_POST['password'];

	$kduser = mysqli_escape_string($koneksi, $_POST['username']);
	// PASSWORD ENKRIPSI MD5
	$password = mysqli_escape_string($koneksi, md5($_POST['password']));
	$level = mysqli_escape_string($koneksi, $_POST['level']);
	
	// $password = mysqli_escape_string($koneksi, $_POST['password']);
	$cekadmin = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE kd_user = '$kduser' AND level = '$level'");

	$user_valid = mysqli_fetch_array($cekadmin);

	if ($user_valid) {
		if ($password == $user_valid['password']) {

			// Buka sesi ambil semua data dari yang user yang login 

			session_start();
			$_SESSION['id'] = $user_valid['id'];
			$_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
			$_SESSION['kd_user'] = $user_valid['kd_user'];
			$_SESSION['password'] = $user_valid['password'];
			$_SESSION['email'] = $user_valid['email'];
			$_SESSION['tempat_lahir'] = $user_valid['tempat_lahir'];
			$_SESSION['tanggal_lahir'] = $user_valid['tanggal_lahir'];
			$_SESSION['no_telp'] = $user_valid['no_telp'];
			$_SESSION['alamat'] = $user_valid['alamat'];
			$_SESSION['level'] = $user_valid['level'];
			$_SESSION['foto'] = $user_valid['foto'];

			// Cek Level user 

				if ($level == "admin") {
					header('location:admin/');
				} elseif ($level == "operator") {
					header('location:operator/');
				} elseif ($level == "peminjam") {
					header('location:peminjam/');
				}
		} else {
			echo"<script>alert('Maaf Login gagal kduser anda tidak terdaftar !');document.location='$base_url'</script>";}
		} else {
				header("location: index.php?error");
		        exit();
	}

	

	      





