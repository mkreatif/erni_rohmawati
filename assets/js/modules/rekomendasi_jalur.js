$(document).ready(function () {
	const predefinedColors = [
		"#FF0000",
		"#800080",
		"#FFFF00",
		"#0000FF",
		"#00FF00",
		"#FFC0CB",
		"#FFA500",
		"#A52A2A",
		"#00FFFF",
		"#FF00FF",
	];

	// Function to convert hex color to RGB
	function hexToRgb(hex) {
		// Remove the hash if it exists
		hex = hex.replace(/^#/, "");

		// Convert the hex values to integers
		const r = parseInt(hex.substring(0, 2), 16);
		const g = parseInt(hex.substring(2, 4), 16);
		const b = parseInt(hex.substring(4, 6), 16);

		// Return the RGB values as a string
		return `${r},${g},${b}`;
	}
	var table = $("#RekomendasiJalurDataTable").DataTable();
	var chartCanvas;

	table.on("click", "tbody tr", function (e) {
		e.currentTarget.classList.toggle("selected");
	});

	function resetCanvas() {
		if (chartCanvas !== undefined) {
			chartCanvas.destroy();
		}
	}

	function getDataSet1(params, colorSet) {
		var subs = params.slice(3, 9);
		return {
			label: `${params[0]}-${params[2]}`,
			data: subs,
			backgroundColor: [colorSet.color],
			borderColor: [colorSet.borderColor],
			borderWidth: 1,
		};
	}
	function getDataSet2(values, colorSet, label) {
		return {
			label: label,
			data: values,
			backgroundColor: [colorSet.color],
			borderColor: [colorSet.borderColor],
			borderWidth: 1,
		};
	}

	$("#value-barchart").click(function (event) {
		resetCanvas();
		var table = $("#RekomendasiJalurDataTable").DataTable();
		var rows = table.rows(".selected").data();

		if (rows.length == 2) {
			$("#modalChartTitle").html("Value Barchart");

			// Create an array of objects with predefined colors
			const colorArray = predefinedColors.map((color) => ({
				color: `rgba(${hexToRgb(color)}, 0.75)`,
				borderColor: `rgba(${hexToRgb(color)}, 1)`,
			}));

			var datasets = [];
			for (let index = 0; index < rows.length; index++) {
				const row = rows[index];
				datasets.push(getDataSet1(row, colorArray[index]));
			}

			// Your chart data
			var data = {
				labels: ["Jarak", "Estimasi", "Kapasitas", "Biaya", "Skill", "N Akhir"],
				datasets: datasets,
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
		} else {
			showInfo("Silahkan Pilih 2 Row Untuk Membandingkan!");
		}
	});

	$("#barchart").click(function (event) {
		resetCanvas();
		var table = $("#RekomendasiJalurDataTable").DataTable();
		var rows = table.rows(".selected").data();

		if (rows.length ==2 ) {
			$("#modalChartTitle").html("Barchart");

			// Create an array of objects with predefined colors
			const colorArray = predefinedColors.map((color) => ({
				color: `rgba(${hexToRgb(color)}, 0.75)`,
				borderColor: `rgba(${hexToRgb(color)}, 1)`,
			}));
			const satuan = ["Jarak", "Estimasi", "Kapasitas", "Biaya", "Skill", "N Akhir"]

			var datasets = [];
			var labels = [];
			var subRows = [];

			for (let index = 0; index < rows.length; index++) {
				const row = rows[index];
				labels.push(`${row[0]}-${row[2]}`);
				var subs = row.slice(3, 9);
				subRows.push(subs);
			}

			var sub_length = subRows[0].length;
			var row_lenght = rows.length;

			for (let index = 0; index < sub_length; index++) {
				var pairedSubs = [];
				 for (let row = 0; row < row_lenght; row++) {
					var ar = subRows[row] ;
					pairedSubs.push(ar[index]);
				 } 

				 datasets.push(getDataSet2(pairedSubs, colorArray[index], satuan[index]));
				
			}

			// Your chart data
			var data = {
				labels: labels,
				datasets: datasets,
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
		} else {
			showInfo("Silahkan Pilih 2 Row Untuk Membandingkan!");
		}
	});
});
