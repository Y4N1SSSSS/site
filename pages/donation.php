<?php
require_once '../php/Config.php';

try {
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
} catch (PDOException $e) {
echo $e->getMessage();
}

$requete = 'SELECT SUM(Valeur) AS total FROM donation';
$resultats = $pdo->query($requete);
$totalDons = $resultats->fetch(PDO::FETCH_ASSOC)['total'];

echo "<script>
var totalDons = $totalDons;
</script>";
?>

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
<?php include "../php/header.php"; ?>

<body>
<!-- SECTION DES DONS EN EUROS -->
<h1 class="titres">Don Monétaire</h1>
<div class="ligne-container"> <div class="ligne-arrondie"></div> </div>
<!-- Section en flexbox pour l'image et le texte -->
<div class="container flexd mt-5 mb-3">
    <img class="imagedon" src="../images/donsEUR.png">
    <span class="spanD"><span class="titredon">Soutenez Notre Patrimoine National</span><br><br>
        Cher(e) ami(e) de la culture, votre don contribue à la préservation de notre riche patrimoine français. Aidez-nous à protéger nos trésors historiques et culturels. Chaque € compte !</span>
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
    <a class="bouton NS mt-3" onclick="openDonationPopup()">Faire un don</a><a class="bouton NS mt-3">En savoir plus</a>
</div>

<script>
    var currentWidth = (totalDons / 10000) * 100;

    function updateProgressBar() {
        var elem = document.getElementById("myBar");
        elem.style.width = currentWidth + "%";
    }

    updateProgressBar();

    function openDonationPopup() {
        <?php if (isset($_SESSION["nom"])) : ?>
            var donationAmount = prompt("Combien souhaitez-vous donner en € ?");
            if (donationAmount !== null) {
                donate(donationAmount);
            }
        <?php else : ?>
            alert("Vous devez être connecté pour faire un don.");
        <?php endif; ?>
    }

    function donate(amount) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                alert("Don effectué avec succès !");
                location.reload();
            }
        };
        xhr.open("POST", "../php/donation.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("amount=" + amount);
    }
</script>

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
<a class="bouton NS" id="ouvrirPopup" onclick="toggleDonationForm()">Faire un don matériel</a>
<a class="bouton NS">En savoir plus</a>
</div>
</div>
<!-- Emplacement pour la nouvelle div avec le formulaire -->
<div id="dynamicFormContainer"></div>

<script>
var isDonationFormVisible = false;
var createdDiv = null;

// Fonction pour créer ou supprimer la div avec le formulaire
function toggleDonationForm() {
    if (isDonationFormVisible) {
        // Supprimer la classe "active" pour cacher le formulaire
        createdDiv.classList.remove("active");
        setTimeout(removeDonationForm, 500); // Attendre la fin de l'animation (500ms)
    } else {
        // Créer un nouvel élément div
        createdDiv = document.createElement("div");

        // Ajouter la classe "form-animation" pour l'animation
        createdDiv.classList.add("form-animation");

        // Définir le contenu HTML de la nouvelle div (le formulaire)
        createdDiv.innerHTML = `
            <div id="donationFormDiv">
                <div class="container">
                    <h2 class="titres">Faire un don matériel</h2>
                    <div class="ligne-container"> <div class="ligne-arrondie"></div> </div>
                    <!-- Formulaire pour le don matériel -->
                    <form id="formDonObjet" action="../php/donationobjet.php" method="post">
                        <label for="type_objet">Type d'objet :</label>
                        <select class="txtoption case" name="type_objet" required>
                            <option class="txtoption" value="outil">Outil</option>
                            <option class="txtoption" value="matierepremiere">Matière première</option>
                            <option class="txtoption" value="meuble">Meuble</option>
                        </select>
                        <br>
                        <br>
                        <label for="description">Description de l'objet :</label>
                        <textarea name="description" required></textarea>
                        <br>
                        <button class="bouton NS mb-3" type="submit">Faire don de le/les objet(s) </button>
                    </form>
                </div>
            </div>
        `;

        // Ajouter la nouvelle div à la page, juste après le bouton
        document.getElementById("dynamicFormContainer").appendChild(createdDiv);

        // Attendre un instant pour que l'élément soit ajouté au DOM, puis ajouter la classe "active"
        setTimeout(function () {
            createdDiv.classList.add("active");
        }, 0);
    }

    // Inverser l'état
    isDonationFormVisible = !isDonationFormVisible;
}

// Fonction pour supprimer la div
function removeDonationForm() {
    // Vérifier si la div existe et si oui, la supprimer
    if (createdDiv) {
        document.getElementById("dynamicFormContainer").removeChild(createdDiv);
        createdDiv = null;
    }
}

</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

<!-- Ajout du footer -->
<?php include "../php/footer.php"; ?>

</html>
