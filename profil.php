<?php
session_start();

include "inscripform.php";



try
{
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}




if(isset($_GET['id']) AND $_GET['id'] > 0 OR !empty($_SESSION['id'])) 
{
   $getid = (isset($_GET['id'])) ? intval($_GET['id']) : intval($_SESSION['id']);  
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
  

   
}

    function getAge($age) {
    
    $date1=date_create($age);
    $date2=date_create("now");
    $diff=date_diff($date1,$date2);
    echo $diff->format("%Y ans");
    }
    

function souhaitAnniv($date) {

$tab = explode("-",$date);
$annee = $tab[0];
$mois = $tab[1];
$jour = $tab[2];

if(date("d") == $jour)
{
 return "Joyeux anniversaire";
}
else
{
 
}
    
}
  


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
        text-align:center;
       } 
       
      </style>
   </head>
   <body>
    <header class="bg">
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
    </header>
         <div align="center">
         <br /><br />
         <br/> 
         <?php 
         if(!empty($userinfo['avatar']))
         {
         ?>
         <img src="membres/avatars/<?php echo $userinfo['avatar']; ?>" width="150" /> <br/> <br/> 
         <?php } ?>
         Votre pseudo :<?php echo $userinfo['pseudo']; ?>
         <br />
         Votre adresse mail : <?php echo $userinfo['mail']; ?>
         <br />
         Votre age : <?php echo getAge($userinfo["datenaissance"]); ?> 
         <br/>
         <?php echo souhaitAnniv($userinfo["datenaissance"]);?>
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br /><br/>
         <button type="submit" class="btn btn-info" name="editbutton"><a href="index.php" style="color:white">Revenir a l'accueil</a></button>
         <button type="submit" class="btn btn-info" name="editbutton"><a href="editionprofil.php" style="color:white">Editer mon profil</a></button>
         <button type="submit" class="btn btn-danger" name="editbutton"><a href="deconnexion.php" style="color:white">Se déconnecter</a></button>
         <?php
         }
         ?>
      </div>
   </body>
</html>
