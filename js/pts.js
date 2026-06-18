        document.addEventListener('DOMContentLoaded', () => {
            const tabLinks = document.querySelectorAll('.tab-link');
            const tabContents = document.querySelectorAll('.tab-content');

            // Tailwind classes for the ACTIVE state
            // Mobile: text-blue, bold, border-bottom-blue
            // Desktop: light blue bg, left border blue
            const activeClasses = [
                'text-blue-700', 'font-bold', 'border-[#1a589e]', // Mobile active
                'lg:bg-blue-50', 'lg:border-l-4', 'lg:border-[#1a589e]' // Desktop active
            ];

            // Tailwind classes for the INACTIVE state (to be removed when active)
            const inactiveClasses = [
                'border-transparent', 'hover:text-blue-700', 'hover:border-gray-300',
                'lg:hover:bg-blue-50', 'lg:hover:border-blue-700/50'
            ];

            function switchTab(targetId) {
                // 1. Hide all content
                tabContents.forEach(content => content.classList.add('hidden'));

                // 2. Remove active styling from all tabs
                tabLinks.forEach(link => {
                    link.classList.remove(...activeClasses);
                    link.classList.add(...inactiveClasses);
                });

                // 3. Show target content
                const targetContent = document.querySelector(targetId);
                if(targetContent) targetContent.classList.remove('hidden');

                // 4. Add active styling to the clicked tab
                // We find the button that targets this specific ID
                const activeLink = document.querySelector(`[data-tab-target="${targetId}"]`);
                if(activeLink) {
                    activeLink.classList.remove(...inactiveClasses);
                    activeLink.classList.add(...activeClasses);
                }
            }

            // Add click event listeners
            tabLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const target = link.getAttribute('data-tab-target');
                    switchTab(target);
                });
            });

            // Initialize: Open the first tab by default (2020)
            switchTab('#content-2020');
        });