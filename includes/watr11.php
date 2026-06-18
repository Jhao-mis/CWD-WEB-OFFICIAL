<?php
/**

WATER TARIFF SCHEDULE

Professional Government-style Responsive Implementation

Pattern: Desktop (Grid Table) | Mobile (Stacked Structured Cards)
*/
?>

<style>
.glass-card {
background: #ffffff;
border-radius: 1rem;
box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
overflow: hidden;
border: 1px solid #e2e8f0;
}

/* Desktop Table Styles */
.tariff-table {
    font-variant-numeric: tabular-nums;
    border-spacing: 0;
    width: 100%;
    min-width: 900px;
}

.header-blue {
    background: #1e3a8a; /* Official Gov Blue */
    color: white;
}

.sticky-col {
    position: sticky;
    left: 0;
    background: white;
    z-index: 10;
    border-right: 2px solid #f1f5f9;
    width: 280px;
}

tr:hover .sticky-col {
    background: #f8fafc;
}

/* Responsive Logic: Switch at 1024px */
@media (max-width: 1023px) {
    .desktop-view { display: none; }
    .mobile-view { display: block; }
}

@media (min-width: 1024px) {
    .desktop-view { display: block; }
    .mobile-view { display: none; }
}

/* Mobile Card Styles */
.tariff-card {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 1rem;
    margin-bottom: 1.5rem;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
}

.card-header {
    background: #f8fafc;
    padding: 1.25rem;
    border-bottom: 1px solid #e2e8f0;
}

.card-body { padding: 1rem; }

.data-row {
    display: flex;
    justify-content: space-between;
    padding: 0.6rem 0;
    border-bottom: 1px dashed #f1f5f9;
    align-items: center;
}

.data-row:last-child { border-bottom: none; }

.label-tag {
    font-size: 0.7rem;
    font-weight: 800;
    text-transform: uppercase;
    color: #64748b;
}

.value-amt {
    font-weight: 700;
    color: #1e293b;
    font-family: ui-monospace, SFMono-Regular, monospace;
}

.exclusive-val {
    color: #2563eb;
    font-size: 0.85rem;
}

.cat-divider {
    background: #eff6ff;
    padding: 0.35rem 0.75rem;
    font-size: 0.65rem;
    font-weight: 900;
    text-transform: uppercase;
    color: #1e40af;
    margin-top: 0.75rem;
    border-radius: 4px;
}


</style>

<div class="max-w-7xl mx-auto px-4 py-10 space-y-12">

<!-- Main Header -->
<div class="text-center space-y-3">
    <h1 class="text-4xl md:text-5xl font-black text-[#1e3a8a] uppercase tracking-tight">
        Schedule of <span class="text-blue-600">Water Rates</span>
    </h1>
    <p class="text-slate-500 font-medium max-w-2xl mx-auto text-sm md:text-base">
        Verified monthly consumption charges based on connection type and meter size. Values in blue parentheses apply to exclusive areas.
    </p>
</div>

<!-- 🖥️ DESKTOP VIEW (Standard Table) -->
<div class="desktop-view glass-card">
    <div class="overflow-x-auto">
        <table class="tariff-table text-left">
            <thead>
                <tr class="header-blue">
                    <th rowspan="2" class="sticky-col bg-[#1e3a8a] px-6 py-6 text-xs font-bold uppercase tracking-widest">Classification & Size</th>
                    <th rowspan="2" class="px-4 py-6 text-center text-[10px] font-black uppercase tracking-widest border-l border-white/10">Min. Charge (0-10m³)</th>
                    <th colspan="4" class="px-4 py-3 text-center text-[10px] font-black uppercase tracking-widest border-l border-white/10 bg-blue-900/40">Commodity Charges (per m³)</th>
                </tr>
                <tr class="bg-blue-900 text-white border-t border-white/10">
                    <th class="px-4 py-3 text-center text-[9px] font-bold uppercase border-l">11-20 m³</th>
                    <th class="px-4 py-3 text-center text-[9px] font-bold uppercase border-l">21-30 m³</th>
                    <th class="px-4 py-3 text-center text-[9px] font-bold uppercase border-l">31-40 m³</th>
                    <th class="px-4 py-3 text-center text-[9px] font-bold uppercase border-l">41-up m³</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white">
                <?php
                $tariffs = [
                    ["Domestic/Government", "1/2\"", "183.00 (154.00)", "20.30 (16.20)", "24.05 (19.20)", "30.80 (24.60)", "36.45 (29.20)"],
                    ["Domestic/Government", "3/4\"", "292.80 (246.40)", "20.30 (16.20)", "24.05 (19.20)", "30.80 (24.60)", "36.45 (29.20)"],
                    ["Domestic/Government", "1\"", "585.60 (492.80)", "20.30 (16.20)", "24.05 (19.20)", "30.80 (24.60)", "36.45 (29.20)"],
                    ["Commercial", "1/2\"", "366.00", "40.60", "48.10", "61.60", "72.90"],
                    ["Commercial", "3/4\"", "585.60", "40.60", "48.10", "61.60", "72.90"],
                    ["Commercial", "1\"", "1,171.20", "40.60", "48.10", "61.60", "72.90"],
                    ["Commercial A", "1/2\"", "320.25", "35.50", "42.05", "53.90", "63.75"],
                    ["Commercial B", "1/2\"", "274.50", "30.45", "36.05", "46.20", "54.65"]
                ];

                foreach ($tariffs as $t): ?>
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="sticky-col px-6 py-5">
                        <div class="font-bold text-slate-800 text-sm"><?php echo $t[0]; ?></div>
                        <div class="text-[10px] text-blue-600 font-mono font-bold"><?php echo $t[1]; ?> Meter</div>
                    </td>
                    <td class="px-4 py-5 text-center text-sm border-l font-bold text-slate-900"><?php echo $t[2]; ?></td>
                    <td class="px-4 py-5 text-center text-sm border-l"><?php echo $t[3]; ?></td>
                    <td class="px-4 py-5 text-center text-sm border-l"><?php echo $t[4]; ?></td>
                    <td class="px-4 py-5 text-center text-sm border-l"><?php echo $t[5]; ?></td>
                    <td class="px-4 py-5 text-center text-sm border-l"><?php echo $t[6]; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- 📱 MOBILE VIEW (Structured Cards) -->
