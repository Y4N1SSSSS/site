<?php
require_once 'Config.php';
require "headerconnexion.php";
session_start();
error_reporting(0);
?>
<article>
        <form method="get" action="Inscription.php">
            <p> Pseudonyme : </p>
            <input type="text" name="nom" placeholder="Pseudonyme" required="required">
            <p> Mot de passe : </p>
            <input type="password" name="mdp" placeholder="Mot de passe" required="required">
            <input type="submit" name="done" placeholder="Confirmer">
        </form>
    </article>
    <?PHP echo $_SESSION['error']; ?>
</body>
</html>
