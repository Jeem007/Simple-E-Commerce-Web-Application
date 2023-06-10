<?php
include("../model/connection.php");
$link_address2 ='../controller/products_delete.php';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../view/css/displayusers.css">
        <title>Display Products</title>
    </head>
<body>
<?php include('admin_header.php');?>
<br>
<br>
<br>
<br>
<div>
    <span>Products Details</span>
</div>
<br>
<br>
<div class="container">
			<br />
			<div class="form_group">
				<div class="input_group">
					<sapn class="input_search">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="Search Product Details" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br>
		<br>
		<br>
        
        <?php include('../view/footer.php');?>

</body>

</html>


<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"../controller/fetch_product_information.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>