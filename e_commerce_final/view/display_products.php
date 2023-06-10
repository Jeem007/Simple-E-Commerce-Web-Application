<?php 

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

include("../model/connection.php");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="userdash.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>

	
		<link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    	/>
		<link rel="stylesheet" href="../view/css/products.css">
		<style>
			img {
			height: 200px;
			width: 200px;
			}
		</style>
		<title>Shopping Cart</title>
	</head>
	<body>
		<br />
		<div class="container">
			<br />
			<?php
				$query = "SELECT * FROM product ORDER BY id ASC";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="userdash.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" >

						<table>
							<tr>
								<td rowspan="3" style="width:20% ;"><img src="../view/images/<?php echo $row["image"]; ?>" class="img-responsive" /></td>
								<td><h4 class="text-info"><?php echo $row["name"]; ?></h4></td>
							</tr>

							<tr>
								<td><h4 class="text-danger">$ <?php echo $row["price"]; ?></h4></td>
							</tr>

							<tr>
								<td>
								<input type="number" name="quantity" value="1" max="10" min="1"  class="form-control" />

								<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

								<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

								<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn" value="Add to Cart" />
								</td>
							</tr>
						</table>
					
						
					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<br>
			<br>
			<!-- Order Details -->
			<form method="post">	
			<span class="display">Order Details</span>
			<br>
			<br>
			<br>
			<div class="table-responsive" style="border:1px solid #333; background-color:#f1f1f1; padding-bottom: 50px;">
				<table class="table_bordered">
					<tr>
						<th>Item Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>

					<tr>
						<td style="text-align: center;"><?php echo $values["item_name"];?></td>
						<td style="text-align: center;"><?php echo $values["item_quantity"]; ?></td>
						<td style="text-align: center;"><?php echo $values["item_price"]; ?></td>
						<td style="text-align: center;"><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td style="text-align: center;"><a href="userdash.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text_danger">Remove</span></a></td>
					</tr>


					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" style="text-align: center;">Total</td>
						<td style="text-align: center;">$ <?php echo number_format($total, 2); ?></td>
						<td><input style=" display: block; margin-left: auto; margin-right: auto; border: 2px solid black;
    					border-radius: 5px; padding: 5px 5px;" type="text" placeholder="Enter Delivery location" name="delivery_location" required></td>
						<td></td>
					</tr>

					<tr>
						<td colspan="5" align="right">
						<button type="submit" value="submit" name="confirm">Confirm Purchase</button>   
						</td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
			</form>
		</div>
	</div>
	<br />
	</body>
</html>

<?php

?>


<?php
include("../model/connection.php");
$errors = array();
if(isset($_POST['confirm'])){
			$varr=$_SESSION['user'];
			$product_name =$values["item_name"];
			$price = $values["item_price"];
			$quantity = $values["item_quantity"];
			$location =$_POST['delivery_location'];

			$sql = "INSERT INTO purchasehistory (username,product_name, price, quantity, total, date, location) VALUES ('$varr', '$product_name','$price','$quantity' ,$total, NOW(),'$location' )";
            // move_uploaded_file($tmpname,$folder);
            $query = mysqli_query($conn, $sql);

			echo '<script>alert("Order Confirmed")</script>';
			echo '<script>window.location="userdash.php"</script>';

			unset($_SESSION["shopping_cart"]);
			session_start();

}

?>