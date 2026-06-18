document.addEventListener('DOMContentLoaded', () => {
    // --- Tab Logic ---
    const tabLinks = document.querySelectorAll('.tab-link');
    const tabContents = document.querySelectorAll('.tab-content');
    const activeClasses = [
        // Mobile/Default classes for active state
        'text-blue-600', 'border-blue-600',
        // Desktop/Large screen classes for active state
        'lg:text-blue-700', 'lg:font-semibold', 'lg:bg-blue-50', 'lg:border-blue-700'
    ];
    const inactiveClasses = [
        // Mobile/Default classes for inactive state
        'border-transparent', 'hover:text-blue-700', 'hover:border-gray-300',
        // Desktop/Large screen classes for inactive state
        'lg:border-transparent', 'lg:hover:bg-blue-50', 'lg:hover:border-blue-700/50'
    ];

    function switchTab(targetId) {
        tabContents.forEach(content => content.classList.add('hidden'));
        tabLinks.forEach(link => {
            link.classList.remove(...activeClasses);
            link.classList.add(...inactiveClasses);
        });
        const targetContent = document.querySelector(targetId);
        if (targetContent) targetContent.classList.remove('hidden');
        const activeLink = document.querySelector(`[data-tab-target="${targetId}"]`);
        if (activeLink) {
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
    // Set up event listeners for all tab buttons
    tabButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent the default link action
            const targetId = button.getAttribute('data-tab-target');
            if (targetId) {
                switchTab(targetId);
            }
        });
    });

    // Initialize: Ensure the first tab's content is visible on load
    // (The HTML is already set up for 'profile-content', but this ensures the styles are correct if the order changes)
    switchTab('#profile-content');
});

tailwind.config = {
    theme: {
        extend: {
            colors: {
                'custom-brand-tw': '#1a589e', // Your primary brand color
                'custom-brand-light': '#ffffff', // A softer, light background for hover
            },
        }
    }
}