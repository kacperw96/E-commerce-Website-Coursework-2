<?php
	include ('..\common.php');
	outputHeader("CMS Login");
?>
        <ul>
            <li class="menuLogin active" style="float:right;"><a href="..\shop.php">Back to shop</a></li>
        </ul>        
      </div>
	  
<!------------------------------------------------------------------------------------------------------------------------>	  

<div class="container">
	<h1> Enter admin details to access CMS! </h1>

	<div class="form-group">
		<label for="email">Admin:</label>
		<input type="text" class="form-control" id="email">
	</div>

	<div class="form-group">
		<label for="pwd">Password:</label>
		<input type="password" class="form-control" id="pwd">
	</div>

	<p style="color:green;" id="OK"></p>
	<p style="color:red;" id="WRONG"></p>

	<div class="input-group">
		<div class="center"><button  onclick="check_admin()" class="item_add btn btn-primary col-md-12">Login</button></div>
	</div>
</div>

<!------------------------------------------------------------------------------------------------------------------------>	  

<script>
function check_admin(){
	var _request = new XMLHttpRequest();
	_request.onload = function(){

		if(_request.status === 200){
			var responseData = _request.responseText;
			if(responseData == 1){
				document.getElementById("OK").innerHTML = "Admin details match, you will be redirected to CMS panel!";
				document.getElementById("WRONG").innerHTML = "";
				window.location.replace("add_product.php");
			}else{
				document.getElementById("OK").innerHTML = "";
				document.getElementById("WRONG").innerHTML = "Enter admin details";
			}
		}
		else
			alert("Error communicating with server: " + _request.status);
	};
 
	_request.open("POST", "check_admin.php");
	_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
	var id = document.getElementById("email").value;
	var pass = document.getElementById("pwd").value;
	_request.send("__id=" + id + "&__pw=" + pass );
}
</script>	
      
<?php
	outputFooterCMS();
?>