<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grocery_store";
// Create connection
$conn = mysql_connect($servername, $username, $password)
// Check connection
or die ('Could not connect: ' . mysql_error());
mysql_select_db($dbname) or die('Could not select database');
	
	function SignIn() {
		session_start();
		if(!empty($_POST['user'])) {			
			$query = mysql_query("SELECT * FROM login where username = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error());
			$row = mysql_fetch_array($query) or die(mysql_error());
			if(!empty($row['username']) AND !empty($row['pass'])) {
				$_SESSION['username'] = $row['pass'];
				$_SESSION['role'] = $row['username'];
				header('Location: main');
			} else {
				echo 'Login failed!';
			}
		}
	}
	
	if(isset($_POST['submit'])) {
		SignIn();
	}
?>