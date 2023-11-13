<?php
session_start();
include "../model/database.php";
include "../model/model.php";
$success = false;
$msg = "";
$connexion = database();

if (!empty($_POST['email']) && !empty($_POST['MotDepasse'])) {
    $mail = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['MotDepasse']);
    // Validation des données
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $hashedPassword = recuperation($mail, $connexion);

        if ($hashedPassword !== null && verifyPassword($mdp, $hashedPassword)) {
            connecter($mail, $mdp, $connexion);
            $success = true;
            $_SESSION['email'] = $mail;
            $msg = "Connecté avec succès";
        } else {
            $msg = "Identifiant ou Mot de passe incorrect";
        }
    } else {
        $msg = "Adresse e-mail invalide";
    }
} else {
    $msg = "Veuillez remplir tous les champs";
}

$res = ["success" => $success, "msg" => $msg];
echo json_encode($res);
