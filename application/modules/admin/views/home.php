  <div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <a href="<?= base_url('admin/product') ?>" style="text-decoration: none;">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-cube text-danger icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Product</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?php echo $countProducts ?></h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Qty Product
          </p>
        </a>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <a href="<?= base_url('admin/order') ?>" style="text-decoration: none;">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-receipt text-warning icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Transaksi</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?php echo $countTransaksi ?></h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Qty Transaksi
          </p>
        </div>
        </a>
      </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
      <div class="card card-statistics">
        <a href="<?= base_url('admin/member') ?>" style="text-decoration: none;">
        <div class="card-body">
          <div class="clearfix">
            <div class="float-left">
              <i class="mdi mdi-poll-box text-success icon-lg"></i>
            </div>
            <div class="float-right">
              <p class="mb-0 text-right">Member</p>
              <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?php echo $countMember ?></h3>
              </div>
            </div>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Qty Member
          </p>
        </div>
        </a>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
          <div class="" id="chart_column"></div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="" id="chart_pie"></div>
        </div>
      </div>
    </div>
  </div>

<?php
/* Mengambil query report*/
  foreach($getRevenue as $revenue){
      $year[] = $revenue['year'];
      $total[] = (int)$revenue['total'];
  }

  // foreach($getPeriode as $periode){
  //     // $time[] = $revenue['time'];
  //     $year[] = $periode['year'];
  // }
/* end mengambil query*/
?>

<script type="text/javascript">

$(function () {
  $('#chart_column').highcharts({
      chart: {
          type: 'column',
          margin: 75,
          options3d: {
              enabled: false,
              alpha: 10,
              beta: 25,
              depth: 70
          }
      },
      title: {
          text: 'Penghasilan per tahun',
          style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
          }
      },
      subtitle: {
         text: 'Diagram Batang',
         style: {
                  fontSize: '11px',
                  fontFamily: 'Verdana, sans-serif'
          }
      },
      plotOptions: {
          column: {
              depth: 25
          }
      },
      credits: {
          enabled: false
      },
      xAxis: {
          categories:  <?php echo json_encode($year);?>
      },
      exporting: { 
          enabled: false 
      },
      yAxis: {
          title: {
              text: 'Rupiah/ribu'
          },
      },
      tooltip: {
           formatter: function() {
               return 'Penghasilan <b>' + this.x + '</b> : <b>' + Highcharts.numberFormat(this.y,0) + '</b>';
           }
        },
      series: [{
          name: 'Tahun',
          data: <?php echo json_encode($total);?>,
          shadow : true,
          dataLabels: {
              enabled: true,
              color: '#045396',
              align: 'center',
              formatter: function() {
                   return Highcharts.numberFormat(this.y, 0);
              }, // one decimal
              y: 0, // 10 pixels down from the top
              style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
              }
          }
      }]
  });
});
</script>

<script type="text/javascript">

$(function () {
  $('#chart_pie').highcharts({
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false
    },
    title: {
      text: 'Percentase Penghasilan per tahun',
      style: {
              fontSize: '13px',
              fontFamily: 'Verdana, sans-serif'
            }
    },
    subtitle: {
           text: 'Diagram Pie',
           style: {
              fontSize: '11px',
              fontFamily: 'Verdana, sans-serif'
            }
        },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          }
        }
      }
    },
    series: [{
      type: 'pie',
      name: 'Persentase Penghasilan/tahun',
      data: [
          <?php 
          // data yang diambil dari database
          if(count($getPercentage)>0)
          {
             foreach ($getPercentage as $row) {
             echo "['" .$row['time'] . "'," . $row['id'] ."],\n";
             }
          }
          ?>
      ]
    }]
  });
});

</script>