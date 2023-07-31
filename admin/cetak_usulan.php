<?php 

  session_start();
  include '../config/koneksi.php';
  include '../config/base.php';

  $tglcetak = date("d F Y");
  $id=date("Y")-1;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>KALVARI | SARPAS</title>

     <style type="text/css">
      *{
      /*  font-family: Calibri;*/
      color: black;
      }
    h6{
      color: black;
    }
    button{
      color: white;

    }
    b center{
      color: black;

    }
    hr{
      color: black;
    }

    </style>
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon.png">
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../assets/css/sbadmin2.css" rel="stylesheet">
  </head>
  <body id="page-top" class="" onload="print()" >
    <!-- Page Wrapper -->
    <div id="wrapper">

       <div class="card-body">
        <div class="panel panel-flat">
          <div class="panel-body">
              
              <table align="center">
                <td><img src="https://upload.wikimedia.org/wikipedia/commons/5/58/Logo_Gereja_Masehi_Injili_di_Timor.jpg" alt="logo" width="50px" align="left" style="margin-right: 20px; "></td>
                <td align="center"><b style="font-size: 14px;"> LAPORAN DATA USULAN PENGADAAN <br>
                 <CENTER> GMIT KALVARI MAUMERE <br>TAHUN <?= $id; ?> - <?=date("Y"); ?></CENTER>
                 </td>
               
                </b>
              </table>
              <!--  -->
              <hr style="border: 1px solid black; ">
             
              
               <div class="table-responsive">
                  <table class="table table-striped text-center"  width="200%" border="1px"  >
                    <thead style=" ; font-weight: bold; font-color: white">
                      <tr >
                        <th class="main" style="border: 1px solid black;">No</th>
                        <th class="main" style="border: 1px solid black;">ID</th>
                        <th class="main" style="border: 1px solid black;">Dari Komisi</th>
                        <th class="main"style="border: 1px solid black;">Nama Barang</th>
                        <th class="main" style="border: 1px solid black;">Harga</th>
                        <th class="main"style="border: 1px solid black;">Keperluan</th>
                      </tr>
                    </thead>
                    <tbody class="main">
                       <?php $i = 1;
                        $rows = mysqli_query($koneksi, "SELECT * FROM tbl_usulan_pengadaan WHERE status_usulan = 'pending'")
                        ?>
                  <?php foreach ($rows as $row) : ?>
                      <tr class="mt-2">
                        <td style="border: 1px solid black;"><?= $i++; ?></td>
                   <td><?= $row['id_usulan'] ?></td>
                   <td><?= $row['komisi'] ?></td>
                   <td><?= $row['nama_barang'] ?></td>
                  <td>Rp.<?= number_format($row['harga'], 0, ',', '.'); ?></td>
                   <td><?= $row['keterangan_usulan'] ?></td>
                        
                      </tr>
                      </tr>
                  <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              <br>
              <div style="float:right; color: black;">
                Maumere , <?=date("d F Y"); ?> <br>
                  Ketua UPP Perbendaharaan, <br>
                <br><br><br><br>
                
                <b><u>Samuel Desryanto Sing</u></b><br>
                NIP. 198909153007101112  </div>
                <br><br><br><br><br><br><br><br><br>
                <!-- <p style="font-size: 15px;"><b><i>Nama Pencetak : <?= $_SESSION['nama_lengkap'] ?></i></b></p> -->
                

          </div>
        </div>
              </div>
            </div>
          </div>


              </div>
  </body>
</html>