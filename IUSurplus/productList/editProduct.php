<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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

	// // echo "Connected successfully! ";

	// Retrieve form data
    $productId = $_POST['productId'];
	$productName = $_POST['productName'];
	$productCategory = $_POST['productCategory'];
	$productPrice = $_POST['productPrice'];

	// Construct a SQL query
	// Note that you need to specify the DB name (in this case 'alisdb') before the table name 
	$myQuery = "update iusurplus.product set ProductName='".$productName."', ProductCategory='".$productCategory."', ProductPrice=".$productPrice." where ProductId=".$productId."";

	// Execute the query
	if (mysqli_query($conn, $myQuery)) {
		echo "<br> <h6> Product edited successfully. </h6>";
	} else {
		echo "Error: " . $myQuery . "<br>" . mysqli_error($conn);
	}

}

mysqli_close($conn);
?>

<br> <a class="btn btn-primary" href="productlist.php" >Go back to Products list.</a>