<?php 
    require "header.php";

//Je dois vérifier que l'utilisateur est connecté
	if(!isConnected())
	{
		//S'il n'est pas connecté je le redirige vers la page d'accueil
		die();
	}

    if( isset($_GET["id"]) &&  isset($_GET["action"]))
			{
				//Si l'action est égale à delete
				if($_GET["action"] == "delete")
				{
					//Je lance la suppression
					deleteArticle($_GET["id"]);
                    header('Location:page1.php?msg=delete_success');
                    exit();
				}

            }


?>

