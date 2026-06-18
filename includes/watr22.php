<?php
/*

SCHEDULE OF FINES & PENALTIES

Professional Government-style Responsive Implementation

Pattern: Desktop (Grid Table) | Mobile (Stacked Structured Cards)
*/
?>

<style>
/* Base Container & Glass Effect */
.glass-panel {
background: rgba(255, 255, 255, 0.95);
backdrop-filter: blur(10px);
}

.table-container {
    border-radius: 0.75rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    border: 1px solid #e2e8f0;
    overflow: hidden;
}

/* Desktop Table Styles */
.penalty-table {
    font-variant-numeric: tabular-nums;
    border-spacing: 0;
    width: 100%;
    min-width: 900px;
}

.offense-header {
    background: #1e3a8a; /* Gov Blue */
    color: white;
}

.sticky-col {
    position: sticky;
    left: 0;
    background: white;
    z-index: 10;
    border-right: 1px solid #e2e8f0;
    width: 320px;
}

tr:hover .sticky-col {
    background: #f8fafc;
}

/* Responsive Logic */
@media (max-width: 1024px) {
    .desktop-table-view {
        display: none;
    }
    .mobile-cards-view {
        display: block;
    }
}

@media (min-width: 1025px) {
    .desktop-table-view {
        display: block;
    }
    .mobile-cards-view {
        display: none;
    }
}

