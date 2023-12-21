<?php require_once 'php/Config.php';
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
<link rel="icon" href="images/favicon_taille.ico" type="image/x-icon">
<script src="js/jquery-3.6.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<title>Accueil</title>
</head>
<body>
<nav class="navbar navbar-expand-lg couleurnav">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="images/perso.png" class="taillelogo" alt="Restaure Ton Patrimoine">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/participation.php">Participation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/donation.php">Donation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/planning.php">Planning</a>
        </li>   
        <?php 
        if(isset($_SESSION["nom"])){
                if( $_SESSION['admin'] == 1){
                  echo(' </ul>
                  </div>
                <a href="pages/Admin.php" class="ms-4 co"> Administration </a>
                <a class="ms-4 co texteitalic">'
                .$_SESSION["nom"].'</a>
                <a class="ms-2 co" href="php/logout.php">
                  <img width="32px" height="32px" class="rotationlogo" src="images/decov2.png" alt="deco">
                </a>
              ');
                }
          else{
            echo(' </ul>
            </div>
            <a class="ms-4 co texteitalic">'
            .$_SESSION["nom"].'</a>
            <a class="ms-2 co" href="php/logout.php">
              <img width="32px" height="32px" class="rotationlogo" src="images/decov2.png" alt="deco">
            </a>
          ');
            }
        }
        else{
          echo(' 
          <li class="nav-item">
            <a class="nav-link" href="php/Connexion.php">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="php/InscriptionForm.php">Inscription</a>
          </li>
        </ul>
      </div>
            ');
        }
        ?>
  </div>
</nav>

<section id="carrousel">

<div class="owl-carousel owl-theme">
<div class="item imgcarrousel1">
  <div class="overlay-content">
    <h1 class="text-center textecarrousel"> &nbsp; </h1>
  </div>
</div>
<div class="item imgcarrousel2">
  <div class="overlay-content">
    <h1 class="text-center textecarrousel"> &nbsp; </h1>
  </div>
</div>
<div class="item imgcarrousel3">
  <div class="overlay-content">
    <h1 class="text-center textecarrousel"> &nbsp; </h1>
  </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="js/carrousel.js"></script>

</section>

<section id="contenu">

<div>
  <h2 class="titres mt-5">En quoi consiste l'événement ?</h2>
  <div class="d-flex justify-content-center">
    <div class="ligne-arrondie"></div>
  </div>
</div>

<div class="mt-5 container d-flex justify-content-center">
  <img class="w-100" src="images/illustrationprojet.png" alt="Illustration Projet">
</div>

<div class="mt-5 container">
  <div class="row d-flex justify-content-center">
    <div class="col-lg-9">
      <h5 class="typobold">Cet événement a pour but de rénover le patrimoine de Blassac pendant une durée d'une semaine.</h5>
      <h5 class="mt-3 policecartesimple">
        En coopération avec plusieurs volontaires participants à la préservation de notre patrimoine sans même s'engager à venir chaque jour. Vous avez le droit de venir uniquement les jours qui vous intéressent.
      </h5>
    </div>
    <div class="col-lg-3 d-flex align-items-center justify-content-center">
      <a class="bouton NS mt-3">S'inscrire</a>
    </div>
  </div>
</div>  
</div>

</section>

<section>

<div class="mt-5">
  <h2 class="titres">Qui sommes-nous ?</h2>
  <div class="d-flex justify-content-center">
    <div class="ligne-arrondie"></div>
  </div>
</div>
<div class="mt-5 container">
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-lg-6">
      <h5 class="typobold margindresponsive">
        Les Amis De Blassac est une association culturelle et historique proposant une grande variété d'activités pour tous les membres.
      </h5>
      <h5 class="mt-4 policecartesimple margindresponsive">Nous organisons des événements tels que des concerts, des expositions d'art et des conférences. Mais nous offrons également des activités de loisirs telles que des randonnées pédestres, des sorties en plein air et des ateliers de création.
      </h5>
      <div class="mb-4"></div>
    </div>
    <div class="col-lg-6">
      <img class="w-100" src="images/illustrationequipe.png" alt="Illustration Équipe">
    </div>
  </div>
</div>

</section>

<section>

<div class="mt-3">
  <h2 class="titres">Pourquoi faire un don ?</h2>
  <div class="d-flex justify-content-center">
    <div class="ligne-arrondie"></div>
  </div>
</div>
<div class="container imgfonddonation">
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-lg-12 mt-5">
      <h5 class="text-center typobold">
        Grâce à vos dons, nous avons par le passé pu organiser divers événements pour toute la commune.
      </h5>
      <h6 class="text-center policecartesimple"> De simple atelier création à concert, vos dons permettent à notre association d'organiser divers événements pour le plaisir de tous.
        <br> Grâce à vos dons, nous pourrons réaliser plus d'événements similaires à l'avenir.
      </h6>
    </div>
    <div class="col-lg-6 mt-5">
      <h4 class="text-center typobold texteitalic">UTILISATION DES DONS MONÉTAIRES</h4>
      <h6 class="text-center policecartesimple margindresponsive ">
      Avec les dons monétaires récoltés au fil des années, notre association a organisé divers événements adaptés aux petits comme aux grands, de simple randonnée pédestre aux ateliers de création en passant par des expositions d'art et des conférences. Sans oublier l'aide énorme que ces dons ont apportée à la rénovation de notre patrimoine.
      </h6>
    </div>
    <div class="col-lg-6 mt-5">
      <h4 class="text-center typobold texteitalic">UTILISATION DES DONS D'OBJETS</h4>
      <h6 class="text-center policecartesimple margingresponsive">
        Grâce aux dons d'objets, nous pouvons organiser des événements en économisant, ce qui permet d'investir cet argent économisé dans de futurs projets. <br> Le matériel récupéré a été utilisé pour la restauration du patrimoine, pour les randonnées ainsi que les ateliers de créations. Les objets qui ne vous servent plus permettent de servir à d'autres.
      </h6>
    </div>
  </div>
</div>

      </div>
      <div class="row argent">
      <div class="col-sm">
      <img src="images/star.png" alt="étoile" class="star">
      </div>
      <div class="col-lg-6">
        <div id="counter">0€</div>
        <div id="subcounter">Sur notre objectif de 10 000€</div>
      </div>
      <div class="col-sm">
      <img src="images/star.png" alt="étoile" class="star">
      </div>
      </div>
  </div>
</div>  
</div>

<script>
  // Fonction qui permet de récupérer les dons depuis la BDD en utilisant le fichier php "totalDons.php" 
  async function getDataFromDatabase() {
    try {
        const response = await fetch('php/totalDons.php');
        const data = await response.json();
        return data.total;
    } catch (error) {
        console.error('Erreur lors de la récupération des données depuis la base de données :', error);
        return 0;
    }
}

  // Fonction pour mettre a jour le compteur en ajoutant les données de la BDD chaques x secondes
  async function updateCounter() {
    try {
      // Utilisation de la fonction de récupération des données de la base pour avoir le total des dons
      const data = await getDataFromDatabase();

      // Mise à jour du compteur
      const counterElement = document.getElementById('counter');
      counterElement.innerText = formatNumberWithSpaces(data) + '€';

      // Répète la mise à jour toutes les x secondes ( ici toutes les 1 secondes )
      setTimeout(updateCounter, 1000);
    } catch (error) {
      console.error('Erreur lors de la mise à jour du compteur :', error);
    }
  }
  // Fonction pour formater le nombre avec des espaces entre les milliers 
  function formatNumberWithSpaces(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
  }
  
  // Lance la première mise à jour du compteur
  updateCounter();
</script>
</section>

<div class="espacementtop">
<h2 class="titres">Donnez-nous votre avis sur l'événement</h1>
<div class="d-flex justify-content-center">
<div class="ligne-arrondie"></div>
</div>
</div>

<article class="Blog">
<?php if (isset($_SESSION["nom"])) : ?>
  <form action="php/ajout.php" method="GET">
      <div class="container mt-2">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="form-group">
                      <label for="titre">Donnez un titre à votre commentaire</label>
                      <input class="form-control" type="text" name="titre" required="required">
                  </div>
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="form-group">
                      <label for="texte">Écrivez votre texte juste ici</label>
                      <input class="form-control grande-zone-texte" type="text" name="texte" required="required">
                  </div>
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-md-8 mt-2 d-flex justify-content-center">
                  <button type="submit" class="bouton NS">Commenter</button>
              </div>
          </div>
      </div>
  </form>  
<?php else : ?>
  <div class="container mt-5">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <h4 class="text-center texteitalic">Vous avez besoin d'être connecté si vous voulez poster un commentaire</h2>
          </div>
      </div>
  </div>

  <?php endif; ?>

  <section class="mt-5" id="commentaire">

  <?php
  $requete='SELECT * FROM article ORDER BY ID_article DESC LIMIT 6';
  $resultats=$pdo->query($requete);
  $article=$resultats->fetchAll(PDO::FETCH_ASSOC);
  $resultats->closeCursor();
  ?>

<div class="container mt-5">
    <div class="row">
        <?php foreach ($article as $commentaire): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title policecarte"><?php echo $commentaire["Titre"]; ?></h5>
                        <p class="card-text policecartesimple pt-2"><?php echo $commentaire["Contenue"]; ?></p>
                        <p class="card-text policecartesimple text-center"><small class="text-muted">Rédigé le <?php echo $commentaire["Date_article"]; ?></small></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
  </div>
  <div class="mt-5 d-flex justify-content-center">
  <a class="bouton mb-5 NS" href="pages/blog.php"> Voir tous les commentaires </a>
  </div>
</article>
</section>
<body>

<footer class="footer text-light">
    <div class="container py-4">
        <div class="row">
            <!-- Colonne Contacts -->
            <div class="col-md-4 col-sm-6 text-center mb-3">
                <h4 class="titresFooter">Contact</h4>
                <p class="textFooter">Adresse: 28 Rue des Cerisiers, 43100 Blassac, France</p>
                <p class="textFooter">Email: restauretonpatrimoine@association.org</p>
                <p class="textFooter">Téléphone: +33 04 78 56 89 45</p>
            </div>

            <!-- Colonne Réseaux sociaux -->
            <div class="col-md-4 col-sm-6 text-center mb-3">
                <h4 class="titresFooter">Réseaux sociaux</h4>
                    <div class="d-flex justify-content-center align-items-center">
                    <a href="https://twitter.com/" target="_blank" class="mr-2"><img src="images/X.png" class='imagesfooter mx-2'></a>
                    <a href="https://www.facebook.com/" target="_blank" class="mr-2"><img src="images/F.png" class='imagesfooter mx-2'></a>
                    <a href="https://www.instagram.com/" target="_blank"><img src="images/I.png" class='imagesfooter mx-2'></a>
                </div>
            </div>
            
            <!-- Colonne Logo -->
            <div class="col-md-4 col-sm-6 text-center mb-3">
                <img src="images/logo.png" alt="Logo de l'association" class="logo">
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>