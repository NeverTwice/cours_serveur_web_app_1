<?php
    require "header.php";
?>


<div  class="col-lg-8 col-lg-offset-2" id="container_profil">


<?php
    

    if (isset($_GET['id'])) { 
                $min = $_GET['id']; 
    }
    else $min = 0;

     
    

    //Récupération des tous les utilisateurs en SQL
    $list_of_articles = get7Articles($min);
    //Boucle pour afficher chaque utilisateurs
    $compteur=0;
    
    foreach ($list_of_articles as $article) {
        
        
        if($compteur%2==0)
        {
        echo "
            
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 '>
                    <blockquote>
                        <div class='col-lg-2 col-md-2 col-sm-4 col-xs-4''>    
                            <img src='".$article["image"]."' width='100%'>
                        </div>
                        <div class='col-lg-2 col-md-2 col-sm-12 col-xs-12'>
                             <a class='links_even' href='even.php?id=".$article['id_evenement']."'>".$article["titre"]."</a>
                        </div>
                        <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
                            ".$article["resume"]."
                        </div>

                        <div class='col-lg-2 col-md-2 col-sm-12 col-xs-12'>
                            ".$article["date"]."
                        </div>
                    </blockquote>
                </div>
            ";
            $compteur++;
    }
        
        else
        {
          echo "            
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <blockquote class='blockquote-reverse'>
                
                <div class='col-lg-2 col-md-2 col-sm-12 col-xs-12'>
                ".$article["date"]."
                </div>
                
                <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
                ".$article["resume"]."
                </div>
                
                <div class='col-lg-2 col-md-2 col-sm-12 col-xs-12'>
                <a class='links_even' href='even.php?id=".$article['id_evenement']."'>".$article["titre"]."</a>
                </div>
                
                
                
                <div class='col-lg-2 col-md-2 col-sm-4 col-xs-4'>    
                <img src='".$article["image"]."'width='100%'>
                </div>
                
                </blockquote>
                </div>
            <br>";
            $compteur++;    
        }
        
        
    }
?>
    
    

    

<div class="row">
    <div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
        
        <?php
            // Boutons pour changer la page des évènements
        if($min>=7)
        {
        /*Bouton Precedent*/
            if (isset($_GET['id'])) { 
                $min = $_GET['id']; 
                $page_precedente = $min  - 7; 
                echo '<a href="evenements.php?id='.$page_precedente.'" class="btn btn-default">Précédent</a>'; 
            } 
            else $min = 0;
        }
        /*Bouton Suivant*/ 
        if($compteur==7)
        {
            if (isset($_GET['id'])) { 
                $min = $_GET['id']; 
                $page_suivant = $min  + 7; 
                echo '<a href="evenements.php?id='.$page_suivant.'" class="btn btn-default">Suivant</a>'; 
            } 
            else $min = 0;

        }
        ?>
        
    </div>
</div>


<?php
    require "footer.php";
?>

</div>






