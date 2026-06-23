<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online Services</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/about.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <!-- Navigation -->

    <?php include 'includes/navigation.php'; ?>


    <!-- Header -->

    <div class="relative bg-[#1a589e] text-white overflow-hidden py-16 sm:py-20 md:py-24">

        <div class="container">

            <!-- Breadcrumb -->
            <br>
            <nav class="flex mt-3 mx-7" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="./services"
                            class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">
                            <i class="fa-solid fa-droplet text-sm mr-2"></i>
                            Services
                        </a>
                    </li>

                    <li>
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-3.5 h-3.5 rtl:rotate-180 text-body" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m9 5 7 7-7 7" />
                            </svg>
                            <i class="fa-solid fa-mobile-screen-button mr-2"></i>
                            <a href="./02_ol_serv4"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Online
                                Services</a>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-3.5 h-3.5 rtl:rotate-180 text-body" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m9 5 7 7-7 7" />
                            </svg>
                            <i class="fa-solid fa-bullhorn"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Notices</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">Water Service Notices
            </h1>


        </div>
        <svg class="absolute bottom-0 left-0 w-full h-[60px] sm:h-[120px] md:h-[100px] lg:h-[80px] z-0"
            viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="white" fill-opacity="1"
                d="M0,128L40,133.3C80,139,160,149,240,144C320,139,400,117,480,133.3C560,149,640,203,720,186.7C800,171,880,85,960,74.7C1040,64,1120,128,1200,144C1280,160,1360,128,1400,112L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>

    </div>

    <br>
    <br>

    <!-- Page Content -->

    <div class="container mx-auto">
        <div class="row g-0 mt-4">



            <!-- Main Content -->
            <div class="col-sm-6 col-md-8">

                <div class="space-y-8 max-w-4xl mx-auto p-4">

                    <div class="space-y-8 max-w-4xl mx-auto p-4">

                        <?php
                        // Kukunin natin ang kasalukuyang buwan at taon para i-compute ang Quarter
                        $currentMonth = (int) date('n');
                        $currentYear = date('Y');

                        if ($currentMonth >= 1 && $currentMonth <= 3) {
                            $quarterName = "1st Quarter";
                            $quarterMonths = "January - March";
                            $quarterColor = "from-blue-600 to-indigo-700";
                        } elseif ($currentMonth >= 4 && $currentMonth <= 6) {
                            $quarterName = "2nd Quarter";
                            $quarterMonths = "April - June";
                            $quarterColor = "from-blue-600 to-sky-700";
                        } elseif ($currentMonth >= 7 && $currentMonth <= 9) {
                            $quarterName = "3rd Quarter";
                            $quarterMonths = "July - September";
                            $quarterColor = "from-teal-600 to-emerald-700";
                        } else {
                            $quarterName = "4th Quarter";
                            $quarterMonths = "October - December";
                            $quarterColor = "from-slate-700 to-slate-900";
                        }
                        ?>
                        <div class="col-12 px-4 mb-4">
                            <div
                                class="relative overflow-hidden rounded-2xl bg-gradient-to-r <?= $quarterColor ?> p-5 sm:p-6 text-white shadow-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <div
                                    class="absolute right-0 bottom-0 opacity-10 pointer-events-none translate-x-4 translate-y-4">
                                    <i class="fa-solid fa-bullhorn text-9xl"></i>
                                </div>

                                <div class="flex items-start gap-3.5 relative z-10">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-md flex items-center justify-center border border-white/20 shrink-0 mt-0.5">
                                        <i class="fa-solid fa-circle-info text-base text-white"></i>
                                    </div>
                                    <div class="flex flex-col gap-0.5">
                                        <span
                                            class="text-[10px] font-black uppercase tracking-widest text-white/80">Active
                                            Monitoring Window</span>
                                        <h2 class="text-lg font-black tracking-wide leading-tight">
                                            Water Advisories & Announcements for
                                            <?= $quarterName ?> 
                                            (<?= $currentYear?>)
                                        </h2>
                                        <p class="text-xs font-medium text-white/80">
                                            Kasalukuyang ipinapakita ang mga talaan mula <span
                                                class="underline decoration-white/40 decoration-2 font-bold">
                                                <?= $quarterMonths?>
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                

                            </div>
                        </div>

                        <!-- 1. EMERGENCY WATER SERVICE INTERRUPTION (RED) -->
                        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                            <h2
                                class="text-lg font-black mb-4 text-red-600 flex items-center gap-2 uppercase tracking-wide">
                                <i class="fa-solid fa-triangle-exclamation"></i> Emergency Advisories
                            </h2>

                            <div class="space-y-3">
                                <!-- Trigger Card -->
                                <button type="button"
                                    class="advisory-trigger w-full text-left p-4 rounded-xl border border-slate-200 bg-white hover:bg-red-50/50 hover:border-red-200 transition-all duration-200 flex items-center justify-between group shadow-sm"
                                    data-title="Emergency Water Service Interruption on April 17, 2026"
                                    data-content="<img class='w-full h-auto object-cover rounded-lg mb-4 shadow-md' src='./img/data/notice.jpg' alt='Emergency Water Interruption Map'>">

                                    <div class="flex flex-col items-start gap-1.5">
                                        <span
                                            class="text-sm font-bold text-slate-800 group-hover:text-red-700 leading-snug">
                                            Emergency Water Service Interruption
                                        </span>
                                        <span
                                            class="text-xs font-semibold text-slate-400 flex items-center gap-1.5 mt-0.5">
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
                            <h2
                                class="text-lg font-black mb-4 text-blue-600 flex items-center gap-2 uppercase tracking-wide">
                                <i class="fa-solid fa-clock"></i> Scheduled Advisories
                            </h2>

                            <div class="space-y-3">
                                <button type="button"
                                    class="advisory-trigger w-full text-left p-4 rounded-xl border border-slate-200 bg-white hover:bg-blue-50/50 hover:border-blue-200 transition-all duration-200 flex items-center justify-between group shadow-sm"
                                    data-title="Scheduled Maintenance Interruption on May 02, 2026"
                                    data-content="<img class='w-full h-auto object-cover rounded-lg mb-2 shadow-sm' src='./img/data/notice.jpg' alt='Scheduled Interruption Notice'>">

                                    <div class="flex flex-col items-start gap-1.5">
                                        <span
                                            class="text-sm font-bold text-slate-800 group-hover:text-blue-700">Scheduled
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
                            <h2
                                class="text-lg font-black mb-4 text-amber-600 flex items-center gap-2 uppercase tracking-wide">
                                <i class="fa-solid fa-bullhorn"></i> General Announcements
                            </h2>

                            <div class="space-y-3">
                                <button type="button"
                                    class="advisory-trigger w-full text-left p-4 rounded-xl border border-slate-200 bg-white hover:bg-amber-50/50 hover:border-amber-200 transition-all duration-200 flex items-center justify-between group shadow-sm"
                                    data-title="Holiday Notice: June 12, 2026 (No Office Operations)"
                                    data-content="<img class='w-full h-auto object-cover rounded-lg mb-2 shadow-sm' src='./img/data/notice.jpg' alt='Holiday Notice'>">

                                    <div class="flex flex-col items-start gap-1.5">
                                        <span
                                            class="text-sm font-bold text-slate-800 group-hover:text-amber-700">Holiday
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

                    </div>

                </div>

            </div>


            <!-- Left Navigation -->
            <div class="col-6 col-md-3 mx-auto">
                <nav class="nav flex-column">
                    <h3 class="text-2xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">
                        Online Services</h3>
                    <a class="tab-card" aria-current="page" href="./02_ol_serv">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-mobile-screen"></i> Online Payment</h5>
                    </a>
                    <a class="tab-card" href="./02_ol_serv3" tabindex="-1" aria-disabled="true">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-calculator"></i> Bill Calculator</h5>
                    </a>
                    <a class="tab-card active" href="#" tabindex="-1" aria-disabled="true">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-bullhorn"></i> Water Service Notices</h5>
                    </a>
                    <a class="tab-card"
                        href="https://docs.google.com/forms/d/e/1FAIpQLSeN07_EsXAdLg6odGiWAUvU7T5mVR7UvjsohcdLQVhmJEm9ZQ/viewform"
                        target="_blank">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-comment-sms"></i> Email & Text Blast</h5>
                    </a>
                    <a class="tab-card" href="https://www.foi.gov.ph/agencies/clwd/" target="_blank">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-inbox"></i> eFOI
                        </h5>
                    </a>
                </nav>
            </div>


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

    <br>
    <br>

    <!-- Back to Top -->
    <?php include 'includes/backtotop.php'; ?>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Js File for Sticky Nav -->
    <script src="./js/style.js"></script>
    <script src="./js/db_adv.js"></script>
    <script src="./js/index.js"></script>

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

</body>

</html>