(function() {
    /**
     * Smoother, Faster Counter using RequestAnimationFrame
     */
    const initCounters = () => {
        const valueDisplays = document.querySelectorAll(".stat-number");
        const DURATION = 4000; 

        valueDisplays.forEach((el) => {
            const endValue = parseInt(el.getAttribute("data-val"));
            const startTime = performance.now();

            const animate = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / DURATION, 1);
                const easeOut = 1 - Math.pow(1 - progress, 3);
                const currentValue = Math.floor(easeOut * endValue);

                el.textContent = currentValue.toLocaleString();

                if (progress < 1) {
                    requestAnimationFrame(animate);
                } else {
                    el.textContent = endValue.toLocaleString();
                }
            };
            requestAnimationFrame(animate);
        });
    };

    if (document.readyState === 'complete') {
        initCounters();
    } else {
        window.addEventListener('load', initCounters);
    }
})();

/**
 * Instant Carousel Logic
 * REMOVED: Opacity transitions, fade-ins, and "black" flashes.
 * Uses direct display switching for zero-latency slide changes.
 */
(function() {
    let currentSlide = 0;
    const items = document.querySelectorAll('.carousel-item');
    const dots = document.querySelectorAll('.dot');
    
    if (items.length === 0) return;

    const totalSlides = items.length;
    let slideInterval;

    const showSlide = (nextIndex) => {
        // Handle index wrapping
        let targetIndex = nextIndex;
        if (nextIndex >= totalSlides) targetIndex = 0;
        if (nextIndex < 0) targetIndex = totalSlides - 1;

        items.forEach((item, i) => {
            if (i === targetIndex) {
                // Show target slide
                item.style.opacity = '1';
                item.style.zIndex = '20';
                if (dots[i]) dots[i].classList.add('active-dot');
            } else {
                // Hide others smoothly
                item.style.opacity = '0';
                item.style.zIndex = '10';
                if (dots[i]) dots[i].classList.remove('active-dot');
            }
        });

        currentSlide = targetIndex;
    };

    window.moveSlide = (step) => {
        clearInterval(slideInterval);
        showSlide(currentSlide + step);
        startAutoPlay();
    };

    const startAutoPlay = () => {
        clearInterval(slideInterval);
        slideInterval = setInterval(() => {
            showSlide(currentSlide + 1);
        }, 5000); // 5 seconds is standard
    };

    // Initialize
    const initCarousel = () => {
        items.forEach((item, i) => {
            // Setup initial CSS for layering
            item.style.position = 'absolute';
            item.style.top = '0';
            item.style.left = '0';
            item.style.width = '100%';
            item.style.height = '100%';
            item.style.transition = 'opacity 0.5s ease-in-out'; // The "Smooth" part
            
            if (i === 0) {
                item.style.opacity = '1';
                item.style.zIndex = '20';
            } else {
                item.style.opacity = '0';
                item.style.zIndex = '10';
            }
        });
        
        if (dots.length > 0) {
            dots.forEach((dot, i) => {
                dot.addEventListener('click', () => {
                    clearInterval(slideInterval);
                    showSlide(i);
                    startAutoPlay();
                });
            });
        }
    };

    initCarousel();
    startAutoPlay();
})();