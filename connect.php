<?php 
    //Si le formulaire de connexion existe
    if(isset($_POST['formconnexion'])) {
        $mailconnect = htmlspecialchars($_POST['mailconnect']);
        $mdpconnect = sha1($_POST['mdpconnect']);
          //On vérifie si il n'est pas vide
        if(!empty($mailconnect) AND !empty($mdpconnect)) {
            $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
            $requser->execute(array($mailconnect, $mdpconnect));
            $userexist = $requser->rowCount();
            if($userexist == 1) {
                $userinfo = $requser->fetch();
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['pseudo'] = $userinfo['pseudo'];
                $_SESSION['mail'] = $userinfo['mail'];
                $_SESSION['admin'] = $userinfo['admin'];
                
                 header('Location: profil.php?id='.$_SESSION['id']);
            } else {
                $erreur = "Mauvais mail ou mot de passe !";
            }
        } else {
            $erreur = "Tous les champs doivent etre complétés !";
        }

    }
  

    
    //On vérifie si le nom de compte et les mdp correspondent bien





?>