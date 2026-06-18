<style>
    .calculator-card {
        background: #ffffff;
        border-radius: 1.5rem;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
    }

    .input-group label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }

    .custom-select,
    .custom-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 0.75rem !important;
        border: 1px solid #e2e8f0;
        background-color: #f1f5f9;
        transition: all 0.2s;
        outline: none;
    }

    .custom-select:focus,
    .custom-input:focus {
        border-color: #1a589e;
        background-color: #fff;
        box-shadow: 0 0 0 4px rgba(26, 88, 158, 0.1);
    }

    .result-row {
        display: flex;
        justify-content: space-between;
        padding: 0.75rem 0;
        border-bottom: 1px dashed #e2e8f0;
    }

    .total-box {
        background: linear-gradient(135deg, #1a589e 0%, #0f3d70 100%);
        color: white;
        border-radius: 1rem;
        padding: 1.5rem;
    }

    .animate-fade-in {
        animation: fadeIn 0.4s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="max-w-5xl mx-auto mb-6">
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-extrabold text-[#1a589e] mb-4 uppercase tracking-tight">
            <i class="fa-solid fa-calculator"></i> Bill Calculator
        </h1>
        <p class="text-slate-500 max-w-2xl font-semibold mx-auto">
            Estimate your monthly commodity charge and fees based on consumption and service type based
            on approved tariff effective 2010.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <div class="lg:col-span-5 space-y-6">
            <div class="calculator-card p-6 md:p-8">
                <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center">
                    <i class="fas fa-edit mr-4 text-[#1a589e]"></i> Input Details
                </h2>

                <div class="space-y-5">
                    <div class="input-group">
                        <label><i class="fa-solid fa-house-user mr-2 text-[#1a589e]"></i>Connection Type</label>
                        <select id="connection-type" class="custom-select">
                            <option value="domestic">Domestic / Government</option>
                            <option value="commercial">Commercial / Industrial</option>
                            <option value="bulk">Bulk Sale</option>
                        </select>
                    </div>

                    <div class="input-group" id="pricing-type-group">
                        <label><i class="fa-solid fa-tags mr-2 text-[#1a589e]"></i>Pricing Category</label>
                        <select id="pricing-type" class="custom-select">
                            <option value="regular">Regular Pricing</option>
                            <option value="exclusive">Exclusive Pricing (NHA/VLP/VPB/Major Homes)</option>
                        </select>
                    </div>

                    <div class="input-group" id="meter-size-group">
                        <label><i class="fa-solid fa-gauge-high mr-2 text-[#1a589e]"></i>Meter Size</label>
                        <select id="meter-size" class="custom-select">
                            <option value="1/2">1/2"</option>
                            <option value="3/4">3/4"</option>
                            <option value="1">1"</option>
                            <option value="1 1/2">1 1/2"</option>
                            <option value="2">2"</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label for="consumption" class="relative block"><i class="fa-solid fa-droplet mr-2 text-[#1a589e]"></i> Monthly Consumption</label>
                        <div class="relative">
                            <input type="number" id="consumption" class="custom-input" placeholder="0" min="0" value="10">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">m³</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 border-l-4 border-[#1a589e] p-5 rounded-r-xl">
                <h3 class="font-bold text-[#1a589e] text-sm mb-2 uppercase">Billing Policies</h3>
                <ul class="text-xs text-[#1a589e] space-y-2 list-disc ml-4 mb-4">
                    <li><strong>Septage Fee:</strong> Fixed at ₱2.99 per consumed cu.m.</li>
                    <li><strong>After Due Date Penalty:</strong> 10% of subtotal water charge if paid after due date.</li>
                    <li><strong>* Exclusive Pricing Category:</strong> Tariffs in cases of water supply from wells of National Housing Authority areas, Villa La Prinza, Villa Palao Banlic, and Major Homes.</li>
                </ul>

                <h3 class="font-bold text-[#1a589e] text-sm mb-2 uppercase">Notice</h3>
                <ul class="text-xs text-[#1a589e] space-y-2 list-disc ml-4">
                    <li>Surcharges and post-due date computations (indicated in the red section) do not apply to the Bulk Sale category. All bulk water transactions are subject to upfront payment terms.</li>
                    <li>This bill calculator does not include arrears and other fees not listed herein.</li>
                </ul>
            </div>
        </div>

        <div id="output-area" class="lg:col-span-7 animate-fade-in">
            <div class="calculator-card h-full flex flex-col overflow-hidden ">
                <div class="p-6 md:p-8 flex-grow">
                    <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center">
                        <i class="fas fa-receipt mr-4 text-[#1a589e]"></i> Billing Summary
                    </h2>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="text-slate-400 border-b border-slate-100">
                                    <th class="text-left py-3 font-semibold uppercase tracking-wider">Charge Item</th>
                                    <th class="text-center py-3 font-semibold uppercase tracking-wider">Basis</th>
                                    <th class="text-right py-3 font-semibold uppercase tracking-wider">Amount</th>
                                </tr>
                            </thead>
                            <tbody id="bill-summary-body" class="divide-y divide-slate-50">
                                </tbody>
                        </table>
                    </div>

                    <div class="mt-8 pt-4 border-t-2 border-slate-100 space-y-3">
                        <div class="result-row flex justify-between">
                            <span class="text-slate-600 font-medium">Subtotal Water Charge</span>
                            <span id="subtotal-amount" class="font-bold text-slate-800">₱ 0.00</span>
                        </div>
                        <div id="septage-row-summary" class="result-row flex justify-between">
                            <span class="text-slate-600 font-medium">Septage Management Fee</span>
                            <span id="septage-amount" class="font-bold text-slate-800">₱ 0.00</span>
                        </div>
                    </div>
                </div>

                <div class="total-box m-6 mt-0 bg-[#1a589e] p-6 rounded-xl text-white shadow-lg shadow-blue-900/20">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-blue-100 text-[10px] font-bold uppercase tracking-widest mb-1">Total Amount Due</p>
                            <p class="text-[11px] text-blue-200">Payment on or before due date</p>
                        </div>
                        <div class="text-right">
                            <span id="grand-total-amount" class="text-3xl font-black tracking-tight">₱ 0.00</span>
                        </div>
                    </div>
                </div>

                <div id="after-due-box" class="mx-6 mb-6 p-4 rounded-xl border-2 border-dashed border-red-100 bg-red-50/50">
                    <div class="flex flex-col space-y-2">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-red-700 font-semibold uppercase tracking-tight text-[10px]">Late Payment Surcharge</span>
                            <span id="late-fee-amount" class="font-bold text-red-700">₱ 0.00</span>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t border-red-100">
                            <span class="text-slate-700 font-bold text-xs uppercase">Total After Due Date</span>
                            <span id="total-after-due-date" class="text-lg font-black text-red-800">₱ 0.00</span>
                        </div>
                    </div>
                </div>

                <div class="m-6 mt-0 p-3 bg-slate-100 rounded-lg border border-slate-200">
                    <p class="text-[12px] text-slate-500 leading-relaxed italic">
                        <span class="font-bold text-slate-600 not-italic">Disclaimer:</span>
                        The computations provided by this bill calculator are estimates based on the 2010 tariff rates. Actual billing amounts may vary upon final billing assessment.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const RATE_SCHEDULE = {
    'domestic': {
        'regular': {
            '1/2': { minCharge: 183.00, rates: [20.30, 24.05, 30.80, 36.45] },
            '3/4': { minCharge: 292.80, rates: [20.30, 24.05, 30.80, 36.45] },
            '1': { minCharge: 585.60, rates: [20.30, 24.05, 30.80, 36.45] },
            '1 1/2': { minCharge: 1464.00, rates: [20.30, 24.05, 30.80, 36.45] },
            '2': { minCharge: 3660.00, rates: [20.30, 24.05, 30.80, 36.45] }
        },
        'exclusive': {
            '1/2': { minCharge: 154.00, rates: [16.20, 19.20, 24.60, 29.20] },
            '3/4': { minCharge: 246.40, rates: [16.20, 19.20, 24.60, 29.20] },
            '1': { minCharge: 492.80, rates: [16.20, 19.20, 24.60, 29.20] },
            '1 1/2': { minCharge: 1232.00, rates: [16.20, 19.20, 24.60, 29.20] },
            '2': { minCharge: 3080.00, rates: [16.20, 19.20, 24.60, 29.20] }
        }
    },
    'commercial': {
        'regular': {
            '1/2': { minCharge: 366.00, rates: [40.60, 48.10, 61.60, 72.90] },
            '3/4': { minCharge: 585.60, rates: [40.60, 48.10, 61.60, 72.90] },
            '1': { minCharge: 1171.20, rates: [40.60, 48.10, 61.60, 72.90] },
            '1 1/2': { minCharge: 2928.00, rates: [40.60, 48.10, 61.60, 72.90] },
            '2': { minCharge: 7320.00, rates: [40.60, 48.10, 61.60, 72.90] }
        },
        'exclusive': {
            '1/2': { minCharge: 308.00, rates: [32.40, 38.40, 49.20, 58.40] },
            '3/4': { minCharge: 492.80, rates: [32.40, 38.40, 49.20, 58.40] },
            '1': { minCharge: 985.60, rates: [32.40, 38.40, 49.20, 58.40] },
            '1 1/2': { minCharge: 2464.00, rates: [32.40, 38.40, 49.20, 58.40] },
            '2': { minCharge: 6160.00, rates: [32.40, 38.40, 49.20, 58.40] }
        }
    },
    'bulk': {
        'all': {
            'any': { minCharge: 549.00, rates: [60.90, 72.15, 92.40, 109.35] }
        }
    }
};

const SEPTAGE_FEE_RATE = 2.99;

function toggleFieldsVisibility(connectionType) {
    const meterField = document.getElementById('meter-size')?.closest('.input-group');
    const pricingField = document.getElementById('pricing-type')?.closest('.input-group');
    const septageRow = document.getElementById('septage-row-summary');
    const afterDueBox = document.getElementById('after-due-box');

    if (connectionType === 'bulk') {
        if (meterField) meterField.classList.add('hidden');
        if (pricingField) pricingField.classList.add('hidden');
        if (septageRow) septageRow.classList.add('hidden');
        if (afterDueBox) afterDueBox.classList.add('hidden');
    } else {
        if (meterField) meterField.classList.remove('hidden');
        if (pricingField) pricingField.classList.remove('hidden');
        if (septageRow) septageRow.classList.remove('hidden');
        if (afterDueBox) afterDueBox.classList.remove('hidden');
    }
}

function calculateBill() {
    const consumption = parseFloat(document.getElementById('consumption').value) || 0;
    const connectionType = document.getElementById('connection-type').value;
    const pricingType = document.getElementById('pricing-type').value;
    const meterSize = document.getElementById('meter-size').value;

    toggleFieldsVisibility(connectionType);

    let schedule;
    if (connectionType === 'bulk') {
        schedule = RATE_SCHEDULE['bulk']['all']['any'];
    } else {
        schedule = RATE_SCHEDULE[connectionType][pricingType][meterSize];
    }

    let subtotal = schedule.minCharge;
    const steps = [];

    steps.push({
        label: 'Minimum Charge (0-10 cu.m)',
        amount: schedule.minCharge,
        computation: 'Base'
    });

    if (consumption > 10) {
        let remaining = consumption - 10;
        const tierLabels = ['11-20 cu.m', '21-30 cu.m', '31-40 cu.m', '41-up cu.m'];
        for (let i = 0; i < 4; i++) {
            if (remaining <= 0) break;
            let currentTierUnits = (i === 3) ? remaining : Math.min(remaining, 10);
            let rate = schedule.rates[i];
            let cost = currentTierUnits * rate;
            subtotal += cost;
            steps.push({
                label: tierLabels[i],
                amount: cost,
                computation: `${currentTierUnits.toFixed(1)} × ${rate.toFixed(2)}`
            });
            if (i < 3) remaining -= currentTierUnits;
        }
    }

    // NA-FIX: Gagawin nating 0 ang septage at late fee kapag bulk sale
    const septageFee = (connectionType === 'bulk') ? 0 : (consumption * SEPTAGE_FEE_RATE);
    const currentBill = subtotal + septageFee;

    const lateFeeAmount = (connectionType === 'bulk') ? 0 : (subtotal * 0.10);
    const totalAfterDueDate = currentBill + lateFeeAmount;

    updateTableUI(steps, subtotal, septageFee, currentBill, lateFeeAmount, totalAfterDueDate);
}

function updateTableUI(steps, subtotal, septageFee, currentBill, lateFeeAmount, totalAfterDueDate) {
    const formatCurrency = (val) => '₱ ' + val.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    const tbody = document.getElementById('bill-summary-body');
    if (tbody) {
        tbody.innerHTML = steps.map(s => `
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="py-4 px-2 text-slate-700 font-medium">${s.label}</td>
                <td class="py-4 px-2 text-slate-400 font-mono text-[10px] uppercase text-center">${s.computation}</td>
                <td class="py-4 px-2 text-right font-bold text-slate-800">${formatCurrency(s.amount)}</td>
            </tr>
        `).join('');
    }

    const setVal = (id, val) => {
        const el = document.getElementById(id);
        if (el) el.textContent = val;
    };

    setVal('subtotal-amount', formatCurrency(subtotal));
    setVal('septage-amount', formatCurrency(septageFee));
    setVal('grand-total-amount', formatCurrency(currentBill));
    setVal('late-fee-amount', formatCurrency(lateFeeAmount));
    setVal('total-after-due-date', formatCurrency(totalAfterDueDate));
}

document.addEventListener('DOMContentLoaded', () => {
    const inputs = ['consumption', 'meter-size', 'connection-type', 'pricing-type'];
    inputs.forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            el.addEventListener('change', calculateBill);
            if (id === 'consumption') el.addEventListener('input', calculateBill);
        }
    });
    calculateBill();
});
</script>