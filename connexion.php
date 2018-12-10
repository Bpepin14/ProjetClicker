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

include 'connect.php';




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

       .bg {
        background-color:#E8A151;  
        text-align:center;
       }
       
      </style>
   </head>
   <body>
   <header class="bg">
     
         <h2>Connexion</h2>
        </header>
         <br /><br />
         <div align="center">
         <form method="POST" action="">
                 <table>
                 <tr>
                  <td align="right">
                     <label for="pseudo">Adresse mail :</label>
                  </td>
                  <td>
                  <input type="email" class="form-control" id="mailconnect" name="mailconnect" placeholder="Votre mail">
                  </td>
               </tr> 
               <tr>
                  <td align="right">
                     <label for="pseudo">Mot de passe :</label>
                  </td>
                  <td>
                  <input type="password" class="form-control" id="mdpconnect" name="mdpconnect" placeholder="Votre mot de passe">

                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <button type="submit" class="btn btn-success" name="formconnexion">Connexion !</button>
                  </td>
               </tr>
            </table>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>