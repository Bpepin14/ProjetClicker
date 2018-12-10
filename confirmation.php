<?php 
try
{
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

    if(isset($_GET['pseudo'], $_GET['key']) AND !empty($_GET['pseudo']) AND !empty($_GET['key']))
    {
    $pseudo = htmlspecialchars(urldecode($_GET['pseudo']));
    $key = htmlspecialchars($_GET['key']);

    $requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND confirmkey = ?");
    $requser->execute(array($pseudo, $key));
    $userexist = $requser->rowCount();

    if($userexist = 1) {
        $user = $requser->fetch();
        if($user['confirme'] == 0) {
            $updateuser = $bdd->prepare("UPDATE membres SET confirme = 1 WHERE pseudo = ? AND confirmkey = ?");
            $updateuser->execute(array($pseudo,$key));
            echo "Votre compte a bien été confirmé !";
        }
        else {
            echo "Votre compte a déja été confirmé !";
        }
    }
    else {
        echo "L'utilisateur n'existe pas";
    }


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="connexion.php">Me connecter</a>
</body>
</html>
