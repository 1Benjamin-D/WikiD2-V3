<?php
if (isset($_POST['coco'])) {
    header("Location: connexion.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer votre compte</title>
    <link rel="stylesheet" href="./css/nav2.css">
    <link rel="stylesheet" href="./css/inscription.css">
</head>

<body>
    <?php include_once "./utile/loading.php"; ?>
    <?php include_once "./utile/navbar2.php"; ?>
    <main>
        <div class="form_insc">
            <form id="inscription" method="post" enctype="multipart/form-data">
                <p class="fich"></p>
                <h1>Inscrivez-vous pour laisser un commentaire !</h1>
                <label for="pseudo">Pseudo:</label><br>
                <input type="text" name="pseudo" required><br>
                <label for="mail">Mail:</label><br>
                <input type="email" name="mail" required><br>
                <label for="mdp">Mot de passe:</label><br>
                <input type="password" name="mdp" required><br>
                <label for="nom">Nom:</label><br>
                <input type="text" name="nom" required><br>
                <label for="prenom">Prénom:</label><br>
                <input type="text" name="prenom" required><br>
                <label for="avatar">Photo de profil:</label><br>
                <input type="file" name="avatar" accept=".png, .jpg"><br>
                <img id="avatar-preview" src="#" alt="Aperçu de la photo de profil">
                <input type="submit" name="send" value="Envoyez">
            </form>
            <form id="coco" method="POST">
                <label>Vous avez déjà un compte ?</label>
                <input type="submit" name="coco" value="Connexion">
            </form>
        </div>
    </main>
    <?php include_once "./utile/footer.php"; ?>
    <script src="../views/js/previewPP.js"></script>
    <script src="../views/js/app.js"></script>
    <script src="../views/js/loading.js"></script>
</body>

</html>