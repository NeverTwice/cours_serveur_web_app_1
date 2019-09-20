<?php

	require "functions.php";

	$titre = trim($_POST["titre"]);
	$contenu = trim($_POST["contenu"]);
	
	if( strlen($titre)>=2 && strlen($titre)<=15 && strlen($contenu)>=4)
	{

			insertArticle($titre, $contenu);
			header('Location: page1.php?msg=publish_success'); 
			exit();
    }

	else{
			header('Location: page1.php?msg=error_publish');
			exit();
	}



?>