<?php
session_start();
include("../model/connection.php");
?>



<!doctype html>
<html lang="en">
<head>

<link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
<style>
    body {
    background-image: url("../view/images/bg.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    }
    .webname{
    justify-content: center;
    color: white;
    margin-left: auto;
    margin-right: auto;
    display: block;
    width: 500px;
    text-align: center;
    font-size: 21px;
    font-family: cursive;
    }


    a{
        text-decoration: none;
    }

</style>


<title>User Dashboard</title>
</head>
        <!-- Header Section Start -->
<body>
    <?php include('buyer_header.php');?>
    <a href="../view/userdash.php"><img src="../view/images/logo.png" alt="logo" style="
    display: block;
    margin-left: auto;
    margin-right: auto;
"></a>
    <label class="webname">E-COMMERCE WEB APPLICATION</label>
    <?php include('display_products.php');?>
    <?php include('footer.php');?>
</body>


<!-- Header Section End -->

</html>