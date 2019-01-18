<?php
	include ('common.php');
	outputHeader("Sign Up");
	outputBannerNavigation("Register");
?>
 
 
<!------------------------------------------------------------------------------------------------------------------------>	

	  
      <div class="container">
          <div class="loginBox center">
		  	
			<div class="form-group">
				<label for="Name1">Name</label>
				<input type="text" class="form-control" id="InputName1" name = "InName1" placeholder="Enter name">
			</div>
			<div class="form-group">
				<label for="Surname1">Surname</label>
				<input type="text" class="form-control" id="InputSurname1" name="InSurname1" placeholder="Smith">
			</div>
			<div class="form-group">
				<label for="InputAdress1">Adress Line:</label>
				<input type="text" class="form-control" id="InputAdress2" name="InAdress2" placeholder="Flat/House number">
			</div>
			<div class="form-group">
				<label for="Street1">Street Line:</label>
				<input type="text" class="form-control" id="InputStreet2" name="InStreet2" placeholder="Street adress">
			</div>
			<div class="form-group">
				<label for="City1">City:</label>
				<input type="text" class="form-control" id="InputCity" name="InCity" placeholder="City name">
			</div>
			<div class="form-group">
				<label for="pwd1">Password:</label>
				<input type="password" class="form-control" id="pwd11" name="Inpwd11">
			</div>
			<div class="form-group">
				<label for="pwd2">Confirm password:</label>
				<input type="password" class="form-control" id="pwd22">
			</div> 
			<div class="form-group">
				<label for="email">Email address:</label>
				<input type="email" class="form-control" id="InputEmail" name="Inemail" placeholder="example@gmail.com">
			</div>
			<div class="input-group">
				<div class="center"><button onclick="register()" class="item_add btn btn-primary col-md-12">Submit</button></div>
			</div>
				<p style="font-size: 11px;">Already registered? <a class="link" href="login.php">Log in</a> now!</p>
				
			
          </div>      
      </div> 

<script>
function register(){
	//Create request object 
	var request = new XMLHttpRequest();

	//Create event handler that specifies what should happen when server responds
	request.onload = function(){
		//Check HTTP status code
		if(request.status === 200){
			//Get data from server
			var responseData = request.responseText;

			//Add data to page
			var x = responseData;
			alert(x);
		}
		else
			alert("Error communicating with server: " + request.status);
	};

	//Set up request with HTTP method and URL 
	request.open("POST", "reg_db.php");
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	//Extract registration data
	var name = document.getElementById("InputName1").value;
	var surname = document.getElementById("InputSurname1").value;
	var flat_no = document.getElementById("InputAdress2").value;
	var street = document.getElementById("InputStreet2").value;
	var password = document.getElementById("InputCity").value;
	var city = document.getElementById("pwd11").value;
	var email = document.getElementById("InputEmail").value;
	
	
	//Send request
	request.send("_name=" + name + "&_surname=" + surname + "&_flat_no=" + flat_no + "&_street=" + street + "&_password=" + password + "&_city=" + city + "&_email=" + email);
}
</script>
	  
<!------------------------------------------------------------------------------------------------------------------------>		  
<?php
	outputFooter();
?>