
<div class="table-responsive">
<table class="table table bordered" align= "center">
    <tr>
        <th style="width:5%">ID</th>
        <th style="width:10%">Seller Name</th>
        <th style="width:40%">Product Name</th>
        <th style="width:5%">Price</th>
        <th style="width:20%">Product Image</th> 
        <th style="width:5%">Operation</th>
</tr>


<?php
include("../model/connection.php");
$link_address2 ='../controller/products_delete.php';
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "
	SELECT * FROM product
	WHERE name LIKE '%".$search."%'
	OR id LIKE '%".$search."%'
        OR sellername LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM product ORDER BY id";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{


	while($row = mysqli_fetch_array($result))
	{
        $id = $row['id'];
        $sellername = $row['sellername'];
        $name = $row['name'];
        $price = $row['price'];
	
        echo "<tr>
        <td> {$id}</td>
        <td> {$sellername}</td>
        <td> {$name}</td>
        <td><img src=../view/images/$row[image]>
        <td> {$price}</td>                
        <td> 
        <button><a href='$link_address2?delete_id=".$id."'>Delete Product</a></button>
        </td>
        </tr>";

	}
}
else
{
	
        ?>
        
        <h3 style="color:red;" align = "center"> <?php echo"No Data Found" ?> </h2>

        <?php
}


?>