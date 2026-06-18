<?php
// Define Rates Data
$categories = [
    ['name' => 'Residential / Government', 'min' => '180.00', '11_20' => '21.00', '21_30' => '24.50', '31_40' => '28.50', '41_up' => '33.25'],
    ['name' => 'Commercial / Industrial', 'min' => '360.00', '11_20' => '42.00', '21_30' => '49.00', '31_40' => '57.00', '41_up' => '66.50']
];

$bulkRates = [
    [
        'category' => 'Bulk Sale',
        'min_charge' => '540.00',
        '11_20' => '59.50',
        '21_30' => '65.50',
        '31_40' => '72.00',
        '41_up' => '79.25'
    ]
];
?>

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

    .mobile-card {
        background: white;
        border-radius: 12px;
        padding: 16px;
        margin-bottom: 16px;
        border-left: 5px solid #1a589e;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
</style>

<div class="max-w-6xl mx-auto space-y-10">

    <!-- Main Header -->
    <div class="text-center space-y-3 pt-8">
        <h1 class="text-5xl font-black text-[#1a589e] uppercase tracking-wide">Approved Water Rates</h1>
        <p class="text-slate-500 font-bold uppercase text-xs tracking-[0.3em]">Calamba Water District • Schedule of Tariffs</p>
    </div>

    <!-- DESKTOP VERSION -->
    <div class="hidden md:block space-y-10">
        
        <!-- Standard Rates -->
        <div class="glass-card">
            <div class="section-header bg-[#1a589e]">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-house-chimney text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-black uppercase tracking-wider">Standard Water Rates</h2>
                        <p class="text-[10px] text-blue-100 font-bold uppercase tracking-widest">Effective per approved LWUA schedule</p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="p-5 text-[10px] font-black uppercase text-slate-500 tracking-widest table-sticky-col bg-slate-50">Classification</th>
                            <th class="p-5 text-[10px] font-black uppercase text-slate-500 tracking-widest text-center">Min. Charge (0-10)</th>
                            <th class="p-5 text-[10px] font-black uppercase text-[#1a589e] tracking-widest text-center bg-blue-50/30">11-20 cu.m.</th>
                            <th class="p-5 text-[10px] font-black uppercase text-[#1a589e] tracking-widest text-center bg-blue-50/30">21-30 cu.m.</th>
                            <th class="p-5 text-[10px] font-black uppercase text-[#1a589e] tracking-widest text-center bg-blue-50/30">31-40 cu.m.</th>
                            <th class="p-5 text-[10px] font-black uppercase text-[#1a589e] tracking-widest text-center bg-blue-50/30">41-up cu.m.</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-bold text-sm">
                        <?php foreach ($categories as $rate): ?>
                            <tr class="hover:bg-slate-50 transition-colors group">
                                <td class="p-5 text-slate-900 table-sticky-col group-hover:bg-slate-50"><?= $rate['name'] ?></td>
                                <td class="p-5 text-center text-slate-800">₱ <?= $rate['min'] ?></td>
                                <td class="p-5 text-center text-[#1a589e]">₱ <?= $rate['11_20'] ?></td>
                                <td class="p-5 text-center text-[#1a589e]">₱ <?= $rate['21_30'] ?></td>
                                <td class="p-5 text-center text-[#1a589e]">₱ <?= $rate['31_40'] ?></td>
                                <td class="p-5 text-center text-[#1a589e]">₱ <?= $rate['41_up'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bulk Rates -->
        <div class="glass-card">
            
            <div class="section-header bg-cyan-800">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-truck-droplet text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-black uppercase tracking-wider">Bulk Sale Water Rates</h2>
                        <p class="text-[10px] text-cyan-100 font-bold uppercase tracking-widest">Large-scale supply tariffs</p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="p-5 text-[10px] font-black uppercase text-slate-500 tracking-widest table-sticky-col bg-slate-50">Classification</th>
                            <th class="p-5 text-[10px] font-black uppercase text-slate-500 tracking-widest text-center">Min. Charge (0-10)</th>
                            <th class="p-5 text-[10px] font-black uppercase text-cyan-800 tracking-widest text-center bg-cyan-50/30">11-20 cu.m.</th>
                            <th class="p-5 text-[10px] font-black uppercase text-cyan-800 tracking-widest text-center bg-cyan-50/30">21-30 cu.m.</th>
                            <th class="p-5 text-[10px] font-black uppercase text-cyan-800 tracking-widest text-center bg-cyan-50/30">31-40 cu.m.</th>
                            <th class="p-5 text-[10px] font-black uppercase text-cyan-800 tracking-widest text-center bg-cyan-50/30">41-up cu.m.</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-bold text-sm">
                        <?php foreach ($bulkRates as $rate): ?>
                            <tr class="hover:bg-slate-50 transition-colors group">
                                <td class="p-5 text-slate-900 table-sticky-col group-hover:bg-slate-50"><?= $rate['category'] ?></td>
                                <td class="p-5 text-center text-slate-800">₱ <?= $rate['min_charge'] ?></td>
                                <td class="p-5 text-center text-cyan-800">₱ <?= $rate['11_20'] ?></td>
                                <td class="p-5 text-center text-cyan-800">₱ <?= $rate['21_30'] ?></td>
                                <td class="p-5 text-center text-cyan-800">₱ <?= $rate['31_40'] ?></td>
                                <td class="p-5 text-center text-cyan-800">₱ <?= $rate['41_up'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MOBILE VERSION -->
    <div class="md:hidden space-y-4 px-2">
        <?php foreach ($categories as $rate): ?>
            <div class="mobile-card">
                <div class="flex justify-between items-center mb-4 border-b border-slate-100 pb-2">
                    <h4 class="font-black text-[#1a589e] text-sm uppercase"><?= $rate['name'] ?></h4>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-slate-50 p-3 rounded-lg border border-slate-100 text-center">
                        <p class="text-[9px] text-slate-500 font-black uppercase">Min (0-10)</p>
                        <p class="text-lg font-black text-slate-900">₱<?= $rate['min'] ?></p>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-lg border border-blue-100 text-center">
                        <p class="text-[9px] text-[#1a589e] font-black uppercase">11-20 cu.m.</p>
                        <p class="text-lg font-black text-[#1a589e]">₱<?= $rate['11_20'] ?></p>
                    </div>
                </div>
                <div class="mt-4 grid grid-cols-3 gap-2 text-center">
                    <div>
                        <p class="text-[8px] text-slate-400 font-bold uppercase">21-30</p>
                        <p class="text-sm font-bold text-slate-700">₱<?= $rate['21_30'] ?></p>
                    </div>
                    <div>
                        <p class="text-[8px] text-slate-400 font-bold uppercase">31-40</p>
                        <p class="text-sm font-bold text-slate-700">₱<?= $rate['31_40'] ?></p>
                    </div>
                    <div>
                        <p class="text-[8px] text-blue-400 font-bold uppercase">41-UP</p>
                        <p class="text-sm font-bold text-[#1a589e]">₱<?= $rate['41_up'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php foreach ($bulkRates as $rate): ?>
            <div class="mobile-card border-l-cyan-700">
                <div class="flex justify-between items-center mb-4 border-b border-slate-100 pb-2">
                    <h4 class="font-black text-cyan-800 text-sm uppercase"><?= $rate['category'] ?></h4>
                    <i class="fa-solid fa-truck-droplet text-cyan-700"></i>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-slate-50 p-3 rounded-lg border border-slate-100 text-center">
                        <p class="text-[9px] text-slate-500 font-black uppercase">Min (0-10)</p>
                        <p class="text-lg font-black text-slate-900">₱<?= $rate['min_charge'] ?></p>
                    </div>
                    <div class="bg-cyan-50 p-3 rounded-lg border border-cyan-100 text-center">
                        <p class="text-[9px] text-cyan-800 font-black uppercase">11-20 cu.m.</p>
                        <p class="text-lg font-black text-cyan-800">₱<?= $rate['11_20'] ?></p>
                    </div>
                </div>
                <div class="mt-4 grid grid-cols-3 gap-2 text-center">
                    <div>
                        <p class="text-[8px] text-slate-400 font-bold uppercase">21-30</p>
                        <p class="text-sm font-bold text-slate-700">₱<?= $rate['21_30'] ?></p>
                    </div>
                    <div>
                        <p class="text-[8px] text-slate-400 font-bold uppercase">31-40</p>
                        <p class="text-sm font-bold text-slate-700">₱<?= $rate['31_40'] ?></p>
                    </div>
                    <div>
                        <p class="text-[8px] text-cyan-400 font-bold uppercase">41-UP</p>
                        <p class="text-sm font-bold text-cyan-800">₱<?= $rate['41_up'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Footer / Disclaimers -->
    <div class="bg-slate-800 text-slate-400 rounded-2xl p-8 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-sm">
            <div>
                <h4 class="text-white font-bold mb-2 uppercase text-xs tracking-widest">Billing Cycle</h4>
                <p>Meters are read monthly. Unpaid bills after the due date are subject to a late payment fee.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-2 uppercase text-xs tracking-widest">Approved Tariffs</h4>
                <p>These rates are approved by the Local Water Utilities Administration (LWUA) and are subject to periodic review.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-2 uppercase text-xs tracking-widest">Maintenance</h4>
                <p>Report main line leaks immediately to our maintenance hotline for prompt repair and water conservation.</p>
            </div>
        </div>
        <div class="pt-8 border-t border-slate-700 text-center">
            <p class="text-[10px] font-bold tracking-[0.2em] uppercase">Calamba Water District • Public Information Service</p>
        </div>
    </div>
</div>