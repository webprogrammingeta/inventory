<?php
    include 'templates/header.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Approval Peminjaman</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Approval Peminjaman</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-12">
            <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-dark">
              <div class="card-header bg-warning">
                <h1 class="card-title">Daftar Pengajuan Peminjaman Barang</h1>
                <a href="cetak_usulan_peminjaman.php" type="button" class="btn btn-dark float-right mr-2 "  target="_blank">
                       <span class="text-light">Print Usulan Peminjaman</span>
              <i class="fas fa-print ml-1 text-light"></i></a>
              <!-- Button trigger modal -->
                 <!-- <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#exampleModal">
                Tambah data
              <i class="fa fa-plus m-1"></i></button> -->
              </div>

              <!-- /.card-header -->
              <div class="card-body ">
                        <table id="example1" class="table table-bordered table-striped text-center">
                  <thead>
                  <?php $i = 1;
                  $rows = mysqli_query($koneksi, "SELECT * FROM tbl_pengajuan_peminjaman WHERE status = 'pending'")?>
                  <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Kode Barang</th>
                    <th>Peminjam</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($rows as $row) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                     <td><span class="badge badge-dark text-md"><?= $row['id_pengajuan']; ?></span>
                   </td>
                    <td><?= $row['kd_barang']; ?></td>
                    <td><?= $row['nama_peminjam']; ?></td>
                    <td><?= $row['keterangan_peminjaman']; ?></td>
                     <td>
                       <a href="accept_peminjaman.php?id=<?= $row['id'] ?>" class="btn  btn-success btn-app-sm mr-1">
                       ✓
                        </a>  
                        <a href="reject_peminjaman.php?id=<?= $row['id'] ?>" class="btn  btn-danger btn-app-sm mr-1">
                         ✕
                        </a>  
                    </td>
                  </tr>
                <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
          </div>
         
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript" src="<?=$base_url; ?>assets/plugins1/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?=$base_url; ?>assets/plugins1/jquery-3.4.1.min.js"></script>

<!-- Simpan -->
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
                title: " Peringatan",
                type: "warning",
                icon: "warning",
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
<!-- Simpan -->

<!-- Hapus -->
  <script type="text/javascript">
      $('#delete').on('click',function(e){
        e.preventDefault();
          const href = $(this).attr('href')
           Swal.fire({
            title: 'Apakah anda yakin ?',
            text: ' ingin menghapus User ini',
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
             text: "Data User Berhasil dihapus",
             showConfirmButton: false,
             timer: 1200
          }).then(function(){ 
            window.location.assign("http://localhost:8080/sarpas/operator/approval_peminjaman.php");
            });
        }

      const flashubah = $('.flash-ubah').data('flashubah')
        if (flashubah) {
          Swal.fire({
             type: 'success',
             title: 'Sukses',
             text: 'Data Berhasil diubah',
             showConfirmButton: false,
             timer: 1200
          }).then(function(){ 
            window.location.assign("http://localhost:8080/sarpas/operator/approval_peminjaman.php");
            });
        }

      const flashgagal = $('.flash-gagal').data('flashgagal')
        if (flashgagal) {
          Swal.fire({
             type: 'error',
             title: 'Gagal',
             text: "Tidak ada data yang diubah !",
             showConfirmButton: false,
             timer: 1400
          }).then(function(){ 
            window.location.assign("http://localhost:8080/sarpas/operator/approval_peminjaman.php");
            });
        }
  </script>
<!-- Hapus -->

<?php include 'templates/footer.php'; ?>
