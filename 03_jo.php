<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD Career Opportunities</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/ind.css">
    <link rel="stylesheet" href="./css/jo.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        .step-circle {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #1a589e;
            color: white;
            border-radius: 50%;
            font-weight: 800;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .requirement-card {
            background: white;
            padding: 1.25rem;
            border-radius: 0.75rem;
            border-left: 4px solid #1a589e;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
            transition: transform 0.2s;
        }

        .requirement-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.2s;
            color: var(--cwd-blue);
        }

        .action-btn:hover {
            background-color: #eff6ff;
            color: #1e40af;
        }

        .cta-gradient {
            background: linear-gradient(135deg, #1a589e 0%, #1e40af 100%);
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
                        <a href="events"
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
                            <i class="fa-solid fa-briefcase w-5 mr-2"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Careers</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">Careers
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


    <!-- Main Content: Tabbed Cards -->

    <div class="container mx-auto mt-5">

        <!-- Pagination Component (Bootstrap Pills for Years) -->
        <nav aria-label="Year navigation" class="mb-4 d-flex justify-content-center">
            <ul class="nav nav-pills shadow-sm rounded-pill p-1 bg-white" id="pills-tab" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link-pag active" id="pills-2026-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-2026" type="button" role="tab" aria-controls="pills-2025"
                        aria-selected="true">'26</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link-pag" id="pills-2025-tab" data-bs-toggle="pill" data-bs-target="#pills-2025"
                        type="button" role="tab" aria-controls="pills-2024" aria-selected="false">'25</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link-pag" id="pills-2024-tab" data-bs-toggle="pill" data-bs-target="#pills-2024"
                        type="button" role="tab" aria-controls="pills-2023" aria-selected="false">'24</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link-pag" id="pills-archives-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-archives" type="button" role="tab" aria-controls="pills-archives"
                        aria-selected="false"><i class="fa-solid fa-box-archive"></i></button>
                </li>

            </ul>
        </nav>

        <!-- Tab Content (Job Postings Tables) -->
        <div class="tab-content" id="pills-tabContent">

            <!-- Tab Pane for 2025 (Active by default) -->
            <div class="tab-pane fade show active" id="pills-2026" role="tabpanel" aria-labelledby="pills-2025-tab">

                <div class="content-table shadow-lg rounded-2xl">
                    <!-- Header Row -->
                    <div class="header-row bg-[#1a589e] flex items-center px-4 py-3">
                        <div class="col-title font-bold flex-1 text-white uppercase tracking-wider">PUBLICATION
                        </div>
                        <div class="col-date w-32 font-bold text-white uppercase tracking-wider text-center">DATE
                        </div>
                        <div class="col-actions w-40 font-bold text-white uppercase tracking-wider text-center">ACTIONS
                        </div>
                    </div>

                    <!-- Data Row -->

                    <div
                        class="data-row flex items-center px-4 py-4 border-b border-slate-100 hover:bg-slate-50 transition-colors">
                        <!-- Title Column -->
                        <div class="col-title flex-1">
                            <span class="text-slate-700 font-bold">List of 20 Plantilla Positions</span><br>
                            <span class="text-xs text-slate-500 font-medium">Send your application not later than
                                <strong>June 15th.</strong></span>

                        </div>

                        <!-- Date Column -->
                        <div class="col-date w-32 text-center">
                            <span class="text-slate-500 text-sm">June 1</span>
                        </div>

                        <!-- Actions Column (View and Download Buttons) -->
                        <div class="col-actions w-40 flex justify-center gap-2">
                            <!-- View Button -->
                            <a href=".\assets\Files\jobs\2026\List of Plantilla Positions for Publication 06-01-26.pdf"
                                target="_blank"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-200"
                                title="View PDF">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <!-- Download Button -->
                            <a href=".\assets\Files\jobs\2026\List of Plantilla Positions for Publication 02-04-26.pdf"
                                download="List of Plantilla Positions for Publication 06-01-26.pdf"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all duration-200"
                                title="Download PDF">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                    </div>

                    <div
                        class="data-row flex items-center px-4 py-4 border-b border-slate-100 hover:bg-slate-50 transition-colors">
                        <!-- Title Column -->
                        <div class="col-title flex-1">
                            <span class="text-slate-700 font-bold">List of 2 Plantilla Positions</span><br>
                            <span class="text-xs text-slate-500 font-medium">Send your application not later than
                                <strong>April 17th.</strong></span>

                        </div>

                        <!-- Date Column -->
                        <div class="col-date w-32 text-center">
                            <span class="text-slate-500 text-sm">April 6</span>
                        </div>

                        <!-- Actions Column (View and Download Buttons) -->
                        <div class="col-actions w-40 flex justify-center gap-2">
                            <!-- View Button -->
                            <a href=".\assets\Files\jobs\2026\List of Plantilla Positions for Publication 04-06-26.pdf"
                                target="_blank"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-200"
                                title="View PDF">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <!-- Download Button -->
                            <a href=".\assets\Files\jobs\2026\List of Plantilla Positions for Publication 04-06-26.pdf"
                                download="List of Plantilla Positions for Publication 02-04-26.pdf"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all duration-200"
                                title="Download PDF">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                    </div>

                    <div
                        class="data-row flex items-center px-4 py-4 border-b border-slate-100 hover:bg-slate-50 transition-colors">
                        <!-- Title Column -->
                        <div class="col-title flex-1">
                            <span class="text-slate-700 font-bold">List of 26 Plantilla Positions</span><br>
                            <span class="text-xs text-slate-500 font-medium">Send your application not later than
                                <strong>February 16th.</strong></span>

                        </div>

                        <!-- Date Column -->
                        <div class="col-date w-32 text-center">
                            <span class="text-slate-500 text-sm">February 4</span>
                        </div>

                        <!-- Actions Column (View and Download Buttons) -->
                        <div class="col-actions w-40 flex justify-center gap-2">
                            <!-- View Button -->
                            <a href=".\assets\Files\jobs\2026\List of Plantilla Positions for Publication 02-04-26.pdf"
                                target="_blank"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-200"
                                title="View PDF">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <!-- Download Button -->
                            <a href=".\assets\Files\jobs\2026\List of Plantilla Positions for Publication 02-04-26.pdf"
                                download="List of Plantilla Positions for Publication 02-04-26.pdf"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all duration-200"
                                title="Download PDF">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Tab Pane for 2024 -->
            <div class="tab-pane fade" id="pills-2025" role="tabpanel" aria-labelledby="pills-2024-tab">

                <div class="content-table shadow-lg rounded-2xl">
                    <!-- Header Row -->
                    <div class="header-row bg-[#1a589e] flex items-center px-4 py-3">
                        <div class="col-title font-bold flex-1 text-white uppercase tracking-wider">PUBLICATION
                        </div>
                        <div class="col-date w-32 font-bold text-white uppercase tracking-wider text-center">DATE
                        </div>
                        <div class="col-actions w-40 font-bold text-white uppercase tracking-wider text-center">ACTIONS
                        </div>
                    </div>

                    <!-- Data Row -->
                    <div
                        class="data-row flex items-center px-4 py-4 border-b border-slate-100 hover:bg-slate-50 transition-colors">
                        <!-- Title Column -->
                        <div class="col-title flex-1">
                            <span class="text-slate-700 font-bold">List of 13 Plantilla Positions</span><br>
                            <span class="text-xs text-slate-500 font-medium">Send your application not later than
                                <strong>August 15th.</strong></span>

                        </div>

                        <!-- Date Column -->
                        <div class="col-date w-32 text-center">
                            <span class="text-slate-500 text-sm">August 5</span>
                        </div>

                        <!-- Actions Column (View and Download Buttons) -->
                        <div class="col-actions w-40 flex justify-center gap-2">
                            <!-- View Button -->
                            <a href=".\assets\Files\jobs\2025\List of Plantilla Positions for Publication 08-05-25.pdf"
                                target="_blank"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-200"
                                title="View PDF">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <!-- Download Button -->
                            <a href=".\assets\Files\jobs\2025\List of Plantilla Positions for Publication 08-05-25.pdf"
                                download="List of Plantilla Positions for Publication 02-04-26.pdf"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all duration-200"
                                title="Download PDF">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                    </div>

                    <div
                        class="data-row flex items-center px-4 py-4 border-b border-slate-100 hover:bg-slate-50 transition-colors">
                        <!-- Title Column -->
                        <div class="col-title flex-1">
                            <span class="text-slate-700 font-bold">List of 12 Plantilla Positions</span><br>
                            <span class="text-xs text-slate-500 font-medium">Send your application not later than
                                <strong>July 28th.</strong></span>

                        </div>

                        <!-- Date Column -->
                        <div class="col-date w-32 text-center">
                            <span class="text-slate-500 text-sm">July 18</span>
                        </div>

                        <!-- Actions Column (View and Download Buttons) -->
                        <div class="col-actions w-40 flex justify-center gap-2">
                            <!-- View Button -->
                            <a href=".\assets\Files\jobs\2025\List of Plantilla Positions for Publication 07-18-25.pdf"
                                target="_blank"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-200"
                                title="View PDF">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <!-- Download Button -->
                            <a href=".\assets\Files\jobs\2025\List of Plantilla Positions for Publication 07-18-25.pdf"
                                download="List of Plantilla Positions for Publication 02-04-26.pdf"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all duration-200"
                                title="Download PDF">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Tab Pane for 2023 -->
            <div class="tab-pane fade" id="pills-2024" role="tabpanel" aria-labelledby="pills-2023-tab">

                <div class="content-table shadow-lg rounded-2xl">
                    <!-- Header Row -->
                    <div class="header-row bg-[#1a589e] flex items-center px-4 py-3">
                        <div class="col-title font-bold flex-1 text-white uppercase tracking-wider">PUBLICATION
                        </div>
                        <div class="col-date w-32 font-bold text-white uppercase tracking-wider text-center">DATE
                        </div>
                        <div class="col-actions w-40 font-bold text-white uppercase tracking-wider text-center">ACTIONS
                        </div>
                    </div>

                    <!-- Data Row -->
                    <div
                        class="data-row flex items-center px-4 py-4 border-b border-slate-100 hover:bg-slate-50 transition-colors">
                        <!-- Title Column -->
                        <div class="col-title flex-1">
                            <span class="text-slate-700 font-bold">List of 1 Plantilla Position</span><br>
                            <span class="text-xs text-slate-500 font-medium">Send your application not later than
                                <strong>August 26th.</strong></span>

                        </div>

                        <!-- Date Column -->
                        <div class="col-date w-32 text-center">
                            <span class="text-slate-500 text-sm">August 16</span>
                        </div>

                        <!-- Actions Column (View and Download Buttons) -->
                        <div class="col-actions w-40 flex justify-center gap-2">
                            <!-- View Button -->
                            <a href=".\assets\Files\jobs\2024\List of Plantilla Positions for Publication 08-20-2024.pdf"
                                target="_blank"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-200"
                                title="View PDF">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <!-- Download Button -->
                            <a href=".\assets\Files\jobs\2024\List of Plantilla Positions for Publication 08-20-2024.pdf"
                                download="List of Plantilla Positions for Publication 02-04-26.pdf"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all duration-200"
                                title="Download PDF">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Pane for Archives -->
            <div class="tab-pane fade" id="pills-archives" role="tabpanel" aria-labelledby="pills-2022-tab">

                <div class="content-table shadow-lg mb-8 rounded-2xl">
                    <!-- Header Row -->
                    <div class="header-row bg-[#1a589e] flex items-center px-4 py-3">
                        <div class="col-title font-bold flex-1 text-white uppercase tracking-wider">PUBLICATION
                        </div>
                        <div class="col-date w-32 font-bold text-white uppercase tracking-wider text-center">Year
                        </div>
                        <div class="col-actions w-40 font-bold text-white uppercase tracking-wider text-center">ACTIONS
                        </div>
                    </div>

                    <!-- Data Row -->
                    <div
                        class="data-row flex items-center px-4 py-4 border-b border-slate-100 hover:bg-slate-50 transition-colors">
                        <!-- Title Column -->
                        <div class="col-title flex-1">
                            <span class="text-slate-700 font-bold">Compilation of Posted Plantilla Positions</span><br>

                        </div>

                        <!-- Date Column -->
                        <div class="col-date w-32 text-center">
                            <span class="text-slate-500 text-sm">2023</span>
                        </div>

                        <!-- Actions Column (View and Download Buttons) -->
                        <div class="col-actions w-40 flex justify-center gap-2">
                            <!-- Download Button -->
                            <a href=".\assets\Files\jobs\2023.zip" download="2023.zip"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all duration-200"
                                title="Download ZIP">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                    </div>

                    <div
                        class="data-row flex items-center px-4 py-4 border-b border-slate-100 hover:bg-slate-50 transition-colors">
                        <!-- Title Column -->
                        <div class="col-title flex-1">
                            <span class="text-slate-700 font-bold">Compilation of Posted Plantilla Positions</span><br>

                        </div>

                        <!-- Date Column -->
                        <div class="col-date w-32 text-center">
                            <span class="text-slate-500 text-sm">2022</span>
                        </div>

                        <!-- Actions Column (View and Download Buttons) -->
                        <div class="col-actions w-40 flex justify-center gap-2">
                            <!-- Download Button -->
                            <a href=".\assets\Files\jobs\2022.zip" download="2022.zip"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all duration-200"
                                title="Download ZIP">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                    </div>

                    <div
                        class="data-row flex items-center px-4 py-4 border-b border-slate-100 hover:bg-slate-50 transition-colors">
                        <!-- Title Column -->
                        <div class="col-title flex-1">
                            <span class="text-slate-700 font-bold">Compilation of Posted Plantilla Positions</span><br>

                        </div>

                        <!-- Date Column -->
                        <div class="col-date w-32 text-center">
                            <span class="text-slate-500 text-sm">2021</span>
                        </div>

                        <!-- Actions Column (View and Download Buttons) -->
                        <div class="col-actions w-40 flex justify-center gap-2">
                            <!-- Download Button -->
                            <a href=".\assets\Files\jobs\2021.zip" download="2021.zip"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all duration-200"
                                title="Download ZIP">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                    </div>

                    <div
                        class="data-row flex items-center px-4 py-4 border-b border-slate-100 hover:bg-slate-50 transition-colors">
                        <!-- Title Column -->
                        <div class="col-title flex-1">
                            <span class="text-slate-700 font-bold">Compilation of Posted Plantilla Positions</span><br>

                        </div>

                        <!-- Date Column -->
                        <div class="col-date w-32 text-center">
                            <span class="text-slate-500 text-sm">2020</span>
                        </div>

                        <!-- Actions Column (View and Download Buttons) -->
                        <div class="col-actions w-40 flex justify-center gap-2">
                            <!-- Download Button -->
                            <a href=".\assets\Files\jobs\2020.zip" download="2020.zip"
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all duration-200"
                                title="Download ZIP">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <div
                    class="max-w-md mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border-t-8 border-[#1a589e]">
                    <div class="p-8 text-center">
                        <!-- Icon Container matched to model -->
                        <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-archive text-[#1a589e] text-3xl"></i>
                        </div>

                        <!-- Content matched to model -->
                        <h5 class="text-2xl font-bold text-[#1a589e] mb-4">Visit Our Old Website</h5>
                        <p class="text-gray-600 mb-8">
                            Looking for older documents? Access our previous website containing past
                            job opportunities and historical data.
                        </p>

                        <!-- Button matched to model -->
                        <a href="https://cwd.com.ph/careers.html" target="_blank"
                            class="inline-flex items-center justify-center w-full px-6 py-3 text-white bg-[#1a589e] hover:bg-blue-800 rounded-lg font-semibold transition duration-200 shadow-lg group">
                            Visit Archive
                            <i
                                class="fas fa-arrow-up-right-from-square ms-2 transition-transform group-hover:-translate-y-1 group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div> <!-- End tab-content -->


    </div>

    <br>
    <br>
    <br>

    <!-- Application Instructions -->
    <div class="max-w-7xl mx-auto px-4 pt-12 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2 space-y-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-1 bg-blue-600 rounded-full"></div>
                    <h2 class="text-4xl font-black text-[#1a589e] uppercase tracking-wide text-center mt-8 mb-8">How to
                        Apply</h2>
                </div>

                <div class="space-y-6">
                    <div class="flex gap-5">
                        <div class="step-circle">1</div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Write Application Letter</h4>
                            <p class="text-sm text-slate-600 leading-relaxed mb-3">Interested and qualified applicants
                                should signify their interest in writing through an application letter.</p>

                            <div class="flex gap-4">
                                <div class="bg-slate-100 p-4 rounded-lg border-l-4 border-slate-300 w-1/2">
                                    <p class="text-xs text-slate-500 mb-2">The application letter must include:</p>
                                    <p class="text-sm font-bold text-slate-700"> ● Position / Title</p>
                                    <p class="text-sm font-bold text-slate-700"> ● Salary Grade (SG)</p>
                                    <p class="text-sm font-bold text-slate-700"> ● Item Number</p>

                                </div>

                                <div class="bg-slate-100 p-4 rounded-lg border-l-4 border-slate-300 w-1/2">
                                    <p class="text-xs text-slate-500 mb-2">The application letter should be adressed to:
                                    </p>
                                    <p class="text-sm font-bold text-slate-700">MR. EXEQUIEL A. AGUILAR, JR.</p>
                                    <p class="text-xs text-slate-500">General Manager, Calamba Water District</p>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="step-circle">2</div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Prepare the Requirements</h4>
                            <p class="text-sm text-slate-600 leading-relaxed mb-3">All Supporting documents and
                                requirements must be attached to the application letter.
                                Refer to the list on the right.
                            </p>
                            <div class="bg-slate-100 p-4 rounded-lg border-l-4 border-slate-300 lg:w-1/2 sm:w-full">
                                <p class="text-xs text-slate-500 mb-2">Applicant must fill-up the Personal Data Sheet
                                    (CSC-Form 212 Revision 2025) as well.</p>
                                <div class="pt-4">
                                    <a href="https://csc.gov.ph/downloads/category/540-csc-form-212-revised-2025-personal-data-sheet?download=3404:cs-form-no-212-revised-2025-personal-data-sheet"
                                        target="_blank"
                                        class="cta-gradient w-full flex items-center justify-center gap-3 py-2 rounded-xl text-white font-bold text-sm shadow-lg shadow-blue-200 hover:scale-[1.02] transition-transform">
                                        <span>Download PDS Form</span>
                                        <i class="fa-solid fa-file-arrow-down text-lg"></i>
                                    </a>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="step-circle">3</div>
                        <div>
                            <h4 class="font-bold text-slate-800 mb-2">Submit Application</h4>
                            <p class="text-sm text-slate-600 leading-relaxed mb-3">Ensure the completeness of your
                                support
                                documents as <span class="text-sm text-lg text-red-600">incomplete support
                                    documents will not be accepted.</span>
                            </p>

                            <div class="bg-slate-100 p-4 rounded-lg border-l-4 border-slate-300 w-full">
                                <p class="text-xs text-slate-500 mb-2">Your application must be submitted to:
                                </p>
                                <p class="text-sm font-bold text-slate-700 mb-2">CWD Administrative Department - Human
                                    Resources Division</p>
                                <p class="text-xs text-slate-500">2nd Flr., CWD Main Office, Lakeview Subdv., Halang,
                                    Calamba City</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-amber-50 border border-amber-200 p-5 rounded-xl flex gap-4">
                    <i class="fa-solid fa-briefcase text-amber-500 mt-1 text-lg"></i>
                    <p class="text-xs text-amber-800 leading-relaxed text-justify">
                        <strong>Equal Opportunities for Employment Principle:</strong> Calamba Water District highly
                        encourages all interested and qualified applicants including persons with disability (PWD),
                        members of
                        indigenous communities, irrespective of sexual orientation and gender identities and/or
                        expression (SOGIE), civil status,religion, and political affiliation. This Office does not
                        discriminate in the
                        selection of employees based on the aforementioned principle.
                    </p>
                </div>
            </div>

            <!-- Requirements Column -->
            <div class="space-y-6">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-1 bg-blue-600 rounded-full"></div>
                    <h2 class="text-2xl font-black text-[#1a589e] uppercase tracking-wide text-center mt-8 mb-8">
                        Requirements</h2>
                </div>

                <div class="space-y-3">
                    <div class="requirement-card">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Personal Data Sheet: CSC Form 212</p>
                        <p class="text-sm text-slate-700 font-medium">Fully Accomplished Personal Data Sheet (PDS) with
                            recent passport-sized picture (CSC-Form 212 Revision 2017).</p>
                    </div>

                    <div class="requirement-card  mt-4">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Performance Rating</p>
                        <p class="text-sm text-slate-700 font-medium">Performance rating in the last rating period (if
                            applicable).</p>
                    </div>

                    <div class="requirement-card mt-4">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Birth Certificate</p>
                        <p class="text-sm text-slate-700 font-medium">Original/Authenticated Certificate of Live Birth
                            issued by the Philippine Statistics Authority (PSA)</p>
                    </div>

                    <div class="requirement-card mt-4">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Diploma or Transcript of Records</p>
                        <p class="text-sm text-slate-700 font-medium">Original/Authenticated Diploma/Transcript of
                            Records
                        </p>
                    </div>

                    <div class="requirement-card mt-4">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Eligibility or License ID</p>
                        <p class="text-sm text-slate-700 font-medium">Photocopy of certificate of
                            eligibility/rating/license.</p>
                    </div>

                    <div class="requirement-card mt-4">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Trainings & Awards</p>
                        <p class="text-sm text-slate-700 font-medium">Original Certificate(s) of Trainings Completion
                            and
                            Awards received, if any.</p>
                    </div>

                    <div class="requirement-card mt-4">
                        <p class="text-xs font-bold text-blue-600 uppercase mb-1">Service Record</p>
                        <p class="text-sm text-slate-700 font-medium">Authenticated Service Record for non-employees of
                            Calamba Water District.</p>
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

</body>

</html>