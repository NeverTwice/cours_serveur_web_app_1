<?php  
    require "functions.php";

$id_even = $_GET['id'];
deleteArticle($id_even);

header("location:evenements.php?msg=delete_success&id=0");
exit();