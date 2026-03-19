const style = document.createElement("style");
style.innerHTML = `
.card {
    opacity: 0;
    transform: translateY(30px);
    transition: 0.5s;
    cursor: pointer;
}

#article {
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}

#article.visible {
    opacity: 1;
    pointer-events: auto;
}

#list {
    transition: opacity 0.3s ease;
    opacity: 1;
    pointer-events: auto;
}

#list.hidden {
    opacity: 0;
    pointer-events: none;
}
`;
document.head.appendChild(style);

const cards = document.querySelectorAll(".card");

window.addEventListener("load", () => {
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = "1";
            card.style.transform = "translateY(0)";
        }, index * 150);
    });
});

function openArticle(id) {
    const list = document.getElementById("list");
    const article = document.getElementById("article");

    list.classList.add("hidden");

    setTimeout(() => {
        list.style.display = "none";
        article.style.display = "grid";
        article.classList.add("visible");
    }, 300);

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
    const list = document.getElementById("list");
    const article = document.getElementById("article");

    article.classList.remove("visible");
    list.classList.remove("hidden");

    setTimeout(() => {
        article.style.display = "none";
        list.style.display = "grid";
    }, 300);
}
