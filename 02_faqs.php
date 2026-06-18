<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD FAQs</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/faqs.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
    /* Base transition for the icon */
    .faq-trigger i {
        transition: all 0.3s ease;
        padding: 8px; /* Gives room for the background-color to show */
        border-radius: 9999px; /* Makes the background circular */
    }

    /* Styles when the accordion is open */
    .faq-item.active .faq-trigger i {
        transform: rotate(180deg);
        background-color: white;
        color: #1a589e;
        /* Optional: add a slight shadow so the white bg pops against the header */
        box-shadow: 0 2px 10px rgba(0,0,0,0.1); 
    }
</style>


</head>

<body>

    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Header -->

    <div class="relative bg-[#1a589e] text-white overflow-hidden py-16 sm:py-20 md:py-24">

        <div class="container">

            <!-- Breadcrumb -->
            <nav class="flex mt-3 mx-7" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="services"
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
                            <i class="fa-solid fa-circle-question w-5 mr-2"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">FAQs</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">Frequently Asked Questions
            </h1>
        </div>

        <svg class="absolute bottom-0 left-0 w-full h-[60px] sm:h-[120px] md:h-[100px] lg:h-[80px] z-0"
            viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="white" fill-opacity="1"
                d="M0,128L40,133.3C80,139,160,149,240,144C320,139,400,117,480,133.3C560,149,640,203,720,186.7C800,171,880,85,960,74.7C1040,64,1120,128,1200,144C1280,160,1360,128,1400,112L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
    </div>


    <!-- Frequently Asked Questions -->


    <div class="max-w-3xl mx-auto px-4 py-12">
        <!-- Section Header -->
        <div class="text-center mb-10">
            <p class="text-[#1a589e] text-xl font-semibold mt-2">Everything you need to know about our services and applications.</p>
        </div>

        <div class="space-y-4" id="faq-container">

            <!-- FAQ 1 -->
            <div
                class="faq-item border border-slate-200 rounded-[2.5rem] bg-white overflow-hidden transition-all duration-300 hover:shadow-md">
                <button
                    class="faq-trigger flex items-center justify-between w-full p-5 text-left bg-[#1a589e] transition-colors">
                    <span class="font-bold text-white italic text-lg">What is Calamba Water District?</span>
                    <i class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-300"></i>
                </button>
                <div class="faq-content hidden px-5 pb-5 animate-fadeIn">
                    <p class="text-slate-600 mt-4 leading-relaxed">
                        Calamba Water District (CWD) is a Government Owned and Controlled Corporation (GOCC) and
                        legalized under Municipal Board Resolution No. 82, Series of 1974 of the Municipal Council of
                        Calamba pursuant to PD 198, as Amended. It uses the direct pumping from Spring and Groundwater
                        Deepwells.
                    </p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div
                class="faq-item border border-slate-200 rounded-[2.5rem] bg-white overflow-hidden transition-all duration-300 hover:shadow-md">
                <button class="faq-trigger flex items-center justify-between w-full p-5 text-left bg-[#1a589e] transition-colors">
                    <span class="font-bold text-white italic text-lg">What services does Calamba Water District
                        offer?</span>
                    <i class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-300"></i>
                </button>
                <div class="faq-content hidden px-5 pb-5">
                    <p class="text-slate-600 mt-4 leading-relaxed">
                        The Calamba Water District basically offers wide range of water connections in the City of
                        Calamba both residential and commercial institutions.
                    </p>
                </div>
            </div>

            <!-- FAQ 3 (With Tabs) -->
            <div
                class="faq-item border border-slate-200 rounded-[2.5rem] bg-white overflow-hidden transition-all duration-300 hover:shadow-md">
                <button class="faq-trigger flex items-center justify-between w-full p-5 text-left bg-[#1a589e] transition-colors">
                    <span class="font-bold text-white italic text-lg">What are the requirements for applying new
                        connection?</span>
                    <i class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-300"></i>
                </button>
                <div class="faq-content hidden px-5 pb-5 mt-4 ">
                    <div class="bg-slate-50 rounded-xl p-2 flex gap-1 mb-4">
                        <button onclick="toggleTab(event, 'tab-apply-during')"
                            class="tab-btn active flex-1 py-2 text-sm font-bold rounded-lg transition-all">During
                            Application</button>
                        <button onclick="toggleTab(event, 'tab-apply-settlement')"
                            class="tab-btn flex-1 py-2 text-sm font-bold rounded-lg transition-all text-slate-500 hover:bg-white/50">Upon
                            Settlement</button>
                    </div>

                    <div id="tab-apply-during" class="tab-panel space-y-3 p-2">
                        <div class="flex gap-3"><span
                                class="h-6 w-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold shrink-0">1</span>
                            <p class="text-slate-600 text-sm">Orientation (Tuesdays & Thursdays, 9:00 AM - 11:00 AM)</p>
                        </div>
                        <div class="flex gap-3"><span
                                class="h-6 w-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold shrink-0">2</span>
                            <p class="text-slate-600 text-sm">Php. 102.00 Filing Fee</p>
                        </div>
                        <div class="flex gap-3"><span
                                class="h-6 w-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold shrink-0">3</span>
                            <p class="text-slate-600 text-sm">Sketch of Location</p>
                        </div>
                    </div>

                    <div id="tab-apply-settlement" class="tab-panel hidden space-y-3 p-2">
                        <ul class="space-y-2 text-sm text-slate-600">
                            <li class="flex items-start gap-2 border-b border-slate-100 pb-2"><span>•</span> Certificate
                                of Inspection</li>
                            <li class="flex items-start gap-2 border-b border-slate-100 pb-2"><span>•</span> Brgy.
                                Clearance for Water Connection</li>
                            <li class="flex items-start gap-2 border-b border-slate-100 pb-2"><span>•</span> Copy of any
                                Valid Government ID</li>
                            <li class="flex items-start gap-2 border-b border-slate-100 pb-2"><span>•</span> Copy of
                                Land Title or Similar Document</li>
                            <li class="flex items-start gap-2 border-b border-slate-100 pb-2"><span>•</span> Water Bill
                                Receipt of Nearest Neighbor</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FAQ 4 (Process) -->
            <div
                class="faq-item border border-slate-200 rounded-[2.5rem] bg-white overflow-hidden transition-all duration-300 hover:shadow-md">
                <button class="faq-trigger flex items-center justify-between w-full p-5 text-left bg-[#1a589e] transition-colors">
                    <span class="font-bold text-white italic text-lg">How to process application/reconnection?</span>
                    <i class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-300"></i>
                </button>
                <div class="faq-content hidden px-5 pb-5 mt-4 ">
                    <div class="bg-slate-50 rounded-xl p-2 flex gap-1 mb-4">
                        <button onclick="toggleTab(event, 'tab-proc-conn')"
                            class="tab-btn active flex-1 py-2 text-sm font-bold rounded-lg transition-all">New
                            Connection</button>
                        <button onclick="toggleTab(event, 'tab-proc-reconn')"
                            class="tab-btn flex-1 py-2 text-sm font-bold rounded-lg transition-all text-slate-500">Reconnection</button>
                    </div>

                    <div id="tab-proc-conn" class="tab-panel space-y-2 text-sm text-slate-600">
                        <p>1. Attend Orientation</p>
                        <p>2. Submission/Approval & payment of application with P102 application fee (Commercial Dept)
                        </p>
                        <p>3. Site Estimator visit (Engineering Dept)</p>
                        <p>4. Application approval (Engineering Dept)</p>
                        <p>5. Quotation of available materials</p>
                        <p>6. Costing of materials and approval of requirements</p>
                        <p>7. Payment of new connection fee (Administrative Dept)</p>
                        <p>8. Schedule of tapping (Engineering Dept)</p>
                        <p>9. Installation of water (Engineering Dept)</p>
                    </div>

                    <div id="tab-proc-reconn" class="tab-panel hidden space-y-4">
                        <div class="p-3 bg-blue-50 border-l-4 border-blue-400">
                            <h4 class="font-bold text-blue-800 text-sm uppercase mb-1">Less than 3 months</h4>
                            <p class="text-xs text-blue-700">Payment of P102 + Water Bill balance. Site visit within the
                                day.</p>
                        </div>
                        <div class="p-3 bg-amber-50 border-l-4 border-amber-400">
                            <h4 class="font-bold text-amber-800 text-sm uppercase mb-1">More than 3 months</h4>
                            <p class="text-xs text-amber-700">Engineering inspection required. 3-5 days processing time.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div
                class="faq-item border border-slate-200 rounded-[2.5rem] bg-white overflow-hidden transition-all duration-300 hover:shadow-md">
                <button class="faq-trigger flex items-center justify-between w-full p-5 text-left bg-[#1a589e] transition-colors">
                    <span class="font-bold text-white italic text-lg">Who can I call if I have questions?</span>
                    <i class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-300"></i>
                </button>
                <div class="faq-content hidden px-5 pb-5 mt-4">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="p-4 rounded-xl bg-slate-50">
                            <h4 class="font-bold text-slate-800 text-sm mb-2">New Connection, Reconnection, Disconnection & Illegal Connections</h4>
                            <p class="text-slate-600 text-sm">(049) 545-9344</p>
                            <p class="text-slate-600 text-sm">(049) 545-1614 (Loc 114)</p>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50">
                            <h4 class="font-bold text-slate-800 text-sm mb-2">Billing & Meter Reading</h4>
                            <p class="text-slate-600 text-sm">(049) 545-2863</p>
                            <p class="text-slate-600 text-sm">Local 113</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <br>
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

    <script src="./js/index.js"></script>
    <script src="./js/nav-sticky.js"></script>


    <script>
        document.querySelectorAll('.faq-trigger').forEach(trigger => {
            trigger.addEventListener('click', () => {
                const parent = trigger.closest('.faq-item');
                const content = parent.querySelector('.faq-content');
                const isActive = parent.classList.contains('active');

                // Close all others
                document.querySelectorAll('.faq-item').forEach(item => {
                    item.classList.remove('active');
                    item.querySelector('.faq-content').classList.add('hidden');
                });

                if (!isActive) {
                    parent.classList.add('active');
                    content.classList.remove('hidden');
                }
            });
        });

        function toggleTab(event, tabId) {
            event.stopPropagation(); // Prevent accordion from closing
            const container = event.target.closest('.faq-content');

            // Update Buttons
            container.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active', 'text-slate-900');
                btn.classList.add('text-slate-500');
            });
            event.target.classList.add('active');
            event.target.classList.remove('text-slate-500');

            // Update Panels
            container.querySelectorAll('.tab-panel').forEach(panel => {
                panel.classList.add('hidden');
            });
            document.getElementById(tabId).classList.remove('hidden');
        }
    </script>


</body>

</html>