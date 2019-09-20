<?php

    require "header.php";
    
?>

    


<div  class="col-lg-8 col-lg-offset-2" id="container_profil">
<div class="row">
    <?php
  $list_of_galerie = getGalerie();
    
    foreach($list_of_galerie as $galerie){
       echo' <a href="'.$galerie["image"].'" rel="mybox"><img src="'.$galerie["image"].'" width="20%" class="img-thumbnail" alt="image"></a>';

    }

    ?> 
</div>
    
<div class="row">
    <br>
    <div class="form-group">
            <form method="POST" action="galerie_up.php" enctype="multipart/form-data">
                <label for="exampleInputFile">Ajouter une photo à la Galerie:</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                <input type="file" id="exampleInputFile" name="img_gal">
                <button type="submit" class="btn btn-default">Envoyer</button>
            </form>
        </div>
    
</div>






    
<?php

    require "footer.php";
    
?>
</div>
