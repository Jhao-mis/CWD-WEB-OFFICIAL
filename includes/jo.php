<!-- Modern Year Segmented Controller -->
<nav aria-label="Year navigation" class="mb-10 flex justify-center">
    <div class="inline-flex p-2 bg-slate-100/80 backdrop-blur-lg rounded-xl  shadow-lg" id="pills-tab" role="tablist">

        <!-- Year '26 (Active & Current Year with Pulse Indicator) -->
        <button class="nav-link-pag active" id="pills-2026-tab" data-bs-toggle="pill" data-bs-target="#pills-2026"
            type="button" role="tab" aria-controls="pills-2026" aria-selected="true">
            <span class="flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>2026</span>
            </span>
        </button>

        <!-- Year '25 -->
        <button class="nav-link-pag" id="pills-2025-tab" data-bs-toggle="pill" data-bs-target="#pills-2025"
            type="button" role="tab" aria-controls="pills-2025" aria-selected="false">
            <span>2025</span>
        </button>

        <!-- Year '24 -->
        <button class="nav-link-pag" id="pills-2024-tab" data-bs-toggle="pill" data-bs-target="#pills-2024"
            type="button" role="tab" aria-controls="pills-2024" aria-selected="false">
            <span>2024</span>
        </button>

        <!-- Archive Tab (Mas pormal na hitsura) -->
        <button class="nav-link-pag" id="pills-archives-tab" data-bs-toggle="pill" data-bs-target="#pills-archives"
            type="button" role="tab" aria-controls="pills-archives" aria-selected="false">
            <span class="flex items-center gap-1.5">
                <i class="fa-solid fa-box-archive text-xs"></i>
                <span class="hidden xs:inline">Archives</span>
            </span>
        </button>

    </div>
</nav>

