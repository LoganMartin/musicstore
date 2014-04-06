<?php 
	require("database_c.php");
	
	if(isset($_POST['action']) && !empty($_POST['action'])) {
		$action = $_POST['action'];
		switch($action) {
			case 'savewallet': 			saveWallet(); break;
			case 'updateBalance': 		updateBalance(); break;
			case 'deleteAccount':		deleteAccount(); break;
			default: 					break;
		}
	}
	
	function getWallet() {
		$result = mysql_query('SELECT * FROM wallet WHERE user_id = '.$_SESSION['id']);
		$wallet = mysql_fetch_array($result);
		return $wallet;
	}
	
	function saveWallet() {
		session_start();
		$ccnum = $_POST['ccnum'];
		$ccdate = $_POST['ccdate'];
		$cccity = $_POST['cccity'];
		$ccaddress = $_POST['ccaddress'];
		$cczip = $_POST['cczip'];
		$userid = $_SESSION['id'];
		global $connection;
		
		$update = "UPDATE wallet SET cc_num=$ccnum, cc_date='$ccdate', 
					city='$cccity', address='$ccaddress', zipcode='$cczip' 
					WHERE user_id=$userid";			
		if(!mysql_query($update, $connection)) {
			die('Error:'.mysql_error());
		}
		echo "success";
	}
	
	function updateBalance() {
		session_start();
		$operator = $_POST['op'];
		$operand = $_POST['value'];
		$userid = $_SESSION['id'];
		global $connection;
		
		$update = "UPDATE wallet SET balance = balance $operator $operand WHERE user_id=$userid";
		if(!mysql_query($update, $connection)) {
			die('Error:'.mysql_error());
		}
		echo "success";
	}

	function deleteAccount() {
		session_start();
		$userid = $_SESSION['id'];
		global $connection;
		
		$delete = "DELETE FROM user WHERE id = $userid";
		
		if(!mysql_query($delete, $connection)) {
			die('Error:'.mysql_error());
		}
		echo "success";
	}
?>