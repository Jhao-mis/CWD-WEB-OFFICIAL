<div class="py-12 px-4 sm:px-6 lg:px-8 bg-[#1a589e] shadow-lg">

    <div class="flex items-center justify-center gap-3 mb-10">
        <div class="h-1 w-10 bg-red-500 rounded-full"></div>
        <h2 class="text-4xl font-black text-white uppercase tracking-wide text-center mt-8 mb-10">News & Advisory
        </h2>
        <div class="h-1 w-10 bg-red-500 rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- ================= FEATURED (LATEST NEWS) ================= -->
        <?php if ($featuredNews): ?>
            <div
                class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col group transition-all duration-300 hover:shadow-md">

                <?php if (!empty($featuredNews['news_image'])): ?>
                    <div class="w-full h-56 lg:h-72 overflow-hidden bg-slate-100">
                        <img class="w-full h-full object-cover transition duration-500 group-hover:scale-105 group-hover:opacity-95"
                            src="Uploads/News/<?= htmlspecialchars($featuredNews['news_image']) ?>">
                    </div>
                <?php else: ?>
                    <div
                        class="w-full h-56 lg:h-72 bg-slate-100 flex flex-col items-center justify-center text-slate-400 gap-2">
                        <i class="fa-regular fa-image text-2xl"></i>
                        <span class="text-xs font-bold uppercase tracking-wider">No Image Available</span>
                    </div>
                <?php endif; ?>

                <div class="p-6 sm:p-8 flex-grow flex flex-col justify-between">
                    <div>
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-red-50 text-xs font-black text-red-600 uppercase tracking-wider mb-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span>
                            Latest News
                        </span>

                        <h3
                            class="text-xl sm:text-2xl font-black text-slate-800 mb-2 leading-snug group-hover:text-blue-600 transition duration-200">
                            <?= htmlspecialchars($featuredNews['news_headline']) ?>
                        </h3>

                        <p class="text-xs font-semibold text-slate-400 flex items-center gap-1 mb-4">
                            <i class="fa-regular fa-calendar text-[11px]"></i>
                            <?= date('F d, Y', strtotime($featuredNews['date_published'])) ?>
                        </p>
                    </div>

                    <a href="03_newspost.php?id=<?= $featuredNews['id'] ?>"
                        class="inline-flex items-center gap-1 text-blue-600 font-bold text-xs uppercase tracking-wider hover:text-blue-700 transition group/btn">
                        Read Full Article
                        <i
                            class="fa-solid fa-arrow-right text-[10px] transition-transform group-hover/btn:translate-x-0.5"></i>
                    </a>
                </div>
            </div>
        <?php endif; ?>


        <!-- ================= RECENT NEWS LIST ================= -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col">

            <div class="p-4 border-b border-slate-100 bg-slate-50/70 flex items-center justify-between">
                <h3 class="text-sm font-black text-slate-700 uppercase tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-newspaper text-slate-400"></i> Recent News
                </h3>
            </div>

            <div class="h-[30rem] overflow-y-auto p-3 space-y-2 flex-grow scrollbar-thin">

                <?php foreach ($recentNews as $news): ?>
                    <a href="03_newspost.php?id=<?= $news['id'] ?>"
                        class="flex items-center justify-between p-3 rounded-xl border border-transparent hover:border-slate-100 hover:bg-slate-50/50 transition-all duration-200 group">

                        <div class="flex items-center space-x-3.5 pr-2">
                            <div
                                class="flex-shrink-0 w-11 h-11 rounded-xl overflow-hidden shadow-2xs border border-white bg-slate-100">
                                <?php if (!empty($news['news_image'])): ?>
                                    <img src="Uploads/News/<?= htmlspecialchars($news['news_image']) ?>"
                                        class="w-full h-full object-cover transition duration-300 group-hover:scale-105">
                                <?php else: ?>
                                    <div
                                        class="w-full h-full bg-slate-200 flex items-center justify-center text-[10px] font-bold text-slate-400">
                                        N/A
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="flex flex-col gap-0.5">
                                <p
                                    class="text-xs font-bold text-slate-700 leading-snug group-hover:text-blue-600 transition duration-150 line-clamp-2">
                                    <?= htmlspecialchars($news['news_headline']) ?>
                                </p>
                                <p class="text-[10px] font-medium text-slate-400 flex items-center gap-1 mt-0.5">
                                    <i class="fa-regular fa-calendar text-[9px]"></i>
                                    <?= date('F d, Y', strtotime($news['date_published'])) ?>
                                </p>
                            </div>
                        </div>

                        <div class="text-slate-300 group-hover:text-blue-600 transition-colors duration-150 pl-2 shrink-0">
                            <i
                                class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-0.5 transition-transform"></i>
                        </div>
                    </a>
                <?php endforeach; ?>

                <?php if (empty($recentNews)): ?>
                    <div class="text-center py-12 text-slate-400 flex flex-col items-center justify-center gap-2">
                        <i class="fa-solid fa-folder-open text-xl text-slate-300"></i>
                        <p class="text-xs font-medium">No recent posts available.</p>
                    </div>
                <?php endif; ?>

            </div>

            <div class="p-4 border-t border-slate-100 bg-white text-center">
                <a href="03_news.php"
                    class="inline-flex items-center gap-1.5 text-xs font-black text-blue-600 hover:text-blue-700 uppercase tracking-wider transition-colors group">
                    View More News
                    <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-0.5 transition-transform"></i>
                </a>
            </div>

        </div>

    </div>

    <div id="main-nav-wrapper"
        class="bg-white p-6 rounded-2xl border border-slate-100 shadow-lg max-w-6xl mx-auto my-8">

        <div class="border-b border-slate-100 pb-4 mb-6">
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-blue-600 animate-pulse"></span>
                <h1 class="text-xl font-black text-slate-800 tracking-wide">Service Advisories</h1>
            </div>
            <p class="text-xs font-medium text-slate-400 mt-1">Stay updated with the latest service movements,
                maintenance, and announcements.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="space-y-3">
                <div class="bg-red-50/50 px-3 py-2 rounded-xl border border-red-100/70 flex items-center gap-2">
                    <i class="fa-solid fa-triangle-exclamation text-red-600 text-sm"></i>
                    <h2 class="text-xs font-black text-red-600 uppercase tracking-wider">Emergency Interruptions
                    </h2>
                </div>

                <div class="space-y-2">
                    <button type="button"
                        class="advisory-trigger w-full text-left p-3.5 rounded-xl border border-slate-100 bg-white hover:bg-red-50/30 hover:border-red-200 transition-all duration-200 flex items-center justify-between group shadow-2xs"
                        data-title="Emergency Water Service Interruption on April 17, 2026"
                        data-content="<img class='w-full h-auto object-cover rounded-lg mb-4 shadow-md' src='./img/data/notice.jpg' alt='Emergency Notice'>">

                        <div class="flex flex-col items-start gap-1">
                            <span
                                class="text-xs font-bold text-slate-700 group-hover:text-red-700 leading-snug line-clamp-2">Emergency
                                Water Service Interruption</span>
                            <span class="text-[11px] font-semibold text-slate-400 flex items-center gap-1">
                                <i class="fa-regular fa-calendar"></i> April 17, 2026
                            </span>
                        </div>
                        <div
                            class="w-7 h-7 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-red-600 group-hover:text-white transition-colors duration-200 shrink-0 ml-3 shadow-3xs">
                            <i class="fa-regular fa-eye text-xs"></i>
                        </div>
                    </button>
                </div>
            </div>

            <div class="space-y-3">
                <div class="bg-blue-50/50 px-3 py-2 rounded-xl border border-blue-100/70 flex items-center gap-2">
                    <i class="fa-solid fa-clock text-blue-600 text-sm"></i>
                    <h2 class="text-xs font-black text-blue-600 uppercase tracking-wider">Scheduled Maintenance</h2>
                </div>

                <div class="space-y-2">
                    <button type="button"
                        class="advisory-trigger w-full text-left p-3.5 rounded-xl border border-slate-100 bg-white hover:bg-blue-50/30 hover:border-blue-200 transition-all duration-200 flex items-center justify-between group shadow-2xs"
                        data-title="Scheduled Water Service Interruption on July 01, 2026"
                        data-content="<img class='w-full h-auto object-cover rounded-lg mb-4 shadow-md' src='./img/data/notice.jpg' alt='Scheduled Notice'>">

                        <div class="flex flex-col items-start gap-1">
                            <span
                                class="text-xs font-bold text-slate-700 group-hover:text-blue-700 leading-snug line-clamp-2">Scheduled
                                Water Service Interruption</span>
                            <span class="text-[11px] font-semibold text-slate-400 flex items-center gap-1">
                                <i class="fa-regular fa-calendar"></i> July 01, 2026
                            </span>
                        </div>
                        <div
                            class="w-7 h-7 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-200 shrink-0 ml-3 shadow-3xs">
                            <i class="fa-regular fa-eye text-xs"></i>
                        </div>
                    </button>
                </div>
            </div>

            <div class="space-y-3">
                <div class="bg-amber-50/50 px-3 py-2 rounded-xl border border-amber-100/70 flex items-center gap-2">
                    <i class="fa-solid fa-bullhorn text-amber-600 text-sm"></i>
                    <h2 class="text-xs font-black text-amber-600 uppercase tracking-wider">General Announcements
                    </h2>
                </div>

                <div class="space-y-2">
                    <button type="button"
                        class="advisory-trigger w-full text-left p-3.5 rounded-xl border border-slate-100 bg-white hover:bg-amber-50/30 hover:border-amber-200 transition-all duration-200 flex items-center justify-between group shadow-2xs"
                        data-title="Holiday Notice: June 12, 2026 (No Office Operations)"
                        data-content="<img class='w-full h-auto object-cover rounded-lg mb-4 shadow-md' src='./img/data/notice.jpg' alt='Holiday Notice'>">

                        <div class="flex flex-col items-start gap-1">
                            <span
                                class="text-xs font-bold text-slate-700 group-hover:text-amber-700 leading-snug line-clamp-2">Holiday
                                Notice: No Office Operations</span>
                            <span class="text-[11px] font-semibold text-slate-400 flex items-center gap-1">
                                <i class="fa-regular fa-calendar"></i> June 12, 2026
                            </span>
                        </div>
                        <div
                            class="w-7 h-7 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-amber-600 group-hover:text-white transition-colors duration-200 shrink-0 ml-3 shadow-3xs">
                            <i class="fa-regular fa-eye text-xs"></i>
                        </div>
                    </button>
                </div>
            </div>

        </div>

        <div class="border-t border-slate-100 mt-6 pt-4 text-center">
            <a href="./advisories.html"
                class="inline-flex items-center gap-1.5 text-xs font-black text-blue-600 hover:text-blue-700 uppercase tracking-wider transition-colors group">
                View More Advisory
                <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-0.5 transition-transform"></i>
            </a>
        </div>

    </div>

