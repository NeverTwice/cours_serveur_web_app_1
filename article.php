<?php
    require "header.php";

	//Je dois vérifier que l'utilisateur est connecté
	if(!isConnected() )
	{
		//S'il n'est pas connecté je le redirige vers la page d'accueil
		die();
	}
    else if ($_SESSION['role'] != 1)
    {
        die();
    }
    else
    {


?>
     <div  class="col-lg-8 col-lg-offset-2" id="container_profil">
      <!-- Example row of columns -->
      <div class="row">
      	<div class="col-md-12">
        	


      		<table class="table">
      			<tr>
      				<th>ID</th>
      				<th>Titre</th>
      				<th>Image</th>
      				<th>Baniere</th>
      				<th>Video</th>
                    <th>Date</th>
                    <th>Date de Création</th>
      			</tr>


      			<?php
      			 	//Récupération des tous les utilisateurs en SQL
      				$list_of_articles = getArticles();
      				//Boucle pour afficher chaque utilisateurs
      				foreach ($list_of_articles as $article) {
      					echo "<tr>
			      				<td>".$article["id_evenement"]."</td>
			      				<td><a href='even.php?id=".$article["id_evenement"]."'>".$article["titre"]."</a></td>
                                <td>".$article["image"]."</td>
                                <td>".$article["baniere"]."</td>
                                <td>".$article["video"]."</td>
                                <td>".$article["date"]."</td>
                                <td>".$article["date_crea"]."</td>
			      				<td>
			      			</tr>";
      				}
      			?>
      		</table>
            <br>
            <div id="divider"></div>
            <br>
            <br>
                <h3> Créer un nouvel Evènement</h3>
            <br>
            <form method="POST" enctype="multipart/form-data" action="insert_even.php">
    
                <div class="form-group">
                    <label for="exampleInputTitre">Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre" placeholder="Ecrire le Titre">
                </div>
                
                
                <div class="form-group">
                    <label for="exampleInputContenu">Contenu</label>
                    <textarea rows="10" type="text" class="form-control" id="Contenu" name="contenu" placeholder="Ecrire le Contenu"> </textarea>
                </div>
                
                
                <div class="form-group">
                    <label for="exampleInputResume">Resume</label>
                    <textarea type="text" class="form-control" id="Resume" name="resume" placeholder="Ecrire le Résumé"> </textarea>
                </div>
                
                
                <div class="form-group">
                    <label for="exampleInputBaniere">Baniere</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                    <input type="file" class="form-control" id="Baniere" name="baniere">
                </div>
                
                
                <div class="form-group">
                    <label for="exampleInputImage">Image</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                    <input type="file" class="form-control" id="Image" name="image">
                </div>
                
                
                <div class="form-group">
                    <label for="exampleInputVideo">Video</label>
                    <input type="text" class="form-control" id="Video" name="video" placeholder="Entrer un URL">
                </div>

                
                <div class="form-group">
                    <label for="exampleInputDate">Date</label>
                <input type="text" class="form-control" name="date" placeholder="AAAA-MM-JJ" id="Date">
                </div> 
                
                <button type="submit" class="btn btn-success"> Envoyer </button>
                
                </div>
            </form>



    	</div>
      </div>
    </div>

<?php
    }

include "footer.php";

?>