<?php
session_start();
require_once('func_forum.php');
require_once('class_sql.php');
require_once('conf.inc.php');

if(isset($_GET["action"])){
if($_GET["action"] == "locked"){




    $test = $sql->prepare('UPDATE forum_topic SET topic_lock = 1
                  WHERE id_topic = :id_topic');
    $test->execute(['id_topic' => intval($_GET['tid'])]);
}

if($_GET["action"] == "unlocked"){



        $test = $sql->prepare('UPDATE forum_topic SET topic_lock = 0
                  WHERE id_topic = :id_topic');
    $test->execute(['id_topic' => intval($_GET['tid'])]);

  
}

if($_GET["action"] == "delete_topic"){



    
        $test = $sql->prepare('UPDATE forum_topic SET topic_suppr = 1
                  WHERE id_topic = :id_topic');
    $test->execute(['id_topic' => intval($_GET['tid'])]);
  

 
                    
        $test2 = $sql->prepare('DELETE FROM forum_posts WHERE topic_id = :topic_id');
    $test->execute(['id_topic' => intval($_GET['tid'])]);


  
}

}
?>
  <!-- Begin page content -->
    <div class="container">
<?php

// Recuperation of the courrant GET ///

if(empty($_GET["tid"])){
  ?>
 <div class="page-header">
            <h3>Error.</h3>
           
        </div>
     <p class="bg-danger"><img style="margin-right:50px;" src="http://img9.xooimage.com/files/e/4/0/point-d-exclamation-5abb2e.png"><b>Erreur :</b> Il semblerait qu'il n'y a pas d'id..</p>
  <?php
  
}else{
    // Récupération de l'id

     $tid = intval($_GET['tid']);
     ///////////////////////////

    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    // Exemple à suivre 
    $securID = $sql->prepare('SELECT * FROM forum_topic 
    LEFT JOIN forum_bbs ON forum_topic.id_forum = forum_bbs.forum_id WHERE id_topic =:id_topic AND topic_suppr != 1');
    $securID -> execute(['id_topic' => $tid]);
    $securID -> fetch();
    return $securID;
    
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
    
    
    
  if($tid != $securID["id_topic"] || !is_numeric($_GET["tid"])){
    ?>
    <div class="page-header">
            <h3>Error.</h3>
           
        </div>
     <p class="bg-danger"><img style="margin-right:50px;" src="http://img9.xooimage.com/files/e/4/0/point-d-exclamation-5abb2e.png"><b>Erreur :</b> Il semblerait que l'id soit faux.</p>
      <?php
  }
  else{
?> 
        <!-- Check if la présence est faite... -->

        
           <div class="page-header">
            <h3><a href="?page=forum">Forum</a> >> <a href="forum_viewtopic.php?fid=<?php echo $securID["id_forum"]; ?>"><?php echo $securID["forum_name"]; ?></a> >> <?php echo htmlspecialchars($securID["topic_title"]); ?></h3>
          </div>
       
       
<table class="table table-bordered">
    

<div class="forum-cat">

<?php 
    // IF SEEN
    //$test = $sql->Query('UPDATE forum_topic

      //  SET topic_seen = topic_seen + 1 WHERE id_topic = '.$tid);
       
         $test = $sql->prepare('UPDATE forum_topic SET topic_seen = topic_seen +1
                  WHERE id_topic = :id_topic');
    $test->execute(['id_topic' => intval($_GET['tid'])]);


      /// PAGINATION TOP //
      $messageOnpage = 9; 
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      $countPosts = $sql->Select('SELECT COUNT(*) AS viewCount FROM forum_posts WHERE topic_id = "'.$tid.'";')->Get_return(); 
      
      $numberOfPage=ceil($countPosts["viewCount"]/$messageOnpage);
 
       
      if(isset($_GET['pages'])) 
      {
           $ActualPage = intval($_GET['pages']);
       
           if($ActualPage > $numberOfPage) 
           {
                $ActualPage = $numberOfPage;
           }
      }
      else 
      {
           $ActualPage = 1;   
      }

      $messageOne = ($ActualPage-1)*$messageOnpage;


    
     //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
       
   $topic = $sql->Select('SELECT * FROM forum_posts 
    LEFT JOIN utilisateurs ON utilisateurs.utilisateurs_id = forum_posts.post_creator  WHERE forum_posts.topic_id = '.$tid.' ORDER BY post_id LIMIT '.$messageOne.','.$messageOnpage.'')->Get_Lines();
    $topic_count_topic = count($topic);
   
    $j = 0;
    while ($j<$topic_count_topic) {
        

      ?>

         <tr class="header-forum"> 
            
              <th width="260"></th> 
              <th width="400"><div class="posted">Poster le : <b><?php echo date('d/m/y a h:i',$topic[$j]["post_time"]); ?></b> </div><div class="mode"><a style="color:white;" href="#">Citer</a> | <a style="color:white;" href="forum_topic.php?tid=<?php echo $tid; ?>&action=edit"><b>Editer</b></a> |  <a style="color:white;" href="forum_topic.php?tid=<?php echo $tid; ?>&action=delete"><b>X</b></a></div></th> 

          </tr>
     <tr> 

    <th><div class="perso"><img width="100" height="100" src=""><br><b><?php echo $topic[$j]["pseudo"]; ?></b></div></th>
      <th><div class="messageInto"><?php echo nl2br($topic[$j]["post_text"]); ?></div></th>
   
  </tr> 


      <?php
      $j++;
    }
    
 ?>
    </div>

</table>  
 
<?php
//// PAGINATION BOTTOM ///

    echo '<center>Page : <div class="btn-group" role="group" aria-label="...">'; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$numberOfPage; $i++) 
{
    
     if($i==$ActualPage) 
     {
         echo ' <a class="btn btn-default" style="background-color:#B1B1B1;">'.$i.'</a> '; 
     }  
     else //Sinon...
     {
          echo ' <a class="btn btn-default" href="?page=forum_topic&tid='.$tid.'&pages='.$i.'">'.$i.'</a> ';
     }
}
echo '</div></center><br><br>';

    /////////////////////////

 if(isset($_GET["action"])){
    if($_GET["action"] == "reponse"){
      if($securID["topic_lock"] == 1){
     ?>
          <p class="bg-danger"><img style="margin-right:50px;" src="http://img9.xooimage.com/files/e/4/0/point-d-exclamation-5abb2e.png"><b>Erreur :</b> Ce topic est verouillé, il vous est donc impossible de poster un message.</p>
       
    <?php
    }
    else{
      if(empty(trim($_POST["message"]))){
       ?>
        <p class="bg-danger"><img style="margin-right:50px;" src="http://img9.xooimage.com/files/e/4/0/point-d-exclamation-5abb2e.png"><b>Erreur :</b> Il manque le message ...</p>
      

       <?php
      }
    
      else{  
         

        $message = trim(stripcslashes(htmlspecialchars($_POST["message"])));

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
           $antiflood = $sql->Select('SELECT * FROM forum_posts WHERE topic_id = '.$tid.' ORDER BY post_id DESC LIMIT 0,1')->Get_return();
          $time = time();
          $timefinal = $time - $antiflood["post_time"];
        
            if($timefinal <= '60'){
             ?>
                <p class="bg-danger"><img style="margin-right:50px;" src="http://img9.xooimage.com/files/e/4/0/point-d-exclamation-5abb2e.png"><b>Erreur :</b> Il faut attendre 1 minute entre chaque réponse.</p>
      
             <?php
            }
            else{
                
                /*
            $test = $sql->Query("INSERT INTO forum_posts (post_creator, post_text, post_time, topic_id, forum_id)
            VALUES ('".$_SESSION['pseudo']."','".$message."','".time()."','".intval($tid)."','".$securID["forum_id"]."');");
                */
                
                
                
                
                $test = $sql->prepare(" INSERT INTO forum_posts (post_creator,post_text,post_time,topic_id,forum_id) VALUES (:post_creator,:message,:time,:topic_id,:forum_id)");
                $test->execute(["post_creator" => $_SESSION['pseudo'], "message" => $message, "time" => time(), "topic_id" => intval($tid), "forum_id" => $securID["forum_id"]]);
                
              $np = $sql->lastInsertId();

                
                $test = $sql->prepare('UPDATE forum_topic SET topic_last_post =:last_post WHERE id_topic=:id_topic');
                $test -> execute(['last_post' => $np, 'id_topic' => $tid]);

                $test = $sql-> prepare('UPDATE forum_bbs SET forum_last_post_id =:last_post_id WHERE forum_id=:forum_id');
                $test -> execute (["last_post" => $np, "forum_id" => $securID["forum_id"] ]);

                  ?>

                         <p class="bg-success"><img style="margin-right:50px;" src="https://cdn3.iconfinder.com/data/icons/fatcow/32/accept.png"><b>Message posté :</b> Votre message a correctement été posté.</p>
    

                  <?php
            
                     echo "<script type='text/javascript'>document.location.replace('forum_topic.php?tid=".$tid."');</script>";
                   }
      }

}}

    

  }
  ?><?php

  if($securID["topic_lock"] == 1){
    ?>
        <a href="?page=forum_topic&action=unlocked&tid=<?php echo $tid; ?>"> <img heigt="30" width="30" src="images/unlocked_topic.svg" title="verouillé" alt="Verouillé"></a> 
   <?php
  }else{
    ?>
      <a href="?page=forum_topic&action=locked&tid=<?php echo $tid; ?>"> <img heigt="30" width="30" src="images/lock_topic.svg" title="verouillé" alt="Verouillé"></a> 
    <?php
  }
  ?>
<a href="?page=forum_topic&action=delete_topic&tid=<?php echo $tid; ?>"><img heigt="30" width="30" src="images/delete.svg" title="Supprimer le topic" alt="Supprimer le topic"></a> 
 <br><br><?php } ?>
  <?php
  if($securID["topic_lock"] == 1){
    ?>
          <p class="bg-danger"><img style="margin-right:50px;" src="http://img9.xooimage.com/files/e/4/0/point-d-exclamation-5abb2e.png"><b>Erreur :</b> Ce topic est verouillé, il vous est donc impossible de poster un message.</p>
     
    <?php
  }else{
?>
  <form class="form-signin" method="POST" action="forum_topic.php?action=reponse&tid=<?php echo $tid; ?>">
<?php 

?>

     
<?php

}
?>
<h3>Réponse rapide :</h3>
 <textarea class="form-control" name="message" style="resize:none;width:800px;height:200px;"></textarea><br><br>
    <button class="btn btn-lg btn-primary btn-block" style="width:200px;margin-left:600px;" id="inputdatestop" type="submit" id="submit">Répondre</button>
      
</form>
<?php } ?>
    </div><br> 


