$(document).ready(function () {
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
		// render to html
		$(`#${inverseMatrixId.join("_")}`).val(inverseValue);

		console.log(`${inverseMatrixId} : ${inverseValue}`);
		console.log(metrix);
	});
});
