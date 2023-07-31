  <?php 

    include 'templates/header.php';
    include '../config/koneksi.php';

    // CHARTS COLUMN
           // Tampilkan data 
          $a = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Tanah'");
          $ja = $a->num_rows;

          $b = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Tanaman'");
          $jb = $b->num_rows;

          $c = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Gedung gereja'");
          $jc = $c->num_rows;

          $d = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Rumah tinggal'");
          $jd = $d->num_rows;

          $e = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Bangunan Lain2'");
          $je = $e->num_rows;

          $f = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Peralatan Kantor (termasuk Laptop, Printer, dll)'");
          $jf = $f->num_rows;

          $g = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Sound System, Alat Audio Visual'");
          $jg = $g->num_rows;

          $h = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Alat Olahraga & Kesehatan'");
          $jh = $h->num_rows;

          $i = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Alat Music (kibord, Gitar, dll)'");
          $ji = $i->num_rows;
          
          $j = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Alat Sakramen Ibadah'");
          $jj = $j->num_rows;

          $k = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Alat RT'");
          $jk = $k->num_rows;

          $l = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Buku Bacaan Perpustakaan'");
          $jl = $l->num_rows;

          $m = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Kendaraan Bermotor'");
          $jm = $m->num_rows;
          
          $n = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Perabot'");
          $jn = $n->num_rows;

          $o = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Hewan'");
          $jo = $o->num_rows;

          $p = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Barang Habis Pakai'");
          $jp = $p->num_rows;
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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Kolom -->
          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $queryuser = "SELECT id FROM tbl_user ORDER BY id";
              $queryrun = mysqli_query($koneksi , $queryuser);
              $datauser = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text ">Users</span>
                <span class="info-box-number text-lg"><?= $datauser; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $querylog = "SELECT id_log FROM log_akses ORDER BY id_log";
              $queryrun = mysqli_query($koneksi , $querylog);
              $datalog = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-eye"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Log Activity</span>
                <span class="info-box-number text-lg"><?= $datalog; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $querypengadaan = "SELECT id_pengadaan FROM tbl_pengadaan ORDER BY id_pengadaan";
              $queryrun = mysqli_query($koneksi , $querypengadaan);
              $datapengadaan = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-folder"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengadaan</span>
                <span class="info-box-number text-lg"><?= $datapengadaan; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $queryusulan = "SELECT id_usulan FROM tbl_usulan_pengadaan where status_usulan = 'pending'";
              $queryrun = mysqli_query($koneksi , $queryusulan);
              $datausulan = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Usulan Pengadaan</span>
                <span class="info-box-number text-lg"><?= $datausulan; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <?php 
              $queryajukan = "SELECT id_peminjaman FROM tbl_peminjaman";
              $queryrun = mysqli_query($koneksi , $queryajukan);
              $dataajukan = mysqli_num_rows($queryrun);
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fas fa-business-time"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total   Peminjaman</span>
                <span class="info-box-number text-lg"><?= $dataajukan; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <?php 
                          $querytotal =" SELECT SUM(harga) AS total FROM tbl_pengadaan";
                          $queryrun = mysqli_query($koneksi , $querytotal);

                          while ($data = mysqli_fetch_assoc($queryrun)) {
                            $output = $data['total'];
                          }
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-dark"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> Biaya Pengadaan</span>
                <span class="info-box-number text-lg">Rp <?= number_format($output, 0, ',', '.'); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <?php 
                          $querytotal =" SELECT SUM(harga) AS total FROM tbl_usulan_pengadaan WHERE status_usulan='pending'";
                          $queryrun = mysqli_query($koneksi , $querytotal);

                          while ($data = mysqli_fetch_assoc($queryrun)) {
                            $output = $data['total'];
                          }
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> Usulan Biaya Pengadaan</span>
                <span class="info-box-number text-lg">Rp <?= number_format($output, 0, ',', '.'); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           <div class="col-md-3 col-sm-6 col-12">
            <?php 
                          $querytotal =" SELECT SUM(total) AS harga FROM tbl_barang WHERE id";
                          $queryrun = mysqli_query($koneksi , $querytotal);

                          while ($data = mysqli_fetch_assoc($queryrun)) {
                            $output = $data['harga'];
                          }
            ?>
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Biaya Total Barang</span>
                <span class="info-box-number text-lg">Rp <?= number_format($output, 0, ',', '.'); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-6">
          <div class="card shadow mb-4">
          <div class="card-header py-3">
            Grafik Barang Berdasarkan Kategori
          <!-- Charts -->
          <div id="columnchart_values"></div>
          </div>
          </div>
          </div>

          <div class="col-md-6">
          <div class="card shadow mb-4">
          <div class="card-header py-3">
          <h5 class="m-0 font-weight-bold text-dark"><i>Grafik Barang Berdasarkan Kondisi</i></h5>
          <!-- Charts -->
          <div id="columnchart_values"></div>
          </div>
          </div>
          </div>

        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Kolom -->
          <div class="col-md-6 col-sm-6 col-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                <i class="fas fa-chart-pie mr-2"></i>
                   Last Barang
                </h3>
                <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Kondisi</th>
                <th>Lihat</th>
                </tr>
                </thead>
                <tbody>
                   <?php $i = 1;
                            $rows = mysqli_query($koneksi, "SELECT * FROM tbl_barang ORDER BY id DESC LIMIT 4 ")
                            ?>
                            <?php foreach ($rows as $row) : ?>
                            <?php
                            setlocale(LC_TIME, 'id_ID.utf8');
                            $date = date_create($row['tanggal_pembukuan']);

                            ?>
                <tr>
                <td>
                <img src="<?=$baseoperator;?>/barang/<?=$row['foto']; ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                </td>
                <td><?= $row['nama_barang'] ?></td>          
                <td>Rp.<?= number_format($row['harga_satuan'], 0, ',', '.'); ?></td>
                <td><span class="badge bg-success"><?= $row['kondisi_barang'] ?></span></td>
                <td>
                 <a type="button" class="text-muted" href="<?= $row['id']; ?>" data-toggle="modal" data-target="#exampleModal<?= $row['id']; ?>" data-whatever="@fat"><i class="fas fa-eye"></i></a>

                  <div class="modal fade" id="exampleModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel"><?= $row['kategori'];?> [ <?= $row['kd_barang']; ?> ]</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <form>
                                <center><img src="<?=$baseoperator;?>/barang/<?=$row['foto']; ?>" class="img-fluid img-thumbnail rounded" width="400" heigth="400" alt="Responsive image"></center>
                                <div class="card-body">
                                  <h5 class="card-title text-lg"><?= $row['nama_barang'] ?></h5>
                                  <h5 class="card-title float-right text-bold text-lg">Rp.<?= number_format($row['harga_satuan'], 0, ',', '.'); ?></h5>
                              </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                            <!-- <button type="button" class="btn btn-primary">Send message</button> -->
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
                </tr>
                  <?php endforeach; ?>
                  </tbody>
                 </table>
                </div>
                </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-12">
              <div class="card card-default">
              <div class="card-header bg-danger">
                <h3 class="card-title">
                <i class="fas fa-chart-pie"></i>
                 Last Activity
                </h3>
                </div>
                  <div class="card-body">
                     <div class="timeline">
                            <div>
                            <?php $i = 1;
                            $rows = mysqli_query($koneksi, "SELECT * FROM log_akses ORDER BY id_log DESC LIMIT  5")
                            ?>
                            <?php foreach ($rows as $row) : ?>
                            <?php
                            setlocale(LC_TIME, 'id_ID.utf8');
                            $date = date_create($row['tanggal_log']);

                            ?>
                            <i class="fas fa-user bg-danger"></i>
                            <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> <?= date_format($date,'d/m/Y');?> , <?= date_format($date,'H:i:s');?></span>
                            <h3 class="timeline-header no-border "><a href="<?=$baseadmin;?>" class="text-dark"><?= $row['id_user'] ?></a> <?= $row['activity_log'] ?></h3>
                            </div>
                            </div>
                            <div>
                             <?php endforeach; ?>
                            </div>
                     </div>
                  </div>
                 </div>
          </div>

        </div>

        <div class="row">

          <!-- Kolom -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="card card-default">
              <div class="card-header bg-info">
                <h3 class="card-title">
                <i class="fas fa-chart-pie"></i>
                 Last Pengadaan
                </h3>
                </div>
                  <div class="card-body">
                     <div class="timeline">
                            <div>
                            <?php $i = 1;
                            $rows = mysqli_query($koneksi, "SELECT * FROM tbl_pengadaan ORDER BY id DESC LIMIT  3 ")
                            ?>
                            <?php foreach ($rows as $row) : ?>
                            <i class="fas fa-clock bg-info"></i>
                            <div class="timeline-item">
                            <span class="time"><i class="fas fa-user"> </i> <?= $row['komisi'];?></span>
                            <h3 class="timeline-header no-border "><a href="<?=$baseadmin;?>" class="text-dark"><span class="badge bg-info"><?= $row['id_Pengadaan'] ?></span>              
                            </a><br><p class="text-sm mt-2"><?= $row['keterangan_usulan'] ?></p></h3>
                            </div>
                            </div>
                            <div>
                             <?php endforeach; ?>
                            </div>
                     </div>
                  </div>
                 </div>
          </div>

          <div class="col-md-4 col-sm-6 col-12">

        <div class="card card-default">
          <div class="card-header bg-warning">
            <h3 class="card-title">
            <i class="fas fa-chart-pie"></i>
             Last Peminjaman
            </h3>
            </div>
              <div class="card-body">
                 <div class="timeline">
                        <div>
                        <?php $i = 1;
                        $rows = mysqli_query($koneksi, "SELECT * FROM tbl_peminjaman ORDER BY id DESC LIMIT 3 ")
                        ?>
                        <?php foreach ($rows as $row) : ?>
                        <?php
                        setlocale(LC_TIME, 'id_ID.utf8');
                        $date = date_create($row['tanggal_peminjaman']);

                        ?>
                        <i class="fas fa-cart bg-warning"></i>
                        <div class="timeline-item ">
            
                         <h3 class="timeline-header no-border text-lg"><span class="badge bg-warning"><?= $row['id_peminjaman'] ?></span></h3>
                        <span class="time"><i class="fas fa-clock"></i> <?= date_format($date,'d/m/Y');?> </span>
                        <h5 class="timeline-header no-border"><a href="<?=$baseadmin;?>" ><?= $row['nama_barang'] ?></a> <span class="text-sm text-bolder"><?= $row['nama_peminjam']; ?></span></h5>
                        </div>
                        </div>
                        <div>
                         <?php endforeach; ?>
                        </div>
                 </div>
              </div>
             </div>
          </div>

          <div class="col-md-4 col-sm-6 col-12">
              <div class="card card-default">
              <div class="card-header bg-secondary">
                <h3 class="card-title ">
                <i class="fas fa-chart-pie"></i>
                 Last Usulan Pengadaan
                </h3>
                </div>
                  <div class="card-body">
                     <div class="timeline">
                            <div>
                            <?php $i = 1;
                            $rows = mysqli_query($koneksi, "SELECT * FROM tbl_usulan_pengadaan WHERE status_usulan='pending' ORDER BY id_usulan DESC LIMIT  3 ")
                            ?>
                            <?php foreach ($rows as $row) : ?>
                            <i class="fas fa-clock "></i>
                            <div class="timeline-item">
                            <span class="time"><i class="fas fa-user"> </i> <?= $row['komisi'];?></span>
                            <h3 class="timeline-header no-border "><a href="<?=$baseadmin;?>" class="text-dark text-sm"><?= $row['nama_barang'] ?></a><br><p class="text-sm mt-2"><?= $row['keterangan_usulan'] ?></p></h3>
                            </div>
                            </div>
                            <div>
                             <?php endforeach; ?>
                            </div>
                     </div>
                  </div>
                 </div>
          </div>

        </div>
      </div>
    </section>

  </div>
  

