<!DOCTYPE html>
<html>
  <head>
		<meta charset="UTF-8">
		<title>The Ravers</title>
		<meta name="description" content="description de ma page">
		<link rel="icon" type="image/png" href="media/theravers.png" />
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <link href='http://fonts.googleapis.com/css?family=Russo+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="CSS/style_home.css">
        <link href="css/carousel.css" rel="stylesheet">
        <link href="CSS/inscrip.css" rel="stylesheet">
        <link href="CSS/mybox.css" rel="stylesheet">
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        
  
</script>
          
      <?php
	require "functions.php";
?>
		
  </head>
<body>
        
      <nav class="navbar navbar-default">
          
          
          
          
          
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
              
              <div class="row">
              
              
              <div class="col-lg-6 col-lg-offset-1">
              
              <img src="media/logo.png" class="navbar-brand" alt="Logo The Ravers" id="logo">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->  
              
              
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav"> 
                <li><a href="page1.php">Accueil <span class="sr-only">(current)</span></a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="evenements.php?id=0">Evènements</a></li>
                <li><a href="forum.php">Forum</a></li>
                <li class="dropdown">
                  <a href="" class="dropdown-toggle" data-toggle="dropdown" >Galerie <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      
                    <li><a href="galerie2015.php">Galerie 2015</a></li>
                    <li class="divider"></li>
                      
                    <li><a href="galerie2014.php">Galerie 2014</a></li>
                    <li class="divider"></li>
                      
                    <li><a href="galerie2013.php">Galerie 2013</a></li>
                      
                  </ul>
                </li>
              </ul>
             </div>
                
            </div>
                    <?php
                            if(isConnected())
                            {
                                    
                            }else
                            {
                        ?>
            <div class="col-lg-4 col-lg-offset-1" id="login_form">
                
                
                <form class="form-inline" id="form_connect" method="POST" action="login.php">
                    <div class="form-group" >
                      <input type="text" placeholder="Email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="password" placeholder="Mot-de-Passe" name="pwd" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Se connecter</button>
                    <a href="#?w=500" rel="popup_name"  class="poplight" id="popup">S'inscrire</a>
                </form>    
             </div>
            </div>      
              
              
             
                  
                  
                    <?php } if (isConnected() && $_SESSION["role"]==1){  
                           
        
                            echo'<div class="col-lg-4 col-lg-offset-1">';
                            echo'<ul class="nav nav-pills" role="tablist">
                                  <li role="presentation" class="active" class="dropdown" id="one1"><button type="button" class="btn btn-danger" data-toggle="dropdown" aria-expanded="false">Admin <span class="caret"></span></button>
                                      <ul class="dropdown-menu">
                                        <li><a href="utilisateur.php">Gérer Utilisateurs</a></li>
                                        <li><a href="article.php">Gérer Evènements</a></li>
                                        <li><a href="galerie.php">Gérer Galeries</a></li>
                                        <li><a href="news_actu.php">Gérer Actualités</a></li>
                                      </ul>
                                  </li>     
                                  <li class="dropdown" id="one" class="btn btn-default">
                                      <a href="" class="dropdown-toggle" data-toggle="dropdown" >'.$_SESSION['pseudo'].' <span class="caret"></span></a>
                                      <ul class="dropdown-menu">

                                        <li role="presentation" ><a href="message.php">Messages <span class="badge">0</span></a></li>
                                        <li role="presentation"  ><a href="profil.php?id='.$_SESSION['id'].'&pseudo='.$_SESSION['pseudo'].'">Profile</a></li>     
                                        <li role="presentation" ><a href="disconnect.php">Déconnexion</a></li>

                                        </ul>
                                    </li>
                                    <li id="one" >
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown" >Communauté <span class="caret"></span></a>
                                        <ul class="dropdown-menu">

                                            <li role="presentation" ><a href="membres.php?id=0">Membres</a></li>
                                
                                        </ul>
                                     </li>
                                    </ul>
                                </div>
                                ';
                        }
                        else if (isConnected() && $_SESSION["role"]==2)
                        {    
                            echo'<div class="col-lg-4 col-lg-offset-1">';
                            echo'<ul class="nav nav-pills" role="tablist">
                                <li clas="dropdown" id="one">
                                      <a href="" class="dropdown-toggle" data-toggle="dropdown" >'.$_SESSION['pseudo'].' <span class="caret"></span></a>
                                        <ul class="dropdown-menu">

                                            <li role="presentation" ><a href="message.php">Messages <span class="badge">0</span></a></li>
                                            <li role="presentation"  ><a href="profil.php?id='.$_SESSION['id'].'&pseudo='.$_SESSION['pseudo'].'">Profile</a></li>     
                                            <li role="presentation" ><a href="disconnect.php">Déconnexion</a></li>

                                        </ul>
                                </li>
                                
                                <li clas="dropdown" id="one" >
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown" >Communauté <span class="caret"></span></a>
                                        <ul class="dropdown-menu">

                                            <li role="presentation" ><a href="membres.php?id=0">Membres</a></li>
                                        
                                        </ul>
                                </li>
                                </ul>
                                </div>';
                        }  
                            
                        
                    ?>
                 
                
            
          </div>
      </nav>
      
    
<!-- Registering Box Pop Out --> 
    
<div id="popup_name" class="popup_block">
    <div class="col-lg-12" >
        <div id="form">
            <form method="POST" action="inscription.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Pseudo</label>
                    <input type="text" class="form-control" id="name" name="pseudo" placeholder="Entrer votre Pseudo">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Entrer votre Nom">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Prenom</label>
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Entrer votre Prenom">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot-de-Passe</label>
                    <input type="password" class="form-control" name="pwd" placeholder="Entrer votre Mot-de-Passe" id="pwd">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirmer Mot-de-Passe</label>
                    <input type="password" class="form-control" name="pwd2" placeholder="Confirmer votre Mot-de-Passe" id="pwd">
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-default">S'inscrire</button>
                    <?php
                        if( isset($_GET['msg']) && $_GET['msg']=="subscribe_success")
                        {
                            echo "<div>Félicitation</div>";
                        }else if( isset($_GET['msg']) && $_GET['msg']=="email_already_exist")
                        {
                            echo "<div>L'email existe déjà</div>";
                        }else if( isset($_GET['msg']) && $_GET['msg']=="error_form")
                        {
                            echo "<div>Il y a une erreur dans le formulaire</div>";
                        }else if( isset($_GET['msg']) && $_GET['msg']=="auth_failed")
                        {
                            echo "<div>Erreur sur les identifiants</div>";
                        }else if( isset($_GET['msg']) && $_GET['msg']=="auth_success")
                        {
                            echo "<div>Connecté</div>";
                        }
                    ?>
                </div>
            </form>
         </div>
    </div>
</div>    