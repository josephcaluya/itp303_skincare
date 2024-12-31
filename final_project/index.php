<?php 
	require 'config/config.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Home page of website to help people find primarily Asian skincare products.">
	<title>SKINZING | Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="shared.css">
	<style>
		.home-img {
			margin-top: 30px;
			margin-bottom: 30px;
			width: 800px;
			height: 550px;
			margin-left: auto;
			margin-right: auto;
			position: relative;
			overflow: hidden;
		}
		.home2-img {
			position: relative;
			width: 500px;
			height: 450px;
			margin-left: auto;
			margin-right: auto;
			overflow: hidden;
		}
		.overlay {
			color: white;
			background-color: rgba(0, 0, 0, 0.4);
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			text-align: center;
			padding-top: 200px;
			padding-left: 50px;
			padding-right: 50px;
		}
		.carousel-item {
        	position: relative;
        	display: none;
   		}

	</style>
</head>
<body>
	<div id="header">
		<h1><a href="">Skinzing</a></h1>
		<ul id="navbar">
			<li id="active-menu">
				<a href="">Home</a>
			</li>
			<li><a href="search.php">Browse</a></li>
			<li><a href="recs.html">Popular</a></li>
			<li><a href="wishlist.php">Wishlist</a></li>
			<li><a href="login.php">Login/out / Register</a></li>
		</ul>
	</div>
	<div class="home-img">
		<img class="landscape" src="img/home.jpg" alt="About Us Image">
		<div class="overlay">
			<h2>ABOUT US</h2>
			<p>Asian skincare has revolutionized the industry; thus, Skinzing is a website dedicated to helping people expand their skincare repertoire and find/purchase trending, primarily Asian skincare products that are suitable for their concerns. Search for products, look at popular recommendations, and add items to your own wishlist!</p>
		</div>
	</div>
	<div class="my-5"></div>
	<div class="row d-flex justify-content-center align-items-center text-center">
		<div id="westcarousel" class="carousel carousel-dark slide w-50">
			<div class="carousel-indicators">
			    <button type="button" data-bs-target="#westcarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			    <button type="button" data-bs-target="#westcarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
			    <button type="button" data-bs-target="#westcarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
		  	</div>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		    	<div class="home2-img d-flex justify-content-center">
		      		<img src="img/paula.jpg" class="d-block landscape w-100" alt="Paula's Choice BHA Exfoliant">
		      	</div>
		    </div>
		    <div class="carousel-item">
		    	<div class="home2-img d-flex justify-content-center">
		      		<img src="img/serum.jpg" class="d-block portrait w-100" alt="La Roche-Posay Serum">
		      	</div>
		    </div>
		    <div class="carousel-item">
		    	<div class="home2-img d-flex justify-content-center">
		      		<img src="img/sa.jpg" class="d-block portrait w-100" alt="CeraVe SA Cleanser">
		      	</div>
		    </div>
		  </div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#westcarousel" data-bs-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#westcarousel" data-bs-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Next</span>
		  </button>
		</div>
		<div class="col-4 description">
			<h3>TRENDING WESTERN SKINCARE</h3>
			<p>Explore a range of American and European skincare brands, from drugstore to high-end, CeraVe to La Roche-Posay, and cleanser to sunscreen.</p>
			<a class="btn btn-primary" href="recs.html#western" role="button">View Products</a>
		</div>
	</div>
	<div class="my-5"></div>
	<div class="row d-flex justify-content-center align-items-center text-center">
		<div class="col-4 description">
			<h3>TRENDING ASIAN SKINCARE</h3>
			<p>Wanting to expand your skincare repertoire? Dive into the diverse landscape of Asian skincare, ranging from trending products in K-beauty to Japanese classics.</p>
			<a class="btn btn-primary" href="recs.html#asian" role="button">View Products</a>
		</div>
		<div id="asiacarousel" class="carousel carousel-dark slide w-50">
			<div class="carousel-indicators">
			    <button type="button" data-bs-target="#asiacarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			    <button type="button" data-bs-target="#asiacarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
			    <button type="button" data-bs-target="#asiacarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
		  	</div>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		    	<div class="home2-img d-flex justify-content-center">
		      		<img src="img/roundlabsun.jpg" class="d-block landscape w-100" alt="Round Lab Sunscreen">
		        </div>
		    </div>
		    <div class="carousel-item">
		    	<div class="home2-img d-flex justify-content-center">
		      		<img src="img/shiseido.jpg" class="d-block portrait w-100" alt="Shiseido Sunscreen">
		      	</div>
		    </div>
		    <div class="carousel-item">
		    	<div class="home2-img d-flex justify-content-center">
		      		<img src="img/sunscreen.jpg" class="d-block portrait w-100" alt="Skin1004 Sunscreen">
		  		</div>
		    </div>
		  </div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#asiacarousel" data-bs-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#asiacarousel" data-bs-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Next</span>
		  </button>
		</div>
	</div>
	<div class="my-5"></div>
	<div id="footer">
		Joseph Caluya &copy; 2024
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>