 <?php 
include 'templates/header.php';
  
  $nama= $_SESSION['nama_lengkap'];


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengembalian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master data</a></li>
              <li class="breadcrumb-item active">Pengembalian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-bold">Data Pengembalian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-center">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Kode Barang</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>

                    <!-- <th>Aksi</th> -->
                  </tr>
                  </thead>
                  <tbody>
        <?php $i = 1;
        
        $rows = mysqli_query($koneksi, "SELECT * FROM tbl_pengembalian WHERE nama_peminjam='$nama' AND status = 'selesai'")?>
              <?php foreach ($rows as $row) : ?>

                    <?php setlocale(LC_TIME, 'id_ID.utf8');
                      $date = date_create($row['tanggal_kembali']);?>
                  <tr>
                   <td><?= $i++ ?></td>
                   <td><?= $row['id_pengembalian'] ?></td>
                   <td><?= $row['nama_barang'] ?></td>
                   <td><?= $row['keterangan_pengembalian'] ?></td>
                    <td><?= date_format($date,'d/m/Y');?></td> 
                   <td><?= date_format($date,'H:i:s');?></td> 
                   <!-- <td>
                     <a href="#" class="btn btn-success">kembalikan</a>
                   </td> -->
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
    <!-- /.content -->
  </div>
  </div>
<?php include 'templates/footer.php'; ?>