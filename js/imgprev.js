      // Global state for image transform
        let currentScale = 1;
        let currentX = 0;
        let currentY = 0;
        let isDragging = false;
        let startX, startY;

        const MIN_SCALE = 1;
        const MAX_SCALE = 4; // Maximum zoom level
        const ZOOM_INCREMENT = 0.15; // Increased increment for scroll wheel feel

        document.addEventListener('DOMContentLoaded', () => {
            // --- Tab Logic ---
            const tabLinks = document.querySelectorAll('.tab-link');
            const tabContents = document.querySelectorAll('.tab-content');
            const activeClasses = ['text-blue-700', 'font-semibold', 'bg-blue-50', 'border-blue-700'];
            const inactiveClasses = ['border-transparent', 'hover:bg-blue-50', 'hover:text-blue-700'];

            function switchTab(targetId) {
                tabContents.forEach(content => content.classList.add('hidden'));
                tabLinks.forEach(link => {
                    link.classList.remove(...activeClasses);
                    link.classList.add(...inactiveClasses); 
                });
                const targetContent = document.querySelector(targetId);
                if(targetContent) targetContent.classList.remove('hidden');
                const activeLink = document.querySelector(`[data-tab-target="${targetId}"]`);
                if(activeLink) {
                    activeLink.classList.remove(...inactiveClasses);
                    activeLink.classList.add(...activeClasses);
                }
            }

            tabLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const target = link.getAttribute('data-tab-target');
                    switchTab(target);
                });
            });

            // Initialize: Open the first tab by default
            switchTab('#content-2025');
            
            // --- Pan/Drag Logic Setup ---
            const imageContainer = document.getElementById('modal-image-container');
            const imageWrapper = document.getElementById('modal-image-wrapper');
            
            /**
             * Updates the CSS transform property on the image wrapper.
             */
            function updateTransform() {
                if (imageWrapper) {
                    imageWrapper.style.transform = `translate(${currentX}px, ${currentY}px) scale(${currentScale})`;
                    imageContainer.style.cursor = currentScale > MIN_SCALE ? 'grab' : 'default';
                }
            }

            function onDragStart(e) {
                // Only allow drag if image is zoomed in
                if (currentScale <= MIN_SCALE) return; 

                isDragging = true;
                // Get starting mouse/touch position
                startX = e.clientX || e.touches[0].clientX;
                startY = e.clientY || e.touches[0].clientY;
                imageContainer.style.cursor = 'grabbing';
                e.preventDefault(); // Prevent default browser drag behavior
            }

            function onDragMove(e) {
                if (!isDragging) return;

                const x = e.clientX || e.touches[0].clientX;
                const y = e.clientY || e.touches[0].clientY;
                
                // Calculate the difference
                const dx = x - startX;
                const dy = y - startY;

                // Update current position
                currentX += dx;
                currentY += dy;

                // Update start position for next move
                startX = x;
                startY = y;

                updateTransform();
            }

            function onDragEnd() {
                isDragging = false;
                if (currentScale > MIN_SCALE) {
                    imageContainer.style.cursor = 'grab';
                } else {
                    imageContainer.style.cursor = 'default';
                }
            }

            // Mouse Events
            imageContainer.addEventListener('mousedown', onDragStart);
            document.addEventListener('mousemove', onDragMove);
            document.addEventListener('mouseup', onDragEnd);
            
            // Touch Events for Mobile
            imageContainer.addEventListener('touchstart', onDragStart);
            document.addEventListener('touchmove', onDragMove, { passive: false }); // Use passive: false to allow preventDefault
            document.addEventListener('touchend', onDragEnd);

        });

        // --- Transform Functions ---

        /**
         * Changes the zoom scale and updates the image transform.
         * @param {number} delta The amount to change the scale by.
         */
        function changeScale(delta) {
            const imageWrapper = document.getElementById('modal-image-wrapper');
            if (!imageWrapper) return;
            
            let newScale = currentScale + delta;
            
            // Clamp the scale between min (1) and max (4)
            newScale = Math.max(MIN_SCALE, Math.min(MAX_SCALE, newScale));

            if (newScale !== currentScale) {
                currentScale = newScale;
                
                // If we zoom out past 1, reset position to center
                if (currentScale <= MIN_SCALE) {
                    currentX = 0;
                    currentY = 0;
                }
                
                // Update transformation
                updateTransform(); 
            }
        }
        
        /**
         * Updates the CSS transform property on the image wrapper.
         */
        function updateTransform() {
            const imageWrapper = document.getElementById('modal-image-wrapper');
            const imageContainer = document.getElementById('modal-image-container');
            if (imageWrapper && imageContainer) {
                imageWrapper.style.transform = `translate(${currentX}px, ${currentY}px) scale(${currentScale})`;
                imageContainer.style.cursor = currentScale > MIN_SCALE ? 'grab' : 'default';
            }
        }

        /**
         * Handles the wheel event to zoom in or out.
         * @param {WheelEvent} e The wheel event object.
         */
        function handleWheelZoom(e) {
            e.preventDefault(); // Stop the whole page from scrolling
            
            // DeltaY < 0 means wheel up (zoom in)
            const direction = e.deltaY < 0 ? 1 : -1;
            
            // Use a small increment for smoother scrolling zoom
            changeScale(direction * ZOOM_INCREMENT); 
        }

        /**
         * Resets the zoom and pan parameters to initial state (scale=1, position=0).
         */
        function resetViewState() {
            currentScale = 1;
            currentX = 0;
            currentY = 0;
            // Update transformation
            updateTransform();
        }


        // --- Modal Control Functions ---

        /**
         * Triggered when an image overlay is clicked. Displays the selected image.
         * @param {HTMLElement} overlayElement The 'preview-overlay' div that was clicked.
         */
        function showModal(overlayElement) {
            const imageElement = overlayElement.previousElementSibling;
            
            if (!imageElement || imageElement.tagName !== 'IMG') {
                console.error("Could not find image element for preview.");
                return;
            }

            // Get the image URL from the data attribute (which holds the full resolution path)
            const imageUrl = imageElement.getAttribute('data-image-url');
            const imageCaption = imageElement.getAttribute('data-image-caption') || 'Image Preview';

            const modal = document.getElementById('image-modal');
            const modalImage = document.getElementById('modal-image');
            const modalCaption = document.getElementById('modal-caption');
            const mainNav = document.getElementById('main-navbar'); // Get main nav element

            // Set the image source and caption
            modalImage.src = imageUrl;
            modalCaption.textContent = imageCaption;
            
            // IMPORTANT: Reset zoom and pan whenever a new image is loaded
            resetViewState(); 

            // HIDE THE MAIN NAVIGATION
            if (mainNav) {
                mainNav.classList.add('hidden'); 
            }

            // Display the modal
            modal.classList.remove('hidden');
            
            // Add class to body to hide main content and prevent scroll
            document.body.classList.add('modal-open');
        }

        /**
         * Closes the image preview modal.
         */
        function closeModal() {
            const modal = document.getElementById('image-modal');
            const mainNav = document.getElementById('main-navbar'); // Get main nav element

            modal.classList.add('hidden');
            
            // Reset transform state just in case, before hiding
            resetViewState();

            // SHOW THE MAIN NAVIGATION
            if (mainNav) {
                mainNav.classList.remove('hidden'); 
            }

            // Remove class from body to show main content and re-enable scroll
            document.body.classList.remove('modal-open');
        }

        // Optional: Close modal using the ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !document.getElementById('image-modal').classList.contains('hidden')) {
                closeModal();
            }
        });