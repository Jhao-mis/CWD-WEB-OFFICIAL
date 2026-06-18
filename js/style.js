// Cards (Payment Centers Page)

tailwind.config = {
    theme: {
        extend: {
            colors: {
                // Inferring colors based on common patterns and previous blue theme
                'brand': '#1a589e',
                'brand-strong': '#14467d',
                'brand-medium': '#4270ae',
                'neutral-primary-soft': '#ffffff', // White or very light background
                'default': '#e5e7eb', // Light gray border
                'text-heading': '#1f2937', // Dark gray/black
                'text-body': '#4b5563', // Medium gray
            },
            borderRadius: {
                'base': '0.5rem', // rounded-lg
            },
            boxShadow: {
                'xs': '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
            }
        }
    }
}

// Modal (water Service Notice Page)
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('main-modal');
    const mainNavWrapper = document.getElementById('main-nav-wrapper'); // Reference to the blue/red content links
    const mainNavbar = document.getElementById('main-navbar'); // Reference to the fixed top bar (NEW)

    const modalTitle = document.getElementById('modal-title');
    const modalContent = document.getElementById('modal-content');
    const modalAccept = document.getElementById('modal-accept');
    const navLinks = document.querySelectorAll('.lnav-link, .lnav-link-red');
    const closeButtons = document.querySelectorAll('#close-modal-x, #close-modal-btn');

    // Mobile menu references
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const closeMenuButton = document.getElementById('close-menu-button');
    const offcanvasMenu = document.getElementById('offcanvas-menu');

    let currentHref = '#'; // Stores the href of the clicked link

    // --- Mobile Menu Logic ---
    if (mobileMenuButton) {
        mobileMenuButton.addEventListener('click', () => {
            offcanvasMenu.classList.remove('translate-x-full');
        });
    }

    if (closeMenuButton) {
        closeMenuButton.addEventListener('click', () => {
            offcanvasMenu.classList.add('translate-x-full');
        });
    }


    // --- Modal Open/Close Functions ---
    const openModal = (title, content, href) => {
        // HIDE BOTH MAIN NAVIGATION ELEMENTS
        if (mainNavWrapper) {
            mainNavWrapper.classList.add('hidden');
        }
        if (mainNavbar) {
            mainNavbar.classList.add('hidden');
        }

        modalTitle.textContent = title;
        modalContent.innerHTML = content;
        currentHref = href;

        // Button text and action logic
        if (href && href !== '#') {
            modalAccept.textContent = 'Go to Service';
        } else {
            modalAccept.textContent = 'Acknowledge';
        }

        modalAccept.onclick = () => {
            if (currentHref && currentHref !== '#') {
                // In a real application, this would redirect or trigger a function
                console.log("Navigating to:", currentHref);
                closeModal();
            } else {
                closeModal();
            }
        };

        modal.classList.remove('hidden');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('overflow-hidden'); // Prevent background scrolling
    };

    const closeModal = () => {
        // SHOW BOTH MAIN NAVIGATION ELEMENTS AGAIN
        if (mainNavWrapper) {
            mainNavWrapper.classList.remove('hidden');
        }
        if (mainNavbar) {
            mainNavbar.classList.remove('hidden');
        }

        modal.classList.add('hidden');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('overflow-hidden');
    };

    // --- Attach Event Listeners to Nav Links ---
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();

            // Get the text content from <h5> and use it directly as the title.
            const title = link.querySelector('h5').textContent.trim();

            const content = link.getAttribute('data-content') || '<p class="text-body">No detailed content available for this service.</p>';
            const href = link.getAttribute('href') || '#';

            openModal(title, content, href);
        });
    });

    // --- Attach Event Listeners to Close Buttons ---
    closeButtons.forEach(btn => {
        btn.addEventListener('click', closeModal);
    });

    // Close modal when clicking outside (on the backdrop)
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close modal on escape key press
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
});



// --- Image Carousel Logic (News Post Page) ---
const carouselTrack = document.getElementById('carousel-track');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');
const carouselDots = document.getElementById('carousel-dots');
const images = carouselTrack.querySelectorAll('img');
const totalImages = images.length;
let currentIndex = 0;

// Initialize dots
for (let i = 0; i < totalImages; i++) {
    const dot = document.createElement('span');
    dot.classList.add('dot', 'w-3', 'h-3', 'bg-gray-300', 'rounded-full', 'cursor-pointer');
    dot.dataset.index = i;
    dot.addEventListener('click', () => {
        currentIndex = i;
        updateCarousel();
    });
    carouselDots.appendChild(dot);
}

function updateCarousel() {
    // Calculate the horizontal shift needed
    const offset = -currentIndex * 100;
    carouselTrack.style.transform = `translateX(${offset}%)`;

    // Update active dot
    const dots = carouselDots.querySelectorAll('.dot');
    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === currentIndex);
    });
}

prevBtn.addEventListener('click', () => {
    currentIndex = (currentIndex > 0) ? currentIndex - 1 : totalImages - 1;
    updateCarousel();
});

nextBtn.addEventListener('click', () => {
    currentIndex = (currentIndex < totalImages - 1) ? currentIndex + 1 : 0;
    updateCarousel();
});

// Initial setup
updateCarousel();


// --- Share Link Logic ---
function copyShareLink() {
    const shareUrl = window.location.href;

    // Fallback for secure context (execCommand is necessary for environments like Canvas)
    const tempInput = document.createElement('input');
    tempInput.value = shareUrl;
    document.body.appendChild(tempInput);
    tempInput.select();

    let success = false;
    try {
        success = document.execCommand('copy');
    } catch (err) {
        console.error('Could not copy text: ', err);
    }

    document.body.removeChild(tempInput);

    // Display success message
    if (success) {
        const message = document.getElementById('copy-message');
        message.classList.remove('opacity-0');
        message.classList.add('opacity-100');
        setTimeout(() => {
            message.classList.remove('opacity-100');
            message.classList.add('opacity-0');
        }, 2000);
    } else {
        // If copy fails, you could show the link directly
        console.error("Copy failed. Share URL: " + shareUrl);
    }
}


