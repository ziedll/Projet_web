const style = document.createElement("style");
style.innerHTML = `
.card {
    opacity: 0;
    transform: translateY(30px);
    transition: 0.5s;
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

    list.style.opacity = "0";

    setTimeout(() => {
        list.style.display = "none";
        article.style.display = "grid";
        article.style.opacity = "1";
    }, 300);

    let content = "";

    if (id === 1) {
        content = `<h3>Mise à jour majeure</h3><p>Nouvelle update du serveur avec améliorations importantes.</p>`;
    }

    if (id === 2) {
        content = `<h3>Ajout du PvP</h3><p>Nouveau système de combat plus équilibré.</p>`;
    }

    if (id === 3) {
        content = `<h3>Nouvelle économie</h3><p>Système économique avec marché dynamique.</p>`;
    }

    document.getElementById("articleContent").innerHTML = content;
}

function backToList() {

    const list = document.getElementById("list");
    const article = document.getElementById("article");

    article.style.opacity = "0";

    setTimeout(() => {
        article.style.display = "none";
        list.style.display = "grid";
        list.style.opacity = "1";
    }, 300);
}