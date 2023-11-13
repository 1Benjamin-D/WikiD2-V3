<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/nav2.css">
    <link rel="stylesheet" href="./css/modifyP.css">
</head>

<body>
    <?php include_once "./utile/loading.php"; ?>
    <?php include_once "./utile/navbar2.php"; ?>
    <main>
        <div class="container">
            <p class="fich"></p>
            <h1>Modifier mon mot de passe</h1>
            <form action="" method="post" id="modify_password">
                <label for="oldpassword">Ancien mot de passe:</label><br>
                <input type="password" name="oldpassword"><br><br>
                <label for="newpassword">Nouveau mot de passe:</label><br>
                <input type="password" name="newpassword1"><br><br>
                <label for="newpassword">Confirmer votre nouveau mot de passe:</label><br>
                <input type="password" name="newpassword2"><br><br>
                <input id="changepassword" type="submit" name="changepassword" value="Changer de mot de passe"><br><br>
            </form>
            <form action="./connecter.php" method="post">
                <input id="abort" type="submit" name="abort" value="Annuler">
            </form>
        </div>
    </main>
    <?php include_once "./utile/footer.php"; ?>
    <script src="../views/js/app.js"></script>
    <script src="../views/js/loading.js"></script>
</body>

</html>