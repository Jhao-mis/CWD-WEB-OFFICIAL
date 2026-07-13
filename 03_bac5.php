<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD Post Award Information</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/ind.css">
    <link rel="stylesheet" href="./css/jo.css">
    <link rel="stylesheet" href="./css/sidenav.css">


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
                            <i class="fa-solid fa-box-archive"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">BAC
                                Archives</a>
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
            <div class="col-sm-6 col-md-8 mb-4">

                <div class="text-center max-w-2xl mx-auto my-6 px-4">
                    <span
                        class="inline-block text-[10px] font-bold tracking-widest text-[#1a589e] uppercase bg-blue-50 px-2.5 py-1 rounded-full mb-2">
                        <i class="fa-solid fa-box-archive text-[10px] mr-1"></i> Archives Portal
                    </span>

                    <h1
                        class="text-2xl md:text-3xl font-black text-[#1a589e] uppercase tracking-wide mb-3 drop-shadow-sm">
                        Data Archives
                    </h1>

                    <div class="flex items-center justify-center gap-2 mb-4">
                        <span class="h-[3px] w-8 bg-gradient-to-r from-transparent to-[#1a589e] rounded-full"></span>
                        <span class="h-1.5 w-1.5 bg-[#1a589e] rounded-full"></span>
                        <span class="h-[3px] w-8 bg-gradient-to-l from-transparent to-[#1a589e] rounded-full"></span>
                    </div>

                    <p class="inv text-slate-600 text-xs md:text-sm leading-relaxed max-w-xl mx-auto">
                        Access comprehensive archives of historical procurement activities, bidding documents, and old
                        records.
                    </p>
                </div>

                <div class="container mx-auto bo">

                    <div id="accordion-data-archives" data-accordion="collapse"
                        data-active-classes="bg-blue-50/40 text-[#1a589e]"
                        data-inactive-classes="text-gray-700 bg-gray-50/70" class="space-y-3">

                        <div class="border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm">
                            <h2 id="heading-arch-bo">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-4 md:p-5 font-semibold text-gray-700 bg-gray-50/70 hover:bg-blue-50/50 transition-all duration-200 gap-3 border-l-4 border-transparent hover:border-[#1a589e] group"
                                    data-accordion-target="#body-arch-bo" aria-expanded="true"
                                    aria-controls="body-arch-bo">
                                    <div class="flex items-center gap-3.5 text-left">
                                        <div
                                            class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-[#1a589e] group-hover:bg-[#1a589e] group-hover:text-white transition-colors duration-200 hidden sm:flex">
                                            <i class="fa-solid fa-gavel text-base"></i>
                                        </div>
                                        <div class="flex flex-col sm:gap-0.5">
                                            <span
                                                class="font-black text-base md:text-lg text-[#1a589e] tracking-wide uppercase">Bidding
                                                Opportunities</span>
                                            <span class="text-xs md:text-sm text-gray-500 font-medium">Historical
                                                Procurement</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 ms-auto">
                                        <span
                                            class="bg-amber-100 text-amber-800 text-[10px] sm:text-xs font-bold px-2.5 py-1 rounded-full uppercase tracking-wider hidden sm:inline-block">Archive</span>
                                        <span
                                            class="inline-flex items-center gap-1.5 bg-gray-200/60 text-gray-700 group-hover:bg-blue-100 group-hover:text-[#1a589e] text-xs font-bold px-3 py-1.5 rounded-full transition-colors duration-200">
                                            <i class="fa-solid fa-file-invoice text-[10px] opacity-70"></i>
                                            4 Records
                                        </span>
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
                            <div id="body-arch-bo" class="hidden" aria-labelledby="heading-arch-bo">
                                <div class="p-4 border-t border-gray-100 bg-white">
                                    <div class="content-table w-full">
                                        <div
                                            class="header-row bg-[#1a589e] flex text-white font-bold p-3 text-xs md:text-sm uppercase rounded-t-lg">
                                            <div class="col-title font-bold flex-1">LINKS</div>
                                            <div class="col-date bac w-1/4 text-right pr-4">YEAR</div>
                                        </div>
                                        <div class="block max-h-80 overflow-y-auto divide-y divide-gray-100">
                                            <div
                                                class="data-row flex items-center p-3 text-sm transition-colors hover:bg-slate-50">
                                                <a href="https://cwd.com.ph/bac_2025.html" target="_blank"
                                                    class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline transition-colors duration-150 flex-1">Bidding
                                                    Opportunities</a>
                                                <div class="col-date bac w-1/4 text-right pr-4 text-gray-500 font-mono">
                                                    2025</div>
                                            </div>
                                            <div
                                                class="data-row flex items-center p-3 text-sm transition-colors hover:bg-slate-50">
                                                <a href="https://cwd.com.ph/bac_2024.html" target="_blank"
                                                    class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline transition-colors duration-150 flex-1">Bidding
                                                    Opportunities</a>
                                                <div class="col-date bac w-1/4 text-right pr-4 text-gray-500 font-mono">
                                                    2024</div>
                                            </div>
                                            <div
                                                class="data-row flex items-center p-3 text-sm transition-colors hover:bg-slate-50">
                                                <a href="https://cwd.com.ph/bac_2021.html" target="_blank"
                                                    class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline transition-colors duration-150 flex-1">Bidding
                                                    Opportunities</a>
                                                <div class="col-date bac w-1/4 text-right pr-4 text-gray-500 font-mono">
                                                    2021</div>
                                            </div>
                                            <div
                                                class="data-row flex items-center p-3 text-sm transition-colors hover:bg-slate-50">
                                                <a href="https://cwd.com.ph/bac_2020.html" target="_blank"
                                                    class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline transition-colors duration-150 flex-1">Bidding
                                                    Opportunities</a>
                                                <div class="col-date bac w-1/4 text-right pr-4 text-gray-500 font-mono">
                                                    2020</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm">
                            <h2 id="heading-arch-bba">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-4 md:p-5 font-semibold text-gray-700 bg-gray-50/70 hover:bg-blue-50/50 transition-all duration-200 gap-3 border-l-4 border-transparent hover:border-[#1a589e] group"
                                    data-accordion-target="#body-arch-bba" aria-expanded="false"
                                    aria-controls="body-arch-bba">
                                    <div class="flex items-center gap-3.5 text-left">
                                        <div
                                            class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-[#1a589e] group-hover:bg-[#1a589e] group-hover:text-white transition-colors duration-200 hidden sm:flex">
                                            <i class="fa-solid fa-file-lines text-base"></i>
                                        </div>
                                        <div class="flex flex-col sm:gap-0.5">
                                            <span
                                                class="font-black text-base md:text-lg text-[#1a589e] tracking-wide uppercase">Bid
                                                Bulletin / Addendums</span>
                                            <span class="text-xs md:text-sm text-gray-500 font-medium">Procurement
                                                Supplements</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 ms-auto">
                                        <span
                                            class="inline-flex items-center gap-1.5 bg-gray-200/60 text-gray-700 group-hover:bg-blue-100 group-hover:text-[#1a589e] text-xs font-bold px-3 py-1.5 rounded-full transition-colors duration-200">
                                            <i class="fa-solid fa-file-invoice text-[10px] opacity-70"></i>
                                            1 Record
                                        </span>
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
                            <div id="body-arch-bba" class="hidden" aria-labelledby="heading-arch-bba">
                                <div class="p-4 border-t border-gray-100 bg-white">
                                    <div class="content-table w-full">
                                        <div
                                            class="header-row bg-[#1a589e] flex text-white font-bold p-3 text-xs md:text-sm uppercase rounded-t-lg">
                                            <div class="col-title font-bold flex-1">LINKS</div>
                                            <div class="col-date bac w-1/4 text-right pr-4">YEAR</div>
                                        </div>
                                        <div class="block max-h-80 overflow-y-auto divide-y divide-gray-100">
                                            <div
                                                class="data-row flex items-center p-3 text-sm transition-colors hover:bg-slate-50">
                                                <a href="https://cwd.com.ph/bidbulletin.html" target="_blank"
                                                    class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline transition-colors duration-150 flex-1">Bid
                                                    Bulletin/Addendums</a>
                                                <div class="col-date bac w-1/4 text-right pr-4 text-gray-500 font-mono">
                                                    2025-2023</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm">
                            <h2 id="heading-arch-nop">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-4 md:p-5 font-semibold text-gray-700 bg-gray-50/70 hover:bg-blue-50/50 transition-all duration-200 gap-3 border-l-4 border-transparent hover:border-[#1a589e] group"
                                    data-accordion-target="#body-arch-nop" aria-expanded="false"
                                    aria-controls="body-arch-nop">
                                    <div class="flex items-center gap-3.5 text-left">
                                        <div
                                            class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-[#1a589e] group-hover:bg-[#1a589e] group-hover:text-white transition-colors duration-200 hidden sm:flex">
                                            <i class="fa-regular fa-calendar-days text-base"></i>
                                        </div>
                                        <div class="flex flex-col sm:gap-0.5">
                                            <span
                                                class="font-black text-base md:text-lg text-[#1a589e] tracking-wide uppercase">Notices
                                                of Postponement</span>
                                            <span class="text-xs md:text-sm text-gray-500 font-medium">Rescheduled
                                                Activities</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 ms-auto">
                                        <span
                                            class="inline-flex items-center gap-1.5 bg-gray-200/60 text-gray-700 group-hover:bg-blue-100 group-hover:text-[#1a589e] text-xs font-bold px-3 py-1.5 rounded-full transition-colors duration-200">
                                            <i class="fa-solid fa-file-invoice text-[10px] opacity-70"></i>
                                            1 Record
                                        </span>
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
                            <div id="body-arch-nop" class="hidden" aria-labelledby="heading-arch-nop">
                                <div class="p-4 border-t border-gray-100 bg-white">
                                    <div class="content-table w-full">
                                        <div
                                            class="header-row bg-[#1a589e] flex text-white font-bold p-3 text-xs md:text-sm uppercase rounded-t-lg">
                                            <div class="col-title font-bold flex-1">LINKS</div>
                                            <div class="col-date bac w-1/4 text-right pr-4">YEAR</div>
                                        </div>
                                        <div class="block max-h-80 overflow-y-auto divide-y divide-gray-100">
                                            <div
                                                class="data-row flex items-center p-3 text-sm transition-colors hover:bg-slate-50">
                                                <a href="https://cwd.com.ph/notice_of_postponement.html" target="_blank"
                                                    class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline transition-colors duration-150 flex-1">Notices
                                                    of Postponement</a>
                                                <div class="col-date bac w-1/4 text-right pr-4 text-gray-500 font-mono">
                                                    2025</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm">
                            <h2 id="heading-arch-pai">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-4 md:p-5 font-semibold text-gray-700 bg-gray-50/70 hover:bg-blue-50/50 transition-all duration-200 gap-3 border-l-4 border-transparent hover:border-[#1a589e] group"
                                    data-accordion-target="#body-arch-pai" aria-expanded="false"
                                    aria-controls="body-arch-pai">
                                    <div class="flex items-center gap-3.5 text-left">
                                        <div
                                            class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-[#1a589e] group-hover:bg-[#1a589e] group-hover:text-white transition-colors duration-200 hidden sm:flex">
                                            <i class="fa-solid fa-medal text-base"></i>
                                        </div>
                                        <div class="flex flex-col sm:gap-0.5">
                                            <span
                                                class="font-black text-base md:text-lg text-[#1a589e] tracking-wide uppercase">Post-Award
                                                Information</span>
                                            <span class="text-xs md:text-sm text-gray-500 font-medium">Awarded
                                                Contracts</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 ms-auto">
                                        <span
                                            class="inline-flex items-center gap-1.5 bg-gray-200/60 text-gray-700 group-hover:bg-blue-100 group-hover:text-[#1a589e] text-xs font-bold px-3 py-1.5 rounded-full transition-colors duration-200">
                                            <i class="fa-solid fa-file-invoice text-[10px] opacity-70"></i>
                                            1 Record
                                        </span>
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
                            <div id="body-arch-pai" class="hidden" aria-labelledby="heading-arch-pai">
                                <div class="p-4 border-t border-gray-100 bg-white">
                                    <div class="content-table w-full">
                                        <div
                                            class="header-row bg-[#1a589e] flex text-white font-bold p-3 text-xs md:text-sm uppercase rounded-t-lg">
                                            <div class="col-title font-bold flex-1">LINKS</div>
                                            <div class="col-date bac w-1/4 text-right pr-4">YEAR</div>
                                        </div>
                                        <div class="block max-h-80 overflow-y-auto divide-y divide-gray-100">
                                            <div
                                                class="data-row flex items-center p-3 text-sm transition-colors hover:bg-slate-50">
                                                <a href="https://cwd.com.ph/post_award.html" target="_blank"
                                                    class="col-title bac text-decoration-none hover:text-[#1a589e] hover:underline transition-colors duration-150 flex-1">Post-Award
                                                    Information</a>
                                                <div class="col-date bac w-1/4 text-right pr-4 text-gray-500 font-mono">
                                                    2025</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm">
                            <h2 id="heading-arch-oldweb">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-4 md:p-5 font-semibold text-gray-700 bg-gray-50/70 hover:bg-blue-50/50 transition-all duration-200 gap-3 border-l-4 border-transparent hover:border-[#1a589e] group"
                                    data-accordion-target="#body-arch-oldweb" aria-expanded="false"
                                    aria-controls="body-arch-oldweb">
                                    <div class="flex items-center gap-3.5 text-left">
                                        <div
                                            class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-[#1a589e] group-hover:bg-[#1a589e] group-hover:text-white transition-colors duration-200 hidden sm:flex">
                                            <i class="fa-solid fa-box-archive text-base"></i>
                                        </div>
                                        <div class="flex flex-col sm:gap-0.5">
                                            <span
                                                class="font-black text-base md:text-lg text-[#1a589e] tracking-wide uppercase">Old
                                                Website Archive</span>
                                            <span class="text-xs md:text-sm text-gray-500 font-medium">Historical Legacy
                                                Data</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 ms-auto">
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
                            <div id="body-arch-oldweb" class="hidden" aria-labelledby="heading-arch-oldweb">
                                <div class="p-6 border-t border-gray-100 bg-slate-50/50">
                                    <div
                                        class="max-w-md mx-auto bg-white rounded-2xl shadow-md overflow-hidden border-t-4 border-[#1a589e]">
                                        <div class="p-6 text-center">
                                            <div
                                                class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                                <i class="fas fa-archive text-[#1a589e] text-2xl"></i>
                                            </div>
                                            <h5 class="text-xl font-bold text-[#1a589e] mb-2">Visit Our Old Website</h5>
                                            <p class="text-gray-600 text-xs mb-6 px-2">
                                                Looking for older legacy documents? Access our previous portal
                                                containing past bidding opportunities and historical summaries.
                                            </p>
                                            <a href="https://cwd.com.ph/bac_2026.html" target="_blank"
                                                class="inline-flex items-center justify-center w-full px-5 py-2.5 text-white bg-[#1a589e] hover:bg-blue-800 rounded-lg text-sm font-semibold transition duration-200 shadow-md group">
                                                Visit Portal Archive
                                                <i
                                                    class="fas fa-arrow-up-right-from-square ms-2 text-xs transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5"></i>
                                            </a>
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