<?php
require_once 'Config.php';
require "headerconnexion.php";
session_start();
error_reporting(0);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Inscription</title>
</head>
<body>
<article>
  <!-- SECTION DES DONS EN EUROS -->
  <h1 class="titres">INSCRIPTION</h1>
    <div class="ligne-container"> <div class="ligne-arrondie"></div> </div>

    <div class="container mt-3">
    <?PHP echo $_SESSION['error']; ?>
        <form method="get" action="inscription.php" class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label> Pseudonyme : </label>
                    <input type="text" name="nom" placeholder="Entrez votre pseudonyme" required="required" class="form-control">
                </div>
            </div>
        <div class="col-md-12">
            <div class="form-group">
                <label> Mot de passe : </label>
                <input type="password" name="mdp" placeholder="Entrez votre mot de passe" required="required" class="form-control">
                <div class="ligne-container"><input type="submit" value="M'INSCRIRE" name="done" class="boutonform NS"></div>
            </div>
        </div>  
</form>
    </article>
    

    <!-- Ajout du footer -->
    <?php
        include "footer.php" ;
    ?>
</body>
</html>
