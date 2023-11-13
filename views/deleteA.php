<?php
session_start();
include "../model/database.php";
$connexion = database();
if (isset($_POST['confirm_delete'])) {
    $sql = "DELETE FROM `utilisateurs` WHERE `email` ='$_SESSION[email]'";
    $req = $connexion->prepare($sql);
    $req->execute();
    session_destroy();
    header("Location: connexion.php");
}
if (isset($_POST['cancel'])) {
    header("Location: connecter.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer mon compte</title>
    <link rel="stylesheet" href="./css/nav2.css">
    <link rel="stylesheet" href="./css/deleteA.css">
</head>

<body>
    <?php include_once "./utile/loading.php"; ?>
    <?php include_once "./utile/navbar2.php"; ?>
    <main>
        <div class="container">
            <h1>Suppression de compte</h1>
            <form action="" method="post">
                <input type="submit" name="confirm_delete" value="Je confirme la suppression">
                <input type="submit" name="cancel" value="Annuler">
            </form>
        </div>
    </main>
    <?php include_once "./utile/footer.php"; ?>
    <script src="../views/js/loading.js"></script>
</body>

</html>