<div class="mobile-view">
    <?php foreach ($tariffs as $t): ?>
    <div class="tariff-card">
        <div class="card-header flex justify-between items-center">
            <div>
                <h3 class="font-black text-slate-800 uppercase tracking-tight text-sm"><?php echo $t[0]; ?></h3>
                <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded border border-blue-100"><?php echo $t[1]; ?> METER</span>
            </div>
        </div>
        <div class="card-body">
            <div class="data-row">
                <span class="label-tag">Min. Charge (0-10m³)</span>
                <span class="value-amt"><?php echo $t[2]; ?></span>
            </div>
            <div class="cat-divider">Commodity Charges (per m³)</div>
            <div class="data-row">
                <span class="label-tag">11 - 20 m³</span>
                <span class="value-amt"><?php echo $t[3]; ?></span>
            </div>
            <div class="data-row">
                <span class="label-tag">21 - 30 m³</span>
                <span class="value-amt"><?php echo $t[4]; ?></span>
            </div>
            <div class="data-row">
                <span class="label-tag">31 - 40 m³</span>
                <span class="value-amt"><?php echo $t[5]; ?></span>
            </div>
            <div class="data-row">
                <span class="label-tag">41 m³ - Up</span>
                <span class="value-amt"><?php echo $t[6]; ?></span>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Enhanced Information Grid -->
<div class="bg-slate-900 text-slate-400 rounded-2xl p-8 space-y-8 border border-slate-800">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <div class="space-y-3">
            <div class="flex items-center gap-2 text-white font-bold uppercase text-[10px] tracking-widest border-b border-slate-700 pb-2">
                <i class="fa-solid fa-clock-rotate-left text-blue-400"></i>
                Billing Cycle
            </div>
            <p class="text-xs leading-relaxed">Meters are read monthly. Unpaid bills after the due date are subject to additional <strong>"late payment" fees</strong> and potential service interruption.</p>
        </div>
        <div class="space-y-3">
            <div class="flex items-center gap-2 text-white font-bold uppercase text-[10px] tracking-widest border-b border-slate-700 pb-2">
                <i class="fa-solid fa-house-chimney-window text-blue-400"></i>
                Exclusive Pricing
            </div>
            <p class="text-xs leading-relaxed">Figures in <strong>blue parentheses</strong> indicate tariffs for NHA (National Housing Authority) areas, VLP (Villa La Prinza), VPB (Villa Palao, Banlic), and Major Homes.</p>
        </div>
        <div class="space-y-3">
            <div class="flex items-center gap-2 text-white font-bold uppercase text-[10px] tracking-widest border-b border-slate-700 pb-2">
                <i class="fa-solid fa-wrench text-blue-400"></i>
                Maintenance
            </div>
            <p class="text-xs leading-relaxed">Consumers are responsible for leaks occurring after the meter. Please report main line bursts immediately to our <strong>24/7 maintenance hotline</strong>.</p>
        </div>
    </div>
    
    <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
        <div class="text-[10px] font-bold tracking-[0.2em] uppercase text-slate-500">
            Calamba Water District • Public Information Office
        </div>
        <div class="flex items-center gap-4">
            <span class="px-3 py-1 bg-blue-500/10 border border-blue-500/20 rounded text-blue-400 text-[9px] font-bold uppercase tracking-widest">
                Official Tariff 2010 (Adjusted)
            </span>
        </div>
    </div>
</div>


</div>