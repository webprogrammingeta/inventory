<?php

include 'templates/header.php';
?>
<!-- QUERY SIMPAN PAKAI GAMBAR -->
<?php

      $conn = mysqli_connect("localhost", "root", "", "db_kalvarisarpas");

      if(isset($_POST["submit"])){

            $a = $_POST['nama'];
            $b = $_POST['kode'];
            $c = md5($_POST['pass']);
            // $c = $_POST['pass'];
            $i = $_POST['email'];
            $d = $_POST['tmptlhr'];
            $e = $_POST['tgl'];
            $f = $_POST['telp'];
            $g = $_POST['almt'];
            $h = $_POST['level'];

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
            move_uploaded_file($tmpName, 'img/' . $newImageName);

            $query = "INSERT INTO tbl_user VALUES('','$a','$b','$c','$i','$d','$e','$f','$g','$h','$newImageName')";
            mysqli_query($conn, $query);
            echo
            "
            <script>
              document.location.href = 'user.php';
            </script>
            ";
          }
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
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <h1 class="card-title">Tabel Data User</h1>
                 
              <!-- Button trigger modal -->
                 <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#exampleModal">
                Tambah data
              <i class="fa fa-plus m-1"></i></button>

               <a href="cetak_user.php" type="button" class="btn bg-dark float-right mr-2 "  target="_blank">
                       <span class="text-light">Print Data User</span>
                   
              <i class="fas fa-print ml-1 text-light"></i></a>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                      <h3 class="modal-title " id="exampleModalLabel">Input Data User</h3>
                      <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body text-dark">
                      <div class="row">
                          <div class="col-md-6 mb-3">
                            <h6>Nama Lengkap</h6>
                            <input type="text" class="form-control"  name="nama" id="nama" required="" autofocus="">
                          </div>

                          <div class="col-md-6 mb-3">
                            <h6>Level</h6>
                            <select class="form-control" name="level" id="level">
                              <option value="admin">Ketua</option>
                              <option value="operator">Anggota</option>
                              <option value="user">User</option>
                            </select>
                          </div>

                           <div class="col-md-6 mb-3">
                            <h6>Kode User</h6>
                            <input type="text" class="form-control" name="kode" id="kode" required="">
                          </div>

                          <div class="col-md-6 mb-3">
                            <h6>Password</h6>
                            <input type="text" class="form-control" name="pass" id="pass" required="">
                          </div>

                          <div class="col-md-6 mb-3">
                            <h6>Email</h6>
                            <input type="email" class="form-control" name="email" id="email" required="">
                          </div>


                          <div class="col-md-6 mb-3">
                            <h6>Tempat Lahir</h6>
                            <input type="text" class="form-control" name="tmptlhr" id="tmptlhr" required="">
                          </div>

                          <div class="col-md-6 mb-3">
                            <h6>Tanggal Lahir</h6>
                            <input type="date" class="form-control" name="tgl" id="tgl" required="">
                          </div>

                          <div class="col-md-6 mb-3">
                            <h6>No Telepon</h6>
                            <input type="text" class="form-control" name="telp" id="telp" required="">
                          </div>

                          <div class="col-md-6 mb-3">
                            <h6>Alamat</h6>
                            <input type="text" class="form-control" name="almt" id="almt" required="">
                          </div>

                          <div class="col-md-4 mb-3">
                            <h6>Foto</h6>
                            <input type="file" class="form-control" name="image" id="image" required="">
                          </div>
                      </div>

                    </div>

                    <div class="modal-footer bg-dark ">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary" name="submit" id="simpan">Simpan</button>
                    </div>
                      </form>
                  </div>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body ">
                <table id="example1" class="table table-bordered table-striped  table-hover text-center table-secondary text-dark">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Nama User</th>
                    <th>Kode User</th>
                    <th>Level</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                    <!-- Jumlah 10 fields -->

                    <?php $i = 1;

                    $rows = mysqli_query($koneksi, "SELECT * FROM tbl_user ORDER BY id ASC")
                        ?>
              <?php foreach ($rows as $row) : ?>
                  <tr>
                   <td><?= $i++; ?></td>
                   <td><img src="img/<?= $row["foto"]; ?>" width="70" title="<?= $row['foto']; ?>"></td>
                   <td><?= $row['nama_lengkap'] ?></td>
                   <td><?= $row['kd_user'] ?></td>
                   <td><?= $row['level'] ?></td>
                   <td >
                       <a href="edit_user.php?id=<?= $row['id'] ?>" class="btn  text-primary btn-app-sm">
                          <i class="fas fa-edit"></i>
                        </a>  
                       <a href="hapus_user.php?id=<?= $row['id']; ?>" class="btn text-danger btn-app-sm" id="delete">
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

<!-- Simpan -->
<script type="text/javascript">
  $("#simpan").click(function(){
        var nama = $("#nama").val();
        var kode = $("#kode").val();
        var pass = $("#pass").val();
        var tmptlhr = $("#tmptlhr").val();
        var tgl = $("#tgl").val();
        var almt = $("#almt").val();
        var telp = $("#telp").val();
        var image = $("#image").val();
        if ( nama == ''|| kode == '' || pass == '' || tmptlhr == ''  || tgl == '' || almt == ''  || telp == '' || image == ''  ) {
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
<!-- Simpan -->

<!-- Hapus -->
  <script type="text/javascript">
      $('#delete').on('click',function(e){
        e.preventDefault();
          const href = $(this).attr('href')
           Swal.fire({
            title: 'Apakah anda yakin ?',
            text: ' ingin menghapus User ini',
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
             text: "Data User Berhasil dihapus",
             showConfirmButton: false,
             timer: 1200
          }).then(function(){ 
           
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
           
            });
        }
  </script>
<!-- Hapus -->

<?php include 'templates/footer.php'; ?>
