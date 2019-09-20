<?php
    require "functions.php";

    if(!isConnected())
    {
        die();
    }

    if (isset($_GET['id']))
    {
    $id = $_GET['id'];
    deleteStatus($id);
    header("location: profil.php?id=".$_SESSION['id']."&pseudo=".$_SESSION['pseudo']."");
    exit();
    }
    else
    {
        die();
    }
    

?>