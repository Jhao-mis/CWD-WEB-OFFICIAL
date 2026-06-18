<!-- Sidebar Aside -->
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">

    <div class="h-full px-3 py-4 overflow-y-auto bg-white border-r border-gray-200 shadow-xl">

        <!-- Logo -->
        <a href="../modules/dashboard.php" class="flex items-center justify-center mb-8 pt-2">
            <img src="../img/lgnav.svg" class="h-10" alt="logo">
        </a>

        <!-- Navigation -->
        <ul class="space-y-1 text-sm font-medium">
            <li>
                <a href="../modules/dashboard.php"
                    class="flex items-center gap-3 p-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <!-- News -->
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" rx="1" />
                        <rect x="14" y="3" width="7" height="7" rx="1" />
                        <rect x="14" y="14" width="7" height="7" rx="1" />
                        <rect x="3" y="14" width="7" height="7" rx="1" />
                    </svg>

                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../modules/waterlife.php"
                    class="flex items-center gap-3 p-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600">

                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path d="M12 2C12 2 5 10 5 14a7 7 0 0 0 14 0c0-4-7-12-7-12z" />
                    </svg>
                    <span>Waterlife</span>
                </a>
            </li>

            <li>
                <a href="../modules/news.php"
                    class="flex items-center gap-3 p-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600">

                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="16" rx="2" />
                        <path d="M7 8h10M7 12h10M7 16h6" />
                    </svg>
                    <span>News</span>
                </a>
            </li>

            <li>
                <a href="../modules/advisory.php"
                    class="flex items-center gap-3 p-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600">

                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path d="M12 9v4" />
                        <path d="M12 17h.01" />
                        <path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h16.9a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0z" />
                    </svg>
                    <span>Advisory</span>
                </a>
            </li>

            <!-- SIGN OUT -->
            <li class="pt-4">
                <a href="../logout.php" class="flex items-center gap-3 p-3 rounded-lg text-red-600 hover:bg-red-50">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path d="M16 12H4m12 0-4 4m4-4-4-4" />
                        <path d="M20 5v14" />
                    </svg>
                    <span>Sign Out</span>
                </a>
            </li>

        </ul>
    </div>
</aside>