$(document).ready(function () {

	$("#formKriteria").submit(function (event) {
		// Prevent the default form submission
		event.preventDefault();
		var KKriteria = $("#K_kriteria").val();
		var NKriteria = $("#N_kriteria").val();
		var PKriteria = $("#P_kriteria").val();

		var slug = base_url + "kriteria/create";
		console.log(slug);

		// Make an AJAX request
		$.ajax({
			type: "POST",
			url: slug,
			data: {
				"K_kriteria": KKriteria,
				"N_kriteria": NKriteria,
				"P_kriteria": PKriteria,
			},
			dataType: "json",
			success: function (response) { 
				console.log(response["data"]);
				if(response['status'] == "failed"){
					alert(response["message"]);
				}else{
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

	 
});
