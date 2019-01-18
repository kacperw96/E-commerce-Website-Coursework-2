<?php


	$product = filter_input(INPUT_POST, '_product', FILTER_SANITIZE_STRING);
	$qty = filter_input(INPUT_POST, '_units', FILTER_SANITIZE_STRING);
	$price = filter_input(INPUT_POST, '_price', FILTER_SANITIZE_STRING);
	$path = filter_input(INPUT_POST, '_path', FILTER_SANITIZE_STRING);
	
	
    if($product != "" && $qty != "" && $price != "" && $path != ""){//Check query parameters 
        //STORE REGISTRATION DATA IN MONGODB
    $mongoClient = new MongoClient();

	$db = $mongoClient -> PhoneWord;

	$collection = $db -> Products;

	$newProduct = [
		"_id" => $product,
		"Number of stock" => $qty,
		"Price" => $price,
		"Image" => $path,
	];

	$checkValue = $collection -> insert($newProduct);
	$mongoClient -> close();
	
        //Output message confirming registration
        echo 'Product added!';
    }
    else{//A query string parameter cannot be found
        echo 'Please enter all details!';
    }
?>	