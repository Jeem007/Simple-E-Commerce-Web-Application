<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/header.css">
    <title>Document</title>
</head>
<body>
<div class="navigation-bar">
        <div id="navigation-container" class = "navigation-container">
            <ul>
                <li class="showname"><?php echo "Welcome!!   ".$_SESSION['user']; ?></li>
                <li><a href="../view/admindash.php">Home</a></li>
                <li><a href="../view/displayusers.php">User Profiles</a></li>
                <li><a href="../view/displaypurchases.php">Show Purchase History</a></li>
                <li><a href="../view/display_sellers.php">Seller Information</a></li>
                <li><a href="../view/display_deliveryman.php">DeliveryMan Information</a></li>
                <li><a href="../view/products_display.php">Product Information</a></li>
                <li><a href="../controller/logout.php">log out</a></li>
            </ul>
        </div>
    </div>
</body>
</html>