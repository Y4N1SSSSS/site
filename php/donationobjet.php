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
session_start();

if (isset($_SESSION["nom"]) && isset($_POST["type_objet"]) && isset($_POST["description"])) {
    $host = 'localhost';
    $dbname = 'blassac_patrimoine';
    $user = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }

    $username = $_SESSION["nom"];
    $queryUserID = $pdo->prepare("SELECT ID_user FROM utilisateur WHERE Nom_user = :username");
    $queryUserID->bindParam(":username", $username);
    $queryUserID->execute();
    $result = $queryUserID->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $userID = $result["ID_user"];

        try {
            $pdo->beginTransaction();

            $typeObjet = $_POST["type_objet"];
            $description = $_POST["description"];
            $query = $pdo->prepare("INSERT INTO don_objet (ID_user, Type_objet, Description, Date) VALUES (:userID, :typeObjet, :description, CURRENT_DATE())");
            $query->bindParam(":userID", $userID);
            $query->bindParam(":typeObjet", $typeObjet);
            $query->bindParam(":description", $description);
            $query->execute();

            $pdo->commit();

            echo "<div class='center-content'>";
            echo "<h1 class='titresR'>Merci pour votre don!</h1>";
            echo "<div class='ligne-container'><div class='ligne-arrondieXXL'></div></div>";
            echo "<div class='ligne-container'><h6 class='ligne-container'>Vous avez donné un/une :&nbsp;$typeObjet</h6></div>";
            echo "<div class='ligne-container'><h6 class='ligne-container'><i>$description<i></h6></div><br>";
            echo "</div>";            
            echo "<div class='ligne-container'><a class='boutonresult NS' href='../index.php'>Accueil</a></div>";
        } catch (Exception $e) {
            $pdo->rollBack();
            echo "Erreur lors du don d'objet : " . $e->getMessage();
        }
    } else {
        echo "Utilisateur non trouvé.";
    }
} else {
    echo "Erreur lors du don d'objet. Vérifiez les paramètres du formulaire.";
}
?>

</body>
</html>
