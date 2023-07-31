<?php
include 'templates/header.php';
include '../config/base.php';

$id = $_GET['id'];
$data = query("SELECT * FROM tbl_user WHERE id = $id")[0];

if( isset($_POST["ubah"]) ) {

        // cek apakah data berhasil diubah atau tidak
        if( ubahuser($_POST) > 0 ) {
            echo "
                <script>
                    document.location.href = 'profile.php?update=1';
                </script>
            ";
        } else {
            echo "
                <script>
                    document.location.href = 'profile.php?gagal=1';
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
            <h1 class="m-0"> Edit Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Edit Data</li>
              <li class="breadcrumb-item active">Profile</li>
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
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                     <div class="row">
                       <!-- ID dan GambarLama disembunyikan -->
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $data['id'] ;?> ">
                  <!-- level disni -->
                   <input type="hidden" class="form-control" id="level" name="level" value="<?= $data['level'] ;?> ">

                     <input type="hidden" class="form-control" id="pass" name="pass" value="<?= $data['password'] ;?> ">
                          <div class="col-md-6 mb-3">
                            <h6>Nama Lengkap</h6>
                            <input type="text" class="form-control"  name="nama" id="nama" value="<?= $data['nama_lengkap'] ;?>">
                          </div>

                           <div class="col-md-6 mb-3">
                            <h6>Username</h6>
                            <input type="text" class="form-control" name="kode" id="kode" value="<?= $data['kd_user'] ;?>">
                          </div>


                          <div class="col-md-6 mb-3">
                            <h6>Email</h6>
                            <input type="email" class="form-control" name="email" id="email" value="<?= $data['email'] ;?>">
                          </div>


                          <div class="col-md-6 mb-3">
                            <h6>Tempat Lahir</h6>
                            <input type="text" class="form-control" name="tmptlhr" id="tmptlhr" value="<?= $data['tempat_lahir']; ?>">
                          </div>

                          <div class="col-md-6 mb-3">
                            <h6>Tanggal Lahir</h6>
                            <input type="date" class="form-control" name="tgl" id="tgl" value="<?= $data['tanggal_lahir']; ?>">
                          </div>

                          <div class="col-md-6 mb-3">
                            <h6>No Telepon</h6>
                            <input type="text" class="form-control" name="telp" id="telp" value="<?= $data['no_telp']; ?>">
                          </div>

                          <div class="col-md-6 mb-3">
                            <h6>Alamat</h6>
                            <input type="text" class="form-control" name="almt" id="almt" value="<?= $data['alamat']; ?>">
                          </div>

                          <div class="col-md-4 mb-3">
                            <h6>Foto</h6>
                            
                            <input type="file" class="form-control ml-0" name="gambar" id="gambar">
                          </div>

                             <input type="hidden" name="gambarLama" id="gambarLama" value="<?= $data["foto"]; ?>">

                            <img src="<?= $baseadmin; ?>/img/<?= $data['foto']; ?>" class="img-thumbnail" width="80px" height="80px" align="float-right">

                      </div>

                                 <button class="btn btn-success float-right ml-2" type="submit" name="ubah">Edit data</button>
                                 <a class="btn btn-danger float-right " href="profile.php">Batal</a>
                    </div>
                  </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
          <!-- /.Isi Konten -->
         
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include 'templates/footer.php'; ?>
