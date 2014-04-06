
$(function() {
	$( "#songArtist" ).autocomplete({
		source: artists,
		create: function(event, ui) {
			jQuery('.ui-autocomplete').wrap('<span class="autocomplete"></span>');
		}
    });
  });
  
function addArtist() {
	var name =   $("#artistName").val();
	var origin = $("#artistOrigin").val();
	var year =   $("#artistYear").val();
	
	if(name == "") {
		alert("An artist must have a name.");
		return;
	}
	
	$.ajax({
		type: "POST",
		url: "controllers/managestore_c.php",
		data: {"action": "addArtist", "name": name, "origin": origin, "year": year},
		success: function(data) {
			if(data=="success") {
				$("#alert-msg").html("New Artist has been successfully added!");
				$("#alert-container").removeClass("hidden");
				$("#artistName").val("");
				$("#artistOrigin").val("");
				$("#artistYear").val("");
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

function addSong() {
	var name = $("#songName").val();
	var artist = $("#songArtist").val();
	var album = $("#songAlbum").val();
	var length = $("#songLength").val();
	var genre = $("#songGenre").val();
	var price = $("#songPrice").val();
	var artistCheck = $.inArray(artist, artists);
	
	if(name == "") {
		alert("A song must have a name.");
		return;
	}
	if(artistCheck == -1) {
		alert("You must select a pre-existing artist");
		return;
	}
	$.ajax({
		type: "POST",
		url: "controllers/managestore_c.php",
		data: {"action": "addSong", "name": name, "artist": artist, "album": album,
				"length": length, "genre": genre, "price": price},
		success: function(data) {
			if(data=="success") {
				$("#alert-msg-song").html("New Song has been successfully added!");
				$("#alert-container-song").removeClass("hidden");
				$("#songName").val("");
				$("#songLength").val("");
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
