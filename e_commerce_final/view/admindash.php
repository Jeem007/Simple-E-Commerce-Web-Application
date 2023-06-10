<?php
session_start();

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
    a{
        text-decoration: none;
        color: white;
    }

    li{
     display: inline;
     width: 80px;
     text-align: center;
     border-left: 1px solid #bbb;
    }
    .navigation-container{
        float:right;
    }
    .showname{
        background-color: #136432;
       color:white;
    }


</style>
<title>Admin Dashboard</title>
</head>
        <!-- Header Section Start -->
<body>
    

<?php include('admin_header.php');?>
<br>
<br>
<br>
<br>
    <table align="center">
      <tr>
        <td><a href="../view/admindash.php"><img style="margin-left: auto;margin-right: auto; display: block;" src="../view/images/adminimg.png" alt=""></a></td>
      </tr>
      <tr>
        <td class="showname" style="text-align:center;"><?php echo $_SESSION['user']; ?></td>
      </tr>
      <tr>
        <td style="color:white"><p>------------------------------------------------------------------------------------------------</p></td>
      </tr>
    </table>
</body>
<?php include('footer.php');?>

<!-- Header Section End -->

</html>