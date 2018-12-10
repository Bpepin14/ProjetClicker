<?php 

include 'connect.php';

//Si le formulaire existe alors.. On definis les variables pour faciliter l'écriture
if(isset($_POST['forminscription'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

    //Alors on vérifie que ces variables ne sont pas vides
    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {

        $pseudolenght = strlen($pseudo);
        if($pseudolenght <= 255) {
            if($mail == $mail2) {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $reqmail = $bdd->prepare('SELECT * FROM membres WHERE mail = ?');
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0) {
                        if($mdp == $mdp2) {
                            
                          

                            $longueurKey = 15;
                            $key = "";

                          for($i = 1; $i < $longueurKey; $i++)
                          {
                              $key .= mt_rand(0,9);
                          }
                        //Si tout se passe bien on insère les données dans la bdd
                          $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse, confirmkey) VALUES (?, ?, ?, ?)");
                          $insertmbr->execute(array($pseudo, $mail, $mdp, $key));

                          
                          
                         

                        //   $header="MIME-Version: 1.0\r\n";
                        //   $header.='From:"Ody.com"<support@odyoz.com>'."\n";
                        //   $header.='Content-Type:text/html; charset="utf-8"'."\n";
                        //   $header.='Content-Transfer-Encoding: 8bit';
  
                        //   $message='
                        //   <html>
                        //           <body>
                        //             <p>Bonjour et merci d\'avoir crée un compte sur notre forum.</p>
                        //             <p>Vous trouverez ci-dessous un lien vous permettant de valider votre compte !</p>
                        //                   <div align="center">
                        //                          <a href="http://localhost/blogphp/confirmation.php?pseudo=' .urlencode($pseudo). '&key=' .$key.'">Confirmez votre compte !</a>
                        //                   </div>
                        //                   <p>En vous souhaitant une agréable fin de journée</p>
                        //                   <p>L\'équipe Ody.com.</p>
                        //           </body>
                        //   </html>
                        //   '; 
  
                        //   mail("fakechailleux@gmail.com", "Confirmation de compte ", $message, $header); 
  
                   
                        $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>"; 

                        } else {
                            $erreur = "Vos mots de passe ne correspondent pas";
                        }
                    } else {
                        $erreur = "Adresse mail déja utilisée";
                    }
                } else {
                    $erreur = "Votre adresse mail n'est pas valide";
                }
            } else {
                $erreur = "Vos adresse mail ne correspondent pas";
            }
        } else {
            $erreur = "Votre pseudo ne dois pas dépasser 255 caractères";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}

?>