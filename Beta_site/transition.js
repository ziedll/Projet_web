document.addEventListener('DOMContentLoaded', () => {
    const swup = new Swup({
        containers: ['#swup'],
        animationSelector: '[class*="transition-"]'
    });

    swup.hooks.on('page:view', () => {
        console.log("Nouvelle page chargée !");
        if (window.setupAnimations) {
            window.setupAnimations();
        }
        if (window.setupFiltering) {
            window.setupFiltering();
        }
    });
});