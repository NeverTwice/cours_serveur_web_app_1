<?php

    require "functions.php";
?>

<?php



if (isset($_FILES['image']))
                {
                    if(!empty($_FILES['image']['name']))
					{
						
						//création d'un nouveau nom de fichier pour eviter d'écraser une image
						$new_name = uniqid(rand(), true);
						
						//J'appel la fonction uploadImage je lui donne le fichier uploadé $_FILES['image']
						//et je lui donne aussi le nouveau nom, cette fonction me retourne un message
						$upload_image_msg = insertImage($_FILES['image'], $new_name);
						if($upload_image_msg != "OK")
						{
							$msg_error .= "<li>".$upload_image_msg;
                            echo $msg_error;
						} 
                        $image = "upload/".$new_name.".jpg";
					}   
                }

if (isset($_FILES['baniere']))
                {
                    if(!empty($_FILES['baniere']['name']))
					{
						
						//création d'un nouveau nom de fichier pour eviter d'écraser une image
						$new_name1 = uniqid(rand(), true);
						
						//J'appel la fonction uploadImage je lui donne le fichier uploadé $_FILES['baniere']
						//et je lui donne aussi le nouveau nom, cette fonction me retourne un message
						$upload_image_msg1 = insertImage($_FILES['baniere'], $new_name1);
						if($upload_image_msg1 != "OK")
						{
							$msg_error1 .= "<li>".$upload_image_msg1;
                            echo $msg_error1;
						}   
                        $baniere = "upload/".$new_name1.".jpg";
					}   
                }

if (isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['date']) && isset($_POST['resume']))
{
    $date = trim($_POST['date']);
    
    if(preg_match("#^2[0-1]{1}[1-6]{1}[0-9]{1}\-[0-1]{1}[1-9]{1}\-[1-3]{1}[0-9]{1}#", "".$date.""))
    {
        
$titre = trim($_POST['titre']);
$contenu = $_POST['contenu'];
$video = $_POST['video'];
$resume = $_POST['resume'];    
insertArticle($titre, $resume, $contenu,$date, $image,$baniere, $video);
        
header("location:evenements.php?msg=upload_sucess&id=0");
exit();
    }
    else {
    header("location:evenements.php?id=0&msg=date_incorect");
    exit();
}
}
else 
{
 header("location:evenements.php?id=0&msg=champs_non_complets");
exit();
}
?>