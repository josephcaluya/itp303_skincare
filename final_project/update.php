<?php
    require "config/config.php";

    if ( (!isset($_POST['username'])) || (trim($_POST['username']) == '') || (!isset($_POST['username2'])) || (trim($_POST['username2']) == '')) {
		$error = "Please fill out all fields.";
	} else {
	    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	    if ($mysqli->connect_errno) {
	        echo $mysqli->connect_error;
	        exit();
	    }

	    $username = $_POST['username'];
	    $new_user = $_POST['username2'];

	    $sql1 = "SELECT users.id, users.username
	            FROM users
	            WHERE users.username = '$username';";

	    $results1 = $mysqli->query($sql1);
	        if ( !$results1 ) {
	            echo $mysqli->error;
	            $mysqli->close();
	            exit();
	    }

	    if (!($results1->num_rows > 0)) {
			$error = "Username not found.";
		} else {
		    $row = $results1->fetch_assoc();
		    $user_id = $row['id'];
		    $sql = "UPDATE users
		    		SET username = '$new_user'
		    		WHERE id = $user_id;";

		    $result = $mysqli->query($sql);

		    if (!$result) {
		        echo $mysqli->error;
		        $mysqli->close();
		        exit();
		    }

		    $mysqli->close();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Page that allows logged in users to update their username.">
    <title>SKINZING | Update Username</title>
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
    <?php if (isset($error) && trim($error) != '') : ?>
    	<h4 class="text-center py-5"><?php echo $error; ?></h4>
    <?php else : ?>
    	<h2 class="text-center py-5">USERNAME UPDATE</h2>
        <h4 class="text-center py-2">Congrats, <?php echo $new_user; ?>! Your username was successfully updated. Please log out.</h4>
        <div class="text-center py-3"><button type="submit" class="btn btn-danger"><a href="logout.php">Logout</a></button></div>
    <?php endif; ?>
    <div id="footer">
        Joseph Caluya &copy; 2024
    </div>
</body>
</html>