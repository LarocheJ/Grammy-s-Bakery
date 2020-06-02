<?php 
	$pageTitle = 'Receipt';
	require('head.php');
?>
<?php 
	session_destroy(); 
	header('Location: products.php');
?>
<?php include('footer.php'); ?>