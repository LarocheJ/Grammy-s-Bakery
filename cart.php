<?php 
	$pageTitle = 'Your Cart';
	require('head.php');
?>
<main>
	<h1>Your Cart</h1>
	<form action="checkout.php" method="post">
		<div class="cart-container">
			<div class="cart-items-container">
				<?php 
					if(!isset($_SESSION['cart'])){
						print '<p>There is currently nothing in your cart!</p>';
					} else {
						$totalPrice = 0;
						for($i=0; $i < count($_SESSION['cart']); $i++){
							$item = $_SESSION['cart'][$i];
							$totalPrice += $item[2];
							print '<div class="cart-item">';
							print '<img src="images/thumbs/'.$item[1].'" alt="'.$item[0].'">';//Item Thumb
							print '<p class="cart-item-name">'.$item[0].'</p>';//Item Name
							print '<p class="cart-item-price">$'.$item[2].'</p>';//Item Price
							print '</div>';
						}
					print '<p class="total-price"><span class="total-price-span">Total: $'.$totalPrice.'</span></p>';
					}
				?>
			 <a href="products.php">Continue Shopping ></a>			 
			</div>
			<div class="customer-info">
				<div class="label-container">
					<label for="customer-name">Your Name *</label>
					<input type="text" id="customer-name" name="customer-name" required>
				</div>
				<div class="label-container">
					<label for="e-mail">Your E-mail Address *</label>
					<input type="email" id="e-mail" name="e-mail" required>
				</div>
				<div class="checkboxOverride">
					<input type="checkbox" name="" id="checkboxInputOverride" required>
					<label for="checkboxInputOverride"></label>
					<p>I agree to the <a href="#">Terms and Conditions</a>.*</p>
				</div>
				<input class="submit-buttons" id="checkout-button" type="submit" name="checkout" value="Checkout!">
			</div>
		</div>
	</form>
			
	
</main>
<?php require('footer.php'); ?>