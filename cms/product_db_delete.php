<?php
	$product = filter_input(INPUT_POST, '_product', FILTER_SANITIZE_STRING);

    if($product != ""){//Check query parameters 
    $mongoClient = new MongoClient();
	$db = $mongoClient -> PhoneWord;
	$collection = $db -> Products;

	$checkValue = $collection -> remove(array('_id' => $product));
	$mongoClient -> close();
	
        //Output message confirming registration
        echo 'Product deleted!';
    }
    else{//A query string parameter cannot be found
        echo 'Product have not been found';
    }
?>	