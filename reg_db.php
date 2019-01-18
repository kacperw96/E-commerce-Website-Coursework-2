<?php


	$name = filter_input(INPUT_POST, '_name', FILTER_SANITIZE_STRING);
	$surname = filter_input(INPUT_POST, '_surname', FILTER_SANITIZE_STRING);
	$flat_no = filter_input(INPUT_POST, '_flat_no', FILTER_SANITIZE_STRING);
	$street = filter_input(INPUT_POST, '_street', FILTER_SANITIZE_STRING);
	$city = filter_input(INPUT_POST, '_city', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, '_password', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, '_email', FILTER_SANITIZE_STRING);	
	
	
    if($name != "" && $surname != "" && $flat_no != "" && $street != "" && $city != "" && $password != "" && $email != ""){//Check query parameters 

            $mongoClient = new MongoClient();

            $db = $mongoClient -> PhoneWord;

            $collection = $db -> Users;

            $newUser = [
                "_id" => $email,
                "Name" => $name,
                "Surname" => $surname,
                "Flat_no" => $flat_no,
                "Street" => $street,
                "City" => $city,
                "Password" => $password,
                "Email" => $email
            ];

            $checkValue = $collection -> insert($newUser);
            $mongoClient -> close();

    echo 'Welcome ' . $name . ', your account has been created';
    }else{
        echo 'Please enter all details!';
    }
?>	