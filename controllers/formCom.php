<?php
include "../model/database.php";
include "../model/model.php";
session_start();
$success = "";
$msg = "";
$connexion = database();
if (isset($_SESSION['email'])) {
    if (!empty($_POST['id_utilisateur']) && !empty($_POST['com_content']) && !empty($_POST['date'])) {
        $id_utilisateur = intval($_POST['id_utilisateur']);
        $commentaire = htmlspecialchars($_POST['com_content']);
        $date_com = $_POST['date'];
        comment($id_utilisateur,$commentaire,$date_com,$connexion);
        $success = 1;
        $msg = "Commentaire créer avec succès";
    } else {
        $msg = "Il faut renseigner tous les champs";
    }
}
$res = ["success" => $success, "msg" => $msg];
echo json_encode($res);