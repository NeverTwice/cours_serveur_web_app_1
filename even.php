<?php 
	require "header.php"
?>

<?php
        
$even_id = $_GET['id'];
$article = getArticle($even_id);

if(isset($article) && !empty($article))
{
echo '<div  class="col-lg-8 col-lg-offset-2" id="container_profil">
	<div class="row">
	
		<div class="col-lg-offset-1 col-lg-12">
		
			<h3> <b>'.$article[0]['titre'].'</b> </h3>
		  <br>
		</div>
	
	</div>



	<div class="row">
	
		<div class="col-lg-12">
		
			<img src="'.$article[0]['baniere'].'" width="101%">
		
		</div>
	
	</div>
	<br>
	<div class="row">
	
		<div class="col-lg-12">
		
			<p>'.$article[0]['contenu'].'</p>
			
		</div>
	
	</div>
	<br>
	<div class="row">
		<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-6 col-xs-offset-1 col-xs-6">
			<iframe width="560" height="315" src="'. $article[0]['video'].'" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
    ';
}

if (isConnected())
{
    if ($_SESSION['role'] == 1)
    {
        if(isset($article) && !empty($article))
        {
        echo "   
        <br>
        <div class='col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-4'>
        <a class='btn btn-info' href='modify_even.php?id=".$article[0]["id_evenement"]."'>Modifier</a>
        <a class='btn btn-danger' href='delete_even.php?id=".$article[0]["id_evenement"]."'>Supprimer</a></td>
        </div>
        ";
        }
        
    }
    
}















?>


<?php 
	require "footer.php"
?>

</div>