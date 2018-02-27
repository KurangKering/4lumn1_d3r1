<div class="wrapper wrapper-content  animated fadeInRight ">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-content">

            <div id="container"></div>

        </div>
    </div>
</div>
</div>
</div>

<script type="text/javascript">/**
 
/**
 * Create the chart
 */
 window.chart = Highcharts.chart('container', {

    chart: {

        plotBackgroundColor: null,
        events: {
         load: function(event) {
            var total = 0; // get total of data
            for (var i = 0, len = this.series[0].yData.length; i < len; i++) {
                total += this.series[0].yData[i];
            }
            var text = this.renderer.text(
                'Total : <b>' + total + '</b> Alumni',
                this.plotLeft,
                this.plotTop - 20
                ).attr({
                    zIndex: 5
            }).add() // write it to the upper left hand corner
            },
            beforePrint: function() {
              this.setSize(1000, 1000);
          },
          afterPrint: function() {
              this.setSize(1000, 600,false);
              this.redraw();
          },
      },
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie',

  },
  title: {
    text: 'Grafik Alumni Berdasarkan Pekerjaan'
},
subtitle: {
    text: 'Sepanjang Masa'
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
            format: '{point.percentage:.1f} % {point.name} ({point.y} Alumni)',
            style: {
                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
            }
        },


    }

},
exporting: {
    enabled: true,
    chartOptions: {
        title: {
            style: {
                fontSize: '15px'
            }
        },
        series: {
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '8px',
                    fontWeight: 'bold'
                }
            }
        }
    }
},

series: [{
    name: 'Percentage',
    colorByPoint: true,
    data: <?php echo json_encode($grafik['populate_data']) ?>
}]
});

</script>