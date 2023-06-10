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
                <li class ="showname"><?php echo "Welcome!!  " .$_SESSION['user']; ?></li>
                <li><a href="../view/sellerdash.php" style="color:white">Home</a></li>
                <li><a href="../controller/seller_profile.php" style="color:white">Profile</a></li>
                <li><a href="../controller/logout.php" style="color:white">Log Out</a></li>
            </ul>
        </div>
    </div>
</body>
</html>