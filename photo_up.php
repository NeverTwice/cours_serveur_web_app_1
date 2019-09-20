<?php

require "functions.php";


$user_id = $_GET['id'];


if (isset($_FILES['avatar']))
                {
                    if(!empty($_FILES['avatar']['name']))
					{
						
						//création d'un nouveau nom de fichier pour eviter d'écraser une image
						$new_name = uniqid(rand(), true);
						
						//J'appel la fonction uploadImage je lui donne le fichier uploadé $_FILES['avatar']
						//et je lui donne aussi le nouveau nom, cette fonction me retourne un message
						$upload_image_msg = uploadImage($_FILES['avatar'], $new_name);
						if($upload_image_msg != "OK")
						{
							$msg_error .= "<li>".$upload_image_msg;
                            header("Location:profil.php?id=".$_SESSION['id']."&pseudo=".$_SESSION['pseudo']."&msg=".$msg_error."");
                            exit();
						}
                        
                        header("Location:profil.php?id=".$_SESSION['id']."&pseudo=".$_SESSION['pseudo']."");
                        exit();
					} 
    
                
                    
                }

?>


<?php
require "footer.php";
?>
