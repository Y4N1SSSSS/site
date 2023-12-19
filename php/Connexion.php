<?php
require_once 'Config.php';
require "headerconnexion.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Connexion</title>
</head>
<article>
  <!-- SECTION DES DONS EN EUROS -->
  <h1 class="titres">CONNEXION</h1>
    <div class="ligne-container"> <div class="ligne-arrondie"></div> </div>
    <div class="container mt-3">
<form method="get" action="" class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label> Pseudonyme : </label>
            <input type="text" name="nom" placeholder="Entrez votre pseudonyme" required="required" class="form-control">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
          <label> Mot de passe : </label>
            <input type="password" name="mdp" placeholder="Entrez votre mot de passe" required="required" class="form-control">
            <div class="ligne-container"><input type="submit" value="CONNEXION" name="done" class="boutonform NS"></div>
          </div>
        </div>  
</form>
</div>

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
</article>
<?php
        include "footer.php" ;
      ?>
</body>
</html>