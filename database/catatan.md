
buat edit dan hapus di kategori

edit di fungsi
hapus di config

kategori fix
ruangan fix

Edit Hapus dan Delete Di KATEGORI sudah pakai SWEET ALERT 2

CRUD USER sudah pakai SWEET ALERT 2
CRUD RUANGAN sudah pakai SWEET ALERT 2
CRUD KATEGORI sudah pakai SWEET ALERT 2

CARA menambahkan sweet alert =>
	tambahkan library 
		JS simpan
		(
			<script type="text/javascript" src="assets/plugins1/sweetalert2.all.min.js"></script>
				<script type="text/javascript" src="assets/plugins1/jquery-3.4.1.min.js"></script>

				<script type="text/javascript">
				  $("#simpan").click(function(){
				                var nama = $("#nama").val();
				                var kode = $("#kode").val();
				                var pass = $("#pass").val();
				                var tmptlhr = $("#tmptlhr").val();
				                var tgl = $("#tgl").val();
				                var almt = $("#almt").val();
				                var telp = $("#telp").val();
				                var image = $("#image").val();
				                if ( nama == ''|| kode == '' || pass == '' || tmptlhr == ''  || tgl == '' || almt == ''  || telp == '' || image == ''  ) {
				                    Swal.fire({
				                        title: " Gagal",
				                        type: "error",
				                        icon: "error",
				                        text: "Data tidak boleh kosong !",
				                        showConfirmButton: false,
				                        timer: 1400
				                    });
				                }else{
				                   Swal.fire({
				                    title: "Sukses", 
				                    text: 'Data '+ nama +' Berhasil Ditambahkan', 
				                    type: "success",
				                    icon: "success",
				                    showConfirmButton: false,
				                    timer: 3000
				                })
				                }
				            })
				</script>
		)

		JS Delete
		(
			<!-- Hapus -->
  <script type="text/javascript">
      $('#delete').on('click',function(e){
        e.preventDefault();
        const href = $(this).attr('href')
         Swal.fire({
          title: 'Apakah anda yakin ?',
          text: ' ingin menghapus kategori ini',
          type: 'warning',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya , hapus',
        }).then((result) => {
          if (result.value) {
            document.location.href = href;
          }
      })
      });

      const flashdata = $('.flash-data').data('flashdata')
      if (flashdata) {
        Swal.fire({
           type: 'success',
           title: 'Sukses',
           text: "Data Berhasil dihapus",
           showConfirmButton: false,
           timer: 1200
        }).then(function(){ 
          window.location.assign("http://localhost:8080/kalvarisarpas/edit_kategori.php");
          });
      }

      const flashubah = $('.flash-ubah').data('flashubah')
      if (flashubah) {
        Swal.fire({
           type: 'success',
           title: 'Sukses',
           text: "Data Berhasil diubah",
           showConfirmButton: false,
           timer: 1200
        }).then(function(){ 
          window.location.assign("http://localhost:8080/kalvarisarpas/kategori.php");
          });
      }
  </script>
<!-- Hapus -->

		)

		JS Update
		(
			
		)
////////////////// TUTUP ///////////////////////

# Next Coding tgl 30 malam
	buat tabel di mysql tbl_barang
	buat id dan nama untuk masing-masing input dan buat query simpan ke dalam database
	query harus ada foto











# Next Coding tgl 05 malam

-> Fitur Login multi role
-> Paswordnya di enksripsi
-> Fitur Log Activity

	EAT SLEEP CODING REPEAT



Tabel Log Activity

	1	ID_LOG Utama	int(11)
	2	ID_USER			varchar(10)	
	3	TANGGAL_LOG		datetime
	4	ACTIVITY_LOG	varchar(30)	
	5	ACTIVITY_DETAIL	varchar(10)		




