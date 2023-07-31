<?php 
  
include 'templates/header.php';
include '../config/base.php';

 ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Profile </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="text-dark">Master Data</a></li>
              <li class="breadcrumb-item active">My Profile </li>
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
        
      <div class="col-md">

      <div class="card card-dark card-outline">
        <div>
          <a href="ganti_password.php?id=<?= $_SESSION['id'] ?>" class="btn btn-app-sm text-sm text-dark float-right m-0">
                          <i class="fas fa-edit"></i> Ubah Password
                      </a> 
          <a href="edit_profile.php?id=<?= $_SESSION['id'] ?>" class="btn text-dark text-sm btn-app-sm float-right mr-0">    <i class="fas fa-edit"></i> Edit Profile
                      </a>
                      
        </div>
        
      <div class="card-body box-profile md-4">
        <div class="text-center">
      <img class="profile-user-img img-fluid img-circle" src="<?=$baseadmin;?>/img/<?= $_SESSION['foto']; ?>" alt="User profile picture">
      <h3 class="profile-username text-center"><?=$_SESSION['nama_lengkap'];?></h3>
      <p class="text-muted text-center"><?=$_SESSION['level'];?></p>
      </div>
        
      
      
      <ul class="list-group list-group-unbordered mb-3">

      </li>
      <!-- <li class="list-group-item">
      <b>ID :</b> <a class="float-right"><?= $_SESSION['id']; ?></a>
      </li> -->
      <li class="list-group-item">
      <b>Username :</b> 
      <a class="float-right text-secondary"><?= $_SESSION['kd_user']; ?></a>
      <li class="list-group-item">
      <b>Email :</b> 
      <a class="float-right text-secondary"><?= $_SESSION['email']; ?></a>
      </li>
      <li class="list-group-item">
        <?php setlocale(LC_TIME, 'id_ID.utf8');
          $date = date_create($_SESSION['tanggal_lahir']);
          ?>
      <b>Tempat Tanggal Lahir :</b> 
      <a class="float-right text-secondary"><?= $_SESSION['tempat_lahir']; ?>, <?= date_format($date,'d/m/Y');?></a>
      </li>
      <li class="list-group-item">
      <b>Alamat :</b> <a class="float-right text-secondary"><?= $_SESSION['alamat']; ?></a>
      </li>
      <li class="list-group-item">
      <b>No Telepon :</b> <a class="float-right text-secondary"><?= $_SESSION['no_telp']; ?></a>
      </li>
      
      </ul>
      <!-- <a href="" class="btn btn-primary btn-block"><b>Edit Profile</b></a> -->
      </div>

      </div>

        <?php if (isset($_GET['delete'])) : ?>
          <div class="flash-data" data-flashdata="<?= $_GET['delete']; ?>"></div>
        <?php endif; ?>

        <?php if (isset($_GET['update'])) : ?>
          <div class="flash-ubah" data-flashubah="<?= $_GET['update']; ?>"></div>
        <?php endif; ?>

        <?php if (isset($_GET['update_password'])) : ?>
          <div class="flash-pass" data-flashpass="<?= $_GET['updatepass']; ?>"></div>
        <?php endif; ?>

         <?php if (isset($_GET['gagal'])) : ?>
          <div class="flash-gagal" data-flashgagal="<?= $_GET['gagal']; ?>"></div>
        <?php endif; ?>

         <?php if (isset($_GET['gagal_password'])) : ?>
          <div class="flash-passerr" data-flashpasserr="<?= $_GET['gagal_password']; ?>"></div>
        <?php endif; ?>
          
          <!-- /.Isi Konten -->
         
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript" src="<?=$base_url;?>assets/plugins1/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?=$base_url;?>assets/plugins1/jquery-3.4.1.min.js"></script>

<!-- Simpan -->
<script type="text/javascript">
  $("#simpan").click(function(){
        var nama = $("#nama").val();
        var kode = $("#kode").val();
        var pass = $("#pass").val();
        var tmptlhr = $("#tmptlhr").val();
        var tgl = $("#tgl").val();
        var almt = $("#almt").val();
        var telp = $("#telp").val();
        var image = $("#image").val();
        if ( nama == ''|| kode == '' || pass == '' || tmptlhr == ''  || tgl == '' || almt == ''  || telp == '' || image == ''  ) {
            Swal.fire({
                title: " Peringatan",
                type: "warning",
                icon: "warning",
                text: "Data tidak boleh kosong !",
                showConfirmButton: false,
                timer: 1400
            });
        }else{
           Swal.fire({
            title: "Sukses", 
            text: 'Data '+ nama +' Berhasil Ditambahkan', 
            type: "success",
            icon: "success",
            showConfirmButton: false,
            timer: 3000
        })
      }
    })
</script>
<!-- Simpan -->

<!-- Hapus -->
  <script type="text/javascript">
      $('#delete').on('click',function(e){
        e.preventDefault();
          const href = $(this).attr('href')
           Swal.fire({
            title: 'Apakah anda yakin ?',
            text: ' ingin menghapus User ini',
            type: 'warning',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya , hapus',
          }).then((result) => {
            if (result.value) {
              document.location.href = href;
            }
        })
      });

      const flashdata = $('.flash-data').data('flashdata')
        if (flashdata) {
          Swal.fire({
             type: 'success',
             title: 'Sukses',
             text: "Data User Berhasil dihapus",
             showConfirmButton: false,
             timer: 1200
          }).then(function(){ 
            window.location.assign("<?=$baseoperator;?>/profile.php");
            });
        }

      const flashubah = $('.flash-ubah').data('flashubah')
        if (flashubah) {
          Swal.fire({
             type: 'success',
             title: 'Sukses',
             text: 'Profile Anda Berhasil diubah',
             showConfirmButton: true,
             // timer: 1200
          }).then(function(){ 
          
            });
        }

        const flashpass = $('.flash-pass').data('flashpass')
        if (flashpass) {
          Swal.fire({
             type: 'success',
              title: 'Password anda berhasil diubah !',
              width: 600,
              padding: '3em',
              color: '#716add',
              // showConfirmButton: false,
              background: '#fff url(<?=$base_url;?>/assets/img/trees.png)',
              backdrop: `
                rgba(0,0,123,0.4)
                url("<?=$base_url;?>/assets/img/nyan-cat.gif")
                left top
                no-repeat
              `,
            });
        }

      const flashgagal = $('.flash-gagal').data('flashgagal')
        if (flashgagal) {
          Swal.fire({
             type: 'error',
             title: 'Gagal',
             text: "Tidak ada data yang diubah !",
             showConfirmButton: false,
             // timer: 1400
          }).then(function(){ 
            // window.location.assign("http://localhost:8080/sarpas/admin/profile.php");
            });
        }

        const flashpasserr = $('.flash-passerr').data('flashpasserr')
        if (flashpasserr) {
          Swal.fire({
             type: 'error',
             title: 'Gagal',
             text: "Pasword Gagal diubah !",
             showConfirmButton: false,
             // timer: 1400
          }).then(function(){ 
            // window.location.assign("http://localhost:8080/sarpas/admin/profile.php");
            });
        }
  </script>
<!-- Hapus -->


  <?php include 'templates/footer.php'; ?>
