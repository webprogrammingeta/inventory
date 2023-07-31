<?php

include 'templates/header.php';

?>

<!-- Query Simpan -->
<?php 
     if(isset($_POST['tambah'])){
        $nama = $_POST['nama'];
        $kode = $_POST['kode'];
        $query = "INSERT INTO `tbl_komisi` (`id`,`kode_komisi`,`nama_komisi`)VALUES(NULL,'$kode','$nama')";
        if(performQuery($query)){
            echo "<script>document.location='komisi.php'</script>";
            // alert('Data komisi berhasil disimpan !');
        }else{
            echo "<script>alert('Data gagal disimpan.')'</script>";
        }
    }
?>
<!-- Query Simpan -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">komisi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Komisi</li>
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
                <h2 class="card-title">Tabel Data komisi</h2>
              <!-- Button trigger modal -->
                 <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#exampleModal">
                Tambah data
              <i class="fa fa-plus m-1"></i></button>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content text-dark">
                    <div class="modal-header bg-info text-white">
                      <h3 class="modal-title" id="exampleModalLabel">Input komisi</h3>
                      <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body">
                          <div class="col-md mb-3">
                            <h6>Kode komisi</h6>
                            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode komisi" required="">
                          </div>
                          <div class="col-md mb-3">
                            <h6>Nama komisi</h6>
                            <input type="text" class="form-control"  name="nama" id="nama" placeholder="Nama komisi" autofocus="true" required="">
                          </div>
                    </div>

                    <div class="modal-footer bg-dark ">
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
                  <tr >
                    <th>No</th>
                    <th>Kode komisi</th>
                    <th>Nama komisi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;

                    $rows = mysqli_query($koneksi, "SELECT * FROM tbl_komisi ORDER BY id ASC")
                        ?>
              <?php foreach ($rows as $row) : ?>
                  <tr>
                   <td><?= $i++; ?></td>
                   <td><?= $row['nama_komisi'] ?></td>
                   <td class=""><button class=" btn border-dark"><?= $row['kode_komisi'] ?></button></td>
                   <td >
                       <a href="edit_komisi.php?id=<?= $row['id'] ?>" class="btn  text-primary btn-app-sm ">
                          <i class="fas fa-edit"></i>
                        </a>  
                       <a href="hapus_komisi.php?id=<?= $row['id']; ?>" class="btn text-danger btn-app-sm" id="delete">
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
                var kode = $("#kode").val();
                if ( nama == '' ) {
                    Swal.fire({
                        title: " Gagal",
                        type: "error",
                        icon: "error",
                        text: "Nama komisi tidak boleh kosong !",
                        showConfirmButton: false,
                        timer: 1400
                    });
                }else if( kode == '' ) {
                    Swal.fire({
                        title: " Gagal",
                        type: "error",
                        icon: "error",
                        text: "Kode komisi tidak boleh kosong !",
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
          text: ' ingin menghapus komisi ini',
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
            window.location.assign("<?= $baseoperator;?>/komisi.php");
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
            window.location.assign("<?= $baseoperator;?>/komisi.php");
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
            window.location.assign("<?= $baseoperator;?>/komisi.php");
          });
      }
  </script>
<!-- Hapus -->

<?php include 'templates/footer.php'; ?>
