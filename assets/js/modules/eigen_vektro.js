$(document).ready(function () {
	var DT_RowId;

	$("#formEigenVektor").validate({
		// Specify validation rules for your form fields
		rules: {
			K_kriteria: {
				required: true,
			},
			N_kriteria: {
				required: true,
			},
			P_kriteria: {
				required: true,
			},
		},
	});

	$("#formEigenVektor").submit(function (event) {
		if ($("#formEigenVektor").valid()) {
			// Prevent the default form submission
			event.preventDefault();
			if ($("#nama").val() && $("#N_akhir").val() && $("#prioritas").val()) {
				let data = {
					nama: $("#nama").val(),
					N_akhir: $("#N_akhir").val(),
					prioritas: $("#prioritas").val(),
				};
				for (let index = 1; index <= 5; index++) {
					data[`N${index}`] = $(`#N${index}`).val();
				}

				var slug = base_url + "eigenvektor/create";
				if (DT_RowId) {
					slug = base_url + `eigenvektor/update/${DT_RowId}`;
				}
				console.log(slug);

				// Make an AJAX request
				$.ajax({
					type: "POST",
					url: slug,
					data: data,
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
			} else {
				showInfo("Silahkan Submit Data terlebih dahulu");
			}
		}
	});

	$("#generalEdit").click(function () {
		var table = $("#GeneralDataTable").DataTable();
		var row = table.rows(".selected").data();
		if (row.length > 0) {
			$("#nama").val("");
			$("#N_akhir").val("");
			$("#prioritas").val("");
			for (let index = 1; index <= 5; index++) {
				$(`#N${index}`).val("");
			}
			DT_RowId = selected["DT_RowId"];
			console.log(DT_RowId);
		} else {
			showInfo("Silahkan Pilih Row Di DataTable!");
		}
	});

	$("#generalDeleteBtn").click(function () {
		var table = $("#GeneralDataTable").DataTable();
		var row = table.rows(".selected").data();
		if (row.length > 0) {
			var selected = row[0];
			var slug = base_url + "eigenvektor/delete/" + selected["DT_RowId"];
			showConfrim("Anda Yakin Hapus Data Ini?", function (value) {
				// Make an AJAX request
				$.ajax({
					type: "GET",
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

	$("#generalClear").click(function () {
		$("#nama").val("");
		$("#N_akhir").val("");
		$("#prioritas").val("");
		for (let index = 1; index <= 5; index++) {
			$(`#N${index}`).val("");
		}

		$("#GeneralDataTable")
			.DataTable()
			.rows(".selected")
			.nodes()
			.each((row) => row.classList.remove("selected"));
	});

	$("#generalKalkulasi").click(function (event) {
		let valid = true;
		for (let index = 1; index <= 5; index++) {
			if (!$(`#N${index}`).val()) {
				valid = false;
				break;
			}
		}
		if (valid) {
			hitungAHP();
		} else {
			showInfo("Silahkan Lengkapi Data");
		}
	});

    function hitungAHP() {
        // Mendapatkan bobot kriteria dari formulir
        let jarak = $("#N1").val();
        let estimasi = $("#N2").val();
        let kapasitas = $("#N3").val();
        let biaya = $("#N4").val();
        let skill = $("#N5").val();
    
        // Menghitung matriks perbandingan berpasangan
        let matriks = [
            [jarak, estimasi, kapasitas, biaya, skill],
            [1 / jarak, 1 / estimasi, 1 / kapasitas, 1 / biaya, 1 / skill]
        ];
    
        // Menghitung eigen vektor
        let eigenVektor = matriks.map(row => Math.pow(row.reduce((acc, val) => acc * val, 1), 1 / matriks.length));
    
        // Menghitung rata-rata eigen vektor
        let rataRataEigen = eigenVektor.reduce((acc, val) => acc + val, 0) / eigenVektor.length;
    
        // Normalisasi eigen vektor untuk mendapatkan nilai prioritas
        let nilaiPrioritas = eigenVektor.map(val => val / rataRataEigen);
        $("#N_akhir").val(eigenVektor[0].toFixed(4));
        $("#prioritas").val(nilaiPrioritas[0].toFixed(4));
     
    }
    
});
