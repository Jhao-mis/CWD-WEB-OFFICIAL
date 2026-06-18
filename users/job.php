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
                <a href="../modules/career.php"
                    class="flex items-center gap-3 p-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <!-- Briefcase -->
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="7" width="20" height="14" rx="2"/>
                        <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
                    </svg>
                    <span>Career Opportunities</span>
                </a>
            </li>



            <!-- SIGN OUT -->
            <li class="pt-4">
                <a href="../logout.php"
                    class="flex items-center gap-3 p-3 rounded-lg text-red-600 hover:bg-red-50">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M16 12H4m12 0-4 4m4-4-4-4"/>
                        <path d="M20 5v14"/>
                    </svg>
                    <span>Sign Out</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
