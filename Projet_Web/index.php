<?php
$articles = [
    ["titre" => "Ouverture officielle du serveur", "contenu" => "Le serveur Cubic Infrastructure Group est ouvert à tous. Explorez le monde, construisez et participez aux événements."],
    ["titre" => "Événement PvP", "contenu" => "Tournoi PvP ce week-end avec récompenses exclusives pour les meilleurs joueurs."],
    ["titre" => "Mise à jour du serveur", "contenu" => "Nouvelles zones d'exploration ajoutées et optimisations du serveur."]
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubic Infrastructure Group</title>
</head>
<body>

<header>
    <h1>Cubic Infrastructure Group</h1>
    <nav>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Actualités</a></li>
            <li><a href="#">Classements</a></li>
            <li><a href="#">Infrastructure</a></li>
            <li><a href="#">Boutique</a></li>
            <li><a href="#">Connexion</a></li>
        </ul>
    </nav>
</header>

<main>

    <section id="presentation">
        <h2>Présentation du serveur</h2>
        <p>
            Cubic Infrastructure Group est un serveur Minecraft communautaire, proposant une expérience immersive
            avec exploration, construction et événements PvP/PvE.
        </p>
    </section>

    <section id="video">
        <h2>Vidéo de présentation</h2>
        <video controls width="600">
            <source src="video/serveur.mp4" type="video/mp4">
        </video>
        <p>Découvrez le serveur et ses fonctionnalités dans cette vidéo.</p>
    </section>

    <section id="fonctionnalites">
        <h2>Fonctionnalités principales</h2>
        <ul>
            <li>Classements détaillés des joueurs</li>
            <li>Événements et tournois réguliers</li>
            <li>Infrastructure stable et performante</li>
            <li>Boutique dynamique avec objets et récompenses</li>
            <li>Espace joueur sécurisé avec profil personnalisé</li>
        </ul>
    </section>

    <section id="actualites">
        <h2>Actualités du serveur</h2>
        <?php foreach ($articles as $article): ?>
            <article>
                <h3><?php echo $article['titre']; ?></h3>
                <p><?php echo $article['contenu']; ?></p>
            </article>
        <?php endforeach; ?>
    </section>

    <section id="infrastructure">
        <h2>État de l'infrastructure</h2>
        <p>
            Le serveur et les services associés sont surveillés en permanence pour assurer stabilité,
            performance et sécurité. Des maintenances régulières permettent de garder le serveur optimal.
        </p>
    </section>

</main>

<footer>
    <p>© Cubic Infrastructure Group - Plateforme officielle du serveur Minecraft</p>
</footer>

</body>
</html>