<?php
include "../model/database.php";
include "../model/model.php";
session_start();
ini_set('display_errors', 1);
$succes = "";
$msg = "";
$avatar_uploaded = false;
$connexion = database();
if (isset($_SESSION['email'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['nom']) && !empty($_POST['prenom'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['email']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $avatar = "";

        // Vérifier si un fichier a été uploadé
        if (!empty($_FILES['avatar']['tmp_name'])) {
            $uploaddir = '../views/avatars/';
            $avatarFileName = $_POST['pseudo'] . "_avatar.jpg";
            $uploadfile = $uploaddir . basename($avatarFileName);

            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)) {
                $avatar = $uploadfile;
            }
        }
        modifyAccount($pseudo, $mail, $nom, $prenom, $avatar, $connexion);
        $_SESSION['email'] = $_POST['email'];
        $succes = 1;
        $msg = "Profil a été modifier avec succès";
    } else {
        $msg = "Il faut renseigner tous les champs";
    }
    // Vérifier si $avatar est vide et ajuster la réponse en conséquence
    if (!empty($avatar)) {
        $avatar_uploaded = true;
    }
}
$res = ["success" => $succes, "msg" => $msg, "avatar_uploaded" => $avatar_uploaded];
echo json_encode($res);
