<?php

	require "functions.php";

	$name = trim($_POST["name"]);
    $pseudo = trim($_POST["pseudo"]);
	$surname = trim($_POST["surname"]);
	$email = trim($_POST["email"]);
	$pwd = $_POST["pwd"];
	$pwd2 = $_POST["pwd2"];
	
	if( strlen($pseudo)>=2 && strlen($name)>=2 && strlen($surname)>=2 && filter_var($email, FILTER_VALIDATE_EMAIL)
	&& $pwd==$pwd2 && strlen($pwd)>=4 && strlen($pwd)<=10 )
	{
		//si l'utilisateur existe déjà nok
		if(emailExist($email))
		{
			header('Location: page1.php?msg=email_already_exist');
			exit();
		}
        else if(pseudoExist($pseudo))
        {
        header('Location: page1.php?msg=pseudo_already_exist');
			exit();    
        }
		//sinon on insert
		else
		{
			insertUser($pseudo,$name, $surname, $email, $pwd);
			header('Location: page1.php?msg=subscribe_success'); 
			exit();
		}

	}else{
			header('Location: page1.php?msg=error_form');
			exit();
	}



?>