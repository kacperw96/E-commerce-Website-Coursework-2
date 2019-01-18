<?php
	include ('common.php');
	outputHeader("Login");
	outputBannerNavigation("Login");
?>
<!------------------------------------------------------------------------------------------------------------------------>		  
	  
      <div class="container">
          <div class="loginBox center">
              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd">
              </div>
              <div class="input-group">
                <div class="center"><button  onclick="login()" class="item_add btn btn-primary col-md-12">Login</button></div>
               </div>
			   <p style="color:red;" id="WRONG"></p>
               <p style="font-size: 11px;">Not registered? <a class="link" href="register.php">Sign up</a> now! </p>
          </div>      
      </div>    

<!------------------------------------------------------------------------------------------------------------------------>	

<script>
function login(){
	
	var _request = new XMLHttpRequest();
	_request.onload = function(){

		if(_request.status === 200){

			var responseData = _request.responseText;
			if(responseData == 1){
				document.getElementById("WRONG").innerHTML = "";
				var user = document.getElementById("email").value;
				localStorage.setItem("Logged", user);
				window.location.replace("shop.php");
			}else{
				document.getElementById("WRONG").innerHTML = "User doesn't exist!";
			}
		}
		else
			alert("Error communicating with server: " + _request.status);
	};

	_request.open("POST", "cms/check_admin.php");
	_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	
	var id = document.getElementById("email").value;
	var pass = document.getElementById("pwd").value;
	
	_request.send("__id=" + id + "&__pw=" + pass );
	
}
</script>
<?php
	outputFooter();
?>

