<?php 
	require("database_c.php");
	
	if(isset($_POST['action']) && !empty($_POST['action'])) {
		$action = $_POST['action'];
		switch($action) {
			case 'getLibrary': 	getLibrary(); break;
			default: 			break;
		}
	}
	
	function getLibrary() {
		global $connection;
		$userID = $_SESSION['id'];
		
		$select = "SELECT * FROM song INNER JOIN artist ON song.artist_id=artist.artist_id
									  INNER JOIN songownership ON song.id=songownership.song_id
									  INNER JOIN user ON songownership.user_id=user.id 
									  WHERE user.id = $userID";
	
		if(!$result = mysql_query($select, $connection)) {
			die('Error:'.mysql_error());
		}
		
		$tableData = "<table id='results-table' class='table table-striped table-hover'>
						<thead>
							<tr>
								<th width='25%'>Name</th>
								<th width='6%'>Time</th>
								<th width='25%'>Artist</th>
								<th width='25%'>Album</th>
								<th width='19%'>Genre</th>
							</tr>
						</thead>
						<tbody>";
	
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$tableData .= '<tr><td>'.$row['name'].'</td>';
			$tableData .= '<td>'.$row['length'].'</td>';
			$tableData .= '<td>'.$row['artist_name'].'</td>';
			$tableData .= '<td>'.$row['album'].'</td>';
			$tableData .= '<td>'.$row['genre'].'</td></tr>';
		}
		echo $tableData;
	}
?>