
<?php
  
include 'templates/header.php';
  
?>

<?php

      $conn = mysqli_connect("localhost", "root", "", "db_kalvarisarpas");
                  // alert('Data barang berhasil ditambahkan !');
      if(isset($_POST["submit"])){

            $a = $_POST['namabrg'];
            $b = $_POST['namakategori'];
            $c = $_POST['kdkategori'];
            $d = $_POST['nourut'];
            $e = $_POST['tglpmbk'];
            $f = $_POST['merk'];
            $g = $_POST['satuan'];
            $h = $_POST['asal'];
            $i = $_POST['tglperolehan'];
            $j = $_POST['namakondisi'];
            $k = $_POST['jmlhbrg'];
            $l = $_POST['harga'];
            $m = $_POST['txttotal'];
            $n = $_POST['namalokasi'];
            $o = $_POST['namastatus'];
            $p = $_POST['lainnya'];
           
       if($_FILES["image"]["error"] == 4){
          echo
          "<script> alert('Gambar tidak boleh kosong !'); </script>"
          ;
        }
        else{
          $fileName = $_FILES["image"]["name"];
          $fileSize = $_FILES["image"]["size"];
          $tmpName = $_FILES["image"]["tmp_name"];

          $validImageExtension = ['jpg', 'jpeg', 'png'];
          $imageExtension = explode('.', $fileName);
          $imageExtension = strtolower(end($imageExtension));
          if ( !in_array($imageExtension, $validImageExtension) ){
            echo
            "
            <script>
              alert('yang anda upoad bukan gambar !');
            </script>
            ";
          }
          else if($fileSize > 1000000){
            echo
            "
            <script>
              alert('gambar terlalu besar');
            </script>
            ";
          }
          else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, 'barang/' . $newImageName);
            $query = "INSERT INTO tbl_barang VALUES('','$a','$b','$c$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$newImageName')";
                mysqli_query($conn, $query);
                echo
                "
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

                <button type="button" class="btn btn-outline-dark float-right" data-toggle="modal" data-target="#exampleModal">
                Tambah data
              <i class="fa fa-plus m-1"></i></button>

               <!-- <button type="button" class="btn btn-success float-right mr-2" data-toggle="modal" data-target="">
                Import Excel
              <i class="fa fa-upload m-1"></i></button> -->

              <a href="cetak_barang.php" type="button" class="btn btn-success float-right mr-2 "  target="_blank">
                       <span class="text-light">Print Data Barang</span>
              <i class="fas fa-print ml-1 text-light"></i></a>

              <!-- modals -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl ">
                <div class="modal-content">
                  <div class="modal-header bg-info text-white">
                    <h3 class="modal-title " id="exampleModalLabel">Input Data Barang</h3>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">


          <form class="needs-validation" name="Ftambah" method="POST" autocomplete="off" enctype="multipart/form-data">
            
            <div class="row">

              <div class="col-md-4 mb-3">
                <label class="input-group-text">Nama Barang</label>
                <input type="text" class="form-control" name="namabrg" id="namabrg" placeholder="" required="">
              </div>

              <div class="col-md-4 mb-3">
                <label for="Kategori" class="input-group-text">Kategori</label>
                <select name="namakategori" id="namakategori" class="form-control" onchange='changeValue(this.value)' required>  
                   <?php   
                             $con = mysqli_connect("localhost","root","","db_kalvarisarpas");
                             $query = mysqli_query($con, "select * from tbl_kategori order by nama_kategori esc");  
                              $result = mysqli_query($con, "select * from tbl_kategori");  
                              $a          = "var kode = new Array();\n;";  
                              while ($row = mysqli_fetch_array($result)) {  
                               echo '<option name="namakategori" value="'.$row['nama_kategori'] . '">' . $row['nama_kategori'] . '</option>';   
                          
                              $a.= "kode['" . $row['nama_kategori'] . "'] = {kode:'" . addslashes($row['kode_kategori'])."'};\n";  
                              }  
                              ?>  
                 </select>
            </div>

               <div class="col-md-4 mb-3">
                <label class="input-group-text">Kode Barang</label>
                <input type="text" class="form-control" name="kdkategori" id="kdkategori" value=""   readonly="">
              </div>

              
                  <div class="col-md-4 mb-3">
                <label class="input-group-text">
                No urut
              <small class="ml-2 text-danger">( * jika lebih dari 1 diisi  cth : 10 s/d 200 ) </small>
              </label>
                <input type="text" class="form-control" name="nourut" id="nourut" value="" required="">
              </div>

               <div class="col-md-4 mb-3">
                <label class="input-group-text">Tanggal Pembukuan</label>
                <div class="input-group">
                  <input type="date" class="form-control" name="tglpmbk" id="tglpmbk" placeholder="" required="">
                </div>
              </div>

               <div class="col-md-4 mb-3">
                <label class="input-group-text"> Keterangan  

                  <small class="ml-2 text-danger">( * Merk / Type ) </small>
                </label>
                <input type="text" class="form-control" name="merk" id="merk" placeholder="" value="" required="">
              </div>

              <div class="col-md-4 mb-3">
                <label class="input-group-text">Satuan</label>
                <select class="custom-select d-block w-100" name="satuan" id="satuan" required="">
                  <option value="buah">Buah</option>
                  <option value="meter">Meter</option>
                  <option value="unit">Unit</option>
                  <option value="bidang">Bidang</option>
                  <option value="set">Set</option>
                  <option value="paket">Paket</option>
                  <option value="meter">Meter</option>
                </select>
              </div>

            
              <div class="col-md-4 mb-3">
                <label class="input-group-text">Asal Perolehan</label>
                <select class="custom-select d-block w-100" name="asal" id="asal" required="">
                  <option value="APBJ">APBJ</option>
                  <option value="Hibah">Hibah</option>
                  <option value="Bantuan">Bantuan</option>
                  <option value="Konven">Konven</option>
                  <option value="sumbangan">Sumbangan</option>
                </select>
              </div>

              <div class="col-md-4 mb-3">
                <label class="input-group-text">Tanggal Perolehan</label>
                <div class="input-group">
                  <input type="date" class="form-control" name="tglperolehan" id="tglperolehan" placeholder="" required="">
                </div>
              </div>

              <div class="col-md-4 mb-3">
                  <label class="input-group-text">Kondisi Barang</label>
                  <select name="namakondisi" id="namakondisi" class="form-control" onchange='changeValue(this.value)' required>  
                     <?php   
                               $con = mysqli_connect("localhost","root","","db_kalvarisarpas");
                               $query = mysqli_query($con, "select * from tbl_kondisi order by nama_kondisi esc");  
                                $result = mysqli_query($con, "select * from tbl_kondisi");  
                                while ($row = mysqli_fetch_array($result)) {  
                                 echo '<option name="namakondisi" value="'.$row['nama_kondisi'] . '">' . $row['nama_kondisi'] . '</option>';   
                                }  
                                ?>  
                   </select>
              </div>

                <div class="col-md-4 mb-3">
                <label class="input-group-text">Jumlah satuan</label>
                <input type="number" name="jmlhbrg" id="jmlhbrg"  class="form-control" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" required="">
              </div>

               <div class="col-md-4 mb-3">
                <label class="input-group-text">Harga satuan</label>
                <input type="number" name="harga" id="harga"  class="form-control" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" required="">
              </div>

              <div class="col-md-4 mb-3">
                <label class="input-group-text">Total</label>
                <input type="number" name="txttotal" id="txttotal" value="" readonly="" class="form-control" required="" />
              </div> 

              <!--  <div class="col-md-4 mb-3">
                <label class="input-group-text">Total fix</label>
                <input type="hidden" name="ttlfix" id="ttlfix" value="" class="form-control" />
              </div> -->

               <div class="col-md-4 mb-3">
                <label for="Kategori" class="input-group-text">Lokasi</label>
                <select name="namalokasi" id="namalokasi" class="form-control" onchange='changeValue(this.value)' required>  
                   <?php   
                             $con = mysqli_connect("localhost","root","","db_kalvarisarpas");
                             $query = mysqli_query($con, "select * from tbl_ruangan order by nama_ruangan esc");  
                              $result = mysqli_query($con, "select * from tbl_ruangan");  
                              // $b          = "var koder = new Array();\n;";  
                              while ($row = mysqli_fetch_array($result)) {  
                               echo '<option name="namalokasi" value="'.$row['nama_ruangan'] . '">' . $row['nama_ruangan'] . '</option>';   
                              }  
                              ?>  
                 </select>
            </div>

            <div class="col-md-4 mb-3">
                <label for="Kategori" class="input-group-text">Status</label>
                <select name="namastatus" id="namastatus" class="form-control" onchange='changeValue(this.value)' required>  
                   <?php   
                             $con = mysqli_connect("localhost","root","","db_kalvarisarpas");
                             $query = mysqli_query($con, "select * from tb_status order by nama_status esc");  
                              $result = mysqli_query($con, "select * from tbl_status");  
                              // $c         = "var koder = new Array();\n;";  
                              while ($row = mysqli_fetch_array($result)) {  
                               echo '<option name="namastatus" value="'.$row['nama_status'] . '">' . $row['nama_status'] . '</option>';   
                              }  
                              ?>  
                 </select>
            </div>

            <div class="col-md-8 mb-3">
                <label class="input-group-text">Keterangan Lainnya</label>
              <textarea class="form-control" name="lainnya" id="lainnya" aria-label="Keterangan Lainnya" required=""></textarea>
            </div>
              

           <div class="col-md-4 mb-3">
            <label class="input-group-text">Foto</label>
            <div class="input-group">
              <input type="file" class="form-control" name="image" id="image" required="">
            </div>
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
                    <!-- <th>Kategori</th> -->
                    <th>Kode Barang</th>
                    <!-- <th>Tgl pembukuan</th> -->
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Asal Perolehan</th>
                    <th>Tgl perolehan</th>
                    <th>Kondisi</th>
                    <th>Harga satuan</th>
                    <th>Total</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Keterangan lainnya</th>

                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
    <?php $i = 1;
        $rows = mysqli_query($koneksi, "SELECT * FROM tbl_barang ORDER BY id DESC")?>
              <?php foreach ($rows as $row) : ?>
              <?php setlocale(LC_TIME, 'id_ID.utf8');
              $date = date_create($row['tanggal_perolehan']);?>
                  <tr>
                   <td><?= $i++; ?></td>
                   <td><img src="./barang/<?= $row["foto"]; ?>" width="100" height="100" title="<?= $row['foto']; ?>"></td>
                   <td><?= $row['nama_barang'] ?></td>
                   <!-- <td><?= $row['kategori'] ?></td> -->
                     <td width="200"><button class=" btn border-dark text-sm"><?= $row['kd_barang'] ?></button></td>
                   <!-- <td><?= $row['tanggal_pembukuan'];;?></td>  -->
                   <td><?= $row['keterangan'] ?></td>
                   <td><?= $row['jumlah_satuan'] ?></td>
                   <td><?= $row['satuan'] ?></td>
                   <td><?= $row['asal_perolehan'] ?></td>
                   <!-- <td><?= $row['tanggal_perolehan'];;?></td>  -->
                   <td><?= date_format($date,'d/m/Y');?></td> 
                   <!-- <td><?= date_format($date,'H:i:s');?></td>  -->
                   <td><?= $row['kondisi_barang'] ?></td>
                   <td>Rp.<?= number_format($row['harga_satuan'], 0, ',', '.'); ?></td>
                   <td>Rp.<?= number_format($row['total'], 0, ',', '.'); ?></td>
                   <td><?= $row['lokasi'] ?></td>
                   <td><?= $row['status'] ?></td>
                   <td><?= $row['keterangan_lainnya'] ?></td>
                   <td>
                      <a href="edit_barang.php?id=<?= $row['id'] ?>" class="btn  text-primary btn-app-sm">
                          <i class="fas fa-edit"></i>
                        </a> 
                       <a href="hapus_barang.php?id=<?= $row['id']; ?>" class="btn text-danger btn-app-sm" id="hapus">
                        <i class="fas fa-trash"></i> 
                      </a>
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
          function changeValue(id){  
            document.getElementById('kdkategori').value = kode[id].kode;
          };  
  </script>


  <!-- Simpan SweetAlert -->
<script type="text/javascript" src="<?= $base_url;?>assets/plugins1/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?= $base_url;?>assets/plugins1/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?= $base_url;?>assets/plugins1/jquery-3.3.1.min.js"></script>

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
            window.location.assign("http://localhost:8080/sarpas/operator/barang.php");
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
            window.location.assign("http://localhost:8080/sarpas/operator/barang.php");
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
            window.location.assign("http://localhost:8080/sarpas/operator/barang.php");
            });
        }
  </script>
<!-- Hapus -->
<?php include 'templates/footer.php'; ?>
