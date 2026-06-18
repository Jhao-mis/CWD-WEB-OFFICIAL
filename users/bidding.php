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
                <a href="../modules/bidding.php"
                    class="flex items-center gap-3 p-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <!-- Gavel -->
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path d="m14 13-7.5 7.5a2.1 2.1 0 0 1-3-3L11 10" />
                        <path d="m16 16 6-6" />
                        <path d="m8 8 6-6" />
                    </svg>
                    <span>Bidding Opportunity</span>
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