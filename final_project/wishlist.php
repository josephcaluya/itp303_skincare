<?php  
	require "config/config.php";
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->connect_errno ) {
		echo $mysqli->connect_error;
		exit();
	}
	$mysqli->set_charset('utf8');

	if(isset($_SESSION['username'])) {
		$username = $_SESSION['username'];

		$sql = "SELECT products.product_id, products.name, products.image_url, products.link
				FROM wishlist
				LEFT JOIN users
					ON wishlist.user_id = users.id
				LEFT JOIN products
					ON wishlist.product_id = products.product_id
				WHERE users.username = '$username';";

		$results = $mysqli->query($sql);
		if ( !$results ) {
			echo $mysqli->error;
			$mysqli->close();
			exit();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Page that contains the skincare products the user wants to buy.">
	<title>SKINZING | Wishlist</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="shared.css">
	<style>
		.container {
			width: 220px;
			height: 220px;
			border-style: outset;
			border-width: 10px;
			border-color: white;
			overflow: hidden;
			text-align: center;
			padding: 0;
		}
		.col > a {
			font-family: 'Poppins', sans-serif;
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
			<li id="active-menu"><a href="">Wishlist</a></li>
			<li><a href="login.php">Login/out / Register</a></li>
		</ul>
	</div>
	<h2 class="text-center py-5">WISHLIST</h2>
	<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
		<div class="row">
			<?php while ($row = $results->fetch_assoc()) : ?>
		<div class="col-4 text-center">
			<div class="container">
				<img class="landscape" src="<?php echo $row['image_url'] ?>" alt="<?php echo $row['name'] ?>">
			</div>
			<h5 class="pt-3"><?php echo $row['name'] ?></h5>
			<div class="d-flex justify-content-center align-items-center">
				<a class="btn btn-primary my-3" target="_blank" href="<?php echo $row['link'] ?>" role="button">Purchase</a>
				<form id="deleteForm" action="delete.php" method="GET">
					<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
					<a href="delete.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-danger" id="deletebtn" onclick="return confirm('Are you sure you want to delete this product?')"> Delete</a>
				</form>
			</div>
		</div>
		<script>
			document.getElementById('deletebtn').addEventListener('click', function() {
            document.getElementById('deleteForm').submit();
       		 });
		</script>
		<?php endwhile; ?>
	</div>
	<?php else : ?>
		<?php $error = "Please log in or register to view wishlist." ?>
		<h4 class="text-center"><?php echo $error; ?></h4>
	<?php endif; ?>
	<div class="my-5"></div>
	<div id="footer">
		Joseph Caluya &copy; 2024
	</div>
</body>
</html>