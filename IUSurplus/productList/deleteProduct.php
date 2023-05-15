<?php
//DB details
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = 'root';

//Create connection and select DB
// Establish connection
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['delete'])){
    $ProductId = $_GET['delete'];

    $myQuery = 'delete from iusurplus.product where ProductId='.$ProductId;
    $myQuery2 = 'delete from iusurplus.images where ProductId='.$ProductId;

    // Execute the query
	if (mysqli_query($conn, $myQuery) && mysqli_query($conn, $myQuery2)) {
		echo "<br> Product deleted successfully.";
	} else {
		echo "Error: " . $myQuery . "<br>" . mysqli_error($conn);
	}
    header("location: productlist.php");
}
?>

