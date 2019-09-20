<?php

	require "functions.php";

	//me deconnecter
	disconnectUser();

	//rediriger vers la page d'accueil
	header('Location: page1.php');
	exit();


?>