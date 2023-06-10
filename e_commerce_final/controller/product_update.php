<?php
include("../model/connection.php");
// $link_address1 ='../controller/product_update.php';
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
    <link rel="stylesheet" href="../view/css/sellerdash.css">
    <title>Product Update</title>

</head>
<body>


    <?php include('../view/seller_header.php');?>
    <br>
    <br>
    <br>
    <b></b>
  
    <div class="container">
    <form name="signupData" method ="post" enctype="multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    
    <!-- Add Products -->
    <span>Update Products</span>
    <br><br>
    <!-- product_token -->
    <div>
    <label>Product ID</label>
    <input type="number" name= "pid" placeholder="Enter Product ID" value="1" min="1">
        </input>
    </div>
        <!-- name -->
        <div>
        <label>Product Name</label>
        <input type="text" name= "product_name" placeholder="Enter Product Name" >
            </input>
            <?php if(isset($errors['product_name'])){echo "<p>" .$errors['product_name']. "</p>"; } ?>
        </div>
       

        <!-- image -->
        <div>
        <label for="uploadFile">Product Image</label></td>

        <input style=" color: white"type="file" name="uploadFile" accept=".jpg, .jpeg, .png" required/>
        </div>


        <!-- Price  -->
        <div>
        <label>Prodcut Price</label> </td>

                <input type="text" name= "product_price" placeholder="Enter Product Price" >
                </input>

                <?php if(isset($errors['product_price'])){echo "<p>" .$errors['product_price']. "</p>"; } ?>   
        </div>



        <button type="submit" value="submit" name = "submit">Update Product</button>  

<br><br><br>
        <span>Updated Products</span>
        <br>
        <br>
        <table align="center">
            <tr>
                <th>Product ID</th>
                <th>Seller Name</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Image</td>
                
            </tr>

         <?php
                    $sql = "Select *from `product` where sellername= '$varr'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $sellername = $row['sellername'];
                            $product_name = $row['name'];
                            $product_price = $row['price'];

                            echo "<tr>
                            <td> {$id}</td>
                            <td> {$sellername}</td>
                            <td> {$product_name}</td>
                            <td> {$product_price}</td>
                            <td><img src=../view/images/$row[image]></td>
                            </tr>";


                        }
                }

                if($_SERVER["REQUEST_METHOD"]=="POST"){

                    //image
                
                    $imagename = $_FILES['uploadFile']['name'];
                    $tmpname=  $_FILES['uploadFile']['tmp_name'];
                    $folder = '../images/'.$imagename;
                
                
                
                    if(preg_match("/\S+/", $_POST['product_name']) === 0){
                        $errors['product_name'] = "* Product name is required.";
                    }
                    
                    if(preg_match("/\S+/", $_POST['product_price']) === 0){
                        $errors['product_price'] = "* Product price is required.";
                    }
                
                    
                    if(count($errors) === 0){
                        $name  = mysqli_real_escape_string($conn, $_POST['product_name']);
                        $price  = mysqli_real_escape_string($conn, $_POST['product_price']);
                
                        if(isset($_POST['submit'])){
                
                            $pid = $_POST['pid'];
                
                            
                            $sql2 = "UPDATE product  SET name = '$name', price= '$price', image = '$imagename' where id= $pid ";
                                        if($conn->query($sql2)===TRUE){
                                            move_uploaded_file($tmpname,$folder);
                                            $query = mysqli_query($conn, $sql);
                                            $_POST['product_name'] = '';
                                            $_POST['product_price'] = '';
                                            
                                            echo '<script>alert("Product Updated Successfully")</script>';
                                            echo '<script>window.location="../view/sellerdash.php"</script>';
                                        }
                                        else{
                                            echo "Error: " .$conn->error;
                                        }
                
                
                        }
                        
                
                
                
                    }
                    
                    
                
                }

         ?>   

        </table>
        
   
	</form>
    </div>
    <?php include('../view/footer.php');?>
</body>
</html>
