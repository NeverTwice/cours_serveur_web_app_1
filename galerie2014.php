<?php

    require "header.php";
    
?>

    


<div  class="col-lg-8 col-lg-offset-2" id="container_profil">
<section class="row">
    <?php
  $list_of_galerie = getGalerie2014();
    
    foreach($list_of_galerie as $galerie){
       echo' <a href="'.$galerie["image"].'" rel="mybox"><img src="'.$galerie["image"].'" width="20%" class="img-thumbnail" alt="image"></a>';

    }

    ?>
        
        
        
        
        
</section>




    
<?php

    require "footer.php";
    
?>
</div>
