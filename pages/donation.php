<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='../css/styledonations.css' rel='stylesheet'>
    <title>Donations</title>
</head>
<body>
    <!-- Ajout du header -->
    <?php
    include "../php/header.php" ;
    ?>
    <!-- SECTION DES DONS EN EUROS -->
    <h1 class="titres">Don Monétaire</h1>
    <div class="ligne-arrondie"></div>
    <!-- Section en flexbox pour l'image et le texte -->
    <div class="flexd">
        <img class="imagedon" src="../images/donsEUR.png"> 
        <span class="spanD"><span class="titredon">Soutenez Notre Patrimoine National</span><br><br>
            Cher(e) ami(e) de la culture,
            Votre don contribue à la préservation de notre riche patrimoine français. Aidez-nous à protéger nos trésors historiques et culturels. Chaque euro compte.</span>
    </div>
    <!-- Section en flexbox pour la barre de progression et les boutons -->
    <div class="flexEUR">
        <div class="txtclasse">
        <span class="progress-text">Progression  de  l'objectif  de  donation : </span>
        <!-- Barre de progression qui fonctionne avec le Javascript -->
        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
        </div>
        <!-- BOUTON POUR LES DONS ET INFORMATIONS -->
        <a class="bouton NS" onclick="move()">Faire un don</a><a class="bouton NS">En savoir plus</a>
    </div>
    <div class="back">
        <!-- DECTION DES DONS DE MATÉRIEL -->
    <h1 class="titres">Don Matériel</h1>
    <div class="ligne-arrondie"></div>
    <!-- Section en flexbox pour l'image et le texte -->
    <div class="flex1">
        <span class="spanobj"><span class="titredon">Aidez-nous a Préserver Notre Culture</span><br><br>
        Chaque geste contribue à tisser la toile de notre passé, créant un lien tangible entre hier, aujourd'hui et demain. Rejoins-nous dans cette aventure de préservation, car la restauration de notre patrimoine commence avec toi.<br>
        <!-- BOUTON POUR LES DONS ET INFORMATIONS -->
        <a class="bouton NS">Faire un don</a> <a class="bouton NS">En savoir plus</a></span>
        <img class="imagedonOBJ" src="../images/donsOBJ.png"> 
    </div>
    <!-- Javascript -->
    <script src="../js/scriptdon.js"></script>
</div>
    
</body>
</html>