$(document).ready(function () {
	$("#formulirPerhitungan").validate({
		// Specify validation rules for your form fields
		rules: {
			N1: {
				required: true,
			},
			N2: {
				required: true,
			},
			N3: {
				required: true,
			},
			N4: {
				required: true,
			},
			N5: {
				required: true,
			},
			N_akhir: {
				required: true,
			},
			N_ket: {
				required: true,
			},
			kode_distributor: {
				required: true,
			},
			// Add rules for other fields as needed
		},
	});
	$("#formulirPerhitungan").submit(function (event) {
		// Prevent the default form submission
		event.preventDefault();
		if ($("#formulirPerhitungan").valid()) {
			var slug = base_url + "data-perhitungan/save";
			console.log(slug);

			// Make an AJAX request
			$.ajax({
				type: "POST",
				url: slug,
				data: {
					kode_distributor: $("#kode_distributor").val(),
					nama: $("#nama").val(),
					perusahaan: $("#perusahaan").val(),
					N1: $("#N1").val(),
					N2: $("#N2").val(),
					N3: $("#N3").val(),
					N4: $("#N4").val(),
					N5: $("#N5").val(),
					N_akhir: $("#N_akhir").val(),
					N_ket: $("#N_ket").val(),
				},
				dataType: "json",
				success: function (response) {
					console.log(response["data"]);
					if (response["status"] == "failed") {
						showInfo(response["message"]);
					} else {
						showInfo(response["message"]);
						location.reload();
					}
				},
				error: function (error) {
					console.log(error);
					showInfo("Error submitting data");
				},
			});
		}
	});

	$("#kode_distributor").change(function () {
		var selectedValue = $(this).val();
		var data = dis_option_ci.find(function (obj) {
			return obj.Id === selectedValue;
		});
		console.log(data);
		$("#nama").val(data.distributor);
		$("#perusahaan").val(data.nama);
	});

	$("#generalEdit").click(function () {
		var table = $("#GeneralDataTable").DataTable();
		var row = table.rows(".selected").data();
		if (row.length > 0) {
			var selected = row[0];
			$("#kode_distributor").val(selected[0]);
			$("#nama").val(selected[1]);
			$("#perusahaan").val(selected[2]);
			$("#N1").val(selected[3]);
			$("#N2").val(selected[4]);
			$("#N3").val(selected[5]);
			$("#N4").val(selected[6]);
			$("#N5").val(selected[7]);
			$("#N_akhir").val(selected[8]);
			$("#N_ket").val(selected[9]);
		} else {
			showInfo("Silahkan Pilih Salah Satu Row di DataTable!");
		}
	});

	$("#generalClear").click(function () {
		$("#kode_distributor").val("");
		$("#nama").val("");
		$("#perusahaan").val("");
		$("#N1").val("");
		$("#N2").val("");
		$("#N3").val("");
		$("#N4").val("");
		$("#N5").val("");
		$("#N_akhir").val("");
		$("#N_ket").val("");
	});
});
