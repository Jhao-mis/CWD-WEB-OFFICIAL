
<?php
// Kukunin ang pangalan ng kasalukuyang file mula sa URL (e.g., "03_bac1" o "03_bac1.php")
$current_page = basename($_SERVER['REQUEST_URI'], ".php");
?>

<div class="col-6 col-md-3 mx-auto">
    <nav class="nav flex-column sidebar-nav1">
        <h4 class="text-2xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">
            Bids and Awards</h4>
            
        <a class="tab-card1 <?= ($current_page == '03_bac1') ? 'active' : '' ?>" href="./03_bac1">
            <h5 class="font-bold text-sm"><i class="fa-solid fa-gavel"></i> Bidding Opportunities</h5>
        </a>
        
        <a class="tab-card1 <?= ($current_page == '03_bac2') ? 'active' : '' ?>" href="./03_bac2">
            <h5 class="font-bold text-sm"><i class="fa-solid fa-file-lines"></i> Bid Bulletin / Addendum</h5>
        </a>
        
        <a class="tab-card1 <?= ($current_page == '03_bac3') ? 'active' : '' ?>" href="./03_bac3">
            <h5 class="font-bold text-sm"><i class="fa-solid fa-calendar-days"></i> Notice of Postponement</h5>
        </a>
        
        <a class="tab-card1 <?= ($current_page == '03_bac4') ? 'active' : '' ?>" href="./03_bac4">
            <h5 class="font-bold text-sm"><i class="fa-solid fa-medal"></i> Post-award Information</h5>
        </a>
        
        <a class="tab-card1 mb-4 <?= ($current_page == '03_bac5') ? 'active' : '' ?>" href="./03_bac5">
            <h5 class="font-bold text-sm"><i class="fa-solid fa-box-archive"></i> Archives</h5>
        </a>

        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-700 to-[#1a589e] text-white shadow-xs p-4 mb-4" style="transform: translateZ(0); -webkit-mask-image: -webkit-radial-gradient(white, black);">
            <div class="absolute right-0 bottom-0 opacity-10 pointer-events-none translate-x-2 translate-y-2">
                <i class="fa-solid fa-bullhorn text-7xl"></i>
            </div>
            
            <div class="relative z-10 flex flex-col gap-2.5">
                <h5 class="text-xs font-black uppercase tracking-wider text-center flex items-center justify-center gap-2">
                    <i class="fa-solid fa-envelope-open-text text-sm"></i>
                    <span>For BAC Inquiries</span>
                </h5>
                
                <div class="text-white/90 text-[11px] leading-relaxed space-y-2">
                    <p class="font-bold text-center text-white text-xs">You may contact the following:</p>
                    
                    <div class="text-center font-black text-blue-100 bg-white/10 py-1.5 px-2 rounded-lg border border-white/10">
                        Rolando M. Pizarra <br> Beverly Joy B. Acierto
                        <div class="text-[9px] font-medium text-white/70 italic mt-0.5">BAC Secretariats</div>
                    </div>
                    
                    <div class="space-y-1 bg-slate-900/10 p-2 rounded-lg border border-black/5">
                        <div class="flex items-start gap-1.5">
                            <i class="fa-solid fa-phone text-blue-200 mt-0.5 shrink-0"></i>
                            <span><strong class="text-white">Lines:</strong> (049) 545-1614 <br> loc. 213</span>
                        </div>
                        <div class="flex items-center gap-1.5 pt-1 border-t border-white/10">
                            <i class="fa-solid fa-envelope text-blue-200 shrink-0"></i>
                            <span><strong class="text-white">Email:</strong> cwdbac2025@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </nav>
</div>



