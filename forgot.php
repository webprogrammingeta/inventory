<?php 
include 'templates/header.php'; 
include 'config/base.php'; 
?>
<div class="login-box">
  
    <div class="card-body login-card-body mt-0">
      
      <p class="login-box-msg">Masukkan <b class="">Email</b> untuk melanjutkan </p>

      <?php if (isset($_GET['error'])) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Maaf<strong> Email</strong> Anda tidak terdaftar !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button><?php echo $_GET['error'];?>
      </div>
      <?php } ?>

      <form action="lupa_password.php" method="POST">
        <div class="input-group mb-3">
          <input type="email" name="email" id="email" class="form-control" placeholder="email" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" name="tambah" id="tambah" class="btn bg-navy color-palette btn-block">Kirim</button>
            <a class="btn bg-danger color-palette btn-block" href="<?= $base_url; ?>">Batal</a>
          </div>


          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>


<?php include 'templates/footerLogin.php';  ?>