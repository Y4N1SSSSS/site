<?php
require_once 'Config.php';
session_start();

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
    die; 
}

try {
    $requete = 'SELECT SUM(Valeur) AS total FROM donation';
    $resultats = $pdo->query($requete);
    $totalDons = $resultats->fetch(PDO::FETCH_ASSOC)['total'];
    echo json_encode(['total' => $totalDons]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
