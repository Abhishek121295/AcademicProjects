

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
	$name = $email  = $phone= $password= $passwordcheck = "";


  $name = test_input($_POST["username"]);
  $phone = test_input($_POST["phone"]);
  $email = test_input($_POST["email"]);
  $password= test_input($_POST["psw"]);
  $passwordcheck= test_input($_POST["psw-repeat"]);



	

 // if ($passwordcheck != $password) {
 //   echo "Error: Passwords don't match ";
 // }

// $getinfo = "SELECT * FROM test.userpass";
// // $getinfo = "SELECT * FROM iusurplus.product";
// $query = mysqli_query($conn, $getinfo);
// pre_r($query);
// pre_r($query->fetch_assoc());


//func to check the contents returned by the sql query
// function pre_r($array){
//   echo '<pre>';
//   print_r($array);
//   echo '</pre>';
// }




     //$sql = "SELECT * FROM test.userpass ";
     $sql = "SELECT * FROM test.userpass WHERE email ='".$email."'";
     $result = mysqli_query($conn,$sql);
     //$row = mysqli_fetch_assoc($result);
	 $count = mysqli_num_rows($result);
     //echo $row['username'];
	 //echo $count;

    if ($count<1 and $password==$passwordcheck) {
		// Construct a SQL query
 
	$myQuery = "INSERT INTO test.userpass (username, phone, email, password ) VALUES ('".$name."','".$phone."','".$email."','".$password."')";

	// Execute the query
	if (mysqli_query($conn, $myQuery)) {
		echo "<br> Succesfully registered.";
	} 
	else {
		echo "Error: " . $myQuery . "<br>" . mysqli_error($conn);
	}

	}
	else {
		echo "Error: Either email already in use or passwords don't match on the signup page";
	}
	

}

mysqli_close($conn);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thank You </title>
</head>
<body>
<br>
<br>
<a  href="login.php">Go back to Login</a> <br>
<br>
<a  href="signup.php">Go back to signup</a>
</body>
</html>