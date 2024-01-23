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

		var slug = base_url + "login/sign_in";
		console.log(slug);

		// Make an AJAX request
		$.ajax({
			type: "POST",
			url: slug,
			data: {
				username: username,
				password: password,
			},
			dataType: "json",
			success: function (response) {
				console.log(response["data2"]);
				console.log(response["data"]);
				if(response['status'] == "failed"){
					showInfo(response["message"]);
				}else{
					window.location.href = base_url + "dashboard";
				}
			},
			error: function (error) {
				console.log(error);
				showInfo("Error submitting data");
			},
		});
	});

	 
});
