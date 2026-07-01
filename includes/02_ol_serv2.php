<!-- 1. EMERGENCY WATER SERVICE INTERRUPTION (RED) -->
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
    <h2 class="text-lg font-black mb-4 text-red-600 flex items-center gap-2 uppercase tracking-wide">
        <i class="fa-solid fa-triangle-exclamation"></i> Emergency Advisories
    </h2>

    <div class="space-y-3">
        <!-- Trigger Card -->
        <button type="button"
            class="advisory-trigger w-full text-left p-4 rounded-xl border border-slate-200 bg-white hover:bg-red-50/50 hover:border-red-200 transition-all duration-200 flex items-center justify-between group shadow-sm"
            data-title="Emergency Water Service Interruption on April 17, 2026"
            data-content="<img class='w-full h-auto object-cover rounded-lg mb-4 shadow-md' src='./img/data/notice.jpg' alt='Emergency Water Interruption Map'>">

            <div class="flex flex-col items-start gap-1.5">
                <span class="text-sm font-bold text-slate-800 group-hover:text-red-700 leading-snug">
                    Emergency Water Service Interruption
                </span>
                <span class="text-xs font-semibold text-slate-400 flex items-center gap-1.5 mt-0.5">
                    <i class="fa-regular fa-calendar text-[11px]"></i> April 17, 2026
                </span>
            </div>

            <!-- Eye with Rounded Square Wrapper Icon -->
            <div
                class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-500 group-hover:bg-red-600 group-hover:text-white transition-colors duration-200 shrink-0 ml-4 shadow-sm">
                <i class="fa-regular fa-eye text-sm"></i>
            </div>
        </button>

    </div>

</div>

<!-- 2. SCHEDULED SERVICE INTERRUPTION (BLUE) -->
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
    <h2 class="text-lg font-black mb-4 text-blue-600 flex items-center gap-2 uppercase tracking-wide">
        <i class="fa-solid fa-clock"></i> Scheduled Advisories
    </h2>

    <div class="space-y-3">
        <button type="button"
            class="advisory-trigger w-full text-left p-4 rounded-xl border border-slate-200 bg-white hover:bg-blue-50/50 hover:border-blue-200 transition-all duration-200 flex items-center justify-between group shadow-sm"
            data-title="Scheduled Maintenance Interruption on May 02, 2026"
            data-content="<img class='w-full h-auto object-cover rounded-lg mb-2 shadow-sm' src='./img/data/notice.jpg' alt='Scheduled Interruption Notice'>">

            <div class="flex flex-col items-start gap-1.5">
                <span class="text-sm font-bold text-slate-800 group-hover:text-blue-700">Scheduled
                    Maintenance Interruption</span>
                <span class="text-xs font-semibold text-slate-400 flex items-center gap-1">
                    <i class="fa-regular fa-calendar text-[11px]"></i> May 02, 2026
                </span>
            </div>

            <!-- Eye with Rounded Square Wrapper Icon -->
            <div
                class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-500 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-200 shrink-0 ml-4 shadow-sm">
                <i class="fa-regular fa-eye text-sm"></i>
            </div>
        </button>
    </div>
</div>

<!-- 3. GENERAL ANNOUNCEMENTS / OTHERS (AMBER) [Editable Title] -->
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
    <h2 class="text-lg font-black mb-4 text-amber-600 flex items-center gap-2 uppercase tracking-wide">
        <i class="fa-solid fa-bullhorn"></i> General Announcements
    </h2>

    <div class="space-y-3">
        <button type="button"
            class="advisory-trigger w-full text-left p-4 rounded-xl border border-slate-200 bg-white hover:bg-amber-50/50 hover:border-amber-200 transition-all duration-200 flex items-center justify-between group shadow-sm"
            data-title="Holiday Notice: June 12, 2026 (No Office Operations)"
            data-content="<img class='w-full h-auto object-cover rounded-lg mb-2 shadow-sm' src='./img/data/notice.jpg' alt='Holiday Notice'>">

            <div class="flex flex-col items-start gap-1.5">
                <span class="text-sm font-bold text-slate-800 group-hover:text-amber-700">Holiday
                    Notice: No Office Operations (No Over-the-Counter Payments)</span>
                <span class="text-xs font-semibold text-slate-400 flex items-center gap-1">
                    <i class="fa-regular fa-calendar text-[11px]"></i> June 12, 2026
                </span>
            </div>

            <!-- Eye with Rounded Square Wrapper Icon -->
            <div
                class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-500 group-hover:bg-amber-600 group-hover:text-white transition-colors duration-200 shrink-0 ml-4 shadow-sm">
                <i class="fa-regular fa-eye text-sm"></i>
            </div>
        </button>
    </div>
</div>


<!-- Main Modal Container -->
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