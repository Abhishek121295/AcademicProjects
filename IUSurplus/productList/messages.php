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

if ($_SESSION['isAdmin'] == 1) {
  $messageQuery = "select * from iusurplus.contactus";
  $result = mysqli_query($conn, $messageQuery);
  $row = mysqli_fetch_assoc($result);
} 

// pre_r($result);
// pre_r(mysqli_fetch_assoc($result));


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
      <h1> User Messages</h1>
    </div>
  </div>

  <?php
  if (mysqli_num_rows($result) > 0 && $_SESSION['isAdmin'] == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
  ?>
      <div class="row">
        <div class="col-5 border">
          <div class="card">
            <div class="card-body">
              <h4 class="card-text">User Name: <?php echo $row['name'] ?> </h4>
              <h4 class="card-text">User Phone: <?php echo $row['phoneNumber'] ?> </h4>
              <h4 class="card-text">User Email: <?php echo $row['emailAddress'] ?> </h4>
              <p class="card-text">User Message: <b> <?php echo $row['message'] ?> </b>  </p>
              
            </div>

          </div>
          ========================================================================================= <br><br><br>

        </div>
      </div>

    <?php
    }
    ?>
    <div class="row">
    <div class="col-4">
      <a class="btn btn-primary" href="../index.php">Go to Home Page </a>

    </div>

  </div>
    <?php
  }  else {
    ?>
    <h6 class="card-text"> No messages found.</h6>

  <?php
  }
  ?>

  

  </div>
  


</body>

</html>