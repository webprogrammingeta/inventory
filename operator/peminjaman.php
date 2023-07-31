
<?php
  
include 'templates/header.php';
  

  $kode = ("P");
  $qry = mysqli_query($koneksi,"SELECT max(id_pengajuan) AS kodebaru FROM tbl_pengajuan_peminjaman WHERE id_pengajuan LIKE '$kode%'");
  $dt = mysqli_fetch_array($qry);
  $ambil = $dt['kodebaru'];
  $no = substr($ambil, 1, 3);
  $urut = $no + 1;
  $idpengajuan = $kode . sprintf("%03s", $urut);
?>

<!-- Query Simpan -->
<?php 
     if(isset($_POST['submit'])){
        $a = $_POST['idpeminjaman'];
        $b = $_POST['kdkategori'];
        $c = $_POST['namabarang'];
        $d = $_POST['hrgbrg'];
        $e = $_POST['ketpeng'];
        // $f = $_POST['telp'];
        $query = "INSERT INTO `tbl_pengajuan_peminjaman` (`id`,`id_pengajuan`,`kd_barang`,`nama_barang`,`harga`,`keterangan_peminjaman`)VALUES(NULL,'$a','$b','$c','$d','$e')";
        if(performQuery($query)){
            // echo "<script>alert('Data berhasil disimpan.')'</script>";
            echo "<script>document.location='pengadaan.php'</script>";
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
    <!-- INPUT DATA BARANG -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <!-- INPUT DATA BARANG -->


        <!--  TUTUP INPUT DATA BARANG -->

          <!-- TABEL BARANG -->
          <div class="col-12">
            <div class="card card-outline card-dark bg-dark">
              <div class="card-header bg-warning">
                <h4 class="card-title">Tabel Data Barang</h4>

                <button type="button" class="btn btn-outline-dark float-right" data-toggle="modal" data-target="#exampleModal">
                Input Data Pengajuan Peminjaman
              <i class="fa fa-plus m-1"></i></button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl ">
                <div class="modal-content">
                  <div class="modal-header bg-info text-white">
                    <h3 class="modal-title " id="exampleModalLabel">Form Input Data Peminjaman</h3>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">


          <form class="needs-validation" name="Ftambah" method="POST" autocomplete="off" enctype="multipart/form-data">
            
            <div class="row">

              <div class="col-md-4 mb-3">
                <label class="input-group-text">Id Pengajuan</label>
                <input type="text" class="form-control" name="idpeminjaman" id="idpeminjaman" value="<?= $idpengajuan; ?>" placeholder="" readonly="" required="">
              </div>


              <div class="col-md-4 mb-3">
                <label for="Kategori" class="input-group-text">Kode Barang
                    <small class="ml-2 text-danger">( * pilih salah satu barang ) </small>
                </label>
                <select name="namabarang" id="namabarang" class="form-control" onchange='changeValue(this.value)' required>  
                   <?php   
                             $con = mysqli_connect("localhost","root","","db_kalvarisarpas");
                             $query = mysqli_query($con, "select * from tbl_barang order by nama_barang dsc");  
                              $result = mysqli_query($con, "select * from tbl_barang");  
                              $a          = "var kode = new Array();\n;";  
                              $b          = "var kodea = new Array();\n;";  
                              while ($row = mysqli_fetch_array($result)) {  
                               echo '<option name="namabarang" value="'.$row['kd_barang'] . '">' . $row['kd_barang'] . '</option>';   
                          
                              $a.= "kode['" . $row['kd_barang'] . "'] = {kode:'" . addslashes($row['nama_barang'])."'};\n";  
                               $b.= "kodea['" . $row['kd_barang'] . "'] = {kodea:'" . addslashes(number_format($row['harga_satuan'], 0, ',', '.'))."'};\n"; 
                              }  
                              ?>  
                 </select>

            </div>
               <div class="col-md-4 mb-3">
                <label class="input-group-text">Nama Barang</label>
                <input type="text" class="form-control" name="kdkategori" id="kdkategori" value=""   readonly="" required="">
              </div>
              
              <div class="col-md-4 mb-3">
                <label class="input-group-text">
                Harga Barang
              </label>
                <input type="text" class="form-control" name="hrgbrg" id="hrgbrg" value="" readonly="" required="">
              </div>
               <div class="col-md-4 mb-3">
                <label class="input-group-text">
                Keterangan Peminjaman
              </label>
                <input type="text" class="form-control" name="ketpeng" id="ketpeng" value="" required="">
              </div>
            </div>
                  <div class="modal-footer bg-dark ">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" id="simpan" name="tambah" class="btn btn-primary">Simpan</button>
                  </div>
                   </div>
                  </div>
                 </form>
                </div>
              </div>
              <!-- modals -->


              <!-- Toast -->

              <!-- Toast -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1"class="table table-bordered table-striped  table-hover text-center table-secondary text-dark">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Kode Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <!-- <th>Aksi</th> -->
                  </tr>
                  </thead>
                  <tbody>
    <?php $i = 1;
        $rows = mysqli_query($koneksi, "SELECT * FROM tbl_barang ORDER BY id ASC")?>
              <?php foreach ($rows as $row) : ?>
                  <tr>
                   <td><?= $i++; ?></td>
                   <td><img src="barang/<?= $row["foto"]; ?>" width="70" title="<?= $row['foto']; ?>"></td>
                   <td><?= $row['nama_barang'] ?></td>
                   <td><?= $row['kategori'] ?></td>
                   <td class=""><button class="btn btn-dark"><?= $row['kd_barang'] ?></button></td>
                   <td><?= $row['jumlah_satuan'] ?></td>
                   <td>Rp.<?= number_format($row['harga_satuan'], 0, ',', '.'); ?></td>
                   <td><?= $row['lokasi'] ?></td>
                   <td><?= $row['status'] ?></td>
                  <!--  <td>
                      <a href="edit_barang.php?id=<?= $row['id'] ?>" class="btn  text-primary btn-app-sm">
                          <i class="fas fa-edit"></i>
                        </a> 
                       <a href="hapus_barang.php?id=<?= $row['id']; ?>" class="btn text-danger btn-app-sm" id="hapus">
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
          </div>
          <!-- TABEL BARANG -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> -->
<script src="assets/plugins1/jquery.mask.min.js"></script>
<script src="assets/plugins1/jquery-3.4.1.min.js"></script>

<script type="text/javascript" language="Javascript">

  // dapatkan jumlah barang
  jumlah = document.Ftambah.jmlhbrg.value;
   document.Ftambah.txttotal.value = jumlah;

  // dapatkan harga barang
   hargabarang = document.Ftambah.harga.value;
   document.Ftambah.txttotal.value = hargabarang;

   // dapatkan harga format rupiah
   format = document.Ftambah.ttlfix.value;
   document.Ftambah.txttotal.value = format;

   function OnChange(value){
     hargabarang = document.Ftambah.harga.value;
     jumlah = document.Ftambah.jmlhbrg.value;
    
     total = hargabarang * jumlah;
     var a = document.Ftambah.txttotal.value = total
     var b = document.Ftambah.ttlfix.value = total;
   
   }

    
 </script>

  <script>
         <?php  echo $a; ?>  
         <?php  echo $b; ?>  
          function changeValue(id){  
            document.getElementById('kdkategori').value = kode[id].kode;
            document.getElementById('hrgbrg').value = kodea[id].kodea;
          };  
  </script>


  <!-- Simpan SweetAlert -->
<script type="text/javascript" src="<?= $base_url; ?>assets/plugins1/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?= $base_url; ?>assets/plugins1/jquery-3.4.1.min.js"></script>

  <script type="text/javascript">
  $("#simpan").click(function(){
        var id = $("#idusul").val();
        var nama = $("#namabarang").val();
        var kategori = $("#kdkategori").val();
        var harga = $("#hrgbrg").val();
        if ( id == ''|| nama == '' || kategori == '' || harga == '' ) {
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
             timer: 1200
          }).then(function(){ 
            window.location.assign("http://localhost:8080/sarpas/operator/peminjaman.php");
            });
        }

      const flashubah = $('.flash-ubah').data('flashubah')
        if (flashubah) {
          Swal.fire({
             type: 'success',
             title: 'Sukses',
             text: 'Data Berhasil diubah',
             showConfirmButton: false,
             timer: 1200
          }).then(function(){ 
            window.location.assign("http://localhost:8080/sarpas/operator/peminjaman.php");
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
            window.location.assign("http://localhost:8080/sarpas/operator/peminjaman.php");
            });
        }
  </script>
<!-- Hapus -->
<?php include 'templates/footer.php'; ?>
