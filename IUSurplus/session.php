<?php
   // Script to make sure a user is logged in. If the user is NOT logged in, this script will send them back to the login page.
   session_start();
   include('connection.php');
   
   $user_check = $_SESSION['user'];
   
   $ses_sql = mysqli_query($conn,"SELECT email FROM user WHERE email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['email'];
   
   if(!isset($_SESSION['user'])){
      header("location:login.php");
      die();
   }
?>