<?php
    require "header.php";
?>

<?php
if(isset($_SESSION['id']))
{
?>
<div  class="col-lg-8 col-lg-offset-2" id="container_profil">
    <div class="col-lg-offset-1 col-lg-12 ">
        <div class="row">
            <h3>Boîte de Réception</h3>
        </div>
    </div>
    <table class="table" >
        <tr>
            <th class="table_tile"><b>Titre</b></th>
            <th class="table_main"><b>Envoyé par</b></th>
            <th class="table_main"><b>Date</b></th>
        </tr>
       <?php
      		//Récupération des tous les utilisateurs en SQL
            $pseudo_user = $_SESSION["pseudo"];
      		$list_of_messages = getMessages($pseudo_user);
      		//Boucle pour afficher chaque utilisateurs
    
            if(!$list_of_messages)
            {
                
             echo "Vous n'avez pas de messages";   
                
            }
            else
            {
      		foreach ($list_of_messages as $message) {
      		echo "<tr>
                     <td><a href='#?w=1000' rel='popup_content'  class='poplight'>".$message["titre"]."</a></td>
                     
                     <td class='table_main'>".$message["pseudo_expediteur"]."</td>
                     <td class='table_main'>".$message["date"]."</td>
                     <td class='table_main'>
                     <a href='#?w=500' rel='popup_answer'  class='poplight' id='popup'>Répondre</a>
                     <button type='button' class='btn btn-danger'  onclick='supprimerMessage(".$message["id_message"].")'>Supprimer</button>
                     </td>
                     <td class='table_main' id='message_spe' style='display:none'>".$message["id_message"]."</td>
                  </tr>
                  <script src='js/ajax.js'></script>
                  ";
                }
      			?>
        
        <div id="popup_content" class="popup_block">
            <div class="col-lg-12" >
                <p><?php
                       echo $message["contenu"];
                ?></p>
                
            </div>
        </div> 
        
        
        
        
        <div id="popup_answer" class="popup_block">
            <div class="col-lg-12" >
                <form action="message.php" method="POST">
                    <textarea name="answer" rows="10" cols="46" placeholder="Ecris ta réponse"></textarea>
                    <div class="col-lg-offset-5">
                    <button type="submit" class="btn btn-success">Envoyer</button>
                    </div>
                </form>
                
            </div>
        </div> 
        <?php
          
    
         if(!isset($_POST['answer']))
           {
                $answer = "Message Vide";
           }
        else
           {
                $answer = $_POST['answer']; 
                
           }
        $pseudo_expe = $_SESSION['pseudo']; 
        $pseudo_desti = $message['pseudo_expediteur'];
        $titre = $message['titre'];
       
        
        answerMessage($pseudo_expe,$pseudo_desti,$titre,$answer);
    
            }
        ?>
            
    </table>
    
    <a href='#?w=1000' rel='popup_send' id="popup"  class='poplight'>Envoyer un Message!</a>
    
    
    
    
    
    
    
    
    
    
    
    
<div id="popup_send" class="popup_block">
    <div class="col-lg-offset-3 col-lg-6
                col-md-offset-3 col-md-6
                col-sm-offset-3 col-sm-6
                col-xs-offset-3 col-xs-6">
    <form action="message.php" method="post" id="form_send">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Envoyé à:</label>
                    <input type="text" class="form-control" name="destinataire" placeholder="Pseudo">
                </div>  
            </div>  
        </div>    
        
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Titre:</label>     
                    <input type="text" class="form-control" name="titre" placeholder="Titre">
                </div>  
            </div> 
        </div> 
        
        <div class="row">  
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Message:</label>
                    <textarea type="text" class="form-control" name="message" placeholder="Message"></textarea>
                </div>  
            </div>  
        </div> 
        
        <div class="row">  
            <div class="col-lg-12">
                <div class="form-group">
                    <input type="submit" name="submit" value="Send" class="btn btn-success">
                </div>  
            </div> 
        </div>     
    </form>
        </div>
    </div>
    
    
<?php
    require "footer.php";
?>
</div>

<?php



if(isset($_POST['destinataire']) && !empty($_POST['destinataire']) && isset($_POST["titre"]) && isset($_POST["message"])  && isset($_POST["submit"]))
    {
        $bdd=connectBdd();
        $destinataire = $_POST['destinataire'];
        $titre = $_POST['titre'];
        $message = $_POST['message'];

        $query = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo=:destinataire');
        $query->execute(['destinataire' => $destinataire]);
        $destinataire = $query->fetch();
        $query->CloseCursor();
    if(!$destinataire)
        {
            echo "Identifiant introuvable";
        }
    else if($destinataire)
        {
            $query2 = $bdd->prepare('INSERT INTO messages(pseudo_expediteur, pseudo_destinataire, titre, contenu) VALUES(:pseudo_expediteur, :pseudo_destinataire, :titre, :contenu)');
            $query2->execute(["pseudo_expediteur" => $_SESSION['pseudo'], "pseudo_destinataire" => $destinataire['pseudo'], "titre" => $titre, "contenu" => $message]);
            
            echo "Message envoyé!";
        }
    else
        {
            echo "Une erreur est survenue.";
        }
    }
}


else
{
    die();
}
?>

