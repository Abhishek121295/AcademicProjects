<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Products</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  
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

  if (isset($_GET['productCategory'])) {
    $productCategory = $_GET['productCategory'];
    $getinfo = "SELECT * FROM iusurplus.product p join iusurplus.images i where p.productid = i.productid and isReserved = 0 and p.ProductCategory=" . $productCategory;
  } else {
    $getinfo = "SELECT * FROM iusurplus.product p join iusurplus.images i where p.productid = i.productid and isReserved = 0";
  }

  $query = mysqli_query($conn, $getinfo);
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
 <div >
 <div class="row">
    <div class="col-5 border">
      <h1>Product List</h1><label for="productCategory">
        <h6>Filter by category: </h6>
      </label>

      <select name="productCategory" onchange="window.location='productlist.php?productCategory='+ this.value; selected=selected">
        <option value="">Select Category</option>
        <option value="1" <?php if ($_GET['productCategory'] == 1) : ?>selected=selected <?php endif ?>>Tables</option>
        <option value="2" <?php if ($_GET['productCategory'] == 2) : ?>selected=selected <?php endif ?>>Chairs</option>
        <option value="3" <?php if ($_GET['productCategory'] == 3) : ?>selected=selected <?php endif ?>>Lamps</option>
        <option value="4" <?php if ($_GET['productCategory'] == 4) : ?>selected=selected <?php endif ?>>TVs</option>
        <option value="5" <?php if ($_GET['productCategory'] == 5) : ?>selected=selected <?php endif ?>>Laptops and Accessories</option>
      </select>
      <?php
      if (isset($_GET['productCategory'])) {
      ?>
        <a class="btn btn-danger" href="productlist.php">Remove filter</a>
      <?php
      } ?>

    </div>
    <br>
    <div class="col-5">
      <?php
      if ($_SESSION['isAdmin'] == 1) {
      ?>
        <a class="btn btn-primary" href="addProduct.php">Add more products</a>
        <a class="btn btn-primary" href="myreservations.php">View All Reservations</a>
        <a class="btn btn-success" href="messages.php">View All User Messages</a>
        <br><br>

      <?php
      } else {
      ?>

        <a class="btn btn-primary" href="myreservations.php">View My Reservations</a> <br><br>
      <?php
      }
      ?>
    </div>
  </div>
  <?php
  while ($row = mysqli_fetch_assoc($query)) {
  ?>
    <div class="row">
      <div class="col-10 border">
        <div class="card">
          <img  height="200px" width="200px" class="card-img-top work border" data-bs-toggle="tooltip" title="ProductImage" src="<?php echo $row['ImagePath']?>" alt="Product image">
          <div class="card-body">
            <h4 class="card-title"> <?php echo $row['ProductName'] ?> </h4>
            <h6 class="card-text">Price: $<?php echo $row['ProductPrice'] ?> </h6>

            <?php
            if ($_SESSION['isAdmin'] == 0) {
            ?>
              <a class="btn btn-primary" href="reserveProduct.php?productid=<?php echo $row['ProductId'] ?>">Reserve Now </a>
            <?php
            }
            ?>
            <?php
            if ($_SESSION['isAdmin'] == 1) {
            ?>
              <a class="btn btn-info" href="editForm.php?edit=<?php echo $row['ProductId']; ?>">Edit Product </a>
              <a class="btn btn-danger" href="deleteProduct.php?delete=<?php echo $row['ProductId']; ?>" onclick="return confirm('Are you sure you want to delete this product?')">Delete Product </a>
            <?php
            }
            ?>
          </div>
          ========================================================================================= <br><br><br>

        </div>
      </div>
    </div>

    </div>
 
    

  <?
  }
  ?>

</body>

</html>