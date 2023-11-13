<?php
if (isset($_POST['inscription'])) {
    header("Location: inscription.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/nav2.css">
    <link rel="stylesheet" href="./css/connexion.css">
</head>

<body>
    <?php include_once "./utile/loading.php"; ?>
    <?php include_once "./utile/navbar2.php"; ?>
    <main class="main">
        <div class="form_co">
            <p class="fish"></p>
            <h1>Connectez-vous pour laisser un commentaire !</h1>
            <form action="" id="connexion" method="post">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br>

                <label for="MotDepasse">Mot de passe:</label><br>
                <input type="password" id="password" name="MotDepasse" required><br>

                <input type="submit" name="connexion" value="Connexion"><br>
            </form>
            <label>Vous n'avez pas de compte ?</label>
            <form action="" method="post">
                <input type="submit" name="inscription" value="Créer un compte">
            </form>
        </div>
    </main>
    <?php include_once "./utile/footer.php"; ?>
    <script src="../views/js/app.js"></script>
    <script src="../views/js/loading.js"></script>
</body>

</html>