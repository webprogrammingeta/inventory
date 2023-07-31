<?php 

  include '../config/sessi.php';
  include '../config/base.php';

  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1); 
  $nama= $_SESSION['nama_lengkap'];

?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-light elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $baseuser; ?>" class="brand-link">
      <img src="<?= $base_url;?>/assets/img/Logo1.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">ALVARI SARPAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= $baseadmin; ?>/img/<?= $_SESSION['foto'];?>" class="profile-user-img img-circle elevation-2" style="
            border-radius: 100px;
            /*padding: 5px;*/
            width: 55px;
            height: 55px;
            /*border: 2px solid #25d0b4;*/
          ">
        </div>
        <div class="info">
          <a href="<?= $baseoperator; ?>" class="d-block text-bold"><?= $_SESSION['nama_lengkap'];?></a>
          <p class="text-success">online</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
                 <a href="<?= $baseuser; ?>" class="nav-link <?= $page == 'index.php' ? 'active bg-light':'' ?>">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item 
          <?=  $page == 'peminjaman.php' || $page == 'pengembalian.php' ? 'menu-open':'' ?> ">
            <a href="#" class="nav-link <?= $page == 'pengembalian.php' || $page == 'peminjaman.php' ? 'active bg-secondary':'' ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Master Data 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="peminjaman.php" class="nav-link <?= $page == 'peminjaman.php' ?  'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Peminjaman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pengembalian.php" class="nav-link <?= $page == 'pengembalian.php' ? 'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Pengembalian</p>
                </a>
              </li>
            </ul>
          </li>
        </li>
        <li class="nav-item">
               <a href="profile.php" class="nav-link <?= $page == 'profile.php' || $page == 'edit_profile.php'|| $page == 'ganti_password.php' ?  'active bg-light':'' ?>">
                  <i class="nav-icon fas fa-user "></i>
              <p>
                My Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link" id="#exampleModal">
              <i class="nav-icon  fas fa-sign-in-alt" aria-hidden="true"></i>
              <p>Logout</p>
            </a>
          </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>