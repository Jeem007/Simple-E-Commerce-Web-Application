<?php
include("../model/connection.php");
$link_address2 ='../controller/sellers_delete.php';
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
        <title>Seller Information</title>
    </head>
<body>
<?php include('admin_header.php');?>
<br>
<br>
<br>
<br>
<div>
    <span>Seller Details</span>
</div>
<br>
<br>
    <div class="container2">
        <table align="center" >
            <tr>
                <th style="width: 10%;">ID</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Image</th>
                <th>Operation</td>
            </tr>

            
            <?php
            $sql = "Select *from `sellers` ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $fullname = $row['fullname'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $mobile = $row['mobile'];
                    $gender = $row['gender'];


                    echo "<tr>
                    <td> {$id}</td>
                    <td> {$fullname}</td>
                    <td> {$username}</td>
                    <td> {$email}</td>
                    <td> {$mobile}</td>
                    <td> {$gender}</td>
                    <td><img src=../view/images/$row[image]></td>
                    <td> 
                    <button><a href='$link_address2?delete_id=".$id."'>Delete Seller</a></button>
                    </td>
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