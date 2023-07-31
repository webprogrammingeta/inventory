 <?php 
include 'templates/header.php';
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $querykategori = "SELECT id FROM tbl_kategori ORDER BY id";
              $queryrun = mysqli_query($koneksi , $querykategori);
              $datakategori = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Kategori</span>
                <span class="info-box-number"><?= $datakategori; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $querybarang = "SELECT id FROM tbl_barang ORDER BY id";
              $queryrun = mysqli_query($koneksi , $querybarang);
              $databarang = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-folder-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Barang</span>
                <span class="info-box-number"><?= $databarang; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $querykomisi = "SELECT id FROM tbl_komisi ORDER BY id";
              $queryrun = mysqli_query($koneksi , $querykomisi);
              $datakomisi = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-code-branch"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Komisi</span>
                <span class="info-box-number"><?= $datakomisi; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $querykondisi = "SELECT id FROM tbl_kondisi ORDER BY id";
              $queryrun = mysqli_query($koneksi , $querykondisi);
              $datakondisi = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Kondisi</span>
                <span class="info-box-number"><?= $datakondisi; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $querymerk = "SELECT id FROM tbl_merk ORDER BY id";
              $queryrun = mysqli_query($koneksi , $querymerk);
              $datamerk = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-window-restore"></i></i></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Merk</span>
                <span class="info-box-number"><?= $datamerk; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $queryruangan = "SELECT id FROM tbl_ruangan ORDER BY id";
              $queryrun = mysqli_query($koneksi , $queryruangan);
              $dataruangan = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-sitemap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Ruangan</span>
                <span class="info-box-number"><?= $dataruangan; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $querystatus = "SELECT id FROM tbl_status ORDER BY id";
              $queryrun = mysqli_query($koneksi , $querystatus);
              $datastatus = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-shield-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Status</span>
                <span class="info-box-number"><?= $datastatus; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $querypengadaan = "SELECT id FROM tbl_usulan_pengadaan ORDER BY id";
              $queryrun = mysqli_query($koneksi , $querypengadaan);
              $datausulanpengadaan = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-bell"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Usulan Pengadaan</span>
                <span class="info-box-number"><?= $datausulanpengadaan; ?></span>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $querypengajuan = "SELECT status FROM tbl_pengajuan_peminjaman WHERE status = 'pending'";
              $queryrun = mysqli_query($koneksi , $querypengajuan);
              $datapengajuanpeminjam = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="far fa-bell"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pengajuan Peminjaman</span>
                <span class="info-box-number"><?= $datapengajuanpeminjam; ?></span>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $querypeminjaman = "SELECT id FROM tbl_peminjaman ORDER BY id";
              $queryrun = mysqli_query($koneksi , $querypeminjaman);
              $datapeminjam = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-dark"><i class="far fa-bell"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Peminjaman</span>
                <span class="info-box-number"><?= $datapeminjam; ?></span>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col --> <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Peminjaman</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-center">
                  <thead>
                  <?php $i = 1;
                  $rows = mysqli_query($koneksi, "SELECT * FROM tbl_pengajuan_peminjaman WHERE status = 'disetujui'")?>
                  <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Peminjam</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($rows as $row) : ?>
                    <?php setlocale(LC_TIME, 'id_ID.utf8');
                      $date = date_create($row['tanggal_pengajuan']);?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><span class="badge badge-dark text-md"><?= $row['id_pengajuan']; ?></span>
                   </td>
                    <td><?= $row['kd_barang']; ?></td>
                    <td><?= $row['nama_peminjam']; ?></td>
                    <td><?= $row['keterangan_peminjaman']; ?></td>
                    <td><?= date_format($date,'d/m/Y');?></td> 
                   <td><?= date_format($date,'H:i:s');?></td> 
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