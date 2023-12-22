<?php

require_once '../php/Config.php';

class InscriptionHandler
{
    private $pdo;

    public function __construct()
    {
        global $host, $dbname, $user, $password;

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    public function handleInscription()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = htmlspecialchars($_POST["nom"]);
            $prenom = htmlspecialchars($_POST["prenom"]);
            $email = htmlspecialchars($_POST["email"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $postal = htmlspecialchars($_POST["postal"]);

            try {
                $requete = $this->pdo->prepare('INSERT INTO participant (Nom_participant, Prenom_participant, email_participant, num_participant, CP_participant) VALUES (:nom, :prenom, :email, :phone, :postal)');

                $requete->bindParam(':nom', $nom);
                $requete->bindParam(':prenom', $prenom);
                $requete->bindParam(':email', $email);
                $requete->bindParam(':phone', $phone);
                $requete->bindParam(':postal', $postal);

                $requete->execute();

                $this->afficherRemerciement($prenom);
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        } else {
            header("Location: erreur.php");
            exit();
        }
    }

    private function afficherRemerciement($prenom)
    {
        echo "<!DOCTYPE html>
            <html lang='fr'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link href='../css/bootstrap.min.css' rel='stylesheet'>
                <link href='../css/stylepages.css' rel='stylesheet'>
                <title>Remerciement</title>
            </head>
            <body>
                <h1 class='titresR'>Merci $prenom, pour votre inscription!</h1>
                <div class='ligne-container'><div class='ligne-arrondieXXL'></div></div>
                <span class='ligne-container'>Nous avons bien reçu vos informations. Merci de votre participation.</span>
                <div class='ligne-container'><a class='boutonresult NS' href='listeParticipant.php'>Liste de tous les participants</a></div>
                <div class='ligne-container'><a class='boutonresult NS' href='../index.php'>Retour à l'Accueil</a></div>
            </body>
            </html>";
    }
}

$inscriptionHandler = new InscriptionHandler();
$inscriptionHandler->handleInscription();

?>
