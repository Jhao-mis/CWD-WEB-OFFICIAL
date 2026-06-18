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
                        <!-- Products Icon -->
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
                    <a href="#"
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

                <div class="container mx-auto max-w-4xl py-6">
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Upload Issue</h1>

                    <div class="container mx-auto max-w-4xl py-6">

                        <form id="magazine-issue-form"
                            class="bg-white p-6 md:p-10 rounded-xl shadow-2xl border-t-4 border-[#1a589e]">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                                <div>
                                    <label for="volume_issue"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Volume & Issue
                                        Number</label>
                                    <input type="text" id="volume_issue" name="volume_issue" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                        placeholder="e.g., Volume 11 Issue 1">
                                </div>

                                <div>
                                    <label for="issue_title"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Issue Title
                                        (Subtitle)</label>
                                    <input type="text" id="issue_title" name="issue_title" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                        placeholder="e.g., Renewing Commitment & Strengthening Service">
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="cover_description"
                                    class="block text-lg font-semibold text-gray-700 mb-2">About the Cover (Description
                                    Text)</label>
                                <textarea id="cover_description" name="cover_description" rows="5" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150 resize-y"
                                    placeholder="Enter the full description text for the magazine cover..."></textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                                <div>
                                    <label for="cover_image"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Cover Image File</label>
                                    <input type="file" id="cover_image" name="cover_image" accept="image/*" required
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5">
                                </div>

                                <div>
                                    <label for="pdf_link" class="block text-lg font-semibold text-gray-700 mb-2">
                                        Upload Issue (PDF)</label>
                                    <input type="file" id="pdf_file" name="pdf_file" accept="pdf_file" required
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="w-full md:w-auto px-8 py-3 bg-[#1a589e] text-white font-bold text-lg rounded-full shadow-lg hover:bg-pink-600 focus:outline-none focus:ring-4 focus:ring-[#1a589e]/50 transition duration-300 ease-in-out">
                                    Upload Issue
                                </button>
                            </div>

                        </form>
                    </div>

                </div>

            </div>

            <div class="container mx-auto max-w-4xl py-6">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-[#1a589e]">Waterlife</h1>

                <!-- WL Body -->

                <div id="waterlifeCarousel" class="relative w-full mx-auto max-w-7xl mt-12 p-4" data-carousel="static">

                    <!-- Carousel Wrapper - Explicit minimum height added here -->
                    <div class="relative overflow-hidden rounded-lg  min-h-[800px] sm:min-h-[400px]">

                        <div class="duration-700 ease-in-out" data-carousel-item="active">
                            <div class="w-full h-full p-6 flex justify-center items-center">
                                
                                <div class="max-w-3xl h-full bg-white rounded-xl shadow-sm border-t-4 border-[#15467e] 
                                            flex flex-col md:flex-row md:items-center w-full relative">

                                    <div class="absolute top-0 right-0 p-3 z-10">
                                        <button id="dropdownIssueButton" data-dropdown-toggle="issueDropdown"
                                            class="p-4 text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-full"
                                            type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24" fill="none" stroke="#1a589e" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-circle-ellipsis-icon lucide-circle-ellipsis">
                                                <circle cx="12" cy="12" r="10" />
                                                <path d="M17 12h.01" />
                                                <path d="M12 12h.01" />
                                                <path d="M7 12h.01" />
                                            </svg>
                                        </button>

                                        <div id="issueDropdown"
                                            class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40">
                                            <ul class="py-2 text-sm text-gray-700"
                                                aria-labelledby="dropdownIssueButton">
                                                <li>
                                                    <a href="#" id="editIssueButton"
                                                        class="block px-4 py-2 hover:bg-gray-100"
                                                        data-modal-target="editIssueModal" data-modal-toggle="editIssueModal">
                                                        Edit Issue
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" id="deleteIssueButton"
                                                        class="block px-4 py-2 text-red-600 hover:bg-red-50">
                                                        Delete Issue
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="w-full md:w-5/12 p-4 flex justify-center md:block ">
                                        <img class="object-contain w-full rounded-xl bg-[#15467e] max-h-56 md:w-full md:h-auto shadow-lg"
                                            src="./img/wl25.png" alt="Waterlife Magazine 2025 Issue">
                                    </div>
                                    <div
                                        class="w-full md:w-7/12 p-4 md:p-8 max-h-61 overflow-y-auto md:max-h-full md:overflow-y-visible">
                                        <h5 class="mb text-2xl font-bold tracking-tight text-gray-900">Volume 11 Issue 1
                                        </h5>
                                        <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900">Renewing
                                            Commitment &
                                            Strengthening Service</h5>
                                        <p class="mb-6 font-normal text-gray-700">The cover features "Peter the
                                            Plumber,"
                                            symbolizing CWD's dedication and technical expertise. It is surrounded by
                                            real-life
                                            images highlighting CWD's infrastructure and operations, reflecting its
                                            continuous
                                            effort to deliver clean, safe water through innovation and sustainability.
                                        </p>
                                        <a href="./pdf/CWD WL, Vol 11, Issue 1 (2025) [Compressed Ver].pdf"
                                            target="_blank"
                                            class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-center text-white bg-[#1a589e] rounded-lg
                    hover:bg-[#15467e] focus:ring-4 focus:outline-none focus:ring-blue-300 transition duration-200 shadow-md">
                                            Read Issue
                                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" fill="none"
                                                viewBox="0 0 14 10" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="duration-700 ease-in-out" data-carousel-item="">
                            <div class="w-full h-full p-6 flex justify-center items-center">
                                <!-- Card structure with new accent border -->
                                <div class="max-w-3xl h-full bg-white rounded-xl shadow-sm border-t-4 border-[#15467e]
                    flex flex-col md:flex-row md:items-center w-full">
                                    <div class="w-full md:w-5/12 p-4 flex justify-center md:block ">
                                        <!-- Placeholder image URL used, added bg-gray-100 to differentiate from card background -->
                                        <img class="object-contain w-full rounded-xl bg-[#15467e] max-h-56 md:w-full md:h-auto shadow-lg"
                                            src="./img/wl25.png" alt="Waterlife Magazine 2025 Issue">
                                    </div>
                                    <!-- SCROLLING ADDED HERE: max-h-48 (sets max height on mobile) and overflow-y-auto (enables scrolling) -->
                                    <div
                                        class="w-full md:w-7/12 p-4 md:p-8 max-h-61 overflow-y-auto md:max-h-full md:overflow-y-visible">
                                        <h5 class="mb text-2xl font-bold tracking-tight text-gray-900">Archives</h5>
                                        <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900">View all
                                            archives issues
                                        </h5>
                                        <p class="mb-6 font-normal text-gray-700">Looks like you've checked out all this
                                            year's
                                            issues. Keep
                                            reading on our past issues here!
                                        </p>
                                        <button type="button"
                                            class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-center text-white bg-[#1a589e] rounded-lg
                    hover:bg-[#15467e] focus:ring-4 focus:outline-none focus:ring-blue-300 transition duration-200 shadow-md"
                                            data-modal-target="archive-modal" data-modal-toggle="archive-modal">
                                            View Archive
                                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" viewBox="0 0 14 10"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Previous Button -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>

                        <span class="inline-flex items-center justify-center">

                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                fill="none" stroke="#15467e" stroke-width="5" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left">
                                <path d="m15 18-6-6 6-6" />
                            </svg>

                        </span>
                    </button>

                    <!-- Next Button -->
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span class="inline-flex items-center justify-center">

                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                fill="none" stroke="#15467e" stroke-width="5" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </span>
                    </button>
                </div>

                <!-- WL ARCHIVE MODAL (Light Theme Enforced) -->
                <div id="archive-modal" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-4xl max-h-full">
                        <div class="relative bg-white rounded-lg shadow-xl">

                            <div
                                class="flex items-start justify-between p-4 border-b rounded-t border-gray-200 bg-[#15467e]">
                                <h3 class="text-xl font-semibold text-white">
                                    Waterlife Magazine Archives (Management View)
                                </h3>
                                <button type="button"
                                    class="text-gray-200 bg-transparent hover:bg-[#0f345a] hover:text-white rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center transition duration-150"
                                    data-modal-hide="archive-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            <div class="p-6 space-y-6">
                                <h4 class="text-lg font-bold text-gray-800 mb-4">Archive Issues</h4>

                                <div
                                    class="max-h-[50vh] overflow-y-auto relative shadow-md sm:rounded-lg border border-gray-200">
                                    <div class="relative overflow-x-auto">
                                        <table class="w-full text-sm text-left text-gray-700">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 sticky top-0">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Issue Title
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center w-28">
                                                        Year
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center w-28">
                                                        Action
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center w-28">
                                                        Manage
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="archive-table-body">
                                                <tr class="bg-white border-b hover:bg-blue-50">
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                        Volume 10 Issue 4: Water Sustainability Focus
                                                    </th>
                                                    <td class="px-6 py-4 text-center">
                                                        2024
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        <a href="#" target="_blank"
                                                            class="font-medium text-[#1a589e] hover:underline">View</a>
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        <button
                                                            class="text-red-500 hover:text-red-700 font-medium text-xs">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b hover:bg-blue-50">
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                        Volume 10 Issue 3: Infrastructure Upgrades
                                                    </th>
                                                    <td class="px-6 py-4 text-center">
                                                        2024
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        <a href="#" target="_blank"
                                                            class="font-medium text-[#1a589e] hover:underline">View</a>
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        <button
                                                            class="text-red-500 hover:text-red-700 font-medium text-xs">Delete</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <form id="add-issue-form" class="p-6 border-t border-gray-200 rounded-b bg-gray-50">
                                <h4 class="text-lg font-bold text-gray-800 mb-4">Add New Issue</h4>
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

                                    <div class="md:col-span-2">
                                        <label for="new_title" class="block text-sm font-medium text-gray-700">Issue
                                            Title</label>
                                        <input type="text" id="new_title" name="new_title" required
                                            class="w-full mt-1 p-2 border border-gray-300 rounded-lg text-sm focus:ring-pink-500 focus:border-pink-500"
                                            placeholder="Volume XX Issue X: Title">
                                    </div>

                                    <div>
                                        <label for="new_year"
                                            class="block text-sm font-medium text-gray-700">Year</label>
                                        <input type="number" id="new_year" name="new_year" required min="2000"
                                            max="2100"
                                            class="w-full mt-1 p-2 border border-gray-300 rounded-lg text-sm focus:ring-pink-500 focus:border-pink-500"
                                            placeholder="e.g., 2025">
                                    </div>

                                    <div>
                                        <label for="new_pdf_file" class="block text-sm font-medium text-gray-700">PDF
                                            File Upload</label>
                                        <input type="file" id="new_pdf_file" name="new_pdf_file" accept=".pdf" required
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-1.5 focus:ring-pink-500 focus:border-pink-500">
                                    </div>
                                </div>

                                <div class="flex justify-end space-x-3">
                                    <button data-modal-hide="archive-modal" type="button"
                                        class="text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 border border-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-150">
                                        Close
                                    </button>
                                    <button type="submit"
                                        class="text-white bg-[#1a589e] hover:bg-[#15467e] focus:ring-4 focus:outline-none focus:ring-[#1a589e]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-150">
                                        Add New Issue to Archive
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <!-- Edit Issue Modal -->
    <div id="editIssueModal" tabindex="-1" aria-hidden="true"
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
                        data-modal-hide="editIssueModal">
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
                    
                    <form id="edit-magazine-issue-form" enctype="multipart/form-data">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                                <div>
                                    <label for="volume_issue"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Volume & Issue
                                        Number</label>
                                    <input type="text" id="volume_issue" name="volume_issue" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                        placeholder="e.g., Volume 11 Issue 1">
                                </div>

                                <div>
                                    <label for="issue_title"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Issue Title
                                        (Subtitle)</label>
                                    <input type="text" id="issue_title" name="issue_title" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                        placeholder="e.g., Renewing Commitment & Strengthening Service">
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="cover_description"
                                    class="block text-lg font-semibold text-gray-700 mb-2">About the Cover (Description
                                    Text)</label>
                                <textarea id="cover_description" name="cover_description" rows="5" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150 resize-y"
                                    placeholder="Enter the full description text for the magazine cover..."></textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                                <div>
                                    <label for="cover_image"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Cover Image File</label>
                                    <input type="file" id="cover_image" name="cover_image" accept="image/*" required
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5">
                                </div>

                                <div>
                                    <label for="pdf_link" class="block text-lg font-semibold text-gray-700 mb-2">
                                        Upload Issue (PDF)</label>
                                    <input type="file" id="pdf_file" name="pdf_file" accept="pdf_file" required
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5">
                                </div>
                            </div>

                        </form>

                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-3 border-t border-gray-200 rounded-b">
                    <!-- Save Changes button (linked to the form) -->
                    <button type="submit" form="editIssueModal"
                        class="px-5 py-2.5 bg-[#1a589e] text-white font-bold rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out">
                        Save Changes
                    </button>
                    <!-- Cancel button -->
                    <button id="cancelModalButton" data-modal-hide="editIssueModal" type="button"
                        class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-full hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-200 transition duration-300 ease-in-out">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="/js/sidenav.js"></script>
    <script src="/js/db_wl.js"></script>

</body>

</html>