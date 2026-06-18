// --- Tab Logic ---
document.addEventListener('DOMContentLoaded', () => {
    const tabLinks = document.querySelectorAll('.tab-link');
    const tabContents = document.querySelectorAll('.tab-content');

    // Defines the final style of the Active state (matches the HTML hover styles)
    const activeClasses = [
        'text-blue-600', 'border-blue-600', 'font-semibold', 'rounded-t-lg',
        'lg:text-custom-brand', 'lg:font-semibold', 'lg:bg-blue-50', 'lg:border-custom-brand', 'lg:rounded-t-lg'


    ];

    // Defines the base style of the Inactive state 
    const inactiveClasses = [
        'text-gray-500', 'border-transparent', 'font-medium',
        'lg:text-gray-500', 'lg:bg-transparent', 'lg:border-transparent'
    ];

    function switchTab(targetId) {
        // 1. Deactivate all tabs
        tabContents.forEach(content => content.classList.add('hidden'));
        tabLinks.forEach(link => {
            link.classList.remove(...activeClasses);
            link.classList.add(...inactiveClasses);
            link.setAttribute('aria-selected', 'false');
        });

        // 2. Activate target content
        const targetContent = document.querySelector(targetId);
        if (targetContent) targetContent.classList.remove('hidden');

        // 3. Activate target button 
        const activeLink = document.querySelector(`[data-tabs-target="${targetId}"]`);
        if (activeLink) {
            activeLink.classList.remove(...inactiveClasses);
            activeLink.classList.add(...activeClasses);
            activeLink.setAttribute('aria-selected', 'true');
        }
    }

    tabLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const target = link.getAttribute('data-tabs-target');
            switchTab(target);
        });
    });

    // Initialize: Set the first tab ('#sconn') as active on load. 
    // FIX: This now correctly targets the first content ID.
    switchTab('#tab1');
});