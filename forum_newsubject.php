<?php require_once('func_forum.php');
require_once('class_sql.php');
require_once('conf.inc.php');
?>
<!-- Begin page content -->
<div class="container">
  <?php
  // Recuperation of the courrant GET ///
  if(empty($_GET["fid"])){
  ?>
  <div class="page-header">
    <h3>Error.</h3>
    
  </div>
  Il n'y a pas d'id ....
  <?php
  
  }else{
  // Récupération de l'id
  $fid = intval($_GET['fid']);
  ///////////////////////////
  $cat = $sql->Select('SELECT * FROM forum_bbs WHERE forum_id = "'.$fid.'"')->Get_return();
  
  if($fid != $cat["forum_id"]){
  ?>
  <div class="page-header">
    <h3>Error.</h3>
    
  </div>
  ID faux
  <?php
  }
  else{
  ?>
  <!-- Check if la présence est faite... -->
  
  <div class="page-header">
    <h3><a href="?page=forum">Forum</a> >> <a href="forum_viewtopic.php?fid=<?php echo $cat["forum_id"]; ?>"><?php echo $cat["forum_name"]; ?></a> >> Poster un sujet</h3>
  </div>
  
  
  <table class="table table-bordered">
    
    <div class="forum-cat">
      
      <tr class="header-forum">
        
        <th width="700"><center><b>Nouveau sujet</b></center></th>
        
      </tr>
      
      <tr>
        <th width="700"><br><br><center>
          <form class="form-signin" method="POST" action="forum_newsubjectok.php?fid=<?php echo $fid; ?>">
            <p>Titre du sujet</p>
            <label for="inputTitre" class="sr-only">Titre du sujet</label>
            <input style="width:500px;" type="text" id="inputPassword" class="form-control" placeholder="Titre du sujet" name="titre"><br>
            
            <p>Message</p>
            <textarea class="form-control" name="message" style="resize:none;width:700px;height:250px;">
            </textarea>
            <br><br><br>
            <button class="btn btn-lg btn-primary btn-block" style="width:500px;" id="inputdatestop" type="submit" id="submit">Poster</button>
            
            
            <br><br><br>
            <div style="float:left;margin-left:40px;postion:absolute;"><u>Smiley</u> : <i>A venir</i><br><u>BBcode</u> : <i>A venir</i><br><u>HTML</u> : <i>Desactivé</i></div>
         <div style="float:center;margin-right:200px;"><b>Type du sujet</b> : <input type="radio" name="gender" value="Annonce"> Annonce  <input type="radio" name="gender" value="Post-it"> Post-it <input type="radio" name="gender" value="Normal" checked="checked"> Normal </div>
          </form>
        </center></th>
        <br><br>
      </tr>
    </div>
  </table>
  <?php } } ?>
</div><br>