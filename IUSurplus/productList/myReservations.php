
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

// $userid = $_SESSION['userId'];
// $getinfo = "SELECT * FROM iusurplus.reservation where userId=".$userid;  //implement after user part

if ($_SESSION['isAdmin'] == 0) {
  $useridQuery = "select * from iusurplus.user where email='" . $_SESSION['user'] . "'";
  $result = mysqli_query($conn, $useridQuery);
  $row = mysqli_fetch_assoc($result);
  $getinfo = "SELECT * FROM iusurplus.reservation r join iusurplus.product p join iusurplus.images i where r.ProductId = p.ProductId and p.ProductId = i.ProductId and r.UserId=" . $row['userId'];
  $query = mysqli_query($conn, $getinfo);
} else {
  
  $getinfo = "SELECT * FROM iusurplus.reservation r join iusurplus.product p join iusurplus.images i join iusurplus.user u where r.ProductId = p.ProductId and p.ProductId = i.ProductId and r.userId = u.userId";
  $query = mysqli_query($conn, $getinfo);
}


// pre_r($query);
// pre_r($query->fetch_assoc());


//func to check the contents returned by the sql query
function pre_r($array)
{
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/main.css">

  <!-- CSS only -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <!-- JavaScript Bundle with Popper -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
  <style>
    body{
      background-image: url("../images/banner.jpg");
      color:#fff
    }
    input, select, textarea{
    color: #000;
}
    .spacing {
    padding: 0px 20px ;
  }
  .logopng{
    height:50px;
    border:#fff;
    padding-right: 10px;
  }
  </style>
</head>

<body class="spacing" >
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
  
  <div >
  <div class="row ">
    <div class="col-5 border">
      <?php
      if ($_SESSION['isAdmin'] == 0) {
      ?>
        <h1>My Reservations</h1>
      <?php
      } else {
      ?>
        <h1>All Reservations</h1>
      <?php
      }
      ?>
    </div>
  </div>

  <?php
  if (mysqli_num_rows($query) > 0 && $_SESSION['isAdmin'] == 0) {
    while ($row = mysqli_fetch_assoc($query)) {
  ?>
      <div class="row">
        <div class="col-5 border">
          <div class="card">
            <img class="card-img-top work border" data-bs-toggle="tooltip" title="ProductImage" src="<?php echo $row['ImagePath']?>" alt="Product image">
            <div class="card-body">
              <h4 class="card-title"> <?php echo $row['ProductName'] ?> </h4>
              <h6 class="card-text">Price: $<?php echo $row['ProductPrice'] ?> </h6>
              <h6 class="card-text">Pickup Date: <?php echo $row['ReservedDate'] ?> </h6>
              <h6 class="card-text">Pickup Time Slot: <?php echo $row['ReservedTimeSlot'] ?> </h6>
              <a class="btn btn-danger" href="cancelReservation.php?reservationId=<?php echo $row['ReservationId'] ?>&productId=<?php echo $row['ProductId'] ?>" onclick="return confirm('Are You Sure you want to cancel this reservation?')">Cancel Reservation </a>
            </div>

          </div>
          ========================================================================================= <br><br><br>

        </div>
      </div>

    <?php
    }
  } else if (mysqli_num_rows($query) > 0 && $_SESSION['isAdmin'] == 1) {
    while ($row = mysqli_fetch_assoc($query)) {
    ?>
      <div class="row">
        <div class="col-5 border">
          <div class="card">
            <img class="card-img-top work border" data-bs-toggle="tooltip" title="ProductImage" src="" alt="Product image">
            <div class="card-body">
              <h4 class="card-title"> <?php echo $row['ProductName'] ?> </h4>
              <h6 class="card-text">User email: <?php echo $row['email'] ?> </h6>
              <h6 class="card-text">Price: $<?php echo $row['ProductPrice'] ?> </h6>
              <h6 class="card-text">Pickup Date: <?php echo $row['ReservedDate'] ?> </h6>
              <h6 class="card-text">Pickup Time Slot: <?php echo $row['ReservedTimeSlot'] ?> </h6>
              <a class="btn btn-danger" href="cancelReservation.php?reservationId=<?php echo $row['ReservationId'] ?>&productId=<?php echo $row['ProductId'] ?>" onclick="return confirm('Are You Sure you want to cancel this reservation?')">Cancel Reservation </a>
            </div>
          </div>
          ========================================================================================= <br><br><br>

        </div>
      </div>
    <?php
    }
  } else {
    ?>
    <h6 class="card-text"> No reservations found.</h6>

  <?php
  }
  ?>

  <div class="row">
    <div class="col-4">
      <a class="btn btn-primary" href="productlist.php">Go to Products List </a>

    </div>

  </div>

  </div>
  


</body>

</html>