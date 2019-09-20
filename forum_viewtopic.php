
<?php
require_once('func_forum.php');
require_once('class_sql.php');
require_once('conf.inc.php');


  ?>

  <!-- Begin page content -->
    <div class="container">
        <!-- Check if la présence est faite... -->
<?php
// Recuperation of the courrant GET ///

if(empty($_GET["fid"])){
  ?>
 <div class="page-header">
            <h3>Error.</h3>
           
        </div>
       <p class="bg-danger"><img style="margin-right:50px;" src="http://img9.xooimage.com/files/e/4/0/point-d-exclamation-5abb2e.png"><b>Erreur :</b> Il semblerait qu'il n'y a pas d'id..</p>
  <?php
  
}else{
    // Récupération de l'id

     $fid = intval($_GET['fid']);
     ///////////////////////////

    $cat = $sql->Select('SELECT * FROM forum_bbs WHERE forum_id = "'.$fid.'"')->Get_return();
    

    $cat_count = $sql->Select('SELECT * FROM forum_topic WHERE id_forum = "'.$fid.'" AND topic_suppr != 1')->Get_Lines();
    $catCount = count($cat_count);

  if($fid != $cat["forum_id"] || !is_numeric($_GET["fid"])){
    ?>
    <div class="page-header">
            <h3>Error.</h3>
           
        </div>
       <p class="bg-danger"><img style="margin-right:50px;" src="http://img9.xooimage.com/files/e/4/0/point-d-exclamation-5abb2e.png"><b>Erreur :</b> Il semblerait que l'id soit faux.</p>
     
    <?php
  }
  else{
?>
       <div class="page-header">
            <h3><a href="forum.php">Forum</a> >> <?php echo $cat["forum_name"]; ?></h3>
        </div>
  <a href="forum_newsubject.php?fid=<?php echo $fid; ?>">> Nouveau sujet</a>  
 <br>   
 

   <table class="table table-bordered">
    




<div class="forum-cat">

 <?php

if($catCount == 0){
  ifMessageOrNot();
}
else{

   $cat = NULL;

  $topic_annonce = $sql->Select('SELECT forum_topic.id_topic, topic_title, topic_creator, topic_seen, topic_post, topic_gender, topic_time, topic_last_post, 
   u1.pseudo AS user_createur, post_creator, post_time, u1_2.pseudo AS user_last_posteur, post_id
FROM forum_topic 
LEFT JOIN utilisateurs u1 ON u1.utilisateurs_id = forum_topic.topic_creator
LEFT JOIN forum_posts ON forum_topic.topic_last_post = forum_posts.post_id 
LEFT JOIN utilisateurs u1_2 ON u1_2.utilisateurs_id = forum_posts.post_creator
 WHERE forum_topic.id_forum = "'.$fid.'" ORDER BY id_topic DESC;')->Get_Lines();
  $topic_count_annonce = count($topic_annonce);
      $i = 0;


      while ($i<$topic_count_annonce) {


        if($topic_annonce[$i]["topic_gender"] == "Annonce"){

        if($cat != $topic_annonce[$i]["topic_gender"]){

            $cat = $topic_annonce[$i]["topic_gender"];

         echo '<tr class="header-forum"> 
                     <th width="50"></th>
                      <th width="600"><b>Annonces</b></th> 
                      <th class="center_header_middle"><b>Réponses</b></th> 
                       <th class="center_header_middle"><b>Auteur</b></th> 
                      <th class="center_header_middle"><b>Vus</b></th> 
                      <th> <b>Dernier message</b></th>

                  </tr>';
        }

         getTopicBottom($topic_annonce[$i]["id_topic"],verifLook($topic_annonce[$i]["id_topic"]),htmlspecialchars($topic_annonce[$i]["topic_title"]),countPosts($topic_annonce[$i]["id_topic"]),"".$topic_annonce[$i]["user_createur"]."",topicSeen($topic_annonce[$i]["id_topic"]),' Date : '.date('d/m/y a h:i',$topic_annonce[$i]["post_time"]).' <br><b>'.$topic_annonce[$i]["user_last_posteur"].'</b>  <a href="forum_topic.php?tid='.$topic_annonce[$i]["id_topic"].'"><img height="20" src="images/go_to.svg"></a><br>');
          }

         if($topic_annonce[$i]["topic_gender"] == "Post-it"){

        if($cat != $topic_annonce[$i]["topic_gender"]){

            $cat = $topic_annonce[$i]["topic_gender"];

         echo '<tr class="header-forum"> 
                     <th width="50"></th>
                      <th width="600"><b>Post-it</b></th> 
                      <th class="center_header_middle"><b>Réponses</b></th> 
                       <th class="center_header_middle"><b>Auteur</b></th> 
                      <th class="center_header_middle"><b>Vus</b></th> 
                      <th> <b>Dernier message</b></th>

                  </tr>';
        }

         getTopicBottom($topic_annonce[$i]["id_topic"],verifLook($topic_annonce[$i]["id_topic"]),htmlspecialchars($topic_annonce[$i]["topic_title"]),countPosts($topic_annonce[$i]["id_topic"]),"".$topic_annonce[$i]["user_createur"]."",topicSeen($topic_annonce[$i]["id_topic"]),' Date : '.date('d/m/y a h:i',$topic_annonce[$i]["post_time"]).' <br><b>'.$topic_annonce[$i]["user_last_posteur"].'</b>  <a href="forum_topic.php?tid='.$topic_annonce[$i]["id_topic"].'"><img height="20" src="images/go_to.svg"></a><br>');
          }

         
       $i++;
      }

      $topic_normal = $sql->Select('SELECT forum_topic.id_topic, topic_title, topic_creator, topic_seen, topic_post, topic_gender, topic_time, topic_last_post, 
   Mb.pseudo AS user_createur, post_creator, post_time, Ma.pseudo AS user_last_posteur, post_id
FROM forum_topic 
LEFT JOIN utilisateurs Mb ON Mb.utilisateurs_id = forum_topic.topic_creator
LEFT JOIN forum_posts ON forum_topic.topic_last_post = forum_posts.post_id 
LEFT JOIN utilisateurs Ma ON Ma.utilisateurs_id = forum_posts.post_creator
 WHERE forum_topic.id_forum = "'.$fid.'" AND topic_gender = "Normal" ORDER BY topic_last_post DESC;')->Get_Lines();
  $topic_count_normal = count($topic_normal);
      $k = 0;
      while ($k<$topic_count_normal) {

  if($cat != $topic_normal[$k]["topic_gender"]){

            $cat = $topic_normal[$k]["topic_gender"];

         echo '<tr class="header-forum"> 
                     <th width="50"></th>
                      <th width="600"><b>Sujets</b></th> 
                      <th class="center_header_middle"><b>Réponses</b></th> 
                       <th class="center_header_middle"><b>Auteur</b></th> 
                      <th class="center_header_middle"><b>Vus</b></th> 
                      <th> <b>Dernier message</b></th>

                  </tr>';
        }
          getTopicBottom($topic_normal[$k]["id_topic"],verifLook($topic_normal[$k]["id_topic"]),htmlspecialchars($topic_normal[$k]["topic_title"]),countPosts($topic_normal[$k]["id_topic"]),"".$topic_normal[$k]["user_createur"]."",topicSeen($topic_normal[$k]["id_topic"]),' Date : '.date('d/m/y a h:i',$topic_normal[$k]["post_time"]).' <br><b>'.$topic_normal[$k]["user_last_posteur"].'</b>  <a href="forum_topic.php?tid='.$topic_normal[$k]["id_topic"].'"><img height="20" src="images/go_to.svg"></a><br>');
     

       $k++;

      }
    }
 ?>

      </div>

</table> 
<a href="forum_newsubject.php?fid=<?php echo $fid; ?>">> Nouveau sujet</a>  
 
<?php


}
}
?>
    </div>


