<?php
   session_start();
   include("connection.php");
   // Initialize the error variable
   $error = "";

   // Check if the user is logged in, if not then redirect him to login page
   //if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   //    header("location: login.php");
   //    exit;
   //}
   
   
   // If the form has been posted
   if($_SERVER["REQUEST_METHOD"] == "POST") {
           
      // Get rid of speacial characters in the input values
      $myemail = mysqli_real_escape_string($conn,$_POST['email']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM user WHERE email = '$myemail' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC); //The mysqli_fetch_array() function fetches a result row as an associative array (A["index"] = Value)

      $count = mysqli_num_rows($result);
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($count == 1) {
         $_SESSION['user'] = $myemail;  // Save the username
         $_SESSION['isLoggedIn'] = true;  // Someone is logged in!
         $_SESSION['isAdmin'] = $row['isAdmin'];  // if user is Admin or not
         
         header("location: index.php");
      } else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      
      <title>Login Page</title>
      <link rel="stylesheet" href="css/style1.css">
   
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
            background-image: url("../images/banner.jpg")
            
         }
         label {
            font-weight:bold;
            width:200px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 10px;
         }

      </style>
      
   </head>
   
   <body bgcolor = "#DC143C">
      
      <div align = "center">
         <div  style = "width:300px; border: solid 2px #333333; " align = "left">
            <div style = "background-color:#333333; color:#DC143C; padding:10px;"><b>Login Page</b></div>
            
            <div style = "margin:30px">
               <p><img src="images/logo.png" alt="IU logo" style="float:right;width:70px;height:100px;">
               
               <form action = "" method = "post">
                  <label>Email: </label><input class="inp-text" type = "text" name = "email" placeholder= "Enter your email" class = "box"/><br /><br />
                  <label>Password: </label><input class="inp-text" type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Login "/><br><br>
                  <a href="signup.php">New here? SignUp now.</a>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px;"><?php echo $error; ?></div>
               
            </div>
            
         </div>
         
      </div>

   </body>
</html>