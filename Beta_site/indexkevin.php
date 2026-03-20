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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./boutique.css">
    <script src="https://unpkg.com/swup@4"></script>
    <script src="./transition.js"></script>
    <title>Cubic Infrastructure Group</title>
</head>
<body>

<header>
    <div class="logo">
        <svg width="50" height="50" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <!-- Cube -->
            <polygon points="50,10 90,30 50,50 10,30" fill="#38bdf8"/>
            <polygon points="10,30 50,50 50,90 10,70" fill="#0ea5e9"/>
            <polygon points="90,30 50,50 50,90 90,70" fill="#0284c7"/>
            <!-- Highlight -->
            <polygon points="50,10 90,30 50,50" fill="#7dd3fc" opacity="0.6"/>
        </svg>
        <h1>Cubic Infrastructure Group</h1>
    </div>
    <nav>
        <ul>
            <li><a href="./indexkevin.php" class="active">Accueil</a></li>
            <li><a href="./boutique.php">Boutique</a></li>
            <li><a href="./actualite.php">Actualités</a></li>
            <li><a href="#">Classements</a></li>
            <li><a href="./contact.php">Contact</a></li>
            <li><a href="#">Connexion</a></li>
        </ul>
    </nav> 
</header>
<main id="swup" class="transition-fade">
    <div class>
    <section id="presentation">
        <h2 class="reveal-1">Présentation du serveur</h2>
        <p class="reveal-2">
            Cubic Infrastructure Group est un serveur Minecraft communautaire, proposant une expérience immersive
            avec exploration, construction et événements PvP/PvE.
        </p>
    </section>
    </div>

    <section id="video">
        <h2 class="reveal-1">Vidéo de présentation</h2>
        <video controls width="600" class="reveal-2">
            <source src="video/serveur.mp4" type="video/mp4">
        </video>
        <p class="reveal-2">Découvrez le serveur et ses fonctionnalités dans cette vidéo.</p>
    </section>

    <section id="fonctionnalites">
        <h2 class="reveal-1">Fonctionnalités principales</h2>
        <ul class="reveal-2">
            <li>Classements détaillés des joueurs</li>
            <li>Événements et tournois réguliers</li>
            <li>Infrastructure stable et performante</li>
            <li>Boutique dynamique avec objets et récompenses</li>
            <li>Espace joueur sécurisé avec profil personnalisé</li>
        </ul>
    </section>

    <section id="actualites" >
        <h2 class="reveal-1">Actualités du serveur</h2>
        <?php foreach ($articles as $article): ?>
            <article class="reveal-2">
                <h3 class="reveal-2"><?php echo $article['titre']; ?></h3>
                <p class="reveal-2"><?php echo $article['contenu']; ?></p>
            </article>
        <?php endforeach; ?>
    </section>

    <section id="infrastructure">
        <h2 class="reveal-1">État de l'infrastructure</h2>
        <p class="reveal-2">
            Le serveur et les services associés sont surveillés en permanence pour assurer stabilité,
            performance et sécurité. Des maintenances régulières permettent de garder le serveur optimal.
        </p>
    </section>

</main>

<footer>
    <p>© Cubic Infrastructure Group - Plateforme officielle du serveur Minecraft</p>
</footer>

<script src="accueil.js"></script>

</body>
</html>