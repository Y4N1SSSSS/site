<?php
session_start();

if (isset($_SESSION["nom"]) && isset($_POST["amount"])) {
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

    // Récupérer l'ID de l'utilisateur
    $nom = $_SESSION["nom"];
    $query = $pdo->prepare("SELECT ID_user FROM utilisateur WHERE Nom_user = :nom");
    $query->bindParam(":nom", $nom);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $userID = $result["ID_user"];

    try {
        // Démarrer la transaction
        $pdo->beginTransaction();

        // Insérer le don dans la table donation avec l'ID de l'utilisateur
        $amount = $_POST["amount"];
        $query = $pdo->prepare("INSERT INTO donation (ID_user, Valeur, Date_don) VALUES (:userID, :amount, CURRENT_DATE())");
        $query->bindParam(":userID", $userID);
        $query->bindParam(":amount", $amount);
        $query->execute();

        // Récupérer l'ID du don
        $donID = $pdo->lastInsertId();

        // Ajouter l'entrée dans la table link_donation
        $query = $pdo->prepare("INSERT INTO link_donation (ID_user, ID_don) VALUES (:userID, :donID)");
        $query->bindParam(":userID", $userID);
        $query->bindParam(":donID", $donID);
        $query->execute();

        // Valider la transaction
        $pdo->commit();

        // Envoyer une réponse au client (facultatif)
        echo "Don effectué avec succès !";
    } catch (Exception $e) {
        // En cas d'erreur, annuler la transaction
        $pdo->rollBack();
        echo "Erreur lors de la donation : " . $e->getMessage();
    }
} else {
    echo "Erreur lors de la donation.";
}
?>
