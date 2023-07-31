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
            <h1 class="m-0">Peminjaman</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Peminjaman</li>
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
            <div class="card card-outline card-dark bg-dark">
              <div class="card-header bg-warning">
                <h1 class="card-title">Daftar Peminjaman</h1>
                <a href="cetak_peminjaman.php" type="button" class="btn bg-dark float-right"  target="_blank">
                       <span class="text-light">Print Peminjaman</span>
                   
              <i class="fas fa-print ml-1 text-light"></i></a>
              </div>

              <!-- /.card-header -->
              <div class="card-body ">
                <table id="example1" class="table table-bordered table-striped  table-hover text-center table-secondary text-dark">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Peminjam</th>
                    <!-- <th>Kode Barang</th> -->
                    <th>Nama Barang</th>
                    <th>No HP</th>
                    <th>Keperluan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <!-- <th>Status</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    $rows = mysqli_query($koneksi, "SELECT * FROM tbl_peminjaman ORDER BY id ASC")
                        ?>

              <?php foreach ($rows as $row) : ?>
                <?php setlocale(LC_TIME, 'id_ID.utf8');
                      $date = date_create($row['tanggal_peminjaman']);?>
                  <tr>
                   <td><?= $i++; ?></td>
                   <td><?= $row['id_peminjaman']; ?></td>
                   <td><?= $row['nama_peminjam']; ?></td>
                   <!-- <td><?= $row['kd_barang']; ?></td> -->
                   <td><?= $row['nama_barang']; ?></td>
                   <td><?= $row['no_telp']; ?></td>
                   <!-- <td>Rp.<?= number_format($row['harga'], 0, ',', '.'); ?></td> -->
                   <td><?= $row['keterangan_peminjaman']; ?></td>
                   <td><?= date_format($date,'d/m/Y');?></td> 
                   <td><?= date_format($date,'H:i:s');?></td> 
                   <!-- <td><?= $row['status']; ?></td> -->
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
<?php include 'templates/footer.php'; ?>
