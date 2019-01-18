<?php
	include ('..\common.php');
	outputHeader("CMS Login");
?>

        <ul>
			<li><a href="add_product.php">Add product</a></li>
            <li><a href="edit_product.php">Edit product</a></li>
			<li><a href="view_products.php">View products</a></li>
            <li><a class="active" href="edit_customer.php">Edit customer</a></li>
			<li><a href="orders.php">Placed orders</a></li>
            <li class="menuLogin active" style="float: right;"><a href="..\shop.php">Back to shop</a></li>
        </ul>        
      </div>
	  
	  
<!------------------------------------------------------------------------------------------------------------------------>	  
<div class="container">
	
	<div>
		<div class="form-group">
			<label for="surname">Enter customer email:</label>
			<input type="email" class="form-control" id="email">
		</div>

		<div class="input-group">
			<div class="center"><button onclick="load_customer()" class="item_add btn btn-primary col-md-12">Load customer details</button></div>
		</div>
	<div>
	
	<h2> Update customer details </h2>
	
		<div class="form-group">
			<label for="name">New name:</label>
			<input type="text" class="form-control" id="NewName">
		</div>
		
		<div class="form-group">
			<label for="surname">New Surname:</label>
			<input type="text" class="form-control" id="NewSurname">
		</div>
		
		<div class="form-group">
			<label for="fl_number">New flat number:</label>
			<input type="text" class="form-control" id="NewFlatNo">
		</div>
		
		<div class="form-group">
			<label for="street">New street adress:</label>
			<input type="text" class="form-control" id="NewStreet">
		</div>
		
		<div class="form-group">
			<label for="city">New city:</label>
			<input type="text" class="form-control" id="NewCity">
		</div>
		
		<div class="form-group">
			<label for="pass">New password:</label>
			<input type="password" class="form-control" id="NewPassword">
		</div>
		
		<div class="form-group">
			<label for="email">New email adress:</label>
			<input type="email" class="form-control" id="NewEmail">
		</div>
		
		<div class="input-group">
			<div class="center"><button onclick="update_customer()" class="item_add btn btn-primary col-md-12">Update customer details</button></div>
		</div>
	
	</div>	
</div>	
<!------------------------------------------------------------------------------------------------------------------------>	  
 
<script>
function load_customer(){
	var request = new XMLHttpRequest();
	request.onload = function(){
		
		if(request.status === 200){			
			var myObj = JSON.parse(this.responseText);
			if (myObj[0] != 0){
				if(myObj[0] != undefined){
					alert("Customer found! Data will be loaded on to page.");

					document.getElementById("NewName").value=myObj[0];
					document.getElementById("NewSurname").value=myObj[1];
					document.getElementById("NewFlatNo").value=myObj[2];
					document.getElementById("NewStreet").value=myObj[3];
					document.getElementById("NewCity").value=myObj[4];
					document.getElementById("NewEmail").value=myObj[5];	
					document.getElementById("NewPassword").value=myObj[6];
				}else
					alert("Customer not found!");
			}else
				alert("Please enter email!");
		}
		else
			alert("Error communicating with server: " + request.status);
	};
	request.open("POST", "load_customer.php");
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	var id = document.getElementById("email").value;
	request.send("__id=" + id);
}


function update_customer(){
	var _request = new XMLHttpRequest();
	_request.onload = function(){
		
		if(_request.status === 200){
			var responseData = _request.responseText;
			alert(responseData);
		}else
			alert("Error communicating with server: " + _request.status);
	};
	_request.open("POST", "update_customer.php");
	_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	var OldEmail = document.getElementById("email").value;	
	
	var NewName = document.getElementById("NewName").value;
	var NewSurname = document.getElementById("NewSurname").value;
	var NewFlat = document.getElementById("NewFlatNo").value;
	var NewStreet = document.getElementById("NewStreet").value;
	var NewCity = document.getElementById("NewCity").value;
	var NewEmail = document.getElementById("NewEmail").value;
	var NewPassword = document.getElementById("NewPassword").value;
	
	_request.send("OldEm=" + OldEmail + "&NewNa=" + NewName + "&NewSur=" + NewSurname + "&NewFl=" + NewFlat + "&NewSt=" + NewStreet + "&NewCi=" + NewCity + "&NewEm=" + NewEmail + "&NewPw=" + NewPassword);
}
</script>
 
<?php
	outputFooterCMS();
?>