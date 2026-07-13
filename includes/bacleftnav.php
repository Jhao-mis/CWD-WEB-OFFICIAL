<?php
// Kukunin ang pangalan ng kasalukuyang file mula sa URL (e.g., "03_bac1" o "03_bac1.php")
// Uses only the path portion (parse_url) so query strings like ?page=2 or trailing
// slashes don't break the active-state comparison.
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$current_page = basename($request_path, ".php");
?>

<div class="col-6 col-md-3 mx-auto">
    <nav class="nav flex-column sidebar-nav1">
        <h4 class="text-2xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">
            Bids and Awards</h4>

        <a class="tab-card1 <?= ($current_page == '03_bac1') ? 'active' : '' ?>" href="./03_bac1" <?= ($current_page == '03_bac1') ? 'aria-current="page"' : '' ?>>
            <h5 class="font-bold text-sm"><i class="fa-solid fa-gavel"></i> Bidding Opportunities</h5>
        </a>

        <a class="tab-card1 <?= ($current_page == '03_bac2') ? 'active' : '' ?>" href="./03_bac2" <?= ($current_page == '03_bac2') ? 'aria-current="page"' : '' ?>>
            <h5 class="font-bold text-sm"><i class="fa-solid fa-file-lines"></i> Bid Bulletin / Addendum</h5>
        </a>

        <a class="tab-card1 <?= ($current_page == '03_bac3') ? 'active' : '' ?>" href="./03_bac3" <?= ($current_page == '03_bac3') ? 'aria-current="page"' : '' ?>>
            <h5 class="font-bold text-sm"><i class="fa-solid fa-calendar-days"></i> Notice of Postponement</h5>
        </a>

        <a class="tab-card1 <?= ($current_page == '03_bac4') ? 'active' : '' ?>" href="./03_bac4" <?= ($current_page == '03_bac4') ? 'aria-current="page"' : '' ?>>
            <h5 class="font-bold text-sm"><i class="fa-solid fa-medal"></i> Post-award Information</h5>
        </a>

        <!-- <a class="tab-card1 mb-4 <?= ($current_page == '03_bac5') ? 'active' : '' ?>" href="./03_bac5" <?= ($current_page == '03_bac5') ? 'aria-current="page"' : '' ?>>
            <h5 class="font-bold text-sm"><i class="fa-solid fa-box-archive"></i> Archives</h5>
        </a> -->

        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-700 to-[#1a589e] text-white shadow-xs p-5 mb-4 w-full mx-auto mt-4"
            style="transform: translateZ(0); -webkit-mask-image: -webkit-radial-gradient(white, black);">

            <div class="absolute right-0 bottom-0 opacity-10 pointer-events-none translate-x-2 translate-y-2">
                <i class="fa-solid fa-bullhorn text-7xl"></i>
            </div>

            <div class="relative z-10 flex flex-col gap-3 w-full">
                <h5
                    class="text-xs font-black uppercase tracking-wider text-center flex items-center justify-center gap-2">
                    <i class="fa-solid fa-envelope-open-text text-sm"></i>
                    <span>For BAC Inquiries</span>
                </h5>

                <div class="text-white/90 text-[11px] leading-relaxed space-y-2.5 w-full">
                    <p class="font-bold text-center text-white text-xs">You may contact the following:</p>

                    <div
                        class="text-center font-black text-blue-100 bg-white/10 py-2 px-3 rounded-lg border border-white/10 w-full mx-auto">
                        Rolando M. Pizarra <br> Beverly Joy B. Acierto
                        <div class="text-[9px] font-medium text-white/70 italic mt-0.5">BAC Secretariats</div>
                    </div>

                    <div class="space-y-2 bg-slate-900/15 p-3 rounded-lg border border-black/5 w-full mx-auto">
                        <div class="flex items-start justify-center gap-2 text-center sm:text-left">
                            <i class="fa-solid fa-phone text-blue-200 mt-0.5 shrink-0"></i>
                            <span class="text-center"><strong class="text-white">Lines:</strong>
                                <a href="tel:+63495451614" class="text-white/90 hover:text-white hover:underline">(049) 545-1614</a> loc.
                                1007</span>
                        </div>

                        <div
                            class="flex flex-col sm:flex-row items-center justify-center gap-1 sm:gap-2 pt-2 border-t border-white/10 text-center sm:text-left">
                            <span
                                class="flex items-center justify-center gap-1.5 text-white font-bold text-[11px] sm:text-xs">
                                <i class="fa-solid fa-envelope text-blue-200 shrink-0 text-sm"></i>
                                
                            </span>

                            <a href="mailto:cwdbac2025@gmail.com"
                                class="text-white/90 hover:text-white hover:underline text-[11px] sm:text-xs tracking-wide break-all sm:break-normal font-medium block sm:inline-block max-w-full overflow-hidden text-ellipsis">
                                cwdbac2025@gmail.com
                            </a>
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>

    </nav>
</div>