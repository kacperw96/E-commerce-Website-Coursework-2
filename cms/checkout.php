<?php

	$str_json = file_get_contents('php://input');
	$json_decoded = json_decode($str_json, true);
		
	$length =	count($json_decoded);
	$products='';
	$products_arr = [];
	$quantity_arr = [];
	
	
	
	for ($i = 0; $i < $length; $i++) {
		$products_arr[$i] = $json_decoded[$i]['Product'];
		$quantity_arr[$i] = $json_decoded[$i]['Quantity'];
		
		if($i < $length-1)
			$products =$products . $json_decoded[$i]['Quantity'] . 'x ' . $json_decoded[$i]['Product'] . " \n \t";	
			else 
				$products =$products . $json_decoded[$i]['Quantity'] . 'x ' . $json_decoded[$i]['Product'];
	}
	
	//echo 'Total is: ' + $json_decoded[0]['Total'];

	$mongoClient = new MongoClient();

	$db = $mongoClient -> PhoneWord;

	$collection = $db -> Orders;
	
	$newOrder= [
		"Customer" => $json_decoded[0]['User'],
		"Ordered products information" => $products,
		"Total price" => $json_decoded[0]['Total'],
		"Products array" => $products_arr,
		"Quantity array" => $quantity_arr
	];
	
	$checkValue = $collection -> insert($newOrder);
	$mongoClient -> close();
	
	$finalMessage = " Order number: " . $newOrder['_id'] ."\n\n Customer: " . $json_decoded[0]['User'] . "\n Products: \n \t" . $products . "\n\n Total order amount: " . $json_decoded[0]['Total'] . " £";
	
	echo $finalMessage;

	
	
?>	