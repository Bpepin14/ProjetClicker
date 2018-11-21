<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

include 'inscripform.php';


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">The Clicker Project</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Acceuil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="game.php">Le jeu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">A propos</a>
      </li>
    </ul>
  </div>
</nav> 

   <header class="bg">
            <div align="center"></div>
         <h2>Inscription</h2>
   </header>
           </div>
         <br /><br />
         <div align="center">  
         <form method="POST" action="">
            <table>
               <tr>
                  <td align="right">
                     <label for="pseudo">Pseudo :</label>
                  </td>
                  <td>
                     <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="date">Date de naissance :</label>
                  </td>
                  <td>
                     <input type="date" class="form-control" id="datenaissance" name="datenaissance"  value="<?php if(isset($datenaissance)) { echo $datenaissance; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail">Mail :</label>
                  </td>
                  <td>
                     <input type="email" class="form-control" id="mail" name="mail" placeholder="Votre mail" value="<?php if(isset($mail)) { echo $mail; } ?>">

                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail2">Confirmation du mail :</label>
                  </td>
                  <td>
                     <input type="email" class="form-control" id="mail2" name="mail2" placeholder="Confirmez votre mail" value="<?php if(isset($mail2)) { echo $mail2; } ?>">
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Votre mot de passe">
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2">Confirmation du mot de passe :</label>
                  </td>
                  <td>
                  <input type="password" class="form-control" id="mdp2" name="mdp2" placeholder="Votre mot de passe">
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <button type="submit" class="btn btn-success" name="forminscription">Inscrivez-vous !</button>
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <button type="submit" class="btn btn-info" name="forminscription"> <a href=\tests/connexion.php>Déja inscrit ? Connectez vous</a></button>
                  </td>
               </tr>
            </table>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="black">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>