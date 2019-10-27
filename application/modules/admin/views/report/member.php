<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/report') ?>">Report</a></li>
    <li class="breadcrumb-item active" aria-current="page">Chart of Member</li>
  </ol>
</nav>

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
  foreach($getCountMemberChartColumn as $revenue){
      $date[] = date('Y',$revenue['date']);
      $email[] = (int)$revenue['email'];
  }
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
          text: 'Jumlah Member All Periode',
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
          categories:  <?php echo json_encode($date);?>
      },
      exporting: { 
          enabled: false 
      },
      yAxis: {
          title: {
              text: 'Rupiah'
          },
      },
      tooltip: {
           formatter: function() {
               return 'Qty Member <b>' + this.x + '</b> : <b>' + Highcharts.numberFormat(this.y,0) + '</b>';
           }
        },
      series: [{
          name: 'Count of Member',
          data: <?php echo json_encode($email);?>,
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
    text: 'Persentase Growth of Member All Periode',
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
    name: 'Persentase Growth of Member',
    data: [
        <?php 
        // data yang diambil dari database
        if(count($getPercentage_member)>0)
        {
           foreach ($getPercentage_member as $row) {
           echo "['" .date('Y',$row['year']) . "'," . $row['id'] ."],\n";
           }
        }
        ?>
    ]
  }]
});
});
</script>