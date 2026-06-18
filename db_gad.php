<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploading Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/db_bg.css">
    <link rel="stylesheet" href="/css/gad.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

    <button id="sidebarToggle" type="button"
        class="text-gray-900 bg-transparent box-border border border-transparent hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 font-medium leading-5 rounded-lg ms-3 mt-3 text-sm p-2 focus:outline-none inline-flex fixed top-0 left-0 z-50 sm:hidden transition duration-300">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10" />
        </svg>
    </button>

    <!-- Sidebar Aside -->
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">

        <div class="h-full px-3 py-4 overflow-y-auto bg-white border-r border-gray-200 shadow-xl">

            <!-- Logo and Branding -->
            <a href="#" class="flex items-center ps-2.5 mb-8 pt-2">
                <img src="./img/lgnav.svg" class="mx-auto" alt="logo">

            </a>

            <!-- Sidebar Navigation Menu -->
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#"
                        class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 group">
                        <!-- Dashboard Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-transgender-icon lucide-transgender">
                            <path d="M12 16v6" />
                            <path d="M14 20h-4" />
                            <path d="M18 2h4v4" />
                            <path d="m2 2 7.17 7.17" />
                            <path d="M2 5.355V2h3.357" />
                            <path d="m22 2-7.17 7.17" />
                            <path d="M8 5 5 8" />
                            <circle cx="12" cy="12" r="4" />
                        </svg>
                        <span class="ms-3">Gender and Development</span>
                    </a>
                </li>

                <li>
                    <a href=""
                        class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 group">
                        <!-- Sign In Icon -->
                        <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-blue-600"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="sm:ml-64 p-4 mt-16 sm:mt-4 my-auto">

        <!-- Content Placeholder: Using the previous card component structure for demonstration -->
        <div class="bg-white p-6 mb-8">

            <div class="container mx-auto max-w-4xl py-6">

                <div class="container mx-auto max-w-4xl">
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Upload GAD Memo</h1>

                    <div
                        class="bg-white block max-w-5xl p-6 rounded-lg border-t-4 shadow-xl border-pink-500 mx-auto my-6 mb-6">

                        <form id="gadmemo-upload-form" class="bg-white">

                            <div class="mb-6">
                                <label for="memo_title" class="block text-lg font-semibold text-gray-700 mb-2">Memo
                                    Title</label>
                                <input type="text" id="memo_title" name="memo_title" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                    placeholder="GAD Memo 2026-01">
                            </div>

                            <div>
                                <label for="pdf_link" class="block text-lg font-semibold text-gray-700 mb-2">
                                    Upload Document</label>
                                <input type="file" id="pdf_file" name="pdf_file" accept="pdf_file" required
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 mb-4">
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="w-full md:w-auto px-8 py-3 bg-[#1a589e] text-white font-bold text-lg rounded-full shadow-lg hover:bg-pink-600 focus:outline-none focus:ring-4 focus:ring-[#1a589e]/50 transition duration-300 ease-in-out">
                                    Publish Memo
                                </button>
                            </div>

                        </form>

                    </div>

                    <br><br>

                    <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Upload GAD Events</h1>

                    <div
                        class="bg-white block max-w-5xl p-6 rounded-lg border-t-4 shadow-xl border-pink-500 mx-auto my-6">

                        <form id="gad-event-upload-form" class="bg-white">

                            <div class="mb-6">
                                <label for="event_title" class="block text-lg font-semibold text-gray-700 mb-2">Event
                                    Title</label>
                                <input type="text" id="event_title" name="event_title" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                    placeholder="2026 GAD Event Kick Off">
                            </div>

                            <div class="mb-6">
                                <label for="date_published" class="block text-lg font-semibold text-gray-700 mb-2">Date
                                    Published</label>
                                <input type="date" id="date_published" name="date_published" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150">
                            </div>

                            <div class="mb-6">
                                <label for="article_body" class="block text-lg font-semibold text-gray-700 mb-2">Article
                                    Body (Content)</label>
                                <textarea id="article_body" name="article_body" rows="10" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150 resize-y"
                                    placeholder="Start writing your event content here..."></textarea>
                            </div>

                            <div>
                                <label for="event_images" class="block text-lg font-semibold text-gray-700">
                                    Upload Event Images
                                </label>
                                <input type="file" id="event_images" name="event_images[]" accept="image/*" multiple
                                    required
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 mb-4 
                                                    file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold 
                                                    file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
                                <p class="text-xs text-gray-500 mt-1">You can select multiple photo files (JPG, PNG).
                                </p>
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="w-full md:w-auto px-8 py-3 bg-[#1a589e] text-white font-bold text-lg rounded-full shadow-lg hover:bg-pink-600 focus:outline-none focus:ring-4 focus:ring-[#1a589e]/50 transition duration-300 ease-in-out">
                                    Publish Memo
                                </button>
                            </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="container mx-auto max-w-7xl py-6">

            <h1 class="text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-pink-500">Gender And Development
            </h1>

            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-20">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <!-- COLUMN 1: GAD Memo (PDF Opener) -->
                    <div class="lg:col-span-1">
                        <div class="top-8 space-y-6">

                            <!-- GAD Memo Card -->
                            <div class="relative bg-white rounded-xl p-6 shadow-xl border-t-4 border-pink-500">

                                <!-- Dropdown Trigger and Menu -->
                                <div class="absolute top-2 right-0 p-3 z-10">
                                    <!-- Added data-dropdown-placement for correct positioning inside absolute div -->
                                    <button id="dropdownIssueButton" data-dropdown-toggle="issueDropdownmemo"
                                        data-dropdown-placement="bottom-end"
                                        class="p-2 text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-full"
                                        type="button">
                                        <!-- Ellipsis Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            viewBox="0 0 24 24" fill="none" stroke="#ed64a6" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-circle-ellipsis-icon lucide-circle-ellipsis">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M17 12h.01" />
                                            <path d="M12 12h.01" />
                                            <path d="M7 12h.01" />
                                        </svg>
                                    </button>

                                    <!-- Dropdown Content -->
                                    <div id="issueDropdownmemo"
                                        class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 absolute right-0 mt-2 border border-gray-100">
                                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownIssueButton">
                                            <li>
                                                <a href="#" id="editIssueButton"
                                                    class="block px-4 py-2 hover:bg-gray-100 transition duration-100"
                                                    data-modal-target="editGadMemoModal"
                                                    data-modal-toggle="editGadMemoModal">
                                                    Edit Memo
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" id="deleteIssueButton"
                                                    class="block px-4 py-2 text-red-600 hover:bg-red-50 transition duration-100">
                                                    Delete Memo
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="flex items-center justify-start space-x-3 mb-4">
                                    <!-- Icon using Lucide SVG style -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="text-pink-500 w-6 h-6">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                        <path d="M14 2v6h6" />
                                        <path d="M10 13H8" />
                                        <path d="M16 17H8" />
                                        <path d="M16 21H8" />
                                    </svg>
                                    <h2 class="text-2xl font-bold text-gray-800">GAD Memos & Policy</h2>
                                </div>
                                <p class="text-gray-600 mb-4 text-sm">Access recent GAD-related official documents
                                    and
                                    directives.</p>

                                <div class="space-y-3">
                                    <!-- Memo List Item -->
                                    <div class="border rounded-lg p-3 flex justify-between items-center">
                                        <span class="text-sm font-medium text-gray-700">GAD Guidelines</span>
                                        <button
                                            class="text-xs font-semibold text-pink-600 hover:text-pink-800 transition">
                                            <a href="./pdf/GAD_Guidelines.pdf" target="_blank">View PDF</a>
                                        </button>
                                    </div>
                                    <!-- Memo List Item -->
                                    <div class="border rounded-lg p-3 flex justify-between items-center">
                                        <span class="text-sm font-medium text-gray-700">Collection & Use of SDD for
                                            GAD
                                            Programs</span>
                                        <button
                                            class="text-xs font-semibold text-pink-600 hover:text-pink-800 transition">
                                            <a href="./pdf/GAD_DataColl.pdf" target="_blank">View PDF</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- COLUMN 2 & 3: GAD Reports and Year Navigation -->
                    <div class="relative lg:col-span-2 bg-white rounded-xl shadow-xl p-6 border-t-4 border-pink-500">

                        <div class="absolute top-2 right-0 p-3 z-10">
                            <!-- Added data-dropdown-placement for correct positioning inside absolute div -->
                            <button id="dropdownIssueButton" data-dropdown-toggle="issueDropdown"
                                data-dropdown-placement="bottom-end"
                                class="p-2 text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-full"
                                type="button">
                                <!-- Ellipsis Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                                    fill="none" stroke="#ed64a6" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-circle-ellipsis-icon lucide-circle-ellipsis">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M17 12h.01" />
                                    <path d="M12 12h.01" />
                                    <path d="M7 12h.01" />
                                </svg>
                            </button>

                            <!-- Dropdown Content -->
                            <div id="issueDropdown"
                                class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 absolute right-0 mt-2 border border-gray-100">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownIssueButton">
                                    <li>
                                        <a href="#" id="editIssueButton"
                                            class="block px-4 py-2 hover:bg-gray-100 transition duration-100"
                                            data-modal-target="editGadEventModal" data-modal-toggle="editGadEventModal">
                                            Edit Event
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" id="deleteIssueButton"
                                            class="block px-4 py-2 text-red-600 hover:bg-red-50 transition duration-100">
                                            Delete Event
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Annual GAD Reports & Accomplishments</h2>

                        <!-- Year Navigation Tabs -->
                        <div id="year-tabs-container"
                            class="flex space-x-2 border-b mb-6 overflow-x-auto whitespace-nowrap">
                            <!-- Year buttons will be populated here by JS -->
                        </div>

                        <!-- GAD Content Display Area (Carousel and Report Content) -->
                        <div id="gad-content" class="scroll-container h-[70vh] overflow-y-auto pr-2">
                            <!-- The active content (Carousel + Report) will be loaded here by JS -->
                        </div>

                    </div>

                </div>
            </main>

        </div>

    </div>

    </div>

    <!-- === STATIC CONTENT CONTAINERS (ALL HTML, HIDDEN) === -->

    <!-- GAD CONTENT FOR 2026 -->
    <div id="content-2026" class="gad-year-content" style="display: none;">

        <!-- CAROUSEL DATA -->
        <div class="carousel-data">
            <div class="image-item" data-url="./img/bld.jpg"></div>
            <div class="image-item" data-url="https://placehold.co/800x450/F472B6/ffffff?text=2025+Training+Seminar"
                data-caption="Gender sensitivity training for new personnel (Q2 2025)."></div>
            <div class="image-item" data-url="https://placehold.co/800x450/EC4899/ffffff?text=2025+Community+Outreach"
                data-caption="GAD team distributing hygiene kits in Barangay A."></div>
            <div class="image-item" data-url="https://placehold.co/800x450/DB2777/ffffff?text=2025+Water+Audit"
                data-caption="Site inspection to ensure equitable water access points."></div>
        </div>

        <!-- REPORT TEXT -->
        <div class="report-text">
            <p class="mb-2 text-3xl font-bold text-[#1a589e]">2026 Events<span> </span></p>
            <p class="mb-4 text-lg font-semibold text-pink-600">May 16, 2026</p>
            <p class="text-gray-700 mb-6 leading-relaxed">The 2025 GAD plan prioritized capacity building for female
                technicians and leadership training for women in mid-level management. Key achievements in the first
                three quarters include the successful implementation of the Gender-Responsive Customer Service program,
                reducing client waiting times for female-headed households by an average of 15%.</p>
        </div>

    </div>

    <!-- GAD CONTENT -->
    <div id="content-2025" class="gad-year-content" style="display: none;">

        <!-- CAROUSEL DATA -->
        <div class="carousel-data">
            <div class="image-item" data-url="https://placehold.co/800x450/4C1D95/ffffff?text=2024+GST+Graduation"
                data-caption="Graduation ceremony for the first batch of Gender Sensitivity Training."></div>
            <div class="image-item" data-url="https://placehold.co/800x450/8B5CF6/ffffff?text=2024+Policy+Review"
                data-caption="Management reviewing the Anti-Sexual Harassment policy."></div>
        </div>

        <!-- REPORT TEXT -->
        <div class="report-text">
            <p class="mb-2 text-3xl font-bold text-[#1a589e]">2025 Events<span> </span></p>
            <p class="mb-4 text-lg font-semibold text-pink-600">May 16, 2026</p>
            <p class="text-gray-700 mb-6 leading-relaxed">The 2025 GAD plan prioritized capacity building for female
                technicians and leadership training for women in mid-level management. Key achievements in the first
                three quarters include the successful implementation of the Gender-Responsive Customer Service program,
                reducing client waiting times for female-headed households by an average of 15%.</p>
        </div>
    </div>

    <!-- GAD CONTENT -->
    <div id="content-2024" class="gad-year-content" style="display: none;">

        <!-- CAROUSEL DATA FOR 2023 -->
        <div class="carousel-data">
            <div class="image-item" data-url="https://placehold.co/800x450/14B8A6/ffffff?text=2023+Gender+Audit"
                data-caption="The GAD team conducting the Gender Audit workshop."></div>
            <div class="image-item" data-url="https://placehold.co/800x450/0D9488/ffffff?text=2023+Partnership+Signing"
                data-caption="Signing of MOA with a local women's CSO."></div>
            <div class="image-item" data-url="https://placehold.co/800x450/065F46/ffffff?text=2023+Orientation"
                data-caption="Initial GAD orientation for the Executive Committee."></div>
        </div>

        <!-- REPORT TEXT FOR 2023 -->
        <div class="report-text">
            <p class="mb-2 text-3xl font-bold text-[#1a589e]">2024 Events<span> </span></p>
            <p class="mb-4 text-lg font-semibold text-pink-600">May 16, 2026</p>
            <p class="text-gray-700 mb-6 leading-relaxed">The 2025 GAD plan prioritized capacity building for female
                technicians and leadership training for women in mid-level management. Key achievements in the first
                three quarters include the successful implementation of the Gender-Responsive Customer Service program,
                reducing client waiting times for female-headed households by an average of 15%.</p>
        </div>
    </div>

    <!-- GAD CONTENT -->
    <div id="content-2023" class="gad-year-content" style="display: none;">

        <!-- CAROUSEL DATA -->
        <div class="carousel-data">
            <div class="image-item" data-url="https://placehold.co/800x450/F59E0B/ffffff?text=2022+GAD+Planning"
                data-caption="Initial GAD planning and strategy formulation meeting."></div>
        </div>

        <!-- REPORT TEXT -->
        <div class="report-text">
            <p class="mb-2 text-3xl font-bold text-[#1a589e]">2023 Events<span> </span></p>
            <p class="mb-4 text-lg font-semibold text-pink-600">May 16, 2026</p>
            <p class="text-gray-700 mb-6 leading-relaxed">The 2025 GAD plan prioritized capacity building for female
                technicians and leadership training for women in mid-level management. Key achievements in the first
                three quarters include the successful implementation of the Gender-Responsive Customer Service program,
                reducing client waiting times for female-headed households by an average of 15%.</p>
        </div>
    </div>

    <!-- GAD CONTENT -->
    <div id="content-2022" class="gad-year-content" style="display: none;">

        <!-- CAROUSEL DATA -->
        <div class="carousel-data">
            <div class="image-item" data-url="https://placehold.co/800x450/F59E0B/ffffff?text=2022+GAD+Planning"
                data-caption="Initial GAD planning and strategy formulation meeting."></div>
        </div>

        <!-- REPORT TEXT -->
        <div class="report-text">
            <p class="mb-2 text-3xl font-bold text-[#1a589e]">2022 Events<span> </span></p>
            <p class="mb-4 text-lg font-semibold text-pink-600">May 16, 2026</p>
            <p class="text-gray-700 mb-6 leading-relaxed">The 2025 GAD plan prioritized capacity building for female
                technicians and leadership training for women in mid-level management. Key achievements in the first
                three quarters include the successful implementation of the Gender-Responsive Customer Service program,
                reducing client waiting times for female-headed households by an average of 15%.</p>
        </div>
    </div>

    <!-- === END STATIC CONTENT CONTAINERS === -->


    <!-- Edit Gad Memo Modal -->
    <div id="editGadMemoModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-75 hidden items-center justify-center p-4 z-50 transition-opacity duration-300"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div
            class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden transform transition-all sm:my-8 sm:align-middle">
            <div class="bg-white px-6 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-xl leading-6 font-bold text-gray-900" id="modal-title">Edit Document Details
                        </h3>
                        <div class="mt-4">

                            <form id="gadmemo-edit-form" class="bg-white">

                                <div class="mb-6">
                                    <label for="memo_title" class="block text-lg font-semibold text-gray-700 mb-2">Memo
                                        Title</label>
                                    <input type="text" id="memo_title" name="memo_title" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                        placeholder="GAD Memo 2025-01">
                                </div>

                                <div>
                                    <label for="pdf_link" class="block text-lg font-semibold text-gray-700 mb-2">
                                        Upload Document</label>
                                    <input type="file" id="pdf_file" name="pdf_file" accept="pdf_file" required
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 mb-4">
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-3 flex justify-end gap-3 rounded-b-xl">
                <button type="button" data-modal-hide="editGadMemoModal"
                    class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                    Cancel
                </button>
                <button type="button" onclick="saveEdit()"
                    class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#1a589e] text-base font-medium text-white hover:bg-[#15467e] focus:outline-none focus:ring-4 focus:ring-[#5b8ec5] sm:w-auto sm:text-sm">
                    Save Changes
                </button>
            </div>
        </div>
    </div>


    <!-- Edit Gad Event Modal -->
    <div id="editGadEventModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-75 hidden items-center justify-center p-4 z-50 transition-opacity duration-300"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div
            class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden transform transition-all sm:my-8 sm:align-middle">
            <div class="bg-white px-2 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-xl leading-6 font-bold text-gray-900" id="modal-title">Edit Document Details
                        </h3>
                        <div class="mt-1">

                            <form id="gad-event-edit-form" class="bg-white">

                                <div class="mb-6">
                                    <label for="event_title"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Event
                                        Title</label>
                                    <input type="text" id="event_title" name="event_title" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                        placeholder="2026 GAD Event Kick Off">
                                </div>

                                <div class="mb-6">
                                    <label for="date_published"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Date
                                        Published</label>
                                    <input type="date" id="date_published" name="date_published" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150">
                                </div>

                                <div class="mb-6">
                                    <label for="article_body"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Article
                                        Body (Content)</label>
                                    <textarea id="article_body" name="article_body" rows="10" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150 resize-y"
                                        placeholder="Start writing your event content here..."></textarea>
                                </div>

                                <div>
                                    <label for="event_images" class="block text-lg font-semibold text-gray-700">
                                        Upload Event Images
                                    </label>
                                    <input type="file" id="event_images" name="event_images[]" accept="image/*" multiple
                                        required
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 mb-4 
                                                    file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold 
                                                    file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
                                    <p class="text-xs text-gray-500 mt-1">You can select multiple photo files (JPG,
                                        PNG).
                                    </p>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-3 flex justify-end gap-3 rounded-b-xl">
                <button type="button" data-modal-hide="editGadEventModal"
                    class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                    Cancel
                </button>
                <button type="button" onclick="saveEdit()"
                    class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#1a589e] text-base font-medium text-white hover:bg-[#15467e] focus:outline-none focus:ring-4 focus:ring-[#5b8ec5] sm:w-auto sm:text-sm">
                    Save Changes
                </button>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="/js/sidenav.js"></script>
    <script src="./js/gad.js"></script>

</body>

</html>