<?php
	$pageTitle = "Goody";	
	require('head.php');
	$id = $_GET['id'];
	$sql = mysqli_query($connection, "SELECT * FROM products WHERE id=$id");
	$row = mysqli_fetch_array($sql);
 ?>
	<main>
		<form name="add" action="" method="post">	
			<div class="item-container">
				<?php 
					if(mysqli_num_rows($sql)==1){
						print '<img src="images/full/'.$row['image'].'" alt="A photograph of a '.$row['name'].'">';
					}
				?>
				<div class="sidebar">
					<h1 class="item-heading"><?php print $row['name']; ?></h1>
					<h2 class="price">$<?php print $row['price']; ?> each</h2>
					<h3 class="description-heading">Description</h3>
					<p class="description"><?php print $row['description']; ?></p>
					<h3 class="ingredients-heading">Ingredients</h3>
					<?php print $row['ingredients']; ?>
					<p class="item-category">Category: 
						<?php 
							if($row['category']=="Pastries"){
								print '<a class="category-link" href="pastries.php">Pastries</a>';
							} elseif($row['category']=="Doughnuts"){
								print '<a class="category-link" href="doughnuts.php">Doughnuts</a>';
							} elseif($row['category']=="Cookies"){
								print '<a class="category-link" href="cookies.php">Cookies</a>';
							}
						?>
					</p>
					<input class="submit-buttons" type="submit" name="add_to_cart" value="Add to Cart">
					<?php
						$cartItemName = $row['name'];
						$cartItemThumb = $row['thumb'];
						$cartItemPrice = $row['price'];

						if(isset($_POST['add_to_cart'])){
							$item = array($cartItemName, $cartItemThumb, $cartItemPrice);
							if(isset($_SESSION['cart'])){
								array_push($_SESSION['cart'], $item);
							} else {
								$_SESSION['cart'] = array($item);
							}
							print '<p>'.$row['name'].' has been added to your <a href="cart.php">cart!</a></p>';
						}
					?>
				</div>
			</div>
		</form>
	</main>
<?php include('footer.php'); ?>














