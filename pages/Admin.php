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

<?php if (isset($_SESSION["nom"])) : ?>
    <?php if ($_SESSION['admin'] == 1) : ?>
        <section>
            <h2> Espace Commentaire </h2>
            <?php
            $requete = 'SELECT * FROM article ORDER BY ID_article';
            $resultats = $pdo->query($requete);
            $article = $resultats->fetchAll(PDO::FETCH_ASSOC);
            $resultats->closeCursor();
            ?>
            <form action="../php/suppr.php" method="GET">
                <select name="ID_article" required="required">
                    <?php foreach ($article as $commentaire) : ?>
                        <option value="<?= $commentaire["ID_article"] ?>"> <?= htmlspecialchars($commentaire["Titre"]) ?> </option>
                    <?php endforeach; ?>
                </select><br /><br />
                <input type="submit" value="Supprimer" />
            </form>

            <form action="../php/toutsuppr.php" method="GET">
                <input type="submit" value="Tout Supprimer" />
            </form>
        </section>

        <section>
            <h2> Espace Liste participant </h2>
            <?php
            $query = 'SELECT * FROM participant ORDER BY ID_participant';
            $find = $pdo->query($query);
            $search = $find->fetchAll(PDO::FETCH_ASSOC);
            $find->closeCursor();
            ?>
            <form action="../php/supprparticipant.php" method="GET">
                <select name="ID_participant" required="required">
                    <?php foreach ($search as $participant) : ?>
                        <option value="<?= $participant["ID_participant"] ?>"> <?= htmlspecialchars($participant["Nom_participant"]) ?> </option>
                    <?php endforeach; ?>
                </select><br /><br />
                <input type="submit" value="Supprimer" />
            </form>
            <form action="../php/toutsupprparticipant.php" method="GET">
                <input type="submit" value="Tout Supprimer" />
            </form>
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
