<?php
require 'config/config.php';

if (isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else{
	header("Location: register.php");
}

?>

<html>
<head>
	<title>Welcome to Small World</title>
	<!--JavaScripte-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<!--CSS-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

<div class="top_bar">
	<div class="logo">
		<a href="index.php">Small World</a>		
	</div>
	<nav>
		<a href="<?php echo $userLoggedIn; ?>">
			<?php echo $user['first_name']; ?>
		</a>
		<a href="index.php">
			<i class="fas fa-home"></i>
		</a>
		<a href="#">
			<i class="fas fa-envelope"></i>
		</a>
		<a href="#">
			<i class="fas fa-bell"></i>
		</a>
		<a href="#">
			<i class="fas fa-users"></i>
		</a>
		<a href="#">
			<i class="fas fa-cog"></i>
		</a>
	</nav>	
</div>

<div class="wrapper">