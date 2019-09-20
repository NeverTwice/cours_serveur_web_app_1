<?php
    require "header.php";
?>

<?php
if(!isConnected())
{
    die();
}
else if ($_SESSION['role'] != 1)
{
    die();
}
else{

?>

<div  class="col-lg-8 col-lg-offset-2" id="container_profil">
    
    <?php
        
        echo'<table class="table table-hover">
            <th>Titre</th>
            <th>Contenu</th>
            <th>Date</th>
            ';
        $list_of_news = getNews();
        foreach($list_of_news as $news)
        {
         echo'
         <tr>
            <td>'.$news['titre'].' </td>
            <td>'.$news['contenu'].'</td>
            <td>'.$news['date_creation'].'</td>
        </tr> ';
        
            
        }
        echo'</table>';
    ?>
    
    <br>
        <div id="form">
            <form method="POST" action="article_up.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Titre</label>
                    <input type="text" class="form-control" id="name" name="titre" placeholder="Titre">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Contenu</label>
                    <textarea type="text" class="form-control" id="name" name="contenu" placeholder="Contenu"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Résumé</label>
                    <textarea type="text" class="form-control" id="resume" name="resume" placeholder="Résumé"></textarea>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-default">Créer l'Article</button>
                </div>
            </form>
</div>


<?php
    require "footer.php";
?>

</div>

<?php
}
?>