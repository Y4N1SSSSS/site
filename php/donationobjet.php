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

    // Récupérer l'ID de l'utilisateur en fonction du nom
    $username = $_SESSION["nom"];
    $queryUserID = $pdo->prepare("SELECT ID_user FROM utilisateur WHERE Nom_user = :username");
    $queryUserID->bindParam(":username", $username);
    $queryUserID->execute();
    $result = $queryUserID->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $userID = $result["ID_user"];

        try {
            // Démarrer la transaction
            $pdo->beginTransaction();

            // Insérer le don d'objet dans la table don_objet avec l'ID de l'utilisateur
            $typeObjet = $_POST["type_objet"];
            $description = $_POST["description"];
            $query = $pdo->prepare("INSERT INTO don_objet (ID_user, Type_objet, Description, Date) VALUES (:userID, :typeObjet, :description, CURRENT_DATE())");
            $query->bindParam(":userID", $userID);
            $query->bindParam(":typeObjet", $typeObjet);
            $query->bindParam(":description", $description);
            $query->execute();

            // Valider la transaction
            $pdo->commit();

            // Envoyer une réponse au client (facultatif)
            echo "Don d'objet effectué avec succès !";
        } catch (Exception $e) {
            // En cas d'erreur, annuler la transaction
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
