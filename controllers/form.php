<?php
// Inclusion des fichiers nécessaires pour la connexion à la base de données et les fonctions
include "../model/database.php";
include "../model/model.php";
// Initialise la variable $succes
$succes = "";
// Établissement de la connexion à la base de données
$connexion = database();
// Vérification si tous les champs du formulaire sont remplis
if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['mdp']) && !empty($_POST['nom']) && !empty($_POST['prenom'])) {
    // Récupération et échappement des données du formulaire
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $avatar = "";
    // Vérification si un fichier a été téléchargé pour l'avatar
    if (!empty($_FILES['avatar']['tmp_name'])) {
        // Définition du répertoire de destination pour l'avatar
        $uploaddir = '../views/avatars/';
        // Création du nom de fichier pour l'avatar en utilisant le pseudo
        $avatarFileName = $_POST['pseudo'] . "_avatar.jpg";
        // Définition du chemin complet du fichier de destination
        $uploadfile = $uploaddir . basename($avatarFileName);
        // Vérification et déplacement du fichier téléchargé
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)) {
            $avatar = $uploadfile;
        }
    }
    // Insertion des données dans la base de données en utilisant la fonction "insert"
    insert($pseudo, $mail, $mdp, $nom, $prenom, $avatar, $connexion);

    $succes = 1;
    $msg = "Profil a été créé avec succès";
} else {
    $msg = "Il faut renseigner tous les champs";
}
// Vérification si $avatar est vide et ajustement de la réponse en conséquence
if (empty($avatar)) {
    $res = ["success" => $succes, "msg" => $msg, "avatar_uploaded" => false];
} else {
    $res = ["success" => $succes, "msg" => $msg, "avatar_uploaded" => true];
}
// Émission de la réponse au format JSON
echo json_encode($res);
