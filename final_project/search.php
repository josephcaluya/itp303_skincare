<?php  
	require "config/config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	// Check for any Connection Errors.
	if ( $mysqli->connect_errno ) {
		echo $mysqli->connect_error;
		exit();
	}

	$sql_product = "SELECT * FROM types;";

	$results_product = $mysqli->query($sql_product);

	if ( !$results_product ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	$sql_skin = "SELECT * FROM skin;";

	$results_skin = $mysqli->query( $sql_skin );

	if ( !$results_skin ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	$sql_brand = "SELECT * FROM brands;";

	$results_brand = $mysqli->query( $sql_brand );

	if ( !$results_brand ) {
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
	<meta name="description" content="Page that allows users to search for Asian skincare products.">
	<title>SKINZING | Browse Items</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="shared.css">
</head>
<body>
	<div id="header">
		<h1><a href="home.html">Skinzing</a></h1>
		<ul id="navbar">
			<li><a href="home.html">Home</a></li>
			<li id="active-menu"><a href="">Browse</a></li>
			<li><a href="recs.html">Popular</a></li>
			<li><a href="wishlist.php">Wishlist</a></li>
			<li><a href="login.php">Login/out / Register</a></li>
		</ul>
	</div>
	<h2 class="text-center py-5">BROWSE ITEMS</h2>
	<h6 class="text-center pb-5">Note: This is a website primarily focused on Asian skincare, and not every product is available.</h6>
	<form action="searchresults.php" method="GET">
		<div class="row">
			<div class="col d-flex flex-column justify-content-center mx-5">
				<label for="type">Product Type:</label>
				<select name="type" id="type">
					<option value="" selected>Select type</option>
					<?php while ($row = $results_product->fetch_assoc()) : ?>
					<option value="<?php echo $row['id']; ?>">
						<?php echo $row['type']; ?>
					</option>
					<?php endwhile; ?>
				</select>
			</div>
			<div class="col d-flex flex-column justify-content-center mx-5">
				<label for="name">Product Name:</label>
				<input type="text" name="name" id="name">
			</div>
			<div class="col d-flex flex-column justify-content-center mx-5">
				<label for="brand">Product Brand:</label>
				<select name="brand" id="brand">
					<option value="" selected>Select brand</option>
					<?php while ($row = $results_brand->fetch_assoc()) : ?>
					<option value="<?php echo $row['id']; ?>">
						<?php echo $row['brand']; ?>
					</option>
					<?php endwhile; ?>
				</select>
			</div>
			<div class="col d-flex flex-column justify-content-center mx-5">
				<label for="skin">Skin Type:</label>
				<select name="skin" id="skin">
					<option value="" selected>Select skin type</option>
					<?php while ($row = $results_skin->fetch_assoc()) : ?>
					<option value="<?php echo $row['id']; ?>">
						<?php echo $row['skin']; ?>
					</option>
					<?php endwhile; ?>
				</select>
			</div>
			<div class="col p-0 d-flex justify-content-center align-items-center"><button type="submit" class="btn btn-primary">Search</button></div>
		</div>
	</form>
	<div class="my-5"></div>
	<div id="footer">
		Joseph Caluya &copy; 2024
	</div>
</body>
</html>