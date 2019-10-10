
    <div class="cd-content-wrapper">
    <div class="container-fluid">

    	<div class="card mb-4">
	        <div class="card-body d-sm-flex justify-content-between">
	          <h4><?php echo "Dashboard"; ?></h4>
	        </div>
      	</div>
    	<div class="row">
		  <div class="col-md-6">
		    <div class="card mb-3">
			  <div class="card-header">Bar Chart</div>
			  <div class="card-body">
			   <canvas id="myChart"></canvas>
			  </div>
			</div>
		  </div>
		  <div class="col-md-6">
			<div class="card mb-3">
			  <div class="card-header">Doughnut Chart</div>
			  <div class="card-body">
			    <canvas id="doughnutChart"></canvas>
			  </div>
			</div>
		  </div>
		</div>

    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->

	<!-- Chart -->
	<script src="<?php echo base_url(); ?>assets/chart/Chart.min.js"></script>
	<script>

	/* Pie Chart */
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
	        datasets: [{
	            label: '# of Votes',
	            data: [12, 19, 3, 5, 2, 3, 4, 5, 6, 7, 8, 9, 10],
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(75, 192, 192, 0.2)',
	                'rgba(153, 102, 255, 0.2)',
	                'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255, 99, 132, 1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)',
	                'rgba(75, 192, 192, 1)',
	                'rgba(153, 102, 255, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	    	responsive: true,
	        legend: {
	          display:false
	        },
	        title: {
	          display: true,
	          text: 'Bar Chart CRM'
	        },
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero: true
	                }
	            }]
	        }
	    }
	});


	/* Doughnut Chart */
	var ctx2 = document.getElementById('doughnutChart').getContext('2d');
	var myDoughnutChart = new Chart(ctx2,{
		type:"doughnut",
		data:{labels: ["Red","Blue","Yellow","Green"],
			datasets: [{
				data:[300,50,100,150],
				backgroundColor:["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)","rgb(0, 202, 0)"]
			}]
		}
	});
	</script>