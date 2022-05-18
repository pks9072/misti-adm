var chartData = {
	labels: ['1일', '2일', '3일', '4일', '5일', '6일', '7일', '8일', '9일', '10일','11일', '12일', '13일', '14일', '15일', '16일', '17일', '18일', '19일', '20일','21일', '22일', '23일', '24일', '25일', '26일', '27일', '28일', '29일', '30일'],
	datasets: [{
		type: 'line',
		label: '주문수',
		borderColor: window.chartColors.blue,
		borderWidth: 1,
		fill: false,
		data: [
			10000,
			22000,
			31000,
			25000,
			42000,
			16000,
			35000,
			10000,
			22000,
			31000,
			25000,
			42000,
			16000,
			35000
		]
	}, {
		type: 'bar',
		label: '주문액',
		backgroundColor: "#E3D9AE",
		data: [
			30000,
			42000,
			21000,
			55000,
			62000,
			26000,
			15000,
			10000,
			22000,
			31000,
			25000,
			42000,
			16000,
			35000
		],
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