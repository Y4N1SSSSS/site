<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="js/jquery-3.6.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
          <a class="nav-link" href="pages/inscription.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/donation.php">Donation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/planning.php">Planning</a>
        </li>
      </ul>
    </div>
    <?php
    error_reporting(0);
      session_start();
      //affiche le nom de l'utilisateur quand sa seesion est ouverte
      echo $_SESSION['nom'];
    ?>
    <div>
      <a href="php/Connexion.php"> co </a> - 
      <a href="php/InscriptionForm.php"> Insc </a>

      <a href="php/logout.php">
        <img width="32px" height="32px" src="images/deco.png" alt="deco">
      </a>
    </div>
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
