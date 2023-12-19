<?php require_once 'php/Config.php';
session_start(); 
try{
  $pdo = new PDO(
      "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="images/favicon_taille.ico" type="image/x-icon">
<script src="js/jquery-3.6.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<title>Accueil</title>
</head>

<nav class="navbar navbar-expand-lg couleurnav">
<div class="container">
  <a class="navbar-brand" href="index.php">
  <img src="images/perso.png" class="taillelogo" alt="Restaure Ton Patrimoine">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse text-center" id="navbarNav">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/participation.php">Participation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/donation.php">Donation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/planning.php">Planning</a>
      </li>   
      <?php if(isset($_SESSION["nom"])){
        echo(' 
        </ul>
          </div>
          <a class="ms-4 co">'
          .$_SESSION["nom"].'</a>
          <a class="ms-2 co" href="php/logout.php">
            <img width="32px" height="32px" class="rotationlogo" src="images/decov2.png" alt="deco">
          </a>
        ');}
      else{
        echo(' 
        <li class="nav-item">
          <a class="nav-link" href="php/Connexion.php">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="php/InscriptionForm.php">Inscription</a>
        </li>
      </ul>
    </div>
          ');
      }
      ?>
</div>
</nav>


<section id="carrousel">

<div class="owl-carousel owl-theme">
<div class="item imgcarrousel1">
  <div class="overlay-content">
    <h1 class="text-center textecarrousel">Restaure ton patrimoine</h1>
  </div>
</div>
<div class="item imgcarrousel2">
  <div class="overlay-content">
    <h1 class="text-center textecarrousel">Vous aussi faites partie de l'aventure</h1>
  </div>
</div>
<div class="item imgcarrousel3">
  <div class="overlay-content">
    <h1 class="text-center textecarrousel">Inscrivez-vous dès maintenant</h1>
  </div>
</div>
</div>

<script src="js/owl.carousel.min.js"></script>
<script src="js/carrousel.js"></script>

</section>



<section id="contenu">

<div>
<h2 class="titres">En quoi consiste l'événement ?</h1>
<div class="d-flex justify-content-center">
<div class="ligne-arrondie"></div>
</div>
</div>

<div class="mt-5 d-flex justify-content-center">
<img class="w-50" src="images/illustrationprojet.png"></img>
</div>

<div class="mt-5 container">
<div class="row d-flex justify-content-center">
  <div class="col-lg-6">
    <h4>
  Lorem ipsum dolor sit amet 
consectetur. Est ac aliquam vitae 
amet. Donec facilisi diam diam orci 
aliquam in neque volutpat quis. 
Gravida eleifend et id morbi. Tempus 
ac fames a vitae enim.
    </h4> 
  </div>
  <div class="col-lg-4 d-flex align-items-center justify-content-center">
  <a class="bouton">S'inscrire</a>
  </div>
</div>  
</div>

</section>

<section>

<div class="mt-5">
<h2 class="titres">Qui somme-nous ?</h1>
<div class="d-flex justify-content-center">
<div class="ligne-arrondie"></div>
</div>
</div>
<div class="mt-5 container">
<div class="row d-flex justify-content-center align-items-center">
  <div class="col-lg-5">
    <h4>
  Lorem ipsum dolor sit amet 
consectetur. Est ac aliquam vitae 
amet. Donec facilisi diam diam orci 
aliquam in neque volutpat quis. 
Gravida eleifend et id morbi. Tempus 
ac fames a vitae enim.
    </h4> 
  </div>
  <div class="col-lg-5">
  <img class="w-100" src="images/illustrationequipe.png"></img>
  </div>
</div>  
</div>

</section>

<div class="mt-5">
<h2 class="titres">Donnez-nous votre avis sur l'événement</h1>
<div class="d-flex justify-content-center">
<div class="ligne-arrondie"></div>
</div>
</div>

<article class="Blog mt-5">
<?php if (isset($_SESSION["nom"])) : ?>
  <form action="php/ajout.php" method="GET">
      <div class="container mt-5">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="form-group">
                      <label for="titre">Donnez un titre à votre commentaire</label>
                      <input class="form-control" type="text" name="titre" required="required">
                  </div>
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="form-group">
                      <label for="texte">Écrivez votre texte juste ici</label>
                      <input class="form-control grande-zone-texte" type="text" name="texte" required="required">
                  </div>
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-md-8 mt-2 d-flex justify-content-center">
                  <button type="submit" class="bouton">Commenter</button>
              </div>
          </div>
      </div>
  </form>
  <form action="php/suppr.php" method="GET">
        <select name="ID_article" required="required"> 
        <?php
            foreach($article as $commentaire):
        ?>
            <option value="<?php echo $commentaire["ID_article"];?>"> <?php echo $commentaire["Titre"];?> </option>
        <?php
            endforeach;
        ?>
            
        </select><br/><br/>
     
        <input type="submit" value="Supprimer"/>
    </form>
<?php else : ?>
  <div class="container mt-2">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <h4 class="text-center texteitalic">Vous avez besoin d'être connecté si vous voulez poster un commentaire</h2>
          </div>
      </div>
  </div>

  <?php endif; ?>

  <section class="mt-5" id="commentaire">

  <?php
  $requete='SELECT * FROM article ORDER BY ID_article DESC LIMIT 6';
  $resultats=$pdo->query($requete);
  $article=$resultats->fetchAll(PDO::FETCH_ASSOC);
  $resultats->closeCursor();
  ?>

<div class="container mt-5">
    <div class="row">
        <?php foreach ($article as $commentaire): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title policecarte"><?php echo $commentaire["Titre"]; ?></h5>
                        <p class="card-text policecartesimple"><?php echo $commentaire["Contenue"]; ?></p>
                        <p class="card-text policecartesimple"><small class="text-muted">Rédigé le <?php echo $commentaire["Date_article"]; ?></small></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<div class="container">
  <div class="row">
      <?php foreach($article as $commentaire): ?>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                    <h5 class="card-title policecarte"><?php echo $commentaire["Titre"]; ?></h5>
                    <p class="card-text policecartesimple"><?php echo $commentaire["Contenue"]; ?></p>
                    <p class="card-text policecartesimple"><small class="text-muted">Rédigé le <?php echo $commentaire["Date_article"]; ?> </small></p>
                  </div>
              </div>
          </div>
      <?php endforeach; ?>
  </div>
</div>

  <div class="mt-5 d-flex justify-content-center">
  <a class="bouton mb-5" href="pages/blog.php"> Voir tous les commentaires </a>
  </div>
</article>
</section>