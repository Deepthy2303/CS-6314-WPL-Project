<?php
// list_products.php
require_once "bootstrap.php";
/*
$name = $argv[1];
$pass = $argv[2];
$email = $argv[3];
$address = $argv[4];

	$user = new User();
	$user->setName($name);
	$user->setPassword($pass);
	$user->setEmail($email);
	$user->setAddress($address);
	
	//echo $user->getName()." ".$user->getPassword();
	$entityManager->persist($user);
	$entityManager->flush();		
	echo "Created user with ID " . $user->getId() . "\n";
*/
	
$user_rep = $entityManager->getRepository('Books');
$users = $user_rep->findAll();
$i = 0;

foreach ($users as $user) {
	//$j = 0;
    //echo (array) $user;
	print_r ($user);
	//$result[$i][$j++] = $user->getTitle();
	//$result[$i][$j++] = $user->getAuthor();
	//sprintf("%s-%s\n", $user->getTitle(), $user->getAuthor());
	//$i++;
}

print_r ($users);
