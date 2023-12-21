<?php
require_once 'Config.php';
require "header.php";

try{
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }

    // suppression d'un article
    $requete='DELETE FROM article ';
    $suppr=$pdo->exec($requete);

    // redirection
    header('Location: ../pages/admin.php');
    exit();

?>
