<html>
	<input type="text" id="txt-input" />
	<button id="btn-execute">Generate 20 random numbers</button>
	<h5>Generated Numbers:</h5>
	<label id="lbl-generated-nos"></label>
	<br /><br /><br />
	<canvas id="myChart" width="400" height="400"></canvas>
	<div id="div-computation">
		<h5>Computation:</h5>
	</div>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="node_modules/chart.js/dist/Chart.js"></script>
<script type="text/javascript">
	jQuery('#div-computation').hide();
	jQuery('#btn-execute').click(function() {
		var user_input = jQuery('#txt-input').val();
		var arr_generated_nos = [];
		jQuery('#div-computation').show();
		var prev_input=0;
		var arr_computation_diffs = [];
		for(i=1; i<=20; i++){
			prev_input = prev_input;
			var rand = Math.floor(Math.random() * (user_input - 20) + 20);

			if(i>1){
				jQuery('#div-computation').append('<div><label>' + prev_input + ' - '+ rand +'</label> = ' + (prev_input - rand) + '</div>' );	
				arr_computation_diffs.push(prev_input - rand);
			}
			prev_input = rand;
			arr_generated_nos.push(rand);
		}
		var total=0;
		for(var i in arr_computation_diffs) { total += arr_computation_diffs[i]; }
		console.log(arr_computation_diffs);
		jQuery('#div-computation').append('<div><label>TOTAL COMPUTATION: ' + total + '</div>');
		jQuery('#lbl-generated-nos').text(arr_generated_nos);

		var randomScalingFactor = function() {
		  return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
		}

		var ctx = document.getElementById('myChart');
		var myChart = new Chart(ctx, {
	    type: 'line',
	    data: {
		    labels: ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20"],
		    backgroundColor: 'rgba(255, 99, 132)',
		    borderColor: 'rgba(255, 99, 132)',
		    datasets: [{
		      label: "Randomized Input",
		      
		      data: arr_generated_nos,
		      fill: false,
		    }]
		  },
	    options: {
	    	responsive: true,
		    title: {
		      display: true,
		      text: 'FCFS Algorithm Visualization'
		    },
		    tooltips: {
		      mode: 'label',
		    },
	        scales: {
	            xAxes: [{
	                ticks: {
	                    suggestedMin: 50,
	                    suggestedMax: 100,
	                    stepSize: 1
	                }
	            }]
	        }
	    }
	});
});
</script>