<?php
	$OldEmail = filter_input(INPUT_POST, 'OldEm', FILTER_SANITIZE_STRING);

	$NewName = filter_input(INPUT_POST, 'NewNa', FILTER_SANITIZE_STRING);
	$NewSurname = filter_input(INPUT_POST, 'NewSur', FILTER_SANITIZE_STRING);
	$NewFlat = filter_input(INPUT_POST, 'NewFl', FILTER_SANITIZE_STRING);
	$NewStreet = filter_input(INPUT_POST, 'NewSt', FILTER_SANITIZE_STRING);	
	$NewCity = filter_input(INPUT_POST, 'NewCi', FILTER_SANITIZE_STRING);
	$NewEmail = filter_input(INPUT_POST, 'NewEm', FILTER_SANITIZE_STRING);		
	$NewPassword = filter_input(INPUT_POST, 'NewPw', FILTER_SANITIZE_STRING);	
	
	if($NewName != "" && $NewSurname != "" && $NewFlat != "" && $NewStreet != "" && $NewCity != "" && $NewEmail != ""){
		$mongoClient = new MongoClient();
		$db = $mongoClient -> PhoneWord;
		$collection = $db -> Users;
		
		if($NewEmail != $OldEmail){
			
			$deleteProduct = [ '_id' => $OldEmail ];
			$checkValue = $collection -> remove($deleteProduct);
			
			$insertProduct = [
				'_id' => $NewEmail,
				'Name' => $NewName,
				'Surname' => $NewSurname,
				'Flat_no' => $NewFlat,
				'Street' => $NewStreet,
				'City' => $NewCity,
				'Password' => $NewPassword,
				'Email' => $NewEmail
			];
			
			$checkValue = $collection -> insert($insertProduct);
			$mongoClient -> close();
		}else{	
			$updateProduct = [
				'Name' => $NewName,
				'Surname' => $NewSurname,
				'Flat_no' => $NewFlat,
				'Street' => $NewStreet,
				'City' => $NewCity,
				'Password' => $NewPassword
			];

			$checkValue = $collection -> update(array('_id' => $OldEmail),  array('$set' => $updateProduct ));
			$mongoClient -> close();	
			}
		echo 'Customer details has been changed.';
	}else{
		echo 'Do not leave empty fields!';
	}
?>	