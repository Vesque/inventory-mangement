<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Store Management</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
	
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Management Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../index.html">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="index.html">Overview </a></li>
            <li><a href="viewSKU.html">View SKU Information</a></li>
            <li><a href="viewStock.html">View SKU Stock</a></li>
            <li><a href="viewInventory.php">View Complete Inventory Info</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="setStock.html">Set Stock Quantity</a></li>
            <li><a href="orderStock.html">Order Stock</a></li>
            <li><a href="setDiscountPrices.html">Set Discount Prices</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="viewStaff.html">View Staff Info</a></li>
            <li class="active"><a href="editStaff.html">Edit Staff Info<span class="sr-only">(current)</span></a></li>
            <li><a href="viewSuppliers.php">View Suppliers</a></li>
			<li><a href="addSupplier.html">Add Supplier Info</a></li>
          </ul>
		  <ul class="nav nav-sidebar">
            <li><a href="viewStores.php">View Stores</a></li>
            <li><a href="editStores.html">Edit Store Info</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Welcome to the Store Management System</h1>

          <div class="row placeholders">
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
		$staff_id = $_POST['staff_id'];
		$position = $_POST['position'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$phone_number = $_POST['phone_number'];
		$email_address = $_POST['email_address'];
		$wage = $_POST['wage'];
		
		$sql = "UPDATE staff SET position = '$position', first_name = '$first_name', last_name = '$last_name', phone_number = '$phone_number', email_address = '$email_address', wage = $wage where staff_id = $staff_id";
		if ($conn->query($sql) === TRUE) {
		echo "<br/>"; // new line
		echo "Update successful<br>";
		echo "<a href=\"javascript:history.go(-1)\">Return to Previous Page</a>";
	} else {
		echo "<br/>"; // new line 
		echo "Error accessing database: <br>" . $conn->error;
		echo "<a href=\"javascript:history.go(-1)\">Return to Previous Page</a>";
	}
			
}

$conn->close();
?>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>