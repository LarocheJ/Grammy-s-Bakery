<?php
	$pageTitle = "All Goodies";	
	require('head.php');
 ?>
	<main>
		<h1 id="products-heading">Grammy's Goodies</h1>

		<?php include('responsive-filter.php'); ?>
		<div class="products-page-container">
			<?php include('filter.php'); ?>
			<div class="products-container">
				<?php 
					$query = mysqli_query($connection, "SELECT id, name, price, thumb FROM products ORDER BY name");
					if(isset($_GET['sort'])){

						$sort = $_GET['sort'];

						if($sort == 'asc'){
							$query = mysqli_query($connection, "SELECT id, name, price, thumb FROM products ORDER BY name ASC");
						} 
						elseif($sort == 'desc'){
							$query = mysqli_query($connection, "SELECT id, name, price, thumb FROM products ORDER BY name DESC");
						} 
						elseif($sort == 'price_low'){
							$query = mysqli_query($connection, "SELECT id, name, price, thumb FROM products ORDER BY price ASC");
						}
						elseif($sort == 'price_high'){
							$query = mysqli_query($connection, "SELECT id, name, price, thumb FROM products ORDER BY price DESC");
						} else {
							print '<p>Your request could not be processed.</p>';
							print mysqli_error($connection);
						}
					}
					while($row = mysqli_fetch_array($query)){
						print '<div class="item-card">';
						print '<a href="item.php?id='.$row['id'].'">';
						print '<img src="images/thumbs/'.$row['thumb'].'" alt="'.$row['name'].'">';
						print '</a>';
						print '<div class="item-card-title">';
						print '<h3 class="item-title">'.$row['name'].'</h3>';
						print '<h3>$'.$row['price'].'</h3>';
						print '</div>';
						print '</div>';
					}
				?>
			</div>
		</div>
	</main>
<?php include('footer.php'); ?>
