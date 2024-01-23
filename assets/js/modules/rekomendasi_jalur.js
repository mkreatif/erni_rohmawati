$(document).ready(function () {
	var table = $("#RekomendasiJalurDataTable").DataTable();
	var chartCanvas;

	table.on("click", "tbody tr", function (e) {
		e.currentTarget.classList.toggle("selected");
	});

	function resetCanvas() {
		if(chartCanvas !== undefined){
			chartCanvas.destroy();
		}
	}

	$("#value-barchart").click(function (event) {
		resetCanvas();
		$("#modalTitleContent").html("Value Barchart");
		// Open the modal
		$("#modal-chart").modal();
	});

	$("#barchart").click(function (event) {
		resetCanvas();
		$("#modalTitleContent").html("Barchart");
		// Your chart data
		var data = {
			labels: ["Label 1", "Label 2", "Label 3"],
			datasets: [
				{
					label: "My First Dataset",
					data: [10, 20, 30],
					backgroundColor: [
						"rgba(255, 99, 132, 0.2)",
						"rgba(54, 162, 235, 0.2)",
						"rgba(255, 206, 86, 0.2)",
					],
					borderColor: [
						"rgba(255, 99, 132, 1)",
						"rgba(54, 162, 235, 1)",
						"rgba(255, 206, 86, 1)",
					],
					borderWidth: 1,
				},
			],
		};

		// Chart configuration
		var options = {
			scales: {
				y: {
					beginAtZero: true,
				},
			},
		};

		// Create a new Chart instance
		var ctx = document.getElementById("myChart").getContext("2d");
		chartCanvas = new Chart(ctx, {
			type: "bar", // specify the chart type (bar, line, pie, etc.)
			data: data,
			options: options,
		});
		// Open the modal
		$("#modal-chart").modal();
	});
});
