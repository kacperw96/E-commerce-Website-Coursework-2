<?php
	include ('common.php');
	outputHeader("Welcom at Phone Word!");
	outputBannerNavigation("Home");
?>

<!------------------------------------------------------------------------------------------------------------------------>	  
	  
<a href="shop.php" ><div class="container">
	<div class="advert">
		<img class="mySlides w3-animate-fading advert" src="img/ad1.jpg" >
		<img class="mySlides w3-animate-fading advert" src="img/ad3.jpg" >
		<img class="mySlides w3-animate-fading advert" src="img/ad2.jpg" >
	</div>
</div></a>  

<!------------------------------------------------------------------------------------------------------------------------>	  
      
<script>
	var myIndex = 0;
	carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
	
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
	
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 9000);    
}
</script>

<?php
	outputFooter();
?>