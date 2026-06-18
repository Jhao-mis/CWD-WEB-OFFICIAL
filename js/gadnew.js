/**
 * GAD News Grid Controller
 */

const gridContainer = document.getElementById('gad-news-grid');
const tabsContainer = document.getElementById('year-tabs-container');
const dataSource = document.getElementById('gad-data-source');

let availableYears = [];

/**
 * Initialize the page
 */
function init() {
    // 1. Extract all unique years from the hidden data source
    const posts = dataSource.querySelectorAll('.gad-post');
    const yearsSet = new Set();
    
    posts.forEach(post => {
        yearsSet.add(post.dataset.year);
    });

    // Sort years descending
    availableYears = Array.from(yearsSet).sort((a, b) => b - a);

    // 2. Render Tabs
    renderTabs();

    // 3. Load the first year by default
    if (availableYears.length > 0) {
        loadYear(availableYears[0]);
    }
}

/**
 * Renders the year navigation tabs
 */
function renderTabs() {
    tabsContainer.innerHTML = availableYears.map(year => `
        <button 
            onclick="loadYear('${year}')" 
            id="tab-${year}"
            class="year-tab px-6 py-2 whitespace-nowrap rounded-full font-semibold transition-all duration-200 border-2"
        >
            ${year}
        </button>
    `).join('');
}

/**
 * Filters and renders cards for a specific year
 */
function loadYear(year) {
    // Update active tab styles
    document.querySelectorAll('.year-tab').forEach(tab => {
        tab.classList.remove('bg-[#1a589e]', 'text-white', 'border-[#1a589e]');
        tab.classList.add('bg-white', 'text-gray-600', 'border-gray-200', 'hover:border-[#1a589e]', 'hover:text-[#1a589e]');
    });

    const activeTab = document.getElementById(`tab-${year}`);
    if (activeTab) {
        activeTab.classList.remove('bg-white', 'text-gray-600', 'border-gray-200');
        activeTab.classList.add('bg-[#1a589e]', 'text-white', 'border-[#1a589e]');
    }

    // Filter posts
    const allPosts = Array.from(dataSource.querySelectorAll('.gad-post'));
    const filteredPosts = allPosts.filter(p => p.dataset.year === year);

    // Render Grid with animation
    gridContainer.style.opacity = '0';
    
    setTimeout(() => {
        gridContainer.innerHTML = filteredPosts.map(post => createCardHTML(post)).join('');
        gridContainer.style.opacity = '1';
    }, 200);
}

/**
 * Generates the HTML for a news card
 */
function createCardHTML(postElement) {
    const d = postElement.dataset;
    const excerpt = postElement.querySelector('.excerpt').textContent;

    return `
        <article class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col border border-gray-100">
            <!-- Image Header -->
            <div class="relative h-52 overflow-hidden">
                <img src="${d.image}" 
                     alt="${d.title}" 
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                     onerror="this.src='https://placehold.co/600x400/e2e8f0/64748b?text=No+Image'">
                <div class="absolute top-4 left-4">
                    <span class="bg-pink-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                        ${d.year}
                    </span>
                </div>
            </div>

            <!-- Content Body -->
            <div class="p-6 flex-grow flex flex-col">
                <div class="text-sm text-gray-500 mb-2 flex items-center">
                    <i class="far fa-calendar-alt mr-2"></i>
                    ${d.date}
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-[#1a589e] transition-colors line-clamp-2">
                    ${d.title}
                </h3>
                <p class="text-gray-600 text-sm mb-6 line-clamp-3 flex-grow leading-relaxed">
                    ${excerpt}
                </p>
                
                <a href="${d.link}" class="inline-flex items-center text-[#1a589e] font-bold text-sm group/link">
                    READ FULL REPORT
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 transform group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7M5 12h16" />
                    </svg>
                </a>
            </div>
        </article>
    `;
}

// Global expose
window.loadYear = loadYear;

// Run on load
document.addEventListener('DOMContentLoaded', init);




