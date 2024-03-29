<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <!-- site metas -->
    <title>Surplus Store</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
    <!-- Tweaks for older IEs-->
    <link
      rel="stylesheet"
      href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen"
    />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script
    ><![endif]-->
  </head>
  <!-- body -->
  <body class="main-layout inner_posituong contact_page">
    <!-- loader  -->
    <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
      <!-- header inner -->
      <div class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
              <div class="full">
                <div class="center-desk">
                  <div class="logo">
                    <a href="index.php"
                      ><img src="images/logo.png" alt="#"
                    /></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
              <nav class="navigation navbar navbar-expand-md navbar-dark">
                <button
                  class="navbar-toggler"
                  type="button"
                  data-toggle="collapse"
                  data-target="#navbarsExample04"
                  aria-controls="navbarsExample04"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample04">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <!-- <li class="nav-item">
                                 <a class="nav-link" href="computer.php">Computer</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="laptop.php">Laptop</a>
                              </li> -->
                    <li class="nav-item">
                      <a class="nav-link" href="productList/productlist.php">Products</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <!-- <li class="nav-item d_none">
                                 <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                              </li> -->
                              <li class="nav-item d_no ne">
                              <?php
                              if ($_SESSION['isLoggedIn'] == true) {
                              ?>
                                 <a class="nav-link" href="logout.php">Logout</a>
                              <?php
                              } else if ($_SESSION['isLoggedIn'] == false) {
                              ?>
                                 <a class="nav-link" href="login.php">Login</a>
                              <?php
                              } ?>
                           </li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!--  contact -->
    <div class="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="titlepage">
              <h2>Contact Now</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <form
              id="request"
              class="main_form"
              method="post"
              action="messageReceived.php"
            >
              <div class="row">
                <div class="col-md-12">
                  <input
                    class="contactus"
                    placeholder="Name"
                    type="type"
                    name="name"
                  />
                </div>
                <div class="col-md-12">
                  <input
                    class="contactus"
                    placeholder="Email"
                    type="type"
                    name="emailAddress"
                  />
                </div>
                <div class="col-md-12">
                  <input
                    class="contactus"
                    placeholder="Phone Number"
                    type="type"
                    name="phoneNumber"
                  />
                </div>
                <div class="col-md-12">
                  <textarea class="textarea" type="type" name="message">
                    Enter your message here.</textarea
                  >
                </div>
                <div class="col-md-12">
                  <button class="send_btn">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end contact -->
    <!--  footer -->
    <footer>
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
              <img class="logo1" src="images/logo1.png" alt="#" />
              <ul class="social_icon">
                <li>
                  <a href="https://www.facebook.com/IU.Surplus"
                    ><i class="fa fa-facebook" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="https://twitter.com/IUSurplus"
                    ><i class="fa fa-twitter" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="https://www.instagram.com/iusurplus/"
                    ><i class="fa fa-instagram" aria-hidden="true"></i
                  ></a>
                </li>
              </ul>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
              <h3>About Us</h3>
              <ul class="about_us">
                <li>
                  We manage the redistribution and disposal of unneeded
                  university property for Indiana University. All proceeds go
                  back into the university and help support students.
                </li>
              </ul>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
              <h3>Contact Us</h3>
              <ul class="conta">
                <li>
                  Address:<br />IU Surplus <br />
                  3050 East Discovery Parkway<br />
                  Bloomington, IN 47408<br /><br />
                  Phone:<br />812-855-2475<br />
                  Fax:<br />812-855-9810<br />
                  Email:<br />surplus@indiana.edu
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <p>
                  © 2019 All Rights Reserved. Design by<a
                    href="https://html.design/"
                  >
                    Free Html Templates</a
                  >
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
