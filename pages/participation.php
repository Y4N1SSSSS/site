<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='../css/bootstrap.min.css' rel='stylesheet'>
    <link href='../css/stylepages.css' rel='stylesheet'>
    <title>Rejoignez-nous!</title>
</head>
    <!-- Ajout du header -->
    <?php
        include "../php/header.php" ;
    ?>
<body>
    <!-- TITRE DU FORMULAIRE -->
    <h1 class="titres">Participez à l'Événement !</h1>
    <div class="ligne-container"><div class="ligne-arrondie"></div></div>
    <!-- FORMULAIRE -->
    <div>
    <div class="container mt-5">
    <form action="../php/result.php" method='POST' class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="email">Adresse Email :</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse email" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone">Numéro de Téléphone :</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="postal">Code Postal :</label>
                <input type="text" class="form-control" id="postal" name="postal" placeholder="Entrez votre code postal" required>
            </div>
        </div>
        <div class="col-md-12 d-flex justify-content-end">
        <button type="submit" class="boutonform NS">Envoyer</button>
        </div>
        <div class='ligne-container'><a class='boutonresult NS' href='../php/listeParticipant.php'>Liste de tous les participants</a></div>
    </div>
    </form>
</div>

<!-- IMPORTATION DES SCRIPTS BOOTSTRAP -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</div>
</body>
</html>

