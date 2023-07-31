<?php 
    
    include '../config/sessi.php';
    include '../config/base.php';
    
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1); 
?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-light elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $baseoperator; ?>" class="brand-link">
      <img src="<?= $base_url; ?>/assets/img/Logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                 <a href="<?= $baseoperator; ?>" class="nav-link <?= $page == 'index.php' ? 'active bg-light':'' ?>">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item 
          <?= $page == 'barang.php' || $page == 'edit_barang.php' || $page == 'kategori.php' || $page == 'edit_kategori.php' || $page == 'komisi.php' || $page == 'edit_komisi.php' || $page == 'merk.php' || $page == 'edit_merk.php' || $page == 'ruangan.php' || $page == 'edit_ruangan.php'|| $page == 'status.php' || $page == 'edit_status.php' || $page == 'kondisi.php' || $page == 'edit_kondisi.php' ? 'menu-open':'' ?> ">
            <a href="#" class="nav-link <?= $page == 'barang.php' || $page == 'kategori.php' ? 'active bg-secondary':'' ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Master Data 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="barang.php" class="nav-link <?= $page == 'barang.php' || $page == 'edit_barang.php' ? ' active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kategori.php" class="nav-link <?= $page == 'kategori.php' || $page == 'edit_kategori.php'  ? 'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="merk.php" class="nav-link <?= $page == 'merk.php' || $page == 'edit_merk.php'  ? 'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Merk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ruangan.php" class="nav-link <?= $page == 'ruangan.php' || $page == 'edit_ruangan.php'? 'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Ruangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="komisi.php" class="nav-link <?= $page == 'komisi.php' || $page == 'edit_komisi.php'  ? 'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Komisi</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="status.php" class="nav-link <?= $page == 'status.php' || $page == 'edit_status.php'  ? 'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Status</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kondisi.php" class="nav-link <?= $page == 'kondisi.php' || $page == 'edit_kondisi.php'  ? 'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Kondisi</p>
                </a>
              </li>
            </ul>
          </li>
        </li>
        <li class="nav-item">
                <a href="pengadaan.php" class="nav-link <?= $page == 'pengadaan.php' ? 'active bg-light text-bold':'' ?>">
                  <i class="nav-icon far fa-circle" style="color: #25d0b4;"></i>
              <p>
                Usulan Pengadaan
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="penghapusan.php" class="nav-link <?= $page == 'penghapusan.php' ? 'active bg-light text-bold':'' ?>">
                  <i class="nav-icon far fa-circle" style="color: #25d0b4;"></i>
              <p>
                Usulan Penghapusan
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="pemeliharaan.php" class="nav-link <?= $page == 'pemeliharaan.php' ? 'active bg-light text-bold':'' ?>">
                  <i class="nav-icon far fa-circle" style="color: #25d0b4;"></i>
              <p>
                Usulan Pemeliharaan
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="approval_peminjaman.php" class="nav-link <?= $page == 'approval_peminjaman.php' ? 'active bg-light text-bold':'' ?>">
                  <i class="nav-icon far fa-circle" style="color: #25d0b4;"></i>
              <p>
                 <?php 
              $querypengajuan = "SELECT status FROM tbl_pengajuan_peminjaman WHERE status = 'pending'";
              $queryrun = mysqli_query($koneksi , $querypengajuan);
              $datapengajuanpeminjam = mysqli_num_rows($queryrun);
            ?>

                Approval Peminjaman
                <span class="badge badge-dark right text-sm"><?=$datapengajuanpeminjam; ?></span>
              </p>
            </a>
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