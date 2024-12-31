<?php  
	require "config/config.php";

	if ( !isset($_GET['product_id']) || trim($_GET['product_id']) == '') {
		$error = "Invalid Product ID.";
	} else {
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if ($mysqli->connect_errno) {
			echo $mysqli->connect_error;
			exit();
		}

		$mysqli->set_charset('utf8');

		$product_id = $_GET['product_id'];

		$sql = "SELECT products.name, products.image_url, products.brand_id, products.type_id, products.skin_id, products.price, brands.brand, types.type, skin.skin
				FROM products
				LEFT JOIN brands
					ON products.brand_id = brands.id
				LEFT JOIN types
					ON products.type_id = types.id
				LEFT JOIN skin
					ON products.skin_id = skin.id
				WHERE product_id = $product_id;";

		$results = $mysqli->query($sql);

		if ( !$results ) {
			echo $mysqli->error;
			$mysqli->close();
			exit();
		}

		$row = $results->fetch_assoc();

		$mysqli->close();
	}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Page that gives more information about a specific skincare product.">
	<title>SKINZING | Product Details</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="shared.css">
	<style>
		.detail-container {
			width: 220px;
			height: 220px;
			border-style: solid;
			border-width: 10px;
			border-color: lightskyblue;
			overflow: hidden;
			text-align: center;
			padding: 0;
		}
	</style>
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
	<h2 class="text-center py-5">PRODUCT DETAILS</h2>
	<?php if (isset($error) && trim($error) != '') : ?>
		<div class="py-2"><h2 class="text-danger text-center"><?php echo $error; ?></h2></div>
	<?php else : ?>
		<h4 class="text-center py-2"><?php echo $row['name'] ?></h4>
		<div class="row">
			<div class="col d-flex justify-content-center py-2">
				<div class="detail-container">
					<img class="portrait" src="<?php echo $row['image_url'] ?>" alt="<?php echo $row['name'] ?>">
				</div>
			</div>
		</div>
		<h4 class="text-center py-2">Brand: <?php echo $row['brand'] ?></h4>
		<h4 class="text-center py-2">Product type: <?php echo $row['type'] ?></h4>
		<h4 class="text-center py-2">Skin type: <?php echo $row['skin'] ?></h4>
		<h4 class="text-center py-2">Price: $<?php echo $row['price'] ?></h4>
		<form id="wishlistForm" action="add_to_wishlist.php" method="GET">
			<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
			<div class="col py-3 d-flex justify-content-center align-items-center"><button id="wishlistbtn" type="button" class="btn btn-primary">Add to Wishlist</button></div>
		</form>
		<script>
			document.getElementById('wishlistbtn').addEventListener('click', function() {
            document.getElementById('wishlistForm').submit();
       		 });
		</script>
	<?php endif; ?>
	<div id="footer">
		Joseph Caluya &copy; 2024
	</div>
</body>
</html>