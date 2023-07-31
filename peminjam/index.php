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
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-md-4 col-12">
            <?php 
              $querypeminjam = "SELECT id FROM tbl_pengajuan_peminjaman WHERE nama_peminjam='$nama'";
              $queryrun = mysqli_query($koneksi , $querypeminjam);
              $datapeminjam = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengajuan Peminjaman</span>
                <span class="info-box-number"><?= $datapeminjam; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-md-5 col-12">
            <?php 
              $querypeminjam = "SELECT id FROM tbl_peminjaman WHERE nama_peminjam='$nama' AND status = 'sedang dipinjam'";
              $queryrun = mysqli_query($koneksi , $querypeminjam);
              $datapeminjam = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Peminjaman</span>
                <span class="info-box-number"><?= $datapeminjam; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $querybarang = "SELECT id FROM tbl_pengembalian ORDER BY id";
              $queryrun = mysqli_query($koneksi , $querybarang);
              $databarang = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pengembalian</span>
                <span class="info-box-number"><?= $databarang; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-bold">Data Pengajuan Peminjaman</h3>
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
                    <th>Status</th>
                    <!-- <th>Aksi</th> -->
                  </tr>
                  </thead>
                  <tbody>
        <?php $i = 1;
        $rows = mysqli_query($koneksi, "SELECT * FROM tbl_pengajuan_peminjaman WHERE nama_peminjam='$nama'")?>
              <?php foreach ($rows as $row) : ?>
                  <tr>
                   <td><?= $i++ ?></td>
                   <td><?= $row['id_pengajuan'] ?></td>
                   <td><?= $row['nama_barang'] ?></td>
                   <td><?= $row['keterangan_peminjaman'] ?></td>
                   <td class=""><span class="badge badge-dark"><?= $row['status'] ?></span></td>
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


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
          <div class="card-header bg-primary">
          <h3 class="card-title text-bold">Barang Yang akan dipinjam</h3>
          <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
          <div class="input-group-append">
          </div>
          </div>
          </div>
          </div>
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap text-sm text-center">
              <thead>
              <tr>
               <th>No</th>
              <th>ID</th>
              <th>Kode Barang</th>
              <th>Keterangan</th>
              <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                 <?php $i = 1;
                $rows = mysqli_query($koneksi, "SELECT * FROM tbl_pengajuan_peminjaman WHERE nama_peminjam='$nama' AND status = 'disetujui'")?>
                 <?php foreach ($rows as $row) : ?>
                  <tr>
                   <td><?= $i++ ?></td>
                   <td><?= $row['id_pengajuan'] ?></td>
                   <td><?= $row['nama_barang'] ?></td>
                   <td><?= $row['keterangan_peminjaman'] ?></td>
                   <td class=""><a href="pinjam_barang.php?id=<?= $row['id']; ?>" class=" btn btn-danger text-sm">Pinjam ✓</a></td>
                   <!-- <td>
                     <a href="#" class="btn btn-success">kembalikan</a>
                   </td> -->
                  </tr>
              <?php endforeach; ?>
              </tbody>
              </table>
              </div>
            </div>
        </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
          <div class="card-header bg-danger">
          <h3 class="card-title text-bold">Barang Terpinjam</h3>
          <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
          <div class="input-group-append">
          </div>
          </div>
          </div>
          </div>

              <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap text-sm text-center">
              <thead>
              <tr>
              <th>No</th>
               <th>ID</th>
               <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Keterangan</th>
              <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
               <?php $i = 1;
                  $rows = mysqli_query($koneksi, "SELECT * FROM tbl_peminjaman WHERE nama_peminjam='$nama' AND status = 'sedang dipinjam'")?>
                        <?php foreach ($rows as $row) : ?>
                            <tr>
                             <td><?= $i++ ?></td>
                             <td><?= $row['id_peminjaman'] ?></td>
                             <td><?= $row['kd_barang'] ?></td>
                             <td><?= $row['nama_barang'] ?></td>
                             <td><?= $row['keterangan_peminjaman'] ?></td>
                             <td class=""><a href="pengembalian_barang.php?id=<?= $row['id']; ?>" class=" btn btn-info text-bold">Kembalikan ✓</a></td>
                             <!-- <td>
                               <a href="#" class="btn btn-success">kembalikan</a>
                             </td> -->
                            </tr>
                        <?php endforeach; ?>
              </tbody>
              </table>
              </div>
            </div>
        </div>
    </section>

</div>
</div>

  </div>
  </div>
<?php include 'templates/footer.php'; ?>