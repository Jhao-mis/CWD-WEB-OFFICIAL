 // Sidebar Controls
        const openBtn = document.getElementById('mobile-menu-open');
        const closeBtn = document.getElementById('mobile-menu-close');
        const sidebar = document.getElementById('mobile-offcanvas');
        const overlay = document.getElementById('offcanvas-overlay');

        function toggleMenu(show) {
            if (show) {
                sidebar.classList.add('open');
                overlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            } else {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        openBtn.addEventListener('click', () => toggleMenu(true));
        closeBtn.addEventListener('click', () => toggleMenu(false));
        overlay.addEventListener('click', () => toggleMenu(false));

        // Mobile Dropdown/Accordion Toggle
        const accordionBtns = document.querySelectorAll('.mobile-dropdown-btn');
        accordionBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const content = btn.nextElementSibling;
                const icon = btn.querySelector('.rotate-icon');
                
                // Toggle current
                const isOpen = content.classList.contains('show');
                
                // Close others (Optional: comment out if you want multiple open)
                document.querySelectorAll('.mobile-dropdown-content').forEach(c => c.classList.remove('show'));
                document.querySelectorAll('.rotate-icon').forEach(i => i.classList.remove('active'));

                if (!isOpen) {
                    content.classList.add('show');
                    icon.classList.add('active');
                }
            });
        });

        // Simple Tab Switcher
        function switchTab(id) {
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
            document.querySelectorAll('.tab-card').forEach(c => {
                c.classList.remove('active');
                c.classList.add('text-slate-600', 'hover:bg-slate-100');
            });
            
            document.getElementById(id).classList.add('active');
            const target = Array.from(document.querySelectorAll('.tab-card')).find(b => b.outerHTML.includes(id));
            if(target) {
                target.classList.add('active');
                target.classList.remove('text-slate-600', 'hover:bg-slate-100');
            }
        }

        // Carousel Logic
        let currentIdx = 0;
        const slides = document.querySelectorAll('.carousel-item');
        const indicators = document.querySelectorAll('.indicator');
        const totalSlides = slides.length;
        let slideInterval;

        function showSlide(index) {
            // Remove current active state
            slides[currentIdx].classList.remove('active');
            indicators[currentIdx].classList.remove('active');

            // Update index
            if (index >= totalSlides) currentIdx = 0;
            else if (index < 0) currentIdx = totalSlides - 1;
            else currentIdx = index;

            // Apply new active state
            slides[currentIdx].classList.add('active');
            indicators[currentIdx].classList.add('active');
        }

        function nextSlide() {
            showSlide(currentIdx + 1);
        }

        function prevSlide() {
            showSlide(currentIdx - 1);
        }

        function restartInterval() {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, 5000);
        }

        // Event Attachments
        document.getElementById('nextBtn').addEventListener('click', () => {
            nextSlide();
            restartInterval();
        });

        document.getElementById('prevBtn').addEventListener('click', () => {
            prevSlide();
            restartInterval();
        });

        indicators.forEach((ind, i) => {
            ind.addEventListener('click', () => {
                showSlide(i);
                restartInterval();
            });
        });

        // Initialize Carousel on Load
        window.addEventListener('load', () => {
            showSlide(0);
            restartInterval();
        });