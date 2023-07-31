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
            <h1 class="m-0">Usulan Pemeliharaan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Usulan Pemeliharaan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- TABEL DATA USULAN PEMELIHARAAN -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <!-- TABEL BARANG -->
          <div class="col-12">
            <div class="card card-outline card-dark bg-dark">
              <div class="card-header bg-warning">
                <h3 class="card-title text-lg">Data Usulan Pemeliharaan</h3>

              <a href="#" type="button" class="btn btn-dark float-right mr-2 "  target="_blank">
                       <span class="text-light">Print Usulan Pemeliharaan</span>
              <i class="fas fa-print ml-1 text-light"></i></a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1"class="table table-bordered table-striped  table-hover text-center table-secondary text-dark">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>ID</th>
                    <!-- <th>Kode Barang</th> -->
                    <th>Nama Barang</th>
                    <th>Biaya</th>
                    <th>Waktu</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
            <?php $i = 1;
                $rows = mysqli_query($koneksi, "SELECT * FROM tbl_usulan_pemeliharaan WHERE status_usulan='pending' ORDER BY id DESC")?>
                      <?php foreach ($rows as $row) : ?>
                      <?php setlocale(LC_TIME, 'id_ID.utf8');
                      $date = date_create($row['tanggal_usulan']);?>
                          <tr>
                           <td><?= $i++; ?></td>
                           <td><img src="../operator/barang/<?= $row["gambar"]; ?>" width="70" title="<?= $row['gambar']; ?>"></td>
                           <td width="200"><button class=" btn border-dark text-sm"><?= $row['id_pemeliharaan'] ?></button></td>
                           <!-- <td><?= $row['kd_barang'] ?></td> -->
                           <td><?= $row['nama_barang'] ?></td>
                           <td>Rp <?= number_format($row['biaya'], 0, ',', '.'); ?></td>
                           <td><?= $row['interval'] ?> <?= $row['periode'] ?></td>
                           <td><?= date_format($date,'d/m/Y');?></td> 
                           <td><?= date_format($date,'H:i:s');?></td>
                           <td><?= $row['keterangan_pemeliharaan'] ?></td>
                           <td>
                             <a href="accept_usulan_pemeliharaan.php?id=<?= $row['id'] ?>" class="btn btn-success btn-app-sm mr-1 mb-3">
                              Konfirmasi ✓
                              </a>  
                              <a href="reject_usulan_pemeliharaan.php?id=<?= $row['id'] ?>" class="btn  btn-danger btn-app-sm mb-3">
                              Tolak ✕
                              </a>  
                          </td>
                          </tr>
            <?php endforeach; ?>

            <?php if (isset($_GET['delete'])) : ?>
          <div class="flash-data" data-flashdata="<?= $_GET['delete']; ?>"></div>
        <?php endif; ?>

        <?php if (isset($_GET['update'])) : ?>
          <div class="flash-ubah" data-flashubah="<?= $_GET['update']; ?>"></div>
        <?php endif; ?>

         <?php if (isset($_GET['gagal'])) : ?>
          <div class="flash-gagal" data-flashgagal="<?= $_GET['gagal']; ?>"></div>
        <?php endif; ?>
                          </tbody>
                        </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- TABEL BARANG -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
  <!-- TABEL DATA USULAN PEMELIHARAAN -->
          </div>
         
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
             text: "Data usulan pemeliharaan berhasil dikonfirmasi",
             showConfirmButton: false,
             timer: 1200
          }).then(function(){ 
            
            });
        }

      const flashubah = $('.flash-ubah').data('flashubah')
        if (flashubah) {
          Swal.fire({
             type: 'success',
             title: 'Sukses',
             text: "Data usulan pemeliharaan berhasil dikonfirmasi",
             showConfirmButton: false,
             timer: 1200
          }).then(function(){ 
            
            });
        }

      const flashgagal = $('.flash-gagal').data('flashgagal')
        if (flashgagal) {
          Swal.fire({
             type: 'success',
             title: 'Sukses',
             text: "Data usulan pemeliharaan berhasil ditolak",
             showConfirmButton: false,
             timer: 1400
          }).then(function(){ 
            
            });
        }
  </script>
<!-- Hapus -->

<?php include 'templates/footer.php'; ?>
