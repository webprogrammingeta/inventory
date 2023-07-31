<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_kalvarisarpas");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}


function ubahkategori($data) {
	global $conn;

	$id = $data["id"];
	$kode = htmlspecialchars($data["kode"]);
	$nama = htmlspecialchars($data["nama"]);
	$query = "UPDATE tbl_kategori SET
				kode_kategori = '$kode',
				nama_kategori = '$nama'
				  WHERE id = $id
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);	
}

function ubahkondisi($data) {
	global $conn;

	$id = $data["id"];
	$kode = htmlspecialchars($data["kode"]);
	$nama = htmlspecialchars($data["nama"]);
	$query = "UPDATE tbl_kondisi SET
				kd_kondisi = '$kode',
				nama_kondisi = '$nama'
				  WHERE id = $id
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);	
}

function ubahstatus($data) {
	global $conn;

	$id = $data["id"];
	$kode = htmlspecialchars($data["kode"]);
	$nama = htmlspecialchars($data["nama"]);

	$query = "UPDATE tbl_status SET
				kd_status = '$kode',
				nama_status = '$nama'
				  WHERE id = $id
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);	
}

function ubahruangan($data) {
	global $conn;

	$id = $data["id"];
	$kode = htmlspecialchars($data["kode"]);
	$nama = htmlspecialchars($data["nama"]);
	$query = "UPDATE tbl_ruangan SET
				kode_ruangan = '$kode',
				nama_ruangan = '$nama'
				  WHERE id = $id
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);	
}

function ubahmerk($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$query = "UPDATE tbl_merk SET
				nama_merk = '$nama'
				  WHERE id = $id
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);	
}

function ubahkomisi($data) {
	global $conn;

	$id = $data["id"];
	$kode = htmlspecialchars($data["kode"]);
	$nama = htmlspecialchars($data["nama"]);
	$query = "UPDATE tbl_komisi SET
				kode_komisi = '$kode',
				nama_komisi = '$nama'
				  WHERE id = $id
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);	
}

function ubahpassword($data) {
	global $conn;
	$id = $data["id"];
	$passbaru = htmlspecialchars(md5($data["passbaru"]));
	$query = "UPDATE tbl_user SET
				password = '$passbaru'
				  WHERE id = $id
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);	
}

function ubahuser($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$kode = htmlspecialchars($data["kode"]);
	// $pass = htmlspecialchars($data["pass"]);
	$email = htmlspecialchars($data["email"]);
	$tmptlhr = htmlspecialchars($data["tmptlhr"]);
	$tgl = htmlspecialchars($data["tgl"]);
	$telp = htmlspecialchars($data["telp"]);
	$almt = htmlspecialchars($data["almt"]);
	$level = htmlspecialchars($data["level"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	// password = '$pass',
	$query = "UPDATE tbl_user SET
				nama_lengkap = '$nama',
				kd_user = '$kode',
				email = '$email',
				tempat_lahir = '$tmptlhr',
				tanggal_lahir = '$tgl',
				no_telp = '$telp',
				alamat = '$almt',
				level = '$level',
				foto = '$gambar'
				  WHERE id = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

function uploadbarang() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'barang/' . $namaFileBaru);

	return $namaFileBaru;
}

function ubahbarang($data) {
	global $conn;

	$id = $data["id"];
	$a = htmlspecialchars($data['namabrg']);
    $b = htmlspecialchars($data['namakategori']);
    $c = htmlspecialchars($data['kdkategori']);
    $d = htmlspecialchars($data['tglpmbk']);
    $e = htmlspecialchars($data['merk']);
    $f = htmlspecialchars($data['satuan']);
    $g = htmlspecialchars($data['asal']);
    $h = htmlspecialchars($data['tglperolehan']);
    $i = htmlspecialchars($data['namakondisi']);
    $j = htmlspecialchars($data['jmlhbrg']);
    $k = htmlspecialchars($data['harga']);
    $l = htmlspecialchars($data['txttotal']);
    $m = htmlspecialchars($data['namalokasi']);
    $n = htmlspecialchars($data['namastatus']);
    $o = htmlspecialchars($data['lainnya']);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = uploadbarang();
	}

	$query = "UPDATE tbl_barang SET
				nama_barang = '$a',
				kategori = '$b',
				kd_barang = '$c',
				tanggal_pembukuan = '$d',
				keterangan = '$e',
				satuan = '$f',
				asal_perolehan = '$g',
				tanggal_perolehan = '$h',
				kondisi_barang = '$i',
				jumlah_satuan = '$j',
				harga_satuan = '$k',
				total = '$l',
				lokasi = '$m',
				status = '$n',
				keterangan_lainnya = '$o',
				foto = '$gambar'
				  WHERE id = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

?>