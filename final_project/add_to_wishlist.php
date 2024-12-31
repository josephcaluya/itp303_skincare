<?php
    require "config/config.php";

    if(!isset($_SESSION['username'])) {
        header("Location: login.php");
    }

    $product_id = $_GET['product_id']; 

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_error;
        exit();
    }

    $username = $_SESSION['username'];

    $sql1 = "SELECT users.id
            FROM users
            WHERE users.username = '$username';";
            
    $results1 = $mysqli->query($sql1);
        if ( !$results1 ) {
            echo $mysqli->error;
            $mysqli->close();
            exit();
    }

    $row = $results1->fetch_assoc();
    $user_id = $row['id'];

    $sql = "INSERT INTO wishlist (user_id, product_id) 
            VALUES ($user_id, $product_id);";

    $result = $mysqli->query($sql);

    if (!$result) {
        echo $mysqli->error;
        $mysqli->close();
        exit();
    }

    $mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Page that allows logged in users to add a product to their wishlist.">
    <title>SKINZING | Add to Wishlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="shared.css">
</head>
<body>
    <div id="header">
        <h1><a href="home.html">Skinzing</a></h1>
        <ul id="navbar">
            <li><a href="home.html">Home</a></li>
            <li><a href="search.php">Browse</a></li>
            <li><a href="recs.html">Popular</a></li>
            <li><a href="wishlist.php">Wishlist</a></li>
            <li><a href="login.php">Login/out / Register</a></li>
        </ul>
    </div>
    <h2 class="text-center py-5">ADD TO WISHLIST CONFIRMATION</h2>
        <h4 class="text-center py-5">Congrats! Your item was added successfully.</h4>
    <div id="footer">
        Joseph Caluya &copy; 2024
    </div>
</body>
</html>