<!-- Tutup Column Charts  Js -->
  <script type="text/javascript" src="../assets/plugins/chart.js/loader.js"></script>
  <script>
    google.charts.load("current", {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["kategori", "total", { role: "style" } ],
          ["Tanah", <?= $ja; ?>, "#4E73DF"],
          ["Tanaman", <?= $jb; ?>, "#1CC88A"],
          ["Gedung gereja",<?= $jc; ?>, "#FF8D29"],
          ["Rumah tinggal", <?= $jd; ?>, "#F24A72"],
          ["Bangunan Lain2", <?= $je; ?>, "#94B49F"],
          ["Peralatan Kantor Termasuk Laptop, Printer, dll", <?= $jf; ?>, "#8479E1"],
          ["Sound System, Alat Audio Visual", <?= $jg; ?>, "#816797"],
          ["Alat Olahraga & Kesehatan", <?= $jh; ?>, "#36B9CC"],
          ["Alat Sakramen Ibadah", <?= $jj; ?>, "#4E73DF"],
          ["Alat RT", <?= $ji; ?>, "#1CC88A"],
          ["Buku Bacaan Perpustakaan",<?= $jk; ?>, "#FF8D29"],
          ["Kendaraan Bermotor", <?= $jl; ?>, "#F24A72"],
          ["Perabot", <?= $jn; ?>, "#94B49F"],
          ["Hewan", <?= $jm; ?>, "#8479E1"],
          ["Sound System, Alat Audio Visual", <?= $jo; ?>, "#816797"],
          ["Barang Habis Pakai", <?= $jp; ?>, "#F6C23E"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                         { calc: "stringify",
                           sourceColumn: 1,
                           type: "string",
                           role: "annotation" },
                         2]);

        var options = {
          title: "",
          width: 500,
          height: 300,
          bar: {groupWidth: "70%"},
          legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
  </script>

<?php include 'templates/footer.php'; ?>