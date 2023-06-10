<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        a{
        text-decoration: none;
        }
      
        .column {
        float: left;
        width: 49.8%;
        /* border: 2px solid black; */
        /* height: 400px; */
        /* background-color: #cdd9df; */
        }
        h3{
            display: block;
            text-align: center;
            justify-content: center;
        }
        

        .row:after {
        content: "";
        display: table;
        clear: both;
        }

    #panel3{
    padding: 5px;
    display: none;
    text-align: center;
    border-bottom: 10px;
    background-color: #e5eecc;
    border-radius: 10px;
    }

    #flip1, #flip2, #flip3{
    color: black;
    padding: 5px;
    text-align: center;
    }
    #flip1:hover, #flip2:hover, #flip3:hover{
        color: blue;
    }
    pre:hover{
        color: blue;
    }

    #panel1, #panel2 {
    padding: 5px;
    display: none;
    text-align: left;
    border-bottom: 10px;
    background-color: #e5eecc;
    border-radius: 10px;
    }
    h4{
        margin-top: -3px;
    margin-bottom: -3px;
    }
    i.fas{
        padding: 5px;
    }

    .inside{
        height: 150px;
    }
    .location{
        display: block;
    }
    a.abt{
        color: black;
    }
    a.abt:hover{
        color: #2e8b0e    }
        @media screen and (max-width: 600px) {
        .column {
            width: 100%;
        }
        }


    </style>
        <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>About Us</title>
</head>
<?php include('../view/buyer_header.php');?>
<body style="background-color : #c0c0c0;">
<div id="showcase">
    <div class="container">

        <h1 align="center" style="color:#777;padding-top: 75px;">ABOUT US</h2>
       
        <div class="row">

<div class="column">
    <div class="inside">
        <h2 align="middle" style="color:#900">Introduction</h2>
    <h3 align="middle">This is simple online e-commerce web application where user can buy their products and seller can sell their products.</h3>
    </div>

<div id="flip1"> <h4>App Users</h4> </div>
<div id="panel1">
<!-- <p>Admin <br> Buyer <br>Seller <br> Deliveryman </p> -->
<pre>
Admin       ----------- can check everything.
Buyer       ----------- can buy products and check order list.
Seller      ----------- can add products to sell and update if they need.
Deliveryman -----------  can deliver products based on their location.
<br>
</pre>
</div>
</div>
            
<div class="column">
    <div class="inside">
    <h2 align="middle" style="color:#900">Versions</h2>
<h3 align="middle">Version 1-> Release date: 4 November, 2022</h3>
<h3 align="middle">Version 2-> Release date: 4 December, 2022</h3>
    </div>

<div id="flip2"> <h4>What's new </h4></div>
<div id="panel2">
<pre>
>Admin can search products. (AJAX live search).
>javaScript validation in signup page.
>CSS Design added.
>jquery used in about us section.
>Deliveryman features are now availabe.
>System can now take order and deliver their products to the customers.
</pre>
                    
</div>
</div>
<br>
<br>

<div class="location">
<h2 align="middle" style="color:#900">Location/Address</h2>
<h3 align="middle">North Ibrahimpur,Kamal Khan Road,Dhaka-1206</h3>
<div id="flip3"> <h4>Contact Us</h4> </div>
<div id="panel3">

<p>
<i class="fas fa-mobile"></i><a  class = "abt" href="callto:+8801580740792">+8801580740792</a>
</p>
<p>
<i class="fas fa-envelope"></i> <a  class="abt" href="mailto:support@e-commerce.com">support@e-commerce.com</a>
</p>

</div>
</div>

</div>
</div>
<?php include('../view/footer.php');?>

</body>
</html>
<script src="../view/js/aboutus.js"></script>