<?php
session_start();
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if($_SESSION["role"]=='staff' OR $_SESSION["role"]=='store_manager'){
  echo "You do not have permission to do this!<br>";
  echo "<a href=\"javascript:history.go(-1)\">Return to Previous Page</a>";
} else {
	$from = "example@exampleco.com";
	$id = $_POST['id'];
	$subject= $_POST['subject'];
    $body= $_POST['body'];
	$sql = "SELECT supplier_email FROM suppliers WHERE supplier_id = $id";
	$result = $conn->query($sql);
	$value = $result->fetch_assoc();
	$email = $value["supplier_email"];
	$msg= "$body";
    mail($email, $subject, $msg, 'From:' . $from);
	echo "<a href=\"javascript:history.go(-1)\">Return to Previous Page</a>";
}
	

$conn->close();
?>