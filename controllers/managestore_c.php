<?php 
	require("database_c.php");
		
	if(isset($_POST['action']) && !empty($_POST['action'])) {
		$action = $_POST['action'];
		switch($action) {
			case 'addArtist': 			addArtist(); break;
			case 'addSong':				addSong(); break;
			default: 					break;
		}
	}
	
	function addArtist() {
		$name =   $_POST['name'];
		$origin = $_POST['origin'];
		$year =   $_POST['year'];
		global $connection;
		
		$insert = "INSERT INTO artist (name, origin, start_year) 
					VALUES ('$name', '$origin', '$year')";
					
		if(!mysql_query($insert, $connection)) {
			die('Error:'.mysql_error());
		}		
		echo "success";
	}
	
	function addSong() {
		$name = 	$_POST['name'];
		$artist = 	$_POST['artist'];
		$album = 	$_POST['album'];
		$length = 	$_POST['length'];
		$genre = 	$_POST['genre'];
		$price = 	$_POST['price'];
		global $connection;
		
		$result = mysql_query("SELECT id FROM artist WHERE name = '$artist'");
		$artist = mysql_fetch_array($result);
		$artistid = $artist['id'];
		
		$insert = "INSERT INTO song (name, length, genre, price, album, artist_id)
					VALUES ('$name', '$length', '$genre', $price, '$album', $artistid)";
		if(!mysql_query($insert, $connection)) {
			die('Error:'.mysql_error());
		}		
		echo "success";
	}
	
	function getArtistsArray() {
		$i=0;
		$artist = array();
		
		$result = mysql_query('SELECT name FROM artist');
		
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$artist[$i] = $row['name'];
			$i++;
		}
		return json_encode($artist);
	}
?>