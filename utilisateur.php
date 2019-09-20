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
        die("<b>Page Not Found</b>");
    }
    else
    {


?>
     <div  class="col-lg-8 col-lg-offset-2" id="container_profil">
      <!-- Example row of columns -->
      <div class="row">
      	<div class="col-md-12">
        	

        	<?php



			//Si dans l'url j'ai un id et une action
			if( isset($_GET["id"]) &&  isset($_GET["action"]))
			{
				//Si l'action est égale à delete
				if($_GET["action"] == "delete")
				{
					//Je lance la suppression
					deleteUser($_GET["id"]);
				}
				//Si l'action est égale à update alors je mets à jour la bdd
				else if($_GET["action"] == "update")
				{
					updateUser($_GET["id"], $_POST["name"], $_POST["surname"],$_POST["pseudo"],$_POST["email"], $_POST["role"]);
				}
				//Si l'action est égale à modify j'affiche un formulaire 
				//pour modifier l'utilisateur
				else if($_GET["action"] == "modify")
				{

					//récupérer les informations de l'utilisateur
					$user = getUser($_GET["id"]);

					?>

					<form class="form-horizontal" method="POST" 
					action="utilisateur.php?id=<?php echo $_GET["id"]?>&action=update">
					  <div class="form-group">
						<label for="inputName" class="col-sm-2 control-label">Nom</label>
						<div class="col-sm-10">
						  <input type="text" value="<?php echo $user['nom'] ?>" class="form-control" id="inputName" name="name" placeholder="Nom">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputSurname" class="col-sm-2 control-label">Prénom</label>
						<div class="col-sm-10">
						  <input type="text" value="<?php echo $user['prenom'] ?>" class="form-control" id="inputSurname" name="surname" placeholder="Prénom">
						</div>
					  </div>
                        
                        <div class="form-group">
						<label for="inputSurname" class="col-sm-2 control-label">Pseudo</label>
						<div class="col-sm-10">
						  <input type="text" value="<?php echo $user['pseudo'] ?>" class="form-control" id="inputSurname" name="pseudo" placeholder="Prénom">
						</div>
					  </div>
                        
                        <div class="form-group">
						<label for="inputSurname" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
						  <input type="text" value="<?php echo $user['email'] ?>" class="form-control" id="inputSurname" name="email" placeholder="Prénom">
						</div>
					  </div>
                        
                        <div class="form-group">
						<label for="inputSurname" class="col-sm-2 control-label">Droits d'Accès</label>
						<div class="col-sm-10">
						  <input type="text" value="<?php echo $user['role'] ?>" class="form-control" id="inputSurname" name="role" placeholder="Droits d'Accès">
						</div>
					  </div>    
                        
                        
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-default">Modifier</button>
						</div>
					  </div>
					</form>


					<?php

				}
			}

		?>

      		<table class="table">
      			<tr>
      				<th>ID</th>
      				<th>Nom</th>
      				<th>Prénom</th>
      				<th>Email</th>
      				<th>Droits</th>
      			</tr>


      			<?php
      			 	//Récupération des tous les utilisateurs en SQL
      				$list_of_users = getUsers();
      				//Boucle pour afficher chaque utilisateurs
      				foreach ($list_of_users as $user) {
      					echo "<tr>
			      				<td>".$user["utilisateurs_id"]."</td>
			      				<td>".$user["nom"]."</td>
			      				<td>".$user["prenom"]."</td>
			      				<td>".$user["email"]."</td>
                                <td>".$user["role"]."</td>
			      				<td>
			      					<a class='btn btn-info' href='utilisateur.php?id=".$user["utilisateurs_id"]."&action=modify'>Modifier</a>

			      					<a class='btn btn-danger' href='utilisateur.php?id=".$user["utilisateurs_id"]."&action=delete'>Supprimer</a></td>
			      			</tr>";
      				}
      			?>
      			

      		</table>



    	</div>
      </div>
    </div>

<?php
    }

include "footer.php";

?>