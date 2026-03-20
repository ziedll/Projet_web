<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Boutique - Cubic Infrastructure</title>
    <link rel="stylesheet" href="boutique.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://unpkg.com/swup@4"></script>
    <script src="transition.js"></script>
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
<span>CUBIC</span>
</div>

    <nav>
        <a href="./indexkevin.php">Accueil</a>
        <a href="./boutique.php" class="active">Boutique</a>
        <a href="./actualite.php">Actualités</a>
        <a href="#">Classement</a>
        <a href="./contact.php">Contact</a>
        <a href="#">Connexion</a>
    </nav>
</header>
<main id="swup" class="transition-fade">
<section class="hero">
    <h1>Boutique Officielle</h1>
    <p>Améliore ton expérience de jeu avec nos offres exclusives</p>
</section>

<section class="categories">
    <button class="active" data-target="all">Tous</button>
    <button data-target="vip">Grades VIP</button>
    <button data-target="cosmetics">Cosmétiques</button>
    <button data-target="coins">Monnaie</button>
</section>

<section class="products">

    <div class="card reveal-2" data-category="vip">
        <div class="badge">Populaire</div>
        <h3>VIP</h3>
        <p>Accès à des avantages exclusifs in game</p>
        <span class="price">5.99€</span>
        <button>Acheter</button>
    </div>

    <div class="card reveal-2" data-category="vip">
        <h3>VIP+</h3>
        <p>Plus de pouvoirs et bonus avancés</p>
        <span class="price">9.99€</span>
        <button>Acheter</button>
    </div>

    <div class="card reveal-2" data-category="vip">
        <h3>MVP</h3>
        <p>Encore plus d'avantages in game</p>
        <span class="price">19.99€</span>
        <button>Acheter</button>
    </div>

    <div class="card reveal-2" data-category="vip">
        <h3>Legend</h3>
        <p>MERCI BEACOUP</p>
        <span class="price">49.99€</span>
        <button>Acheter</button>
    </div>

    <div class="card reveal-2" data-category="cosmetics">
        <div class="badge new">Nouveau</div>
        <h3>Aura de feu </h3>
        <p>Une aura enflamée qui vous suis partout ou vous allez</p>
        <span class="price">3.99€</span>
        <button>Acheter</button>
    </div>

    <div class="card reveal-2" data-category="cosmetics">
        <div class="badge new">Nouveau</div>
        <h3>Pet Dragon</h3>
        <p>Dragon qui vous suis partout visible par les autres joeurs, classe assuré</p>
        <span class="price">9.99€</span>
        <button>Acheter</button>
    </div>

    <div class="card reveal-2" data-category="coins">
        <h3>1000 CubiCoins</h3>
        <p>Monnaie virtuelle utilisable en jeu</p>
        <span class="price">9.99€</span>
        <button>Acheter</button>
    </div>

    <div class="card reveal-2" data-category="coins">
        <h3>5000 CubiCoins</h3>
        <p>Monnaie virtuelle utilisable en jeu</p>
        <span class="price">49.99€</span>
        <button>Acheter</button>
    </div>
    

</section>
<div class="disclaimer">
    <p> chaque pack vip contient les avantages des packs en dessous</p>
</div>
</main>

<footer>
    <p>© Cubic Infrastructure Group - Plateforme officielle du serveur Minecraft</p>
</footer>

<script src="./accueil.js"></script>

</body>
</html>