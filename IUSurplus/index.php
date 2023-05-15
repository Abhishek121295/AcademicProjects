<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Surplus Store</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
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
                           <a href="index.php"><img src="images/logo1.png" alt="#" /></a>
                           <!-- <h1> The IU Surplus store</h1> -->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item active">
                              <a class="nav-link" href="index.php">Home</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="about.php">About Us</a>
                           </li>
                           <!-- <li class="nav-item">
                                 <a class="nav-link" href="computer.php">Computer</a>
                              </li> -->

                           <li class="nav-item">
                              <a class="nav-link" href="productList/productlist.php">Products</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="contact.php">Contact Us</a>
                           </li>
                           <li class="nav-item d_none">
                              <a class="nav-link" href="locate.php">Locate Us <i class="fa fa-search" aria-hidden="true"></i></a>
                           </li>

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
   <!-- banner -->
   <section class="banner_main">
      <div id="banner1" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#banner1" data-slide-to="0" class="active"></li>
            <li data-target="#banner1" data-slide-to="1"></li>
            <li data-target="#banner1" data-slide-to="2"></li>
            <li data-target="#banner1" data-slide-to="3"></li>
            <li data-target="#banner1" data-slide-to="4"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container">
                  <div class="carousel-caption">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="text-bg">
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <span> The IU Surplus store</span>
                              <span>Computer Accessories, Furniture and much more at affordable prices!</span>
                              <<!-- h1>and much more at very reasonable prices</h1> -->
                                 <p>We are the IU Surplus store, many of you have visited us earlier and checked with us for things you needed. But now we are going to make your lives easier by being able to check the items you need online and book them. Visit the store later only for pick-up and payment.</p>
                                 <a href="productList/productlist.php">Check it out </a> <a href="contact.php">Contact </a>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="text_img">
                              <figure><img src="images/pct.png" alt="#" /></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <div class="carousel-caption">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="text-bg">
                              <!-- <span>Computer And Laptop</span>
                                 <h1>Accessories</h1> -->
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <span> The IU Surplus store</span>
                              <p>We have TVs and monitors, ranging from 40 to 150 USD in various colors, sorted by their prices, and </p>
                              <a href="productList/productlist.php">Check it out </a> <a href="contact.php">Contact </a>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="text_img">
                              <figure><img class="tableImg" src="images/tv.png" alt="#" /></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <div class="carousel-caption">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="text-bg">
                              <!-- <span>Computer And Laptop</span>
                                 <h1>Accessories</h1> -->
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <span> The IU Surplus store</span>
                              <p>We have chairs, ranging from 15 to 30 USD in various colors and comfort levels, sorted by their prices, and </p>
                              <a href="productList/productlist.php">Check it out </a> <a href="contact.php">Contact </a>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="text_img">
                              <figure><img class="tableImg" src="images/chair.png" alt="#" /></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <div class="carousel-caption">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="text-bg">
                              <!-- <span>Computer And Laptop</span>
                                 <h1>Accessories</h1> -->
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <span> The IU Surplus store</span>
                              <p>We have tables of various kinds such as study table, dining table and coffe tables ranging from 30 USD to 80 USD, and</p>
                              <a href="productList/productlist.php">Check it out </a> <a href="contact.php">Contact </a>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="text_img">
                              <figure><img class="tableImg" src="images/table.png" alt="#" /></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <div class="carousel-caption">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="text-bg">
                              <!-- <span>Computer And Laptop</span>
                                 <h1>Accessories</h1> -->
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <span> The IU Surplus store</span>
                              <p>Finally check out these beautiful lamps that we have for bedrooms and livings rooms starting from mere 10 USD and ranging till 30 USD. </p>
                              <a href="productList/productlist.php">Check it out </a> <a href="contact.php">Contact </a>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="text_img">
                              <figure><img src="images/lamp.png" alt="#" /></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
         </a>
         <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
         </a>
      </div>
   </section>
   <!-- end banner -->
   <!-- three_box -->

   <div class="laptop">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <div class="titlepage">
                  <p>Find Great deals</p>
                  <h2>Starting from as low as $10!</h2>
                  <a class="read_more" href="productList/productlist.php">Check it out now</a>
               </div>
            </div>
            <div class="col-md-6">
               <div class="laptop_box">
                  <figure><img src="images/furniture.png" alt="#" /></figure>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <!-- end laptop  section -->
   <!-- customer -->
   <div class="customer">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Customer Reviews</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div id="myCarousel" class="carousel slide customer_Carousel " data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                     <li data-target="#myCarousel" data-slide-to="1"></li>
                     <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="container">
                           <div class="carousel-caption ">
                              <div class="row">
                                 <div class="col-md-9 offset-md-3">
                                    <div class="test_box">
                                       <i><img src="images/cos.png" alt="#" /></i>
                                       <h4>Sandy Miller</h4>
                                       <p>I loved the store. Great range of products available to students at minimal pricing.</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="container">
                           <div class="carousel-caption">
                              <div class="row">
                                 <div class="col-md-9 offset-md-3">
                                    <div class="test_box">
                                       <i><img src="images/cos.png" alt="#" /></i>
                                       <h4>Antonio Davies</h4>
                                       <p>This store is a blessing. Helped me get started here at IU. Very affordable pricing.</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="container">
                           <div class="carousel-caption">
                              <div class="row">
                                 <div class="col-md-9 offset-md-3">
                                    <div class="test_box">
                                       <i><img src="images/cos.png" alt="#" /></i>
                                       <h4>Christian Pulisic</h4>
                                       <p>Amazing products with great value for money.With the new online system it makes it so mcuh more convenient. If you are an IU student here temporarily, this is the best store to get you started with the stuff you need for very cheap prices. Would recommend 10 on 10!!</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end customer -->

   <!--  footer -->
   <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <img class="logo1" src="images/logo1.png" alt="#" />
                  <ul class="social_icon">
                     <li><a href="https://www.facebook.com/IU.Surplus"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                     <li><a href="https://twitter.com/IUSurplus"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                     <li><a href="https://www.instagram.com/iusurplus"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  </ul>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <h3>About Us</h3>
                  <ul class="about_us">
                     <li>We manage the redistribution and disposal of unneeded university property for Indiana University. All proceeds go back into the university and help support students.</li>
                  </ul>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <h3>Contact Us</h3>
                  <ul class="conta">
                     <li>Address:<br>IU Surplus <br>
                        3050 East Discovery Parkway<br>
                        Bloomington, IN 47408<br><br>
                        Phone:<br>812-855-2475<br>
                        Fax:<br>812-855-9810<br>
                        Email:<br>surplus@indiana.edu </li>
                     <br>

                  </ul>
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