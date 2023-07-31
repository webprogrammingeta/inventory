 <?php 

  include 'templates/header.php';

?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Kategori</li>
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
<div class="col-md-6">
<div class="card card-default">
<div class="card-header">
<h3 class="card-title">
<i class="fas fa-exclamation-triangle"></i>
Alerts
</h3>
</div>

<div class="card-body">
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-ban"></i> Alert!</h5>
Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my
entire
soul, like these sweet mornings of spring which I enjoy with my whole heart.
</div>
<div class="alert alert-info alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-info"></i> Alert!</h5>
Info alert preview. This alert is dismissable.
</div>
<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
Warning alert preview. This alert is dismissable.
</div>
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-check"></i> Alert!</h5>
Success alert preview. This alert is dismissable.
</div>
</div>

</div>

</div>

		<div class="col-md-6">
			<div class="card card-default">
			<div class="card-header">
				<h3 class="card-title">
				<i class="fas fa-chart-pie"></i>
				 Last Activity
				</h3>
				</div>
				<div class="card-body">
					 <div class="timeline">
                  <div>
                  <?php $i = 1;
                  $rows = mysqli_query($koneksi, "SELECT * FROM log_akses ORDER BY id_log DESC LIMIT  5 ")
                  ?>
                  <?php foreach ($rows as $row) : ?>
                  <?php
                  setlocale(LC_TIME, 'id_ID.utf8');
                  $date = date_create($row['tanggal_log']);

                  ?>
                  <i class="fas fa-user bg-green"></i>
                  <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> <?= date_format($date,'d/m/Y');?> , <?= date_format($date,'H:i:s');?></span>
                  <h3 class="timeline-header no-border"><a href="#"><?= $row['id_user'] ?></a> <?= $row['activity_log'] ?></h3>
                  </div>
                  </div>
                  <div>
                   <?php endforeach; ?>
                  </div>
				</div>
			</div>
			</div>
		</div>

		</div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

 <?php 

  include 'templates/footer.php';

?>