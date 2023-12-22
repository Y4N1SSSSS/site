<?php

require_once 'Config.php';
require 'header.php';

class UserRegistration
{
    private $pdo;

    public function __construct()
    {
        global $host, $dbname, $user, $password;  

        try {
            $this->pdo = new PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8",
                $user,
                $password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]  
            );
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    public function registerUser($nom, $mdp)
    {
        $hash_mdp = password_hash($mdp, PASSWORD_DEFAULT);

        $requete = 'SELECT * FROM utilisateur WHERE IS_Admin = 1';
        $resultats = $this->pdo->query($requete);
        $article = $resultats->fetchAll(PDO::FETCH_ASSOC);

        foreach ($article as $accadmin) {
            if ($accadmin["Nom_user"] == $_SESSION['nom']) {
                $_SESSION['admin'] = 1;
            } else {
                $_SESSION['admin'] = 0;
            }
        }

        $resultats->closeCursor();

        $verify_nom = $this->pdo->prepare("SELECT Nom_user FROM utilisateur WHERE Nom_user=? LIMIT 1");
        $verify_nom->execute(array($nom));
        $user_nom = $verify_nom->fetchAll();

        if (count($user_nom) > 0) {
            $_SESSION['error'] = "<style> .erreur{ color: #d9071c; } </style> <span class='erreur'> *Ce nom d'utilisateur est déjà pris. Veuillez en choisir un autre</span>";
            header('Location: InscriptionForm.php');
            
        } else {
            $inscrire = $this->pdo->prepare("INSERT INTO utilisateur(Nom_user, Mdp_user) VALUES (?, ?)");

            if ($inscrire->execute(array($nom, $hash_mdp))) {
                $_SESSION['mdp'] = $mdp;
                $_SESSION['nom'] = $nom;
                header('Location: ../index.php');
            }
        }
    }
}

// Usage
if (isset($_GET['done'])) {
    $nom = $_GET['nom'];
    $mdp = $_GET['mdp'];

    $userRegistration = new UserRegistration();
    $userRegistration->registerUser($nom, $mdp);
}

?>
</article>
</body>
</html>
