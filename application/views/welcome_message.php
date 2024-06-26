<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Dashboard</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-primary bubble-shadow-small"
                >
                  <i class="fas fa-coins"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Total Pendapatan</p>
                  <h4 class="card-title"><?= rupiah($total_pendapatan) ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-info bubble-shadow-small"
                >
                  <i class="fas fa-coins"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Total Piutang</p>
                  <h4 class="card-title"><?= rupiah($unpaid) ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-success bubble-shadow-small"
                >
                  <i class="fas fa-coins"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Total Hutang</p>
                  <h4 class="card-title"><?= rupiah($hutang) ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-secondary bubble-shadow-small"
                >
                  <i class="far fa-check-circle"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Total Pesanan</p>
                  <h4 class="card-title"><?= $total_pesanan ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Statistik Income</div>
              <div class="card-tools">
                <a
                  href="#"
                  class="btn btn-label-success btn-round btn-sm me-2"
                >
                  <span class="btn-label">
                    <i class="fa fa-pencil"></i>
                  </span>
                  Export
                </a>
                <a href="#" class="btn btn-label-info btn-round btn-sm">
                  <span class="btn-label">
                    <i class="fa fa-print"></i>
                  </span>
                  Print
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-container" style="min-height: 375px">
              <canvas id="statisticsChart"></canvas>
            </div>
            <div id="myChartLegend"></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-primary card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Total Pesanan</div>
              <div class="card-tools">
                <div class="dropdown">
                  <button
                    class="btn btn-sm btn-label-light dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    Export
                  </button>
                  <div
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton"
                  >
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#"
                      >Something else here</a
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="card-category">Current Year</div>
          </div>
          <div class="card-body pb-0 pt-0">
            <div class="mb-4 mt-1">
              <h1><i class="fas fa-shopping-cart"></i> &nbsp<?= $total_pesanan ?></h1>
            </div>
            <div class="pull-in">
              <canvas id="dailySalesChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Javascript -->
<script src="<?= base_url("assets/kaiadmin") ?>/assets/js/core/jquery-3.7.1.min.js"></script>
<script src="<?= base_url("assets/kaiadmin") ?>/assets/js/plugin/chart.js/chart.min.js"></script>
<script src="<?= base_url("assets/kaiadmin") ?>/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<script>
  var ctx = document.getElementById('statisticsChart').getContext('2d');

  var statisticsChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: <?= json_encode($chart_total_pesanan['labels']); ?>,
      datasets: [ {
        label: "Total Hutang",
        borderColor: '#f3545d',
        pointBackgroundColor: 'rgba(243, 84, 93, 0.6)',
        pointRadius: 1,
        backgroundColor: 'rgba(243, 84, 93, 0.4)',
        legendColor: '#f3545d',
        fill: true,
        borderWidth: 2,
        data: <?= json_encode($chart_total_hutang['data']); ?>
      }, {
        label: "Total Piutang",
        borderColor: '#fdaf4b',
        pointBackgroundColor: 'rgba(253, 175, 75, 0.6)',
        pointRadius: 1,
        backgroundColor: 'rgba(253, 175, 75, 0.4)',
        legendColor: '#fdaf4b',
        fill: true,
        borderWidth: 2,
        data: <?= json_encode($chart_total_piutang['data']); ?>
      }, {
        label: "Total Pendapatan",
        borderColor: '#177dff',
        pointBackgroundColor: 'rgba(23, 125, 255, 0.6)',
        pointRadius: 1,
        backgroundColor: 'rgba(23, 125, 255, 0.4)',
        legendColor: '#177dff',
        fill: true,
        borderWidth: 2,
        data: <?= json_encode($chart_total_pesanan['data']); ?>
      }]
    },
    options : {
      responsive: true, 
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      tooltips: {
        bodySpacing: 4,
        mode:"nearest",
        intersect: 0,
        position:"nearest",
        xPadding:10,
        yPadding:10,
        caretPadding:10,
        callbacks: {
          label: function(tooltipItem, data) {
            var value = tooltipItem.yLabel;
            return 'Rp.' + value.toLocaleString('id-ID');
          }
        }
      },
      layout:{
        padding:{left:5,right:5,top:15,bottom:15}
      },
      scales: {
        yAxes: [{
          ticks: {
            fontStyle: "500",
            beginAtZero: false,
            maxTicksLimit: 5,
            padding: 10,
            callback: function(value) {
              return 'Rp.' + value.toLocaleString('id-ID');
            }
          },
          gridLines: {
            drawTicks: false,
            display: false
          }
        }],
        xAxes: [{
          gridLines: {
            zeroLineColor: "transparent"
          },
          ticks: {
            padding: 10,
            fontStyle: "500"
          }
        }]
      }, 
      legendCallback: function(chart) { 
        var text = []; 
        text.push('<ul class="' + chart.id + '-legend html-legend">'); 
        for (var i = 0; i < chart.data.datasets.length; i++) { 
          text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>'); 
          if (chart.data.datasets[i].label) { 
            text.push(chart.data.datasets[i].label); 
          } 
          text.push('</li>'); 
        } 
        text.push('</ul>'); 
        return text.join(''); 
      }  
    }
  });

  var myLegendContainer = document.getElementById("myChartLegend");

  // generate HTML legend
  myLegendContainer.innerHTML = statisticsChart.generateLegend();
</script>

<script>
  var dailySalesChart = document.getElementById('dailySalesChart').getContext('2d');

var myDailySalesChart = new Chart(dailySalesChart, {
	type: 'line',
	data: {
		labels:<?= json_encode($chart_jumlah_pesanan['labels']); ?>,
		datasets:[ {
			label: "Sales Analytics", fill: !0, 
      backgroundColor: "rgba(255,255,255,0.2)", 
      borderColor: "#fff", 
      borderCapStyle: "butt", 
      borderDash: [], 
      borderDashOffset: 0, 
      pointBorderColor: "#fff", 
      pointBackgroundColor: "#fff", 
      pointBorderWidth: 1, 
      pointHoverRadius: 5, 
      pointHoverBackgroundColor: "#fff", 
      pointHoverBorderColor: "#fff", 
      pointHoverBorderWidth: 1, 
      pointRadius: 1, 
      pointHitRadius: 5, 
      data: <?= json_encode($chart_jumlah_pesanan['data']); ?>
		}]
	},
	options : {
		maintainAspectRatio:!1, legend: {
			display: !1
		}
		, animation: {
			easing: "easeInOutBack"
		}
		, scales: {
			yAxes:[ {
				display:!1, ticks: {
					fontColor: "rgba(0,0,0,0.5)", fontStyle: "bold", beginAtZero: !0, maxTicksLimit: 10, padding: 0
				}
				, gridLines: {
					drawTicks: !1, display: !1
				}
			}
			], xAxes:[ {
				display:!1, gridLines: {
					zeroLineColor: "transparent"
				}
				, ticks: {
					padding: -20, fontColor: "rgba(255,255,255,0.2)", fontStyle: "bold"
				}
			}
			]
		}
	}
});
</script>