<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<style>
  body{
      background-image: url("../images/banner.jpg");
      color:#fff
    }
    input, select, textarea{
    color: #000;
}
  .spacing {
    padding-left: 10px;
    padding-right: 10px;
  }

  .logopng {
    height: 50px;
    border: #fff;
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
                                                                                                  } ?>
          </li>
        </ul>
      </div>
    </nav>
  </div>


  <h2><b>Add new product: </b></h2>
  <form method="post" action="dbinsert.php" enctype="multipart/form-data">
    <b>productName: </b> <input type="text" name="productName">
    <br><br>
    <b>productCategory: </b> 
    <select name="productCategory" >
        <option value="">Select Category</option>
        <option value=1>Table</option>
        <option value=2>Chair</option>
        <option value=3>Lamp</option>
        <option value=4>TV</option>
        <option value=5>Laptops and Accessories</option>
      </select>
    
    <br><br>
    <b>productPrice: </b> <input type="text" name="productPrice">
    <br><br>
    <input class="btn btn-primary" type="submit" name="submit" value="Add Product">
    <a class="btn btn-danger" href="productlist.php" name="submit" value="">Cancel</a>
  </form>

</body>

</html>