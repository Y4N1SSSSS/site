<?php require_once '../php/Config.php';
include '../php/header.php';
  session_start(); 
  try{
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="js/jquery-3.6.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<title>Blog</title>

<article class="Blog mt-5">
  <?php
    $requete='SELECT * FROM article ORDER BY ID_article DESC';
    $resultats=$pdo->query($requete);
    $article=$resultats->fetchAll(PDO::FETCH_ASSOC);
    $resultats->closeCursor();
  ?>
  <div class="mt-5">
  <h2 class="titres">Retrouvez-ici tous les commentaires déposés par les utilisateurs</h2>
  <div class="d-flex justify-content-center">
  <div class="ligne-arrondie"></div>
  </div>
  </div>
  <section class="row mt-5">
    <?php foreach ($article as $commentaire): ?>
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title policecarte"><?php echo $commentaire["Titre"]; ?></h5>
                    <p class="card-text policecartesimple"><?php echo $commentaire["Contenue"]; ?></p>
                    <p class="card-text policecartesimple"><small class="text-muted">Rédigé le <?php echo $commentaire["Date_article"]; ?></small></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>

</article>

    <!-- Ajout du footer -->
    <?php
        include "../php/footer.php" ;
    ?>