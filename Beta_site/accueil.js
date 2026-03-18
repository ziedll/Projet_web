function setupAnimations() {
    // Animation du titre du header
    const titre = document.querySelector('header h1');
    const logo = document.querySelector('header .logo svg');
    
    if (titre && !titre.classList.contains('animated')) {
        titre.classList.add('animated');
        const texte = titre.textContent;
        titre.textContent = '';
        let i = 0;

        function ecrireTexte() {
            if (i < texte.length) {
                titre.textContent += texte.charAt(i);
                i++;
                setTimeout(ecrireTexte, 100);
            } else {
                // Afficher le logo après l'animation d'écriture
                if (logo) {
                    logo.classList.add('visible');
                }
            }
        }
        ecrireTexte();
    }

    // Configuration de l'Intersection Observer pour les révéals
    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const handleIntersect = function (entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal-visible');
            } else {
                entry.target.classList.remove('reveal-visible');
            }
        });
    };

    const observer = new IntersectionObserver(handleIntersect, options);
    document.querySelectorAll('[class*="reveal-"]').forEach(function (element) {
        observer.observe(element);
    });
}

function setupFiltering() {
    // Récupérer tous les boutons de catégorie
    const filterButtons = document.querySelectorAll('.categories button[data-target]');
    const productCards = document.querySelectorAll('.products .card[data-category]');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const target = this.getAttribute('data-target');

            // Mettre à jour la classe active
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Filtrer les cartes
            productCards.forEach(card => {
                if (target === 'all') {
                    card.style.display = 'block';
                    card.classList.remove('reveal-visible');
                    setTimeout(() => {
                        card.classList.add('reveal-visible');
                    }, 10);
                } else if (card.getAttribute('data-category') === target) {
                    card.style.display = 'block';
                    card.classList.remove('reveal-visible');
                    setTimeout(() => {
                        card.classList.add('reveal-visible');
                    }, 10);
                } else {
                    card.style.display = 'none';
                    card.classList.remove('reveal-visible');
                }
            });
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    setupAnimations();
    setupFiltering();
});

window.setupAnimations = setupAnimations;
window.setupFiltering = setupFiltering;

