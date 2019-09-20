<?php
    require "header.php";
    

    if(!isConnected())
    {
        die();
    }

?>
    <div  class="col-lg-8 col-lg-offset-2" id="container_profil">

        <?php
        function get10Users($min)
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM utilisateurs ORDER BY date_creation ASC LIMIT $min, 10");
		$query->execute();
		return $query->fetchAll();

	}

    if (isset($_GET['id'])) { 
                $min = $_GET['id']; 
    }
    else $min = 0;
        
        ?>
        <?php
            $nombre_users=nombreUsers();
            foreach($nombre_users as $users)
            {
                echo "<p>Le nombre total d'utilisateurs inscrits est de <b>".$users[0]."</b></p>";            
            };
        ?>
        
        <table class="table table-hover">
      			<tr>
      				<th>Avatar</th>
                    <th>Pseudo</th>
      				<th>Nom</th>
      				<th>Prénom</th>
      			</tr>


      			<?php
      			 	//Récupération des tous les utilisateurs en SQL
      				$list_of_users = get10Users($min);
                    $compteur=0;
      				//Boucle pour afficher chaque utilisateurs
      				foreach ($list_of_users as $user) {
      					echo "<tr>
			      				<td><img src='".$user["avatar"]."' width='10%'></td>
                                <td><a href='profil.php?id=".$user['utilisateurs_id']."&pseudo=".$user["pseudo"]."' >".$user["pseudo"]."</a></td>
			      				<td>".$user["nom"]."</td>
			      				<td>".$user["prenom"]."</td>
			      				<td>
			      			</tr>";
      				}
      			?>
      			

      		</table>
    
        
        
        <div class="row">
    <div class="col-lg-offset-5">
        
        <?php
        // Boutons pour changer la page des membres inscrits
        if($min>=8)
        {
        /*Bouton Precedent*/
            if (isset($_GET['id'])) { 
                $min = $_GET['id']; 
                $page_precedente = $min  - 10; 
                echo '<a href="membres.php?id='.$page_precedente.'" class="btn btn-default">Précédente</a>'; 
            } 
            else $min = 0;
        }
        /*Bouton Suivant*/ 
        if($compteur==7)
        {
            if (isset($_GET['id'])) { 
                $min = $_GET['id']; 
                $page_suivant = $min  + 10; 
                echo '<a href="membres.php?id='.$page_suivant.'" class="btn btn-default">Suivant</a>'; 
            } 
            else $min = 0;

        }
        ?>
        
    </div>
</div>






















<?php
    include "footer.php";
?>

</div>