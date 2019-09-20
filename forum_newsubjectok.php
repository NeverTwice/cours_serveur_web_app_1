<?php
session_start();
require_once('func_forum.php');
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
            <h3><a href="?page=forum">Forum</a> >> <a href="forum_viewtopic.php?fid=<?php echo $cat["forum_id"]; ?>"><?php echo $cat["forum_name"]; ?></a> >> <a href="forum_newsubject.php?fid=<?php echo $cat["forum_id"]; ?>">Poster un sujet</a> >> Confirmation poster un sujet</h3>
          </div>
        
       
   <table class="table table-bordered">
    


<div class="forum-cat">

    
         <tr class="header-forum"> 
            
              <th width="700"><center><b>Nouveau sujet</b></center></th> 
              

          </tr>

        

  <tr> 
    <th width="700"><br><center>   
          <?php
          if(isset($_POST["message"]) && isset($_POST["titre"])){


          if (empty(trim($_POST["message"])) || empty(trim($_POST["titre"])))
          {
            ?>
                <p class="bg-danger"><img style="margin-right:50px;" src="http://img9.xooimage.com/files/e/4/0/point-d-exclamation-5abb2e.png"><b>Erreur :</b> Votre message ou votre titre est vide.</p>
      
            <?php

      

         }  
         else 
         {

            $message = trim(stripcslashes(htmlspecialchars($_POST["message"])));
            $titre = trim($_POST["titre"]);
          
              
          $antiflood = $sql->Select('SELECT * FROM forum_topic ORDER BY id_topic DESC LIMIT 0,1')->Get_return();
          $time = time();
          $timefinal = $time - $antiflood["topic_time"];
        
            if($timefinal <= '60'){
             ?>
                <p class="bg-danger"><img style="margin-right:50px;" src="http://img9.xooimage.com/files/e/4/0/point-d-exclamation-5abb2e.png"><b>Erreur :</b> Il faut attendre 1 minute entre chaque nouveau sujet.</p>
      
             <?php
            }
            else{

              if($_POST["gender"] !=  "Annonce" || $_POST["gender"] != "Post-it"){
                  $gender = "Normal";
              }else{
                  $gender = $_POST["gender"];
              }

            $test = $sql->Query("INSERT INTO forum_topic (id_forum, topic_title, topic_creator, topic_seen, topic_gender, topic_time)
            VALUES('".$fid."','".$titre."','".$_SESSION['pseudo']."', '1','".$gender."','".time()."');");  
            
              $nt = $sql->lastInsertId(); 


            $test = $sql->Query("INSERT INTO forum_posts (post_creator, post_text, post_time, topic_id, forum_id)
            VALUES ('".$_SESSION['user']['id_user']."','".$message."','".time()."','".intval($nt)."','".$fid."');");

            
             $np = $sql->lastInsertId(); 


             $test = $sql->Query('UPDATE forum_topic SET topic_last_post = "'.$np.'", topic_first_post = "'.$np.'"
                  WHERE id_topic = '.$nt);

             $test = $sql->Query('UPDATE forum_bbs SET forum_last_post_id = '.$np.'
                  WHERE forum_id = '.$fid);



            echo "<b>Message posté</b><br><br>

            Cliquez <a href='forum_viewtopic.php?fid=".$fid."'>ici</a> pour retourner au topic.<br><br>
            Cliquez <a href='forum_topic.php?tid=".$nt."'>ici</a> pour voir votre message.<br><br>";



         }
       }
       }
       else{
            ?>
                <p class="bg-danger"><img style="margin-right:50px;" src="http://img9.xooimage.com/files/e/4/0/point-d-exclamation-5abb2e.png"><b>Erreur :</b> Verifiez vos champs.</p>
      
            <?php
       }
          ?>

    </center>
  </th>
  </tr> 


</div>




   
</table> 
<?php } } ?>

    </div> 


