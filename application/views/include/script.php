    <script src="<?=site_url();?>/media/js/jquery-1.11.1.min.js"></script>
    <script src="<?=site_url();?>/media/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?=site_url();?>/media/js/Chart.js"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   	<script>
	var randomScalingFactor = function(){ return Math.round(Math.random()*10)};

	var barChartData = {
		labels : ["24-11-2014","25-11-2014","26-11-2014","27-11-2014","28-11-2014","29-11-2014","30-11-2014"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [10,randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}

	</script>
	</script>
	
	    