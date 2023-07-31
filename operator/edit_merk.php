<?php

include 'templates/header.php';

$id = $_GET['id'];
$data = query("SELECT * FROM tbl_merk WHERE id = $id")[0];

if( isset($_POST["ubah"]) ) {
        // cek apakah data berhasil diubah atau tidak
        // alert('Data merk berhasil diubah!'); 
        if( ubahmerk($_POST) > 0 ) {
            echo "
                <script>
                    document.location.href = 'merk.php?update=1';
                </script>
            ";
        } else {
            echo "
                <script>
                    document.location.href = 'merk.php?gagal=1';
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
            <h1 class="m-0"> Edit merk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Edit Data</li>
              <li class="breadcrumb-item active">merk</li>
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
                <h3 class="card-title">Edit merk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                   
                    <!-- <label for="">Kode merk</label> -->
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $data['id'] ;?> ">

                    <div class="form-group">
                    <label for="">Nama merk</label>
                    <input type="text" class="form-control" name="nama" value="<?= $data['nama_merk'] ;?>" required="">
                  </div>

                  <button class="btn btn-success float-right ml-2" type="submit" name="ubah">Edit data</button>
                  <a class="btn btn-danger float-right " href="merk.php">Batal</a>
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
