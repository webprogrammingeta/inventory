<?php 
include 'templates/header.php'; 
include 'config/base.php'; 

$conn = mysqli_connect("localhost", "root", "", "db_kalvarisarpas");
  
  if(isset($_POST["submit"])){
            $a = $_POST['nama'];
            $b = $_POST['kode'];
            $c = md5($_POST['pass']);
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
        }else{
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
            move_uploaded_file($tmpName, 'admin/img/' . $newImageName);
            $query = "INSERT INTO tbl_user VALUES('','$a','$b','$c','$i','$d','$e','$f','$g','$h','$newImageName')";
            mysqli_query($conn, $query);
            echo
            "
            
            <script>
              document.location.href = 'index.php?success_register';
            </script>
            ";
          }
        }
    }
?>
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-2"></div>

      <div class="col-md-8">
        <form method="POST" autocomplete="off" enctype="multipart/form-data">
          <h5 class="login-box-msg text-muted mb-2">Silahkan<b class="text-navy color-palette"> Daftar</b> untuk melanjutkan !</h5>
          <div class="card">
            <div class="card-body">
              <div class="row">
                 <div class="col-md-6 mb-3">
                            <h6>Nama Lengkap</h6>
                            <input type="text" class="form-control"  name="nama" id="nama" required="" autofocus="">
                          </div>

                            <input type="hidden" class="form-control" name="level" id="level" required="" value="peminjam">

                           <div class="col-md-6 mb-3">
                            <h6>Username</h6>
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

                          <div class="col-md-6 mb-3">
                            <h6>Foto</h6>
                            <input type="file" class="form-control" name="image" id="image" required="">
                          </div>
              </div>
                  <div class="card-footer">
                    <button type="submit" class="btn bg-navy color-palette btn-block" name="submit" id="simpan">Buat Akun</button>

                    <a href="<?= $base_url; ?>" class="float-right mt-2">sudah punya akun ? Login ! </a>
                  </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-2"></div>

    </div>
  </div>

<?php include 'templates/footerLogin.php'; ?>
