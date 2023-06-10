<?php
include("../model/connection.php");
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $sql = "delete from `sellers` where id=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        //echo "Deleted Successfully";
        header("location:../view/display_sellers.php");
    }
    else{
        die(mysqli_error($conn));
    }
}
?>