<?php
session_start();
include "../model/database.php";
$connexion = database();
if (isset($_SESSION['email'])) {
    $pdostat = $connexion->query("SELECT * FROM utilisateurs WHERE email='$_SESSION[email]'");
    $result = $pdostat->fetch(PDO::FETCH_ASSOC);
}
if (isset($_POST['disconnect'])) {
    session_destroy();
    header("Location: connexion.php");
}
if (isset($_POST['modify'])) {
    header("Location: modify.php");
}
if (isset($_POST['modify_password'])) {
    header("Location: modifyP.php");
}
if (isset($_POST['delete'])) {
    header("Location: deleteA.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre profil</title>
    <link rel="stylesheet" href="./css/nav2.css">
    <link rel="stylesheet" href="./css/connecter.css">
</head>

<body>
    <?php include_once "./utile/loading.php"; ?>
    <?php include_once "./utile/navbar2.php"; ?>
    <main>
        <div class="container">
            <h1>Votre compte:</h1>
            <?php
            if (isset($_SESSION['email'])) { ?>
                <h2>Bonjour <span class="underline"><?php echo $result['pseudo'] ?></span> !</h2>
                <h3><strong>Votre email :</strong></h3>
                <?php echo "<p>" . $result['email'] . "</p>"; ?>

                <h3><strong>Votre nom :</strong></h3>
                <?php echo "<p>" . $result['nom'] . "</p>"; ?>

                <h3><strong>Votre prénom :</strong></h3>
                <?php echo "<p>" . $result['prenom'] . "</p>"; ?>

                <h3><strong>Votre avatar :</strong></h3>
                <img src="<?php echo $result['image_id']; ?>" alt="Avatar" class="avatar-image">

                <form action="" method="post">
                    <input id="disconnect" type="submit" name="disconnect" value="Se déconnecter">
                </form>
                <form action="" method="post">
                    <input id="modify" type="submit" name="modify" value="Modifier mon compte">
                </form>
                <form action="" method="post">
                    <input id="modify_password" type="submit" name="modify_password" value="Modifier mon mot de passe">
                </form>
                <form action="" method="post">
                    <input id="delete_account" type="submit" name="delete" value="Supprimer mon compte">
                </form>
            <?php
            } else { ?>
                <p>Vous n'êtes actuellement pas connecter!</p>
                <form action="" method="post">
                    <input type="submit" name="connexion" value="Se connecter">
                </form>
            <?php
            }
            ?>
        </div>
    </main>
    <?php include_once "./utile/footer.php"; ?>
    <script src="../views/js/loading.js"></script>
</body>

</html>