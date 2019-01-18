<script>
<?php
		$mongoClient = new MongoClient();
		$db = $mongoClient -> PhoneWord;
		$collection = $db -> Products;		
		
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
		$mongoClient -> close();	
?>	
</script>
		  