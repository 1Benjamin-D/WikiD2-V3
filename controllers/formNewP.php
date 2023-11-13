<?php
session_start();
include "../model/database.php";
include "../model/model.php";
$success = false;
$msg = "";
$connexion = database();

if (isset($_SESSION['email']) && !empty($_POST['oldpassword']) && !empty($_POST['newpassword1']) && !empty($_POST['newpassword2'])) {
    $email = $_SESSION['email'];
    $old = htmlspecialchars($_POST['oldpassword']);
    $new1 = htmlspecialchars($_POST['newpassword1']);
    $new2 = htmlspecialchars($_POST['newpassword2']);

    if (verifyPassword($old, recuperation($email, $connexion))) {
        if ($new1 === $new2) {
            if (modifyPassword($old, $new1, $connexion)) {
                $success = true;
                $msg = "Le mot de passe a été modifié avec succès.";
                session_destroy();
            } else {
                $msg = "Une erreur s'est produite lors de la modification du mot de passe.";
            }
        } else {
            $msg = "Les nouveaux mots de passe ne correspondent pas.";
        }
    } else {
        $msg = "L'ancien mot de passe est incorrect.";
    }
}

// Créez un tableau associatif pour stocker les résultats
$response = array(
    "success" => $success,
    "message" => $msg
);

// Convertir le tableau associatif en JSON et le renvoyé
header('Content-Type: application/json');
echo json_encode($response);
