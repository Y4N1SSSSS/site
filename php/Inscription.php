<?php
require_once 'Config.php';
require "header.php";
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
$ashmdp=SHA1($mdp);

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

    $verify_nom = $pdo->prepare("select Nom_user from utilisateur where Nom_user=? limit 1");
    $verify_nom->execute(array($nom));
    $user_nom = $verify_nom->fetchAll();
        if (count($user_nom) > 0){
            $_SESSION['error'] = " Ce compte existe deja. Veuillez selectionner un autre nom d'utilisateur";
            header('Location: InscriptionForm.php');
        }
        else {
            $inscrire = $pdo->prepare("insert into utilisateur(Nom_user,Mdp_user) values(?,?)");
            if ($inscrire->execute(array($nom, $ashmdp))) { 
                $_SESSION['mdp'] = $mdp;
                $_SESSION['nom'] = $nom;
                header('Location: ../index.php');
    }
}
?>

</article>
</body>
</html>
