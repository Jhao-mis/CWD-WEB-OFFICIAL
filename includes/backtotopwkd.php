<!-- Back to Top Styling -->
<style>
    #backToTop {
        opacity: 0;
        visibility: hidden;
        transition: all 0.4s ease;
        bottom: 100px;
        right: 25px;
    }

    #backToTop.show {
        background-color: #1a589e;
        opacity: .8;
        visibility: visible;
        transform: translateY(0);
    }

    #backToTop:not(.show) {
        transform: translateY(20px);
    }
</style>

<!-- Back to Top Button -->
<button id="backToTop" class="fixed z-50 p-3 brand-bg text-white rounded-2xl shadow-2xl hover:scale-110 active:scale-95 transition-all duration-300 flex items-center justify-center">
    <i class="fa-solid fa-arrow-up text-xl"></i>
</button>

<!-- Back to Top Logic -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const backToTopBtn = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>