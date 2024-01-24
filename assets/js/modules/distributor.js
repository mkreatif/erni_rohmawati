$(document).ready(function () {
	var DT_RowId;
	$("#kode").val(generateSerialID);

	$("#formKriteria").validate({
		// Specify validation rules for your form fields
		rules: {
			kode: {
				required: true,
			},
			distributor: {
				required: true,
			},
			nama: {
				required: true,
			}, 
			no_tlp: {
				required: true,
			}, 
			alamat: {
				required: true,
			}, 
		},
	});
	$("#formDistributor").submit(function (event) {
		// Prevent the default form submission
		event.preventDefault();
		var kode = $("#kode").val();
		var distributor = $("#distributor").val();
		var nama = $("#nama").val();
		var no_tlp = $("#no_tlp").val();
		var alamat = $("#alamat").val();

		var slug = base_url + "data-distributor/create";
		if (DT_RowId) {
			slug = `${base_url}data-distributor/update/${DT_RowId}`;
		}
		console.log(slug);
		// Make an AJAX request
		$.ajax({
			type: "POST",
			url: slug,
			data: {
				id: kode,
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
			$("#kode").prop("readonly", true);
			$("#distributor").val(selected[1]);
			$("#nama").val(selected[2]);
			$("#no_tlp").val(selected[3]);
			$("#alamat").val(selected[4]);
			DT_RowId = selected["DT_RowId"];
			console.log(DT_RowId);
		} else {
			showInfo("Silahkan Pilih Row Di DataTable!");
		}
	});

	$("#generalClear").click(function () {
		$("#kode").val(generateSerialID);
		$("#kode").prop("readonly", false);
		$("#distributor").val("");
		$("#nama").val("");
		$("#no_tlp").val("");
		$("#alamat").val("");

		$("#GeneralDataTable")
			.DataTable()
			.rows(".selected")
			.nodes()
			.each((row) => row.classList.remove("selected"));
	});
 
	$("#generalDeleteBtn").click(function () {
		var table = $("#GeneralDataTable").DataTable();
		var row = table.rows(".selected").data();
		if (row.length > 0) {
			var selected = row[0];
			var slug = base_url + "data-distributor/delete/" + selected["DT_RowId"];
			showConfrim("Anda Yakin Hapus Data Ini?", function (value) {
				// Make an AJAX request
				$.ajax({
					type: "DELETE",
					url: slug,
					dataType: "json",
					success: function (response) {
						console.log(response["data"]);
						showInfo(response["message"]);
						if (response["status"] == "failed") {
						} else {
							globalRefresh = true;
						}
					},
					error: function (error) {
						console.log(error);
						showInfo("Error submitting data");
					},
				});
			});
		} else {
			showInfo("Silahkan Pilih Row Di DataTable!");
		}
	}); 
});
