<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploading Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/db_bg.css">


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
                    <a href="./db_news.html"
                        class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 group">
                        <!-- Dashboard Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-newspaper-icon lucide-newspaper">
                            <path d="M15 18h-5" />
                            <path d="M18 14h-8" />
                            <path
                                d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-4 0v-9a2 2 0 0 1 2-2h2" />
                            <rect width="8" height="4" x="10" y="6" rx="1" />
                        </svg>
                        <span class="ms-3">News</span>
                    </a>
                </li>

                <li>
                    <a href="./db_adv.html"
                        class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 group">
                        <!-- Users Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-megaphone-icon lucide-megaphone">
                            <path
                                d="M11 6a13 13 0 0 0 8.4-2.8A1 1 0 0 1 21 4v12a1 1 0 0 1-1.6.8A13 13 0 0 0 11 14H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2z" />
                            <path d="M6 14a12 12 0 0 0 2.4 7.2 2 2 0 0 0 3.2-2.4A8 8 0 0 1 10 14" />
                            <path d="M8 6v8" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Advisory</span>
                    </a>
                </li>
                <li>
                    <a href="./db_wl.html"
                        class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-droplets-icon lucide-droplets">
                            <path
                                d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z" />
                            <path
                                d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Waterlife</span>
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

            <div class="container mx-auto max-w-4xl py-6 mb-4">

                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Add New Advisory</h1>

                <div class="bg-white block max-w-5xl p-6 rounded-lg border-t-4 shadow-xl border-[#1a589e] mx-auto my-6">

                    <form id="add-advisory-form" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                            <div>
                                <label for="advisory_type" class="block text-sm font-medium text-gray-700">Advisory
                                    Type</label>
                                <select id="advisory_type" name="advisory_type" required
                                    class="mt-1 block w-full pl-3 pr-10 py-2.5 text-base border-gray-300 focus:outline-none focus:ring-[#1a589e] focus:border-[#1a589e] sm:text-sm rounded-lg shadow-sm">
                                    <option value="Emergency">Emergency</option>
                                    <option value="Scheduled">Scheduled</option>
                                </select>
                            </div>

                            <div>
                                <label for="advisory_date" class="block text-sm font-medium text-gray-700">Date of
                                    Interruption</label>
                                <input type="date" id="advisory_date" name="advisory_date" required
                                    class="mt-1 p-2.5 border border-gray-300 rounded-lg text-sm w-full focus:ring-[#1a589e] focus:border-[#1a589e] shadow-sm">
                            </div>

                            <div class="md:col-span-2">
                                <label for="advisory_title" class="block text-sm font-medium text-gray-700">Issue Title
                                    (Auto-Generated)</label>
                                <input type="text" id="advisory_title" name="advisory_title" readonly
                                    class="mt-1 p-2.5 border border-gray-300 rounded-lg text-sm w-full bg-gray-50 text-gray-600 cursor-not-allowed shadow-sm"
                                    placeholder="Title will appear here automatically..." value="">
                            </div>

                            <div class="md:col-span-4">
                                <label for="notice_image" class="block text-sm font-medium text-gray-700">Notice Image
                                    (Map/Details)</label>
                                <input type="file" id="notice_image" name="notice_image" accept="image/*" required
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 focus:ring-[#1a589e] focus:border-[#1a589e] shadow-sm">
                            </div>

                            <div class="md:col-span-4 flex justify-center mt-4">
                                <button type="submit"
                                    class="w-full md:w-auto px-8 py-3 bg-[#1a589e] text-white font-bold text-lg rounded-full shadow-lg hover:bg-pink-600 focus:outline-none focus:ring-4 focus:ring-[#1a589e]/50 transition duration-300 ease-in-out">
                                    Publish Advisory
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="container mx-auto max-w-4xl py-6 mb-4">

                <div class="advisory-section relative">

                    <h1 class="text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-[#1a589e]">Advisory</h1>


                    <div id="emergency-advisory-block"
                        class="relative bg-neutral-primary-soft block max-w-5xl p-6 border border-default rounded-lg shadow-lg mx-auto my-4">

                        <div class="absolute top-0 right-0 p-3 z-10">
                            <button id="dropdownIssueButton" data-dropdown-toggle="issueDropdown1"
                                class="p-4 text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-full"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                                    fill="none" stroke="#f61a1a" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-circle-ellipsis-icon lucide-circle-ellipsis">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M17 12h.01" />
                                    <path d="M12 12h.01" />
                                    <path d="M7 12h.01" />
                                </svg>
                            </button>

                            <div id="issueDropdown1"
                                class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownIssueButton">
                                    <li>
                                        <a href="#" id="editIssueButton" class="block px-4 py-2 hover:bg-gray-100"
                                        data-modal-target="editAdvisoryModal" data-modal-toggle="editAdvisoryModal">
                                            Edit Advisory
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" id="deleteIssueButton"
                                            class="block px-4 py-2 text-red-600 hover:bg-red-50">
                                            Delete Advisory
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <h5 class="mb-3 text-2xl font-semibold tracking-tight leading-8 flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                                fill="none" stroke="#f61a1a" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-siren-icon lucide-siren">
                                <path d="M7 18v-6a5 5 0 1 1 10 0v6" />
                                <path d="M5 21a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2z" />
                                <path d="M21 12h1" />
                                <path d="M18.5 4.5 18 5" />
                                <path d="M2 12h1" />
                                <path d="M12 2v1" />
                                <path d="m4.929 4.929.707.707" />
                                <path d="M12 12v6" />
                            </svg>
                            <span class="text-[#f61a1a]">Emergency</span>
                        </h5>

                        <nav class="nav flex-column lnav-red" id="emergency-advisory-list">
                            <a class="lnav-link-red"
                                data-content="<img class='w-full h-auto object-cover rounded-lg mb-4 shadow-md' src='./img/data/notice.jpg' alt='Emergency Water Interruption Map'>">
                                <h5 class="text-m font-semibold">Emergency Water Service Interruption on <span>
                                        mmmm-dd-yyyy </span></h5>
                            </a>
                        </nav>


                        <!-- Pagination -->
                        <div class="flex justify-center pt-6">
                            <nav aria-label="News Page navigation">
                                <ul
                                    class="flex -space-x-px text-sm rounded-lg overflow-hidden border border-gray-300 shadow-md">
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center text-gray-700 bg-white hover:bg-gray-100 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none">
                                            <span class="sr-only">Previous</span>
                                            <svg class="w-4 h-4 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" aria-current="page"
                                            class="flex items-center justify-center text-gray-700 bg-white hover: hover:bg-gray-100 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none">1</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center text-gray-700 bg-white hover:bg-gray-100 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none">2</a>
                                    </li>
                                    <li>
                                        <!-- Active Page (Styling mapped to blue theme) -->
                                        <a href="#"
                                            class="flex items-center justify-center text-gray-700 bg-white hover:bg-blue-700 font-medium text-sm w-10 h-10 focus:outline-none border-blue-600">3</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center text-gray-700 bg-white hover:bg-gray-100 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none">4</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center text-gray-700 bg-white hover:bg-gray-100 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none">5</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center text-gray-700 bg-white hover:bg-gray-100 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none">
                                            <span class="sr-only">Next</span>
                                            <svg class="w-4 h-4 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>

                    <br>

                    <div id="scheduled-advisory-block"
                        class="relative bg-neutral-primary-soft block max-w-5xl p-6 border border-default rounded-lg shadow-lg mx-auto my-4">

                        <div class="absolute top-0 right-0 p-3 z-10">
                            <button id="dropdownIssueButton" data-dropdown-toggle="issueDropdown"
                                class="p-4 text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-full"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                                    fill="none" stroke="#1a589e" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-circle-ellipsis-icon lucide-circle-ellipsis">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M17 12h.01" />
                                    <path d="M12 12h.01" />
                                    <path d="M7 12h.01" />
                                </svg>
                            </button>

                            <div id="issueDropdown"
                                class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownIssueButton">
                                    <li>
                                        <a href="#" id="editIssueButton" class="block px-4 py-2 hover:bg-gray-100"
                                        data-modal-target="editAdvisoryModal" data-modal-toggle="editAdvisoryModal">
                                            Edit Advisory
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" id="deleteIssueButton"
                                            class="block px-4 py-2 text-red-600 hover:bg-red-50">
                                            Delete Advisory
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <h5 class="mb-3 text-2xl font-semibold tracking-tight leading-8 flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="#1a589e" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-calendar-clock-icon lucide-calendar-clock">
                                <path d="M16 14v2.2l1.6 1" />
                                <path d="M16 2v4" />
                                <path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5" />
                                <path d="M3 10h5" />
                                <path d="M8 2v4" />
                                <circle cx="16" cy="16" r="6" />
                            </svg>
                            <span class="text-[#1a589e]">Scheduled</span>
                        </h5>
                        <nav class="nav flex-column lnav" id="scheduled-advisory-list">
                            <a class="lnav-link"
                                data-content="<img class='w-full h-auto object-cover rounded-lg mb-4 shadow-md' src='./img/data/notice.jpg' alt='Emergency Water Interruption Map'>">
                                <h5 class="text-m font-semibold">Emergency Water Service Interruption on <span>
                                        mmmm-dd-yyyy </span></h5>
                            </a>
                        </nav>

                        <!-- Pagination -->
                        <div class="flex justify-center pt-6">
                            <nav aria-label="News Page navigation">
                                <ul
                                    class="flex -space-x-px text-sm rounded-lg overflow-hidden border border-gray-300 shadow-md">
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center text-gray-700 bg-white hover:bg-gray-100 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none">
                                            <span class="sr-only">Previous</span>
                                            <svg class="w-4 h-4 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" aria-current="page"
                                            class="flex items-center justify-center text-gray-700 bg-white hover: hover:bg-gray-100 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none">1</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center text-gray-700 bg-white hover:bg-gray-100 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none">2</a>
                                    </li>
                                    <li>
                                        <!-- Active Page (Styling mapped to blue theme) -->
                                        <a href="#"
                                            class="flex items-center justify-center text-gray-700 bg-white hover:bg-blue-700 font-medium text-sm w-10 h-10 focus:outline-none border-blue-600">3</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center text-gray-700 bg-white hover:bg-gray-100 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none">4</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center text-gray-700 bg-white hover:bg-gray-100 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none">5</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center justify-center text-gray-700 bg-white hover:bg-gray-100 hover:text-blue-600 font-medium text-sm w-10 h-10 focus:outline-none">
                                            <span class="sr-only">Next</span>
                                            <svg class="w-4 h-4 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Advisory Modal -->

    <div id="main-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full modal-backdrop">

        <!-- Modal Wrapper (adds padding for mobile and controls max width) -->
        <div class="relative p-4 w-full max-w-2xl max-h-full my-auto">
            <!-- Modal content -->
            <div
                class="relative bg-neutral-primary-soft border border-default rounded-base shadow-2xl p-4 md:p-6 modal-content-container max-h-[85vh] flex flex-col">

                <!-- Modal header -->
                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                    <h3 id="modal-title" class="text-sm font-bold text-heading">
                        Modal Title Placeholder
                    </h3>

                </div>

                <!-- Modal body -->
                <div id="modal-body-wrapper" class="space-y-4 md:space-y-6 py-4 md:py-6 overflow-y-auto max-h-[60vh]">
                    <div id="modal-content" class="leading-relaxed text-body text-base">
                        Modal content will be injected here dynamically based on the clicked link. This now accepts HTML
                        content.
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center border-t border-default space-x-4 pt-4 md:pt-5">
                    <button id="modal-accept" type="button"
                        class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Go
                        to Service</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Advisory Modal -->
    <div id="editAdvisoryModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden modal-overlay w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full max-h-full">
        
        <div class="relative w-full max-w-4xl max-h-full my-auto mx-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-xl shadow-2xl">
                
                <!-- Modal header -->
                <div class="flex items-start justify-between p-5 border-b rounded-t bg-gray-50 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit Advisory
                    </h3>
                    <button type="button" id="closeModalHeaderButton"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="editAdvisoryModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body (Contains the user's form content) -->
                <div class="p-6 space-y-6 max-h-[70vh] overflow-y-auto">
                    
                    <form id="edit-advisory-form" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                            <!-- Advisory Type -->
                            <div>
                                <label for="advisory_type" class="block text-sm font-medium text-gray-700">Advisory
                                    Type</label>
                                <select id="advisory_type_edit" name="advisory_type" required
                                    class="mt-1 block w-full pl-3 pr-10 py-2.5 text-base border-gray-300 focus:outline-none focus:ring-[#1a589e] focus:border-[#1a589e] sm:text-sm rounded-lg shadow-sm">
                                    <option value="Emergency" selected>Emergency</option>
                                    <option value="Scheduled">Scheduled</option>
                                </select>
                            </div>

                            <!-- Date of Interruption -->
                            <div>
                                <label for="advisory_date" class="block text-sm font-medium text-gray-700">Date of
                                    Interruption</label>
                                <input type="date" id="advisory_date_edit" name="advisory_date" required value="2025-12-17"
                                    class="mt-1 p-2.5 border border-gray-300 rounded-lg text-sm w-full focus:ring-[#1a589e] focus:border-[#1a589e] shadow-sm">
                            </div>

                            <!-- Issue Title (Auto-Generated) -->
                            <div class="md:col-span-2">
                                <label for="advisory_title" class="block text-sm font-medium text-gray-700">Issue Title
                                    (Auto-Generated)</label>
                                <input type="text" id="advisory_title_edit" name="advisory_title" readonly
                                    class="mt-1 p-2.5 border border-gray-300 rounded-lg text-sm w-full bg-gray-50 text-gray-600 cursor-not-allowed shadow-sm"
                                    placeholder="Title will appear here automatically..." value="Emergency - 12/17/2025 Advisory">
                            </div>

                            <!-- Notice Image (Map/Details) -->
                            <div class="md:col-span-4">
                                <label for="notice_image" class="block text-sm font-medium text-gray-700">Notice Image
                                    (Map/Details)</label>
                                <input type="file" id="notice_image" name="notice_image" accept="image/*"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 focus:ring-[#1a589e] focus:border-[#1a589e] shadow-sm">
                            </div>

                        </div>
                    </form>

                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-3 border-t border-gray-200 rounded-b">
                    <!-- Save Changes button (linked to the form) -->
                    <button type="submit" form="edit-advisory-form"
                        class="px-5 py-2.5 bg-[#1a589e] text-white font-bold rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out">
                        Save Changes
                    </button>
                    <!-- Cancel button -->
                    <button id="cancelModalButton" data-modal-hide="editAdvisoryModal" type="button"
                        class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-full hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-200 transition duration-300 ease-in-out">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Edit Advisory Modal -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="/js/sidenav.js"></script>
    <script src="./js/style.js"></script>
    <script src="./js/db_adv.js"></script>

</body>

</html>