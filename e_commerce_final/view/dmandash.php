<?php
include("../model/connection.php");
session_start();
$varr = $_SESSION['user'];
$errors = array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../view/css/dmandash.css">
    <title>DeliveryMan Dashboard</title>

</head>
<body>


    <?php include('dmanheader.php');?>
    <br>
    <br>
    <br>
    <b></b>
  
    <div class="container">
    <form name="signupData" method ="post" enctype="multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <!--Delivery -->

    <div>
        <label>Purchase Token</label> </td>
        <input type="number" name= "pid" placeholder="Enter Purchase Token ID" value="1" min="1">
        </input>
        </div>
        <button type="submit" value="delivered" name="submit">Delivered</button>  
        <br><br>

        <span>Products Details</span>
        <br>
        <br>
        <table align="center">
            <tr>
                <th>Purchase_Token</th>
                <th>User Name</th>
                <th>Product Name</th>
                <th>Qunatity</th>
                <th>Total</th>
                <th>Date</th>
                <th>Location</th>
                <th>Delivery Status</th>
                <th>Delivery Time</th>
                <th>DeliveryMan</th>
                
            </tr>

            <?php
            $sql = "Select *from `purchasehistory` ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['purchase_token'];
                    $username = $row['username'];
                    $product_name = $row['product_name'];
                    $quantity = $row['quantity'];
                    $total = $row['total'];
                    $date = $row['date'];
                    $location = $row['location'];
                    $dstatus= $row['dstatus'];
                    $dtime= $row['dtime'];
                    $dman= $row['dman'];

                  

                    if(isset($_POST['submit'])){
                        $pid = $_POST['pid'];
                        $dman_name = $_SESSION['user'];
                        $d_status = $_POST['submit'];

                        if(!empty($dman)){
                            $sql2 = "UPDATE purchasehistory SET dstatus= '$d_status', dtime= NOW(), dman='$dman_name' WHERE purchase_token=$pid"; 
                            if($conn->query($sql2)===TRUE){
                                echo '<script>alert("Product Deliverd Successfully")</script>';
                                echo '<script>window.location="dmandash.php"</script>';
                            }
                            else{
                                echo "Error: ";
                            }
                        } 
                        else{
                            
                            echo '<script>alert("Product Deliverd Successfully")</script>';
                            echo '<script>window.location="dmandash.php"</script>';
                        }


                    }

                    echo "<tr>
                    <td> {$id}</td>
                    <td> {$username}</td>
                    <td> {$product_name}</td>
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


	</form>
    </div>
    <?php include('../view/footer.php');?>
</body>
</html>
