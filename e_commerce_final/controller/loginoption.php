<?php 

?>


<!DOCTYPE html>


<html lang="en">
<head>
  <title>LogIn Options</title>
  <style>
    body {
    background-image: url("../view/images/bg.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    }
    
    th,td {
    text-align: center;
    }
    th{
      border-bottom:1px solid #75bbe1 ;
      font-family: cursive;
    }
    table{
        padding-top: 200px;
    } 
    img{
        height: 220px;
        width: 250px;
    }
    a{
        text-decoration: none;
    }
  </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <title>Document</title>
</head>
<body>

<section class="loginoption">
  <div class="container">
    <table align="center">
      <tr>
        <th style="color:white;">User LogIn</td>
        <th style="color:white;">Admin Login</td>
        <th style="color:white;">Seller LogIn</td>
        <th style="color:white;">DeliveryMan LogIn</td>
      </tr>


      <tr>
        <td><a href="../controller/systemlogin.php"><img src="../view/images/user.png" alt=""></a></td>
        <td><a href="../controller/adminlogin.php"><img src="../view/images/adminimg.png" alt=""></a></td>
        <td><a href="../controller/sellerlogin.php"><img src="../view/images/sellerjpg.jpg" alt=""></a></td>
        <td><a href="../controller/dman_login.php"><img src="../view/images/delivery.jpg" alt=""><a></a></td>

      </tr>
    </table>


  </div>
</section>
<?php include('../view/footer.php');?>
</body>
</html>
