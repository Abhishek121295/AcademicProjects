<?php
if (isset($_POST["submit"])) {
    
    /*
             * Insert image data into database
             */

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


    $getinfo = "SELECT * FROM iusurplus.product order by productid desc LIMIT 1";
    $query = mysqli_query($conn, $getinfo);
    $row = mysqli_fetch_assoc($query);
    $productid = $row['ProductId'];

    if ($_FILES["image"]["error"] > 0) {
        echo "<font size = '5'><font color=\"#e31919\">Error: NO CHOSEN FILE <br />";
        echo "<p><font size = '5'><font color=\"#e31919\">INSERT TO DATABASE FAILED";
    } else {
        move_uploaded_file($_FILES["image"]["tmp_name"], "../images/uploadedImages/" .$productid."_". $_FILES["image"]["name"]);
        echo "<font size = '5'><font color=\"#0CF44A\">SAVED<br>";

        $filePath = "../images/uploadedImages/" .$productid."_". $_FILES["image"]["name"] ;
    }

    $myQuery2 = "INSERT INTO iusurplus.images (productid,ImagePath) VALUES ('" . $productid . "','" . $filePath . "')";


    if (mysqli_query($conn, $myQuery2)) {
        echo "Product added to inventory successfully.";
    } else {
        echo "File upload failed, please try again.";
    }
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        body {
            background-image: url("../images/banner.jpg");
            color: #fff
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <br><a class="btn btn-primary" href=addProduct.php>Add more products</a>
    <a class="btn btn-info" href="../productList/productlist.php">Go to Products List</a>

</body>

</html>