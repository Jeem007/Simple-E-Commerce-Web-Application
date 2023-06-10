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
    <title>DeliveryMan Header</title>
</head>
<body>
<div class="navigation-bar">
        <div id="navigation-container" class = "navigation-container">
            <ul>
                <li class ="showname"><?php echo "Welcome!!  " .$_SESSION['user']; ?></li>
                <li><a href="../view/dmandash.php" style="color:white">Home</a></li>
                <li><a href="../controller/dmanprofile.php" style="color:white">Profile</a></li>
                <li><a href="../controller/logout.php" style="color:white">Log Out</a></li>
            </ul>
        </div>
    </div>
</body>
</html>