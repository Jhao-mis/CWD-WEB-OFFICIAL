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
                    <a href="#"
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

                <div class="container mx-auto max-w-4xl py-6">
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Create News Post</h1>

                    <form id="news-creation-form"
                        class="bg-white p-6 md:p-10 rounded-xl shadow-2xl border-t-4 border-[#1a589e]">

                        <div class="mb-6">
                            <label for="news_headline" class="block text-lg font-semibold text-gray-700 mb-2">News
                                Headline</label>
                            <input type="text" id="news_headline" name="news_headline" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                placeholder="Enter the title of the news article">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                            <div>
                                <label for="date_published" class="block text-lg font-semibold text-gray-700 mb-2">Date
                                    Published</label>
                                <input type="date" id="date_published" name="date_published" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150">
                            </div>

                            <div>
                                <label for="article_writer"
                                    class="block text-lg font-semibold text-gray-700 mb-2">Article Writer</label>
                                <input type="text" id="article_writer" name="article_writer" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                    placeholder="e.g., John Doe or The Editorial Team">
                            </div>
                        </div>

                        <div class="mb-8">
                            <label for="article_body" class="block text-lg font-semibold text-gray-700 mb-2">Article
                                Body (Content)</label>
                            <textarea id="article_body" name="article_body" rows="15" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150 resize-y"
                                placeholder="Start writing your news content here..."></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit"
                                class="w-full md:w-auto px-8 py-3 bg-[#1a589e] text-white font-bold text-lg rounded-full shadow-lg hover:bg-pink-600 focus:outline-none focus:ring-4 focus:ring-[#1a589e]/50 transition duration-300 ease-in-out">
                                Publish News Post
                            </button>
                        </div>

                    </form>
                </div>

            </div>

            <div class="container mx-auto max-w-4xl py-6">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-[#1a589e]">News Headlines</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Card 1 -->
                    <div
                        class="relative bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 overflow-hidden border border-gray-100">

                        <!-- Dropdown Trigger and Menu -->
                        <div class="absolute top-0 right-0 p-3 z-10">
                            <!-- Added data-dropdown-placement for correct positioning inside absolute div -->
                            <button id="dropdownIssueButton" data-dropdown-toggle="issueDropdown"
                                data-dropdown-placement="bottom-end"
                                class="p-2 text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-full"
                                type="button">
                                <!-- Ellipsis Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                                    fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
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
                                            data-modal-target="editNewsModal" data-modal-toggle="editNewsModal">
                                            Edit News
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" id="deleteIssueButton"
                                            class="block px-4 py-2 text-red-600 hover:bg-red-50 transition duration-100">
                                            Delete News
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Card Image and Content -->
                        <img class="w-full h-48 object-cover"
                            src="https://placehold.co/600x400/ef4444/ffffff?text=Public+Hearing"
                            onerror="this.onerror=null;this.src='https://placehold.co/600x400/ef4444/ffffff?text=Hearing+Image'"
                            alt="Public hearing graphic with speakers on a stage.">
                        <div class="p-5">
                            <p class="text-sm font-semibold text-red-600 mb-1">PUBLIC HEARING</p>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">CWD holds public hearing for proposed water
                                rate adjustments</h3>
                            <p class="text-sm text-gray-500 mb-3">November 25, 2025</p>
                            <a href="#"
                                class="inline-flex items-center text-blue-600 font-semibold text-sm hover:text-blue-800 transition">Read
                                News &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Edit News Modal -->

    <div id="editNewsModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-2xl">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t bg-gray-50 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit News Post
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="editNewsModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body (Contains the user's form content) -->
                <div class="p-6 space-y-6 max-h-[80vh] overflow-y-auto">

                    <form id="news-creation-form" class="bg-white">

                        <div class="mb-6">
                            <label for="news_headline" class="block text-lg font-semibold text-gray-700 mb-2">News
                                Headline</label>
                            <input type="text" id="news_headline" name="news_headline" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                placeholder="Enter the title of the news article"
                                value="CWD holds public hearing for proposed water rate adjustments">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                            <div>
                                <label for="date_published" class="block text-lg font-semibold text-gray-700 mb-2">Date
                                    Published</label>
                                <input type="date" id="date_published" name="date_published" required value="2025-11-25"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                            </div>

                            <div>
                                <label for="article_writer"
                                    class="block text-lg font-semibold text-gray-700 mb-2">Article Writer</label>
                                <input type="text" id="article_writer" name="article_writer" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                    placeholder="e.g., John Doe or The Editorial Team" value="The Editorial Team">
                            </div>
                        </div>

                        <div class="mb-8">
                            <label for="article_body" class="block text-lg font-semibold text-gray-700 mb-2">Article
                                Body (Content)</label>
                            <textarea id="article_body" name="article_body" rows="15" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 resize-y"
                                placeholder="Start writing your news content here...">The City Water Department (CWD) successfully conducted a comprehensive public hearing on the proposed water rate adjustments, designed to support infrastructure modernization and improve service reliability across the region. Feedback from residents and business owners has been recorded and will be reviewed by the CWD board.</textarea>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                    <button type="submit" form="news-creation-form"
                        class="px-5 py-2.5 bg-[#1a589e] text-white font-bold rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out">
                        Save Changes
                    </button>
                    <button data-modal-hide="editNewsModal" type="button"
                        class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-200">
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

</body>

</html>