<?php 
    require 'header.php'
?>

      
<!-- Caroussel -->
<div class="row-fluid">
	<div class="span9">    
<div id="carousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="media/image.jpg" alt="Image Carroussel" class="img-responsive">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="media/image1.jpg" alt="Image Carroussel" class="img-responsive">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="media/image2.jpg" alt="Image Carroussel" class="img-responsive">
      <div class="carousel-caption">
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel"  data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#carousel"  data-slide="next">
    <span class="icon-next"></span>
  </a>
</div>
    </div>
    </div>
    



<!-- Main Container -->
<div id="container">
    <div class="row">
        <div class="col-lg-6">
                <div class="row" id="row1">
                        <div class="col-lg-12">
                            <div class="thumbnail">
                              <div class="caption">
                                  <?php
                                    $list_of_news=get4News();
                                foreach($list_of_news as $new)
                                {
                                echo'<h3>'.$new["titre"].'</h3>
                                <p>'.$new["contenu"].'</p>';
                                }
                                ?>
                               </div>
                            </div>
                        </div>  
                 </div>
            <button onclick="getLocation()" class="btn btn-default"> Localisation </button>
            <div id="mapholder"></div>
            </div>
        
        
        
<!-- Début articles --> 
        
        <div class="col-lg-6">
        <?php 
        //Récupération des articles (évènements) les 4 derniers
      	$list_of_articles = getLastArticles();
        //Boucle pour afficher chaque utilisateurs
                        echo '<div class="row" id="row1">';
                            echo '
                                <div class="col-lg-6">
                                    <div id="top">
                                        <div class="thumbnail">
                                          <div class="caption">
                                            <h3 class="titre">'.$list_of_articles[0]["titre"].'</h3>
                                            <img src="'.$list_of_articles[0]["image"].'" id="article1" alt="Photo Evènement">
                                            <p>'.$list_of_articles[0]["resume"].'</p>                                   
                                            <p><a href="even.php?id='.$list_of_articles[0]['id_evenement'].'" class="btn btn-default" role="button">Voir Plus</a></p>    
                                          </div>
                                        </div>
                                    </div>    
                                  </div>'; 
                        echo '
                                <div class="col-lg-6">
                                    <div id="top">
                                        <div class="thumbnail">
                                          <div class="caption">
                                            <h3 class="titre">'.$list_of_articles[1]["titre"].'</h3>
                                            <img src="'.$list_of_articles[1]["image"].'" id="article2" alt="Photo Evènement">
                                            <p>'.$list_of_articles[1]["resume"].'</p>                                   
                                            <p><a href="even.php?id='.$list_of_articles[1]['id_evenement'].'" class="btn btn-default" role="button">Voir Plus</a></p>    
                                          </div>
                                        </div>
                                    </div>    
                                  </div>';   
                        echo '</div>';

                        echo '<div class="row" id="row1">';
                            echo '
                                <div class="col-lg-6">
                                    <div id="top">
                                        <div class="thumbnail">
                                          <div class="caption">
                                            <h3 class="titre">'.$list_of_articles[2]["titre"].'</h3>
                                            <img src="'.$list_of_articles[2]["image"].'" id="article1" alt="Photo Evènement">
                                            <p>'.$list_of_articles[2]["resume"].'</p>                                   
                                            <p><a href="even.php?id='.$list_of_articles[2]['id_evenement'].'" class="btn btn-default" role="button">Voir Plus</a></p>    
                                          </div>
                                        </div>
                                    </div>    
                                  </div>'; 
                        echo '
                                <div class="col-lg-6">
                                    <div id="top">
                                        <div class="thumbnail">
                                          <div class="caption">
                                            <h3 class="titre">'.$list_of_articles[3]["titre"].'</h3>
                                            <img src="'.$list_of_articles[3]["image"].'" id="article2" alt="Photo Evènement">
                                            <p>'.$list_of_articles[3]["resume"].'</p>                                   
                                            <p><a href="even.php?id='.$list_of_articles[3]['id_evenement'].'" class="btn btn-default" role="button">Voir Plus</a></p>    
                                          </div>
                                        </div>
                                    </div>    
                                  </div>';   
                        echo '</div>';
        

        ?>
            
            
        </div> 
        
<!-- Fin articles -->

        
    </div>   
</div>  






<?php
    include 'footer.php'
?>