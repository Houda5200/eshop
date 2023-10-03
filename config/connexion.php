<?php

try {
    // Accès à la base de données
    $access = new PDO("mysql:host=localhost;dbname=eshop;charset=utf8", "root", "root");

    // Récupération et affichage d'erreurs avec PDO
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>






