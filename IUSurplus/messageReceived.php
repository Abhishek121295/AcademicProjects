

<?php

// Script to receive contact form data and insert them into a MySQL database (WAMP Server)

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 


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
	$name = $email  = $phone= $message = "";


  $name = test_input($_POST["name"]);
  $phone = test_input($_POST["phoneNumber"]);
  $email = test_input($_POST["emailAddress"]);
  $message = test_input($_POST["message"]);

    
 
	$myQuery = "INSERT INTO iusurplus.contactus (name, phoneNumber, emailAddress, message ) VALUES ('".$name."','".$phone."','".$email."','".$message."')";

	

	// Execute the query
	if (mysqli_query($conn, $myQuery)) {
		echo "<br> Message succesfully sent.Thank you for contacting us.";
	} 
	else {
		echo "Error: " . $myQuery . "<br>" . mysqli_error($conn);
	}

	}
	


mysqli_close($conn);

?>


<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thank You for contacting us </title>
	<style>
		body{
      background-image: url("../images/banner.jpg")
      
    }
	</style>
</head>
<body>
<br>
<br>
<a class="btn btn-primary"  href="index.php">Go back to Home<br>
</body>
</html>