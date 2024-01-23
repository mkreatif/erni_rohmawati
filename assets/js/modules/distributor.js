$(document).ready(function () {
	$("#kode").val(generateSerialID);
	$("#formDistributor").submit(function (event) {
		// Prevent the default form submission
		event.preventDefault();
		var kode = $("#kode").val();
		var distributor = $("#distributor").val();
		var nama = $("#nama").val();
		var no_tlp = $("#no_tlp").val();
		var alamat = $("#alamat").val();

		var slug = base_url + "data-distributor/save";
		console.log(slug);

		// Make an AJAX request
		$.ajax({
			type: "POST",
			url: slug,
			data: {
				Id: kode,
				distributor: distributor,
				nama: nama,
				no_tlp: no_tlp,
				alamat: alamat,
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
	});

	$("#distributor").change(function () {
		var selectedValue = $(this).val();
		$("#nama").val(dis_option_ci[selectedValue]);
	});

	$("#generalEdit").click(function () {
		var table = $("#GeneralDataTable").DataTable();
		var row = table.rows(".selected").data();
		if (row.length > 0) {
			var selected = row[0];
			$("#kode").val(selected[0]);
			$("#distributor").val(selected[1]);
			$("#nama").val(selected[2]);
			$("#no_tlp").val(selected[3]);
			$("#alamat").val(selected[4]);
		} else {
			showInfo("Silahkan Pilih Salah Satu Row di DataTable!");
		}
	});

	$("#generalClear").click(function () {
		$("#kode").val(generateSerialID);
		$("#distributor").val("");
		$("#nama").val("");
		$("#no_tlp").val("");
		$("#alamat").val("");
	});
});
