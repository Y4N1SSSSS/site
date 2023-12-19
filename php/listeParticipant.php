<?php
require_once '../php/Config.php';

try {
// Connexion à la base de données
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

// Récupérer tous les participants
$requete = $pdo->query('SELECT * FROM participant');
$participant = $requete->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
// En cas d'erreur, afficher le message d'erreur
echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='../css/bootstrap.min.css' rel='stylesheet'>
<link href='../css/stylepages.css' rel='stylesheet'>
<title>Liste des Participants</title>
</head>
<body>

<div class="container mt-5">
<h1 class="titres">Liste des Participants</h1>
<div class="ligne-container"><div class="ligne-arrondie"></div></div>

<?php if (isset($participant) && !empty($participant)): ?>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Numéro de Téléphone</th>
                <th scope="col">Code Postal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($participant as $participant): ?>
                <tr>
                    <th scope="row"><?php echo $participant['ID_participant']; ?></th>
                    <td><?php echo $participant['Nom_participant']; ?></td>
                    <td><?php echo $participant['Prenom_participant']; ?></td>
                    <td><?php echo $participant['email_participant']; ?></td>
                    <td><?php echo $participant['num_participant']; ?></td>
                    <td><?php echo $participant['CP_participant']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun participant pour le moment.</p>
<?php endif; ?>
</div>

<div class='ligne-container'><a class='boutonresult NS bouton-fixe' href='../pages/participation.php'>Retour à la page Participation</a></div>
<div class='ligne-container'><a class='boutonresult NS bouton-fixe' href='../index.php'>Retour à l'accueil</a></div>


<!-- IMPORTATION DES SCRIPTS BOOTSTRAP -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
