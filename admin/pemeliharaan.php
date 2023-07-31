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
            <h1 class="m-0">Pemeliharaan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Pemeliharaan</li>
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
                <h1 class="card-title">Tabel Data Pemeliharaan</h1>
                 <a href="cetak_pemeliharaan.php" type="button" class="btn bg-dark float-right"  target="_blank">
                       <span class="text-light">Print Pemeliharaan</span>
                   
              <i class="fas fa-print ml-1 text-light"></i></a>
              </div>

              <div class="card-body ">
                <table id="example1" class="table table-bordered table-striped  table-hover text-center table-secondary text-dark">
                  <thead>
                  <tr>
                   <th>No</th>
                    <th>Photo</th>
                    <th>ID</th>
                    <!-- <th>Kode Barang</th> -->
                    <th>Nama Barang</th>
                    <th>Biaya</th>
                    <th>Waktu</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>

                    <!-- Jumlah 10 fields -->

                    <?php $i = 1;

                    $rows = mysqli_query($koneksi, "SELECT * FROM tbl_pemeliharaan ORDER BY id DESC")
                        ?>

              <?php foreach ($rows as $row) : ?>
                <?php setlocale(LC_TIME, 'id_ID.utf8');
                      $date = date_create($row['tanggal_disetujui']);?>
                  <tr>
                   <td><?= $i++; ?></td>
                           <td><img src="../operator/barang/<?= $row["gambar"]; ?>" width="70" title="<?= $row['gambar']; ?>"></td>
                           <td width="200"><button class=" btn border-dark text-sm"><?= $row['id_pemeliharaan'] ?></button></td>
                           <!-- <td><?= $row['kd_barang'] ?></td> -->
                           <td><?= $row['nama_barang'] ?></td>
                           <td>Rp <?= number_format($row['biaya'], 0, ',', '.'); ?></td>
                           <td><?= $row['interval'] ?> <?= $row['periode'] ?></td>
                           <td><?= date_format($date,'d/m/Y');?></td> 
                           <td><?= date_format($date,'H:i:s');?></td>
                           <td><?= $row['keterangan_pemeliharaan'] ?></td>
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
