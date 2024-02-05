$(document).ready(function () {
	function updateJmlBaris() {
		for (let index = 0; index < 5; index++) {
			let vertical = 0.0;
			for (let index2 = 0; index2 < 5; index2++) {
				vertical += metrix[index2][index];
			}
			$("#add_" + index).val(vertical.toFixed(3));
		}
	}
	function calculateCR(matrix) {
		// Step 1: Calculate the sum of each column
		const columnSums = matrix[0].map((col, j) =>
			matrix.reduce((acc, row) => acc + row[j], 0)
		);

		// Step 2: Calculate the weighted sum for each criterion
		const weightedSums = columnSums.map((sum, i) => sum * matrix[i][i]);

		// Step 3: Calculate the sum of the weighted sums
		const sumWeightedSums = weightedSums.reduce((sum, value) => sum + value, 0);

		// Step 4: Calculate the eigenvalue
		const eigenvalue = sumWeightedSums / matrix.length;

		// Step 5: Calculate the Consistency Index (CI)
		const CI = (eigenvalue - matrix.length) / (matrix.length - 1);

		// Step 6: Lookup Random Index (RI) based on matrix length
		const randomIndex = {
			1: 0,
			2: 0,
			3: 0.58,
			4: 0.9,
			5: 1.12,
			6: 1.24,
			7: 1.32,
			8: 1.41,
			9: 1.45,
			10: 1.49,
		};

		// Step 7: Calculate Consistency Ratio (CR)
		const RI = randomIndex[matrix.length];
		const CR = CI / RI;

		return {
			eigenvalue,
			CI: CI.toFixed(4),
			RI: RI.toFixed(4),
			CR: CR.toFixed(4),
		};
	}

	$(".metrix").change(function (event) {
		event.preventDefault();
		let currentId = $(this).attr("id").split("_");
		let currentValue = parseFloat($(this).val());
		console.log(`${currentId} : ${currentValue}`);
		// set metrix value
		metrix[currentId[0]][currentId[1]] = currentValue;

		let inverseMatrixId = currentId.reverse();
		let inverseValue = parseFloat((1 / currentValue).toFixed(4));
		// set metrix value
		metrix[inverseMatrixId[0]][inverseMatrixId[1]] = inverseValue;
		updateJmlBaris();
		// render to html
		$(`#${inverseMatrixId.join("_")}`).val(inverseValue);

		console.log(`${inverseMatrixId} : ${inverseValue}`);
		console.log(metrix);
	});

	function hitungMatriks(matriks) {
		// Menghitung eigen vektor
		let eigenVektor = matriks.map((row) =>
			Math.pow(
				row.reduce((acc, val) => acc * val, 1),
				1 / matriks.length
			)
		);

		// Menghitung rata-rata eigen vektor
		let rataRataEigen =
			eigenVektor.reduce((acc, val) => acc + val, 0) / eigenVektor.length;

		// Normalisasi eigen vektor untuk mendapatkan nilai prioritas
		let nilaiPrioritas = eigenVektor.map((val) => val / rataRataEigen);

		return {
			eigen: eigenVektor[0].toFixed(4),
			avg_eigen: rataRataEigen,
			prioritas: nilaiPrioritas[0].toFixed(4),
		};
	}

	$("#btnReset").click(function () {
		showConfrim("Anda Akan Reset Nilai?", function (value) {
			location.reload();
		});
	});

	$("#btnHitung").click(function () {
		showConfrim("Mulai Hitung Nilai Bobot?", function (value) {
			for (let row = 0; row < 5; row++) {
				let metriks = [];
				let row1 = metrix[row];
				let row2 = [];
				for (let column = 0; column < 5; column++) {
					row2.push(metrix[column][row]);
				}

				metriks.push(row1);
				metriks.push(row2);
				var result = hitungMatriks(metriks);
				$("#eigen_" + row).val(result.eigen);
				$("#average_" + row).val(result.avg_eigen.toFixed(4));
			}

			console.log(calculateCR(metrix));

			let result2 = calculateCR(metrix);
			$("#nilai_ci").val(result2.CI);
			$("#nilai_ri").val(result2.RI);
			$("#nilai_cr").val(result2.CR);

			if (result2.CR < 0.1) {
				$("#keputusan").val("KONSISTEN");
			} else {
				$("#keputusan").val("TIDAK KONSISTEN");
			}
		});
	});
});
