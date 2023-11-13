<?php
session_start();
include "../model/database.php";
$connexion = database();
//pour les données du formulaire
if (isset($_SESSION['email'])) {
    $sql = "SELECT * FROM utilisateurs WHERE email='$_SESSION[email]'";
    $req = $connexion->query($sql);
    $result = $req->fetch(PDO::FETCH_ASSOC);
}
//pour afficher les commentaires
$comSql = "SELECT * FROM commentaires ORDER BY date_commentaire ASC";
$req2 = $connexion->query($comSql);
$commentaires = $req2->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/nav2.css">
    <link rel="stylesheet" href="./css/commentaire.css">
</head>

<body>
    <?php include_once "./utile/loading.php"; ?>
    <?php include_once "./utile/navbar2.php"; ?>
    <main>
        <p class="fich"></p>
        <h1>Laissez votre commentaire ici !</h1>
        <div id="form_commentaire">
            <?php if (isset($_SESSION['email'])) { ?>
                <form action="" method="post" id="create_com">
                    <input type="hidden" name="id_utilisateur" value="<?php echo $result['id'] ?>">
                    <textarea placeholder="Entrer votre commentaire" name="com_content" cols="30" rows="5"></textarea>
                    <input type="hidden" name="date" value="<?php echo date("Y-m-j H:i:s") ?>">
                    <input type="submit" value="Envoyer" name="Envoyez">
                </form>
            <?php } ?>
        </div>
        <?php
        // // Trie les commentaires du plus vieux au plus récent
        usort($commentaires, function ($a, $b) {
            return strtotime($a['date_commentaire']) - strtotime($b['date_commentaire']);
        });
        foreach ($commentaires as $commentaire) {
            //pour afficher le pseudo et l'image des utilisateurs qui ont créer les commentaires
            $comSql = "SELECT pseudo, image_id FROM utilisateurs WHERE id=" . $commentaire['utilisateur_id'];
            $req2 = $connexion->query($comSql);
            $util = $req2->fetch(PDO::FETCH_ASSOC);

            echo '<div id="commentaire">';
            echo '<div id="partie_compte">';
            if ($util) {
                echo '<img src="' . $util['image_id'] . '" alt="Avatar">';
                echo '<h3>' . $util['pseudo'] . ':</h3>';
            } else {
                echo '<p>Compte supprimé:</p>';
            }
            echo '</div>';
            echo '<p>' . $commentaire['commentaire'] . '</p>';
            echo '<p id="date">' . $commentaire['date_commentaire'] . '</p>';
            if (isset($_SESSION['email'])) {
                if ($result['id'] == $commentaire['utilisateur_id'] && $result['role'] == 2) {
                    echo '<form action="" method="post">';
                    echo '<input type="hidden" name="comment_id" value="' . $commentaire['id'] . '">';
                    echo '<input type="submit" value="Modifier" name="modifier">';
                    echo '<input type="submit" value="Supprimer" name="supprimer">';
                    echo '</form>';
                } elseif ($result['role'] == 1) {
                    echo '<form action="" method="post">';
                    echo '<input type="hidden" name="comment_id" value="' . $commentaire['id'] . '">';
                    echo '<input type="submit" value="Modifier" name="modifier">';
                    echo '<input type="submit" value="Supprimer" name="supprimer">';
                    echo '</form>';
                }
            }

            //affiche la zone de modification à l'appui du bouton
            if (isset($_POST['modifier'])) {
                // Récupérer l'ID du commentaire à modifier
                $commentId = $_POST['comment_id'];

                // Rechercher le commentaire correspondant dans le tableau des commentaires
                $commentaireAModifier = null;
                foreach ($commentaires as $commentaire) {
                    if ($commentaire['id'] == $commentId) {
                        $commentaireAModifier = $commentaire;
                        break;
                    }
                }

                // Vérifier si le commentaire a été trouvé
                if ($commentaireAModifier) {
                    // Afficher la zone de texte avec le contenu du commentaire
                    echo '<form action="" method="post">';
                    echo '<input type="hidden" name="comment_id" value="' . $commentaireAModifier['id'] . '">';
                    echo '<textarea name="nouveau_contenu" cols="30" rows="2" style="margin-top: 2%;">' . htmlspecialchars($commentaireAModifier['commentaire']) . '</textarea>';
                    echo '<br/>';
                    echo '<input type="submit" value="Enregistrer" name="enregistrer">';
                    echo '</form>';
                }
            }

            if (isset($_POST['enregistrer'])) {
                // Traitement lorsque le bouton "Enregistrer" est appuyé
                // Récupérer les données du formulaire
                $commentId = $_POST['comment_id'];
                $nouveauContenu = $_POST['nouveau_contenu'];

                // Mettre à jour le commentaire correspondant dans le tableau des commentaires
                foreach ($commentaires as &$commentaire) {
                    if ($commentaire['id'] == $commentId) {
                        $commentaire['commentaire'] = $nouveauContenu;

                        // Requête SQL UPDATE pour mettre à jour le commentaire dans la base de données
                        $sql = "UPDATE commentaires SET commentaire = :nouveauContenu WHERE id = :commentId";
                        $stmt = $connexion->prepare($sql);
                        $stmt->bindParam(':nouveauContenu', $nouveauContenu);
                        $stmt->bindParam(':commentId', $commentId);
                        $stmt->execute();

                        break;
                    }
                }
            }
            //afficher la confirmation de suppression à l'appui du bouton
            if (isset($_POST['supprimer'])) {
                echo 'Êtes-vous sûr de vouloir supprimer ce commentaire ?';
                echo '<form action="" method="post">';
                echo '<input type="hidden" name="comment_id" value="' . $_POST['comment_id'] . '">';
                echo '<input type="submit" value="Oui" name="confirmer_suppression">';
                echo '<input type="submit" value="Non" name="annuler_suppression">';
                echo '</form>';
            }
            if (isset($_POST['confirmer_suppression'])) {
                $commentId = $_POST['comment_id'];

                // Requête SQL DELETE pour supprimer le commentaire de la base de données
                $sql = "DELETE FROM commentaires WHERE id = :commentId";
                $stmt = $connexion->prepare($sql);
                $stmt->bindParam(':commentId', $commentId);
                $stmt->execute();
            }
            echo '</div>';
        }
        ?>
    </main>
    <?php include_once "./utile/footer.php"; ?>
    <script src="./js/app.js"></script>
    <script src="../views/js/loading.js"></script>
</body>

</html>