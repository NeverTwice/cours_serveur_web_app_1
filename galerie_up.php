<?php
require "functions.php";

if(!isConnected){
    die();
}
else if ($_SESSION['role'] != 1)
{
    die();
}
else{


if (isset($_FILES['img_gal']))
                {
                    if(!empty($_FILES['img_gal']['name']))
					{
						
						//création d'un nouveau nom de fichier pour eviter d'écraser une image
						$new_name = uniqid(rand(), true);
						
						//J'appel la fonction uploadImage je lui donne le fichier uploadé $_FILES['avatar']
						//et je lui donne aussi le nouveau nom, cette fonction me retourne un message
						$upload_image_msg = uploadImageGal($_FILES['img_gal'], $new_name);
						if($upload_image_msg != "OK")
						{
							$msg_error .= "<li>".$upload_image_msg;
                            header("Location:galerie.php?msg=".$msg_error."");
                            exit();
						}
                        
                        header("Location:galerie.php");
                        exit();
					} 
    
                
                    
                }
}

?>


<?php
require "footer.php";
?>
