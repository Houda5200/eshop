<?php


// Assurez-vous que la connexion à la base de données est correctement établie
require("config/connexion.php");

// Méthode ajouter
function ajouter($image, $nom, $prix, $desc)

{
    global $access;
    // Condition si connexion à la base de données réussie, exécute le code qui vient après
    if ($access) {
        $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)");

        $req->execute(array($image, $nom, $prix, $desc));

        $req->closeCursor();
    }
}


function afficher()
{
    global $access;
    // Vérifiez si la connexion à la base de données a réussi
    if ($access) {
        $req = $access->prepare("SELECT * FROM produits ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        // Fermez le curseur avant de retourner les données
        $req->closeCursor();

        return $data;
    } else {
        // Si la connexion échoue, renvoyez un tableau vide ou une erreur appropriée
        return [];
    }
}

// Méthode supprimer
function supprimer($id)
{
    global $access;
    if ($access) {
        $req = $access->prepare("DELETE FROM produits WHERE id=?");

        $req->execute(array($id));
    }
}
?>
