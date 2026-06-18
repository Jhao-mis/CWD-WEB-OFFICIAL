<style>
    .glass-card {
        background: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        overflow: hidden;
        border: 1px solid #e2e8f0;
    }

    .table-sticky-col {
        position: sticky;
        left: 0;
        background-color: inherit;
        z-index: 10;
    }

    .section-header {
        padding: 1.5rem;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .custom-scrollbar::-webkit-scrollbar {
        height: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }
</style>



<div class="max-w-6xl mx-auto space-y-10">

    <!-- Main Header -->
    <div class="text-center space-y-3">

        <h1 class="text-5xl font-black text-[#1a589e] uppercase tracking-wide text-center mt-8 mb-8">WATER RATES</h1>
        <p class="text-slate-500 font-semibold">Effective Date: <span class="text-slate-900">July 2010</span> • All
            figures in <span class="text-slate-900">Philippine Peso (PHP)</span></p>
    </div>

    <!-- CATEGORY A: RESIDENTIAL / GOVERNMENT -->
    <div class="glass-card">
        <!-- Header Section -->
        <div class="section-header bg-blue-700">
            <div>
                <h2 class="text-xl font-bold uppercase tracking-wide">Category A: Residential / Government</h2>
                <p class="text-blue-100 text-sm">Domestic households and government institutions</p>
            </div>
            <div class="hidden sm:flex gap-[15px] items-center ml-auto">
                <i class="fas fa-house-chimney text-2xl text-white opacity-30"></i>
                <i class="fas fa-building-columns text-2xl text-white opacity-30"></i>
            </div>
        </div>

        <!-- 1. DESKTOP VIEW: Standard Table (Hidden on Mobile) -->
        <div class="hidden md:block overflow-x-auto custom-scrollbar">
            <table class="w-full text-sm text-left border-collapse">
                <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold">
                    <tr>
                        <th class="px-6 py-4 table-sticky-col bg-slate-50">METER SIZE</th>
                        <th class="px-6 py-4">MIN. CHARGE (10m³)</th>
                        <th class="px-4 py-4 text-center">11-20 m³</th>
                        <th class="px-4 py-4 text-center">21-30 m³</th>
                        <th class="px-4 py-4 text-center">31-40 m³</th>
                        <th class="px-4 py-4 text-center text-blue-700">41+ m³</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <!-- Data Row 1/2" -->
                    <tr>
                        <td class="px-6 py-4 font-bold text-blue-900 table-sticky-col">1/2"</td>
                        <td class="px-6 py-4 font-semibold">₱ 183.00</td>
                        <td class="text-center border-l border-r" rowspan="5">
                            <span class="block font-bold">₱ 20.30</span>
                            <span class="text-xs text-slate-500">(₱ 16.20)</span>
                        </td>
                        <td class="text-center border-l border-r" rowspan="5">
                            <span class="block font-bold">₱ 24.05</span>
                            <span class="text-xs text-slate-500">(₱ 19.20)</span>
                        </td>
                        <td class="text-center border-l border-r" rowspan="5">
                            <span class="block font-bold">₱ 30.80</span>
                            <span class="text-xs text-slate-500">(₱ 24.60)</span>
                        </td>
                        <td class="text-center font-bold text-blue-600 border-l border-r bg-blue-50/30" rowspan="5">
                            <span class="block text-lg">₱ 36.45</span>
                            <span class="text-xs">(₱ 29.20)</span>
                        </td>
                    </tr>
                    <!-- Other Meter Rows -->
                    <tr>
                        <td class="px-6 py-4 font-bold text-blue-900 table-sticky-col">3/4"</td>
                        <td class="px-6 py-4 font-semibold">₱ 292.80</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-bold text-blue-900 table-sticky-col">1"</td>
                        <td class="px-6 py-4 font-semibold">₱ 585.60</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-bold text-blue-900 table-sticky-col">1 1/2"</td>
                        <td class="px-6 py-4 font-semibold">₱ 1,464.00</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-bold text-blue-900 table-sticky-col">2"</td>
                        <td class="px-6 py-4 font-semibold">₱ 3,660.00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- 2. MOBILE VIEW: Stacked Cards (Hidden on Desktop) -->
        <div class="md:hidden divide-y divide-slate-100">
            <!-- Card for each Meter Size -->
            <?php
            $meters = [
                ["size" => "1/2\"", "min" => "183.00"],
                ["size" => "3/4\"", "min" => "292.80"],
                ["size" => "1\"", "min" => "585.60"],
                ["size" => "1 1/2\"", "min" => "1,464"],
                ["size" => "2\"", "min" => "3,660"]
            ];
            foreach ($meters as $m):
                ?>
                <div class="p-5 space-y-4">
                    <!-- Card Header -->
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Meter Size</span>
                        <span
                            class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-black"><?php echo $m['size']; ?></span>
                    </div>

                    <!-- Minimum Charge -->
                    <div class="flex justify-between items-end border-b border-slate-50 pb-2">
                        <span class="text-sm text-slate-600">Minimum <br> Charge (10m³)</span>
                        <span class="text-xl font-bold text-blue-900"> ₱ <?php echo $m['min']; ?></span>
                    </div>

                    <!-- Commodity Charges (Grid) -->
                    <div class="grid grid-cols-2 gap-3 pt-2">
                        <div class="bg-slate-50 p-3 rounded-lg">
                            <p class="text-[10px] uppercase font-bold text-slate-400 mb-1">11-20 m³</p>
                            <p class="font-bold text-slate-700">20.30</p>
                            <p class="text-[10px] text-slate-500">(16.20)</p>
                        </div>
                        <div class="bg-slate-50 p-3 rounded-lg">
                            <p class="text-[10px] uppercase font-bold text-slate-400 mb-1">21-30 m³</p>
                            <p class="font-bold text-slate-700">24.05</p>
                            <p class="text-[10px] text-slate-500">(19.20)</p>
                        </div>
                        <div class="bg-slate-50 p-3 rounded-lg">
                            <p class="text-[10px] uppercase font-bold text-slate-400 mb-1">31-40 m³</p>
                            <p class="font-bold text-slate-700">30.80</p>
                            <p class="text-[10px] text-slate-500">(24.60)</p>
                        </div>
                        <div class="bg-blue-600 p-3 rounded-lg text-white">
                            <p class="text-[10px] uppercase font-bold opacity-80 mb-1">41+ m³</p>
                            <p class="font-bold">36.45</p>
                            <p class="text-[10px] opacity-80">(29.20)</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="border-t border-slate-50 p-2">
                <span class="text-sm text-slate-600 ml-4"><strong class="mr-2 text-blue-700">₱</strong> All figures in
                    Philippine Peso.</span>
            </div>

        </div>
    </div>

    <!-- CATEGORY B: COMMERCIAL / INDUSTRIAL -->
    <div class="glass-card">
        <!-- Header Section -->
        <div class="section-header bg-emerald-700">
            <div>
                <h2 class="text-xl font-bold uppercase tracking-wide">Category B: Commercial / Industrial</h2>
                <p class="text-emerald-100 text-sm">Retail, small businesses, and commercial establishments</p>
            </div>
            <div class="hidden sm:flex gap-[15px] items-center ml-auto">
                <i class="fas fa-store text-2xl text-white opacity-30"></i>
                <i class="fas fa-industry text-2xl text-white opacity-30"></i>
            </div>
        </div>

        <!-- 1. DESKTOP VIEW: Standard Table (Hidden on Mobile) -->
        <div class="hidden md:block overflow-x-auto custom-scrollbar">
            <table class="w-full text-sm text-left border-collapse">
                <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold">
                    <tr>
                        <th class="px-6 py-4 table-sticky-col bg-slate-50">METER SIZE</th>
                        <th class="px-6 py-4">MIN. CHARGE (10m³)</th>
                        <th class="px-4 py-4 text-center">11-20 m³</th>
                        <th class="px-4 py-4 text-center">21-30 m³</th>
                        <th class="px-4 py-4 text-center">31-40 m³</th>
                        <th class="px-4 py-4 text-center text-emerald-700">41+ m³</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr>
                        <td class="px-6 py-4 font-bold text-emerald-900 table-sticky-col">1/2"</td>
                        <td class="px-6 py-4 font-semibold">₱ 366.00</td>
                        <td class="text-center border-l border-r" rowspan="5">
                            <span class="block font-bold">₱ 40.60</span>
                            <span class="text-xs text-slate-500">(₱ 32.40)</span>
                        </td>
                        <td class="text-center border-l border-r" rowspan="5">
                            <span class="block font-bold">₱ 48.10</span>
                            <span class="text-xs text-slate-500">(₱ 38.40)</span>
                        </td>
                        <td class="text-center border-l border-r" rowspan="5">
                            <span class="block font-bold">₱ 61.60</span>
                            <span class="text-xs text-slate-500">(₱ 49.20)</span>
                        </td>
                        <td class="text-center font-bold text-emerald-600 border-l border-r bg-emerald-50/30"
                            rowspan="5">
                            <span class="block text-lg">₱ 72.90</span>
                            <span class="text-xs">(₱ 58.40)</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-bold text-emerald-900 table-sticky-col">3/4"</td>
                        <td class="px-6 py-4 font-semibold">₱ 585.60</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-bold text-emerald-900 table-sticky-col">1"</td>
                        <td class="px-6 py-4 font-semibold">₱ 1,172.20</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-bold text-emerald-900 table-sticky-col">1 1/2"</td>
                        <td class="px-6 py-4 font-semibold">₱ 2,928.00</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-bold text-emerald-900 table-sticky-col">2"</td>
                        <td class="px-6 py-4 font-semibold">₱ 7,320.00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- 2. MOBILE VIEW: Stacked Cards (Hidden on Desktop) -->
        <div class="md:hidden divide-y divide-slate-100">
            <?php
            $com_meters = [
                ["size" => "1/2\"", "min" => "366.00"],
                ["size" => "3/4\"", "min" => "585.60"],
                ["size" => "1\"", "min" => "1,172.2"],
                ["size" => "1 1/2\"", "min" => "2,928"],
                ["size" => "2\"", "min" => "7,320"]
            ];
            foreach ($com_meters as $m):
                ?>
                <div class="p-5 space-y-4">
                    <!-- Card Header -->
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Meter Size</span>
                        <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full font-black">
                            <?php echo $m['size']; ?>
                        </span>
                    </div>

                    <!-- Minimum Charge -->
                    <div class="flex justify-between items-end border-b border-slate-50 pb-2">
                        <span class="text-sm text-slate-600">Minimum <br> Charge (10m³)</span>
                        <span class="text-xl font-bold text-emerald-900">₱
                            <?php echo $m['min']; ?>
                        </span>
                    </div>

                    <!-- Commodity Charges (Grid) -->
                    <div class="grid grid-cols-2 gap-3 pt-2">
                        <div class="bg-slate-50 p-3 rounded-lg border border-slate-100">
                            <p class="text-[10px] uppercase font-bold text-slate-400 mb-1">11-20 m³</p>
                            <p class="font-bold text-slate-700">40.60</p>
                            <p class="text-[10px] text-slate-500">(32.40)</p>
                        </div>
                        <div class="bg-slate-50 p-3 rounded-lg border border-slate-100">
                            <p class="text-[10px] uppercase font-bold text-slate-400 mb-1">21-30 m³</p>
                            <p class="font-bold text-slate-700">48.10</p>
                            <p class="text-[10px] text-slate-500">(38.40)</p>
                        </div>
                        <div class="bg-slate-50 p-3 rounded-lg border border-slate-100">
                            <p class="text-[10px] uppercase font-bold text-slate-400 mb-1">31-40 m³</p>
                            <p class="font-bold text-slate-700">61.60</p>
                            <p class="text-[10px] text-slate-500">(49.20)</p>
                        </div>
                        <div class="bg-emerald-600 p-3 rounded-lg text-white shadow-md">
                            <p class="text-[10px] uppercase font-bold opacity-80 mb-1">41+ m³</p>
                            <p class="font-bold">72.90</p>
                            <p class="text-[10px] opacity-80">(58.40)</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="border-t border-slate-50 p-2">
                <span class="text-sm text-slate-600 ml-4"><strong class="mr-2 text-emerald-700">₱</strong> All figures in
                    Philippine Peso.</span>
            </div>

        </div>
    </div>

    <!-- CATEGORY C: BULK SALE -->
    <div class="glass-card">
        <!-- Header Section -->
        
        <div class="section-header bg-cyan-800">
            <div>
                <h2 class="text-xl font-bold uppercase tracking-wide">Category C: Bulk Sale</h2>
                <p class="text-cyan-100 text-sm">Large-scale supply tariffs</p>
            </div>
            <div class="hidden sm:flex gap-[15px] items-center ml-auto">
                <i class="fas fa-truck-droplet text-2xl text-white opacity-30"></i>
            </div>
        </div>

        <!-- 1. DESKTOP VIEW: Standard Table (Hidden on Mobile) -->
        <div class="hidden md:block overflow-x-auto custom-scrollbar">
            <table class="w-full text-sm text-left border-collapse">
                <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold">
                    <tr>
                    
                        <th class="px-6 py-4">MIN. CHARGE (10m³)</th>
                        <th class="px-4 py-4 text-center">11-20 m³</th>
                        <th class="px-4 py-4 text-center">21-30 m³</th>
                        <th class="px-4 py-4 text-center">31-40 m³</th>
                        <th class="px-4 py-4 text-center text-cyan-700">41+ m³</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr>
                        <td class="px-6 py-4 font-semibold">₱ 540.00</td>
                        <td class="text-center border-l border-r" rowspan="5">
                            <span class="block font-bold">₱ 59.50</span>
                        </td>
                        <td class="text-center border-l border-r" rowspan="5">
                            <span class="block font-bold">₱ 65.50</span>
                        </td>
                        <td class="text-center border-l border-r" rowspan="5">
                            <span class="block font-bold">₱ 72.00</span>
                        </td>
                        <td class="text-center font-bold text-cyan-600 border-l border-r bg-emerald-50/30"
                            rowspan="5">
                            <span class="block text-lg">₱ 79.25</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- 2. MOBILE VIEW: Stacked Cards (Hidden on Desktop) -->
        <div class="md:hidden divide-y divide-slate-100">

                <div class="p-5 space-y-4">
                    

                    <!-- Minimum Charge -->
                    <div class="flex justify-between items-end border-b border-slate-50 pb-2">
                        <span class="text-sm text-slate-600">Minimum <br> Charge (10m³)</span>
                        <span class="text-xl font-bold text-cyan-900"> ₱ 540

                        </span>
                    </div>

                    <!-- Commodity Charges (Grid) -->
                    <div class="grid grid-cols-2 gap-3 pt-2">
                        <div class="bg-slate-50 p-3 rounded-lg border border-slate-100">
                            <p class="text-[10px] uppercase font-bold text-slate-400 mb-1">11-20 m³</p>
                            <p class="font-bold text-slate-700">59.50</p>
                        </div>
                        <div class="bg-slate-50 p-3 rounded-lg border border-slate-100">
                            <p class="text-[10px] uppercase font-bold text-slate-400 mb-1">21-30 m³</p>
                            <p class="font-bold text-slate-700">65.50</p>
                        </div>
                        <div class="bg-slate-50 p-3 rounded-lg border border-slate-100">
                            <p class="text-[10px] uppercase font-bold text-slate-400 mb-1">31-40 m³</p>
                            <p class="font-bold text-slate-700">72.00</p>
                        </div>
                        <div class="bg-cyan-600 p-3 rounded-lg text-white shadow-md">
                            <p class="text-[10px] uppercase font-bold opacity-80 mb-1">41+ m³</p>
                            <p class="font-bold">79.25</p>
                        </div>
                    </div>
                </div>


            <div class="border-t border-slate-50 p-2">
                <span class="text-sm text-slate-600 ml-4"><strong class="mr-2 text-cyan-700">₱</strong> All figures in
                    Philippine Peso.</span>
            </div>

        </div>
    </div>



    <!-- Footer / Disclaimers -->
    <div class="bg-slate-800 text-slate-400 rounded-2xl p-8 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-sm">
            <div>
                <h4 class="text-white font-bold mb-2 uppercase text-xs tracking-widest">Billing Cycle</h4>
                <p>Meters are read monthly. Unpaid bills after the due
                    date are subject to additional "late payment" fee.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-2 uppercase text-xs tracking-widest">Exclusive Pricings</h4>
                <p>Figures in parentheses indicate tariffs in cases of water supply from wells of NHA (National
                    Housing Authority) areas, VLP (Villa La Prinza), VPB (Villa Palao, Banlic), and Major
                    Homes. </p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-2 uppercase text-xs tracking-widest">Connection Maintenance</h4>
                <p>The consumer is responsible for leaks beyond the meter. Report main line leaks immediately to our
                    maintenance hotline.</p>
            </div>
        </div>
        <div class="pt-8 border-t border-slate-700 text-center">
            <p class="text-[10px] font-bold tracking-[0.2em] uppercase">Calamba Water District • Public Information
                Document</p>
        </div>
    </div>

</div>