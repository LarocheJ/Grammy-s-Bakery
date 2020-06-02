<?php
	$pageTitle = "Home";
	require('head.php');
 ?>
	
	<main>
		<!-- *** HOME *** -->
		<section>
			<h1>Grammy’s Bakery</h1>
			<h2>Experience Grammy’s Succulent Confections</h2>
			<a href="products.php" class="shop-now-button" >Shop Now</a>
		</section>

		<!-- *** SPECIALS *** -->
		<section>
			<h2>Specials</h2>
			<div class="specials-wrapper">
				<div class="doughnut-sale-wrapper"><a href="products.php"><img src="images/doughnut-sale-900x500.jpg" alt="Buy 1 get 1 free doughnut sale!"></a></div>
				<div class="cookie-sale-wrapper"><a href="products.php"><img src="images/cookie-sale-900x500.jpg" alt="20% off all cookies!"></a></div>
			</div>
		</section>

		<!-- *** WHAT WE DO *** -->
		<section>
			<h2>What We Do</h2>
			<div class="what-we-do-wrapper">
				<div class="what-we-do-text">
					<p>
						Grammy’s bakery specializes in sweet treats such as doughnuts, cookies, and pastries. Come in and experience Grammy’s baking. You will not regret it. The aroma that propagates throughout the neighbourhood is simply irresistible. If you are unable to come in and pick up some freshly baked goods, simply head over to our <a href="products.php">shop</a>, pick out what you are craving, and we will have one of our drivers quickly deliver it right to your door step. 
					</p>

					<p>
						If you would like us to cater for you next event, become a partner or work with us, or if you would like to leave a comment or let us know just how much you love Grammy’s baking, please head to our <a href="#">contact page</a>. Leave us your name, email and a quick message, and we will get back to you as soon as possible. 
					</p>
				</div>
			</div>
		</section>

		<!-- *** FEATURED GOODIES *** -->
		<section>
			<h2>Newest Goodies</h2>			
			<!-- ITEMS -->
			<div class="newest-items-wrapper">
				<?php 
					$sql = mysqli_query($connection, "SELECT id, name, price, description, thumb, date FROM products ORDER BY date DESC LIMIT 4");

					while($row = mysqli_fetch_array($sql)){
						print '<div class="item-card">';
						print '<a href="item.php?id='.$row['id'].'">';
						print '<img src="images/thumbs/'.$row['thumb'].'" alt="'.$row['name'].'">';
						print '</a>';
						print '<div class="item-card-description">';
						print '<p>'.$row['description'].'</p>';
						print '</div>';
						print '<div class="item-card-title">';
						print '<h3 class="item-title">'.$row['name'].'</h3>';
						print '<h3>$'.$row['price'].'</h3>';
						print '</div>';
						print '<a href="#">Add to cart</a>';
						print '</div>';
					}
				?>
			</div>
		</section>
		</main>
<?php include('footer.php'); ?>