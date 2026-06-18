<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>CWD Statistics</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png"/>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/card.css">

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
                            <i class="fa-solid fa-chart-line w-5 mr-2"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Statistics</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold uppercase tracking-wide">Statistics
            </h1>
        </div>

        <svg class="absolute bottom-0 left-0 w-full h-[60px] sm:h-[120px] md:h-[100px] lg:h-[80px] z-0"
            viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="white" fill-opacity="1"
                d="M0,128L40,133.3C80,139,160,149,240,144C320,139,400,117,480,133.3C560,149,640,203,720,186.7C800,171,880,85,960,74.7C1040,64,1120,128,1200,144C1280,160,1360,128,1400,112L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
    </div>

    <!-- Statistics -->


    <div class="container mx-auto">

        <div class="mb-4 border-b border-default overflow-x-auto overflow-y-hidden horizontal-scroll-container">
            <ul class="flex -mb-px text-sm font-medium text-center whitespace-nowrap" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2 flex-shrink-0" role="presentation">
                    <button class="tab-link w-full inline-block p-3 border-b-2 transition duration-150 ease-in-out cursor-pointer
                        
                        /* INACTIVE BASE STYLES (Default & LG) */
                        text-gray-500 border-transparent font-medium lg:text-gray-500 lg:bg-transparent lg:border-transparent
                        
                        hover:text-blue-700 hover:font-semibold hover:bg-blue-50 hover:border-blue-700 hover:rounded-t"
                        data-tabs-target="#tab1" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">Operational Overview</button>
                </li>
                <li class="me-2 flex-shrink-0" role="presentation">
                    <button class="tab-link w-full inline-block p-3 border-b-2 transition duration-150 ease-in-out cursor-pointer
                        
                        /* INACTIVE BASE STYLES (Default & LG) */
                        text-gray-500 border-transparent font-medium lg:text-gray-500 lg:bg-transparent lg:border-transparent
                        
                        hover:text-blue-700 hover:font-semibold hover:bg-blue-50 hover:border-blue-700 hover:rounded-t"
                        id="dashboard-tab" data-tabs-target="#wfac" type="button" role="tab" aria-controls="dashboard"
                        aria-selected="false">Water Facilities</button>
                </li>

            </ul>
        </div>

        <div id="default-tab-content">
            <div class="hidden p-4 rounded-base bg-neutral-secondary-soft" id="tab1" role="tabpanel"
                aria-labelledby="profile-tab">

                <div class="w-full max-w-6xl mx-auto overflow-hidden">

                    <div class="text-center space-y-2">
                        <h1 class="text-3xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">Operational Overview</h1>
                        <p class="text-slate-500 font-semibold">Calamba Water District Active Service Connections &amp;
                            Statistics</p>
                    </div>

                    <br>
                    <br>

                    <div class="grid md:grid-cols-2 gap-8 items-start">

                        <!-- 1. SERVICE CONNECTIONS CARD -->
                        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
                            <div class="bg-[#1a589e] px-6 py-5 text-white">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-blue-600 rounded-lg">
                                        <i class="fas fa-solid fa-arrow-up-from-ground-water"></i>
                                    </div>
                                    <div>
                                        <h2 class="text-xl font-black text-white uppercase tracking-wide mt-2 mb-2">Service Connections</h2>
                                        <p class="text-[10px] uppercase tracking-widest opacity-80 font-semibold">As of
                                            March 2026</p>
                                    </div>
                                </div>
                            </div>

                            <div class="divide-y divide-slate-100">
                                <!-- High Level Metrics -->
                                <div class="p-6 bg-slate-50/50">
                                    <div class="flex justify-between items-end mb-1">
                                        <span class="text-xs font-bold text-slate-500 uppercase">Total Metered</span>
                                        <span class="text-2xl font-black text-blue-700">84,685</span>
                                    </div>
                                    <div class="w-full h-2 bg-slate-200 rounded-full overflow-hidden">
                                        <div class="h-full bg-blue-500" style="width: 100%"></div>
                                    </div>
                                </div>

                                <!-- List Data -->
                                <div class="p-6 space-y-4">
                                    <div class="flex justify-between items-center group">
                                        <span
                                            class="text-sm text-slate-600 group-hover:text-blue-600 transition-colors">Residential
                                            / Gov't</span>
                                        <span
                                            class="text-sm font-bold bg-slate-100 px-3 py-1 rounded-full text-slate-700">73,467
                                            / 171</span>
                                    </div>
                                    <div class="flex justify-between items-center group">
                                        <span
                                            class="text-sm text-slate-600 group-hover:text-blue-600 transition-colors">Commercial
                                            / Industrial</span>
                                        <span
                                            class="text-sm font-bold bg-slate-100 px-3 py-1 rounded-full text-slate-700">4,336</span>
                                    </div>
                                </div>

                                <!-- Coverage Data -->
                                <div class="p-6 space-y-5">
                                    <div class="bg-blue-50 p-4 rounded-2xl border border-blue-100">
                                        <div class="flex justify-between items-center mb-2">
                                            <span class="text-xs font-bold text-blue-800 uppercase">Population
                                                Served</span>
                                            <span class="text-lg font-black text-blue-900">389,870</span>
                                        </div>
                                        <div class="flex justify-between text-[10px] text-blue-600/70 font-bold italic">
                                            <span>City Total: 581,000</span>
                                            <span>~64% Coverage</span>
                                        </div>
                                    </div>

                                    <div class="bg-emerald-50 p-4 rounded-2xl border border-emerald-100">
                                        <div class="flex justify-between items-center mb-2">
                                            <span class="text-xs font-bold text-emerald-800 uppercase">Barangays
                                                Served</span>
                                            <span class="text-lg font-black text-emerald-900">47</span>
                                        </div>
                                        <div
                                            class="flex justify-between text-[10px] text-emerald-600/70 font-bold italic">
                                            <span>City Total: 54</span>
                                            <span>87% Reach</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2. WORKFORCE SUMMARY CARD -->
                        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
                            <div class="bg-slate-900 px-6 py-5 text-white">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-slate-800 rounded-lg border border-slate-700">
                                        <i class="fas fa-users text-sm"></i>
                                    </div>
                                    <div>
                                        <h2 class="text-xl font-black text-white uppercase tracking-wide mt-2 mb-2">Work Force</h2>
                                        <p class="text-[10px] uppercase tracking-widest text-slate-400 font-semibold">
                                            Staffing Status</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="grid grid-cols-3 gap-3 mb-6">
                                    <div class="text-center p-3 rounded-xl bg-slate-50 border border-slate-100">
                                        <p class="text-slate-400 text-[9px] font-bold uppercase mb-1">Regular</p>
                                        <p class="text-xl font-black text-slate-800">299</p>
                                    </div>
                                    <div class="text-center p-3 rounded-xl bg-slate-50 border border-slate-100">
                                        <p class="text-slate-400 text-[9px] font-bold uppercase mb-1">Contract</p>
                                        <p class="text-xl font-black text-slate-300">0</p>
                                    </div>
                                    <div class="text-center p-3 rounded-xl bg-slate-50 border border-slate-100">
                                        <p class="text-slate-400 text-[9px] font-bold uppercase mb-1">Job Order</p>
                                        <p class="text-xl font-black text-slate-800">43</p>
                                    </div>
                                </div>

                                <div class="relative pt-2">
                                    <div class="flex justify-between items-end mb-2">
                                        <span class="text-slate-500 font-bold text-xs uppercase tracking-tight">Total
                                            Workforce</span>
                                        <span class="text-3xl font-black text-slate-900">342</span>
                                    </div>
                                    <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-slate-900 rounded-full" style="width: 100%"></div>
                                    </div>
                                </div>

                                <div class="mt-8 pt-6 border-t border-slate-100 space-y-4">
                                    <div class="flex items-start gap-4">
                                        <div class="mt-1 w-2 h-2 rounded-full bg-blue-500"></div>
                                        <div>
                                            <h4 class="text-sm font-bold text-slate-700">High Regular Ratio</h4>
                                            <p class="text-xs text-slate-500">87.4% of the workforce are regular
                                                employees, ensuring organizational stability.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4">
                                        <div class="mt-1 w-2 h-2 rounded-full bg-amber-500"></div>
                                        <div>
                                            <h4 class="text-sm font-bold text-slate-700">Job Order Staff</h4>
                                            <p class="text-xs text-slate-500">12.6% support operational peaks and
                                                specialized project requirements.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-center gap-2">
                                <i class="fas fa-check-circle text-emerald-500 text-xs"></i>
                                <p class="text-[10px] text-slate-400 font-medium uppercase tracking-wider">Certified
                                    Personnel Records 2026</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="hidden p-4 rounded-base bg-neutral-secondary-soft" id="wfac" role="tabpanel"
            aria-labelledby="dashboard-tab">

            <div class="w-full max-w-7xl mx-auto overflow-hidden">

                <!-- Header Section -->
                <div
                    class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-6 bg-[#1a589e] p-6 rounded-2xl shadow-sm border border-slate-200">
                    <div>
                        <div class="flex items-center gap-3 mb-1">
                            <div class="p-2 bg-slate-900 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <h1 class="text-xl font-black text-white uppercase tracking-wide mt-2 mb-2">Water Facilities Inventory</h1>
                        </div>
                        <p class="text-white text-sm font-semibold ml-14">Current Operational Status • Updated
                            September 2024</p>
                    </div>

                    <div class="relative w-full md:w-80">
                        <input type="text" id="searchInput" placeholder="Search Barangay or Pumping Station..."
                            class="w-full pl-11 pr-4 py-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none bg-slate-50 transition-all shadow-inner"
                            onkeyup="filterTable()">
                        <div class="absolute left-4 top-3 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="#0F172A">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="overflow-x-auto max-h-[750px]">
                        <table class="w-full text-left border-collapse" id="facilitiesTable">
                            <thead
                                class="sticky-header bg-slate-50 text-slate-600 uppercase text-[11px] font-bold tracking-wider">
                                <tr>
                                    <th class="p-4 border-b border-slate-200">ID</th>
                                    <th class="p-4 border-b border-slate-200">Barangay</th>
                                    <th class="p-4 border-b border-slate-200">Pumping Station</th>
                                    <th class="p-4 border-b border-slate-200">Source</th>
                                    <th class="p-4 border-b border-slate-200 text-center">Capacity (m³/hr)</th>
                                    <th class="p-4 border-b border-slate-200">Water Treatment</th>
                                    <th class="p-4 border-b border-slate-200">Storage Tank</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm" id="tableBody">
                                <!-- Content populated by JS -->
                            </tbody>
                        </table>
                    </div>
                    <!-- Empty State -->
                    <div id="noResults" class="hidden p-12 text-center text-slate-500">
                        <p class="text-lg font-medium">No facilities found matching your search.</p>
                    </div>
                </div>

                <div class="mt-6 flex flex-col sm:flex-row justify-between items-center text-slate-500 text-xs gap-4">
                    <div class="flex gap-4">
                        <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-blue-500"></span> 77
                            Total Stations</span>
                        <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Active Monitoring</span>
                    </div>
                    <p class="italic">Unit measurement: Cubic Meters per Hour (m³/hr)</p>
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
    <script src="./js/index.js"></script>
    <script src="./js/nav-sticky.js"></script>
    <script src="./js/imgprev.js"></script>
    <script src="./js/tabpane2.js"></script>
    <script src="./js/wfac.js"></script>


</body>

</html>