$(document).ready(function () {
	var DT_RowId;
	$("#formKriteria").submit(function (event) {
		// Prevent the default form submission
		event.preventDefault();
		var KKriteria = $("#K_kriteria").val();
		var NKriteria = $("#N_kriteria").val();
		var PKriteria = $("#P_kriteria").val();

		var slug = base_url + "kriteria/create";
		if (DT_RowId) {
			slug += `/${DT_RowId}`;
		}
		console.log(slug);

		// Make an AJAX request
		$.ajax({
			type: "POST",
			url: slug,
			data: {
				K_kriteria: KKriteria,
				N_kriteria: NKriteria,
				P_kriteria: PKriteria,
			},
			dataType: "json",
			success: function (response) {
				console.log(response["data"]);
				if (response["status"] == "failed") {
					showInfo(response["message"]);
				} else {
					globalRefresh = true;
					showInfo(response["message"]);
				}
			},
			error: function (error) {
				console.log(error);
				showInfo("Error submitting data");
			},
		});
	});

	$("#generalEdit").click(function () {
		var table = $("#GeneralDataTable").DataTable();
		var row = table.rows(".selected").data();
		if (row.length > 0) {
			var selected = row[0];
			$("#K_kriteria").val(selected[0]);
			$("#N_kriteria").val(selected[1]);
			$("#P_kriteria").val(selected[2]);
			DT_RowId = selected["DT_RowId"];
			console.log(DT_RowId);
		} else {
			showInfo("Silahkan Pilih Salah Satu Row di DataTable!");
		}
	});
	$("#generalClear").click(function () {
		$("#K_kriteria").val("");
		$("#N_kriteria").val("");
		$("#P_kriteria").val("");
	});
});
