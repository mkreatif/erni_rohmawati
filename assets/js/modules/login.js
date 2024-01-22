$(document).ready(function () {
	$("#loginForm").validate({
		// Specify validation rules for your form fields
		rules: {
			username: {
				required: true,
				// Add other validation rules for the username field
			},
			passwordEl: {
				required: true,
			},
			// Add rules for other fields as needed
		},
	});

	$("#loginForm").submit(function (event) {
		// Prevent the default form submission
		event.preventDefault();
		var username = $("#username").val();
		var password = $("#passwordEl").val();

		var formData = new FormData();
		formData.append("Username", username);
		formData.append("Password", password);

		var slug = base_url + "login/sign_in";
		console.log(slug);

		// Make an AJAX request
		$.ajax({
			type: "POST",
			url: slug,
			data: {
				Username: username,
				Password: password,
			},
			dataType: "json",
			success: function (response) {
				console.log(response["data2"]);
				console.log(response["data"]);
				alert(response["message"]);
			},
			error: function (error) {
				console.log(error);
				alert("Error submitting data");
			},
		});
	});

	// // Attach a click event to the submit button
	// $("#submitBtn").click(function () {
	// 	if ($("#loginForm").valid()) {
	// 		// Get the form data
	// 		var username = $("#username").val();
	// 		var password = $("#passwordEl").val();

	// 		var formData = new FormData();
	// 		formData.append("Username", username);
	// 		formData.append("Password", password);

	// 		var slug = base_url + "login/sign_in";
	// 		console.log(slug);

	// 		// Make an AJAX request
	// 		$.ajax({
	// 			type: "POST",
	// 			url: slug,
	// 			data: {
	// 				Username: username,
	// 				Password: password,
	// 			},
	// 			dataType: "json",
	// 			success: function (response) {
	// 				console.log(response["data2"]);
	// 				console.log(response["data"]);
	// 				alert(response["message"]);
	// 			},
	// 			error: function (error) {
	// 				console.log(error);
	// 				alert("Error submitting data");
	// 			},
	// 		});
	// 	}
	// });
});
