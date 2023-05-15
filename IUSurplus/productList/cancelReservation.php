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

if (isset($_GET['reservationId']) && isset($_GET['productId']) ){
    $reservationId = $_GET['reservationId'];
    $productId = $_GET['productId'];

    $myQuery = 'delete from iusurplus.reservation where ReservationId='.$reservationId;
    $myQuery2 = 'update iusurplus.product set IsReserved = 0 where ProductId='.$productId;

    // Execute the query
	if (mysqli_query($conn, $myQuery) && mysqli_query($conn, $myQuery2)) {
		echo "<br> Reservation cancelled successfully.";
	} else {
		echo "Error: " . $myQuery . "<br>" . mysqli_error($conn);
	}
    // header("location: productlist.php");
}
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <a class="btn btn-danger" href="myReservations.php">Go Back</a>


