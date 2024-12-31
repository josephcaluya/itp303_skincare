<?php 

	require "config/config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	$mysqli->set_charset('utf8');


	$sql = "SELECT products.product_id, products.image_url, products.name, types.type, brands.brand, skin.skin
			FROM products
			LEFT JOIN types
				ON products.type_id = types.id
			LEFT JOIN brands
				ON products.brand_id = brands.id
			LEFT JOIN skin
				ON products.skin_id = skin.id
			WHERE 1 = 1";

	if ( isset($_GET['type']) && trim($_GET['type']) != '' ) {
		$type = $_GET['type'];
		$sql = $sql . " AND products.type_id = $type";
	}

	if ( isset($_GET['name']) && trim($_GET['name']) != '' ) {
		$name = $mysqli->escape_string($_GET['name']);
		$sql = $sql . " AND products.name LIKE '%$name%'";
	}


	if ( isset($_GET['brand']) && trim($_GET['brand']) != '' ) {
		$brand = $_GET['brand'];
		$sql = $sql . " AND products.brand_id = $brand";
	}


	if ( isset($_GET['skin']) && trim($_GET['skin']) != '' ) {
		$skin = $_GET['skin'];
		$sql = $sql . " AND products.skin_id = $skin";
	}

	$sql = $sql . ";";

	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	$total_results = $results->num_rows;
	$results_per_page = 10;
	$last_page = ceil($total_results / $results_per_page);

	if (isset($_GET['current_page']) && trim($_GET['current_page']) != '') {
		$current_page = $_GET['current_page'];
	} else {
		$current_page = 1;
	}

	if ($current_page < 1 || $current_page > $last_page) {
		$current_page = 1;
	}

	$start_index = ($current_page - 1) * $results_per_page;

	$sql = rtrim($sql, ';');

	$sql = $sql . " LIMIT $start_index, $results_per_page;";

	$results = $mysqli->query($sql);
	if ( !$results ) {
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
	<meta name="description" content="Page that shows users results from search for Asian skincare products.">
	<title>SKINZING | Results</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="shared.css">
	<style>
		.prod-img {
			width: 150px;
			height: 150px;
			margin-left: auto;
			margin-right: auto;
			overflow: hidden;
		}
	</style>
</head>
<body>
	<div id="header">
		<h1><a href="home.html">Skinzing</a></h1>
		<ul id="navbar">
			<li><a href="home.html">Home</a></li>
			<li id="active-menu"><a href="search.php">Browse</a></li>
			<li><a href="recs.html">Popular</a></li>
			<li><a href="wishlist.php">Wishlist</a></li>
			<li><a href="login.php">Login/out / Register</a></li>
		</ul>
	</div>
	<h2 class="text-center py-5">RESULTS</h2>
	<div class="my-5"></div>
	<div class="col-12 py-3">
		<div class="col-12 py-3 text-center">
    				Showing 
					<?php 
					if ($total_results == 0) {
						echo 0;
					}
					else {
						echo $start_index + 1;
					} ?>
					-
					<?php echo $start_index + $results->num_rows ?>
					of 
					<?php echo $total_results ?>
					result(s).
		</div>
	</div>

	

	<nav aria-label="Search results pages">
    	<ul class="pagination justify-content-center">
        	<li class="page-item <?php if($current_page <= 1) echo 'disabled' ?>">
				<a class="page-link" href="<?php 
				$_GET['current_page'] = $current_page -1;
				echo $_SERVER['PHP_SELF'] . '?' . http_build_query($_GET);
				 ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span>
</a>
			</li>
			<li class="page-item active">
				<a class="page-link" href=""><?php echo $current_page ?></a>
			</li>
			<li class="page-item <?php if($current_page >= $last_page) echo 'disabled' ?>">
				<a class="page-link" href="<?php 
				$_GET['current_page'] = $current_page +1;
				echo $_SERVER['PHP_SELF'] . '?' . http_build_query($_GET);

				 ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
			</li>
    	</ul>
	</nav>



	<table class="table">
		<thead>
			<tr>
				<th>Image</th>
				<th>Product Name</th>
				<th>Product Type</th>
				<th>Product Brand</th>
				<th>Skin Type</th>
				<th>Details</th>
			</tr>
		</thead>
		<tbody>
			<?php while ( $row = $results->fetch_assoc() ) : ?>
				<tr class="table-primary">
					<td><div class="prod-img"><img class="portrait" src="<?php echo $row['image_url'] ?>" alt="<?php echo $row['name'] ?>"></div></td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['type'] ?></td>
					<td><?php echo $row['brand'] ?></td>
					<td><?php echo $row['skin'] ?></td>
					<td><a class="btn btn-primary" href="exdetails.php?product_id=<?php echo $row['product_id'] ?>" role="button">View More</a></td>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
	<div class="my-5"></div>
	<div id="footer">
		Joseph Caluya &copy; 2024
	</div>
</body>
</html>