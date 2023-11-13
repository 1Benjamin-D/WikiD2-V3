<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../WikiD2 V2/views/css/nav.css" />
    <link rel="stylesheet" href="../WikiD2 V2/views/css/index.css" />
    <title>Wiki</title>
</head>

<body>
    <header class="animated-header">
        <section id="nav">
            <img src="./views/image/logoDiv2V2.png" alt="logo_du_site">
            <nav>
                <ul>
                    <li><a href="../WikiD2 V2/index.php">Accueil</a></li>
                    <li class="dropdown">
                        <a href="#"><i>Histoire/Saisons</i> </a>
                        <div class="mega-menu">
                            <div>
                                <div class="item">
                                    <ul>
                                        <li class="dropdown2">
                                            <a href="./views/div1.php" class="saison">
                                                <h3><strong>Tom Clancy's The Division</strong></h3>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="dropdown2">
                                            <a href="./views/div2.php" class="saison">
                                                <h3><strong>Tom Clancy's The Division 2</strong></h3>
                                            </a>
                                            <div class="mega-menu2">
                                                <div>
                                                    <div class="item">
                                                        <a href="#">
                                                            <h3>Warlords of New York</h3>
                                                        </a>
                                                        <a href="#">
                                                            <h3>Périphérie de Washington - Expéditions</h3>
                                                        </a>
                                                        <a href="#">
                                                            <h3>Le Pentagone - Le dernier bastion</h3>
                                                        </a>
                                                        <a href="#">
                                                            <h3>Coney Island : La traque</h3>
                                                        </a>
                                                        <a href="#">
                                                            <h3>Shadow Tide</h3>
                                                        </a>
                                                        <a href="#">
                                                            <h3>L’Héritage de Keener</h3>
                                                        </a>
                                                        <a href="#">
                                                            <h3>Agenda Secret</h3>
                                                        </a>
                                                        <a href="#">
                                                            <h3>Fin de Service</h3>
                                                        </a><a href="#">
                                                            <h3>Alliance Secrète</h3>
                                                        </a>
                                                        </a><a href="#">
                                                            <h3>Le Prix du Pouvoir</h3>
                                                        </a>
                                                        </a><a href="#">
                                                            <h3>Le Règne du Feu</h3>
                                                        </a>
                                                        </a><a href="#">
                                                            <h3>Ailes brisées</h3>
                                                        </a>
                                                        </a><a href="#">
                                                            <h3>La Cabale</h3>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.item -->
                            </div>
                        </div>
                        <!-- .mega-menu-->
                    </li>
                    <!-- .dropdown -->
                    <li><a href="./views/perso.php">Personnages</a></li>
                    <li><a href="./views/commentaire.php">Commentaires</a></li>
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo '<li><a href="./views/connecter.php">Votre Profil</a></li>';
                    } else {
                        echo '<li><a href="./views/connexion.php">Connexion</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </section>
    </header>
    <main>
        <div id="main_back">
            <img src="./views/image/div2_wallp2.jpg" alt="division2" id="div2">
            <img src="./views/image/div_name2.png" alt="division_nom" id="div_name">
        </div>
        <h1>Actualités</h1>
        <div id="bloc_actu">
            <div class="actu">
                <img src="./views/image/incursion_wallp.png" alt="incursion_image" style="width: 100%;">
                <h2><strong>Incursion: Paradis Perdu</strong></h2><br>
                <p>La première incursion – intitulée « <strong>Paradis perdu</strong> » - verra quatre agents de la Division travailler pour libérer le domaine en feu de Meret, qui a été assailli par les Nettoyeurs. La Division doit localiser et sauver les survivants cachés et leur chef - Mackenzie Meret - mais devra affronter des ennemis particulièrement coriaces en cours de route.</p><br>
                <a href="#" class="more">En savoir plus</a>
            </div>
            <div class="actu">
                <img src="./views/image/la_cabala_wallp.webp" alt="la_cabale_image" style="width: 100%;">
                <h2><strong>Année 5: Saison 2</strong></h2><br>
                <p>Les agents doivent retrouver le reste des otages. Parmi eux se trouve Vikram Malik, qui a été emmené par le Black Tusk qui travaillait autrefois avec <strong>Sokolova</strong>. Sauver Malik signifie en apprendre davantage sur ses manigances. Dans le cadre de leur mission de sauvetage, la Division doit traquer et affronter <strong>le Recruteur</strong>, la cible principale de la saison 2. Éliminer le Recruteur aidera à découvrir les secrets de qui et pourquoi il recrute.</p><br>
                <a href="#" class="more">En savoir plus</a>
            </div>
            <div class="actu">
                <img src="./views/image/nexus_event.webp" alt="nexus_event_image" style="width: 100%;">
                <h2><strong>Évènement vestimentaire: Nexus</strong></h2><br>
                <p>Les agents doivent combattre avec style alors participer à l'évenement vestimentaire nexus pour obtenir gratuitement et pendant une durée limité des vêtement avec un style <strong>cyberpunk</strong>.<br>(les autres agents seront jaloux de vous en voyant briller de mille led)</p><br>
                <a href="#" class="more">En savoir plus</a>
            </div>
            <div class="actu">
                <img src="./views/image/Collector_exo.jpg" alt="collector_exotique_image" style="width: 100%;">
                <h2><strong>Nouvel équipement exotique</strong></h2><br>
                <p>Les agents ont besoins de grenades, beaucoup de granades pour combatre les dangers actuels et futurs.<br>
                    Découvrez la toute nouvelle pièce d'équipement éxotique ainsi que ses talents uniques en participant à la saison de <strong>La Cabale</strong> pour l'obtenir.</p><br>
                <a href="#" class="more">En savoir plus</a>
            </div>
            <div class="actu">
                <img src="./views/image/raid_wallp.jpg" alt="raid_image" style="width: 100%;">
                <h2><strong>Opération Heure Sombre et Cheval de Fer</strong></h2><br>
                <p>Les raids sont un défi de très grande envergure qui attend nos agents par groupes de 8 personnes. <br>
                    Reviendront-ils entiers de ce défi de grande ampleur ?<br>
                    Participez-y avec vos amis ou des personnes du monde entier pour le découvrir.</p><br>
                <a href="#" class="more">En savoir plus</a>
            </div>
            <div class="actu">
                <img src="./views/image/traque.jpg" alt="traque_image" style="width: 100%;">
                <h2><strong>Opération de Traque</strong></h2><br>
                <p>Progressez dans la saison pour débloquer les <strong>Traques Héritages</strong> et revivez les missions où les agents ont affronté leurs adversaires les plus redoutables et emblématiques.</p><br>
                <a href="#" class="more">En savoir plus</a>
            </div>
        </div>
    </main>
    <footer>
        <div id="footer_general">
            <div id="footerT">
                <h2>DISCORD OFFICIEL</h2>
                <a href="https://discord.com/invite/thedivisiongame"><img src="./views/image/discord_logo.png" alt="discord" style="width: 5%;"></a>
            </div>
            <div id="footerF">
                <div id="footerL">
                    <img src="./views/image/Ubisoft_logo.png" alt="ubisoft_logo"><br>
                    <a href="https://www.ubisoft.com/fr-fr/">SITE OFFICIEL UBISOFT</a><br><br>
                    <a href="#">MENTIONS LÉGALS</a><br><br>
                    <p>© 2020 Ubisoft Entertainment. All Rights Reserved. Tom Clancy’s, The Division logo, the Soldier Icon, Snowdrop, Ubisoft, and the Ubisoft logo are registered or unregistered trademarks of Ubisoft Entertainment in the US and/or other countries.</p>
                </div>
                <div id="footerR">
                    <img src="./views/image/div_name2.png" alt="div2_logo">
                    <div id="link">
                        <div id="studio">
                            <h2>Studios</h2><br>
                            <a href="https://www.massive.se">MASSIVE</a>
                        </div>
                        <div id="plateforms">
                            <h2>Plateformes:</h2><br>
                            <a href="https://www.xbox.com/fr-FR/consoles/xbox-series-x">XBOX SERIES X|S</a><br><br>
                            <a href="https://www.xbox.com/fr-FR/consoles">XBOX ONE</a><br><br>
                            <a href="https://www.playstation.com/fr-fr/ps4/">PLAYSTATION 4</a><br><br>
                            <a href="https://ubisoftconnect.com/fr-FR/">UBISOFT CONNECT</a><br><br>
                            <a href="https://www.amazon.com/luna/landing-page">AMAZON LUNA</a><br><br>
                            <p>Bien joué si tu as trouvé ce text</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>