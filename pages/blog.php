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

<article class="Blog">
  <form action="php/ajout.php" method="GET">
    <div> <label for="titre"> Titre : </label> <input class="border" type="text" name="titre" required="required"> </div>
    <div> <label for="texte"> texte : </label> <input class="border" type="text" name="texte" required="required"> </div>
    <input type="submit" value="Commenter"/>
  </form>
  <?php
    $requete='SELECT * FROM article ORDER BY ID_article DESC';
    $resultats=$pdo->query($requete);
    $article=$resultats->fetchAll(PDO::FETCH_ASSOC);
    $resultats->closeCursor();
  ?>
  <section> 
    <?php foreach($article as $commentaire): ?>
      <h1><?php echo $commentaire["Titre"];?></h1>
      <em>Rédigé le <?php echo $commentaire["Date_article"];?></em><br>
      <p> <?php echo $commentaire["Contenue"]; ?> </p>
    <?php endforeach; ?>
  </section>
</article>