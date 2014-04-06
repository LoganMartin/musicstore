	
	$(".active").removeClass("active");
	
	function saveWallet() {
		var ccnum = 	$("#ccnum").val();
		var ccdate = 	$("#ccdate").val();
		var cccity = 	$("#cccity").val();
		var ccaddress = $("#ccaddress").val();
		var cczip = 	$("#cczip").val();
		
		if(isNaN(ccnum)) {
			alert("Please enter a valid credit card number(No spaces).");
			return;
		}
		else if(ccnum=="") {
			ccnum="NULL";
		}
		$.ajax({
			type: "POST",
			url: "controllers/wallet_c.php",
			data: {"action": "savewallet", "ccnum": ccnum, "ccdate": ccdate, "cccity": cccity,
				   "ccaddress": ccaddress, "cczip": cczip},
			success: function(data) {
				if(data=="success") {
					$("#alert-msg").html("Your wallet has been updated!");
					$("#alert-container").removeClass("hidden");
				}
				else {
					alert(data);
				}
			},
			error: function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
	}

	function addFunds(addedFunds) {
		$.ajax({
			type: "POST",
			url: "controllers/wallet_c.php",
			data: {"action": "updateBalance", "op": "+", "value": addedFunds},
			success: function(data) {
				if(data=="success") {
					var currBal = $("#balance-value").html();
					currBal = parseFloat(currBal);
					var newBal = parseFloat(currBal + addedFunds);
					$("#balance-value").html(newBal.toFixed(2));
					
					$("#alert-msg").html("Funds successfully added!");
					$("#alert-container").removeClass("hidden");
					$('#funds-modal').modal('hide');
					
				}
				else {
					alert(data);
				}
			},
			error: function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
	}
	
	function deleteAccount() {
		if(confirm("Are you sure you want to delete your account?\n" +
					"This will permanently delete your purchases.")) {
			$.ajax({
				type: "POST",
				url: "controllers/wallet_c.php",
				data: {"action": "deleteAccount"},
				success: function(data) {
					if(data=="success") {
						window.location = "login.php";
					}
					else {
						alert(data);
					}
				},
				error: function(xhr) {
					alert("An error occured: " + xhr.status + " " + xhr.statusText);
				}
			});
		}
	}
