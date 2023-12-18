<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='../css/bootstrap.min.css' rel='stylesheet'>
    <link href='../css/stylepages.css' rel='stylesheet'>
    <title>Remerciement</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $postal = htmlspecialchars($_POST["postal"]);

    // Afficher le message de remerciement avec le prénom
    echo "<h1 class='titresR'>Merci $prenom, pour votre inscription!</h1><div class='ligne-container'><div class='ligne-arrondieXXL'></div></div>";
    echo "<span class='ligne-container'>Nous avons bien reçu vos informations. Merci de votre participation.</span>";
    echo "<div class='ligne-container'><a class='boutonresult NS' href='../index.php'>Retour à l'Accueil</a></div>";
} else {
    // Rediriger vers une page d'erreur si la méthode n'est pas POST
    header("Location: erreur.php");
    exit();
}
?>

</body>
</html>
