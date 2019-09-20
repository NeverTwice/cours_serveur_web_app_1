<?php  
    require "functions.php";
?>

<?php
if(!isConnected()){
    die();
}
$titre = $_POST["titre"];
$resume = $_POST["resume"];
$contenu = $_POST["contenu"];

if(isset($titre) && isset($resume) && isset($contenu))
{
    insertNew($titre,$resume,$contenu);
    header("location:news.php");
    exit();
}
