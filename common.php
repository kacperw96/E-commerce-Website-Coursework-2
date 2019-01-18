<?php
function outputHeader($page_title){
echo<<<END
	<!doctype html>
	<html lang="en">
	  <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="..\style.css">
		
		<title>$page_title</title>
	  </head>
	  <body>
		  <div class="menu">
END;
}

function outputBannerNavigation($pageName){
    
    //Array of pages to link to
    $linkNames = array("Home", "Shop", "Contact", "My Account");
    $linkAddresses = array("index.php", "shop.php", "contact.php","account.php");
    
    //Output navigation
	echo '<ul>';
    for($x = 0; $x < count($linkNames); $x++){
        echo '<li><a href="'.$linkAddresses[$x].'" ';
			if($linkNames[$x] == $pageName) echo 'class= "active">'.$linkNames[$x].'</a></li>';
				else echo '>'.$linkNames[$x].'</a></li>';
	}//close for
	
	if("Login" == $pageName) echo '<li class="menuLogin active" style="float:right; background: linear-gradient(to left, #628e01 , #333);"><a href="login.php">Login</a></li>';
		else echo '<li class="menuLogin" style="float:right;"><a href="login.php">Login</a></li>';
	echo '</ul>';
    echo '</div>';
}

//footer with closing tags for the whole HTML code 
function outputFooter(){
echo<<<END
		<div class="footer">
			<a href="index.php">Home</a>
			<a href="shop.php">Shop</a>
			<a href="contact.php">Contact</a>
			<a href="account.php">My Account</a>
			<a href="login.php">Login</a>
			<a href="cms/cms.php">CMS</a>
		</div>
	  </body>
	</html>
END;
}

function outputFooterCMS(){
echo<<<END
		<div class="footer">
			<a href="..\index.php">Home</a>
			<a href="..\shop.php">Shop</a>
			<a href="..\contact.php">Contact</a>
			<a href="..\login.php">Login</a>
			<a href="cms.php">CMS</a>
		</div>
	  </body>
	</html>
END;
}
?>