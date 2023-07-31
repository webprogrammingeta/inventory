<?php include 'templates/header.php'; ?>

<?php 
      session_start();
      $id = $_SESSION['id'];
?>
<div class="login-box">
  
  <!-- /.login-logo -->
    <div class="card-body login-card-body mt-0">
      <!-- <p class="login-box-msg">Silahkan Massukan <b class="">Password</b> baru anda</p> -->
       <?php if (isset($_GET['success'])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Silahkan Buat<b class=""> Password </b> baru anda !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button><?php echo $_GET['success'];?>
      </div>
      <?php } ?>

      <form action="ubah.php" method="POST">
         <!-- <label for="password">Password Baru</label> -->
        <div class="input-group mb-3">
          <input type="text" name="password" id="password" class="form-control" placeholder="Password Baru" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
         
           <input type="hidden" name="idd" id="idd" value="<?= $id; ?>" class="form-control" placeholder="">
         
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" name="tambah" id="tambah" class="btn bg-navy color-palette btn-block">Ubah Password</button>
            <a class="btn bg-danger color-palette btn-block" href="index.php">Batal</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php include 'templates/footerLogin.php'; ?>