<?php
    require_once 'Config.php';
    include("header.php");

    // ajout d'un article
    $requete_preparee= $pdo->prepare('INSERT INTO article(ID_article, Titre, Contenue, Date_article) VALUES (NULL,:Titre,:Contenue,:Date_article)');
    $requete_preparee->bindValue(':Titre',$_GET["titre"], PDO::PARAM_STR);
    $requete_preparee->bindValue(':Contenue',$_GET["texte"], PDO::PARAM_STR);
    $requete_preparee->bindValue(':Date_article',date("Y/m/j"), PDO::PARAM_STR);
    $res=$requete_preparee->execute();

    $id=$pdo->lastInsertId();

    header('Location: ../index.php?action=ajout&id='.$id);
    exit();
?>
