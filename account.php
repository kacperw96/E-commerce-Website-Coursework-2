<?php
	include ('common.php');
	outputHeader("Your account");
	outputBannerNavigation("My Account");
?>

<!------------------------------------------------------------------------------------------------------------------------>	  
	  
	<div onload="checkUser()" id="myAcc" class="container">
		<button onclick="past_orders()" type="button" class="btn btn-info btn-sm">View past orders</button>
		<button onclick="acc_data()" type="button" class="btn btn-info btn-sm">Change account details</button>
		<div id="container2">

		<div>
	</div>

<!------------------------------------------------------------------------------------------------------------------------>	  
      
<script>
window.onload = checkUser;

function checkUser() {
	var user = localStorage.getItem("Logged");
	if(user != null){
		
	}else{
		document.getElementById("myAcc").innerHTML = "";
		alert("Please login first!");
		window.location.href = "login.php";
	}
}

function past_orders(){
	document.getElementById("container2").innerHTML ="";	
	var _request = new XMLHttpRequest();
	_request.onload = function(){
		if(_request.status === 200){
			var productsJSONarray = _request.responseText;	
			var productsArray = JSON.parse(productsJSONarray);	
			console.log(productsArray);
			document.getElementById("container2").innerHTML ='    <table id="table" class="table table-striped"> </table>';
			var newRow = table.insertRow(table.length);
			
			var cell = newRow.insertCell(0); 
			cell.innerHTML = "Order number"; 

			cell = newRow.insertCell(1); 
			cell.innerHTML = "Ordered products";

			cell = newRow.insertCell(2); 
			cell.innerHTML = "Total price"; 
	
	
			for (var i = 0; i < productsArray.length; i++){
				newRow = table.insertRow(table.length);
			
				cell = newRow.insertCell(0); 
				cell.innerHTML = productsArray[i]._id["$id"]; 

				cell = newRow.insertCell(1); 
				cell.innerHTML = productsArray[i]["Ordered products information"];

				cell = newRow.insertCell(2); 
				cell.innerHTML = productsArray[i]["Total price"]; 
			}			
		}
		else
			alert("Error communicating with server: " + _request.status);
	};
	
	_request.open("POST", "cms/load_orders.php");
	_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	_request.send("_condition=" + localStorage.getItem("Logged"));
}

function acc_data(){
	document.getElementById("container2").innerHTML ="";
	var email = localStorage.getItem("Logged");
	document.getElementById("container2").innerHTML = 
	'	<div> ' +
	'	<div class="form-group">' +
	'		<label for="surname">Your email adress:</label>' +
	'		<input type="email" class="form-control" id="email" value="'+ email + '" disabled>' +
	'	</div>' +
	'' +
	'	<div class="input-group">' +
	'		<div class="center"><button onclick="load_customer()" class="item_add btn btn-primary col-md-12">Load your account details</button></div>' +
	'	</div>' +
	'</div>' +
	'' +
	'<div>' +
	'<h2> Update your details </h2>' +
	'' +
	'	<div class="form-group">' +
	'		<label for="name">New name:</label>' +
	'		<input type="text" class="form-control" id="NewName">' +
	'	</div>' +
	'	' +
	'	<div class="form-group">' +
	'		<label for="surname">New Surname:</label>' +
	'		<input type="text" class="form-control" id="NewSurname">' +
	'	</div>' +
	'	' +
	'	<div class="form-group">' +
	'		<label for="fl_number">New flat number:</label>' +
	'		<input type="text" class="form-control" id="NewFlatNo">' +
	'	</div>' +
	'	' +
	'	<div class="form-group">' +
	'		<label for="street">New street adress:</label>' +
	'		<input type="text" class="form-control" id="NewStreet">' +
	'	</div>' +
	'	' +
	'	<div class="form-group">' +
	'		<label for="city">New city:</label>' +
	'		<input type="text" class="form-control" id="NewCity">' +
	'	</div>' +
	'	' +
	'	<div class="form-group">' +
	'		<label for="pass">New password:</label>' +
	'		<input type="password" class="form-control" id="NewPassword">' +
	'	</div>' +
	'	' +
	'	<div class="form-group">' +
	'		<label for="email">New email adress:</label>' +
	'		<input type="email" class="form-control" id="NewEmail">' +
	'	</div>' +
	'	' +
	'	<div class="input-group">' +
	'		<div class="center"><button onclick="update_customer()" class="item_add btn btn-primary col-md-12">Update details</button></div>' +
	'	</div>';
}


function load_customer(){
	var request = new XMLHttpRequest();
	request.onload = function(){
		
		if(request.status === 200){
					
			var myObj = JSON.parse(this.responseText);
			
			if (myObj[0] != 0){
		
				alert("Customer found! Data will be loaded on to page.");

				document.getElementById("NewName").value=myObj[0];
				document.getElementById("NewSurname").value=myObj[1];
				document.getElementById("NewFlatNo").value=myObj[2];
				document.getElementById("NewStreet").value=myObj[3];
				document.getElementById("NewCity").value=myObj[4];
				document.getElementById("NewEmail").value=myObj[5];	
				document.getElementById("NewPassword").value=myObj[6];	
			}else{
				alert("Please enter email!");}
		}
		else
			alert("Error communicating with server: " + request.status);
	};
	request.open("POST", "cms/load_customer.php");
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
		}
		else
			alert("Error communicating with server: " + _request.status);
	};
	_request.open("POST", "cms/update_customer.php");
	_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	var OldEmail = document.getElementById("email").value;
	
	var NewName = document.getElementById("NewName").value;
	var NewSurname = document.getElementById("NewSurname").value;
	var NewFlat = document.getElementById("NewFlatNo").value;
	var NewStreet = document.getElementById("NewStreet").value;
	var NewCity = document.getElementById("NewCity").value;
	var NewEmail = document.getElementById("NewEmail").value;
	var NewPassword = document.getElementById("NewPassword").value;
	
	var new_email = localStorage.setItem("Logged",NewEmail);
		OldEmail = document.getElementById("email").value=localStorage.getItem("Logged");
	
	_request.send("OldEm=" + OldEmail + "&NewNa=" + NewName + "&NewSur=" + NewSurname + "&NewFl=" + NewFlat + "&NewSt=" + NewStreet + "&NewCi=" + NewCity + "&NewEm=" + NewEmail + "&NewPw=" + NewPassword);
}
</script>

<?php
	outputFooter();
?>