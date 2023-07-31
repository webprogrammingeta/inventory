<?php 

  include '../config/sessi.php';
  include '../config/base.php';

$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1); 

?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-light elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $baseadmin; ?>" class="brand-link">
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
                 <a href="<?= $baseadmin; ?>" class="nav-link <?= $page == 'index.php' ? 'active bg-light':'' ?>">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item 
          <?=  $page == 'barang.php' || $page == 'user.php' || $page == 'edit_user.php'|| $page == 'pengadaan.php'|| $page == 'peminjaman.php'|| $page == 'penghapusan.php'|| $page == 'pemeliharaan.php' ? 'menu-open':'' ?> ">
            <a href="#" class="nav-link <?= $page == 'barang.php' || $page == 'kategori.php' ? 'active bg-secondary':'' ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Master Data 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="barang.php" class="nav-link <?= $page == 'barang.php' ?  'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="user.php" class="nav-link <?= $page == 'user.php' || $page == 'edit_user.php' ?  'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pengadaan.php" class="nav-link <?= $page == 'pengadaan.php' ? 'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Pengadaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="peminjaman.php" class="nav-link <?= $page == 'peminjaman.php' ? 'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Peminjaman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="penghapusan.php" class="nav-link <?= $page == 'penghapusan.php' ? 'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Penghapusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pemeliharaan.php" class="nav-link <?= $page == 'pemeliharaan.php' ? 'active bg-light':'' ?>">
                  <i class="far fa-circle nav-icon" style="color: #25d0b4;"></i>
                  <p>Pemeliharaan</p>
                </a>
              </li>
            </ul>
          </li>
        </li>
          </li>
          <li class="nav-item">
                <a href="approval_usulan.php" class="nav-link <?= $page == 'approval_usulan.php' ? 'active bg-light text-bold':'' ?>">
                  <i class="fas fa fa-check nav-icon" ></i>
                    <p>
                      Approval Pengadaan
                       <?php 
                    $queryusulan = "SELECT id FROM tbl_usulan_pengadaan  where status_usulan = 'pending'";
                    $queryrun = mysqli_query($koneksi , $queryusulan);
                    $datausulan = mysqli_num_rows($queryrun);
                  ?>
                      <span class="badge badge-primary right rouded-circle"><?=$datausulan; ?></span>
                    </p>
                  </a>
          </li>
          <li class="nav-item">
                <a href="approval_hapus.php" class="nav-link <?= $page == 'approval_hapus.php' ? 'active bg-light text-bold':'' ?>">
                  <i class="fas fa fa-check nav-icon" ></i>
                    <p>
                      Approval Penghapusan
                        <?php 
                $queryusulanhapus = "SELECT id FROM tbl_usulan_penghapusan  where status_usulan_penghapusan = 'pending'";
                $queryrun = mysqli_query($koneksi , $queryusulanhapus);
                $datausulanhapus = mysqli_num_rows($queryrun);
              ?>
                      <span class="badge badge-danger right rouded-circle"><?=$datausulanhapus; ?></span>
                    </p>
                  </a>
          </li>
          <li class="nav-item">
                <a href="approval_pemeliharaan.php" class="nav-link <?= $page == 'approval_pemeliharaan.php' ? 'active bg-light text-bold':'' ?>">
                  <i class="fas fa fa-check nav-icon" ></i>
                    <p>
                      Approval Pemeliharaan 
                       <?php 
                    $queryusulanpemeliharaan = "SELECT id FROM tbl_usulan_pemeliharaan  where status_usulan = 'pending'";
                    $queryrun = mysqli_query($koneksi , $queryusulanpemeliharaan);
                    $datausulanpemeliharaan = mysqli_num_rows($queryrun);
                  ?>
                      <span class="badge badge-success right rouded-circle"><?=$datausulanpemeliharaan; ?></span>
                    </p>
                  </a>
          </li>
           <li class="nav-item">
                <a href="log.php" class="nav-link <?= $page == 'log.php' ? 'active bg-light':'' ?>">
                  <i class="fas far fa-history nav-icon"></i>
                  <p>Log Activity</p>
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
          
          <!-- <li class="nav-item">
                <a href="konfigurasi.php" class="nav-link <?= $page == 'konfigurasi.php' ? 'active bg-light text-bold':'' ?>">
                  <i class="nav-icon fas fa-compass fa-spin fa-6x fa-fw"></i>
              <p>
                Settings
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="logout.php" class="nav-link" id="#exampleModal" >
              <i class="nav-icon  fas fa-sign-in-alt" aria-hidden="true"></i>
              <p>Logout</p>
            </a>
          </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>