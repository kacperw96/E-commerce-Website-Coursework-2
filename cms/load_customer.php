<?php
	$id = filter_input(INPUT_POST, '__id', FILTER_SANITIZE_STRING);
	
    if($id != "" ){		
		$mongoClient = new MongoClient();
		$db = $mongoClient -> PhoneWord;
		$collection = $db -> Users;

		$searchProduct = ["_id" => $id];

		$checkValue = $collection -> find($searchProduct);
		$mongoClient -> close();
	
		$arr = array();

		foreach ($checkValue as $prod){
			$arr[0] = $prod['Name'];
			$arr[1] = $prod['Surname'];
			$arr[2] = $prod['Flat_no'];
			$arr[3] = $prod['Street'];
			$arr[4] = $prod['City'];
			$arr[5] = $prod['Email'];
			$arr[6] = $prod['Password'];
		}
	echo json_encode($arr);
	}else{
		$arr = array();
		$arr[0] = ["0"];
        echo json_encode($arr);
    }	
?>	