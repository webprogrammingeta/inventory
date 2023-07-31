<?php


include 'templates/header.php';

?>

<!-- Query Simpan -->
<?php 
     if(isset($_POST['tambah'])){
        $namausera = $_POST['namauser'];
        $activitya = $_POST['activity'];
        $query = "INSERT INTO `log_akses` (`id_log`,`id_user`,`tanggal_log`,`activity_log` )VALUES(NULL,'$namausera',CURRENT_TIMESTAMP,'$activitya')";
        if(performQuery($query)){
            echo "<script>document.location='log.php'</script>";
            // alert('Data log berhasil disimpan !');
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
            <h1 class="m-0">Log</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">log</li>
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
                <h2 class="card-title">Tabel Data log</h2>
                <a href="cetak_log.php" type="button" class="btn bg-dark float-right mr-2 "  target="_blank">
                       <span class="text-light">Print Log</span>
                   
              <i class="fas fa-print ml-1 text-light"></i></a>
              </div>



              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content text-dark">
                    <div class="modal-header bg-info text-white">
                      <h3 class="modal-title" id="exampleModalLabel">Input log</h3>
                      <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body">
                          <div class="col-md mb-3">
                            <h6>Nama User</h6>
                            <input type="text" class="form-control" name="namauser" id="namauser" placeholder="Nama User" autofocus="true" required="">
                          </div>

                          <div class="col-md mb-3">
                            <h6>activity log</h6>
                            <input type="text" class="form-control" name="activity" id="activity" placeholder="activity log" required="">
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
                    <th>Nama user</th>
                    <th>Activity Log</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    $rows = mysqli_query($koneksi, "SELECT * FROM log_akses ORDER BY id_log DESC")

                    // QUERY LIMIT LAST RECENT OR ORDER
                    // $rows = mysqli_query($koneksi, "SELECT * FROM log_akses ORDER BY id_log DESC LIMIT  5 ")
                        ?>
              <?php foreach ($rows as $row) : ?>
             <?php
setlocale(LC_TIME, 'id_ID.utf8');
$date = date_create($row['tanggal_log']);

?>
                  <tr>
                   <td><?= $i++; ?></td>
                   <td><?= $row['id_user'] ?></td>
                   <td class=""><button class=" btn border-dark"><?= $row['activity_log'] ?></button></td>
                   <td><?= date_format($date,'d/m/Y');?></td> 
                   <td><?= date_format($date,'H:i:s');?></td> 
                   <!-- 
                       <a href="edit_log.php?id=<?= $row['id'] ?>" class="btn  text-primary btn-app-sm ">
                          <i class="fas fa-edit"></i>
                        </a>  
                       <a href="hapus_log.php?id=<?= $row['id']; ?>" class="btn text-danger btn-app-sm" id="delete">
                        <i class="fas fa-trash"></i> 
                      </a>
                    </td> -->
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
<script type="text/javascript" src="<? $base_url;?>/assets/plugins1/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<? $base_url;?>/assets/plugins1/jquery-3.4.1.min.js"></script>
<!-- Simpan -->
    <script type="text/javascript">
            $("#simpan").click(function(){
                var nama = $("#namauser").val();
                var kode = $("#activity").val();
                if ( nama == '' ) {
                    Swal.fire({
                        title: " Gagal",
                        type: "error",
                        icon: "error",
                        text: "Nama log tidak boleh kosong !",
                        showConfirmButton: false,
                        timer: 1400
                    });
                }else if( kode == '' ) {
                    Swal.fire({
                        title: " Gagal",
                        type: "error",
                        icon: "error",
                        text: "Kode log tidak boleh kosong !",
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
          text: ' ingin menghapus log ini',
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
          window.location.assign("http://localhost:8080/kalvarisarpas/admin/log.php");
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
          window.location.assign("http://localhost:8080/kalvarisarpas/admin/log.php");
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
          window.location.assign("http://localhost:8080/kalvarisarpas/admin/log.php");
          });
      }
  </script>
<!-- Hapus -->

<?php include 'templates/footer.php'; ?>
