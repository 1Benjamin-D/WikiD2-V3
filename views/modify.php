<?php
session_start();
include "../model/database.php";
$connexion = database();
$sql = "SELECT * FROM utilisateurs WHERE email='$_SESSION[email]'";
$req = $connexion->query($sql);
$result = $req->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/nav2.css">
    <link rel="stylesheet" href="./css/modify.css">
</head>

<body>
    <?php include_once "./utile/loading.php"; ?>
    <?php include_once "./utile/navbar2.php"; ?>
    <main>
        <p class="fich"></p>
        <div class="formM">
            <h1>Vos informations</h1>
            <form id="modify" method="post" enctype="multipart/form-data">
                <label for="name">Pseudo</label><br>
                <input type="text" name="pseudo" value="<?php echo $result['pseudo'] ?>"><br>
                <label for="email">Email</label><br>
                <input type="email" name="email" value="<?php echo $result['email'] ?>"><br>
                <label for="nom">Nom</label><br>
                <input type="text" name="nom" value="<?php echo $result['nom'] ?>"><br>
                <label for="prenom">Prénom</label><br>
                <input type="text" name="prenom" value="<?php echo $result['prenom'] ?>"><br>
                <label for="avatar">Avatar</label><br>
                <input type="file" name="avatar" accept=".png, .jpg"><br>
                <img id="avatar-preview" src="#" alt="Aperçu de la photo de profil">
                <input id="change" type="submit" name="modify" value="Confirmer le changement">
            </form>
            <form action="./connecter.php" method="post">
                <input id="abort" type="submit" name="abort" value="Annuler">
            </form>
        </div>
    </main>
    <?php include_once "./utile/footer.php"; ?>
    <script src="../views/js/app.js"></script>
    <script src="./js/previewPP.js"></script>
    <script src="../views/js/loading.js"></script>
</body>

</html>