<?php 

	include 'config/koneksi.php';

	$b = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Sound System, Alat Audio Visual'");
          $jmlhb = $b->num_rows;
     $d = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Perabot'");
          $jmlhc = $d->num_rows;
     $c = $koneksi->query(" SELECT * FROM tbl_barang WHERE kategori ='Peralatan Kantor (termasuk Laptop, Printer, dll)'");
          $jmlhc = $c->num_rows;
      $a = $koneksi->query("SELECT * FROM tbl_barang WHERE kategori ='Alat Sakramen Ibadah'");
        $jmlha = $a->num_rows;


        $baik = $koneksi->query("SELECT * FROM tbl_barang WHERE kondisi_barang ='Baik'");
        $jmlbaik = $baik->num_rows;

        $RR = $koneksi->query("SELECT * FROM tbl_barang WHERE kondisi_barang ='Rusak Ringan'");
        $jmlRR = $RR->num_rows;

        $Rb = $koneksi->query("SELECT * FROM tbl_barang WHERE kondisi_barang ='Rusak Berat'");
        $jmlRb = $Rb->num_rows;
 ?>


<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Baik',<?= $jmlbaik; ?>],
          ['Rusak Ringan',<?= $jmlRR; ?>],
          ['Rusak Berat',<?= $jmlRb; ?>]
        ]);

        // Set chart options
        var options = {'title':'Grafik Barang Berdasarkan Kondisi ',
                       'width':800,
                       'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Total'],
          ['Sound System, Alat Audio Visual',<?= $jmlhb; ?>],
          ['Perabot',<?= $jmlha; ?>],
          ['Peralatan Kantor (termasuk Laptop, Printer, dll)',<?= $jmlhc; ?>],
          ['Alat Sakramen Ibadah',<?= $jmlha; ?>]
        ]);

        var options = {
          width:300,
          legend: { position: 'none' },
          chart: {
            title: 'Chess opening moves',
            subtitle: 'popularity by percentage' },
          axes: {
            x: {
              0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>

    <div id="top_x_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>