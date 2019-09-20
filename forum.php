<?php
    require "header.php";
?>

<div  class="col-lg-8 col-lg-offset-2" id="container_profil">

    <table class="table table-hover">
        <th>Pseudo</th>
        <th>Message</th>
        <th>Date</th>
        
        <?php
            $list_of_commentaire=getCommentaires();
    
            foreach($list_of_commentaire as $commentaire){
                
                echo ' <tr>
                            <td>'.$commentaire["pseudo"].'</td>
                            <td>'.$commentaire["contenu"].'</td>
                            <td>'.$commentaire["date_creation"].'</td>';
                            if (isset($_SESSION['role']))
                                {
                                    if($_SESSION['role']==1)
                                    {
                                echo"<td><button type='button' class='btn btn-danger'  onclick='supprimerCommentaire(".$commentaire["commentaire_id"].")'>Supprimer</button></td>"; 
                                    }
                                }
                    echo'</tr>';
                
            }
    
    
    
    
    
    
    
    
    
    
    
        ?>
    </table>
<?php
    if(isConnected()){
        echo'
<div id="form">
            <form method="POST" action="inser_commentaire.php">
                    <label for="exampleInputEmail1">Commentaire</label>
                    <textarea type="text" class="form-control" id="name" name="contenu" ></textarea>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-default">Envoyer Commentaire</button>
                </div>
            </form>';
    }
?>
</div>






















<?php
    include "footer.php";
?>

</div>