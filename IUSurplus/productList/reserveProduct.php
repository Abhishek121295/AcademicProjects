<?php
// Start the session
session_start();
?>
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

if($_SESSION['isLoggedIn']==false){
  header("location: ../login.php");}

if (isset($_GET['productid'])){
    $ProductId = $_GET['productid'];

    $myQuery = 'select * from iusurplus.product p join iusurplus.images i where i.ProductId = p.ProductId and p.ProductId='.$ProductId;
    $result = mysqli_query($conn, $myQuery);
    $row = mysqli_fetch_assoc($result);
    
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <style>
  body{
      background-image: url("../images/banner.jpg");
      color:#fff
    }
   .spacing {
    padding: 0px 20px ;
  }
  .logopng{
    height:50px;
    border:#fff;
    padding-right: 10px;
  }
  input, select, textarea{
    color: #000;
}
  </style>
</head>

<body class="spacing">

<div class="row">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="../index.php"><img class="logopng" src="../images/logo1.png" alt="#" /></a>

    </div>      
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="../index.php">Home</a></li>
      <li><a href="../about.php">About Us</a></li>
      <li><a href="../contact.php"><span class="glyphicon glyphicon-user "></span>Contact Us</a></li>
      <li>
            <?php
            if ($_SESSION['isLoggedIn'] == true) {
            ?>
              <a href="../logout.php"><span class="glyphicon glyphicon-log-in "></span> Logout</a> <?php
                                                                                                  } else {
                                                                                                    ?>
              <a href="../login.php"><span class="glyphicon glyphicon-log-in "></span> Login</a> <?php
                                                                                                  } ?></li>
    </ul>
  </div>
</nav>
  </div>
<h2>Reserve Product</h2>
<form method="post" action="reserve.php" enctype="multipart/form-data">
<div class="row">
  <div class="col-4 border">
  <div class="card">
      <img class="card-img-top work border" data-bs-toggle="tooltip" title="ProductImage"
      src="<?php echo $row['ImagePath']?>" alt="Product image">
      <div class="card-body">
          <h4 class="card-title"> <?php echo $row['ProductName']?> </h4>
          <h5 class="card-text">Price: $<?php echo $row['ProductPrice']?> </h5>
          </div>

  </div>
  </div>
  </div>

<input type="hidden" name="productId" value=<?php echo $row['ProductId']?> >
<label for="reservationTime">Choose a date for pickup:</label>
  <input type="date"  name="reservationDate"><br>
  <p>Please select your preferred time slot:</p>
  <input type="radio" id="12PM - 12:30PM" name="reservationTime" value="12PM - 12:30PM">
  <label for="12PM - 12:30PM">12PM - 12:30PM</label><br>
<input type="radio" id="12:30PM - 1:00PM" name="reservationTime" value="12:30PM - 1:00PM">
  <label for="12:30PM - 1:00PM">12:30PM - 1:00PM</label><br>
<input type="radio" id="1:00PM - 1:30PM" name="reservationTime" value="1:00PM - 1:30PM">
  <label for="1:00PM - 1:30PM">1:00PM - 1:30PM</label><br>
<input type="radio" id="1:30PM - 2:00PM" name="reservationTime" value="1:30PM - 2:00PM">
  <label for="1:30PM - 2:00PM">1:30PM - 2:00PM</label><br>
<input type="radio" id="2:00PM - 2:30PM" name="reservationTime" value="2:00PM - 2:30PM">
  <label for="2:00PM - 2:30PM">2:00PM - 2:30PM</label><br>
<input type="radio" id="2:30PM - 3:00PM" name="reservationTime" value="2:30PM - 3:00PM">
  <label for="2:30PM - 3:00PM">2:30PM - 3:00PM</label><br>
<input type="radio" id="3:00PM - 3:30PM" name="reservationTime" value="3:00PM - 3:30PM">
  <label for="3:00PM - 3:30PM">3:00PM - 3:30PM</label><br>

<input class="btn btn-primary" type="submit" name="submit" value="Confirm reservation">
<a class="btn btn-danger" href="productlist.php">Go Back</a>


</form>

</body>
</html>
