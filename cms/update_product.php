<?php
	$NewPr = filter_input(INPUT_POST, 'NewProduct', FILTER_SANITIZE_STRING);
	$NewUn = filter_input(INPUT_POST, 'NewUnits', FILTER_SANITIZE_STRING);
	$NewPri = filter_input(INPUT_POST, 'NewPrice', FILTER_SANITIZE_STRING);
	$NewPa = filter_input(INPUT_POST, 'NewPath', FILTER_SANITIZE_STRING);	
		
	if($NewPr != "" && $NewUn != "" && $NewPri != "" && $NewPa != "" ){
		$mongoClient = new MongoClient();
		$db = $mongoClient -> PhoneWord;
		$collection = $db -> Products;

		$updateProduct = [
			"_id" => $NewPr,
			"Number of stock" => $NewUn,
			"Price" => $NewPri,
			"Image" => $NewPa,
		];

		$checkValue = $collection -> save($updateProduct);
		$mongoClient -> close();	
		echo 'Updated!';
	}else{ echo 'Something went wrong'; }
?>	