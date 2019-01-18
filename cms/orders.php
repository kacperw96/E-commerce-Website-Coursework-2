<?php
	include ('..\common.php');
	outputHeader("CMS Login");
?>

        <ul>
			<li><a href="add_product.php">Add product</a></li>
            <li><a href="edit_product.php">Edit product</a></li>
			<li><a href="view_products.php">View products</a></li>
            <li><a href="edit_customer.php">Edit customer</a></li>
			<li><a class="active" href="orders.php">Placed orders</a></li>
            <li class="menuLogin active" style="float:right;"><a href="..\shop.php">Back to shop</a></li>
        </ul>        
      </div>
	  
	  
<!------------------------------------------------------------------------------------------------------------------------>	  
	<div class="container">
		<button onclick="view_orders()" type="button" class="btn btn-info btn-sm">View all orders</button>
		<button onclick="change_order()" type="button" class="btn btn-info btn-sm">Change order details</button>
		
		<div id="container2"> <div>
	</div>	 
</div>
	
<!------------------------------------------------------------------------------------------------------------------------>	  

<script>
function view_orders(){
	document.getElementById("container2").innerHTML ="";
	var _request = new XMLHttpRequest();
	_request.onload = function(){
		
		if(_request.status === 200){
			var productsJSONarray = _request.responseText;	
			var productsArray = JSON.parse(productsJSONarray);
			document.getElementById("container2").innerHTML ='   <br><table id="table" class="table table-striped"> </table>';
			var newRow = table.insertRow(table.length);
			
			var cell = newRow.insertCell(0); 
				cell.innerHTML = "Order number"; 
				
				cell = newRow.insertCell(1); 
				cell.innerHTML = "Customer"; 

				cell = newRow.insertCell(2); 
				cell.innerHTML = "Ordered products";

				cell = newRow.insertCell(3); 
				cell.innerHTML = "Total price"; 
				
			for (var i = 0; i < productsArray.length; i++){
				newRow = table.insertRow(table.length);
			
				cell = newRow.insertCell(0); 
				cell.innerHTML = productsArray[i]._id["$id"]; 
				
				cell = newRow.insertCell(1); 
				cell.innerHTML = productsArray[i]["Customer"];

				cell = newRow.insertCell(2); 
				cell.innerHTML = productsArray[i]["Ordered products information"];

				cell = newRow.insertCell(3); 
				cell.innerHTML = productsArray[i]["Total price"]; 
			}			
		}else
			alert("Error communicating with server: " + _request.status);
	};
	_request.open("POST", "load_orders.php");
	_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	_request.send();	
}

function change_order(){
	document.getElementById("container2").innerHTML ="";
	document.getElementById("container2").innerHTML =
		'<div>' +
		'<br>' +
		'	<div class="form-group">' +
		'		<label for="surname">Enter order ID to edit:</label>' +
		'		<input type="text" class="form-control" id="orderID">' +
		'	</div>' +
		'' +
		'<div class="input-group">' +
		'		<div class="center"><button onclick="load_order()" class="item_add btn btn-primary col-md-12">Load order details</button></div>' +
		'	</div>' +
		'<div>' +
		'' +
		'<h2> Update order details </h2>' +
		'' +
		'	<div class="form-group">' +
		'		<label for="name">Customer:</label>' +
		'		<input type="text" class="form-control" id="NewName">' +
		'	</div>' +
		'	' +
		'	<div class="form-group">' +
		'		<label for="surname">Order information:</label>' +
		'		<input type="text" class="form-control" id="NewSurname">' +
		'	</div>' +
		'	' +
		'	<div class="form-group">' +
		'		<label for="fl_number">Total price:</label>' +
		'		<input type="text" class="form-control" id="NewFlatNo">' +
		'	</div>' +
		'	' +
		'	<div class="form-group">' +
		'		<label for="street">Products:</label>' +
		'		<input type="text" class="form-control" id="NewStreet">' +
		'	</div>' +
		'	' +
		'	<div class="form-group">' +
		'		<label for="city">Quantity:</label>' +
		'		<input type="text" class="form-control" id="NewCity">' +
		'	</div>' +
		'	' +
		'	<div class="input-group">' +
		'		<div class="center"><button onclick="update_order()" class="item_add btn btn-primary col-md-12">Update order details</button></div>' +
		'	</div>' +
		'' +
		'</div>	';	
}
</script>
      
<?php
	outputFooterCMS();
?>