<?php 
	require 'config/config.php';
	if ( (!isset($_POST['username'])) || (trim($_POST['username']) == '') || (!isset($_POST['password'])) || (trim($_POST['password']) == '')) {
		$error = "Please fill out all fields.";
	} else {
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if ($mysqli->connect_errno) {
			echo $mysqli->connect_error;
			exit();
		}

		$username = $mysqli->escape_string($_POST['username']);
		$password = hash('sha256', $_POST['password']);

		$sql_exists = "SELECT *
						FROM users
						WHERE username = '$username'
						AND password = '$password';";
		$results_exist = $mysqli->query($sql_exists);
		if (!$results_exist) {
			echo $mysqli->error;
			$mysqli->close();
			exit();
		}

		if (!($results_exist->num_rows > 0)) {
			$error = "Username and password do not match.";
		} else {
			$_SESSION['logged_in'] = true;
			$_SESSION['username'] = $_POST['username'];
		}

		$mysqli->close();

	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Displays a success message if user logged in.">
	<title>Login Confirmation</title>
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
		<h2 class="text-center py-5">Uh oh!</h2>
		<h5 class="text-center pb-5"><?php echo $error; ?></h5>
	<?php else : ?>
		<h2 class="text-center py-5">SUCCESS</h2>
		<h5 class="text-center pb-5">Hello <?php echo $username; ?>, you have successfully logged in.</h5>
		<div class="text-center py-3"><button type="submit" class="btn btn-danger"><a href="logout.php">Logout?</a></button></div>
	<?php endif; ?>
	<div id="footer">
		Joseph Caluya &copy; 2024
	</div>
</body>
</html>