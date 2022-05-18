var lab = new Array();
var t = $("#today_t").val();
t = t * 1 ;
for(var j=1;j<=t;j++)
{
	lab[j-1] = j+"일";
}

var statics = new Array();
var d = $("#today_d").val();
d = d * 1;
var m = 0;
for(var k=0;k<d;k++)
{
	m = k + 1;
	statics[k] = $("#day_"+m).val();
	statics[k] = statics[k] * 1;
}

var chartData = {
	labels: lab,
	datasets: [{
		type: 'line',
		label: '방문자수',
		borderColor: window.chartColors.blue,
		borderWidth: 1,
		fill: false,
		data: statics
	}, {
		type: 'bar',
		label: '방문수',
		backgroundColor: "#c0c1a7",
		data: statics,
		borderColor: 'white',
		borderWidth: 2
	}]

};
window.onload = function() {
	var ctx = document.getElementById('canvas').getContext('2d');
	window.myMixedChart = new Chart(ctx, {
		type: 'bar',
		data: chartData,
		options: {
			responsive: true,
			tooltips: {
				mode: 'index',
				intersect: true
			}
		}
	});
};

document.getElementById('randomizeData').addEventListener('click', function() {
	chartData.datasets.forEach(function(dataset) {
		dataset.data = dataset.data.map(function() {
			return randomScalingFactor();
		});
	});
	window.myMixedChart.update();
});

document.getElementById('randomizeData').addEventListener('click', function() {
	chartData.datasets.forEach(function(dataset) {
		dataset.data = dataset.data.map(function() {
			return randomScalingFactor();
		});
	});
	window.myMixedChart.update();
});