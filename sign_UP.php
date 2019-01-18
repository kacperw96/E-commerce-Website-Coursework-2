<?php
$mongoClient = new MongoClient();

$db = $mongoClient -> users_db;

$collection = $db -> reg_users;

$name = filter_input(INPUT_POST, 'InName1', FILTER_SANITIZE_STRING);
$surname = filter_input(INPUT_POST, 'InSurname1', FILTER_SANITIZE_STRING);
$flat_no = filter_input(INPUT_POST, 'InAdress2', FILTER_SANITIZE_STRING);
$street = filter_input(INPUT_POST, 'InStreet2', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'InCity', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'Inpwd11', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'Inemail', FILTER_SANITIZE_STRING);	  

echo $name, $surname, $flat_no, $street, $password, $city, $email;

$newUser = [
	"Name" => $name,
	"Surname" => $surname,
	"Flat_no" => $flat_no,
	"Street" => $street,
	"City" => $city,
	"Password" => $password,
	"Email" => $email
];
	
	
echo $newUser;

$checkValue = $collection -> insert($newUser);

if($checkValue['ok']==1){ echo 'ok'; }
	else { echo 'not ok'; }


$mongoClient -> close();
?>