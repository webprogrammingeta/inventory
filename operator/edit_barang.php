<?php
   
include 'templates/header.php';

$id = $_GET['id'];
$data = query("SELECT * FROM tbl_barang WHERE id = $id")[0];

if( isset($_POST["ubah"]) ) {

        // cek apakah data berhasil diubah atau tidak
        if( ubahbarang($_POST) > 0 ) {
            echo "
                <script>
                    document.location.href = 'barang.php?update=1';
                </script>
            ";
        } else {
            echo "
                <script>
                    document.location.href = 'barang.php?gagal=1';
                </script>
            ";
        }
    } 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Edit Barang</li>
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

          <!-- Isi Konten -->

          <div class="container">
            <div class="card card-outline card-primary p-2">
          <form class="needs-validation" name="Ftambah" method="POST" autocomplete="off" enctype="multipart/form-data">
          
          
          <div class="col-md-4 mb-3">
            <h6>Gambar</h6>
            <img src="barang/<?= $data['foto']; ?>" class="img-thumbnail" width="200px" height="100">
             <input type="file" class="form-control ml-0" name="gambar" id="gambar">
             <!-- ID dan GambarLama disembunyikan -->
             <input type="hidden" name="gambarLama" id="gambarLama" value="<?= $data["foto"]; ?>">
            <input type="hidden" class="form-control" id="id" name="id" value="<?= $data['id'] ;?> ">
          </div>

          <div class="row">
            
            <div class="col-md-4 mb-3">
             <label class="input-group-text">Nama Barang</label>
                <input type="text" class="form-control" name="namabrg" id="namabrg" value="<?= $data['nama_barang'] ?>">
            </div>

          <div class="col-md-4 mb-3">
               <label for="Kategori" class="input-group-text">Kategori</label>
                <select name="namakategori" id="namakategori" class="form-control" onchange='changeValue(this.value)' required>  
                    <option value="<?= $data['kategori'] ;?>"><?= $data['kategori'] ;?></option>
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
                <input type="text" class="form-control" name="kdkategori" id="kdkategori" value="<?= $data['kd_barang'] ?>">
          </div>


          <div class="col-md-4 mb-3">
             <label class="input-group-text">Tanggal Pembukuan</label>
                <div class="input-group">
                  <input type="date" class="form-control" name="tglpmbk" id="tglpmbk" value="<?= $data['tanggal_pembukuan'] ?>">
                </div>
          </div>

          <div class="col-md-4 mb-3">
                 <label class="input-group-text"> Keterangan  
                  <small class="ml-2 text-danger">( * Merk / Type ) </small>
                </label>
                <input type="text" class="form-control" name="merk" id="merk" value="<?= $data['keterangan'] ?>">
          </div>

          <div class="col-md-4 mb-3">
              <label class="input-group-text">Satuan</label>
                <select class="custom-select d-block w-100" name="satuan" id="satuan" required="">
                  <option value="<?= $data['satuan'] ?>"><?= $data['satuan'] ?></option>
                  <option value="buah">Buah</option>
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
                  <option value="<?= $data['asal_perolehan'] ?>"><?= $data['asal_perolehan'] ?></option>
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
                  <input type="date" class="form-control" name="tglperolehan" id="tglperolehan" value="<?= $data['tanggal_perolehan'] ?>">
                </div>
          </div>

          <div class="col-md-4 mb-3">
             <label class="input-group-text">Kondisi Barang</label>
                  <select name="namakondisi" id="namakondisi" class="form-control" onchange='changeValue(this.value)' >
                    <option value="<?= $data['kondisi_barang'] ?>"> <?= $data['kondisi_barang'] ?></option>
                     <?php   
                               $con = mysqli_connect("localhost","root","","db_kalvarisarpas");
                               $query = mysqli_query($con, "select * from tbl_kondisi order by nama_kondisi desc");  
                                $result = mysqli_query($con, "select * from tbl_kondisi");  
                                while ($row = mysqli_fetch_array($result)) {  
                                 echo '<option name="namakondisi" value="'.$row['nama_kondisi'] . '">' . $row['nama_kondisi'] . '</option>';   
                                }  
                                ?>  
                   </select>
          </div>

           <div class="col-md-4 mb-3">
            <label class="input-group-text">Jumlah satuan</label>
                <input type="number" name="jmlhbrg" id="jmlhbrg"  class="form-control" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" value="<?= $data['jumlah_satuan'] ?>">
          </div>

          <div class="col-md-4 mb-3">
            <label class="input-group-text">Harga satuan</label>
                <input type="number" name="harga" id="harga"  class="form-control" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)"  value="<?= $data['harga_satuan'] ?>">
          </div>

           <div class="col-md-4 mb-3">
             <label class="input-group-text">Total</label>
                <input type="number" name="txttotal" id="txttotal" value="" readonly="" class="form-control" value="<?= $data['total'] ?>">
          </div>

          <div class="col-md-4 mb-3">
            <label for="Kategori" class="input-group-text">Lokasi</label>
                <select name="namalokasi" id="namalokasi" class="form-control" onchange='changeValue(this.value)' required>  
                        <option value="<?= $data['lokasi'] ;?>"><?= $data['lokasi'] ;?></option>
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
                    <option value="<?= $data['status'] ;?>"><?= $data['status'] ;?></option>
                   <?php   
                             $con = mysqli_connect("localhost","root","","db_kalvarisarpas");
                             $query = mysqli_query($con, "select * from tbl_status order by nama_status esc");  
                              $result = mysqli_query($con, "select * from tbl_status");  
                              // $c         = "var koder = new Array();\n;";  
                              while ($row = mysqli_fetch_array($result)) {  
                               echo '<option name="namastatus" value="'.$row['nama_status'] . '">' . $row['nama_status'] . '</option>';   
                              }  
                              ?>  
                 </select>
          </div>

          <div class="col-md-4 mb-3">
             <label class="input-group-text">Keterangan Lainnya</label>
              <textarea class="form-control" name="lainnya" id="lainnya" aria-label="Keterangan Lainnya"><?= $data['keterangan_lainnya']; ?></textarea>
          </div>

          <div class="col-md-12 mb-3">
            <button class="btn btn-success float-right ml-2" type="submit" name="ubah">Edit data</button>
                     <a class="btn btn-danger float-right " href="barang.php">Batal</a>
          </div>
         
        </div>

          
            </div>
          </div>
          
          <!-- /.Isi Konten -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </form>
    </section>
    <!-- /.content -->
  </div>

  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> -->
<script src="<?= $base_url; ?>assets/plugins1/jquery.mask.min.js"></script>
<script src="<?= $base_url; ?>assets/plugins1/jquery-3.4.1.min.js"></script>

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
<?php include 'templates/footer.php'; ?>