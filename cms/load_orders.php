<?php
	$condition = filter_input(INPUT_POST, '_condition', FILTER_SANITIZE_STRING);

	$mongoClient = new MongoClient();
	$db = $mongoClient -> PhoneWord;
	$collection = $db -> Orders;	
		
	if($condition != null){		
		$checkValue = $collection -> find(array('Customer' => $condition));
		$numResult = $checkValue ->count();
		$i = 0;
		
		echo '[';
		foreach($checkValue as $orders){
			echo json_encode($orders);
			$i++;
			
			if($i != $numResult){				
				echo ',';
			}
			
		}
	echo ']';
	} else {	
		$checkValue = $collection -> find();
		$numResult = $checkValue ->count();
		$i = 0;
		
		echo '[';
		
		foreach($checkValue as $orders){
			echo json_encode($orders);
			$i++;
			
			if($i != $numResult){				
				echo ',';
			}
			
		}
		echo ']';
	}
	$mongoClient -> close();	
?>	