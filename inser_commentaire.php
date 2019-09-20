<?php
    require "functions.php";
?>


<?php
if(!isConnected()){
    die();
}
else{
$pseudo = $_SESSION['pseudo'];
$contenu = $_POST["contenu"];

if(isset($contenu) && isset($pseudo))
{
    insertCommentaire($pseudo,$contenu);
    header("location:forum.php");
    exit();
}
}