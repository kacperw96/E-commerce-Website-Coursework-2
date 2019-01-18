<?php
	include ('..\common.php');
	outputHeader("CMS Login");
?>

        <ul>
			<li><a href="add_product.php">Add product</a></li>
            <li><a href="edit_product.php">Edit product</a></li>
            <li><a class="active" href="view_products.php">View products</a></li>
            <li><a href="edit_customer.php">Edit customer</a></li>
			<li><a href="orders.php">Placed orders</a></li>
            <li class="menuLogin active" style="float:right;"><a href="..\shop.php">Back to shop</a></li>
        </ul>        
      </div>
	  
	  
<!------------------------------------------------------------------------------------------------------------------------>	  

<div class="container">
	<div class="input-group">
		<div class="center"><button onclick="load_products()"  class="item_add btn btn-primary col-md-12">Load all products</button></div>
	</div>
	<table id="table" class="table table-striped"> </table>
</div>	
<!------------------------------------------------------------------------------------------------------------------------>	  

<script>
function load_products(){
	var Table = document.getElementById("table");
	Table.innerHTML = "";
	var _request = new XMLHttpRequest();
	_request.onload = function(){
		if(_request.status === 200){
			var productsJSONarray = _request.responseText;	
			var productsArray = JSON.parse(productsJSONarray);
			var newRow = table.insertRow(table.length);
			
			var cell = newRow.insertCell(0); 
				cell.innerHTML = "Product"; 

				cell = newRow.insertCell(1); 
				cell.innerHTML = "Stock";

				cell = newRow.insertCell(2); 
				cell.innerHTML = "Price"; 

				cell = newRow.insertCell(3); 
				cell.innerHTML = "Path"; 
	
	
			for (var i = 0; i < productsArray.length; i++){
				newRow = table.insertRow(table.length);
			
				cell = newRow.insertCell(0); 
				cell.innerHTML = productsArray[i]._id; 

				cell = newRow.insertCell(1); 
				cell.innerHTML = productsArray[i]["Number of stock"];

				cell = newRow.insertCell(2); 
				cell.innerHTML = productsArray[i].Price; 

				cell = newRow.insertCell(3); 
				cell.innerHTML = productsArray[i].Image;
			}			
		}else
			alert("Error communicating with server: " + _request.status);
	};
	_request.open("POST", "load_products.php");
	_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	_request.send();
}

</script>	      
<?php
	outputFooterCMS();
?>