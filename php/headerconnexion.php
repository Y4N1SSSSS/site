<?php
    error_reporting(0);
      session_start();
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="../images/favicon_taille.ico" type="image/x-icon">
  <script src="../js/jquery-3.6.4.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styleconnexion.css">
</head>
<body>

<nav class="navbar navbar-expand-lg couleurnav">
  <div class="container">
    <a class="navbar-brand" href="../index.php">
    <img src="../images/perso.png" class="taillelogo" alt="Restaure Ton Patrimoine">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarNav">
      <ul class="navbar-nav ms-auto ">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/participation.php">Participation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/donation.php">Donation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/planning.php">Planning</a>
        </li>
        <?php 
        if(isset($_SESSION["nom"])){
                if( $_SESSION['admin'] == 1){
                  echo(' </ul>
                  </div>
                <a href="pages/Admin.php" class="ms-4 co"> Administration </a>
                <a class="ms-4 co texteitalic">'
                .$_SESSION["nom"].'</a>
                <a class="ms-2 co" href="php/logout.php">
                  <img width="32px" height="32px" class="rotationlogo" src="../images/decov2.png" alt="deco">
                </a>
              ');
                }
          else{
            echo(' </ul>
            </div>
            <a class="ms-4 co texteitalic">'
            .$_SESSION["nom"].'</a>
            <a class="ms-2 co" href="php/logout.php">
              <img width="32px" height="32px" class="rotationlogo" src="../images/decov2.png" alt="deco">
            </a>
          ');
            }
        }
        else{
          echo(' 
          <li class="nav-item">
            <a class="nav-link" href="../php/Connexion.php">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../php/InscriptionForm.php">Inscription</a>
          </li>
        </ul>
      </div>
            ');
        }
        ?>
  </div>
</nav>
