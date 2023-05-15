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

if (isset($_GET['edit'])){
    $ProductId = $_GET['edit'];

    $myQuery = 'select * from iusurplus.product where ProductId='.$ProductId;
    $result = mysqli_query($conn, $myQuery);
    $row = mysqli_fetch_assoc($result);
    
}
?>

<style>
  body{
      background-image: url("../images/banner.jpg");
      color:#fff
    }
    input, select, textarea{
    color: #000;
}
  .spacing {
    padding-left: 10px ;
    padding-right: 10px;
  }
  .logopng{
    height:50px;
    border:#fff;
    padding-right: 10px;
  }
  
  .tooltip1 {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
  
}

.tooltip1 .tooltiptext1 {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip1:hover .tooltiptext1 {
  visibility: visible;
}


</style>

<!-- CSS only -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
<h2> <b>Edit product</b></h2>
<form method="post" action="editProduct.php" enctype="multipart/form-data">
<input type="hidden" name="productId" value=<?php echo $row['ProductId']?> >
<b>productName</b> <input type="text" name="productName" value="<?php echo $row['ProductName']?>" >
  <br><br>
  <b>productCategory</b><input type="text" name="productCategory" value="<?php echo $row['ProductCategory'] ?>"> 
  <div class="tooltip1 "><p class="help">help?</p>
  <span class="tooltiptext1"><p>for Table: 1; Chair: 2; Lamp: 3; TV: 4; Computer Accessories: 5</p></span>
</div>
  <br><br>
  <b>productPrice</b> <input type="text" name="productPrice" value="<?php echo $row['ProductPrice'] ?>">
  <br><br>
  <input class="btn btn-primary" type="submit" name="submit" value="Edit Product">
  <a class="btn btn-info" href="productlist.php">Go Back</a>

</form>

</body>
</html>
