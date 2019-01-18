<?php
	$product = filter_input(INPUT_POST, '_product', FILTER_SANITIZE_STRING);

    if($product != "" ){
	$mongoClient = new MongoClient();
	$db = $mongoClient -> PhoneWord;
	$collection = $db -> Products;

	$searchProduct = ["_id" => $product];

	$checkValue = $collection -> find($searchProduct);
	$mongoClient -> close();
	
	$arr = array();

		foreach ($checkValue as $prod){
			$arr[0] = $prod['_id'];
			$arr[1] = $prod['Number of stock'];
			$arr[2] = $prod['Price'];
			$arr[3] = $prod['Image'];
		}
		echo json_encode($arr);
	}else{
		$arr = array();
		$arr[0] = ["0"];
        echo json_encode($arr);
    }
?>	