<?php 




if(isset($_POST['forminscription'])) {
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $datenaissance = htmlspecialchars($_POST['datenaissance']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);

   if(!empty($_POST['pseudo']) AND !empty($_POST['datenaissance']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
           
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) { 
         if($mail == $mail2) { 
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) { 
               $reqmail = $bdd->prepare('SELECT * FROM membres WHERE mail = ?');
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) { 
                  if($mdp == $mdp2) { 
                       
                       $longueurKey = 15;
                       $key = "";
                     
                    for($i=1; $i < $longueurKey; $i++) 
                     {
                             $key .= mt_rand(0,9);
                     } 
                     

                      $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, datenaissance, mail, motdepasse, confirmkey) VALUES(?, ?, ?, ?, ?)");
                      $insertmbr->execute(array($pseudo, $datenaissance, $mail, $mdp, $key));



                        $header="MIME-Version: 1.0\r\n";
                        $header.='From:"PrimFX.com"<support@primfx.com>'."\n";
                        $header.='Content-Type:text/html; charset="utf-8"'."\n";
                        $header.='Content-Transfer-Encoding: 8bit';

                        $message='
                        <html>
                                <body>
                                        <div align="center">
                                               <a href="http://localhost/tests/confirmation.php?pseudo=' .urlencode($pseudo). '&key=' .$key.'">Confirmez votre compte !</a>
                                        </div>
                                </body>
                        </html>
                        '; 

                        mail("fakechailleux@gmail.com", "Confirmation de compte ", $message, $header); 

                 
                      $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>"; 
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>