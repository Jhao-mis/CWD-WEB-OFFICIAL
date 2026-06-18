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
