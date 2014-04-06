/**  
 * When the "Enter" key is clicked for each of these fields
 * it emulates the sign-in button being pressed 
 */
	$("#loginUsername").keydown(function(event) {
		if(event.keyCode == 13) {
			$("#signin-button").click();
		}
	});
	
	$("#registerName").keydown(function(event) {
		if(event.keyCode == 13) {
			$("#signin-button").click();
		}
	});

	$("#loginPassword").keydown(function(event) {
		if(event.keyCode == 13) {
			$("#signin-button").click();
		}
	});
	
	$("#loginPasswordCheck").keydown(function(event) {
		if(event.keyCode == 13) {
			$("#signin-button").click();
		}
	});
	
	//Verifies that the username and passwords are valid, and then passes the data to the php controllers to be
	//Entered into the database.
	function verifyRegistration() {
		var name = $("#registerName").val();
		var username = $("#loginUsername").val();
		var password = $("#loginPassword").val();
		var passwordCheck = $("#loginPasswordCheck").val();
		
		if(username==""){
			alert("Please enter a valid username.");
		}
		else if(name=="") {
			alert("You must enter a name");
		}
		else if(password==""){
			alert("You must enter a password");
		}
		else if (password!=passwordCheck) {
			alert("Error: passwords do not match");
		}
		else {
			$.ajax({
				type: "POST",
				url: "controllers/login_c.php",
				data: {"action": "register","name": name, "username": username, "password": password},
				success: function(data) {
					if(data=="success") {
						var successMessage = "<strong>Success! </strong>Click <a href='login.php' class='alert-link'>Here</a> to log in." 
						$("#error-alert").append(successMessage);
						$("#error-div").removeClass("hidden");
						$("#signin-button").addClass("hidden");
					}
					else {
						$("#error-alert").removeClass("alert-success");
						$("#error-alert").addClass("alert-danger");
						$("#error-alert").html(data);
						$("#error-div").removeClass("hidden");
					}
				},
				error: function(xhr) {
					alert("An error occured: " + xhr.status + " " + xhr.statusText);
				}
			});
		}
	}
	
	function verifyLogin() {
		var username = $("#loginUsername").val();
		var password = $("#loginPassword").val();
		
		if(username==""){
			alert("You must enter a username");
		}
		else if(password==""){
			alert("You must enter a password");
		}
		else {
			$.ajax({
				type: "POST",
				url: "controllers/login_c.php",
				data: {"action": "login", "username": username, "password": password},
				success: function(data) {
					if(data=="success") {
						window.location = "library.php";
					}
					else {
						$("#error-alert").html(data);
						$("#error-div").removeClass("hidden");
					}
				},
				error: function(xhr) {
					alert("An error occured: " + xhr.status + " " + xhr.statusText);
				}
			});
		}
	}
