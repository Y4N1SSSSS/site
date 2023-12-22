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
        error_log("Erreur de connexion à la base de données : " . $e->getMessage());
        exit();
    }

    try {
        $nom = $_SESSION["nom"];
        $query = $pdo->prepare("SELECT ID_user FROM utilisateur WHERE Nom_user = :nom");
        $query->bindParam(":nom", $nom);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $userID = $result["ID_user"];

        $pdo->beginTransaction();

        $amount = (int)($_POST["amount"]);
        $queryInsertDon = $pdo->prepare("INSERT INTO donation(Valeur, Date_don, ID_user) VALUES (:amount, CURRENT_DATE(), :userID)");
        $queryInsertDon->bindParam(":amount", $amount, PDO::PARAM_INT);
        $queryInsertDon->bindParam(":userID", $userID, PDO::PARAM_INT);
        $queryInsertDon->execute();

        $donID = $pdo->lastInsertId();

        $queryInsertLink = $pdo->prepare("INSERT INTO link_donation(ID_user, ID_don) VALUES (:userID, :donID)");
        $queryInsertLink->bindParam(":userID", $userID, PDO::PARAM_INT);
        $queryInsertLink->bindParam(":donID", $donID, PDO::PARAM_INT);
        $queryInsertLink->execute();

        $pdo->commit();

        echo "Don effectué avec succès !";
    } catch (PDOException $e) {
        $pdo->rollBack();
        error_log("Erreur lors de la donation : " . $e->getMessage());
        echo "Erreur lors de la donation. Consultez les logs pour plus d'informations.";
    }
} else {
    echo "Erreur lors de la donation.";
}
?>
