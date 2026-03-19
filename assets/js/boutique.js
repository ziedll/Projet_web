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
    
    setTimeout(() => {
        document.querySelectorAll('[class*="reveal-"]').forEach(function (element) {
            observer.observe(element);
        });
    }, 100);
