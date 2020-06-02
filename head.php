<?php 
	$server = "localhost";
	$username = "root";
	$password = "";
	$db = "jlaroche_mmda225_final";

	$connection = mysqli_connect($server,$username,$password,$db);

	if(!$connection){
		die(mysqli_connect_error());
	}
	
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Grammy’s Bakery | <?php print $pageTitle ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"  href="styles.css">
</head>
<body>
	<header>
		<div class="header">
			<div class="top-left">
				<a href="index.php"><img src="images/logo.svg" id="logo" alt="Grammy's logo"></a>
			</div>
			<div class="top-right">
				<a href="#"></a>
				<a href="cart.php"></a>
			</div>
		</div>
		<nav class="main-nav">
			<a href="#">&#9776;</a>
			<a href="index.php">Home</a>
			<a href="#">About</a>
			<a href="products.php">Shop</a>
			<a href="#">Contact</a>
		</nav>
	</header>