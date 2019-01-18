<?php
	include ('..\common.php');
	outputHeader("CMS");
?>

        <ul>
			<li><a href="add_product.php">Add product</a></li>
            <li><a class="active" href="edit_product.php">Edit product</a></li>
			<li><a href="view_products.php">View products</a></li>
            <li><a href="edit_customer.php">Edit customer</a></li>
			<li><a href="orders.php">Placed orders</a></li>
            <li class="menuLogin active" style="float:right;"><a href="..\shop.php">Back to shop</a></li>
        </ul>        
      </div>
	  
	  
<!------------------------------------------------------------------------------------------------------------------------>	  
<div class="container">
	<div>
		<div class="form-group">
			<label for="tytule">Enter product to edit:</label>
			<input type="text" class="form-control" id="productTytule">
		</div>

		<div class="input-group">
			<div class="center"><button onclick="check_product()" class="item_add btn btn-primary col-md-12">Check if product exist</button></div>
		</div>
	</div>
<!------------------------------------------------------------------------------------------------------------------------>			 
	<div>
		<div class="form-group">
			<label for="tytule">Enter product to edit:</label>
			<input type="text" class="form-control" id="NewproductTytule">
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
			<div class="center"><button onclick="update_product()"  class="item_add btn btn-primary col-md-12">Update product</button></div>
		</div>
	</div>	
</div>  
 
<script>
function check_product(){
	var request = new XMLHttpRequest();
	request.onload = function(){
		if(request.status === 200){
			var myObj = JSON.parse(this.responseText);
			
			if (myObj[0] != 0){
			alert("Product found and will be loaded on to page");

			document.getElementById("NewproductTytule").value=myObj[0];
			document.getElementById("units").value=myObj[1];
			document.getElementById("price").value=myObj[2];
			document.getElementById("path").value=myObj[3];
			
			}else{
				alert("Please enter product name!");
			}
		}
		else
			alert("Error communicating with server: " + request.status);
	};
	
	request.open("POST", "check_product.php");
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	var pr = document.getElementById("productTytule").value;
	request.send("_product=" + pr);
}	

function update_product(){
	var _request = new XMLHttpRequest();
	_request.onload = function(){
		if(_request.status === 200){
			var responseData = _request.responseText;
			alert(responseData);
		}else
			alert("Error communicating with server: " + _request.status);
	};
	_request.open("POST", "update_product.php");
	_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	var pr = document.getElementById("NewproductTytule").value;
	var qt = document.getElementById("units").value;
	var prc = document.getElementById("price").value;
	var ph = document.getElementById("path").value;
	_request.send("NewProduct=" + pr + "&NewUnits=" + qt + "&NewPrice=" + prc + "&NewPath=" + ph);	
}
</script>
 
<?php
	outputFooterCMS();
?>