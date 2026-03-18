<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Articles - Cubic</title>
    <link rel="stylesheet" href="actualite.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://unpkg.com/swup@4"></script>
    <script src="actualite.js"></script>
    <script src="transition.js"></script>
    <script src="accueil.js"></script>
    <script src="actualite.js"></script>
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
        <a href="./indexkevin.php">Accueil</a>
        <a href="./boutique.php" class="active">Boutique</a>
        <a href="./actualite.php" class="active">Actualités</a>
        <a href="#">Classement</a>
        <a href="./contact.php">Contact</a>
        <a href="#">Connexion</a>
    </nav>
</header>

<main id="swup" class="transition-fade">
<section class="hero">
    <h1>Actualités du serveur</h1>
    <p>Les nouveautés t’attendent </p>
</section>

<section class="products" id="list">
    <div class="card reveal-2" onclick="openArticle(1)">
        <h3>Mise à jour majeure 🚀</h3>
        <p>
            Une mise à jour importante arrive sur le serveur avec de nombreuses
            améliorations du gameplay, de nouvelles fonctionnalités et des événements.
        </p>
    </div>

    <div class="card reveal-2" onclick="openArticle(2)">
        <h3>Ajout du PvP ⚔️</h3>
        <p>
            Le système de combat a été entièrement repensé pour offrir une
            meilleure expérience et plus d'équilibre entre les joueurs.
        </p>
    </div>

    <div class="card reveal-2" onclick="openArticle(3)">
        <h3>Nouvelle économie 💰</h3>
        <p>
            Découvrez un système économique inédit avec un marché dynamique,
            des échanges entre joueurs et une nouvelle monnaie.
        </p>
    </div>

</section>

<section class="products" id="article" style="display:none;">

    <div class="card" style="grid-column: span 2; text-align:left;" id="articleContent">
    </div>

    <button onclick="backToList()" style="margin:20px;">⬅ Retour</button>

</section>
</main>
<footer>
    © 2026 Cubic
</footer>

</body>
</html>