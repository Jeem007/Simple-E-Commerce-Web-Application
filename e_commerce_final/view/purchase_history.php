<?php
include("../model/connection.php");
$link_address2 ='../controller/purchases_delete.php';
session_start();
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
    <link rel="stylesheet" href="../view/css/displayusers.css">

        <title>Display Purchase Records</title>
</head>
<body>

<?php include('buyer_header.php');?>
<br>
<br>
<br>
<br>
<div>
    <span>Purchase Details</span>
</div>
<br>
<br>
    <div class="container2">
        <table align="center"> 
            <tr>
                <th>Purchase_Token</th>
                <th>User Name</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Qunatity</th>
                <th>Total</th>
                <th>Date</th>
                <th>Location</th>
                <th>Delivery Status</th>
                <th>Delivery Time</th>
                <th>DeliveryMan</th>
            </tr>

            
            <?php
            $name = $_SESSION['user'];
            $sql = "Select *from `purchasehistory` where username ='$name'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['purchase_token'];
                    $username = $row['username'];
                    $product_name = $row['product_name'];
                    $price = $row['price'];
                    $quantity = $row['quantity'];
                    $total = $row['total'];
                    $date = $row['date'];
                    $location = $row['location'];
                    $dstatus= $row['dstatus'];
                    $dtime= $row['dtime'];
                    $dman= $row['dman'];

                    echo "<tr>
                    <td> {$id}</td>
                    <td> {$username}</td>
                    <td> {$product_name}</td>
                    <td> {$price}</td>
                    <td> {$quantity}</td>
                    <td> {$total}</td>
                    <td> {$date}</td>
                    <td> {$location}</td>
                    <td style='color:red';> {$dstatus}</td>
                    <td> {$dtime}</td>
                    <td> {$dman}</td>
                    </tr>";
                }
            }
            ?>
        </table>
        <br>
        <br><br><br>
        </div>
        <?php include('../view/footer.php');?>

</body>

</html>