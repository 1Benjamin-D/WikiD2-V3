<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/nav2.css">
    <link rel="stylesheet" href="./css/div1.css">
</head>

<body>
    <?php include_once "./utile/loading.php"; ?>
    <?php include_once "./utile/navbar2.php"; ?>
    <main>
        <h1>Histoire</h1>
        <img src="./image//div_name.png" alt="division_name_logo" id="div_name">
        <div id="prologue">
            <h2>Prologue:</h2>
            <p>Peu de temps après le Black Friday dans le monde, les gens ont commencé à tomber malade avec une maladie inconnue. Les symptômes étaient initialement modérément graves, de sorte que les médecins et les hôpitaux l'ont pris pour une version plus sérieuse de la grippe porcine. Quand les gens ont commencé à mourir partout dans le monde, ils ont commencé à étudier le virus et se sont rendu compte que c'était la variole. Ils ont distribué le vaccin contre la variole et pensaient que les choses iraient mieux, mais ils ne l'ont pas fait.</p>
        </div>
        <div id="nyc">
            <h2>Dans New York:</h2>
            <p>Les missions sont séparées en 3 catégories:</p>
            <ul>
                <li>Missions <strong class="medical">Médicales</strong></li>
                <li>Missions <strong class="techno">Technologique</strong></li>
                <li>Missions de <strong class="secu">Sécurité</strong></li>
            </ul>
            <div class="image-container">
                <img src="./image/Medical.webp" alt="logo_medical">
                <img src="./image/Tech.webp" alt="logo_tech">
                <img src="./image/Security.webp" alt="logo_security">
            </div>
        </div>
        <div>
            <div id="missions">
                <h2>Missions:</h2>
                <img src="./image/Medical.webp" alt="logo_medical">
                <p class="nom"><strong>Médicales:</strong></p>
                <ul>
                    <li class="medical">
                        Hôpital de campagne de Madison:
                        <p>Les émeutiers ont pris d'assaut l'hôpital de campagne du Madison Square Garden, retenant en otage le personnel du CERA à l'intérieur. Trouvez et sauvez le Dr Jessica Kandel et les autres membres du personnel médical.</p>
                    </li>
                    <li class="medical">
                        Camp de réfugiés d'Hudson:
                        <p>Les civils infectés ont cherché refuge dans un camp à Hudson Rail Yards. Sécurisez les civils pour garantir que le Dr Kandel et son équipe puissent récupérer des échantillons de sang critiques.</p>
                    </li>
                    <li class="medical">
                        Magasin de Broadway:
                        <p>Le grand magasin Abel a été identifié comme un site potentiel de propagation du virus mortel. Trouvez et sécurisez des échantillons de la souche virale originale sur l'argent aux caisses.</p>
                    </li>
                    <li class="medical">
                        Appartement d'Amherst:
                        <p>L'appartement du bioterroriste présumé Gordon Amherst a été situé dans un immeuble résidentiel de Hell's Kitchen. Enquêtez sur le site et récupérez toutes les preuves que vous trouvez.</p>
                    </li>
                    <li class="medical">
                        Consulat Russe:
                        <p>Le virologue Vitaly Tchernenko, un contact connu d'Amherst, est enfermé au consulat russe. Localisez-le et extrayez-le pour qu'il puisse être interrogé.</p>
                    </li>
                </ul>
            </div>
            <div id="missions">
                <img src="./image/Tech.webp" alt="logo_tech">
                <p class="nom"><strong>Technologique:</strong></p>
                <ul>
                    <li class="techno">
                        Morgue du métro:
                        <p>La panne de courant locale a été attribuée aux générateurs de la Subway Morgue. Localisez l'ingénieur disparu de la JTF Paul Rhodes, aidez-le à rétablir le courant et permettez-lui de retourner à la base d'opérations pour ouvrir l'aile technologique.</p>
                    </li>
                    <li class="techno">
                        Relais de puissance de Times Square:
                        <p>Réparez le transformateur de puissance à Times Square avant qu'il ne provoque l'effondrement de tout le réseau.</p>
                    </li>
                    <li class="techno">
                        Académie de police:
                        <p>Un transpondeur de la première vague de la division a commencé à émettre des signaux depuis l'intérieur de l'Académie de police de New York. Examinez la balise et rassemblez toutes les preuves que vous trouvez.</p>
                    </li>
                    <li class="techno">
                        Centrale électrique de WarrenGate:
                        <p>La centrale électrique de WarrenGate a été compromise par les Rikers, menaçant l’approvisionnement électrique de la ville. Sécurisez la centrale électrique et neutralisez les intrus.</p>
                    </li>
                    <li class="techno">
                        Relais de communication sur le toit:
                        <p>Une équipe d'ingénieurs de la Joint Task Force a été envoyée pour restaurer certaines antennes paraboliques, mais elles sont hors de contact. Trouvez les ingénieurs et faites fonctionner les communications.</p>
                    </li>
                </ul>
            </div>
            <div id="missions">
                <img src="./image/Security.webp" alt="logo_security">
                <p class="nom"><strong>Sécuritées:</strong></p>
                <ul>
                    <li class="secu">
                        Point de contrôle du tunnel Lincoln:
                        <p>Le poste de contrôle du tunnel Lincoln est attaqué par des émeutiers. Sécurisez le point de contrôle et ramenez le commandant de la JTF, le capitaine Roy Benitez, à la base d'opérations.</p>
                    </li>
                    <li class="secu">
                        Site de production de napalm:
                        <p>Les Nettoyeurs produisent des quantités massives de napalm dans leur quartier général pour incinérer les civils. Arrêtez la production et éliminez leur chef, Joe Ferro.</p>
                    <li class="secu">
                        Centre d'événements de Lexington:
                        <p>Les Rikers retiennent le personnel de la JTF à leur quartier général sur Lexington Ave. Accédez au bâtiment, neutralisez la chef des Rikers, Larae Barrett, et libérez les otages.</p>
                    </li>
                    <li class="secu">
                        Camp du tunnel du Queens:
                        <p>Infiltrez et éliminez le centre de communication du Last Man Battalion sur le chantier de construction du Queens Tunnel.</p>
                    </li>
                    <li class="secu">
                        Grande gare centrale:
                        <p>Désactivez les tourelles automatisées du Last Man Battalion et aidez la Force opérationnelle interarmées à sécuriser sa base avancée à Grand Central Station.</p>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <?php include_once "./utile/footer.php"; ?>
    <script src="../views/js/loading.js"></script>
</body>

</html>