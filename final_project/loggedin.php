<?php  
	require 'config/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Page that allows users to log out if they are already logged in.">
	<title>Skinzing | Log Out</title>
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
			<li id="active-menu"><a href="">Login/out / Register</a></li>
		</ul>
	</div>
	<h2 class="text-center py-5">LOGOUT</h2>
	<h5 class="text-center py-2">Do you wish to log out?</h5>
	<div class="text-center pb-5"><button type="submit" class="btn btn-danger"><a href="logout.php">Logout?</a></button></div>
	<div class="row d-flex justify-content-center">
		<div class="col-4">
			<h5 class="text-center pb-5">Do you want to update your username?</h5>
			<form action="update.php" method="POST" id="updateform">
				<div class="form-group row">
					<label for="username">Username:</label>
					<input type="text" name="username" id="username">
					<small id="user-error" class="form-text text-danger invalid-feedback">Username cannot be empty.</small>
				</div>
				<div class="form-group row">
					<label for="username2">New Username:</label>
					<input type="text" name="username2" id="username2">
					<small id="user2-error" class="form-text text-danger invalid-feedback">New username cannot be empty.</small>
				</div>
				<div class="text-center py-3"><button type="submit" class="btn btn-primary">Update Username</button></div>
			</form>
		</div>
	</div>
	<script>
			document.querySelector('#updateform').onsubmit = function() {
				if (document.querySelector('#username').value.trim().length == 0) {
					document.querySelector("#username").classList.add('is-invalid');
				} else {
					document.querySelector("#username").classList.remove('is-invalid');
				}
				if (document.querySelector('#username2').value.trim().length == 0) {
					document.querySelector("#username2").classList.add('is-invalid');
				} else {
					document.querySelector("#username2").classList.remove('is-invalid');
				}
				return ( !document.querySelectorAll('.is-invalid').length > 0 );
			}
	</script>
	<div id="footer">
		Joseph Caluya &copy; 2024
	</div>
</body>
</html>