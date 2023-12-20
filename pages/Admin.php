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
<section>
    <h2> Espace Commentaire </h2>
    <?php
$requete='SELECT * FROM article ORDER BY ID_article';
  $resultats=$pdo->query($requete);
  $article=$resultats->fetchAll(PDO::FETCH_ASSOC);
  $resultats->closeCursor();
  ?>
    <form action="../php/suppr.php" method="GET">
        <select name="ID_article" required="required"> 
        <?php
            foreach($article as $commentaire):
        ?>
            <option value="<?php echo $commentaire["ID_article"];?>"> <?php echo $commentaire["Titre"];?> </option>
        <?php
            endforeach;
        ?>  
        </select><br/><br/>
        <input type="submit" value="Supprimer"/>
    </form>

    <form action="../php/toutsuppr.php" method="GET">
        <input type="submit" value="Tout Supprimer"/>
    </form>
</section>

<section>
<h2> Espace Liste participant </h2>
<?php $query='SELECT * FROM participant ORDER BY ID_participant';
  $find=$pdo->query($query);
  $search=$find->fetchAll(PDO::FETCH_ASSOC);
  $find->closeCursor(); ?>
  <form action="../php/supprparticipant.php" method="GET">
  <select name="ID_participant" required="required"> 
        <?php
            foreach($search as $participant):
        ?>
            <option value="<?php echo $participant["ID_participant"];?>"> <?php echo $participant["Nom_participant"];?> </option>
        <?php
            endforeach;
        ?>  
        </select><br/><br/>
        <input type="submit" value="Supprimer"/>
    </form>
    <form action="../php/toutsupprparticipant.php" method="GET">
        <input type="submit" value="Tout Supprimer"/>
    </form>

</section>
