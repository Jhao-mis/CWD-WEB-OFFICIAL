<?php
// Kukunin ang kasalukuyang filename mula sa URL path nang walang .php extension
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$current_page = basename($request_path, ".php");
?>

<div class="col-6 col-md-3 mx-auto">
    <nav class="nav flex-column sidebar-nav">
        <h3 class="text-2xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">
            Online Services
        </h3>

        <a class="tab-card <?= ($current_page == '02_ol_serv' || $current_page == '') ? 'active' : '' ?>"
            href="./02_ol_serv" <?= ($current_page == '02_ol_serv' || $current_page == '') ? 'aria-current="page"' : '' ?>>
            <h5 class="font-bold text-sm"><i class="fa-solid fa-mobile-screen"></i> Online Payment</h5>
        </a>

        <div style="cursor: not-allowed;">
            <a class="tab-card <?= ($current_page == '02_ol_serv3') ? 'active' : '' ?>" href="./02_ol_serv3"
                <?= ($current_page == '02_ol_serv3') ? 'aria-current="page"' : '' ?>
                style="opacity: 0.6; pointer-events: none;" tabindex="-1" aria-disabled="true">
                <h5 class="font-bold text-sm flex items-center justify-between w-full">
                    <span><i class="fa-solid fa-calculator"></i> Bill Calculator</span>
                    <span
                        class="text-[9px] text-gray-500 px-1.5 py-0.5 rounded uppercase font-black tracking-wider flex items-center gap-1">
                        <i class="fa-solid fa-link-slash fa-2xs text-[#1a589e]"></i>

                    </span>
                </h5>
            </a>
        </div>

        <a class="tab-card <?= ($current_page == '02_ol_serv2') ? 'active' : '' ?>" href="./02_ol_serv2"
            <?= ($current_page == '02_ol_serv2') ? 'aria-current="page"' : '' ?>>
            <h5 class="font-bold text-sm"><i class="fa-solid fa-bullhorn"></i> Water Service Notices</h5>
        </a>

        <a class="tab-card"
            href="https://docs.google.com/forms/d/e/1FAIpQLSeN07_EsXAdLg6odGiWAUvU7T5mVR7UvjsohcdLQVhmJEm9ZQ/viewform"
            target="_blank">
            <h5 class="font-bold text-sm"><i class="fa-solid fa-comment-sms"></i> Email & Text Blast</h5>
        </a>

        <a class="tab-card" href="https://www.foi.gov.ph/agencies/clwd/" target="_blank">
            <h5 class="font-bold text-sm"><i class="fa-solid fa-inbox"></i> eFOI</h5>
        </a>

        <!-- Info Card Box (Katulad ng sa BAC para uniporme ang design) -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-700 to-[#1a589e] text-white shadow-xs p-5 mb-4 w-full mx-auto mt-4"
            style="transform: translateZ(0); -webkit-mask-image: -webkit-radial-gradient(white, black);">

            <div class="absolute right-0 bottom-0 opacity-10 pointer-events-none translate-x-2 translate-y-2">
                <i class="fa-solid fa-headset text-7xl"></i>
            </div>

            <div class="relative z-10 flex flex-col gap-3 w-full">
                <h5
                    class="text-xs font-black uppercase tracking-wider text-center flex items-center justify-center gap-2">
                    <i class="fa-solid fa-circle-info text-sm"></i>
                    <span>Customer Support</span>
                </h5>

                <div class="text-white/90 text-[11px] leading-relaxed space-y-2.5 w-full">
                    <p class="font-bold text-center text-white text-xs">For service concerns and queries:</p>

                    <div class="space-y-2 bg-slate-900/15 p-3 rounded-lg border border-black/5 w-full mx-auto">
                        <div class="flex items-start justify-center gap-2 text-center">
                            <i class="fa-solid fa-phone text-blue-200 mt-0.5 shrink-0"></i>
                            <span class="text-center">                                
                                <a href="tel:+63495451614" class="text-white/90 hover:text-white hover:underline">(049)
                                    545-1614</a>
                            </span>
                        </div>

                        <div
                            class="flex flex-col sm:flex-row items-center justify-center gap-1 sm:gap-2 pt-2 border-t border-white/10 text-center sm:text-left">
                            <span
                                class="flex items-center justify-center gap-1.5 text-white font-bold text-[11px] sm:text-xs">
                                <i class="fa-solid fa-envelope text-blue-200 shrink-0 text-sm"></i>
                                
                            </span>
                            <a href="mailto:cwd_customerservice@yahoo.com"
                                class="text-white/90 hover:text-white hover:underline text-[11px] sm:text-xs tracking-wide break-all sm:break-normal font-medium block sm:inline-block max-w-full overflow-hidden text-ellipsis">
                                cwd_customerservice@yahoo.com
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

</div>