<!-- Tab Content (Job Postings Tables) -->
<div class="tab-content" id="pills-tabContent">

    <!-- ==================== TAB PANE FOR 2026 (Active by default) ==================== -->
    <div class="tab-pane fade show active" id="pills-2026" role="tabpanel" aria-labelledby="pills-2026-tab">
        <!-- 3-Column Responsive Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Card 1 (June 1) -->
            <div
                class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Badge and Date Row -->
                    <div class="flex justify-between items-center mb-4">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-50 text-[#1a589e] border border-blue-100/50 uppercase tracking-wider">
                            <i class="fa-solid fa-briefcase text-[10px] text-[#1a589e]"></i>
                            Plantilla
                        </span>
                        <span class="text-sm text-slate-500 font-semibold flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar text-slate-400"></i> Posted on June 1
                        </span>
                    </div>

                    <!-- Title & Deadline -->
                    <h4
                        class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        List of 20 Plantilla Positions
                    </h4>
                    <p class="text-xs text-slate-500 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-clock text-sm text-rose-600"></i>
                        <span><strong class="text-rose-600 font-bold">Deadline:</strong> <span
                                class="text-slate-600 font-semibold">June 15th</span></span>
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="grid grid-cols-2 gap-3 mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2026\List of Plantilla Positions for Publication 06-01-26.pdf"
                        target="_blank"
                        class="inline-flex items-center justify-center gap-1.5 bg-slate-50 hover:bg-slate-100 text-[#1a589e] text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 transition-all duration-200 text-center"
                        title="View PDF">
                        <i class="fa-regular fa-eye"></i> View
                    </a>
                    <a href=".\assets\Files\jobs\2026\List of Plantilla Positions for Publication 02-04-26.pdf"
                        download="List of Plantilla Positions for Publication 06-01-26.pdf"
                        class="inline-flex items-center justify-center gap-1.5 bg-[#1a589e] hover:bg-blue-700 text-white text-xs font-bold uppercase py-2.5 rounded-xl transition-all duration-200 shadow-sm text-center"
                        title="Download PDF">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download
                    </a>
                </div>
            </div>

            <!-- Card 2 (April 6) -->
            <div
                class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-50 text-[#1a589e] border border-blue-100/50 uppercase tracking-wider">
                            <i class="fa-solid fa-briefcase text-[10px] text-[#1a589e]"></i>
                            Plantilla
                        </span>
                        <span class="text-sm text-slate-500 font-semibold flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar text-slate-400"></i> Posted on April 6
                        </span>
                    </div>

                    <h4
                        class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        List of 2 Plantilla Positions
                    </h4>
                    <p class="text-xs text-slate-500 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-clock text-sm text-rose-600"></i>
                        <span><strong class="text-rose-600 font-bold">Deadline:</strong> <span
                                class="text-slate-600 font-semibold">April 17th</span></span>
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-3 mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2026\List of Plantilla Positions for Publication 04-06-26.pdf"
                        target="_blank"
                        class="inline-flex items-center justify-center gap-1.5 bg-slate-50 hover:bg-slate-100 text-[#1a589e] text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 transition-all duration-200 text-center"
                        title="View PDF">
                        <i class="fa-regular fa-eye"></i> View
                    </a>
                    <a href=".\assets\Files\jobs\2026\List of Plantilla Positions for Publication 04-06-26.pdf"
                        download="List of Plantilla Positions for Publication 02-04-26.pdf"
                        class="inline-flex items-center justify-center gap-1.5 bg-[#1a589e] hover:bg-blue-700 text-white text-xs font-bold uppercase py-2.5 rounded-xl transition-all duration-200 shadow-sm text-center"
                        title="Download PDF">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download
                    </a>
                </div>
            </div>

            <!-- Card 3 (February 4) -->
            <div
                class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-50 text-[#1a589e] border border-blue-100/50 uppercase tracking-wider">
                            <i class="fa-solid fa-briefcase text-[10px] text-[#1a589e]"></i>
                            Plantilla
                        </span>
                        <span class="text-sm text-slate-500 font-semibold flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar text-slate-400"></i> Posted on Feb 4
                        </span>
                    </div>

                    <h4
                        class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        List of 26 Plantilla Positions
                    </h4>
                    <p class="text-xs text-slate-500 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-clock text-sm text-rose-600"></i>
                        <span><strong class="text-rose-600 font-bold">Deadline:</strong> <span
                                class="text-slate-600 font-semibold">February 16th</span></span>
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-3 mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2026\List of Plantilla Positions for Publication 02-04-26.pdf"
                        target="_blank"
                        class="inline-flex items-center justify-center gap-1.5 bg-slate-50 hover:bg-slate-100 text-[#1a589e] text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 transition-all duration-200 text-center"
                        title="View PDF">
                        <i class="fa-regular fa-eye"></i> View
                    </a>
                    <a href=".\assets\Files\jobs\2026\List of Plantilla Positions for Publication 02-04-26.pdf"
                        download="List of Plantilla Positions for Publication 02-04-26.pdf"
                        class="inline-flex items-center justify-center gap-1.5 bg-[#1a589e] hover:bg-blue-700 text-white text-xs font-bold uppercase py-2.5 rounded-xl transition-all duration-200 shadow-sm text-center"
                        title="Download PDF">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- ==================== TAB PANE FOR 2025 ==================== -->
    <div class="tab-pane fade" id="pills-2025" role="tabpanel" aria-labelledby="pills-2025-tab">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Card 1 (2025 - Aug 5) -->
            <div
                class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-50 text-[#1a589e] border border-blue-100/50 uppercase tracking-wider">
                            <i class="fa-solid fa-briefcase text-[10px] text-[#1a589e]"></i>
                            Plantilla
                        </span>
                        <span class="text-sm text-slate-500 font-semibold flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar text-slate-400"></i> Posted on Aug 5
                        </span>
                    </div>

                    <h4
                        class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        List of 13 Plantilla Positions
                    </h4>
                    <p class="text-xs text-slate-500 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-clock text-sm text-rose-600"></i>
                        <span><strong class="text-rose-600 font-bold">Deadline:</strong> <span
                                class="text-slate-600 font-semibold">August 15th</span></span>
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-3 mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2025\List of Plantilla Positions for Publication 08-05-25.pdf"
                        target="_blank"
                        class="inline-flex items-center justify-center gap-1.5 bg-slate-50 hover:bg-slate-100 text-[#1a589e] text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 transition-all duration-200 text-center"
                        title="View PDF">
                        <i class="fa-regular fa-eye"></i> View
                    </a>
                    <a href=".\assets\Files\jobs\2025\List of Plantilla Positions for Publication 08-05-25.pdf"
                        download="List of Plantilla Positions for Publication 08-05-25.pdf"
                        class="inline-flex items-center justify-center gap-1.5 bg-[#1a589e] hover:bg-blue-700 text-white text-xs font-bold uppercase py-2.5 rounded-xl transition-all duration-200 shadow-sm text-center"
                        title="Download PDF">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download
                    </a>
                </div>
            </div>

            <!-- Card 2 (2025 - July 18) -->
            <div
                class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-50 text-[#1a589e] border border-blue-100/50 uppercase tracking-wider">
                            <i class="fa-solid fa-briefcase text-[10px] text-[#1a589e]"></i>
                            Plantilla
                        </span>
                        <span class="text-sm text-slate-500 font-semibold flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar text-slate-400"></i> Posted on July 18
                        </span>
                    </div>

                    <h4
                        class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        List of 12 Plantilla Positions
                    </h4>
                    <p class="text-xs text-slate-500 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-clock text-sm text-rose-600"></i>
                        <span><strong class="text-rose-600 font-bold">Deadline:</strong> <span
                                class="text-slate-600 font-semibold">July 28th</span></span>
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-3 mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2025\List of Plantilla Positions for Publication 07-18-25.pdf"
                        target="_blank"
                        class="inline-flex items-center justify-center gap-1.5 bg-slate-50 hover:bg-slate-100 text-[#1a589e] text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 transition-all duration-200 text-center"
                        title="View PDF">
                        <i class="fa-regular fa-eye"></i> View
                    </a>
                    <a href=".\assets\Files\jobs\2025\List of Plantilla Positions for Publication 07-18-25.pdf"
                        download="List of Plantilla Positions for Publication 07-18-25.pdf"
                        class="inline-flex items-center justify-center gap-1.5 bg-[#1a589e] hover:bg-blue-700 text-white text-xs font-bold uppercase py-2.5 rounded-xl transition-all duration-200 shadow-sm text-center"
                        title="Download PDF">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- ==================== TAB PANE FOR 2024 ==================== -->
    <div class="tab-pane fade" id="pills-2024" role="tabpanel" aria-labelledby="pills-2024-tab">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Card 1 (2024 - Aug 16) -->
            <div
                class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-50 text-[#1a589e] border border-blue-100/50 uppercase tracking-wider">
                            <i class="fa-solid fa-briefcase text-[10px] text-[#1a589e]"></i>
                            Plantilla
                        </span>
                        <span class="text-sm text-slate-500 font-semibold flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar text-slate-400"></i> Posted on Aug 16
                        </span>
                    </div>

                    <h4
                        class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        List of 1 Plantilla Position
                    </h4>
                    <p class="text-xs text-slate-500 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-clock text-sm text-rose-600"></i>
                        <span><strong class="text-rose-600 font-bold">Deadline:</strong> <span
                                class="text-slate-600 font-semibold">August 26th</span></span>
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-3 mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2024\List of Plantilla Positions for Publication 08-20-2024.pdf"
                        target="_blank"
                        class="inline-flex items-center justify-center gap-1.5 bg-slate-50 hover:bg-slate-100 text-[#1a589e] text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 transition-all duration-200 text-center"
                        title="View PDF">
                        <i class="fa-regular fa-eye"></i> View
                    </a>
                    <a href=".\assets\Files\jobs\2024\List of Plantilla Positions for Publication 08-20-2024.pdf"
                        download="List of Plantilla Positions for Publication 08-20-2024.pdf"
                        class="inline-flex items-center justify-center gap-1.5 bg-[#1a589e] hover:bg-blue-700 text-white text-xs font-bold uppercase py-2.5 rounded-xl transition-all duration-200 shadow-sm text-center"
                        title="Download PDF">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download
                    </a>
                </div>
            </div>

        </div>
    </div>


    <!-- ==================== TAB PANE FOR ARCHIVES ==================== -->
    <div class="tab-pane fade" id="pills-archives" role="tabpanel" aria-labelledby="pills-archives-tab">
        <!-- Uniform 3-Column Responsive Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">

            <!-- Card: 2023 Archive -->
            <div
                class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Badge and Date Row -->
                    <div class="flex justify-between items-center mb-4">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200/50 uppercase tracking-wider">
                            <i class="fa-solid fa-archive text-[10px]"></i>
                            Archive
                        </span>
                        <span class="text-sm text-slate-400 font-bold flex items-center gap-1.5">
                            FY 2023
                        </span>
                    </div>

                    <!-- Title & Description -->
                    <h4
                        class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        Compilation of Posted Positions (2023)
                    </h4>
                    <p class="text-xs text-slate-400 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-file-zipper text-sm text-slate-400"></i>
                        <span>Format: <strong class="text-slate-500 font-bold">ZIP File Archive</strong></span>
                    </p>
                </div>

                <!-- Action Button -->
                <div class="mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2023.zip" download="2023.zip"
                        class="inline-flex items-center justify-center gap-2 w-full bg-slate-50 hover:bg-[#1a589e] text-[#1a589e] hover:text-white text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 hover:border-[#1a589e] transition-all duration-200 text-center shadow-sm"
                        title="Download 2023 ZIP">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download ZIP
                    </a>
                </div>
            </div>

            <!-- Card: 2022 Archive -->
            <div
                class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Badge and Date Row -->
                    <div class="flex justify-between items-center mb-4">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200/50 uppercase tracking-wider">
                            <i class="fa-solid fa-archive text-[10px]"></i>
                            Archive
                        </span>
                        <span class="text-sm text-slate-400 font-bold flex items-center gap-1.5">
                            FY 2022
                        </span>
                    </div>

                    <!-- Title & Description -->
                    <h4
                        class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        Compilation of Posted Positions (2022)
                    </h4>
                    <p class="text-xs text-slate-400 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-file-zipper text-sm text-slate-400"></i>
                        <span>Format: <strong class="text-slate-500 font-bold">ZIP File Archive</strong></span>
                    </p>
                </div>

                <!-- Action Button -->
                <div class="mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2022.zip" download="2022.zip"
                        class="inline-flex items-center justify-center gap-2 w-full bg-slate-50 hover:bg-[#1a589e] text-[#1a589e] hover:text-white text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 hover:border-[#1a589e] transition-all duration-200 text-center shadow-sm"
                        title="Download 2022 ZIP">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download ZIP
                    </a>
                </div>
            </div>

            <!-- Card: 2021 Archive -->
            <div
                class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Badge and Date Row -->
                    <div class="flex justify-between items-center mb-4">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200/50 uppercase tracking-wider">
                            <i class="fa-solid fa-archive text-[10px]"></i>
                            Archive
                        </span>
                        <span class="text-sm text-slate-400 font-bold flex items-center gap-1.5">
                            FY 2021
                        </span>
                    </div>

                    <!-- Title & Description -->
                    <h4
                        class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        Compilation of Posted Positions (2021)
                    </h4>
                    <p class="text-xs text-slate-400 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-file-zipper text-sm text-slate-400"></i>
                        <span>Format: <strong class="text-slate-500 font-bold">ZIP File Archive</strong></span>
                    </p>
                </div>

                <!-- Action Button -->
                <div class="mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2021.zip" download="2021.zip"
                        class="inline-flex items-center justify-center gap-2 w-full bg-slate-50 hover:bg-[#1a589e] text-[#1a589e] hover:text-white text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 hover:border-[#1a589e] transition-all duration-200 text-center shadow-sm"
                        title="Download 2021 ZIP">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download ZIP
                    </a>
                </div>
            </div>

            <!-- Card: 2020 Archive -->
            <div
                class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Badge and Date Row -->
                    <div class="flex justify-between items-center mb-4">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200/50 uppercase tracking-wider">
                            <i class="fa-solid fa-archive text-[10px]"></i>
                            Archive
                        </span>
                        <span class="text-sm text-slate-400 font-bold flex items-center gap-1.5">
                            FY 2020
                        </span>
                    </div>

                    <!-- Title & Description -->
                    <h4
                        class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        Compilation of Posted Positions (2020)
                    </h4>
                    <p class="text-xs text-slate-400 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-file-zipper text-sm text-slate-400"></i>
                        <span>Format: <strong class="text-slate-500 font-bold">ZIP File Archive</strong></span>
                    </p>
                </div>

                <!-- Action Button -->
                <div class="mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2020.zip" download="2020.zip"
                        class="inline-flex items-center justify-center gap-2 w-full bg-slate-50 hover:bg-[#1a589e] text-[#1a589e] hover:text-white text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 hover:border-[#1a589e] transition-all duration-200 text-center shadow-sm"
                        title="Download 2020 ZIP">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download ZIP
                    </a>
                </div>
            </div>

        </div>

        <!-- Old Website Call to Action -->
        <div
            class="max-w-md mx-auto bg-white rounded-2xl shadow-sm border border-slate-100 border-t-4 border-t-[#1a589e] overflow-hidden">
            <div class="p-8 text-center">
                <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-archive text-[#1a589e] text-2xl"></i>
                </div>
                <h5 class="text-lg font-bold text-[#1a589e] mb-1">Visit Our Old Website</h5>
                <p class="text-slate-500 text-xs mb-6">
                    Looking for older documents? Access our previous website containing past job opportunities and
                    historical data.
                </p>
                <a href="https://cwd.com.ph/careers.html" target="_blank"
                    class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-[#1a589e] hover:bg-blue-800 rounded-xl font-bold text-xs transition duration-200 shadow-sm group gap-2">
                    <span>Visit Archive Portal</span>
                    <i
                        class="fas fa-arrow-up-right-from-square text-[10px] transition-transform group-hover:-translate-y-0.5 group-hover:translate-x-0.5"></i>
                </a>
            </div>
        </div>

    </div>

</div> <!-- End tab-content -->

<!-- End tab-content -->