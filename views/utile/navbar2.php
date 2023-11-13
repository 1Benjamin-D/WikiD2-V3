<header class="animated-header">
    <section id="nav">
        <img src="./image/logoDiv2V2.png" alt="logo_du_site">
        <nav>
            <ul>
                <li><a href="../index.php">Accueil</a></li>
                <li class="dropdown">
                    <a href="#"><i>Histoire/Saisons</i> </a>
                    <div class="mega-menu">
                        <div>
                            <div class="item">
                                <ul>
                                    <li class="dropdown2">
                                        <a href="../views/div1.php" class="saison">
                                            <h3><strong>Tom Clancy's The Division</strong></h3>
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="dropdown2">
                                        <a href="../views/div2.php" class="saison">
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
                <li><a href="../views/perso.php">Personnages</a></li>
                <li><a href="../views/commentaire.php">Commentaires</a></li>
                <?php
                if (isset($_SESSION['email'])) {
                    echo '<li><a href="../views/connecter.php">Votre Profil</a></li>';
                } else {
                    echo '<li><a href="../views/connexion.php">Connexion</a></li>';
                }
                ?>
            </ul>
        </nav>
    </section>
</header>