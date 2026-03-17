<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Articles - Cubic</title>
    <link rel="stylesheet" href="actu.css">
</head>

<body>

<header>
    <div class="logo">
        <h2>Cubic</h2>
    </div>

    <nav>
        <a href="#">Accueil</a>
        <a href="#" class="active">Actualités</a>
        <a href="#">Boutique</a>
    </nav>
</header>

<!-- HERO -->
<section class="hero">
    <h1>Actualités du serveur</h1>
    <p>Les nouveautés t’attendent </p>
</section>

<!-- LISTE ARTICLES -->
<section class="products" id="list">

    <div class="card" onclick="openArticle(1)">
        <h3>Mise à jour majeure 🚀</h3>
        <p>
            Une mise à jour importante arrive sur le serveur avec de nombreuses
            améliorations du gameplay, de nouvelles fonctionnalités et des événements.
        </p>
    </div>

    <div class="card" onclick="openArticle(2)">
        <h3>Ajout du PvP ⚔️</h3>
        <p>
            Le système de combat a été entièrement repensé pour offrir une
            meilleure expérience et plus d'équilibre entre les joueurs.
        </p>
    </div>

    <div class="card" onclick="openArticle(3)">
        <h3>Nouvelle économie 💰</h3>
        <p>
            Découvrez un système économique inédit avec un marché dynamique,
            des échanges entre joueurs et une nouvelle monnaie.
        </p>
    </div>

</section>

<!-- ARTICLE COMPLET -->
<section class="products" id="article" style="display:none;">

    <div class="card" style="grid-column: span 2; text-align:left;" id="articleContent">
    </div>

    <button onclick="backToList()" style="margin:20px;">⬅ Retour</button>

</section>

<script>

function openArticle(id) {
    document.getElementById("list").style.display = "none";
    document.getElementById("article").style.display = "grid";

    let content = "";

    if(id === 1){
        content = `
            <h3>Mise à jour majeure 🚀</h3>

            <p>
                Après plusieurs mois de développement, l'équipe Cubic est fière
                d'annoncer une mise à jour majeure du serveur. Cette update
                apporte une refonte globale de nombreux systèmes afin d'améliorer
                l'expérience des joueurs.
            </p>

            <p>
                De nouvelles zones ont été ajoutées, avec des environnements
                uniques et des défis inédits. Les joueurs pourront explorer
                ces régions pour obtenir des récompenses exclusives.
            </p>

            <p>
                En parallèle, les performances du serveur ont été optimisées
                afin d'assurer une meilleure fluidité, même lors des événements
                regroupant un grand nombre de joueurs.
            </p>

            <p>
                Cette mise à jour marque une étape importante dans l'évolution
                du serveur et prépare l'arrivée de nombreuses fonctionnalités
                à venir.
            </p>
        `;
    }

    if(id === 2){
        content = `
            <h3>Ajout du PvP ⚔️</h3>

            <p>
                Le mode PvP fait son grand retour sur Cubic avec un système
                entièrement repensé pour offrir des combats plus dynamiques
                et équilibrés.
            </p>

            <p>
                Les armes ont été rééquilibrées et de nouvelles compétences
                ont été ajoutées afin de diversifier les styles de jeu.
                Chaque joueur pourra désormais adapter sa stratégie en
                fonction de son équipement.
            </p>

            <p>
                Un système de classement a également été introduit, permettant
                aux meilleurs joueurs de se démarquer et de gagner des
                récompenses exclusives.
            </p>

            <p>
                Ce nouveau PvP vise à créer une compétition saine et à renforcer
                l'aspect communautaire du serveur.
            </p>
        `;
    }

    if(id === 3){
        content = `
            <h3>Nouvelle économie 💰</h3>

            <p>
                Une refonte complète de l'économie du serveur a été mise en place
                afin d'apporter plus de réalisme et d'interactions entre les joueurs.
            </p>

            <p>
                Un marché dynamique permet désormais d'acheter et vendre des
                ressources, avec des prix qui évoluent en fonction de l'offre
                et de la demande.
            </p>

            <p>
                Les joueurs peuvent également créer leurs propres commerces
                et développer leur activité économique au sein du serveur.
            </p>

            <p>
                Ce système encourage la coopération, les échanges et ajoute
                une dimension stratégique à l'expérience de jeu.
            </p>
        `;
    }

    document.getElementById("articleContent").innerHTML = content;
}

function backToList() {
    document.getElementById("list").style.display = "grid";
    document.getElementById("article").style.display = "none";
}

</script>

<footer>
    © 2026 Cubic
</footer>

</body>
</html>