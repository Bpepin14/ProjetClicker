<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The clicker project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    
    <style>
   @import url(https://fonts.googleapis.com/css?family=Lobster);
body {
    background-color: #000;
    overflow: hidden;
}

@font-face { font-family: Heroes; src: url('fonts/Heroes_Legend.ttf'); } 

h1, h2, h3,h4{
  font-family: Heroes;
}
#myCanvas {
    background-color: #001530;
    display: block;
    margin: 0;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
}
p, h1, h4 {
  text-align:center;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>

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

<div>
<div class="row">
    <div class="col-2 text-center"> <br/>
      <img src="ImageGentils/punisher.png" alt="punisher"> 
      <img src="ImageGentils/marvel.png" alt="marvel">
      <img src="ImageGentils/deadpool.png" alt="deadpool">
    </div>
    <div class="col-8 main-content">
    <br/>
    <h1>Ready to take the challenge? </h1>
    <br/><br/>
    <h4>A new clicker is born..</h4>
    <img src="images/unlimited_progress.png" alt="Oui" class="center">
  <p>Cliquez pour infliger des degats, plus vous évoluez plus vous débloquerez des alliés de taille qui vont aiderons dans votre combat</p>
    <h4>Set off on a colourful adventure and overcome your enemies in exhilarating battles</h4>

    </div>
    
    <div class="col-md-2 text-center"> <br/>
      <img src="ImageMechants/Thanos.png" alt="Thanos"> 
      <img src="ImageMechants/Ultron.png" alt="Ultron">
      <img src="ImageMechants/Venom.png" alt="Venom">
    </div>
</div>
</div>

    <footer>
      Bienvenue
    </footer>
    <canvas id="myCanvas">
</canvas>
</body>
<script src="stars.js"></script>
</html>
