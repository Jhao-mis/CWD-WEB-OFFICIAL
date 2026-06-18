document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('logo-sidebar');
            const toggleButton = document.getElementById('sidebarToggle');
            const mainContent = document.querySelector('.sm\\:ml-64');

            // Function to toggle the sidebar on mobile
            function toggleSidebar() {
                const isHidden = sidebar.classList.contains('-translate-x-full');

                // Toggle visibility on mobile
                sidebar.classList.toggle('-translate-x-full', !isHidden);
                
                // For a cleaner mobile experience, we can optionally hide the button 
                // when the sidebar is open, but keeping it visible allows closing.
            }

            // Event listener for the toggle button
            toggleButton.addEventListener('click', (event) => {
                event.stopPropagation();
                toggleSidebar();
            });

            // Optional: Close sidebar when clicking outside on mobile
            // We check if it's a small screen to avoid interfering with desktop layout
            document.body.addEventListener('click', (event) => {
                if (window.innerWidth < 640 && !sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
                    // Check if sidebar is currently visible (not translated)
                    if (!sidebar.classList.contains('-translate-x-full')) {
                        toggleSidebar();
                    }
                }
            });

            // Hide the sidebar when resizing to desktop view if it was open on mobile
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 640) {
                    // Ensure the sidebar is visible on desktop, removing mobile toggle classes if present
                    sidebar.classList.remove('-translate-x-full');
                }
            });
        });