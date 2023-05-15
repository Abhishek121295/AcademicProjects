<?php

// Script to receive contact form data and insert them into a MySQL database (WAMP Server)

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Set connection parameters
	$servername = "localhost";
	$username = "root";
	$password = "root";

	// Establish connection
	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Retrieve form data
	$productName = $_POST['productName'];
	$productCategory = $_POST['productCategory'];
	$productPrice = $_POST['productPrice'];

	// Construct a SQL query
	// Note that you need to specify the DB name (in this case 'alisdb') before the table name 
	$myQuery = "INSERT INTO iusurplus.product (ProductName, ProductCategory, ProductPrice) VALUES ('".$productName."','".$productCategory."','".$productPrice."')";

	// Execute the query
	if (mysqli_query($conn, $myQuery)) {
		echo "<br> Product added successfully.";
	} else {
		echo "Error: " . $myQuery . "<br>" . mysqli_error($conn);
	}

}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<body>
	<head>
		<style>
			body{
      background-image: url("../images/banner.jpg");
      color:#fff
    }
	input, select, textarea{
    color: #000;
}
		</style>
	</head>
    <br>
	<form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image"/>
        <input type="submit" name="submit" value="UPLOAD"/>
    </form>
</body>
</html>	