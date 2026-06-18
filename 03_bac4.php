<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD Post Award Information</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png"/>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/ind.css">
    <link rel="stylesheet" href="./css/bac.css">
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
                        <a href="./events.html"
                            class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="#fff" stroke-width="2.25" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-icons-main lucide-calendar-icon mr-2">
                                <path d="M8 2v4" />
                                <path d="M16 2v4" />
                                <rect width="18" height="18" x="3" y="4" rx="2" />
                                <path d="M3 10h18" />
                            </svg>
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
                            <i class="fa-solid fa-medal"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Post-Award Information</a>
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
                <h4 class="text-2xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">
                    Post-award Information</h4>
                <h5 class="inv text-slate-600">Bids Awarded for the Year <span id="bacyear">2026</span></h5>

                <div class="container mx-auto bo">


                    <!-- Pagination Component (Bootstrap Pills for Quarters) -->
                    <nav aria-label="Year navigation" class="mb-4 d-flex justify-content-center">
                        <ul class="nav nav-pills shadow-sm rounded-pill p-1 bg-white" id="pills-tab" role="tablist">

                            <!-- 2025 is the latest year, so it is marked active and selected -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link-pag" id="pills-q4-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-q1" type="button" role="tab" aria-controls="pills-q4"
                                    aria-selected="true">Q1</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link-pag" id="pills-q3-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-q2" type="button" role="tab" aria-controls="pills-q3"
                                    aria-selected="false">Q2</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link-pag" id="pills-q2-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-q3" type="button" role="tab" aria-controls="pills-q2"
                                    aria-selected="false">Q3</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link-pag" id="pills-q1-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-q4" type="button" role="tab" aria-controls="pills-q1"
                                    aria-selected="false">Q4</button>
                            </li>

                        </ul>
                    </nav>

                    <!-- Tab Content (Job Postings Tables) -->
                    <div class="tab-content" id="pills-tabContent">

                        <!-- Tab Pane for 2025 (Active by default) -->
                        <div class="tab-pane fade" id="pills-q4" role="tabpanel" aria-labelledby="pills-2024-tab">
                            <div class="content-table">

                                <div class="header-row bg-[#1a589e]">
                                    <div class="col-bidcode">Bid Code</div>
                                    <div class="col-title text-center font-bold">Bidding Title</div>
                                    <div class="col-date bac">Upload Date</div>
                                </div>

                                <div id="scrollableTableBody">
                                    <div class="data-row justify-content-center">
                                        <div class="header-month font-bold">DECEMBER</div>
                                    </div>

                                    <div class="data-row">
                                        
                                    </div>

                                    <div class="data-row justify-content-center">
                                        <div class="header-month font-bold">NOVEMBER</div>
                                    </div>

                                    <div class="data-row">
                                        
                                    </div>

                                    <div class="data-row justify-content-center">
                                        <div class="header-month font-bold">OCTOBER</div>
                                    </div>

                                    <div class="data-row">
                                        
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- Tab Pane for 2024 -->
                        <div class="tab-pane fade" id="pills-q3" role="tabpanel" aria-labelledby="pills-2024-tab">
                            <div class="content-table">

                                <div class="header-row bg-[#1a589e]">
                                    <div class="col-bidcode">Bid Code</div>
                                    <div class="col-title text-center font-bold">Bidding Title</div>
                                    <div class="col-date bac">Upload Date</div>
                                </div>

                                <div id="scrollableTableBody">

                                    <div class="data-row justify-content-center">
                                        <div class="header-month font-bold">SEPTEMBER</div>
                                    </div>

                                    <div class="data-row">
                                        
                                    </div>

                                    <div class="data-row justify-content-center">
                                        <div class="header-month font-bold">AUGUST</div>
                                    </div>

                                    <div class="data-row">
                                        
                                    </div>

                                    <div class="data-row justify-content-center">
                                        <div class="header-month font-bold">JULY</div>
                                    </div>

                                    <div class="data-row">
                                        
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- Tab Pane for 2023 -->
                        <div class="tab-pane fade" id="pills-q2" role="tabpanel" aria-labelledby="pills-2024-tab">
                            <div class="content-table">

                                <div class="header-row bg-[#1a589e]">
                                    <div class="col-bidcode">Bid Code</div>
                                    <div class="col-title text-center font-bold">Bidding Title</div>
                                    <div class="col-date bac">Upload Date</div>
                                </div>

                                <div id="scrollableTableBody">

                                    <div class="data-row justify-content-center">
                                        <div class="header-month font-bold">JUNE</div>
                                    </div>

                                    <div class="data-row">
                                        
                                    </div>

                                    <div class="data-row justify-content-center">
                                        <div class="header-month font-bold">MAY</div>
                                    </div>

                                    <div class="data-row">
                                        <a href="assets\Files\bac\PostAward\2026\CWD 06-2026.zip" class="col-date bac text-left text-decoration-none">CWD 2026-06</a>
                                        <a href="assets\Files\bac\PostAward\2026\CWD 06-2026.zip" class="col-title bac text-decoration-none">Supply and Delivery of Tokens (Chicken with Assorted Muffins) (SVP)</a>
                                        <div class="col-date">May 21</div>
                                    </div>

                                    <div class="data-row">
                                        <a href="assets\Files\bac\PostAward\2026\CWD 04-2026.zip" class="col-date bac text-left text-decoration-none">CWD 2026-04</a>
                                        <a href="assets\Files\bac\PostAward\2026\CWD 04-2026.zip" class="col-title bac text-decoration-none">Supply of Materials and Services for the Installation of Canopy at CWD Extension Office-Canlubang (SVP) (2nd Posting) (CWD 04-2026)</a>
                                        <div class="col-date">May 21</div>
                                    </div>

                                    <div class="data-row">
                                        <a href="assets\Files\bac\PostAward\2026\CWD 03-2026.zip" class="col-date bac text-left text-decoration-none">CWD 2026-03</a>
                                        <a href="assets\Files\bac\PostAward\2026\CWD 03-2026.zip" class="col-title bac text-decoration-none">Supply of Services for the Operations and Maintenance of CWD Septage Treatment Plant (SpTP) (Renewal of Contract for Three (3) Months)</a>
                                        <div class="col-date">May 21</div>
                                    </div>

                                    <div class="data-row">
                                        <a href="assets\Files\bac\PostAward\2026\CWD 02-2026.zip" class="col-date bac text-left text-decoration-none">CWD 2026-02</a>
                                        <a href="assets\Files\bac\PostAward\2026\CWD 02-2026.zip" class="col-title bac text-decoration-none">Supply of Janitorial Services for CY 2026</a>
                                        <div class="col-date">May 21</div>
                                    </div>

                                    <div class="data-row">
                                        <a href="assets\Files\bac\PostAward\2026\CWD 01-2026.zip" class="col-date bac text-left text-decoration-none">CWD 2026-01</a>
                                        <a href="assets\Files\bac\PostAward\2026\CWD 01-2026.zip" class="col-title bac text-decoration-none">Supply and Delivery of Various I.T Equipment and Accessories of Different Departments (Rebidding)</a>
                                        <div class="col-date">May 21</div>
                                    </div>

                                    <div class="data-row justify-content-center">
                                        <div class="header-month font-bold">APRIL</div>
                                    </div>

                                    <div class="data-row">
                                        
                                    </div>

                                    
                                </div>

                            </div>
                        </div>

                        <!-- Tab Pane for 2023 -->
                        <div class="tab-pane fade" id="pills-q1" role="tabpanel" aria-labelledby="pills-2024-tab">
                            <div class="content-table">

                                <div class="header-row bg-[#1a589e]">
                                    <div class="col-bidcode">Bid Code</div>
                                    <div class="col-title text-center font-bold">Bidding Title</div>
                                    <div class="col-date bac">Upload Date</div>
                                </div>

                                <div id="scrollableTableBody">

                                    <div class="data-row justify-content-center">
                                        <div class="header-month font-bold">MARCH</div>
                                    </div>

                                    <div class="data-row">
                                        
                                    </div>

                                    <div class="data-row justify-content-center">
                                        <div class="header-month font-bold">FEBRUARY</div>
                                    </div>

                                    <div class="data-row">
                                        
                                    </div>

                                    <div class="data-row justify-content-center">
                                        <div class="header-month font-bold">JANUARY</div>
                                    </div>

                                    <div class="data-row">
                                        
                                    </div>


                                </div>

                            </div>
                        </div>


                    </div> <!-- End tab-content -->

                </div>
            </div>


            <!-- Left Navigation -->
            <div class="col-6 col-md-3 mx-auto">
                <nav class="nav flex-column sidebar-nav1">
                    <h4
                        class="text-2xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">
                        Bids and Awards</h4>
                    <a class="tab-card1" href="./03_bac1">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-gavel"></i> Bidding Opportunities</h5>
                    </a>
                    <a class="tab-card1" href="./03_bac2">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-file-lines"></i> Bid Bulletin / Addendum</h5>
                    </a>
                    <a class="tab-card1" href="./03_bac3">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-calendar-days"></i> Notice of Postponement</h5>
                    </a>
                    <a class="tab-card1 active" aria-current="page" href="./03_bac4">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-medal"></i> Post-award Information</h5>
                    </a>
                    <a class="tab-card1  mb-4" aria-current="page" href="./03_bac5">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-box-archive"></i> Archives</h5>
                    </a>

                    <h4
                        class="text-2xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">
                        Others</h4>
                    <a class="tab-card1" aria-current="page" href="./03_waste">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-dumpster"></i> Waste Mangement</h5>
                    </a>   
                </nav>

                <div class="bg-white rounded-xl shadow-sm mt-4">
                    <!-- Header -->
                    <div class="p-2 bg-[#1a589e] rounded-t-xl">
                        <h5 class="font-bold text-xl text-white text-center space-x-2">
                            <i data-lucide="megaphone" class="w-6 h-6"></i>
                            <span>For BAC Inquiries</span>
                        </h5>
                    </div>

                    <!-- Body Content -->
                    <div class="p-2 space-y-3 text-gray-700">
                        <p class="text-sm font-semibold text-center">You may contact the following:
                        </p>

                        <ul class="list-disc list-inside space-y-2 text-sm pl-3">
                            <li class="font-medium font-semibold text-center list-unstyled text-[#15467e]">Rolando M.
                                Pizarra <br> Beverly Joy B. Acierto</li>
                            <li class="font-medium text-gray-900 text-center italic list-unstyled mb-4">BAC Secretariats
                            </li>
                            <li class="font-medium text-gray-900 text-left list-unstyled">Telephone Lines: <br> <span
                                    class="font-semibold text-[#1a589e]"> (049) 545-1614 <br> (049) 545-2863 loc.
                                    213</span></li>
                            <li class="font-medium text-gray-900 text-left list-unstyled">Email: <span
                                    class="font-semibold text-[#1a589e]"><br>cwd_bac@yahoo.com</span></li>
                        </ul>
                    </div>
                </div>

            </div>

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