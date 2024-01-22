$(document).ready(function () { 
	$("#formulirPerhitungan").submit(function (event) {
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
	});

	$("#id_distributor").change(function () {
		var selectedValue = $(this).val();
		var data = dis_option_ci.find(function(obj) {
			return obj.Id === selectedValue;
		});
		console.log(data);
		$("#distributor").val(data.distributor);
		$("#nama").val(data.nama);
	});
});
