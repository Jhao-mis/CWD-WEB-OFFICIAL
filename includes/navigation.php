    <nav id="main-navbar" class="shadow-lg sticky top-0 z-50 bg-[#1a589e]">
        <div class="container mx-auto flex items-center justify-between p-4 lg:px-8">
            <div class="flex items-center">
                <img src="img/lgnav2.svg" class="h-10 md:h-12 w-auto" alt="CWD Logo"
                    onerror="this.src='https://via.placeholder.com/150x50?text=CWD+LOGO'">
            </div>

            <button id="mobile-menu-open" class="lg:hidden p-2 text-white">
                <i class="fa-solid fa-bars text-2xl"></i>
            </button>

            <!-- Desktop Nav -->
            <div class="hidden lg:block">
                <div class="flex items-center space-x-1">
                    <a class="nav-link px-4 py-2 rounded-md text-white font-semibold flex items-center gap-2 hover:bg-white/10"
                        href="index">
                        <i class="fa-solid fa-house text-sm mr-2"></i> Home
                    </a>

                    <!-- Services Dropdown -->
                    <div class="nav-item relative group">
                        <button
                            class="nav-link px-4 py-2 rounded-md text-white/90 font-semibold flex items-center gap-2 group-hover:bg-white/10">
                            <a href="services"><i class="fa-solid fa-droplet text-sm mr-2"></i> Services <i
                                    class="fa-solid fa-chevron-down text-[10px] ml-1"></i></a>
                        </button>
                        <div class="dropdown-menu">
                            <a href="02_ol_serv4" class="dropdown-link font-semibold"><i class="fa-solid fa-mobile-screen-button mr-2"></i> Online
                                Services</a>
                            <a href="02_fl_serv" class="dropdown-link font-semibold"><i class="fa-solid fa-people-line mr-2"></i>
                                Frontline
                                Services</a>
                            <a href="02_paymc" class="dropdown-link font-semibold"><i
                                    class="fa-solid fa-building-columns w-5"></i> Payment
                                Centers</a>
                            <a href="02_watr" class="dropdown-link font-semibold"><i class="fa-solid fa-faucet-drip mr-2"></i> Water Rates</a>
                            <a href="02_stats" class="dropdown-link font-semibold"><i class="fa-solid fa-chart-line w-5 mr-2"></i>
                                Statistics</a>
                            <a href="02_faqs" class="dropdown-link font-semibold"><i class="fa-solid fa-circle-question w-5 mr-2"></i>
                                FAQs</a>
                            <a href="02_smp" class="dropdown-link font-semibold"><i class="fa-solid fa-truck-droplet w-5 mr-2"></i>
                                Septage
                                Management</a>
                        </div>
                    </div>

                    <!-- Events Dropdown -->
                    <div class="nav-item relative group">
                        <button
                            class="nav-link px-4 py-2 rounded-md text-white/90 font-semibold flex items-center gap-2 group-hover:bg-white/10">
                            <a href="events"><i class="fa-solid fa-calendar-days text-sm mr-2"></i> Events <i
                                    class="fa-solid fa-chevron-down text-[10px] ml-1"></i></a>
                        </button>
                        <div class="dropdown-menu">
                            <a href="03_bac1" class="dropdown-link font-semibold"><i class="fa-solid fa-gavel w-5 mr-2"></i>
                                Procurement
                                Opportunities</a>
                            <a href="03_jo" class="dropdown-link font-semibold"><i class="fa-solid fa-briefcase w-5 mr-2"></i> Career
                                Opportunities</a>
                            <a href="03_wl" class="dropdown-link font-semibold"><i class="fa-solid fa-book w-5 mr-2"></i>
                                Waterlife</a>
                            <a href="03_gad" class="dropdown-link font-semibold"><i class="fa-solid fa-venus-mars w-5 mr-2"></i>
                                Gender &
                                Development</a>
                            <a href="03_news" class="dropdown-link font-semibold"><i class="fa-solid fa-newspaper w-5 mr-2"></i>
                                News</a>
                        </div>
                    </div>

                    <a class="nav-link px-4 py-2 rounded-md text-white/90 font-semibold flex items-center gap-2 hover:bg-white/10"
                        href="about_us">
                        <i class="fa-solid fa-circle-info text-sm mr-2"></i> About Us
                    </a>
                    <a class="nav-link px-4 py-2 rounded-md text-white/90 font-semibold flex items-center gap-2 hover:bg-white/10"
                        href="contact_us">
                        <i class="fa-solid fa-envelope text-sm mr-2"></i> Contact Us
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div id="offcanvas-overlay" class="offcanvas-overlay"></div>
    <aside id="mobile-offcanvas">
        <div class="flex justify-between items-center p-6 border-b border-gray-100">
            <div class="flex items-center">
                <img src="img/lgnav3.svg" class="h-10 w-auto" alt="CWD Logo"
                    onerror="this.src='https://via.placeholder.com/150x50?text=CWD+LOGO'">
            </div>
            <button id="mobile-menu-close" class="text-gray-800 hover:text-red-500 transition-colors text-2xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto py-4">
            <div class="flex flex-col px-4 space-y-1">
                <a class="flex items-center gap-4 p-3 text-gray-800 font-semibold text-lg rounded-xl hover:bg-slate-50"
                    href="index">
                    <i class="fa-solid fa-house w-6 text-center text-[#1a589e] mr-2"></i> Home
                </a>

                <!-- Mobile Services Accordion -->
                <div>
                    <button
                        class="mobile-dropdown-btn w-full flex items-center justify-between p-3 text-gray-700 font-semibold text-lg rounded-xl hover:bg-slate-50">
                        <span class="flex items-center gap-4">
                            <a href="services"><i class="fa-solid fa-droplet w-6 text-center text-[#1a589e] mr-2"></i>
                                Services</a>
                        </span>
                        <i class="fa-solid fa-chevron-down text-xs rotate-icon"></i>
                    </button>
                    <div class="mobile-dropdown-content">
                        <div class="py-2 pl-14 pr-4 flex flex-col space-y-3">
                            <a href="02_ol_serv" class="text-gray-600 hover:text-[#1a589e] font-semibold"><i
                                    class="fa-solid fa-mobile-screen-button w-5 mr-2"></i>
                                Online Services</a>
                            <a href="02_fl_serv" class="text-gray-600 hover:text-[#1a589e] font-semibold"><i
                                    class="fa-solid fa-people-line w-5 mr-2"></i>
                                Frontline Services</a>
                            <a href="02_paymc" class="text-gray-600 hover:text-[#1a589e] font-semibold"><i
                                    class="fa-solid fa-building-columns w-5 mr-2"></i> Payment Centers</a>
                            <a href="02_watr" class="text-gray-600 hover:text-[#1a589e] font-semibold"><i
                                    class="fa-solid fa-faucet-drip mr-2"></i> Water Rates</a>
                            <a href="02_stats" class="text-gray-600 hover:text-[#1a589e] font-semibold"><i
                                    class="fa-solid fa-chart-line w-5 mr-2"></i> Statistics</a>
                            <a href="02_faqs" class="text-gray-600 hover:text-[#1a589e] font-semibold"><i
                                    class="fa-solid fa-circle-question w-5 mr-2"></i> FAQs</a>
                            <a href="02_smp" class="text-gray-600 hover:text-[#1a589e] font-semibold"><i
                                    class="fa-solid fa-truck-droplet w-5 mr-2"></i> Septage Management</a>
                        </div>
                    </div>
                </div>

                <!-- Mobile Events Accordion -->
                <div>
                    <button
                        class="mobile-dropdown-btn w-full flex items-center justify-between p-3 text-gray-700 font-semibold text-lg rounded-xl hover:bg-slate-50">
                        <span class="flex items-center gap-4">
                            <a href="events"><i
                                    class="fa-solid fa-calendar-days w-6 text-center text-[#1a589e] mr-2"></i> Events</a>
                        </span>
                        <i class="fa-solid fa-chevron-down text-xs rotate-icon"></i>
                    </button>
                    <div class="mobile-dropdown-content">
                        <div class="py-2 pl-14 pr-4 flex flex-col space-y-3">
                            <a href="03_bac1" class="text-gray-600 hover:text-[#1a589e] font-semibold"><i
                                    class="fa-solid fa-gavel w-5 mr-2"></i>
                                Procurement Opportunities</a>
                            <a href="03_jo" class="text-gray-600 hover:text-[#1a589e] font-semibold"><i
                                    class="fa-solid fa-briefcase w-5 mr-2"></i> Career Opportunities</a>
                            <a href="03_wl" class="text-gray-600 hover:text-[#1a589e] font-semibold"><i
                                    class="fa-solid fa-book w-5 mr-2"></i>
                                Waterlife</a>
                            <a href="03_gad" class="text-gray-600 hover:text-[#1a589e] font-semibold"><i
                                    class="fa-solid fa-venus-mars w-5 mr-2"></i> Gender And Development</a>
                            <a href="03_news" class="text-gray-600 hover:text-[#1a589e] font-semibold"><i
                                    class="fa-solid fa-newspaper w-5 mr-2"></i> News</a>
                        </div>
                    </div>
                </div>

                <a class="flex items-center gap-4 p-3 text-gray-700 font-semibold text-lg rounded-xl hover:bg-slate-50"
                    href="about_us">
                    <i class="fa-solid fa-circle-info w-6 text-center text-[#1a589e] mr-2"></i> About Us
                </a>

                <a class="flex items-center gap-4 p-3 text-gray-700 font-semibold text-lg rounded-xl hover:bg-slate-50"
                    href="contact_us">
                    <i class="fa-solid fa-envelope w-6 text-center text-[#1a589e] mr-2"></i> Contact Us
                </a>
            </div>
        </div>

        <div class="p-6 border-t border-gray-100 text-center bg-slate-50">
            <p class="text-[10px] uppercase tracking-widest text-gray-400 font-bold">© 2026 Calamba Water District</p>
        </div>
    </aside>