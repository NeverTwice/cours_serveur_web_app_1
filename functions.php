<?php
	session_start();

	require_once("conf.inc.php");

	function connectBdd()
	{
		try{	
			$bdd = new PDO(HOST, USERBDD, MDPBDD);
		}catch(Exception $e)
		{
			die("erreur :".$e->getMessage());
		}
		return $bdd;
	}

    // Users Functions

	function insertUser($pseudo,$name, $surname, $email, $pwd){
		$pwd = md5($pwd.GRAIN_DE_SABLE);
		$bdd = connectBdd();
		$query = $bdd->prepare("INSERT INTO utilisateurs (pseudo,nom, prenom, email, mdp)
						VALUES (:pseudo, :name, :surname, :email, :mdp)");
		$query->execute( [ "pseudo" => $pseudo, "name"=>$name,"surname"=>$surname,"email"=>$email,"mdp"=>$pwd ] );
		
	}

    function uploadImage($file, $new_name)
	{
		$extensions_valides = ['jpg' , 'jpeg' , 'gif' , 'png' ];
		
		$name = $file["name"];
		$poids = $file['size'];
		$code = $file['error'];
		$maxsize = 1048576;
		$upload = "upload/";
		

		//On récupère l'extension
		$name_exploded = explode(".",$name);
		$extension = strtolower(end($name_exploded));
		
		
		if($code > 0)
		{
			switch ($code) { 
				case UPLOAD_ERR_INI_SIZE: 
					$msg_error = "Fichier trop lourd selon php.ini"; 
					break; 
				case UPLOAD_ERR_FORM_SIZE: 
					$msg_error = "Fichier trop lourd selon MAX_FILE_SIZE"; 
					break; 
				case UPLOAD_ERR_PARTIAL: 
					$msg_error = "Upload partiel"; 
					break; 
				case UPLOAD_ERR_NO_FILE: 
					$msg_error = "Aucun fichier"; 
					break; 
				case UPLOAD_ERR_NO_TMP_DIR: 
					$msg_error = "Le dossier temporaire n'existe pas"; 
					break; 
				case UPLOAD_ERR_CANT_WRITE: 
					$msg_error = "Problème de permission"; 
					break; 
				case UPLOAD_ERR_EXTENSION: 
					$msg_error = "Erreur au niveau de l'extension"; 
					break; 
				default: 
					$msg_error = "Erreur ???"; 
					break; 
			}	
			return $msg_error;
		}
		//On vérifie que notre extension se trouve dans notre tableau $extensions_valides
		else if(!in_array($extension, $extensions_valides))
		{
			return  "Extension invalide : ( 'jpg' , 'jpeg' , 'gif' , 'png' )";
		}	
		//Notre extension est donc ok, on vérifie maintenant le poids de l'image
		else if ($poids > $maxsize)
		{
			return  "Fichier trop lourd (".$poids ."/".$maxsize."octets)";
		}
		
		
		$final_name=$upload.$new_name.".".$extension;
		$resultat = move_uploaded_file($file['tmp_name'],$final_name);
		if (!$resultat){
		
			return "Echec de l'upload";
		}	

        $bdd = connectBdd();
        $query = $bdd ->prepare("UPDATE utilisateurs SET avatar=:avatar WHERE utilisateurs_id =:id");
        $query -> execute(["avatar" => $final_name, "id" => $_SESSION["id"]]);
        
        
		return "OK";
	}

    function selectImage($id){
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT avatar FROM utilisateurs WHERE utilisateurs_id=:id");
		$query->execute( [ "id"=>$id ] );
		return $query->fetch();
	}


	function updateUser($id, $name, $surname,$pseudo,$email,$role)
	{
		$bdd = connectBdd();
		$query = $bdd ->prepare("UPDATE utilisateurs SET nom=:name, prenom=:surname,pseudo=:pseudo,email=:email, role=:role 
								 WHERE utilisateurs_id = :id");
		$query->execute([ "id"=>$id, "name"=>$name,"surname"=>$surname, "pseudo"=>$pseudo, "email"=>$email,"role"=>$role]);
	}

	function deleteUser($id)
	{
		$bdd = connectBdd();
		$query = $bdd ->prepare("DELETE FROM utilisateurs WHERE utilisateurs_id = :id");
		$query->execute(["id" => $id]);
	}

	function emailExist($email)
	{
		$bdd = connectBdd();
		$query = $bdd ->prepare("SELECT * FROM utilisateurs WHERE email = :email");
		$query->execute( [ "email"=>$email ] );
		$resultat = $query->fetchAll();

		if( empty($resultat))
		{
			return false;
		}
		return true;			

	}

    function pseudoExist($pseudo)
        {
            $bdd = connectBdd();
            $query = $bdd ->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo");
            $query->execute( [ "pseudo"=>$pseudo ] );
            $resultat = $query->fetchAll();

            if( empty($resultat))
            {
                return false;
            }
            return true;			

        }
	
	function selectUser($email, $pwd){
		$pwd = md5($pwd.GRAIN_DE_SABLE);
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM utilisateurs WHERE email=:email AND mdp=:mdp");
		$query->execute( [ "email"=>$email,"mdp"=>$pwd ] );
		return $query->fetchAll();
	}

	function getUser($id)
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM utilisateurs WHERE utilisateurs_id=:id");
		$query->execute( [ "id"=>$id ] );
		return $query->fetch();

	}

	function getUsers()
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM utilisateurs");
		$query->execute();
		return $query->fetchAll();

	}

    function nombreUsers()
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT COUNT(*) FROM utilisateurs");
		$query->execute();
		return $query->fetchAll();

	}


    function getUserByID()
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT utilisateurs_id FROM utilisateurs");
		$query->execute();
		return $query->fetchall();

	}

	function connectUser($user)
	{
		$_SESSION['id'] = $user[0]["utilisateurs_id"];
        $_SESSION['pseudo'] = $user[0]["pseudo"];
		$_SESSION['email'] = $user[0]["email"];
		$_SESSION['name'] = $user[0]["nom"];
		$_SESSION['surname'] = $user[0]["prenom"];
        $_SESSION['role'] = $user[0]["role"];

	}


	function disconnectUser()
	{
		session_destroy();
	}

	function isConnected()
	{
		//Est ce qu'il y a une variable de session ID et est il numerique
		if( !isset($_SESSION['id']) || !is_numeric($_SESSION['id']) )
		{
			return false;
		}else
		{
			//Je vérifie qu'il a pour email $_SESSION['email']
			$user = getUser($_SESSION['id']);
			if($_SESSION['email'] == $user["email"])
			{
				return true;
			}
			disconnectUser();
			return false;
		}


	}

    // Messages Functions
    
    function getMessages($pseudo_user)
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM messages WHERE pseudo_destinataire=:pseudo_user");
		$query->execute(["pseudo_user" => $pseudo_user]);
		return $query->fetchall();
	}

    function answerMessage($pseudo_expe,$pseudo_desti,$titre,$answer)
    {
        $bdd = connectBdd();
        $query = $bdd ->prepare("INSERT INTO messages (pseudo_expediteur,pseudo_destinataire,titre,contenu) VALUES (:pseudo_expe,:pseudo_desti,:titre,:contenu)");
        $query->execute([
            "pseudo_expe"=>$pseudo_expe,
            "pseudo_desti"=>$pseudo_desti,
            "titre"=>$titre,
            "contenu" => $answer]);
    }
    
    
    function supprimerMessage($id)
        {
            $bdd = connectBdd();
            $query = $bdd ->prepare("DELETE FROM messages WHERE id_message = :id");
            $query->execute(["id" => $id]);
        
        echo "Message supprimé";
    }
    
    function supprMessage($id)
	{
		$bdd = connectBdd();
		$query = $bdd ->prepare("DELETE FROM messages WHERE id_message = :id");
		$query->execute(["id" => $id]);
	}

    // Article Functions

    function insertArticle($titre, $resume, $contenu,$date, $image,$baniere, $video){
		$bdd = connectBdd();
		$query = $bdd->prepare("INSERT INTO evenements (titre,resume,contenu,date,image,baniere,video)
						VALUES (:titre, :resume, :contenu, :date, :image,:baniere,:video)");
		$query->execute( [ "titre"=>$titre,"resume"=>$resume,"contenu"=>$contenu, "date"=>$date,"image"=>$image,"baniere"=>$baniere, "video"=>$video  ] );
		
	}

    function getArticles()
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM evenements");
		$query->execute();
		return $query->fetchAll();

	}

    function getArticle($even_id)
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM evenements WHERE id_evenement=:id");
		$query->execute(['id' => $even_id]);
		return $query->fetchAll();

	}

    function getLastArticles()
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM evenements ORDER BY date LIMIT 4");
		$query->execute();
		return $query->fetchAll();

	}

    function get7Articles($min)
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM evenements ORDER BY date DESC LIMIT $min, 7");
		$query->execute();
		return $query->fetchAll();

	}

    function deleteArticle($id)
	{
		$bdd = connectBdd();
		$query = $bdd ->prepare("DELETE FROM evenements WHERE id_evenement = :id");
		$query->execute(["id" => $id]);
	}

    function updateArticle($id, $titre, $resume, $contenu, $date, $image, $baniere, $video   )
	{
		$bdd = connectBdd();
		$query = $bdd ->prepare("UPDATE evenements SET titre=:titre,resume=:resume, contenu=:contenu, date=:date, image=:image, baniere=:baniere, video=:video   
								 WHERE id_evenement = :id");
		$query->execute([ "id"=>$id, "titre"=>$titre, "resume"=>$resume, "contenu"=>$contenu, "date"=>$date,"image"=>$image, "baniere"=>$baniere, "video"=>$video      ]);
    }
    
    function uploadImageArticle($file, $new_name)
	{
		$extensions_valides = ['jpg' , 'jpeg' , 'gif' , 'png' ];
		
		$name = $file["name"];
		$poids = $file['size'];
		$code = $file['error'];
		$maxsize = 1048576;
		$upload = "upload/";
		

		//On récupère l'extension
		$name_exploded = explode(".",$name);
		$extension = strtolower(end($name_exploded));
		
		
		if($code > 0)
		{
			switch ($code) { 
				case UPLOAD_ERR_INI_SIZE: 
					$msg_error = "Fichier trop lourd selon php.ini"; 
					break; 
				case UPLOAD_ERR_FORM_SIZE: 
					$msg_error = "Fichier trop lourd selon MAX_FILE_SIZE"; 
					break; 
				case UPLOAD_ERR_PARTIAL: 
					$msg_error = "Upload partiel"; 
					break; 
				case UPLOAD_ERR_NO_FILE: 
					$msg_error = "Aucun fichier"; 
					break; 
				case UPLOAD_ERR_NO_TMP_DIR: 
					$msg_error = "Le dossier temporaire n'existe pas"; 
					break; 
				case UPLOAD_ERR_CANT_WRITE: 
					$msg_error = "Problème de permission"; 
					break; 
				case UPLOAD_ERR_EXTENSION: 
					$msg_error = "Erreur au niveau de l'extension"; 
					break; 
				default: 
					$msg_error = "Erreur ???"; 
					break; 
			}	
			return $msg_error;
		}
		//On vérifie que notre extension se trouve dans notre tableau $extensions_valides
		else if(!in_array($extension, $extensions_valides))
		{
			return  "Extension invalide : ( 'jpg' , 'jpeg' , 'gif' , 'png' )";
		}	
		//Notre extension est donc ok, on vérifie maintenant le poids de l'image
		else if ($poids > $maxsize)
		{
			return  "Fichier trop lourd (".$poids ."/".$maxsize."octets)";
		}
		
		
		$final_name=$upload.$new_name.".".$extension;
		$resultat = move_uploaded_file($file['tmp_name'],$final_name);
		if (!$resultat){
		
			return "Echec de l'upload";
		}	

        $bdd = connectBdd();
        $query = $bdd ->prepare("UPDATE evenements SET image=:avatar WHERE id_evenement =:id");
        $query -> execute(["avatar" => $final_name, "id" => $_SESSION["id"]]);
        
        
		return "OK";
	}
    

    function uploadBaniereArticle($file, $new_name)
	{
		$extensions_valides = ['jpg' , 'jpeg' , 'gif' , 'png' ];
		
		$name = $file["name"];
		$poids = $file['size'];
		$code = $file['error'];
		$maxsize = 1048576;
		$upload = "upload/";
		

		//On récupère l'extension
		$name_exploded = explode(".",$name);
		$extension = strtolower(end($name_exploded));
		
		
		if($code > 0)
		{
			switch ($code) { 
				case UPLOAD_ERR_INI_SIZE: 
					$msg_error = "Fichier trop lourd selon php.ini"; 
					break; 
				case UPLOAD_ERR_FORM_SIZE: 
					$msg_error = "Fichier trop lourd selon MAX_FILE_SIZE"; 
					break; 
				case UPLOAD_ERR_PARTIAL: 
					$msg_error = "Upload partiel"; 
					break; 
				case UPLOAD_ERR_NO_FILE: 
					$msg_error = "Aucun fichier"; 
					break; 
				case UPLOAD_ERR_NO_TMP_DIR: 
					$msg_error = "Le dossier temporaire n'existe pas"; 
					break; 
				case UPLOAD_ERR_CANT_WRITE: 
					$msg_error = "Problème de permission"; 
					break; 
				case UPLOAD_ERR_EXTENSION: 
					$msg_error = "Erreur au niveau de l'extension"; 
					break; 
				default: 
					$msg_error = "Erreur ???"; 
					break; 
			}	
			return $msg_error;
		}
		//On vérifie que notre extension se trouve dans notre tableau $extensions_valides
		else if(!in_array($extension, $extensions_valides))
		{
			return  "Extension invalide : ( 'jpg' , 'jpeg' , 'gif' , 'png' )";
		}	
		//Notre extension est donc ok, on vérifie maintenant le poids de l'image
		else if ($poids > $maxsize)
		{
			return  "Fichier trop lourd (".$poids ."/".$maxsize."octets)";
		}
		
		
		$final_name=$upload.$new_name.".".$extension;
		$resultat = move_uploaded_file($file['tmp_name'],$final_name);
		if (!$resultat){
		
			return "Echec de l'upload";
		}	

        $bdd = connectBdd();
        $query = $bdd ->prepare("UPDATE evenements SET baniere=:avatar WHERE id_evenement =:id");
        $query -> execute(["avatar" => $final_name, "id" => $_SESSION["id"]]);
        
        
		return "OK";
	}
    
    function insertImage($file, $new_name)
	{
		$extensions_valides = ['jpg' , 'jpeg' , 'gif' , 'png' ];
		
		$name = $file["name"];
		$poids = $file['size'];
		$code = $file['error'];
		$maxsize = 1048576;
		$upload = "upload/";
		

		//On récupère l'extension
		$name_exploded = explode(".",$name);
		$extension = strtolower(end($name_exploded));
		
		
		if($code > 0)
		{
			switch ($code) { 
				case UPLOAD_ERR_INI_SIZE: 
					$msg_error = "Fichier trop lourd selon php.ini"; 
					break; 
				case UPLOAD_ERR_FORM_SIZE: 
					$msg_error = "Fichier trop lourd selon MAX_FILE_SIZE"; 
					break; 
				case UPLOAD_ERR_PARTIAL: 
					$msg_error = "Upload partiel"; 
					break; 
				case UPLOAD_ERR_NO_FILE: 
					$msg_error = "Aucun fichier"; 
					break; 
				case UPLOAD_ERR_NO_TMP_DIR: 
					$msg_error = "Le dossier temporaire n'existe pas"; 
					break; 
				case UPLOAD_ERR_CANT_WRITE: 
					$msg_error = "Problème de permission"; 
					break; 
				case UPLOAD_ERR_EXTENSION: 
					$msg_error = "Erreur au niveau de l'extension"; 
					break; 
				default: 
					$msg_error = "Erreur ???"; 
					break; 
			}	
			return $msg_error;
		}
		//On vérifie que notre extension se trouve dans notre tableau $extensions_valides
		else if(!in_array($extension, $extensions_valides))
		{
			return  "Extension invalide : ( 'jpg' , 'jpeg' , 'gif' , 'png' )";
		}	
		//Notre extension est donc ok, on vérifie maintenant le poids de l'image
		else if ($poids > $maxsize)
		{
			return  "Fichier trop lourd (".$poids ."/".$maxsize."octets)";
		}
		
		
		$final_name=$upload.$new_name.".".$extension;
		$resultat = move_uploaded_file($file['tmp_name'],$final_name);
		if (!$resultat){
		
			return "Echec de l'upload";
		}	
	}
   
    


    // Status Functions

    function insertStatus($id ,$content){
		$bdd = connectBdd();
		$query = $bdd->prepare("INSERT INTO status (utilisateur_id,contenu)
						VALUES (:id,:contenu)");
		$query->execute( [ "id" => $id, "contenu"=>$content] );
		
	}

    function getStatus($id)
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM status WHERE utilisateur_id=:id ORDER BY date_creation DESC");
		$query->execute(["id"=>$id]);
		return $query->fetchAll();

	}
        
    function deleteStatus($id){
        $bdd = connectBdd();
        $query = $bdd ->prepare("DELETE FROM status WHERE status_id = :id");
        $query->execute(["id" => $id]);
        
        echo "Statut supprimé";
    }

     function insertImageStatus($upload_image,$id){
		$bdd = connectBdd();
		$query = $bdd->prepare("INSERT INTO status (utilisateur_id,image)
						VALUES (:id,:image)");
		$query->execute( [ "image"=>$upload_image, "id" => $id ] );
		
	}
    
    function ImageStatus($file, $new_name)
	{
		$extensions_valides = ['jpg' , 'jpeg' , 'gif' , 'png' ];
		
		$name = $file["name"];
		$poids = $file['size'];
		$code = $file['error'];
		$maxsize = 1048576;
		$upload = "upload/";
		

		//On récupère l'extension
		$name_exploded = explode(".",$name);
		$extension = strtolower(end($name_exploded));
		
		
		if($code > 0)
		{
			switch ($code) { 
				case UPLOAD_ERR_INI_SIZE: 
					$msg_error = "Fichier trop lourd selon php.ini"; 
					break; 
				case UPLOAD_ERR_FORM_SIZE: 
					$msg_error = "Fichier trop lourd selon MAX_FILE_SIZE"; 
					break; 
				case UPLOAD_ERR_PARTIAL: 
					$msg_error = "Upload partiel"; 
					break; 
				case UPLOAD_ERR_NO_FILE: 
					$msg_error = "Aucun fichier"; 
					break; 
				case UPLOAD_ERR_NO_TMP_DIR: 
					$msg_error = "Le dossier temporaire n'existe pas"; 
					break; 
				case UPLOAD_ERR_CANT_WRITE: 
					$msg_error = "Problème de permission"; 
					break; 
				case UPLOAD_ERR_EXTENSION: 
					$msg_error = "Erreur au niveau de l'extension"; 
					break; 
				default: 
					$msg_error = "Erreur ???"; 
					break; 
			}	
			return $msg_error;
		}
		//On vérifie que notre extension se trouve dans notre tableau $extensions_valides
		else if(!in_array($extension, $extensions_valides))
		{
			return  "Extension invalide : ( 'jpg' , 'jpeg' , 'gif' , 'png' )";
		}	
		//Notre extension est donc ok, on vérifie maintenant le poids de l'image
		else if ($poids > $maxsize)
		{
			return  "Fichier trop lourd (".$poids ."/".$maxsize."octets)";
		}
		
		
		$final_name=$upload.$new_name.".".$extension;
		$resultat = move_uploaded_file($file['tmp_name'],$final_name);
		if (!$resultat){
		
			return "Echec de l'upload";
		}	
        return $final_name;
	}
    

    // Galerie Functions

    function getGalerie()
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM galerie");
		$query->execute([]);
		return $query->fetchall();
	}
    
    function getGalerie2015()
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM galerie WHERE date_creation>'2015-01-01 00:00:01' ");
		$query->execute([]);
		return $query->fetchall();
	}
    
    function getGalerie2014()
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM galerie WHERE date_creation>'2014-01-01 00:00:01' AND date_creation<'2014-12-31 23:59:59'");
		$query->execute([]);
		return $query->fetchall();
	}

    function getGalerie2013()
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM galerie WHERE date_creation>'2013-01-01 00:00:01' AND date_creation<'2013-12-31 23:59:59' ");
		$query->execute([]);
		return $query->fetchall();
	}
    
    function uploadImageGal($file, $new_name)
	{
		$extensions_valides = ['jpg' , 'jpeg' , 'gif' , 'png' ];
		
		$name = $file["name"];
		$poids = $file['size'];
		$code = $file['error'];
		$maxsize = 1048576;
		$upload = "upload/";
		

		//On récupère l'extension
		$name_exploded = explode(".",$name);
		$extension = strtolower(end($name_exploded));
		
		
		if($code > 0)
		{
			switch ($code) { 
				case UPLOAD_ERR_INI_SIZE: 
					$msg_error = "Fichier trop lourd selon php.ini"; 
					break; 
				case UPLOAD_ERR_FORM_SIZE: 
					$msg_error = "Fichier trop lourd selon MAX_FILE_SIZE"; 
					break; 
				case UPLOAD_ERR_PARTIAL: 
					$msg_error = "Upload partiel"; 
					break; 
				case UPLOAD_ERR_NO_FILE: 
					$msg_error = "Aucun fichier"; 
					break; 
				case UPLOAD_ERR_NO_TMP_DIR: 
					$msg_error = "Le dossier temporaire n'existe pas"; 
					break; 
				case UPLOAD_ERR_CANT_WRITE: 
					$msg_error = "Problème de permission"; 
					break; 
				case UPLOAD_ERR_EXTENSION: 
					$msg_error = "Erreur au niveau de l'extension"; 
					break; 
				default: 
					$msg_error = "Erreur ???"; 
					break; 
			}	
			return $msg_error;
		}
		//On vérifie que notre extension se trouve dans notre tableau $extensions_valides
		else if(!in_array($extension, $extensions_valides))
		{
			return  "Extension invalide : ( 'jpg' , 'jpeg' , 'gif' , 'png' )";
		}	
		//Notre extension est donc ok, on vérifie maintenant le poids de l'image
		else if ($poids > $maxsize)
		{
			return  "Fichier trop lourd (".$poids ."/".$maxsize."octets)";
		}
		
		
		$final_name=$upload.$new_name.".".$extension;
		$resultat = move_uploaded_file($file['tmp_name'],$final_name);
		if (!$resultat){
		
			return "Echec de l'upload";
		}	

        $bdd = connectBdd();
        $query = $bdd ->prepare("INSERT INTO galerie (image) VALUES (:image) ");
        $query -> execute(["image" => $final_name,]);
        
        
		return "OK";
	}
    

    // News Functions
    
    function getNews()
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM news");
		$query->execute([]);
		return $query->fetchall();
	}

    function get4News()
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM news ORDER BY date_creation DESC LIMIT 4");
		$query->execute([]);
		return $query->fetchall();
	}

    function insertNew($titre,$contenu,$resume)
    {
        $bdd = connectBdd();
		$query =  $bdd ->prepare("INSERT INTO news (titre,resume,contenu) VALUES (:titre,:resume,:contenu)");
		$query->execute(["titre"=>$titre,"resume"=>$resume,"contenu"=>$contenu]);    
    
    }
    

    // Forum Functions
    
    function getCommentaires()
	{
		$bdd = connectBdd();
		$query =  $bdd ->prepare("SELECT * FROM forum ORDER BY date_creation DESC");
		$query->execute([]);
		return $query->fetchall();
	}

    function insertCommentaire($pseudo,$commentaire)
    {
        $bdd = connectBdd();
		$query =  $bdd ->prepare("INSERT INTO forum (pseudo,contenu) VALUES (:pseudo,:contenu)");
		$query->execute(["pseudo"=>$pseudo,"contenu"=>$commentaire]);    
    
    }

    function deleteCommentaire($id)
	{
		$bdd = connectBdd();
		$query = $bdd ->prepare("DELETE FROM forum WHERE commentaire_id = :id");
		$query->execute(["id" => $id]);
	}


            



?>