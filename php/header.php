<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="../js/jquery-3.6.4.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg couleurnav">
  <div class="container">
    <a class="navbar-brand" href="../index.html">
    <img src="logopasencorela.png" alt="Restaure Ton Patrimoine">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/inscription.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/donation.php">Donation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/planning.php">Planning</a>
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
      <a href="Connexion.php"> co </a> - 
      <a href="InscriptionForm.php"> Insc </a>
      <a href="logout.php">
        <img width="32px" height="32px" src="../images/deco.png" alt="deco">
      </a>
    </div>
  </div>
</nav>
