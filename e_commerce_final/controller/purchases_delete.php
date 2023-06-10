<?php
include("../model/connection.php");
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $sql = "delete from `purchasehistory` where purchase_token = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
        //echo "Deleted Successfully";
        header("location:../view/displaypurchases.php");
    }
    else{
        die(mysqli_error($conn));
    }
}
?>