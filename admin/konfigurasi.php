<?php
  include 'templates/header.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Konfigurasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Konfigurasi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
       <section class="content">
            <div class="container-fluid">
               <section class="content">
                 <div class="row">
                    <div class="col-md-6">
                      <div class="card card-success">
                        <div class="card-header">
                          <h3 class="card-title">Informasi Aplikasi</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <center>
                                    <h3>Gereja GMIT KALVARI MAUMERE</h3>
                                    <h5>Jln. Pos no. 2 Maumere | Telp.(0382)21498</h5>
                                    <br >
                                    <hr>
                                    <div class="form-group">
                                        <label>Logo (Print):</label>
                                        <img id="img-upload" class="img-responsive" width="200px" src="<?=$base_url; ?>/assets/img/AdminLTELogo.png" /> 
                                    </div>
                                    <div class="form-group">
                                        <label>Logo Web:</label>
                                        <img id="img-upload-2" class="img-responsive" width="100px" src="<?=$base_url; ?>/assets/img/logo.jpg" />
                                    </div>
                                </center>
                        </div>
                        <!-- /.card-body -->
                      </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit informasi aplikasi</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                 <div class="form-group">
                          <label class="">Nama Gereja</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                              </div>
                              <input type="text" class="form-control" name="nama" value="">
                          </div>  
                      </div>
                      <div class="form-group">
                          <label class="">Alamat Gereja</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                              </div>
                              <input type="text" class="form-control" name="alamat" value="">
                          </div>  
                      </div>
                      <div class="form-group">
                          <label class="">No. Telepon</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                              </div>
                              <input type="text" class="form-control" name="notelp" value="">
                          </div>  
                      </div>
                      <div class="form-group">
                          <label class="">Nama Web</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                              </div>
                              <input type="text" class="form-control" name="nama_web" value="">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="">Upload Gambar (File Print)</label>
                          <!-- <img id="img-upload" class="img-responsive" />   -->
                          <div class="btn btn-default btn-file btn-block">
                              Pilih file .... <input type="file" id="imgInp" name="print" accept="image/*">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="">Upload Gambar (Logo Web)</label>
                          <!-- <img id="img-upload-2" class="img-responsive" />   -->
                          <div class="btn btn-default btn-file btn-block">
                              Pilih file .... <input type="file" id="imgInp-2" name="logo" accept="image/*">
                          </div>
                      </div>
                       <button class="btn btn-primary btn-block" type="submit" name="edit">Simpan</button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                </div>
                </section>
            </div>
        </section>
      </div>
  </div>
<?php include 'templates/footer.php'; ?>
