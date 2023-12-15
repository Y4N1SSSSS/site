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
    <?php
    include "../php/header.php" ;
    ?>
    <h1 class="titres">Don Monétaire</h1>
    <div class="ligne-arrondie"></div>
    <div class="flexd">
        <img class="imagedon" src="../images/donsEUR.png"> 
        <span><span class="titredon">Soutenez Notre Patrimoine National</span><br><br>
            Cher(e) ami(e) de la culture,
            Votre don contribue à la préservation de notre riche patrimoine français. Aidez-nous à protéger nos trésors historiques et culturels. Chaque euro compte.</span>
    </div>
    <div class="flexEUR">
        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
        <a class="bouton" onclick="move()">Faire un don</a><a class="bouton">En savoir plus</a>
    </div>
    <div class="back">
    <h1 class="titres">Don Matériel</h1>
    <div class="ligne-arrondie"></div>
    <div class="flex1">
        <span class="spanobj"><span class="titredon">Aidez-nous a Préserver Notre Culture</span><br><br>
        Chaque geste contribue à tisser la toile de notre passé, créant un lien tangible entre hier, aujourd'hui et demain. Rejoins-nous dans cette aventure de préservation, car la restauration de notre patrimoine commence avec toi.<br>
        <a href="#" class="bouton">Faire un don</a> <a href="#" class="bouton">En savoir plus</a></span>
        <img class="imagedon" src="../images/donsOBJ.png"> 
    </div>
    <script src="../js/scriptdon.js"></script>
</div>
    
</body>
</html>