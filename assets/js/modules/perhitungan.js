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
						alert(response["message"]);
					} else {
						alert(response["message"]);
						location.reload();
					}
				},
				error: function (error) {
					console.log(error);
					alert("Error submitting data");
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
});
