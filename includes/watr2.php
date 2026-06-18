<style>
    .glass-panel {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(12px);
    }

    .table-container {
        border-radius: 1rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, .1),
            0 2px 4px -1px rgba(0, 0, 0, .06);
        overflow: hidden;
        width: 100%;
    }

    /* ✅ Proper mobile scrolling */
    .table-container .overflow-x-auto {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    table {
        font-variant-numeric: tabular-nums;
        border-spacing: 0;
        width: 100%;
        min-width: 900px;
    }

    /* ===== Sticky column (DESKTOP ONLY) ===== */
    .sticky-col {
        position: sticky;
        left: 0;
        background: white;
        z-index: 10;
        box-shadow: 4px 0 6px -4px rgba(0, 0, 0, 0.1);
    }

    tr:hover .sticky-col {
        background: #f1f5f9;
    }

    .offense-header {
        background: #1e3a8a;
        color: white;
    }

    .tier-badge {
        font-size: 0.65rem;
        letter-spacing: 0.05em;
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
        background: #e2e8f0;
        color: #475569;
    }

    /* ===============================
       ✅ MOBILE FIX
       Disable sticky column on small screens
       =============================== */
    @media (max-width: 768px) {

        table {
            min-width: 720px;
            /* easier swipe width */
        }

        .sticky-col {
            position: relative;
            /* removes overlay bug */
            left: auto;
            box-shadow: none;
        }
    }

    /* Optional: smoother scrolling feel */
    @media (max-width: 640px) {
        .overflow-x-auto {
            scroll-behavior: smooth;
        }
    }
</style>




<div class="max-w-6xl mx-auto glass-panel rounded-3xl p-6 md:p-10">

    <!-- Header -->
    <header class="mb-10 text-center relative">

        <h1 class="text-4xl font-black text-[#1a589e] uppercase tracking-tight text-center mt-8 mb-8">Violations &
            Penalties</h1>
        <p class="text-slate-500 max-w-xl mx-auto font-semibold leading-relaxed">
            Summary of administrative fines and penalties applicable to service violations and meter tampering.
        </p>
    </header>

    <!-- Main Table Container -->

    <!-- OFFENSES AND PENALTIES TABLE -->
    <div class="glass-card">
        <!-- Header Section -->
        <div class="section-header bg-blue-900">
            <div>
                <h2 class="text-xl font-bold uppercase tracking-wide text-white">Nature of Offenses & Penalties</h2>
                <p class="text-blue-100 text-sm">Fines and charges for illegal activities and meter tampering</p>
            </div>
            <div class="hidden sm:flex items-center ml-auto">
                <i class="fas fa-gavel text-3xl text-white opacity-30"></i>
            </div>
        </div>

        <!-- 1. DESKTOP VIEW: Full Comparison Table (Visible on lg screens up) -->
        <div class="hidden lg:block overflow-x-auto custom-scrollbar">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="text-white">
                        <th class="px-6 py-5 font-bold uppercase tracking-wider sticky-col !bg-blue-900 border-b border-blue-800"
                            style="min-width: 280px;">Nature of Offense</th>
                        <th colspan="3"
                            class="px-6 py-5 text-center font-bold uppercase tracking-wider border-l border-blue-800 bg-blue-800/50">
                            Residential</th>
                        <th colspan="3" class="px-6 py-5 text-center font-bold uppercase tracking-wider bg-blue-950/30">
                            Commercial</th>
                    </tr>
                    <tr class="bg-slate-100 text-slate-500 text-[11px] font-bold uppercase">
                        <th class="px-6 py-3 border-b border-slate-200 sticky-col bg-slate-100">Details</th>
                        <th class="px-4 py-3 border-b border-l border-slate-200 text-center">1st</th>
                        <th class="px-4 py-3 border-b border-l border-slate-200 text-center">2nd</th>
                        <th class="px-4 py-3 border-b border-l border-slate-200 text-center">3rd</th>
                        <th class="px-4 py-3 border-b border-l border-slate-200 text-center">1st</th>
                        <th class="px-4 py-3 border-b border-l border-slate-200 text-center">2nd</th>
                        <th class="px-4 py-3 border-b border-slate-200 text-center border-l">3rd</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php
                    $offenses = [
                        ["title" => "Illegal Transfer of Meter", "res" => ["2,000", "4,000", "8,000"], "com" => ["4,000", "8,000", "16,000"], "tag" => ""],
                        ["title" => "Illegal Tapping of Meter", "res" => ["6,000", "12,000", "18,000"], "com" => ["12,000", "24,000", "36,000"], "tag" => "*(After Disconnection)"],
                        ["title" => "Tapping of Meter Seal", "res" => ["6,000", "12,000", "18,000"], "com" => ["12,000", "24,000", "36,000"], "tag" => "*(After Disconnection)"],
                        ["title" => "Padlock Tampering", "res" => ["6,000", "12,000", "18,000"], "com" => ["12,000", "24,000", "36,000"], "tag" => "*(After Disconnection)"],
                        "HEADER" => "Meter Tampering Category",
                        ["title" => "Cutting off vane wheel", "res" => ["6,000", "12,000", "18,000"], "com" => ["12,000", "24,000", "36,000"], "tag" => ""],
                        ["title" => "Magnet Installation", "res" => ["6,000", "8,000", "12,000"], "com" => ["12,000", "16,000", "24,000"], "tag" => ""],
                        ["title" => "Pin insertion (Lens to Star)", "res" => ["6,000", "12,000", "18,000"], "com" => ["12,000", "24,000", "36,000"], "tag" => ""],
                        ["title" => "Wire insertion to vane wheel", "res" => ["6,000", "12,000", "18,000"], "com" => ["12,000", "24,000", "36,000"], "tag" => ""],
                        ["title" => "By-pass Connection", "res" => ["12,000", "24,000", "36,000"], "com" => ["24,000", "48,000", "72,000"], "tag" => "High Severity", "highlight" => true],
                        ["title" => "Inverted Meter", "res" => ["12,000", "24,000", "36,000"], "com" => ["24,000", "48,000", "72,000"], "tag" => "High Severity", "highlight" => true],
                        ["title" => "Illegal Tapping", "res" => ["12,000", "24,000", "36,000"], "com" => ["24,000", "48,000", "72,000"], "tag" => "High Severity", "highlight" => true],
                    ];

                    foreach ($offenses as $key => $o):
                        if ($key === "HEADER"): ?>
                            <tr class="bg-red-50">
                                <td colspan="7"
                                    class="px-6 py-3 text-[11px] font-black text-red-700 uppercase tracking-[0.2em] text-center border-y border-red-100">
                                    <?php echo $o; ?>
                                </td>
                            </tr>
                            <?php continue; endif; ?>
                        <tr
                            class="group hover:bg-slate-50 transition-colors <?php echo isset($o['highlight']) ? 'bg-blue-50/20' : ''; ?>">
                            <td
                                class="px-6 py-4 sticky-col <?php echo isset($o['highlight']) ? 'bg-blue-50/20' : 'bg-white'; ?> group-hover:bg-slate-50">
                                <div class="font-bold text-slate-700 text-sm">
                                    <?php echo $o['title']; ?>
                                </div>
                                <?php if ($o['tag']): ?>
                                    <span class="text-[10px] text-emerald-600 italic font-medium">
                                        <?php echo $o['tag']; ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-4 text-center text-sm font-semibold border-l text-blue-600">₱
                                <?php echo $o['res'][0]; ?>
                            </td>
                            <td class="px-4 py-4 text-center text-sm border-l">₱
                                <?php echo $o['res'][1]; ?>
                            </td>
                            <td class="px-4 py-4 text-center text-sm border-l">₱
                                <?php echo $o['res'][2]; ?>
                            </td>
                            <td class="px-4 py-4 text-center text-sm border-l font-semibold text-slate-700">₱
                                <?php echo $o['com'][0]; ?>
                            </td>
                            <td class="px-4 py-4 text-center text-sm border-l">₱
                                <?php echo $o['com'][1]; ?>
                            </td>
                            <td class="px-4 py-4 text-center text-sm border-l">₱
                                <?php echo $o['com'][2]; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- 2. MOBILE VIEW: Horizontal Scrolling Cards (Visible below lg) -->
        <div class="lg:hidden divide-y divide-slate-100">
            <?php foreach ($offenses as $key => $o):
                if ($key === "HEADER"): ?>
                    <div class="bg-red-50 px-6 py-3 text-[10px] font-black text-red-700 uppercase tracking-widest text-center">
                        <?php echo $o; ?>
                    </div>
                    <?php continue; endif; ?>

                <div class="p-5 space-y-4">
                    <div class="flex flex-col">
                        <h3 class="font-black text-slate-800 text-sm leading-tight uppercase tracking-tight">
                            <?php echo $o['title']; ?>
                        </h3>
                        <?php if ($o['tag']): ?>
                            <span class="text-[10px] text-emerald-600 italic mt-0.5">
                                <?php echo $o['tag']; ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <!-- Horizontal Scroll Container for Penalty Types -->
                    <div class="flex gap-4 overflow-x-auto pb-2 custom-scrollbar -mx-1 px-1">

                        <!-- Residential Column (Wider for legibility) -->
                        <div
                            class="min-w-[280px] border border-blue-100 rounded-xl overflow-hidden shadow-sm flex-shrink-0">
                            <div class="bg-blue-600 text-white text-[10px] font-bold uppercase px-3 py-1.5 text-center">
                                Residential Penalties
                            </div>
                            <div class="grid grid-cols-3 divide-x divide-blue-50 text-center bg-blue-50/30">
                                <div class="p-3">
                                    <p class="text-[9px] text-slate-400 uppercase font-bold mb-1">1st</p>
                                    <p class="text-sm font-black text-blue-700 whitespace-nowrap">₱
                                        <?php echo $o['res'][0]; ?>
                                    </p>
                                </div>
                                <div class="p-3">
                                    <p class="text-[9px] text-slate-400 uppercase font-bold mb-1">2nd</p>
                                    <p class="text-sm font-bold text-slate-600 whitespace-nowrap">₱
                                        <?php echo $o['res'][1]; ?>
                                    </p>
                                </div>
                                <div class="p-3">
                                    <p class="text-[9px] text-slate-400 uppercase font-bold mb-1">3rd</p>
                                    <p class="text-sm font-bold text-slate-600 whitespace-nowrap">₱
                                        <?php echo $o['res'][2]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Commercial Column (Wider for legibility) -->
                        <div
                            class="min-w-[280px] border border-slate-200 rounded-xl overflow-hidden shadow-sm flex-shrink-0">
                            <div class="bg-slate-800 text-white text-[10px] font-bold uppercase px-3 py-1.5 text-center">
                                Commercial Penalties
                            </div>
                            <div class="grid grid-cols-3 divide-x divide-slate-100 text-center">
                                <div class="p-3">
                                    <p class="text-[9px] text-slate-400 uppercase font-bold mb-1">1st</p>
                                    <p class="text-sm font-black text-slate-800 whitespace-nowrap">₱
                                        <?php echo $o['com'][0]; ?>
                                    </p>
                                </div>
                                <div class="p-3">
                                    <p class="text-[9px] text-slate-400 uppercase font-bold mb-1">2nd</p>
                                    <p class="text-sm font-bold text-slate-600 whitespace-nowrap">₱
                                        <?php echo $o['com'][1]; ?>
                                    </p>
                                </div>
                                <div class="p-3">
                                    <p class="text-[9px] text-slate-400 uppercase font-bold mb-1">3rd</p>
                                    <p class="text-sm font-bold text-slate-600 whitespace-nowrap">₱
                                        <?php echo $o['com'][2]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Visual cue for scrolling -->
                    <div class="flex justify-center lg:hidden">
                        <div class="flex gap-1">
                            <div class="w-8 h-1 bg-slate-200 rounded-full"></div>
                            <div class="w-2 h-1 bg-slate-100 rounded-full"></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="border-t border-slate-50 p-2">
                <span class="text-sm text-slate-600 ml-4"><strong class="mr-2 text-blue-900">
                        <i class="fa-solid fa-arrows-left-right-to-line"></i></strong> Scroll to the left & right<br>
                    <p class="ml-4"> to see all penalties.</p>
                </span>
            </div>

        </div>
    </div>


    <!-- Footer / Notes -->
    <footer class="mt-8 flex flex-col md:flex-row justify-between items-center gap-4 bg-white">
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-1.5">
                <span class="w-3 h-3 rounded-full bg-blue-600"></span>
                <span class="text-[10px] font-bold text-slate-600 uppercase tracking-wider">Primary Rate</span>
            </div>
            <div class="flex items-center gap-1.5">
                <span class="w-3 h-3 rounded-full bg-red-500"></span>
                <span class="text-[10px] font-bold text-slate-600 uppercase tracking-wider">High Violation</span>
            </div>
        </div>
        <div class="text-right">
            <p class="text-xs font-bold text-slate-400 italic">* <strong class="text-blue-900">₱</strong> All figures in
                Philippine Peso.</p>
        </div>
    </footer>

</div>