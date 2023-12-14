<?php
require_once 'pages/Config.php';
require "pages/header.php";
?>
<article>
<?php
try{
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }

if ( isset($_GET['done'])){
$nom = $_GET['nom'];
$mdp = $_GET['mdp'];

    $verify_nom = $pdo->prepare("select Nom_user from utilisateur where Nom_user=? limit 1");
    $verify_nom->execute(array($nom));
    $user_nom = $verify_nom->fetchAll();
        if (count($user_nom) > 0){
            $erreur = "Le pseudonyme existe déjà!";
            echo $erreur;
        }
        else {
            $inscrire = $pdo->prepare("insert into utilisateur(Nom_user,Mdp_user) values(?,?)");
            if ($inscrire->execute(array($nom, $mdp))); } 
            
        $_SESSION['mdp'] = $mdp;
        $_SESSION['nom'] = $nom;
    }
?>

<p> Vous êtes désormais inscris ! </p>
<a href="Connexion.php"> VOUS CONNECTER </a>

</article>
</body>
</html>
