<?php 

// panggil koneksi database
include 'config/koneksi.php';
include 'config/config.php';
include 'config/base.php';

	// $pass = $_POST['password'];

	$emaill = mysqli_escape_string($koneksi, $_POST['email']);
	
	// PASSWORD ENKRIPSI MD5
	// $password = mysqli_escape_string($koneksi, md5($_POST['password']));
	$cekemail = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE email = '$emaill'");
	$user_valid = mysqli_fetch_array($cekemail);

	if ($user_valid) {
		if ($emaill == $user_valid['email']) {

			// Buka sesi ambil semua data dari yang user yang login 
			session_start();
			$_SESSION['email'] = $user_valid['email'];
			$_SESSION['id'] = $user_valid['id'];
			header('location:ganti_password.php?success');
			// Cek Level user 
		} else {
			echo"<script>alert('Maaf email anda tidak terdaftar !');document.location='forgot.php'</script>";}
		} else {
			header("Location: forgot.php?error");
		        exit();;
	}

	

	      





