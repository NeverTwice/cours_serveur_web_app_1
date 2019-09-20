<?php
    require "header.php";
?>


<div  class="col-lg-8 col-lg-offset-2" id="container_profil">
    
    <?php
        echo'<table class="table table-hover">';
        $list_of_news = getNews();
        foreach($list_of_news as $news)
        {
         echo'
         <tr>
            <td><b>'.$news['titre'].'</b> </td>
            <td>'.$news['contenu'].'</td>
            <td>'.$news['date_creation'].'</td>
        </tr> ';
        
            
        }
        echo'</table>';

    ?>
</div>


<?php
    require "footer.php";
?>

</div>






