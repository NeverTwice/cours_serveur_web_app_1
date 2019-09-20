<?php

require "header.php";
    
    //Je dois vérifier que l'utilisateur est connecté
	if(!isConnected())
	{
		//S'il n'est pas connecté je le redirige vers la page d'accueil
		die();
	}
?>

<?php


$user_id = $_GET['id'];
$user = getUser($user_id);

?>
    <div  class="col-lg-8 col-lg-offset-2" id="container_profil">
        <div class="row">
            <div class="col-lg-3">
            
                <img src="<?php $image=selectImage($user_id); print_r($image[0]); ?>" width="200px" height="200px" alt="..." class="img-rounded">
            </div>
            <div class="col-lg-9">
            <h2> <?php echo $user["nom"];?> </h2>
            </div>
        </div>
        <br>
        
        <?php

            if(isConnected() && $_GET["id"] == $_SESSION['id'])
            {
            
                echo '
        <div class="form-group">
            <form method="POST" action="photo_up.php?id='.$_SESSION["id"].'" enctype="multipart/form-data">
                <label for="exampleInputFile">Changer photo de profil:</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                <input type="file" id="exampleInputFile" name="avatar">
                <button type="submit" class="btn btn-default">Envoyer</button>
            </form>
        </div>
            ';
            
            }
            
        ?>

        
      
        
         <div class="col-lg-2">
         
        <h4> Mes Informations: </h4>
        <div class="divider1">
            <p><b>Nom:</b>   <?php echo $user["nom"]; ?></p>
            <p><b>Prenom:</b>   <?php echo $user["prenom"]; ?></p>
        </div>
        </div> 
       
        
        
        <?php 

        
        if (isConnected() && $_SESSION['id']  == $_GET['id'])
            {
            echo '<div class=col-lg-8 col-lg-offset-1" id="user_info">   
            <form method="POST" action="status_insert.php?id='.$_SESSION["id"].'" enctype="multipart/form-data">
            <div class="col-lg-8 col-md-8">
            
            <label> Ecris sur ton mur</label><br>
            <textarea name="textarea" rows="4" cols="50" placeholder="Quoi de neuf aujourdhui?"></textarea>
            </div>
            
            <div class="col-lg-offset-2 col-lg-2 ">
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                <input type="file" id="exampleInputFile" name="image">
                
               <button class="btn btn-default" id="button_post" type="submit">
                Poster
                </button> 
            </div>
            </form>
            
    </div>
    
    ';
            }
else    {
    
 echo "
    <div class='row'>
        
    </div>
 
 
 ";   
}

            ?>
        
        

        
        
        
        <div class="col-lg-8 col-lg-offset-2" id="user_info">
        
        <?php



            $status = getStatus($_GET['id']);
        

            foreach ($status as $statu) {
      		echo "<div class='row'>
                    <div class='col-lg-8 col-lg-offset-2' id='status'>
                    
                        <div class='col-lg-12' id='date_status'>
                            ".$statu["date_creation"]."
                        </div>    
                        <div class='col-lg-12'>    
                            ".$statu["contenu"]."
                         </div>
                         <div class='col-lg-12'> 
                            <br>
                            ";
                if (!empty($statu["image"]))
                    {echo"
                            <img src='".$statu["image"]."' alt='img_statut'>
                             ";}
                        echo'   <br>
                         </div>
                        
                   </div> ';
                    
                if($_SESSION['id']  == $_GET['id'])
                        {
                    echo"    
                    <a class='btn btn-danger' id='delete_status' href='delete_status.php?id=".$statu["status_id"]."'>Supprimer</a></td>
                  </div>
                  
                  ";
                        }
                }
    




   
        

        ?>

            </div>
        
        
<?php

require "footer.php";

?>








