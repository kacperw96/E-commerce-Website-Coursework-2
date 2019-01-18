<?php
	include ('..\common.php');
	outputHeader("CMS");
?>

        <ul>
			<li><a class="active" href="add_product.php">Add product</a></li>
            <li><a href="edit_product.php">Edit product</a></li>
			<li><a href="view_products.php">View products</a></li>
            <li><a href="edit_customer.php">Edit customer</a></li>
			<li><a href="orders.php">Placed orders</a></li>
            <li class="menuLogin active" style="float:right;"><a href="..\shop.php">Back to shop</a></li>
        </ul>        
      </div>
	  
	  
<!------------------------------------------------------------------------------------------------------------------------>	  
<div class="container">
	
	<div class="form-group">
		<label for="tytule">Product title:</label>
		<input type="text" class="form-control" id="productTytule">
	</div>
	
	
	<div class="form-group">
		<label for="units">Number of units:</label>
		<input type="number" class="form-control" id="units">
	</div>	 	 
	 
	 
	<div class="form-group">
		<label for="price">Unit price in pounds:</label>
		<input type="number" class="form-control" id="price">
	</div>
	
	
	<div class="form-group">
		<label for="img">Image path:</label>
		<input type="text" class="form-control" id="path" placeholder="C:\xampp\www\CW2\img\product_image.jpg">
	</div>	
	
	 
	<div class="input-group">
		<div class="center"><button onclick="add_product()"  class="item_add btn btn-primary col-md-12">Add product</button></div>
	</div>
<!------------------------------------------------------------------------------------------------------------------------>	 
	<div class="form-group">
		<label for="tytule">Enter product title to delete:</label>
		<input type="text" class="form-control" id="deleteProduct">
	</div>	  
	 
	<div class="input-group">
		<div class="center"><button onclick="delete_product()"  class="item_add btn btn-primary col-md-12">Delete product</button></div>
	</div>
	 
</div>	
<!------------------------------------------------------------------------------------------------------------------------>	  
   
<script>
function add_product(){
	var request = new XMLHttpRequest();
	request.onload = function(){
		if(request.status === 200){
			var responseData = request.responseText;
			alert(responseData);
		}
		else
			alert("Error communicating with server: " + request.status);
	};
	
	request.open("POST", "product_db.php");
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	var pr = document.getElementById("productTytule").value;
	var qt = document.getElementById("units").value;
	var prc = document.getElementById("price").value;
	var ph = document.getElementById("path").value;
	request.send("_product=" + pr + "&_units=" + qt + "&_price=" + prc + "&_path=" + ph);
	
}

function delete_product(){
	var request = new XMLHttpRequest();
	request.onload = function(){
		if(request.status === 200){
			var responseData = request.responseText;
			alert(responseData);
		}
		else
			alert("Error communicating with server: " + request.status);
	};
	request.open("POST", "product_db_delete.php");
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	var pr = document.getElementById("deleteProduct").value;
	request.send("_product=" + pr);	
}
</script>

   
<?php
	outputFooterCMS();
?>