/* Mobile Card Styles */
.violation-card {
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

.card-body {
    padding: 1rem;
}

.rate-row {
    display: flex;
    justify-content: space-between;
    padding: 0.6rem 0;
    border-bottom: 1px dashed #f1f5f9;
    align-items: center;
}

.rate-row:last-child {
    border-bottom: none;
}

.label-tag {
    font-size: 0.7rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #64748b;
}

.value-amt {
    font-weight: 700;
    color: #1e293b;
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
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

<div class="max-w-7xl mx-auto px-4 py-8">
<!-- Header Section -->
<div class="mb-8 border-l-4 border-blue-600 pl-6">
<h2 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight uppercase">
Schedule of <span class="text-blue-600">Fines & Penalties</span>
</h2>
<p class="text-slate-500 font-medium text-sm mt-1">
Official Table of Sanctions for Water Utility Violations
</p>
</div>

<!-- 🖥️ DESKTOP VIEW -->
<div class="desktop-table-view table-container glass-panel">
    <div class="overflow-x-auto">
        <table class="penalty-table text-left">
            <thead>
                <tr class="offense-header">
                    <th rowspan="2" class="sticky-col bg-[#1e3a8a] px-6 py-4 text-xs font-bold uppercase tracking-wider">Classification of Offenses</th>
                    <th colspan="3" class="px-4 py-3 text-center text-[10px] font-black uppercase tracking-widest border-l border-white/10 bg-blue-900/40">Residential / Government</th>
                    <th colspan="3" class="px-4 py-3 text-center text-[10px] font-black uppercase tracking-widest border-l border-white/10">Commercial / Industrial</th>
                    <th colspan="3" class="px-4 py-3 text-center text-[10px] font-black uppercase tracking-widest border-l border-white/10 bg-blue-900/40 text-blue-200">Commercial A / B</th>
                </tr>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-500">
                    <th class="px-3 py-2 text-center text-[9px] font-bold uppercase border-l">1st</th>
                    <th class="px-3 py-2 text-center text-[9px] font-bold uppercase border-l">2nd</th>
                    <th class="px-3 py-2 text-center text-[9px] font-bold uppercase border-l">3rd</th>
                    <th class="px-3 py-2 text-center text-[9px] font-bold uppercase border-l">1st</th>
                    <th class="px-3 py-2 text-center text-[9px] font-bold uppercase border-l">2nd</th>
                    <th class="px-3 py-2 text-center text-[9px] font-bold uppercase border-l">3rd</th>
                    <th class="px-3 py-2 text-center text-[9px] font-bold uppercase border-l">1st</th>
                    <th class="px-3 py-2 text-center text-[9px] font-bold uppercase border-l">2nd</th>
                    <th class="px-3 py-2 text-center text-[9px] font-bold uppercase border-l">3rd</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white">
                <?php
                $data = [
                    ["Illegal Connection", "Direct tapping before water meter", "₱ 2,500", "₱ 5,000", "₱ 7,500", "₱ 5,000", "₱ 10,000", "₱ 15,000", "₱ 7,500", "₱ 15,000", "₱ 22,500"],
                    ["Meter Tampering", "Broken seals, magnets, etc.", "₱ 2,000", "₱ 4,000", "₱ 6,000", "₱ 4,000", "₱ 8,000", "₱ 12,000", "₱ 6,000", "₱ 12,000", "₱ 18,000"],
                    ["Unauthorized Reconnection", "Self-opening after disconnection", "₱ 1,500", "₱ 3,000", "₱ 4,500", "₱ 3,000", "₱ 6,000", "₱ 9,000", "₱ 4,500", "₱ 9,000", "₱ 13,500"],
                    ["Selling Water", "Distributing water without permit", "₱ 3,000", "₱ 6,000", "₱ 9,000", "₱ 6,000", "₱ 12,000", "₱ 18,000", "₱ 9,000", "₱ 18,000", "₱ 27,000"],
                    ["Use of Boosters", "Pumps without cistern tanks", "₱ 1,000", "₱ 2,000", "₱ 3,000", "₱ 2,000", "₱ 4,000", "₱ 6,000", "₱ 3,000", "₱ 6,000", "₱ 9,000"],
                    ["Sub-connecting", "Extending lines to other households", "₱ 500", "₱ 1,000", "₱ 1,500", "₱ 1,000", "₱ 2,000", "₱ 3,000", "₱ 1,500", "₱ 3,000", "₱ 4,500"],
                    ["Obstruction of Meter", "Building structures over meter", "₱ 200", "₱ 400", "₱ 600", "₱ 400", "₱ 800", "₱ 1,200", "₱ 600", "₱ 1,200", "₱ 1,800"],
                    ["Damaging Assets", "Intentional damage to pipes/valves", "₱ 5,000", "₱ 10,000", "₱ 15,000", "₱ 10,000", "₱ 20,000", "₱ 30,000", "₱ 15,000", "₱ 30,000", "₱ 45,000"],
                    ["Bypassing Meter", "Use of jump/bypass pipes", "₱ 8,000", "₱ 16,000", "₱ 24,000", "₱ 12,000", "₱ 24,000", "₱ 36,000", "₱ 24,000", "₱ 48,000", "₱ 72,000"]
                ];

                foreach ($data as $row): ?>
                    <tr class="hover:bg-blue-50/30 transition-colors">
                        <td class="sticky-col px-6 py-4">
                            <div class="font-bold text-slate-800 text-sm"><?php echo $row[0]; ?></div>
                            <div class="text-[10px] text-slate-400 leading-tight"><?php echo $row[1]; ?></div>
                        </td>
                        <td class="px-3 py-4 text-center text-sm border-l"><?php echo $row[2]; ?></td>
                        <td class="px-3 py-4 text-center text-sm border-l text-slate-500"><?php echo $row[3]; ?></td>
                        <td class="px-3 py-4 text-center text-sm border-l text-slate-400"><?php echo $row[4]; ?></td>
                        <td class="px-3 py-4 text-center text-sm border-l font-medium"><?php echo $row[5]; ?></td>
                        <td class="px-3 py-4 text-center text-sm border-l text-slate-500"><?php echo $row[6]; ?></td>
                        <td class="px-3 py-4 text-center text-sm border-l text-slate-400"><?php echo $row[7]; ?></td>
                        <td class="px-3 py-4 text-center text-sm border-l font-bold text-blue-700"><?php echo $row[8]; ?></td>
                        <td class="px-3 py-4 text-center text-sm border-l text-blue-500"><?php echo $row[9]; ?></td>
                        <td class="px-3 py-4 text-center text-sm border-l text-blue-400"><?php echo $row[10]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- 📱 MOBILE VIEW (Stacked Cards) -->
<div class="mobile-cards-view">
    <?php foreach ($data as $row): ?>
        <div class="violation-card">
            <div class="card-header">
                <h3 class="font-black text-slate-800 uppercase tracking-tight text-base"><?php echo $row[0]; ?></h3>
                <p class="text-[11px] text-slate-500 mt-1"><?php echo $row[1]; ?></p>
            </div>
            <div class="card-body">
                <!-- Res/Gov -->
                <div class="cat-divider">Residential / Government</div>
                <div class="rate-row"><span class="label-tag">1st Offense</span><span class="value-amt"><?php echo $row[2]; ?></span></div>
                <div class="rate-row"><span class="label-tag">2nd Offense</span><span class="value-amt"><?php echo $row[3]; ?></span></div>
                <div class="rate-row"><span class="label-tag">3rd Offense</span><span class="value-amt"><?php echo $row[4]; ?></span></div>
                
                <!-- Comm/Ind -->
                <div class="cat-divider">Commercial / Industrial</div>
                <div class="rate-row"><span class="label-tag">1st Offense</span><span class="value-amt"><?php echo $row[5]; ?></span></div>
                <div class="rate-row"><span class="label-tag">2nd Offense</span><span class="value-amt"><?php echo $row[6]; ?></span></div>
                <div class="rate-row"><span class="label-tag">3rd Offense</span><span class="value-amt"><?php echo $row[7]; ?></span></div>
                
                <!-- Comm A/B -->
                <div class="cat-divider bg-blue-100 text-blue-800">Commercial A / B</div>
                <div class="rate-row"><span class="label-tag text-blue-600">1st Offense</span><span class="value-amt text-blue-700"><?php echo $row[8]; ?></span></div>
                <div class="rate-row"><span class="label-tag text-blue-400">2nd Offense</span><span class="value-amt text-blue-500"><?php echo $row[9]; ?></span></div>
                <div class="rate-row"><span class="label-tag text-blue-300">3rd Offense</span><span class="value-amt text-blue-400"><?php echo $row[10]; ?></span></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Legal Compliance Section -->
<div class="mt-8 p-6 rounded-xl bg-slate-900 border border-slate-800">
    <div class="flex flex-col md:flex-row justify-between gap-6">
        <div class="max-w-xl">
            <div class="flex items-center gap-2 text-blue-400 font-bold uppercase text-[10px] tracking-widest mb-2">
                <i class="fa-solid fa-gavel"></i>
                Statutory Enforcement
            </div>
            <p class="text-xs text-slate-400 leading-relaxed">
                Penalties are strictly enforced under <strong>Presidential Decree No. 401</strong> as amended by <strong>Batas Pambansa Blg. 876</strong>. Unauthorized water usage or meter manipulation constitutes theft of service and may lead to criminal prosecution.
            </p>
        </div>
        <div class="flex flex-col items-end justify-center">
            <span class="text-[9px] text-slate-500 italic">Version: 2023.10-CWD-REV</span>
            <div class="mt-2 px-3 py-1 bg-blue-600/10 border border-blue-600/20 rounded text-blue-400 text-[10px] font-bold uppercase tracking-tighter">
                Verified Official Rate
            </div>
        </div>
    </div>
</div>


</div>