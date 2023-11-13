<?php
// Début de la création de compte
// Fonction qui effectue l'insertion des données dans la base de données
function insert($un, $deux, $trois, $quatre, $cinq, $six, $connexion)
{
    // Requête SQL pour insérer des données dans la table "utilisateurs"
    $insert = "INSERT INTO utilisateurs (pseudo, mot_de_passe, email, nom, prenom, image_id) VALUES (:pseudo, :pass, :mail, :nom, :prenom, :avatar)";
    // Préparation de la requête SQL avec PDO
    $pdoPrepare = $connexion->prepare($insert);
    // Liaison des paramètres de la requête aux valeurs correspondantes
    $pdoPrepare->bindValue(':pseudo', $un, PDO::PARAM_STR);
    // Hachage du mot de passe avant de le stocker en base de données (pour des raisons de sécurité)
    $hashedPassword = password_hash($trois, PASSWORD_DEFAULT);
    $pdoPrepare->bindValue(':pass', $hashedPassword, PDO::PARAM_STR);
    $pdoPrepare->bindValue(':mail', $deux, PDO::PARAM_STR);
    $pdoPrepare->bindValue(':nom', $quatre, PDO::PARAM_STR);
    $pdoPrepare->bindValue(':prenom', $cinq, PDO::PARAM_STR);
    // Vérification si un avatar a été spécifié
    if (!empty($six)) {
        $pdoPrepare->bindValue(':avatar', $six, PDO::PARAM_STR);
    } else {
        // Utilisation d'un avatar par défaut si aucun avatar n'a été spécifié
        $defaultAvatar = "../views/avatars/default_avatar.jpg"; // Chemin vers l'avatar par défaut
        $pdoPrepare->bindValue(':avatar', $defaultAvatar, PDO::PARAM_STR);
    }
    // Exécution de la requête d'insertion
    return $pdoPrepare->execute();
}
// Fin de la création de compte



//début connexion
// fonction pour vérifier le mot de passe hashé
function verifyPassword($password, $hashedPassword)
{
    return password_verify($password, $hashedPassword);
}

// fonction pour récupérer le mot de passe via email ou la session
function recuperation($email, $connexion)
{
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    }
    $selectQuery = "SELECT mot_de_passe FROM utilisateurs WHERE email = :email";
    $pdoPrepare = $connexion->prepare($selectQuery);
    $pdoPrepare->bindValue(':email', $email, PDO::PARAM_STR);
    $pdoPrepare->execute();
    $result = $pdoPrepare->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result['mot_de_passe'];
    } else {
        return null;
    }
}

//fonction de login
function connecter($email, $MotDepasse, $connexion)
{
    $selectQuery = "SELECT * FROM utilisateurs WHERE email = :email";
    $pdoPrepare = $connexion->prepare($selectQuery);
    $pdoPrepare->bindValue(':email', $email, PDO::PARAM_STR);
    $pdoPrepare->execute();
    $result = $pdoPrepare->fetch(PDO::FETCH_ASSOC);

    if ($result && verifyPassword($MotDepasse, $result['mot_de_passe'])) {
        $response = array('success' => true);
    } else {
        $response = array('success' => false);
    }
    return $response;
}
//fin connexion
//début modification
//compte
function modifyAccount($pseudo, $email, $nom, $prenom, $avatar, $connexion)
{
    $update = "UPDATE utilisateurs SET pseudo = :pseudo, email = :email, nom = :nom, prenom = :prenom, image_id = :avatar WHERE email = :old_email";
    $pdoPrepare = $connexion->prepare($update);
    $pdoPrepare->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $pdoPrepare->bindValue(':email', $email, PDO::PARAM_STR);
    $pdoPrepare->bindValue(':nom', $nom, PDO::PARAM_STR);
    $pdoPrepare->bindValue(':prenom', $prenom, PDO::PARAM_STR);

    // Vérifier si un avatar a été spécifié
    if (!empty($avatar)) {
        $pdoPrepare->bindValue(':avatar', $avatar, PDO::PARAM_STR);
    } else {
        // Utiliser l'ancien lien stocké dans la bdd comme lien par défaut
        $oldAvatarQuery = "SELECT image_id FROM utilisateurs WHERE email = :old_email";
        $oldAvatarStatement = $connexion->prepare($oldAvatarQuery);
        $oldAvatarStatement->bindValue(':old_email', $_SESSION['email'], PDO::PARAM_STR);
        $oldAvatarStatement->execute();
        $oldAvatarResult = $oldAvatarStatement->fetch(PDO::FETCH_ASSOC);
        $defaultAvatar = $oldAvatarResult['image_id'];

        $pdoPrepare->bindValue(':avatar', $defaultAvatar, PDO::PARAM_STR);
    }

    $pdoPrepare->bindValue(':old_email', $_SESSION['email'], PDO::PARAM_STR);

    return $pdoPrepare->execute();
}
//mot de passe
function modifyPassword($oldPassword, $newPassword, $connexion)
{
    $email = $_SESSION['email'];
    $hashedOldPassword = recuperation($email, $connexion);

    if ($hashedOldPassword && verifyPassword($oldPassword, $hashedOldPassword)) {
        $updateQuery = "UPDATE utilisateurs SET mot_de_passe = :new_password WHERE email = :email";
        $pdoPrepare = $connexion->prepare($updateQuery);
        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $pdoPrepare->bindValue(':new_password', $hashedNewPassword, PDO::PARAM_STR);
        $pdoPrepare->bindValue(':email', $email, PDO::PARAM_STR);
        $pdoPrepare->execute();

        return true;
    } else {
        return false;
    }
}
//fin modifications
//début commentaire
//création
function comment($id_utilisateur, $commentaire, $date, $connexion)
{
    $insertCom = "INSERT INTO commentaires (utilisateur_id, commentaire, date_commentaire) VALUES (:id_utilisateur, :com, :date_com)";
    $pdoPrepare = $connexion->prepare($insertCom);
    $pdoPrepare->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $pdoPrepare->bindValue(':com', $commentaire, PDO::PARAM_STR);
    $pdoPrepare->bindValue(':date_com', $date, PDO::PARAM_STR);
    $pdoPrepare->execute();
}
