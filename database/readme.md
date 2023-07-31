# User

	usename  : KET001
	password : 123
	email	 : aglykedoh@gmail.com

	username  : ANG001
	password : 123456
	email	 : andy@gmail.com

	username : PMJ001
	password : 123
	email	 : zolla@gmail.com

# Perancangan Aplikasi Inventaris Barang Gereja

	Data barang
	ruangan
	Data komisi Jemaat (divisi/bagian)
	Pengadaan
	Peminjaman
	Pemeliharaan
	Penghapusan
	Pengguna 
	Kondisi

Perancangan Aplikasi Inventaris Barang Gereja

Hak Akses :

'admin','ketua','anggota','pengguna'

Admin - dapat menambahkan user baru dan membuat laporan dan membuat KIB dan KIR (KARTU INVENTARIS BARANG / ruangan)

	Laporan harus berdasarkan hari, tanggal bulan tahun dan periode

Operator - operator mengelola barang seperti menambahkan barang , mengedit menghapus mencari barang dan manambahkan ruangan
	
Anggota - dapat meminjam dan mengembalikan barang


kamus data :

# tbl_user 		: (`id`, `nama_lengkap`, `kd_user`, `password`, `level`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `foto`) -> 10 fields

#tbl_kategori	: (`id`, `kode_kategori` , `nama_kategori`) -> 3 fields

#tbl_ruangan	: (`id`, `kode_ruangan` , `nama_ruangan`) -> 3 fields

	tbl_barang 	: 
	
		id, 
		nama_barang,
		kategori,
		kd_barang, 
		tanggal_pembukuan, 
		keterangan, 
		satuan,
		jumlah_satuan,
		tahun_pembuatan
		tanggal_perolehan
		kondisi_barang,
		harga_satuan, 
		total, 
		lokasi, 
		keterangan_lainnya
		foto                    ----------------> 17 field

	tbl_ruangan	: Kd_ruangan, nama_ruangan, tanggal_dibuat, dibuat_oleh			-> 4 field
	tbl_peminjaman	: Nama_barang, Jumlah_Barang, Tanggal_dipinjam, dipinjam_oleh		-> 4 field

penting : 

db_kalvarisarpas

tbl_kategori
kode_kategori
nama_kategori

- Setiap barang sudah dikategorikan berdasarkan kode yang sudah ditetapkan oleh sinode 
	
	1.   Tanah 				(A.1.110)
	2.   Tanaman 				(A.2.120)
	3.   Gedung gereja 				(A.3.130)
	4.   Rumah tinggal 				(A.4.140)
	5.   Bangunan Lain2 			(A.5.150)
	6.   Peralatan Kantor Termasuk Laptop, Printer, dll 	(B.1.210)
	7.   Sound System, Alat Audio Visual 		(B.2.220)
	8.   Alat Olahraga & Kesehatan 		(B.3.230)
	9.   Alat Music (kibord, Gitar, dll) 		(B.4.240)
	10. Alat Sakramen Ibadah 			(B.5.250)
	11. Alat RT 				(B.6.260)
	12. Buku Bacaan Perpustakaan 		(B.7.270)
	13. Kendaraan Bermotor 			(B.8.280)
	14. Perabot				(B.9.290)
	15. Hewan 				(C.300)
	16. Barang Habis Pakai 			(D.400)

	APABILA jumlah barang lebih dari 1, maka ditambah setelah kode barang mulai dari angka 1 dst......(contoh 3 bh kursi : B.9.290-1, B.9.290-2, B.9.290-3)	

- ketika barang dipinjam setiap stok/jumlah barang berkurang

	Target dibuatkan templatenya terlebih dahulu
	Target bsk harus ada menu operator (+) sidebar dan konten 


Masukkan KALVARISARPAS

	implementasi ke dalam sistem

	Kondisi barang = kita bisa melihat kondisi fisik dari barang tsb 

		Baik => masih bagus dan bisa digunakan
		Rusak Ringan => Masih bisa diperbaiki
		Rusak Berat => Tidak dapat diperbaiki lagi ( Solusi akan diusul untuk dihapus atau diputihkan atau di lelang) 

	Status Barang = digunakan untuk mengatahui status barangnya masih aktif atau tidak

		Aktif artinya barang yang statusnya masih aktif dan sedang dipakai 
		Tidak Aktif 	artinya barangnya sudah rusak berat atau tidak bisa digunakan lagi
		Dipinjam		artinya barang sedang dipinjam oleh jemaat / pengguna , jika barangnya lebih dari 1 dipinjam stoknya berkurang , jika jumlah barangnya hanya 1 barang tsb tidak dapat dipinjam lagi
		maintainance	artinya barangnya sedang diperbaiki dan tidak dapat dipinjam

#user

#Ketua => 
	-> Dashboard
	-> Master Data 	: Barang, User, Pengadaan, Pemminjaman, Penghapusan, Pemeliharaan
	-> Approval Pengadaan
	-> Approval Penghapusan
	-> Approval Pemeliharaan
	-> Log Activity
	-> My Profile
	-> Logout
	============>
	1. Membuat Laporan Barang, User, Pengadaan barang, Peminjaman, Penghapusan, Pemeliharaan dan log activity
	2. Melihat dan Mencari Data Barang
	3. Menambahkan ,Mengedit dan Menghapus data User
	4. Melihat dan mencari data  pengadaan barang
	5. Melihat dan mencari data peminjaman barang
	6. Melihat dan mencari data penghapusan barang
	7. Melihat dan mencari data pemeliharaan barang
	8. Menyetujui usulan Pengadaan Barang
	9. Menyetujui usulan Penghapusan Barang
	10. Menyetujui usulan Pemeliharaan Barang
	11. Melihat dan mencari data log activity
	12. Mengedit Profile dan Menganti password baru

#Anggota => 
	-> Dashboard
	-> Master Data 	: Barang ,Kategori ,Merk ,Ruangan ,Komisi ,Status ,Kondisi
	-> Usulan Pengadaan
	-> Usulan Penghapusan
	-> Usulan Pemeliharaan
	-> Approval Peminjaman
	-> My Profile
	-> Logout
	============>
	-> CRUD Master Data: Barang ,Kategori ,Merk ,Ruangan ,Komisi ,Status ,Kondisi
	1. Membuat Laporan Barang, User, Pengadaan barang, Peminjaman, Penghapusan, dan Pemeliharaan
	2. Membuat usulan Pengadaan Barang
	3. Membuat usulan Pengadaan Barang
	4. Membuat usulan Pemeliharaan Barang
	4. Melihat usulan Peminjaman Barang
	6. Melihat dan mencari data log activity
	7. Mengedit Profile dan Menganti password baru
#User => 
	-> Dashboard
	-> Master Data 	: Peminjaman, Pengembalian
	-> My Profile
	-> Logout
	
