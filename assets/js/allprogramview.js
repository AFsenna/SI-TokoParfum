$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
var dataFirst = {
    label: 'Kategori 1',
	data: [12, 19, 3, 23, 2, 3,7,8,9,60,11,12],
	lineTension: 0,
	fill: false,
	borderColor: 'red'
  };

var dataSecond = {
    label: "Kategori 2",
	data: [13,12,55,10,9,8,7,6,5,4,3,2],
	lineTension: 0,
	fill: false,
	borderColor: 'blue'
  };

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black'
    }
  }
};

var ctx = document.getElementById("chartLine").getContext('2d');
		var chartLine = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli","Agustus","September","October","November","Desember"],
				datasets: [dataFirst, dataSecond]
			},
			options: chartOptions
		});
		