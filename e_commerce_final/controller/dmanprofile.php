<?php
include("../model/connection.php");
$link_address1 ='dman_update.php';
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
    <title>DeliveryMan Profile</title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../view/css/profile.css">
    </head>
<body>
    <div class="div container">

            
            <?php
            include('../view/dmanheader.php');

            $varr = $_SESSION['user'];
            $sql = "Select *from `dman` where username= '$varr'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $fullname = $row['fullname'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $mobile = $row['mobile'];
                    $gender = $row['gender'];
                    // Display Table
                    ?>
                    <br>
                    <br>
                    <br>
                    <br>
                    <table align="center">
                        <tr>
                            <th rowspan="5" style="width: 20%;"> <?php echo" <img src=../view/images/$row[image]> " ?></th>
                            <th>Name</th>
                            <td><?php echo $fullname ?></td>
                        </tr>

                        <tr>
                            <th>User Name</td>
                            <td><?php echo $username ?></td>

                        </tr>

                        <tr>
                            <th>Email</td>
                            <td><?php echo $email ?></td>

                        </tr>
                        <tr>
                            <th>Mobile</td>
                            <td><?php echo $mobile ?></td>

                        </tr>

                        <tr>
                            <th>Gender</td>
                            <td><?php echo $gender ?></td>

                        </tr>

                    </table>

                    <?php
                    


                }
            }

            

            ?>
        </table>
        
        <?php 
                echo"<button><a href='$link_address1?update_profile=".$varr."'>Update Profile</a></button>";
        ?>
        

        </div>
        <?php include('../view/footer.php');?>
</body>

</html>