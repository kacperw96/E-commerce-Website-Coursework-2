<?php
	include ('common.php');
	outputHeader("Shop at Phone Word!");
	outputBannerNavigation("Shop");
?>
	<div onload="load_prod()" id="cont" class="container">

		<button onclick="low_high()" type = "button" class = "btn btn-default btn-sm">Price Low-High</button>
		<button onclick="high_low()" type = "button" class = "btn btn-default btn-sm">Price High-Low</button>
		<button onclick="a_z()" type = "button" class = "btn btn-default btn-sm">Products A-Z</button>
		<button onclick="z_a()" type = "button" class = "btn btn-default btn-sm">Products Z-A</button>

		<span style="font-size:30px;cursor:pointer; float: right;" onclick="openNav()">&#x1F6CD; Basket</span>	
		<table id="table"></table>

	</div>
  
  
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<table id="myBasket" class="basket">
			<tr>
				<th style="width:200px">Product</th>
				<th style="width:20px">Qty</th>
				<th style="width:100px">Price</th>
			</tr>
		</table>

		<table id="Basket_total" class="basket" style="width: 175px; font-size: 20px; float: right;">
			<tr >
				<th style="font-size: 20px;">Total:</th>
				<th id="total_price">0</th>
			</tr>
		</table>
		
		<div style = "display: block; margin: 0 auto; padding-left: 35px;">
			<button onclick ="checkout()" type="button" class="btn btn-primary btn-lg col-md-6">Checkout</button>
			<button onclick ="clear_basket()" type="button" class="btn btn-secondary btn-lg col-md-4">Clear</button>
		</div>
	</div>
	  
<script>
	window.onload = load_prod;
	var tot_price = 0; 
	
function output_phones(_request){
	document.getElementById("table").innerHTML="";
	var productsJSONarray = _request.responseText;	
	var productsArray = JSON.parse(productsJSONarray);	
	var arr = productsArray.length/3;
	var no_of_rows = Math.ceil(arr);
	var counter = 0;
	var t = document.getElementById("table");
	
	for (var i = 0 ; i < no_of_rows; i++){			
		var newRow = t.insertRow(t.length);// create a new row
		for (var x = 0 ; x < 3; x++){
			var x1 = "product_" + counter;
			var x2 = "product_price" + counter;
			
			var cell = newRow.insertCell();
				cell.setAttribute("class", "col-md-4 phoneItem");
				cell.setAttribute("id", x1);
				cell.innerHTML ='                  <h2 id="name">'+ productsArray[counter]._id + '</h2>' +
								'                  <img src='+ productsArray[counter].Image +'>' +
								'                  <h2 id="price">'+ productsArray[counter].Price +'</h2>' +
								'                  <div class="input-group">' +
								'                      <input id="qty" type="text"  value="1" class="item_Quantity form-control col-md-5 center-block">' +
								'                      <button  onclick="add_to_basket('+ counter + ')" class="item_add btn btn-primary col-md-6">Add to basket</button>' +
								'                  </div>';
			
			
			counter++;
			if(counter >= productsArray.length){						
				x = 3;
				i = no_of_rows;
			}//end if				
		}//end of cell
	}//end of no_of_rows	
}

function load_prod(){
	var _request = new XMLHttpRequest();
	_request.onload = function(){
		if(_request.status === 200){	
		output_phones(_request);
		}else
			alert("Error communicating with server: " + _request.status);
	};
	_request.open("POST", "cms/load_products.php");
	_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	var no = 0;
	_request.send("_condition=" + no);
}
	
function low_high(){
	var _request = new XMLHttpRequest();
	_request.onload = function(){
		if(_request.status === 200){
			output_phones(_request);		
		}else
			alert("Error communicating with server: " + _request.status);
	};

	_request.open("POST", "cms/load_products.php");
	_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var no = 1;
	_request.send("_condition=" + no);
}

function high_low(){
	var _request = new XMLHttpRequest();
	_request.onload = function(){
		
		if(_request.status === 200){
				output_phones(_request);		
		}else
			alert("Error communicating with server: " + _request.status);
	};

	_request.open("POST", "cms/load_products.php");
	_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var no = -1;
	_request.send("_condition=" + no);
}

function a_z(){
	var _request = new XMLHttpRequest();
	_request.onload = function(){
		
		if(_request.status === 200){
				output_phones(_request);		
		}else
			alert("Error communicating with server: " + _request.status);
	};

	_request.open("POST", "cms/load_products.php");
	_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var no = 2;
	_request.send("_condition=" + no);
}

function z_a(){
	var _request = new XMLHttpRequest();
	_request.onload = function(){
		
		if(_request.status === 200){
				output_phones(_request);		
		}else
			alert("Error communicating with server: " + _request.status);
	};

	_request.open("POST", "cms/load_products.php");
	_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var no = -2;
	_request.send("_condition=" + no);
}

function openNav() {
    document.getElementById("mySidenav").style.width = "350px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
 
function add_to_basket(product_no){
	openNav();
	var x = "product_" + product_no;

	var t = document.getElementById("myBasket");
	var newRow = t.insertRow(t.length);
	
	cell = newRow.insertCell(0); 
	cell.innerHTML = document.querySelector("#"+ x + " #name").innerHTML;

	cell = newRow.insertCell(1); 
	cell.innerHTML = document.querySelector("#"+ x + " #qty").value;
	var number_of_products = document.querySelector("#"+ x + " #qty").value;

	cell = newRow.insertCell(2); 
	cell.innerHTML = document.querySelector("#"+ x + " #price").innerHTML;		
	
	var p =  document.querySelector("#"+ x + " #price").innerHTML;
	var p_value = parseInt(p) * number_of_products;
	
	basket_total(p_value);
}

function basket_total(p_value){
	tot_price = tot_price + p_value;
	document.getElementById("Basket_total").rows[0].cells[1].innerHTML = tot_price + ".00";
}

function clear_basket(tablename) { 
	var rowCount = myBasket.rows.length;
	for (var i = rowCount - 1; i > 0; i--) {
		myBasket.deleteRow(i);
	} 
	document.getElementById("Basket_total").rows[0].cells[1].innerHTML = 0;	
	tot_price = 0;
}

function checkout(){
	var user = localStorage.Logged;
	var rowCount = myBasket.rows.length;
	var productsArray = [];
	
		for (var i = rowCount - 1; i > 0; i--) {	
			var Product = document.getElementById("myBasket").rows[i].cells[0].innerHTML;
			var Quantity = document.getElementById("myBasket").rows[i].cells[1].innerHTML;
			var Total = document.getElementById("Basket_total").rows[0].cells[1].innerHTML;
			var User = localStorage.getItem("Logged");
			productsArray[i-1] = {Product, Quantity, Total, User};
		}
	
	var myJsonProductsArray = JSON.stringify(productsArray);
	var _request = new XMLHttpRequest();
	_request.onload = function(){
		if(_request.status === 200){
			var responseData = _request.responseText;
			alert(responseData);
		}
		else
			alert("Error communicating with server: " + _request.status);
	};

	_request.open("POST", "cms/checkout.php");
	_request.setRequestHeader("Content-type", "application/json")
	_request.send(myJsonProductsArray);
}
</script>
	
	
<?php
	outputFooter();
?>