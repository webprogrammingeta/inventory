
<?php
  
include 'templates/header.php';
  
?>

<?php
      if(isset($_POST['submit'])){
            $a = $_POST['idpemeliharaan'];
            $b = $_POST['kdbrg'];
            $c = $_POST['nmbrg'];
            $d = $_POST['keterangan'];
            $e = $_POST['interval'];
            $f = $_POST['periode'];
            $g = $_POST['foto'];
            $h = $_POST['biaya'];
        $query = "INSERT INTO `tbl_usulan_pemeliharaan` (`id`,`id_pemeliharaan`,`kd_barang`,`nama_barang`,`keterangan_pemeliharaan`,`interval`,`periode`,`biaya`,`tanggal_usulan`,`gambar`,`status_usulan`)VALUES(NULL,'$a','$b','$c','$d','$e','$f','$h',CURRENT_TIMESTAMP,'$g','pending')";
        if(performQuery($query)){
           echo "<script>alert('Data Pemeliharaan berhasil diusulkan !');document.location='pemeliharaan.php'</script>";
        }else{
            echo "<script>alert('Data Pemeliharaan Gagal Diusulkan !.')'</script>";
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
            <h1 class="m-0">Usulan Pemeliharaan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Usulan Pemeliharaan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <!-- TABEL DATA PEMELIHARAAN -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <!-- TABEL BARANG -->
          <div class="col-12">
            <div class="card card-outline card-dark bg-dark">
              <div class="card-header bg-warning">
                <h3 class="card-title text-lg">Daftar Barang Rusak</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1"class="table table-bordered table-striped  table-hover text-center table-secondary text-dark">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Nama</th>
                    <th>Kode Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Kondisi</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
            <?php $i = 1;
                $rows = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE kondisi_barang = 'Rusak ringan' OR kondisi_barang = 'Rusak berat' ORDER BY id DESC")?>
                      <?php foreach ($rows as $row) : ?>
                          <tr>
                           <td><?= $i++; ?></td>
                           <td><img src="barang/<?= $row["foto"]; ?>" width="70" title="<?= $row['foto']; ?>"></td>
                           <td><?= $row['nama_barang'] ?></td>
                           <td width="200"><button class=" btn border-dark text-sm"><?= $row['kd_barang'] ?></button></td>
                           <td><?= $row['jumlah_satuan'] ?></td>
                           <td><?= $row['satuan'] ?></td>
                           <td><?= $row['kondisi_barang'] ?></td>
                           <td><?= $row['lokasi'] ?></td>
                           <td>
                             <!--  <a href="edit_barang.php?id=<?= $row['id'] ?>" class="btn  text-primary btn-app-sm">
                                  <i class="fas fa-edit"></i>
                                </a>  -->

                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal<?= $row['id']; ?>">
                                  <!-- Ajukan Pemeliharaan -->
                                <i class="fa fa-plus m-1"></i></button>
                                  <!-- modals -->
                                    <div class="modal fade" id="exampleModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl ">
                                              <div class="modal-content">
                                                <div class="modal-header bg-success text-white">
                                                  <h3 class="modal-title " id="exampleModalLabel">Input Data Usulan Pemeliharan</h3>
                                                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">

                                        <form class="needs-validation" name="Ftambah" method="POST" autocomplete="off" enctype="multipart/form-data">

                                          <!-- KODE UNIK PEMELIHARAAN -->
                                          <?php 

                                          date_default_timezone_set("Asia/Jakarta");
                                          $date = date("Ymd");
                                          $query = mysqli_query($koneksi, "SELECT max(id_pemeliharaan) as kodeTerbesar FROM tbl_usulan_pemeliharaan");
                                          $data = mysqli_fetch_array($query);
                                          $idpemeliharaan = $data['kodeTerbesar'];
                                          $urutan = (int) substr($idpemeliharaan, 11, 3);
                                          $urutan++;
                                          $huruf = "PM";
                                          $idusulanpemeliharaan = $huruf .$date. sprintf("%03s", $urutan); ?>
                                          <div class="row">

                                            <div class="col-md-4 mb-3">
                                              <label class="input-group-text">ID Pemeliharaan</label>
                                              <input type="text" class="form-control" name="idpemeliharaan" id="idpemeliharaan" placeholder="" readonly="" value="<?= $idusulanpemeliharaan; ?>">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                              <label class="input-group-text">Kode Barang</label>
                                              <input type="text" class="form-control" name="kdbrg" id="kdbrg" placeholder="" readonly="" value="<?= $row["kd_barang"]; ?>">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                              <label class="input-group-text">Nama Barang</label>
                                              <input type="text" class="form-control" name="nmbrg" id="nmbrg" placeholder="" readonly="" value="<?= $row["nama_barang"]; ?>">
                                            </div>


                                              <!-- <label class="input-group-text">Gambar</label> -->
                                              <input type="hidden" class="form-control" name="foto" id="foto" placeholder="" readonly="" value="<?= $row["foto"]; ?>">

                                            <div class="col-md-4 mb-3">
                                              <label class="input-group-text">Interval</label>
                                              <input type="number" class="form-control" name="interval" id="interval" placeholder="" required="">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                              <label class="input-group-text">Periode</label>
                                              <select class="custom-select d-block w-100" name="periode" id="periode" required="">
                                                <option value="hari">Hari</option>
                                                <option value="bulan">Bulan</option>
                                                <option value="tahun">Tahun</option>
                                              </select>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                              <label class="input-group-text">Biaya Perawatan</label>
                                              <input type="number" class="form-control" name="biaya" id="biaya" placeholder="" required="">
                                            </div>

                                          <div class="col-md-12 mb-3">
                                              <label class="input-group-text">Keterangan</label>
                                            <textarea class="form-control" name="keterangan" id="keterangan" aria-label="Keterangan Lainnya" required=""></textarea>
                                          </div>
                                       
                                        </div>
                                      <div class="modal-footer bg-dark">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" id="simpan" name="tambah" class="btn btn-primary">Simpan</button>
                                      </div>
                                       </div>
                                      </div>
                                     </form>
                                    </div>
                                    </div>
                                  <!-- modals -->
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
          </div>
          <!-- TABEL BARANG -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
  <!-- TABEL DATA PEMELIHARAAN -->

  <!-- TABEL DATA USULAN PEMELIHARAAN -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <!-- TABEL BARANG -->
          <div class="col-12">
            <div class="card card-outline card-dark bg-dark">
              <div class="card-header bg-success">
                <h3 class="card-title text-lg">Data Usulan Pemeliharaan</h3>

              <a href="cetak_usulan_pemeliharaan.php" type="button" class="btn btn-dark float-right mr-2 "  target="_blank">
                       <span class="text-light">Print Usulan Pemeliharaan</span>
              <i class="fas fa-print ml-1 text-light"></i></a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"class="table table-bordered table-striped  table-hover text-center table-secondary text-dark">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>ID</th>
                    <!-- <th>Kode Barang</th> -->
                    <th>Nama Barang</th>
                    <th>Waktu</th><!-- 
                    <th>Tanggal</th>
                    <th>Jam</th> -->
                    <th>Biaya</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
            <?php $i = 1;
                $rows = mysqli_query($koneksi, "SELECT * FROM tbl_usulan_pemeliharaan ORDER BY id DESC")?>
                      <?php foreach ($rows as $row) : ?>
                      <?php setlocale(LC_TIME, 'id_ID.utf8');
                      $date = date_create($row['tanggal_usulan']);?>
                          <tr>
                           <td><?= $i++; ?></td>
                           <td><img src="barang/<?= $row["gambar"]; ?>" width="70" title="<?= $row['gambar']; ?>"></td>
                           <td width="200"><button class=" btn border-dark text-sm"><?= $row['id_pemeliharaan'] ?></button></td>
                           <!-- <td><?= $row['kd_barang'] ?></td> -->
                           <td><?= $row['nama_barang'] ?></td>
                           <td><?= $row['interval'] ?> <?= $row['periode'] ?></td><!-- 
                           <td><?= date_format($date,'d/m/Y');?></td> 
                           <td><?= date_format($date,'H:i:s');?></td> -->
                           <td>Rp <?= number_format($row['biaya'], 0, ',', '.'); ?></td>
                           <td><?= $row['keterangan_pemeliharaan'] ?></td>
                           <td><?= $row['status_usulan'] ?></td>
                          </tr>
            <?php endforeach; ?>
                          </tbody>
                        </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- TABEL BARANG -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
  <!-- TABEL DATA USULAN PEMELIHARAAN -->

  </div>

<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> -->
<script src="assets/plugins1/jquery.mask.min.js"></script>
<script src="assets/plugins1/jquery-3.4.1.min.js"></script>

  <!-- Simpan SweetAlert -->
<script type="text/javascript" src="<?= $base_url; ?>assets/plugins1/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?= $base_url; ?>assets/plugins1/jquery-3.4.1.min.js"></script>

  <script type="text/javascript">
  $("#simpan").click(function(){
        var nama = $("#namabrg").val();
        var kategori = $("#namakategori").val();
        var kode = $("#kdkategori").val();
        var nourut = $("#nourut").val();
        var tglpmb = $("#tglpmbk").val();
        var merk = $("#merk").val();
        var satuan = $("#satuan").val();
        var asal = $("#asal").val();
        var tglperoleh = $("#tglperolehan").val();
        var kondisi = $("#namakondisi").val();
        var jumlah = $("#jmlhbrg").val();
        var harga = $("#harga").val();
        var total = $("#txttotal").val();
        var lokasi = $("#namalokasi").val();
        var status = $("#namastatus").val();
        var keterangan = $("#lainnya").val();
        var gambar = $("#gambar").val();
        if ( nama == ''|| kategori == '' || kode == '' || nourut == ''  || tglpmbk == '' || merk == ''  || satuan == '' || asal == '' || tglperolehan == '' || kondisi == '' || jumlah == '' || harga == ''|| total == '' || lokasi == '' || status == '' || keterangan == '' || gambar == '' ) {
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


<!-- Hapus -->
  <script type="text/javascript">
      $('#hapus').on('click',function(e){
        e.preventDefault();
          const href = $(this).attr('href')
           Swal.fire({
            title: 'Apakah anda yakin ?',
            text: ' ingin menghapus barang ini',
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
             text: "Data barang Berhasil dihapus",
             showConfirmButton: false,
             timer: 1500
          }).then(function(){ 
            window.location.assign("http://localhost:8080/sarpas/operator/pemeliharaan.php");
            });
        }

      const flashubah = $('.flash-ubah').data('flashubah')
        if (flashubah) {
          Swal.fire({
             type: 'success',
             title: 'Sukses',
             text: 'Data Berhasil diubah',
             showConfirmButton: false,
             timer: 1500
          }).then(function(){ 
            window.location.assign("http://localhost:8080/sarpas/operator/pemeliharaan.php");
            });
        }

      const flashgagal = $('.flash-gagal').data('flashgagal')
        if (flashgagal) {
          Swal.fire({
             type: 'error',
             title: 'Gagal',
             text: "Tidak ada data yang diubah !",
             showConfirmButton: false,
             timer: 1500
          }).then(function(){ 
            window.location.assign("http://localhost:8080/sarpas/operator/pemeliharaan.php");
            });
        }
  </script>
<!-- Hapus -->
<?php include 'templates/footer.php'; ?>
