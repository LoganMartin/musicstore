$("#search-field").keydown(function(event) {
	if(event.keyCode == 13) {
		$("#search-btn").click();
	}
});

function searchStore() {
	var query = $("#search-field").val();
	if(query == "") {
		alert("You must input something to search for!");
		return;
	}
	$.ajax({
		type: "POST",
		url: "controllers/store_c.php",
		data: {"action": "searchStore", "query": query},
		success: function(data) {
			$("#table-container").html(data);
			$("#results-table").tablesorter();
		},
		error: function(xhr) {
			alert("An error occured: " + xhr.status + " " + xhr.statusText);
		}
	});
}

function buySong(songID) {
	var price = $("#buy"+songID).text();
	price = price.replace("$", "");
	price = parseFloat(price);
	$.ajax({
		type: "POST",
		url: "controllers/store_c.php",
		data: {"action": "buySong", "songID": songID, "price": price},
		success: function(data) {
			if(data=="success") {
				$("#buy"+songID).attr("disabled", "disabled");
				$("#buy"+songID).html("Purchased");
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

$(document).on("click", '.artist-cell', function(){ 
	var artistName = $(this).text();
	
	$.ajax({
		type: "POST",
		url: "controllers/store_c.php",
		data: {"action": "getArtist", "artistName": artistName},
		success: function(data) {
			var info = eval("(" + data + ")");
			$("#artistName").text(info['artist_name']);
			$("#artistOrigin").text(info['origin']);
			$("#artistYear").text(info['start_year']);
			$('#artist-modal').modal('show');
		},
		error: function(xhr) {
			alert("An error occured: " + xhr.status + " " + xhr.statusText);
		}
	});
});
