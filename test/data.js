$(document).ready(function(){
	$.ajax({
		url: "data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var x_point = [];
			var y_point = [];

			for(var i in data) {
				x_point.push(data[i].x_point);
				y_point.push(data[i].y_point);
			}

			var chartdata = {
				labels: x_point,
				datasets : [
					{
						label: 'Frequency ',
						data: y_point
					}
				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
