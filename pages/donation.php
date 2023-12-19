<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='../css/stylepages.css' rel='stylesheet'>
    <title>Donations</title>
</head>
    <!-- Ajout du header -->
    <?php
        include "../php/header.php" ;
    ?>
<body>
    <!-- SECTION DES DONS EN EUROS -->
    <h1 class="titres">Don Monétaire</h1>
    <div class="ligne-container"> <div class="ligne-arrondie"></div> </div>
    <!-- Section en flexbox pour l'image et le texte -->
    <div class="container flexd mt-5 mb-3">
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
        <div class="progress-container mt-3">
            <div class="progress-bar" id="myBar"></div>
        </div>
        </div>
        <!-- BOUTON POUR LES DONS ET INFORMATIONS -->
        <a class="bouton NS mt-3" onclick="move()">Faire un don</a><a class="bouton NS mt-3">En savoir plus</a>
    </div>
    <div class="back">
        <!-- DECTION DES DONS DE MATÉRIEL -->
    <h1 class="titres">Don Matériel</h1>
    <div class="ligne-container"> <div class="ligne-arrondie"></div> </div>
    <!-- Section en flexbox pour l'image et le texte -->
    <div class="mt-5 container flex1">
        <span class="spanobj"><span class="titredon">Aidez-nous a Préserver Notre Culture</span><br><br>
        Chaque geste contribue à tisser la toile de notre passé, créant un lien tangible entre hier, aujourd'hui et demain. Rejoins-nous dans cette aventure de préservation, car la restauration de notre patrimoine commence avec toi.<br></span>
        <img class="imagedonOBJ" src="../images/donsOBJ.png"> 
        </div>
        <!-- BOUTON POUR LES DONS ET INFORMATIONS -->
        <div class="mt-5 d-flex justify-content-center mb-5">
        <a class="bouton NS">Faire un don</a> <a class="bouton NS">En savoir plus</a>
    </div>
    <!-- Javascript -->
    <script src="../js/scriptdon.js"></script>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
</body>

    <!-- Ajout du footer -->
    <?php
        include "../php/footer.php" ;
    ?>

</html>