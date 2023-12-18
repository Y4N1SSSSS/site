<?php require_once 'php/Config.php';
  session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <img src="logopasencorela.png" alt="Restaure Ton Patrimoine">
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
          <a class="nav-link" href="pages/inscription.php">Rejoignez-nous</a>
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
          ');
        } 
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
  <div class="row">
    <div class="col-lg-6">
    Lorem ipsum dolor sit amet 
  consectetur. Est ac aliquam vitae 
  amet. Donec facilisi diam diam orci 
  aliquam in neque volutpat quis. 
  Gravida eleifend et id morbi. Tempus 
  ac fames a vitae enim.
    </div>
    <div class="col-lg-6 d-flex align-center">
    <button class="bouton-inscrire">S'inscrire</button>
    </div>
  </div>  
</div>

</section>
<article>
<form action="php/ajout.php" method="GET">
        <div> <label for="titre"> Titre : </label> <input class="border" type="text" name="titre" required="required"> </div>
        <div> <label for="texte"> texte : </label> <input class="border" type="text" name="texte" required="required"> </div>
        <input type="submit" value="Ajouter l'article"/>
    </form>
</article>
