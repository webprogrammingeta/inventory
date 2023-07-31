
<?php include "templates/header.php"; ?>

<?php
$conn = mysqli_connect("localhost", "root", "", "db_kalvarisarpas");
// alert('Data barang berhasil ditambahkan !');
if (isset($_POST["submit"])) {
    $a = $_POST["namabrg"];
    $b = $_POST["namakategori"];
    $c = $_POST["kdkategori"];
    $d = $_POST["nourut"];
    $e = $_POST["tglpmbk"];
    $f = $_POST["merk"];
    $g = $_POST["satuan"];
    $h = $_POST["asal"];
    $i = $_POST["tglperolehan"];
    $j = $_POST["namakondisi"];
    $k = $_POST["jmlhbrg"];
    $l = $_POST["harga"];
    $m = $_POST["txttotal"];
    $n = $_POST["namalokasi"];
    $o = $_POST["namastatus"];
    $p = $_POST["lainnya"];

    if ($_FILES["image"]["error"] == 4) {
        echo "<script> alert('Gambar tidak boleh kosong !'); </script>";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ["jpg", "jpeg", "png"];
        $imageExtension = explode(".", $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo "
            <script>
              alert('yang anda upoad bukan gambar !');
            </script>
            ";
        } elseif ($fileSize > 1000000) {
            echo "
            <script>
              alert('gambar terlalu besar');
            </script>
            ";
        } else {
            $newImageName = uniqid();
            $newImageName .= "." . $imageExtension;
            move_uploaded_file($tmpName, "barang/" . $newImageName);
            $query = "INSERT INTO tbl_barang VALUES('','$a','$b','$c$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$newImageName')";
            mysqli_query($conn, $query);
            echo "
                <script>
                  document.location.href = 'barang.php';
                </script>
                ";
        }
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
            <h1 class="m-0">Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Barang</li>
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
                <h4 class="card-title">Table Data Barang</h4>

                <!-- <button type="button" class="btn btn-outline-dark float-right" data-toggle="modal" data-target="#exampleModal">
                Tambah data
              <i class="fa fa-plus m-1"></i></button> -->

               <!-- <button type="button" class="btn btn-success float-right mr-2" data-toggle="modal" data-target="">
                Import Excel
              <i class="fa fa-upload m-1"></i></button> -->

              <a href="cetak_barang.php" type="button" class="btn btn-dark float-right mr-2 "  target="_blank">
                       <span class="text-light">Print Data Barang</span>
              <i class="fas fa-print ml-1 text-light"></i></a>

              


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
                    <!-- <th>Kategori</th> -->
                    <th>Kode Barang</th>
                    <!-- <th>Tgl pembukuan</th> -->
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <!-- <th>Satuan</th> -->
                    <th>Asal Perolehan</th>
                    <th>Tgl perolehan</th>
                    <th>Kondisi</th>
                   <!--  <th>Harga satuan</th>
                    <th>Total</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Keterangan lainnya</th> -->

                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
    <?php
    $i = 1;
    $rows = mysqli_query($koneksi, "SELECT * FROM tbl_barang ORDER BY id DESC");
    ?>
              <?php foreach ($rows as $row): ?>
              <?php
              setlocale(LC_TIME, "id_ID.utf8");
              $date = date_create($row["tanggal_perolehan"]);
              ?>
                  <tr>
                   <td><?= $i++ ?></td>
                   <td><img src="<?= $baseoperator ?>/barang/<?= $row[
    "foto"
] ?>" width="70" title="<?= $row["foto"] ?>"></td>
                   <td><?= $row["nama_barang"] ?></td>
                   <!-- <td><?= $row["kategori"] ?></td> -->
                     <td width="200"><button class=" btn border-dark text-sm"><?= $row[
                         "kd_barang"
                     ] ?></button></td>
                   <!-- <td><?= $row["tanggal_pembukuan"] ?></td>  -->
                   <td><?= $row["keterangan"] ?></td>
                   <td><?= $row["jumlah_satuan"] ?> <?= $row["satuan"] ?></td>
                   <td><?= $row["asal_perolehan"] ?></td>
                   <!-- <td><?= $row["tanggal_perolehan"] ?></td>  -->
                   <td><?= date_format($date, "d/m/Y") ?></td> 
                   <!-- <td><?= date_format($date, "H:i:s") ?></td>  -->
                   <td><?= $row["kondisi_barang"] ?></td>
                   <!-- <td>Rp.<?= number_format(
                       $row["harga_satuan"],
                       0,
                       ",",
                       "."
                   ) ?></td>
                   <td>Rp.<?= number_format($row["total"], 0, ",", ".") ?></td>
                   <td><?= $row["lokasi"] ?></td>
                   <td><?= $row["status"] ?></td>
                   <td><?= $row["keterangan_lainnya"] ?></td> -->
                   <td>
                     <a type="button" class="text-muted" data-toggle="modal" data-target="#exampleModal<?= $row[
                         "id"
                     ] ?>" href="#exampleModal<?= $row[
    "id"
] ?>" data-whatever="@fat"><i class="fas fa-eye"></i></a>

                  
                    </td>
                  </tr>
                  <div class="modal fade" id="exampleModal<?= $row[
                      "id"
                  ] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-center text-muted" id="exampleModalLabel"><?= $row[
                                "kategori"
                            ] ?> [ <?= $row["kd_barang"] ?> ]</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <form class=" ">
                                <center><img src="<?= $baseoperator ?>/barang/<?= $row[
    "foto"
] ?>" class="img-fluid img-thumbnail rounded" width="400" heigth="400" alt="Responsive image"></center>
                               
                                 <div class="card-body">
                                   <h5 class="card-title text-lg text-dark"><?= $row[
                                       "nama_barang"
                                   ] ?></h5>
                                  <h5 class="card-title float-right text-bold text-lg text-dark mb-1">Rp.<?= number_format(
                                      $row["harga_satuan"],
                                      0,
                                      ",",
                                      "."
                                  ) ?></h5>
                                  <br>
                                 
                                 </div>

                              </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                          </div>
                        </div></div>
    <?php endforeach; ?>

      <?php if (isset($_GET["delete"])): ?>
            <div class="flash-data" data-flashdata="<?= $_GET[
                "delete"
            ] ?>"></div>
          <?php endif; ?>

          <?php if (isset($_GET["update"])): ?>
            <div class="flash-ubah" data-flashubah="<?= $_GET[
                "update"
            ] ?>"></div>
          <?php endif; ?>

           <?php if (isset($_GET["gagal"])): ?>
            <div class="flash-gagal" data-flashgagal="<?= $_GET[
                "gagal"
            ] ?>"></div>
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
<script src="<?= $base_url ?>assets/plugins1/jquery.mask.min.js"></script>
<script src="<?= $base_url ?>assets/plugins1/jquery-3.4.1.min.js"></script>

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
         <?php echo $a; ?>  
          function changeValue(id){  
            document.getElementById('kdkategori').value = kode[id].kode;
          };  
  </script>


  <!-- Simpan SweetAlert -->
<script type="text/javascript" src="<?= $base_url ?>assets/plugins1/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?= $base_url ?>assets/plugins1/jquery-3.4.1.min.js"></script>

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
          }).then(function(){ 
            // window.location.assign("http://localhost:8080/sarpas/admin/barang.php");
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
            // window.location.assign("http://localhost:8080/sarpas/admin/barang.php");
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
            window.location.assign("http://localhost:8080/sarpas/admin/barang.php");
            });
        }
  </script>
<!-- Hapus -->
<?php include "templates/footer.php"; ?>
