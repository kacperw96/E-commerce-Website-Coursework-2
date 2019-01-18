<?php
	$id = filter_input(INPUT_POST, '__id', FILTER_SANITIZE_STRING);
	$pw = filter_input(INPUT_POST, '__pw', FILTER_SANITIZE_STRING);

    if($id != "" && $pw != ""){		
		$mongoClient = new MongoClient();
		$db = $mongoClient -> PhoneWord;
		$collection = $db -> Users;
		
		$searchProduct = ["_id" => $id];

		$checkValue = $collection -> find($searchProduct);
		$mongoClient -> close();

		foreach ($checkValue as $prod){
			$nick = $prod['_id'];
			$pass = $prod['Password'];
		}
	
		if($nick == $id && $pass == $pw) echo 1;
			else echo 0;
	} else
        echo 'Enter ADMIN details';	
?>	