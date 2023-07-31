<?php include 'templates/header.php' ;?>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card bg-success color-palette">
    <div class="login-logo mt-4 mb-4 ">
    <img src="assets/img/logo11.png" width="250px" height="150px" class="img-circle">
  </div>
    <div class="card-body login-card-body mt-0">

       <?php if (isset($_GET['success'])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         Password Anda<b class=""> Berhasil </b> Diubah !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button><?php echo $_GET['success'];?>
      </div>
      <?php } ?>

      <?php if (isset($_GET['success_register'])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         Akun Anda<b class=""> Berhasil </b>Terdaftar !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button><?php echo $_GET['success_register'];?>
      </div>
      <?php } ?>

       <?php if (isset($_GET['error'])) { ?>
      <div class="alert alert-danger alert-dismissible fade show " role="alert">
         <p class="text-center"> Maaf  Username dan Password anda masukkan salah ! </p> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button><?php echo $_GET['error'];?>
      </div>
      <?php } ?>

      <p class="login-box-msg">Silahkan <b class="">Login</b> untuk melanjutkan </p>

      <form action="auth.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="username" id="username" class="form-control" placeholder="username" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <div class="input-group">
            <select class="custom-select mt-3 text-center" name="level" class="level" required="">
              <option value="">Masuk sebagai .....</option>
              <option value="admin">Ketua</option>
              <option value="operator">Anggota</option>
              <option value="peminjam">Peminjam</option>
            </select>
        </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" name="tambah" id="tambah" class="btn bg-navy color-palette btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1 mt-2">
        <a href="forgot.php" class="text-center">Lupa password ?</a>
        <a href="register.php" class="float-right">Buat akun !</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php include 'templates/footerLogin.php'; ?>