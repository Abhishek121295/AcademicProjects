
<?php
// Start the session
session_start();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

    // Retrieve form data
	// $userId = $_SESSION['UserId'];  //Implement when user part created
	$productId = $_POST['productId'];
	$reservationDate = $_POST['reservationDate'];
	$reservationTime = $_POST['reservationTime'];

    $useridQuery = "select * from iusurplus.user where email='".$_SESSION['user']."'";
   
    $result = mysqli_query($conn, $useridQuery);
    $row = mysqli_fetch_assoc($result);

    $myQuery = 'insert into iusurplus.reservation(userId,ProductId,ReservedDate,ReservedTimeSlot) values ('.$row['userId'].','.$productId.',"'.$reservationDate.'","'.$reservationTime.'")';
    $myQuery2 = 'update iusurplus.product set IsReserved = 1 where ProductId='.$productId;

    

    // Execute the query
    if (mysqli_query($conn, $myQuery) && mysqli_query($conn, $myQuery2)) {
        echo "<br> Product reserved successfully. Your chosen date is: ".$reservationDate." and your chosen time slot is: ".$reservationTime.". Please make sure to arrive on time.";
    } else {
        echo "Error: " . $myQuery . "<br>" . mysqli_error($conn);
    }

}
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">



<br><a class="btn btn-primary" href="productlist.php">Go back to Products list.</a>