</div>

<!-- Advisory Modal -->
<div id="main-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-slate-900/60 backdrop-blur-sm">

    <!-- Modal Wrapper -->
    <div class="relative p-4 w-full max-w-2xl max-h-full my-auto">
        <!-- Modal content -->
        <div
            class="relative bg-white border border-slate-200 rounded-2xl shadow-2xl p-5 md:p-6 max-h-[90vh] flex flex-col">

            <!-- Modal header -->
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <h3 id="modal-title" class="text-sm md:text-base font-black text-slate-800 tracking-wide">
                    Modal Title Placeholder
                </h3>
                <!-- Close Button (X) -->
                <button id="modal-close-x" type="button"
                    class="text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg p-1.5 inline-flex items-center transition-colors">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Modal body -->
            <div id="modal-body-wrapper" class="py-4 overflow-y-auto max-h-[65vh]">
                <div id="modal-content" class="leading-relaxed text-slate-600 text-sm">
                    <!-- Ang HTML code ng inyong imahe/poster ay awtomatikong papasok dito -->
                </div>
            </div>

            <!-- Modal footer -->
            <div class="flex items-center justify-end border-t border-slate-100 space-x-3 pt-4">
                <button id="modal-accept" type="button"
                    class="text-white bg-blue-600 hover:bg-blue-700 shadow-sm font-bold text-xs px-4 py-2.5 rounded-xl transition-colors">
                    Acknowledge
                </button>
            </div>
        </div>
    </div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('main-modal');
        const mainNavWrapper = document.getElementById('main-nav-wrapper'); // Reference sa blue/red/amber content lists
        const mainNavbar = document.getElementById('main-navbar'); // Reference sa fixed top bar

        const modalTitle = document.getElementById('modal-title');
        const modalContent = document.getElementById('modal-content');
        const modalAccept = document.getElementById('modal-accept');

        // In-update para sa bagong card elements gamit ang class na .advisory-trigger
        const navLinks = document.querySelectorAll('.advisory-trigger');

        // In-update ang selectors para magtugma sa mga ID ng close button sa iyong modal html (X button at Close button)
        const closeButtons = document.querySelectorAll('#modal-close-x, #modal-close-btn');

        // Mobile menu references
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMenuButton = document.getElementById('close-menu-button');
        const offcanvasMenu = document.getElementById('offcanvas-menu');

        // --- Mobile Menu Logic ---
        if (mobileMenuButton && offcanvasMenu) {
            mobileMenuButton.addEventListener('click', () => {
                offcanvasMenu.classList.remove('translate-x-full');
            });
        }

        if (closeMenuButton && offcanvasMenu) {
            closeMenuButton.addEventListener('click', () => {
                offcanvasMenu.classList.add('translate-x-full');
            });
        }

        // --- Modal Open/Close Functions ---
        const openModal = (title, content) => {
            // HIDE BOTH MAIN NAVIGATION ELEMENTS (Gaya ng original script)
            if (mainNavWrapper) {
                mainNavWrapper.classList.add('hidden');
            }
            if (mainNavbar) {
                mainNavbar.classList.add('hidden');
            }

            modalTitle.textContent = title;
            modalContent.innerHTML = content;

            // Static single button implementation: Palaging "Acknowledge" at nagsasara lang ng modal
            modalAccept.textContent = 'Acknowledge';
            modalAccept.onclick = () => {
                closeModal();
            };

            modal.classList.remove('hidden');
            modal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('overflow-hidden'); // Prevent background scrolling
        };

        const closeModal = () => {
            // SHOW BOTH MAIN NAVIGATION ELEMENTS AGAIN (Gaya ng original script)
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

        // --- Attach Event Listeners to Advisory Cards ---
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();

                // Kukunin ang pamagat mula sa data-title attribute ng button
                const title = link.getAttribute('data-title') || 'Service Advisory';
                const content = link.getAttribute('data-content') || '<p class="text-body">No detailed content available for this service.</p>';

                openModal(title, content);
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
</script>