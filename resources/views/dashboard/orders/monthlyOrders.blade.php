  <div class="card">
      <div class="card-header header-elements-inline">
          <h5 class="card-title">Órdenes en AR$ por mes</h5>
          <div class="header-elements">
              <div class="list-icons">
                  <a class="list-icons-item" data-action="collapse"></a>
                  {{-- <a class="list-icons-item" data-action="reload"></a> --}}
                  <a class="list-icons-item" data-action="remove"></a>
              </div>
          </div>
      </div>

      <div class="card-body">
          <div class="chart-container" style="height: 300px">
              <canvas id="OrdersByMonth" width="50" height="50"></canvas>
          </div>
      </div>
  </div>
  <script>
  var ctx = document.getElementById("OrdersByMonth").getContext('2d');
  ctx.height = 100;
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: {!!json_encode($OrdersAmountByMonth->pluck("period"))!!},
          datasets: [{
              label: 'Órdenes en AR$',
              data: {!!json_encode($OrdersAmountByMonth->pluck("sum"))!!},
              backgroundColor:
                'rgba(54, 162, 235, 1)'
              ,  borderColor:
                  'black'
                ,
              borderWidth: 1
          }]
      },
      options: {
        responsive: true,
        animation: {
            duration: 2000, // general animation time
        },
        maintainAspectRatio: false,
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });
  </script>
