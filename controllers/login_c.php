<?php
	session_start();
	require("database_c.php");
	require("password.php");
	
	if(isset($_POST['action']) && !empty($_POST['action'])) {
		$action = $_POST['action'];
		switch($action) {
			case 'register': 	register(); break;
			case 'login': 		login(); break;
			default: 			break;
		}
	}
	else {
		echo "Error: Function not found";
	}
	
	function register() {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		global $connection;
		
		$usernameCheck = mysql_query("SELECT * FROM user WHERE username = '$username'");
		$num_rows = mysql_num_rows($usernameCheck);
		
		if($num_rows>0) {
			echo "<strong>Error:</strong> That username has already been registered";
		}
		else { 
			$hashword = password_hash($password, PASSWORD_BCRYPT);
			$insert = "INSERT INTO user (username, fullname, password) 
						VALUES ('$username', '$name', '$hashword')";
						
			if(!mysql_query($insert, $connection)) {
				die('Error:'.mysql_error());
			}
			createWallet($username);			
			echo "success";
		}
	}
	
	function login() {
		$username = $_POST['username'];
		$password = $_POST['password'];
		global $connection;
		
		$login = mysql_query("SELECT * FROM user WHERE username = '$username'");
		$num_rows = mysql_num_rows($login);
		
		if($num_rows==0) {
			echo "<strong>Error:</strong> No account with that username exists!";
		}
		else {
			$user = mysql_fetch_array($login);
			if(password_verify($password, $user['password'])) {
				$_SESSION['id'] = $user['id'];
				$_SESSION['username'] = $user['username'];
				$_SESSION['usertype'] = $user['usertype'];
				echo "success";
			}
			else {
				echo "<strong>Error:</strong> Incorrect Password!";
			}
		}
	}
	
	function createWallet($username) {
		global $connection;
		
		mysql_query("INSERT INTO wallet (user_id) SELECT id FROM user WHERE username='$username' LIMIT 1");
	}

?>