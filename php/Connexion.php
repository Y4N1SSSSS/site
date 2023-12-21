<?php
session_start();
require_once 'Config.php';

if (isset($_GET['done'])) {
  $nom = $_GET['nom'];
  $mdp = $_GET['mdp'];

  try {
      $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      die("La connexion a échoué: " . $e->getMessage());
  }

  $sql = "SELECT * FROM utilisateur WHERE Nom_user=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nom]);

  if ($stmt->rowCount() == 1) {
      $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

      // Utiliser password_verify pour vérifier le mot de passe
      if (password_verify($mdp, $utilisateur['Mdp_user'])) {
          $_SESSION['nom'] = $nom;
          $_SESSION['mdp'] = $mdp;

          $requete = 'SELECT * FROM utilisateur WHERE Nom_user = :nom';
        $statement = $pdo->prepare($requete);
        $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
        $statement->execute();

        $utilisateur = $statement->fetchAll(PDO::FETCH_ASSOC);  

        foreach ($utilisateur as $accadmin):
          if( $accadmin["IS_Admin"] == 1){
            $_SESSION['admin'] = 1;
          }
          else{
           $_SESSION['admin'] = 0;
          }
        endforeach;
        $statement->closeCursor();

          header('Location: ../index.php');
          exit();
      } 
      else {
        $loginfaux = true;
      }
  } else {
      $loginfaux = true;
  }
}

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
  <?php
  if($loginfaux){
    echo "<style> .erreur{ color: #d9071c; } </style>";
    echo "<span class='erreur'> *Vous avez sélectionné le mauvais login ou mot de passe. Veuillez réessayer </span>";
  }
  ?>
    
    
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
        include "footer.php" ;
      ?>
</body>
</html>