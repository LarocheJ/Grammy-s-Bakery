<?php 
	$pageTitle = 'Receipt';
	require('head.php');
?>
<main>
    <h1>Receipt</h1>
    <?php 
		$name = mysqli_real_escape_string($connection, $_POST['customer-name']);
		$email = mysqli_real_escape_string($connection, $_POST['e-mail']);
		
		if(isset($_POST['checkout'])){
			print '<h2>Thank you, '.$name.', your order has been placed!</h2>';
			print '<h3>Here is your order:</h3>';

			$totalPrice = 0;
			$products = array();

			print '<table>';
			print '<tr>';
			print '<th>Item</th>';
			print '<th>Item Name</th>';
			print '<th>Cost</th>';
			print '</tr>';
			for($i=0; $i < count($_SESSION['cart']); $i++){
				$item = $_SESSION['cart'][$i];
				$totalPrice += $item[2];
				print '<tr>';
				print '<td><img src="images/thumbs/'.$item[1].'" alt="'.$item[0].'"></td>';//Item Thumb
				print '<td>'.$item[0].'</td>';//Item Name
				print '<td>$'.$item[2].'</td>';//Item Price

				print '</tr>';
				array_push($products, $item[0]);
			}
			print '<tr><td colspan="3"><span>Total: $'.$totalPrice.'</span></td></tr>';
			print '</table>';
			$products = implode(", ", $products);
			//print_r($products);

			$query = "INSERT INTO orders (customer_name, email_address, products, cost) VALUES ('$name', '$email', '$products', '$totalPrice')";
			mysqli_query($connection, $query);	
		} else {
			print '<p>You’re not supposed to be here...</p>';
		}
	
	?>
    <a href="clear.php">Make another purchase ></a>
</main>
<?php include('footer.php'); ?>