<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD Bid Bulletin / Addendum</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/ind.css">
    <link rel="stylesheet" href="./css/bac.css">
    <link rel="stylesheet" href="./css/sidenav.css">
    <link rel="stylesheet" href="./css/bac-accordion.css">



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
                        <a href="./events"
                            class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">
                            <i class="fa-solid fa-calendar-days text-sm mr-2"></i>
                            Events
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
                            <i class="fa-solid fa-file-lines"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Bid
                                Bulletin / Addendum</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">Bids and Awards
            </h1>
        </div>

        <svg class="absolute bottom-0 left-0 w-full h-[60px] sm:h-[120px] md:h-[100px] lg:h-[80px] z-0"
            viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="white" fill-opacity="1"
                d="M0,128L40,133.3C80,139,160,149,240,144C320,139,400,117,480,133.3C560,149,640,203,720,186.7C800,171,880,85,960,74.7C1040,64,1120,128,1200,144C1280,160,1360,128,1400,112L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
    </div>

    <!-- Main Content -->

    <div class="container mx-auto">
        <div class="row g-0 mt-4">

            <!-- Main Content -->
            <div class="col-sm-6 col-md-8">

                <!-- Main Heading Section (Polished Version) -->
                <div class="text-center max-w-2xl mx-auto my-6 px-4">
                    <!-- Mini Upper Tag / Badge -->
                    <span
                        class="inline-block text-[10px] font-bold tracking-widest text-[#1a589e] uppercase bg-blue-50 px-2.5 py-1 rounded-full mb-2">
                        <i class="fa-solid fa-file-lines text-[10px] mr-1"></i> Addendum Portal
                    </span>

                    <!-- Main Heading -->
                    <h1
                        class="text-2xl md:text-3xl font-black text-[#1a589e] uppercase tracking-wide mb-3 drop-shadow-sm">
                        Bid Bulletin / Addendum
                    </h1>

                    <!-- Polished Accent Divider Line -->
                    <div class="flex items-center justify-center gap-2 mb-4">
                        <span class="h-[3px] w-8 bg-gradient-to-r from-transparent to-[#1a589e] rounded-full"></span>
                        <span class="h-1.5 w-1.5 bg-[#1a589e] rounded-full"></span>
                        <span class="h-[3px] w-8 bg-gradient-to-l from-transparent to-[#1a589e] rounded-full"></span>
                    </div>

                    <!-- Sub-heading / Description -->
                    <p class="text-lg font-bold tracking-wide text-slate-500 uppercase md:text-sm">
                        For the Calendar Year <?= date('Y'); ?>
                    </p>

                </div>

                <div class="container mx-auto bo">

                    <div id="accordion-bid-bulletin" data-accordion="collapse"
                        data-active-classes="bg-blue-50 text-[#1a589e]" data-inactive-classes="text-gray-700 bg-gray-50"
                        class="space-y-3">

                        <div class="border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm">

                            <h2 id="heading-q1">

                                <button type="button"
                                    class="flex items-center justify-between w-full p-4 md:p-5 font-semibold text-gray-700 bg-gray-50/70 hover:bg-blue-50/50 transition-all duration-200 gap-3 border-l-4 border-transparent hover:border-[#1a589e] group"
                                    data-accordion-target="#body-q1" aria-expanded="false" aria-controls="body-q1">

                                    <!-- Kaliwang Bahagi: Icon + Quarter at Buwan -->
                                    <div class="flex items-center gap-3.5 text-left">
                                        <!-- Visual Calendar Icon Accent -->
                                        <div
                                            class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-[#1a589e] group-hover:bg-[#1a589e] group-hover:text-white transition-colors duration-200 hidden sm:flex">
                                            <i class="fa-sharp fa-regular fa-1 text-base"></i>
                                        </div>

                                        <div class="flex flex-col sm:gap-0.5">
                                            <span
                                                class="font-black text-base md:text-lg text-[#1a589e] tracking-wide uppercase">1st
                                                Quarter</span>
                                            <span
                                                class="text-xs md:text-sm text-gray-500 font-medium flex items-center gap-1">
                                                <i class="fa-regular fa-clock text-[11px] sm:hidden text-gray-400"></i>
                                                January - March
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Kanang Bahagi: Styled Badge + Arrow Icon -->
                                    <div class="flex items-center gap-3 ms-auto">
                                        <!-- Transparent / Minimalist Pill Badge para sa Postings -->
                                        <span
                                            class="inline-flex items-center gap-1.5 bg-gray-200/60 text-gray-700 group-hover:bg-blue-100 group-hover:text-[#1a589e] text-xs font-bold px-3 py-1.5 rounded-full transition-colors duration-200">
                                            <i class="fa-solid fa-file-invoice text-[10px] opacity-70"></i>
                                            4 Postings
                                        </span>

                                        <!-- Chevron Icon Container -->
                                        <div
                                            class="p-1 rounded-full bg-gray-100 text-gray-400 group-hover:bg-blue-50 group-hover:text-[#1a589e] transition-colors duration-200">
                                            <svg data-accordion-icon
                                                class="w-3.5 h-3.5 shrink-0 transition-transform duration-200 text-current"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2.5" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </div>
                                    </div>
                                </button>

                            </h2>

                            <div id="body-q1" class="hidden" aria-labelledby="heading-q1">

                                <div class="p-4 border-t border-gray-100 bg-white">
                                    <div class="content-table">
                                        <div
                                            class="header-row bg-[#1a589e] flex text-white font-bold p-3 text-xs md:text-sm uppercase rounded-t-lg">
                                            <div class="col-bidcode w-1/4">Reference No.</div>
                                            <div class="col-title text-center font-bold flex-1">Title / Particulars
                                            </div>
                                            <div class="col-date bac w-1/4 text-right">Date Issued</div>
                                        </div>

                                        <div class="scrollableTableBody divide-y divide-gray-100">

                                            <div class="bg-slate-50 p-2">
                                                <div class="header-month font-bold justify-center">
                                                    January</div>
                                            </div>

                                            <div class="data-row">
                                                <a href="assets\Files\bac\BidBull\2026\Q1\CWD 84-2025 Addendum No. 1.pdf"
                                                    target="_blank"
                                                    class="col-date bac text-left text-decoration-none font-mono">CWD
                                                    84-2025</a>
                                                <a href="assets\Files\bac\BidBull\2026\Q1\CWD 84-2025 Addendum No. 1.pdf"
                                                    target="_blank"
                                                    class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline">Supply
                                                    and
                                                    Delivery Various Office Equipment, Furniture and Fixtures of
                                                    Different
                                                    Departments (Rebidding)</a>
                                                <div class="col-date">January 8</div>
                                            </div>

                                            <div class="data-row">
                                                <a href="assets\Files\bac\BidBull\2026\Q1\CWD 83-2025 Addendum No.1.pdf"
                                                    target="_blank"
                                                    class="col-date bac text-left text-decoration-none font-mono">CWD
                                                    83-2025</a>
                                                <a href="assets\Files\bac\BidBull\2026\Q1\CWD 83-2025 Addendum No.1.pdf"
                                                    target="_blank"
                                                    class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline">Supply
                                                    and
                                                    Delivery Various I.T Equipment and Accessories of Different
                                                    Departments</a>
                                                <div class="col-date">January 9</div>
                                            </div>

                                            <div class="data-row">
                                                <a href="assets\Files\bac\BidBull\2026\Q1\Addendum No. 1 (CWD 01-2026).pdf"
                                                    target="_blank"
                                                    class="col-date bac text-left text-decoration-none font-mono">CWD
                                                    01-2026</a>
                                                <a href="assets\Files\bac\BidBull\2026\Q1\Addendum No. 1 (CWD 01-2026).pdf"
                                                    target="_blank"
                                                    class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline">Supply
                                                    and
                                                    Delivery Various I.T. Equipment and Accessories of Different
                                                    Departments
                                                    (Rebidding)</a>
                                                <div class="col-date">January 30</div>
                                            </div>

                                            <div class="bg-slate-50 p-2">
                                                <div class="header-month font-bold justify-center">
                                                    February</div>
                                            </div>

                                            <div class="data-row">
                                                <a href="assets\Files\bac\BidBull\2026\Q1\Addendum No. 2 (CWD 01-2026).pdf"
                                                    target="_blank"
                                                    class="col-date bac text-left text-decoration-none font-mono">CWD
                                                    01-2026</a>
                                                <a href="assets\Files\bac\BidBull\2026\Q1\Addendum No. 2 (CWD 01-2026).pdf"
                                                    target="_blank"
                                                    class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline">Supply
                                                    and
                                                    Delivery Various I.T. Equipment and Accessories of Different
                                                    Departments
                                                    (Rebidding)</a>
                                                <div class="col-date">February 9</div>
                                            </div>

                                            <div class="bg-slate-50 p-2">
                                                <div class="header-month font-bold justify-center">
                                                    March</div>
                                            </div>

                                            <div
                                                class="data-row justify-content-center text-center text-slate-400 italic py-6 text-sm flex items-center justify-center">
                                                <i class="fa-regular fa-folder-open me-2 text-base"></i>No bid bulletin/addendum posted for this month.
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm">

                            <h2 id="heading-q2">

                                <button type="button"
                                    class="flex items-center justify-between w-full p-4 md:p-5 font-semibold text-gray-700 bg-gray-50/70 hover:bg-blue-50/50 transition-all duration-200 gap-3 border-l-4 border-transparent hover:border-[#1a589e] group"
                                    data-accordion-target="#body-q2" aria-expanded="false" aria-controls="body-q1">

                                    <!-- Kaliwang Bahagi: Icon + Quarter at Buwan -->
                                    <div class="flex items-center gap-3.5 text-left">
                                        <!-- Visual Calendar Icon Accent -->
                                        <div
                                            class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-[#1a589e] group-hover:bg-[#1a589e] group-hover:text-white transition-colors duration-200 hidden sm:flex">
                                            <i class="fa-sharp fa-regular fa-2 text-base"></i>
                                        </div>

                                        <div class="flex flex-col sm:gap-0.5">
                                            <span
                                                class="font-black text-base md:text-lg text-[#1a589e] tracking-wide uppercase">2nd
                                                Quarter</span>
                                            <span
                                                class="text-xs md:text-sm text-gray-500 font-medium flex items-center gap-1">
                                                <i class="fa-regular fa-clock text-[11px] sm:hidden text-gray-400"></i>
                                                April - June
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Kanang Bahagi: Styled Badge + Arrow Icon -->
                                    <div class="flex items-center gap-3 ms-auto">
                                        <!-- Transparent / Minimalist Pill Badge para sa Postings -->
                                        <span
                                            class="inline-flex items-center gap-1.5 bg-gray-200/60 text-gray-700 group-hover:bg-blue-100 group-hover:text-[#1a589e] text-xs font-bold px-3 py-1.5 rounded-full transition-colors duration-200">
                                            <i class="fa-solid fa-file-invoice text-[10px] opacity-70"></i>
                                            2 Postings
                                        </span>

                                        <!-- Chevron Icon Container -->
                                        <div
                                            class="p-1 rounded-full bg-gray-100 text-gray-400 group-hover:bg-blue-50 group-hover:text-[#1a589e] transition-colors duration-200">
                                            <svg data-accordion-icon
                                                class="w-3.5 h-3.5 shrink-0 transition-transform duration-200 text-current"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2.5" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </div>
                                    </div>
                                </button>

                            </h2>

                            <div id="body-q2" class="hidden" aria-labelledby="heading-q2">
                                <div class="p-4 border-t border-gray-100 bg-white">

                                    <div class="content-table">
                                        <div
                                            class="header-row bg-[#1a589e] flex text-white font-bold p-3 text-xs md:text-sm uppercase rounded-t-lg">
                                            <div class="col-bidcode w-1/4">Reference No.</div>
                                            <div class="col-title text-center font-bold flex-1">Title / Particulars
                                            </div>
                                            <div class="col-date bac w-1/4 text-right">Date Issued</div>
                                        </div>
                                        <div class="scrollableTableBody">

                                            <div class="bg-slate-50 p-2">
                                                <div class="header-month font-bold justify-center">
                                                    April</div>
                                            </div>

                                            <div class="data-row">
                                                <a href="assets\Files\bac\BidBull\2026\Q2\Addendum No. 1 (CWD 07-2026).pdf"
                                                    target="_blank"
                                                    class="col-date bac text-left text-decoration-none font-mono">CWD
                                                    07-2026</a>
                                                <a href="assets\Files\bac\BidBull\2026\Q2\Addendum No. 1 (CWD 07-2026).pdf"
                                                    target="_blank"
                                                    class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline">Supply
                                                    and
                                                    Supply and Delivery of Denorado Rice</a>
                                                <div class="col-date">April 27</div>
                                            </div>

                                            <div class="bg-slate-50 p-2">
                                                <div class="header-month font-bold justify-center">
                                                    May</div>
                                            </div>

                                            <div class="data-row">
                                                <a href="assets\Files\bac\BidBull\2026\Q2\Addendum No. 1 (CWD 08-2026).pdf"
                                                    target="_blank"
                                                    class="col-date bac text-left text-decoration-none font-mono">CWD
                                                    08-2026</a>
                                                <a href="assets\Files\bac\BidBull\2026\Q2\Addendum No. 1 (CWD 08-2026).pdf"
                                                    target="_blank"
                                                    class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline">Supply
                                                    and
                                                    Supply of Services for the Preventive Maintenance of CWD's Septage
                                                    Treatment Plant</a>
                                                <div class="col-date">May 5</div>
                                            </div>

                                            <div class="bg-slate-50 p-2">
                                                <div class="header-month font-bold justify-center">
                                                    June</div>
                                            </div>

                                            <div
                                                class="data-row justify-content-center text-center text-slate-400 italic py-6 text-sm flex items-center justify-center">
                                                <i class="fa-regular fa-folder-open me-2 text-base"></i>No bid bulletin/addendum posted for this month.
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm">

                            <h2 id="heading-q3">

                                <button type="button"
                                    class="flex items-center justify-between w-full p-4 md:p-5 font-semibold text-gray-700 bg-gray-50/70 hover:bg-blue-50/50 transition-all duration-200 gap-3 border-l-4 border-transparent hover:border-[#1a589e] group"
                                    data-accordion-target="#body-q3" aria-expanded="false" aria-controls="body-q1">

                                    <!-- Kaliwang Bahagi: Icon + Quarter at Buwan -->
                                    <div class="flex items-center gap-3.5 text-left">
                                        <!-- Visual Calendar Icon Accent -->
                                        <div
                                            class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-[#1a589e] group-hover:bg-[#1a589e] group-hover:text-white transition-colors duration-200 hidden sm:flex">
                                            <i class="fa-sharp fa-regular fa-3 text-base"></i>
                                        </div>

                                        <div class="flex flex-col sm:gap-0.5">
                                            <span
                                                class="font-black text-base md:text-lg text-[#1a589e] tracking-wide uppercase">3rd
                                                Quarter</span>

                                            <span
                                                class="text-xs md:text-sm text-gray-500 font-medium flex items-center gap-1">
                                                <i class="fa-regular fa-clock text-[11px] sm:hidden text-gray-400"></i>
                                                July - September
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Kanang Bahagi: Styled Badge + Arrow Icon -->
                                    <div class="flex items-center gap-3 ms-auto">
                                        <!-- Transparent / Minimalist Pill Badge para sa Postings -->
                                        <span
                                            class="bg-amber-100 text-amber-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Current
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-1.5 bg-gray-200/60 text-gray-700 group-hover:bg-blue-100 group-hover:text-[#1a589e] text-xs font-bold px-3 py-1.5 rounded-full transition-colors duration-200">
                                            <i class="fa-solid fa-file-invoice text-[10px] opacity-70"></i>
                                            4 Postings
                                        </span>

                                        <!-- Chevron Icon Container -->
                                        <div
                                            class="p-1 rounded-full bg-gray-100 text-gray-400 group-hover:bg-blue-50 group-hover:text-[#1a589e] transition-colors duration-200">
                                            <svg data-accordion-icon
                                                class="w-3.5 h-3.5 shrink-0 transition-transform duration-200 text-current"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2.5" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </div>
                                    </div>
                                </button>

                            </h2>

                            <div id="body-q3" class="hidden" aria-labelledby="heading-q3">
                                <div class="p-4 border-t border-gray-100 bg-white">

                                    <div class="content-table">
                                        <div
                                            class="header-row bg-[#1a589e] flex text-white font-bold p-3 text-xs md:text-sm uppercase rounded-t-lg">
                                            <div class="col-bidcode w-1/4">Reference No.</div>
                                            <div class="col-title text-center font-bold flex-1">Title / Particulars
                                            </div>
                                            <div class="col-date bac w-1/4 text-right">Date Issued</div>
                                        </div>
                                        <div class="scrollableTableBody">

                                            <div class="bg-slate-50 p-2">
                                                <div class="header-month font-bold justify-center">
                                                    July</div>
                                            </div>

                                            <div class="data-row">
                                                <a href="assets\Files\bac\BidBull\2026\Q3\Addendum No. 2 (CWD 27-2026).pdf"
                                                    target="_blank"
                                                    class="col-date bac text-left text-decoration-none font-mono">CWD
                                                    27-2026</a>
                                                <a href="assets\Files\bac\BidBull\2026\Q3\Addendum No. 2 (CWD 27-2026).pdf"
                                                    target="_blank" class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline">Supply
                                                    and Delivery of Submersible Cable, Manual Transfer Switch and
                                                    Accessories (Rebidding)</a>
                                                <div class="col-date">July 7</div>
                                            </div>

                                            <div class="data-row">
                                                <a href="assets\Files\bac\BidBull\2026\Q3\Addendum No. 1 (CWD 26-2026).pdf"
                                                    target="_blank"
                                                    class="col-date bac text-left text-decoration-none font-mono">CWD
                                                    26-2026</a>
                                                <a href="assets\Files\bac\BidBull\2026\Q3\Addendum No. 1 (CWD 26-2026).pdf"
                                                    target="_blank" class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline">Supply
                                                    and Delivery of Submersible Pumps and Motors (Rebidding)</a>
                                                <div class="col-date">July 7</div>
                                            </div>

                                            <div class="data-row">
                                                <a href="assets\Files\bac\BidBull\2026\Q3\Addendum No. 1 (CWD 38-2026).pdf"
                                                    target="_blank"
                                                    class="col-date bac text-left text-decoration-none font-mono">CWD
                                                    38-2026</a>
                                                <a href="assets\Files\bac\BidBull\2026\Q3\Addendum No. 1 (CWD 38-2026).pdf"
                                                    target="_blank" class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline">Supply and Delivery of Goods and Services for CWD's 50th  Founding Anniversary</a>
                                                <div class="col-date">July 20</div>
                                            </div>

                                            <div class="bg-slate-50 p-2">
                                                <div class="header-month font-bold justify-center">
                                                    August</div>
                                            </div>

                                            <div class="data-row">
                                                <a href="assets\Files\bac\BidBull\2026\Q3\Addendum No. 1 (CWD 50-2026).pdf"
                                                    target="_blank"
                                                    class="col-date bac text-left text-decoration-none font-mono">CWD
                                                    50-2026</a>
                                                <a href="assets\Files\bac\BidBull\2026\Q3\Addendum No. 1 (CWD 50-2026).pdf"
                                                    target="_blank" class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline">Supply and Delivery of Submersible Pumps and Motors</a>
                                                <div class="col-date">August 24</div>
                                            </div>

                                            <div class="bg-slate-50 p-2">
                                                <div class="header-month font-bold justify-center">
                                                    September</div>
                                            </div>

                                            <div
                                                class="data-row justify-content-center text-center text-slate-400 italic py-6 text-sm flex items-center justify-center">
                                                <i class="fa-regular fa-folder-open me-2 text-base"></i>No bid bulletin/addendum posted for this month yet.
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm">

                            <h2 id="heading-q4">

                                <button type="button"
                                    class="flex items-center justify-between w-full p-4 md:p-5 font-semibold text-gray-700 bg-gray-50/70 hover:bg-blue-50/50 transition-all duration-200 gap-3 border-l-4 border-transparent hover:border-[#1a589e] group"
                                    data-accordion-target="#body-q4" aria-expanded="false" aria-controls="body-q1">

                                    <!-- Kaliwang Bahagi: Icon + Quarter at Buwan -->
                                    <div class="flex items-center gap-3.5 text-left">
                                        <!-- Visual Calendar Icon Accent -->
                                        <div
                                            class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-[#1a589e] group-hover:bg-[#1a589e] group-hover:text-white transition-colors duration-200 hidden sm:flex">
                                            <i class="fa-sharp fa-regular fa-4 text-base"></i>
                                        </div>

                                        <div class="flex flex-col sm:gap-0.5">
                                            <span
                                                class="font-black text-base md:text-lg text-[#1a589e] tracking-wide uppercase">4th
                                                Quarter</span>
                                            <span
                                                class="text-xs md:text-sm text-gray-500 font-medium flex items-center gap-1">
                                                <i class="fa-regular fa-clock text-[11px] sm:hidden text-gray-400"></i>
                                                October - December
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Kanang Bahagi: Styled Badge + Arrow Icon -->
                                    <div class="flex items-center gap-3 ms-auto">
                                        <!-- Transparent / Minimalist Pill Badge para sa Postings -->
                                        <span
                                            class="inline-flex items-center gap-1.5 bg-gray-200/60 text-gray-700 group-hover:bg-blue-100 group-hover:text-[#1a589e] text-xs font-bold px-3 py-1.5 rounded-full transition-colors duration-200">
                                            <i class="fa-solid fa-file-invoice text-[10px] opacity-70"></i>
                                            0 Postings
                                        </span>

                                        <!-- Chevron Icon Container -->
                                        <div
                                            class="p-1 rounded-full bg-gray-100 text-gray-400 group-hover:bg-blue-50 group-hover:text-[#1a589e] transition-colors duration-200">
                                            <svg data-accordion-icon
                                                class="w-3.5 h-3.5 shrink-0 transition-transform duration-200 text-current"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2.5" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </div>
                                    </div>
                                </button>

                            </h2>

                            <div id="body-q4" class="hidden" aria-labelledby="heading-q4">
                                <div class="p-4 border-t border-gray-100 bg-white">

                                    <div class="content-table">
                                        <div
                                            class="header-row bg-[#1a589e] flex text-white font-bold p-3 text-xs md:text-sm uppercase rounded-t-lg">
                                            <div class="col-bidcode w-1/4">Reference No.</div>
                                            <div class="col-title text-center font-bold flex-1">Title / Particulars
                                            </div>
                                            <div class="col-date bac w-1/4 text-right">Date Issued</div>
                                        </div>
                                        <div class="scrollableTableBody">

                                            <div
                                                class="data-row justify-content-center text-center text-slate-400 italic py-6 text-sm flex items-center justify-center">
                                                <i class="fa-regular fa-folder-open me-2 text-base"></i>No bid bulletin/addendum posted for this quarter yet.
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Left Navigation -->
            <?php include 'includes/bacleftnav.php'; ?>

        </div>
    </div>


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


</body>

</html>