<?php
require_once 'Config.php';
require "headerconnexion.php";
?>

<article>
<form method="get" action="">
            <p> Pseudonyme : </p>
            <input type="text" name="nom" placeholder="Pseudonyme" required="required">
            <p> Mot de passe : </p>
            <input type="password" name="mdp" placeholder="Mot de passe" required="required">
            <br><br>
            <input type="submit" name="done" placeholder="Confirmer">
        </form>

<?php 
session_start();
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user , $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
  die("La connexion a échoué: " . $e->getMessage());
}
if ( isset($_GET['done'])){
  $mdp = $_GET['mdp'];
  $nom = $_GET['nom'];
  $_SESSION['nom'] = $nom;
  $_SESSION['mdp'] = $mdp;
  
$requete='SELECT * FROM utilisateur WHERE IS_Admin = 1';
$resultats=$pdo->query($requete);
$article=$resultats->fetchAll(PDO::FETCH_ASSOC);
foreach ($article as $accadmin):
  if( $accadmin["Nom_user"] == $_SESSION['nom']){
    $_SESSION['admin'] = 1;
  }
  else{
    $_SESSION['admin'] = 0;
  }
endforeach;
$resultats->closeCursor();
}
$sql = "SELECT * FROM utilisateur WHERE Nom_user=? AND Mdp_user=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nom, $mdp]);

  if ($stmt->rowCount() == 1) {
    header('Location: ../index.php');
  } else {
    echo (' ');
  }
?>
