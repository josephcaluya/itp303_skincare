<?php 
	require 'config/config.php';

	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
		header('Location: loggedin.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Page that allows users to login or register for the Skinzing website.">
	<title>Skinzing | Login/Register</title>
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
	<h2 class="text-center py-5">LOGIN/REGISTER</h2>
	<h5 class="text-center pb-5">Log in or create an account to view and save products in your wishlist.</h5>
	<div class="row d-flex justify-content-evenly">
		<div class="col-4">
			<h5><strong>LOGIN</strong></h5>
			<form action="loginconf.php" method="POST" id="login">
				<?php if (isset($error) && trim($error) != '') : ?>
					<div class="form-group row text-danger">
						<?php echo $error ?>
					</div>
				<?php endif; ?>
				<div class="form-group row">
					<label for="username">Username:</label>
					<input type="text" name="username" id="username">
					<small id="user-error" class="form-text text-danger invalid-feedback">Username cannot be empty.</small>
				</div>
				<div class="form-group row">
					<label for="password">Password:</label>
					<input type="password" name="password" id="password">
					<small id="pw-error" class="form-text text-danger invalid-feedback">Password cannot be empty.</small>
				</div>
				<div class="text-center py-3"><button type="submit" class="btn btn-primary">Submit</button></div>
			</form>
		</div>
		<div class="col-4">
			<h5><strong>REGISTER</strong></h5>
			<form action="regconf.php" method="POST" id="register">
				<div class="form-group row">
					<label for="newusername">Create a username:</label>
					<input type="text" name="newusername" id="newusername">
					<small id="newuser-error" class="form-text text-danger invalid-feedback">Username cannot be empty.</small>
				</div>
				<div class="form-group row">
					<label for="newpassword">Create a password:</label>
					<input type="password" name="newpassword" id="newpassword">
					<small id="newpw-error" class="form-text text-danger invalid-feedback">Password cannot be empty.</small>
				</div>
				<div class="text-center py-3"><button type="submit" class="btn btn-primary">Submit</button></div>
			</form>
		</div>
	</div>
	<div class="my-5"></div>
	<div id="footer">
		Joseph Caluya &copy; 2024
	</div>
	<script>
		document.querySelector('#login').onsubmit = function() {
			if (document.querySelector('#username').value.trim().length == 0) {
				document.querySelector("#username").classList.add('is-invalid');
			} else {
				document.querySelector("#username").classList.remove('is-invalid');
			}
			if (document.querySelector('#password').value.trim().length == 0) {
				document.querySelector("#password").classList.add('is-invalid');
			} else {
				document.querySelector("#password").classList.remove('is-invalid');
			}
			return ( !document.querySelectorAll('.is-invalid').length > 0 );
		}
		document.querySelector('#register').onsubmit = function() {
			if (document.querySelector('#newusername').value.trim().length == 0) {
				document.querySelector("#newusername").classList.add('is-invalid');
			} else {
				document.querySelector("#newusername").classList.remove('is-invalid');
			}
			if (document.querySelector('#newpassword').value.trim().length == 0) {
				document.querySelector("#newpassword").classList.add('is-invalid');
			} else {
				document.querySelector("#newpassword").classList.remove('is-invalid');
			}
			return ( !document.querySelectorAll('.is-invalid').length > 0 );
		}
	</script>
</body>
</html>