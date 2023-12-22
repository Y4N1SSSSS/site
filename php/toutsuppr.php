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

    $requete='DELETE FROM article ';
    $suppr=$pdo->exec($requete);

    header('Location: ../pages/admin.php');
    exit();

?>
