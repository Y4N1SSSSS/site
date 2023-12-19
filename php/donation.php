<?php
session_start();

if (isset($_SESSION["nom"]) && isset($_POST["amount"])) {

    $host = 'localhost';
    $dbname = 'blassac_patrimoine';
    $user = 'root';
    $password = '';


    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }

    // Récupérer l'ID de l'utilisateur
    $nom = $_SESSION["nom"];
    $query = $pdo->prepare("SELECT ID_user FROM utilisateur WHERE Nom_user = :nom");
    $query->bindParam(":nom", $nom);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $userID = $result["ID_user"];

    // Insérer le don dans la table donation
    $amount = $_POST["amount"];
    $query = $pdo->prepare("INSERT INTO donation (Valeur, Date_don) VALUES (:amount, CURRENT_DATE())");
    $query->bindParam(":amount", $amount);
    $query->execute();

    // Récupérer l'ID du don
    $donID = $pdo->lastInsertId();

    // Ajouter l'entrée dans la table link_donation
    $query = $pdo->prepare("INSERT INTO link_donation (ID_user, ID_don) VALUES (:userID, :donID)");
    $query->bindParam(":userID", $userID);
    $query->bindParam(":donID", $donID);
    $query->execute();

    // Envoyer une réponse au client (facultatif)
    echo "Don effectué avec succès !";
} else {
    echo "Erreur lors de la donation.";
}
?>
