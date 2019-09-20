<?php
////////////// FORUM ////////////////

   function countSubject($forum_id){
    global $sql;
    $countSubject = $sql->Select('SELECT COUNT(*) AS viewCount FROM forum_topic WHERE id_forum = "'.$forum_id.'";')->Get_return(); 

    return $countSubject["viewCount"];
 
 }
  function countMessage($forum_id){
    global $sql;
    $countMessage = $sql->Select('SELECT COUNT(*) AS viewCount FROM forum_posts WHERE forum_id = "'.$forum_id.'";')->Get_return(); 

    return $countMessage["viewCount"];
 
 }
 ////////////////// VIEW TOPIC ///////////////////////

function getTopicBottom($topic_id,$image,$topic_title,$response,$autor,$seen,$last_message){



          echo '
        <tr class="topic-view"> 
          <th width="50">'.$image.'</th>
          <th ><a class="link_fofo" href="forum_topic.php?tid='.$topic_id.'"><br>'.$topic_title.'</a></th>
          <th class="center_header_middle"><br>'.$response.'</th>
          <th class="center_header_middle"><br><b>'.$autor.'</b></th>
          <th class="center_header_middle"><br>'.$seen.'</th>
          <th>'.$last_message.'</th>
        </tr> ';


}
function ifMessageOrNot(){

 echo '<tr class="header-forum"> 
                     <th width="50"></th>
                      <th width="600"><b>Sujets</b></th> 
                      <th class="center_header_middle"><b>Réponses</b></th> 
                       <th class="center_header_middle"><b>Auteur</b></th> 
                      <th class="center_header_middle"><b>Vus</b></th> 
                      <th> <b>Dernier message</b></th>

                  </tr>';
   echo '
        <tr class="topic-view"> 
          <th width="50"></th>
          <th><center>Ce forum ne comporte <b>aucun sujet</b> pour le moment. Veuillez re-passer.</center></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr> ';

}
function countPosts($topic_id){


    global $sql;
    $countPosts = $sql->Select('SELECT COUNT(*) AS viewCount FROM forum_posts WHERE topic_id = "'.$topic_id.'";')->Get_return(); 

    return $countPosts["viewCount"];


}

function verifLook($topic_id){

    global $sql;
    $veriflook = $sql->Select('SELECT * FROM forum_topic WHERE id_topic = "'.$topic_id.'";')->Get_return(); 

     if($veriflook["topic_lock"] == 1){
     return "<img height='60' title='sujet verouiller' src='images/lock.svg'>";
     }
     else{
      return "<img height='60' title='sujet pas verouillé' src='images/unlock.svg'>";
     }

}

function topicSeen($topic_id){

         global $sql;
             $topicSeen = $sql->Select('SELECT topic_seen, id_topic FROM forum_topic WHERE id_topic = "'.$topic_id.'";')->Get_return(); 

                return $topicSeen["topic_seen"];

}