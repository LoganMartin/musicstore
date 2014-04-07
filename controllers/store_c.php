<?php 
	require("database_c.php");
	
	if(isset($_POST['action']) && !empty($_POST['action'])) {
		$action = $_POST['action'];
		switch($action) {
			case 'searchStore': 	searchStore(); break;
			case 'getArtist': 		getArtist(); break;
			case 'buySong': 		buySong(); break;
			default: 				break;
		}
	}
	
	function searchStore() {
		global $connection;
		session_start();
		$query = $_POST['query'];
		
		$select = "SELECT * FROM song INNER JOIN artist ON song.artist_id=artist.artist_id WHERE artist_name LIKE '%$query%' OR name LIKE '%$query%' OR album LIKE '%$query%'";
		if(!$result = mysql_query($select, $connection)) {
			die('Error:'.mysql_error());
		}
		
		$tableData = "<table id='results-table' class='table table-striped table-hover'>
						<thead>
							<tr>
								<th width='22%'>Name</th>
								<th width='6%'>Time</th>
								<th width='22%'>Artist</th>
								<th width='22%'>Album</th>
								<th width='16%'>Genre</th>
								<th width='12%'>Buy</th>
							</tr>
						</thead>
						<tbody>";
		
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$owned = checkOwnership($row['id']);
			$tableData .= '<tr><td>'.$row['name'].'</td>';
			$tableData .= '<td>'.$row['length'].'</td>';
			$tableData .= '<td class="artist-cell">'.$row['artist_name'].'</td>';
			$tableData .= '<td>'.$row['album'].'</td>';
			$tableData .= '<td>'.$row['genre'].'</td>';
			if(!$owned) {
				$tableData .= '<td><button id="buy'.$row['id'].'" type="button" class="btn btn-success" onclick="buySong('.$row['id'].')">$'.$row['price'].'</button></td></tr>';
			}
			else {
				$tableData .= '<td><button id="buy'.$row['id'].'" type="button" class="btn btn-success" disabled="disabled">Purchased</button></td></tr>';
			}
		}
		$tableData .= "</tbody></table>";
		echo $tableData;
	}
	
	function getArtist() {
		global $connection;
		$artistName = $_POST['artistName'];
		
		$select = "SELECT * FROM artist WHERE artist_name = '$artistName'";
		
		if(!$result = mysql_query($select, $connection)) {
			die('Error:'.mysql_error());
		}
		
		$result = mysql_fetch_array($result, MYSQL_ASSOC);
		echo json_encode($result);
	}
	
	function buySong() {
		session_start();
		global $connection;
		$songID = $_POST['songID'];
		$songPrice = $_POST['price'];
		$userID = $_SESSION['id'];
		
		$balance = getBalance();
		$newBal = $balance - $songPrice;
		
		if($newBal < 0) {
			echo "You do not have the sufficient funds. Please add more funds to your wallet.";
			return;
		}
		updateBalance($newBal);
		$insert = "INSERT INTO songownership (user_id, song_id)
					VALUES ($userID, $songID)";
		
		if(!mysql_query($insert, $connection)) {
			die('Error:'.mysql_error());
		}		
		echo "success";
	}
	
	function checkOwnership($songID) {
		$userID = $_SESSION['id'];
		
		$result = mysql_query("SELECT * FROM songownership WHERE user_id=$userID AND song_id=$songID");
		$num_rows = mysql_num_rows($result);
		
		if($num_rows==0) {
			return false;
		}
		else {
			return true;
		}
	}
	
	function getBalance() {
		$userID = $_SESSION['id'];
		
		$result = mysql_query("SELECT balance FROM wallet WHERE user_id=$userID");
		$wallet = mysql_fetch_array($result);
		return $wallet['balance'];
	}
	
	function updateBalance($newBal) {
		$userID = $_SESSION['id'];
		
		mysql_query("UPDATE wallet SET balance=$newBal WHERE user_id=$userID");
	}
?>