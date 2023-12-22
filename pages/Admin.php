<?php
require_once '../php/Config.php';
include '../php/header.php';
session_start();

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='../css/bootstrap.min.css' rel='stylesheet'>
    <link href='../css/stylepages.css' rel='stylesheet'>
    <title>Administration</title>
</head>

<?php if (isset($_SESSION["nom"])) : ?>
<?php if ($_SESSION['admin'] == 1) : ?>

    
        <h1 class="mt-5 titres">Administration</h1>
        <div class="ligne-container"><div class="ligne-arrondie mb-5"></div></div>
        
        <section class="container">
        <section class="row">

        <div class="col-lg-5">

        <h2 class="texteitalic text-center typobold mb-5">Section Commentaire</h2>
        <?php
        $requete = 'SELECT * FROM article ORDER BY ID_article';
        $resultats = $pdo->query($requete);
        $article = $resultats->fetchAll(PDO::FETCH_ASSOC);
        $resultats->closeCursor();
        ?>
        <form action="../php/suppr.php" method="GET">
            <div class="d-flex justify-content-center">
            <select name="ID_article" class="selectadmin case" required="required">
                <?php foreach ($article as $commentaire) : ?>
                    <option value="<?= $commentaire["ID_article"] ?>"> <?= htmlspecialchars($commentaire["Titre"]) ?> </option>
                <?php endforeach; ?>
            </select><br/><br/>
            <input type="submit" class="bouton NS ms-1" value="Supprimer"/>
                </div>
        </form>

        <div class="mt-5 d-flex justify-content-center">
        <form action="../php/toutsuppr.php" method="GET">
            <input type="submit" class="btn btn-danger mb-5" value="Supprimer tous les commentaires"/>
        </form>
        </div>
    </div>
    
    <div class="col-lg-2">
        <!-- Div servant à gérer l'espacement via bootstrap pour que cela soit responsive et en même temps esthétique -->
    </div>

    <div class="col-lg-5">

    <h2 class="texteitalic text-center typobold mb-5">Section Participant</h2>
    <?php
    $query = 'SELECT * FROM participant ORDER BY ID_participant';
    $find = $pdo->query($query);
    $search = $find->fetchAll(PDO::FETCH_ASSOC);
    $find->closeCursor();
    ?>

    <form action="../php/supprparticipant.php" method="GET">
    <div class="d-flex justify-content-center">
        <select name="ID_participant" class="selectadmin txtoption case" required="required">
            <?php foreach ($search as $participant) : ?>
                <option class="txtoption" value="<?= $participant["ID_participant"] ?>"> <?= htmlspecialchars($participant["Nom_participant"]) ?> </option>
            <?php endforeach; ?>
        </select><br /><br/>
        <input type="submit" class="bouton NS ms-1" value="Supprimer"/>
        </div>
    </form>
    <div class="mt-5 d-flex justify-content-center">
    <form action="../php/toutsupprparticipant.php" method="GET">
        <input type="submit" class="btn btn-danger mb-5" value="Supprimer tous les participants" />
    </form>
    </div>
    </div>

    <div class="col-lg-5">
    <h2 class="texteitalic text-center typobold ">Section Don Monétaire</h2>

    <?php
if (isset($_POST['supprimer_toutes_donations'])) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        
        $pdo->exec('SET foreign_key_checks = 0');

        $requeteSuppression = 'DELETE FROM donation';
        $pdo->exec($requeteSuppression);

        $pdo->exec('SET foreign_key_checks = 1');

        echo '<h4 class="text-center texteitalic mt-3 mb-3">Toutes les donations monétaires ont été supprimées avec succès.</h4>';
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression des donations : " . $e->getMessage();
    }
}
?>

<div class="d-flex justify-content-center">
<form method="POST">
    <button type="submit" name="supprimer_toutes_donations" class="btn btn-danger mt-3 mb-5">Supprimer toutes les donations monétaires</button>
</form>
</div>

    </div>

    <div class="col-lg-2">
    </div>

    <div class="col-lg-5">
    <h2 class="texteitalic text-center typobold">Section Don Matériel</h2>
    <?php
    if (isset($_POST['supprimer_toutes_donations_materielles'])) {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

            $pdo->exec('SET foreign_key_checks = 0');

            $requeteSuppressionMateriel = 'DELETE FROM don_objet';
            $pdo->exec($requeteSuppressionMateriel);

            $pdo->exec('SET foreign_key_checks = 1');

            echo '<h4 class="text-center texteitalic mt-3 mb-3">Toutes les donations matérielles ont été supprimées avec succès.</h4>';
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression des donations matérielles : " . $e->getMessage();
        }
    }
    ?>

    <div class="d-flex justify-content-center mt-3 mb-5">
        <form method="POST">
            <button type="submit" name="supprimer_toutes_donations_materielles" class="btn btn-danger mt-2 mb-5">Supprimer toutes les donations matérielles</button>
        </form>
    </div>
</div>


    </section>
</section>

    <?php else : ?>
        <h1 class="titres">Vous n'êtes pas autorisé à accéder à cette page</h1>
        <div class="mt-5 d-flex justify-content-center">
        <img class="w-25 mb-5" src="../images/non.gif"></img>
        </div>
    <?php endif; ?>
<?php else : ?>
    <h1 class="titres">Vous n'êtes pas autorisé à accéder à cette page</h1>
        <div class="mt-5 d-flex justify-content-center">
        <img class="w-25 mb-5 " src="../images/non.gif"></img>
        </div>
<?php endif; ?>

<?php 
include '../php/footer.php';
?>
