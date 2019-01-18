<?php

	$condition = filter_input(INPUT_POST, '_condition', FILTER_SANITIZE_STRING);
	
	$mongoClient = new MongoClient();
	$db = $mongoClient -> PhoneWord;
	$collection = $db -> Products;			
		
	if(	$condition == 1){	
	
		$checkValue = $collection -> find() -> sort(array('Price' => 1));
		$numResult = $checkValue ->count();
		$i = 0;
		
		echo '[';
		
		foreach($checkValue as $product){
			echo json_encode($product);
			$i++;
			
			if($i != $numResult){				
				echo ',';
			}
		}
		echo ']';
	}

	if(	$condition == 0){
		
		$checkValue = $collection -> find();
		$numResult = $checkValue ->count();
		$i = 0;
		
		echo '[';
		
		foreach($checkValue as $product){
			echo json_encode($product);
			$i++;
			
			if($i != $numResult){				
				echo ',';
			}
		}
		echo ']';
	}	
	
	if(	$condition == -1){

		$checkValue = $collection -> find() -> sort(array('Price' => -1));
		$numResult = $checkValue ->count();
		$i = 0;
		
		echo '[';
		foreach($checkValue as $product){
			echo json_encode($product);
			$i++;
			
			if($i != $numResult){				
				echo ',';
			}
		}
		echo ']';
	}
	
	if(	$condition == 2){

		$checkValue = $collection -> find() -> sort(array('_id' => 1));
		$numResult = $checkValue ->count();
		$i = 0;
		
		echo '[';
		foreach($checkValue as $product){
			echo json_encode($product);
			$i++;
			
			if($i != $numResult){				
				echo ',';
			}
		}
		echo ']';
	}
	
	if(	$condition == -2){

		$checkValue = $collection -> find() -> sort(array('_id' => -1));
		$numResult = $checkValue ->count();
		$i = 0;
		
		echo '[';
		foreach($checkValue as $product){
			echo json_encode($product);
			$i++;
			
			if($i != $numResult){				
				echo ',';
			}
		}
		echo ']';
	}
	
	$mongoClient -> close();	
?>	