<?php
    require "functions.php";

    $content = $_POST["textarea"];
    insertStatus($_SESSION['id'],$content);

    $user_id = $_GET['id'];


    if (isset($_FILES['image']))
                {
                    if(!empty($_FILES['image']['name']))
					{
						
						//création d'un nouveau nom de fichier pour eviter d'écraser une image
						$new_name = uniqid(rand(), true);
						
						//J'appel la fonction uploadImage je lui donne le fichier uploadé $_FILES['avatar']
						//et je lui donne aussi le nouveau nom, cette fonction me retourne un message
						$upload_image = ImageStatus($_FILES['image'], $new_name);
						insertImageStatus($upload_image,$_SESSION['id']);                        
                        header("Location:profil.php?id=".$_SESSION['id']."&pseudo=".$_SESSION['pseudo']."");
                        exit();
					} 
    
                
                    
                }
    
    header("Location:profil.php?id=".$_SESSION['id']."&pseudo=".$_SESSION['pseudo']."");
    exit();
    
?>