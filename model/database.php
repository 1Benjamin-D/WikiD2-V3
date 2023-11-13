<?php
// Définition d'une fonction nommée "database"
function database()
{
    try {
        // Crée une nouvelle instance de PDO (PHP Data Objects) pour se connecter à la base de données MySQL
        $db = new PDO("mysql:host=localhost;dbname=wikid2;charset=utf8", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // Configure le mode de récupération par défaut pour les résultats de la requête
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  // Configure le mode de gestion des erreurs pour lancer des exceptions en cas d'erreur
        ]);
        // Retourne l'objet PDO, qui représente la connexion à la base de données
        return $db;
    } catch (PDOException $e) {
        // En cas d'erreur lors de la connexion à la base de données, affiche un message d'erreur
        die("database error" . $e->getMessage());
    }
}
