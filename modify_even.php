<?php  
    require "header.php";
?>
<div  class="col-lg-8 col-lg-offset-2" id="container_profil">
<?php
$id_even = $_GET['id'];
$even=getArticle($id_even);


echo'    
    <form method="POST" enctype="multipart/form-data" action="trait_even.php?id='.$id_even.'">
    
                <div class="form-group">
                    <label for="exampleInputTitre">Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre" value="'.$even[0][1].'">
                </div>
                
                
                <div class="form-group">
                    <label for="exampleInputContenu">Contenu</label>
                    <textarea type="text" class="form-control" id="Contenu" name="contenu">'.$even[0][3].'</textarea>
                </div>
                
                
                <div class="form-group">
                    <label for="exampleInputResume">Resume</label>
                    <textarea type="text" class="form-control" id="Resume" name="resume">'.$even[0][2].'</textarea>
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
                    <input type="text" class="form-control" id="Video" name="video" value="'.$even[0][7].'">
                </div>

                
                <div class="form-group">
                    <label for="exampleInputDate">Date</label>
                <input type="text" class="form-control" name="date" value="'.$even[0][4].'" id="Date">
                </div> 
                
                <button type="submit" class="btn btn-success"> Modifier </button>
                
                </div>
            </form>'; ?>
<?php
    include 'footer.php';
?>
</div>