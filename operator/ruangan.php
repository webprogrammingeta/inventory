<?php

    include 'templates/header.php';

  // kode Ruangan Otomatis

        $kode = ("R");
        $qry = mysqli_query($koneksi,"SELECT max(kode_ruangan) AS kodebaru FROM tbl_ruangan WHERE kode_ruangan LIKE '$kode%'");
        $dt = mysqli_fetch_array($qry);
        $ambil = $dt['kodebaru'];
        $no = substr($ambil, 1, 3);
        $urut = $no + 1;
        $koderuang = $kode . sprintf("%03s", $urut);
?>
<!-- Query Simpan -->
  <?php 
       if(isset($_POST['tambah'])){
          $nama = $_POST['nama'];
          $kode = $_POST['kode'];
          $query = "INSERT INTO `tbl_ruangan` (`id`,`nama_ruangan`,`kode_ruangan` )VALUES(NULL,'$nama','$kode')";
          if(performQuery($query)){
              echo "<script>document.location='ruangan.php'</script>";
          }else{
              echo "<script>alert('Data gagal disimpan.')'</script>";
          }
          }
   ?>
<!-- / Tutup Query Simpan / -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ruangan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Ruangan</li>
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

          <!-- Isi Konten -->

          <div class="col-12">
                            <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-dark bg-dark">
              <div class="card-header bg-warning">
                <h2 class="card-title">Tabel Data ruangan</h2>
              <!-- Button trigger modal -->
                 <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#exampleModal">
                Tambah data
              <i class="fa fa-plus m-1"></i></button>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content text-dark">
                    <div class="modal-header bg-info">
                      <h3 class="modal-title " id="exampleModalLabel">Input ruangan</h3>
                      <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="POST" autocomplete="off" enctype="multipart/form-data" >
                    <div class="modal-body">

                          <div class="col-md mb-3">
                            <h6>Nama ruangan</h6>
                            <input type="text" class="form-control"  name="nama" id="nama" placeholder="Nama ruangan . . ." required="">
                          </div>

                          <div class="col-md mb-3">
                            <h6>Kode ruangan</h6>
                            <input type="text" class="form-control" placeholder="Massukan kode ruangan . . ." name="kode" id="kode" value="<?=$koderuang; ?>" readonly="">
                          </div>
                    </div>

                    <div class="modal-footer bg-dark">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="tambah" id="simpan">Simpan</button>
                    </div>
                      </form>
                  </div>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body ">
                <table id="example1" class="table table-bordered table-striped  table-hover text-center table-secondary text-dark">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama ruangan</th>
                    <th>Kode ruangan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    $rows = mysqli_query($koneksi, "SELECT * FROM tbl_ruangan ORDER BY id ASC")
                        ?>
              <?php foreach ($rows as $row) : ?>
                  <tr>
                   <td><?= $i++; ?></td>
                   <td><?= $row['nama_ruangan'] ?></td>
                   <td><?= $row['kode_ruangan'] ?></td>
                   <td >
                       <a href="edit_ruangan.php?id=<?= $row['id'] ?>" class="btn  text-primary btn-app-sm">
                          <i class="fas fa-edit"></i>
                        </a>  
                       <a href="hapus_ruangan.php?id=<?= $row['id'] ?>" class="btn text-danger btn-app-sm" id="delete">
                        <i class="fas fa-trash"></i> 
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>

                  <?php if (isset($_GET['delete'])) : ?>
          <div class="flash-data" data-flashdata="<?= $_GET['delete']; ?>"></div>
        <?php endif; ?>

        <?php if (isset($_GET['update'])) : ?>
          <div class="flash-ubah" data-flashubah="<?= $_GET['update']; ?>"></div>
        <?php endif; ?>

         <?php if (isset($_GET['gagal'])) : ?>
          <div class="flash-gagal" data-flashgagal="<?= $_GET['gagal']; ?>"></div>
        <?php endif; ?>

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
    <!-- /.content -->
          </div>
          
          <!-- /.Isi Konten -->
         
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript" src="<?= $base_url;?>assets/plugins1/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?= $base_url;?>assets/plugins1/jquery-3.4.1.min.js"></script>

<!-- Simpan -->
<script type="text/javascript">
  $("#simpan").click(function(){
        var nama = $("#nama").val();
        if ( nama == '' ) {
            Swal.fire({
                title: " Gagal",
                type: "error",
                icon: "error",
                text: "Nama Ruangan tidak boleh kosong !",
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
            text: ' ingin menghapus data ruangan ini ',
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
            window.location.assign("<?= $baseoperator;?>/ruangan.php");
            });
        }

      const flashubah = $('.flash-ubah').data('flashubah')
        if (flashubah) {
          Swal.fire({
             type: 'success',
             title: 'Sukses',
             text: 'Data Ruangan Berhasil diubah',
             showConfirmButton: false,
             timer: 1200
          }).then(function(){ 
            window.location.assign("<?= $baseoperator;?>/ruangan.php");
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
            window.location.assign("<?= $baseoperator;?>/ruangan.php");
            });
        }
  </script>
<!-- Hapus -->

<?php include 'templates/footer.php'; ?>
