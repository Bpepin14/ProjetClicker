<?php
session_start();

try
{
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

include 'editprofil.php';
include 'inscripform.php';
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
    <link href="css/bootstrap.css" rel="stylesheet">
      <style type="text/css">
       body {
        background-color:white;
       } 
       .bg{
        background-color:#E8A151;  
       }
      
  
       
      </style>
   </head>
   <body>
   <header class="bg">
      <div align="center">
         <h2>Edition du profil de <?php echo $user['pseudo']; ?> </h2>
</header> <br/>
         <div align="center">
            <form method="POST" action="" enctype="multipart/form-data">
            <table>
               <tr>
                  <td align="right">
                     <label for="pseudo">Pseudo :</label>
                  </td>
                  <td>
                     <input type="text" class="form-control" id="pseudo" name="newpseudo" placeholder="Votre pseudo" onfocus="this.value='';" value="<?php echo $user['pseudo']; ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" class="form-control" id="mdp" name="newmdp1" placeholder="Votre mot de passe">
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2">Confirmation du mot de passe :</label>
                  </td>
                  <td>
                  <input type="password" class="form-control" id="mdp2" name="newmdp2" placeholder="Votre mot de passe">
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="file">Avatar :</label>
                  </td>
                  <td>
                  <input type="file" class="file-upload btn btn-primary" id="avatar" name="avatar" placeholder="Insérer un fichier">
                  </td>
               </tr>
               <td align="right" colspan="2">
               <button type="submit" class="btn btn-info" name="profil">Mettre a jour mon profil !</button>
               </td>
        </table>        
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
      </div>
   </body>
</html>
