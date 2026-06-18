<style>
    /* Government Theme Variables */
    :root {
        --gov-blue: #1a589e;
        --slate-50: #f8fafc;
        --slate-100: #f1f5f9;
        --slate-200: #e2e8f0;
        --slate-400: #94a3b8;
        --slate-500: #64748b;
        --slate-700: #334155;
        --slate-900: #0f172a;
    }

    .charter-container {
        width: 100%;
        overflow: hidden;
        background-color: white;
        border-radius: 0.75rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--slate-200);
    }

    .charter-table {
        width: 100%;
        text-align: left;
        border-collapse: collapse;
        background-color: white;
    }

    /* Header Styling */
    .charter-table thead {
        background-color: var(--gov-blue);
        color: white;
    }

    .charter-table th {
        padding: 1rem 1.5rem;
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.05em;
    }

    .charter-table td {
        padding: 1rem 1.5rem;
        font-size: 0.875rem;
        color: var(--slate-700);
        border-bottom: 1px solid var(--slate-100);
        vertical-align: top;
    }

    .charter-table tfoot {
        background-color: var(--slate-50);
        border-top: 2px solid var(--slate-200);
    }

    .charter-table tfoot td {
        padding: 0.75rem 1.5rem;
        color: var(--slate-900);
        font-weight: 700;
        border: none;
    }

    /* Mobile Responsive Logic */
    @media (max-width: 768px) {
        .charter-table thead {
            display: none;
        }

        .charter-table,
        .charter-table tbody,
        .charter-table tr,
        .charter-table td,
        .charter-table tfoot {
            display: block;
            width: 100%;
        }

        .charter-table tr {
            margin-bottom: 1.5rem;
            border-bottom: 4px solid var(--slate-100);
            background-color: white;
        }

        .charter-table td {
            display: flex;
            flex-direction: column;
            padding: 0.75rem 1.25rem;
            border-bottom: 1px solid var(--slate-50);
            text-align: left;
        }

        /* Responsive Labels */
        .charter-table td::before {
            content: attr(data-label);
            display: block;
            text-transform: uppercase;
            font-size: 10px;
            font-weight: 900;
            color: var(--gov-blue);
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
            opacity: 0.8;
        }

        .charter-table tfoot tr {
            margin-bottom: 0;
            border: none;
        }

        .charter-table tfoot td {
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.25rem;
            background-color: #f8fafc;
        }

        .charter-table tfoot td::before {
            content: attr(data-label);
            margin-bottom: 0;
        }
    }
</style>

<section class="container mx-auto">
    <div class="">

        <!-- Main Content -->
        <div class="">

            <!-- Citizen's Charter -->
            <h3 class="text-2xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">Citizen's
                Charter</h3>

            <br>

            <p class="text-justify text-body">As a part of the Calamba Water District’s commitment to
                accountability and good governance, this citizens’ charter was developed and designed as a mechanism
                to eliminate bureaucratic red tape and to promote transparency in every transaction.<br><br>

                Known as SPEED Services or Simple Processes for Effective and Efficient Delivery of Services, this
                tabulated guides streamlines CWD’s business processes to ensure optimum client satisfaction
                via shortened transaction time and client-friendly measures.<br><br>

                Additionally, this guide offers options and flexible steps that built on the experiences, standards
                and systems in the delivery of our frontline services in the past. Nonetheless, innovative measures
                are prescribed herein to meet the emerging trends and cope with the future expectations and
                requirements that will be encountered by CWD as a more robust and competitive organization.
            </p>

            <br><br>

            <div class="flex flex-col lg:flex-row gap-8 px-2 lg:px-2 lg:gap-16">

                <!-- All Citizen's Charter Transactions -->

                <!-- Sidebar Navigation -->
                <aside class="w-full lg:w-80 sidebar-nav">

                    <div>
                        <span class="section-header" style="text-indent: 25px; font-style: italic;">Simple
                            transactions</span>

                        <button onclick="switchTab(event, 'wbill')" class="tab-card active">
                            <i class="fas fa-receipt mr-2"></i>
                            <span class="font-bold text-sm">Payment of Water Bill</span>
                        </button>

                        <button onclick="switchTab(event, 'estimate')" class="tab-card">
                            <i class="fa-solid fa-bullseye"></i>
                            <span class="font-bold text-sm">Application for Estimate</span>
                        </button>

                        <button onclick="switchTab(event, 'reconn')" class="tab-card">
                            <i class="fas fa-link mr-2"></i>
                            <span class="font-bold text-sm">Procedure of Reconnection</span>
                        </button>

                        <span class="section-header" style="text-indent: 25px; font-style: italic;">Filing of
                            Request</span>

                        <button onclick="switchTab(event, 'disconn')" class="tab-card">
                            <i class="fas fa-unlink mr-2"></i>
                            <span class="font-bold text-sm">For Disconnection</span>
                        </button>

                        <button onclick="switchTab(event, 'ledger')" class="tab-card">
                            <i class="fas fa-file-invoice mr-2"></i>
                            <span class="font-bold text-sm">For Account Ledger Copy</span>
                        </button>

                        <button onclick="switchTab(event, 'name-change')" class="tab-card">
                            <i class="fas fa-user-edit mr-2"></i>
                            <span class="font-bold text-sm">For Change of Name</span>
                        </button>

                    </div>

                    <br>

                    <div class="mt-6">
                        <span class="section-header" style="text-indent: 25px; font-style: italic;">Complex
                            Transactions</span>

                        <button onclick="switchTab(event, 'watconn')" class="tab-card">
                            <i class="fas fa-plug mr-2"></i>
                            <span class="font-bold text-sm">New Water Service Connection</span>
                        </button>

                        <button onclick="switchTab(event, 'compl')" class="tab-card">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            <span class="font-bold text-sm">Filing of Complaint or Request</span>
                        </button>

                    </div>

                    <br>

                    <div class="mt-6">
                        <span class="section-header" style="text-indent: 25px; font-style: italic;">Others</span>

                        <button onclick="switchTab(event, 'bulks')" class="tab-card">
                            <i class="fas fa-truck mr-2"></i>
                            <span class="font-bold text-sm">Payment of Bulk Sale</span>
                        </button>

                        <button onclick="switchTab(event, 'wata')" class="tab-card">
                            <i class="fas fa-flask mr-2"></i>
                            <span class="font-bold text-sm">Water Analysis</span>
                        </button>

                    </div>

                </aside>

                <!-- Content -->
                <article class="flex-1">
                    <div class="bg-white  p-8 lg:p-14  min-h-[500px]">

                        <!-- Payment of Water Bill Tab -->
                        <div id="wbill" class="tab-content active">
                            <!-- Main Card Container -->

                            <div class="bg-white border-t-4 rounded-[.5rem] border-blue-900 shadow-md p-10 animate-slide-up">
                                <div class="text-center mb-8">
                                    <h2 class="text-3xl font-serif font-bold text-gray-900 uppercase tracking-wide">
                                        Payment of Water Bill</h2>
                                    <div class="w-24 h-1 bg-blue-900 mx-auto mt-2"></div>
                                    
                                </div>

                                <!-- Checklist Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-green-50 border border-green-200 rounded-lg">
                                        <thead class="bg-green-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-green-900 uppercase tracking-wider">
                                                    Checklist of Standard Requirements</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-green-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Water Bill Receipt – One
                                                    (1) Original Copy or One (1) Photo Copy</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Additional Requirements Tables (Condensed for Space) -->
                                <div class="grid md:grid-cols-2 gap-6 mb-8">
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">For Accounts
                                            Registered under a Senior Citizen</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Senior Citizen's ID – One (1) Original Copy or One (1) Photo Copy
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">For Authorized
                                            Representative of Senior Citizen</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Signed Written Authorization – One (1) Original or One (1) Photocopy
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Procedure Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <thead class="bg-yellow-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Procedure</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Processing Time and Amount to be Paid</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Person Responsible (Designation; Office)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-yellow-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Get a queuing ticket from
                                                    the Lobby Guard for Public Assistance Location: Lobby</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute / No
                                                    Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Guard on Duty;
                                                    Security Services</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Payment of Water Bill
                                                    Location: Customer Accounts Division (Lobby)</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">15 minutes / See
                                                    Formula Below</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Accounts Division (Window 1 and 2)</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-yellow-100">
                                            <tr>
                                                <td colspan="1" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Time:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">16
                                                    minutes</td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Fee:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">Php 0.00
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Rate Schedule Table -->
                                <div class="overflow-x-auto mb-8">
                                    <h4
                                        class="font-bold text-gray-900 mb-2 text-sm uppercase text-center bg-blue-50 p-2 rounded">
                                        List of Formula (Residential/Government)</h4>
                                    <table class="min-w-full bg-blue-50 border border-blue-200 rounded-lg">
                                        <thead class="bg-blue-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">
                                                    Meter Size</th>
                                                <th
                                                    class="px-4 py-2 text-right text-xs font-medium text-blue-900 uppercase tracking-wider">
                                                    Minimum Charge (1-10 m³)</th>
                                                <th
                                                    class="px-4 py-2 text-right text-xs font-medium text-blue-900 uppercase tracking-wider">
                                                    11-20 m³ (per m³)</th>
                                                <th
                                                    class="px-4 py-2 text-right text-xs font-medium text-blue-900 uppercase tracking-wider">
                                                    21-30 m³ (per m³)</th>
                                                <th
                                                    class="px-4 py-2 text-right text-xs font-medium text-blue-900 uppercase tracking-wider">
                                                    31-40 m³ (per m³)</th>
                                                <th
                                                    class="px-4 py-2 text-right text-xs font-medium text-blue-900 uppercase tracking-wider">
                                                    41+ m³ (per m³)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-blue-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1/2"</td>
                                                <td class="px-4 py-2 text-right text-sm font-bold">P 183.00</td>
                                                <td class="px-4 py-2 text-right text-sm">P 20.30</td>
                                                <td class="px-4 py-2 text-right text-sm">P 24.05</td>
                                                <td class="px-4 py-2 text-right text-sm">P 30.80</td>
                                                <td class="px-4 py-2 text-right text-sm">P 36.45</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3/4"</td>
                                                <td class="px-4 py-2 text-right text-sm font-bold">P 292.80</td>
                                                <td class="px-4 py-2 text-right text-sm">P 20.30</td>
                                                <td class="px-4 py-2 text-right text-sm">P 24.05</td>
                                                <td class="px-4 py-2 text-right text-sm">P 30.80</td>
                                                <td class="px-4 py-2 text-right text-sm">P 36.45</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1"</td>
                                                <td class="px-4 py-2 text-right text-sm font-bold">P 585.60</td>
                                                <td class="px-4 py-2 text-right text-sm">P 20.30</td>
                                                <td class="px-4 py-2 text-right text-sm">P 24.05</td>
                                                <td class="px-4 py-2 text-right text-sm">P 30.80</td>
                                                <td class="px-4 py-2 text-right text-sm">P 36.45</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1 1/2"</td>
                                                <td class="px-4 py-2 text-right text-sm font-bold">P 1,464.00</td>
                                                <td class="px-4 py-2 text-right text-sm">P 20.30</td>
                                                <td class="px-4 py-2 text-right text-sm">P 24.05</td>
                                                <td class="px-4 py-2 text-right text-sm">P 30.80</td>
                                                <td class="px-4 py-2 text-right text-sm">P 36.45</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2"</td>
                                                <td class="px-4 py-2 text-right text-sm font-bold">P 3,660.00</td>
                                                <td class="px-4 py-2 text-right text-sm">P 20.30</td>
                                                <td class="px-4 py-2 text-right text-sm">P 24.05</td>
                                                <td class="px-4 py-2 text-right text-sm">P 30.80</td>
                                                <td class="px-4 py-2 text-right text-sm">P 36.45</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- General Remarks -->
                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mt-8">
                                    <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase">General Remarks</h4>
                                    <ul class="text-sm space-y-2 text-gray-700 list-disc list-inside">
                                        <li>Only residential monthly consumptions not exceeding 30 cubic meters may
                                            avail 5% discount under RA 9994.</li>
                                        <li>The discount may be availed through over the counter payment at Calamba
                                            Water District Main Office and Extension Offices at Canlubang and Mercado De
                                            Calamba.</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <!-- Application for Estimate Tab -->
                        <div id="estimate" class="tab-content">
                            <div
                                class="bg-white border-t-4 rounded-[.5rem] border-blue-900 shadow-md p-10 animate-slide-up">
                                <div class="text-center mb-8">
                                    <h2 class="text-2xl font-serif font-bold text-gray-900 uppercase tracking-wide">
                                        Filing of Application for Estimate</h2>
                                    <div class="w-24 h-1 bg-blue-900 mx-auto mt-2"></div>
                                </div>

                                <!-- Checklist Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-green-50 border border-green-200 rounded-lg">
                                        <thead class="bg-green-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-green-900 uppercase tracking-wider">
                                                    Checklist of Requirements</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-green-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Certificate of
                                                    Ownership – One (1) Photocopy</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Sketch of Location –
                                                    One (1) Original or One (1) Photocopy</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3. Water Bill Receipt –
                                                    One (1) Original or One (1) Photocopy</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Procedure Table -->
                                <div class="overflow-x-auto">
                                    <table class="min-w-full bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <thead class="bg-yellow-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Procedure</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Processing Time and Amount to be Paid</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Person Responsible (Designation; Office)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-yellow-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Get a queuing ticket
                                                    from the Lobby Guard for Application for Estimate <br> Location:
                                                    Lobby</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Guard on
                                                    Duty; Security Services</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Verification of
                                                    Account on the Billing System Location: One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">15 minutes /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 5)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2.1 Issuance of Order of
                                                    Payment <br> Location: One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 5)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3. Payment of Filing Fee
                                                    <br> Location: Treasury Section (Lobby)
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">5 minutes /
                                                    Php 100.00</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Budget and
                                                    Cash Management Division (Window 3)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">4. Submit the official
                                                    receipt of Filing Fee <br> Location: One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">5 minutes /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 5)</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-yellow-100">
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Time:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">27
                                                    minutes</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Fee:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">Php
                                                    100.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Reconnection of Water Service Tab -->
                        <div id="reconn" class="tab-content">
                            <div
                                class="bg-white border-t-4 rounded-[.5rem] border-blue-900 shadow-md p-10 animate-slide-up">
                                <div class="text-center mb-8">
                                    <h2 class="text-2xl font-serif font-bold text-gray-900 uppercase tracking-wide">
                                        Procedures of Reconnection</h2>
                                    <div class="w-24 h-1 bg-blue-900 mx-auto mt-2"></div>
                                </div>
                                <!-- Requirements Checklist -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-green-50 border border-green-200 rounded-lg">
                                        <thead class="bg-green-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-green-900 uppercase tracking-wider">
                                                    Checklist of Requirements</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-green-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Updated Water Bill
                                                    Receipt</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Php 100.00
                                                    Reconnection Fee</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3. Authorization Letter
                                                    and Valid Government ID's (for representative)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Additional Requirements Tables (Condensed for Space) -->
                                <div class="grid md:grid-cols-2 gap-6 mb-8">
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">For Authorized
                                            Representative of Applicant living in the Philippines</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1.Signed Written Authorization One (1) Original
                                            </li>
                                            <li>
                                                2. Valid Government ID One (1) Photocopy (Owner and Representative)
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">For Authorized
                                            Representative of Applicant living Abroad</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Special Power of Attorney Authenticated by Philippine Consul -
                                                One (1) Original
                                            </li>
                                            <li>
                                                2. Valid Government ID One (1) Photocopy (Owner and Representative)
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Procedure Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <thead class="bg-yellow-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Procedure</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Processing Time and Amount to be Paid</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    PERSON RESPONIBLE (Designation; Office)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-yellow-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Get a queuing ticket
                                                    from the Lobby Guard for Application for Reconnection <br>
                                                    Location: Lobby</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute/ No
                                                    Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Guard on
                                                    Duty; Security Services</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Receive and review
                                                    accounts and the submitted document/s. <br> Location:
                                                    One-Stop-Shop
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">10 minutes/
                                                    None
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 7)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2.1 Preparation of
                                                    Service Request</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute/
                                                    None</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 7)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3. Receive payment and
                                                    issuance of official receipt. <br> Location: Treasury Section
                                                    (Lobby)
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">10 minutes /
                                                    100.00 Php</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Budget and
                                                    Cash Management Division (Window 3)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">4. Submit the Official
                                                    Receipt <br> Location: One-Stop-Shop
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">5 minutes /
                                                    None</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 7)</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-yellow-100">
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Time:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">Php
                                                    27 Minutes</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Fee:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">Php
                                                    100.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- General Remarks -->
                                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mt-8">
                                        <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase">General Remarks
                                        </h4>
                                        <ul class="text-sm space-y-2 text-gray-700 list-disc list-inside">
                                            <li>The account name must be changed or updated prior to processing of
                                                reconnection if the owner is already deceased or the property was
                                                already sold.</li>
                                            <li>The water bill deposit must be updated to Php 1,500.00 for
                                                Residential
                                                Connection or Php 3,000.00 for Commercial Connection.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Request for Change of Name Tab -->
                        <div id="disconn" class="tab-content">
                            <div
                                class="bg-white border-t-4 rounded-[.5rem] border-blue-900 shadow-md p-10 mx-0 animate-slide-up">
                                <div class="text-center mb-8">
                                    <h2 class="text-2xl font-serif font-bold text-gray-900 uppercase tracking-wide">
                                        Filing of Request for Disconnection</h2>
                                    <div class="w-24 h-1 bg-blue-900 mx-auto mt-2"></div>
                                </div>

                                <!-- Checklist Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-green-50 border border-green-200 rounded-lg">
                                        <thead class="bg-green-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-green-900 uppercase tracking-wider">
                                                    Checklist of Standard Requirements</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-green-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Water Bill Receipt –
                                                    One (1) Original Copy or One (1) Photocopy</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Signed Letter of
                                                    Request for Temporary or Permanent Disconnection – One (1)
                                                    Original Copy</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3. Government Issued ID
                                                    – One (1) Photocopy</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Additional Requirements Tables (Condensed for Space) -->
                                <div class="grid md:grid-cols-2 gap-6 mb-8">
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">For Authorized
                                            Representative of Account Owner living in the Philippines</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Signed Written Authorization – One (1) Original Copy</li>
                                            <li>2. Valid Government ID – One (1) Photocopy</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">For Authorized
                                            Representative of Applicant living Abroad</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Special Power of Attorney (SPA) Authenticated by Philippine
                                                Consul – One (1) Original</li>
                                            <li>2. Valid Government ID – One (1) Photocopy</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">For Authorized
                                            Representative of Corporate Account</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Notarized Board Resolution – One (1) Original or One (1)
                                                Photocopy</li>
                                            <li>2. Notarized Secretary Certificate – One (1) Original or One (1)
                                                Photocopy</li>
                                            <li>3. Valid Government ID – One (1) Photocopy</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">For Authorized
                                            Representative of Government or School Account</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Signed Written Authorization from the Administrator, General
                                                Manager, Branch Manager or Principal – One (1) Original</li>
                                            <li>2. Valid Government ID – One (1) Photocopy</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Procedure Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <thead class="bg-yellow-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Procedure</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Processing Time and Amount to be Paid</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Person Responsible (Designation; Office)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-yellow-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Get a queuing ticket
                                                    from the Lobby Guard for Application for Complaint/Request
                                                    <br> Location: Lobby
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Guard on
                                                    Duty; Security Services</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Submission of
                                                    Required Documents once the number is called <br> Location:
                                                    One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">15 minutes /
                                                    None</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 6)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3. Fill-out Request for
                                                    Disconnection Form <br> Location: One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    None</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 6)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">4. Printing of Service
                                                    Request <br> Location: One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    None</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 6)</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-yellow-100">
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Time:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">18
                                                    minutes</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Fee:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">Php
                                                    0.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- General Remarks -->
                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mt-8">
                                    <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase">General Remarks</h4>
                                    <ul class="text-sm space-y-2 text-gray-700 list-disc list-inside">
                                        <li>The outstanding balance on water bill must be settled first prior to
                                            acceptance of request.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Request for Account Ledger Tab -->
                        <div id="ledger" class="tab-content">
                            <div
                                class="bg-white border-t-4 rounded-[.5rem] border-blue-900 shadow-md p-10 mx-0 animate-slide-up">
                                <div class="text-center mb-8">
                                    <h2 class="text-2xl font-serif font-bold text-gray-900 uppercase tracking-wide">
                                        Filing of Request for a copy of Account Ledger</h2>
                                    <div class="w-24 h-1 bg-blue-900 mx-auto mt-2"></div>
                                </div>

                                <!-- Checklist Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-green-50 border border-green-200 rounded-lg">
                                        <thead class="bg-green-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-green-900 uppercase tracking-wider">
                                                    Checklist of Standard Requirements</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-green-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Water Bill Receipt –
                                                    One (1) Original Copy or One (1) Photo Copy</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Signed Letter of
                                                    Request – One (1) Original Copy</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3. Government Issued ID
                                                    – One (1) Photo Copy</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Additional Requirements Tables (Condensed for Space) -->
                                <div class="grid md:grid-cols-2 gap-6 mb-8">
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">For Authorized
                                            Representative</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Signed Written Authorization – One (1) Original Copy</li>
                                            <li>2. Valid Government ID – One (1) Photocopy</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Procedure Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <thead class="bg-yellow-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Procedure</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Processing Time and Amount to be Paid</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Person Responsible (Designation; Office)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-yellow-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Get a queuing ticket
                                                    from the Lobby Guard for Public Assistance Complaint Desk
                                                    <br> Location: Lobby
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Guard on
                                                    Duty; Security Services</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Proceed and Submit
                                                    the Required Documents <br> Location: One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">3 minutes /
                                                    None</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 4)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3. Fill-up Freedom of
                                                    Information Request Form and Feedback Form <br> Location:
                                                    One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">5 minutes /
                                                    None</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 4)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">4. Endorse Request to
                                                    the Billing and Meter Reading Division <br> Location:
                                                    One-Stop-Shop
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">2 minutes /
                                                    None</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 4)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">5. Printing and Stamping
                                                    of Ledger <br> Location: 3rd Floor</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    None</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Billing and
                                                    Meter Reading Division</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">6. Receiving of Account
                                                    Ledger <br> Location: One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    None</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-yellow-100">
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Time:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">13
                                                    minutes</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Fee:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">Php
                                                    0.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- General Remarks -->
                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mt-8">
                                    <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase">General Remarks</h4>
                                    <ul class="text-sm space-y-2 text-gray-700 list-disc list-inside">
                                        <li>Only the Primary or Secondary Registered Name may request a copy of the
                                            account ledger.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Request for Change of Name Tab -->
                        <div id="name-change" class="tab-content">
                            <div
                                class="bg-white border-t-4 rounded-[.5rem] border-blue-900 shadow-md p-10 animate-slide-up">
                                <div class="text-center mb-8">
                                    <h2 class="text-2xl font-serif font-bold text-gray-900 uppercase tracking-wide">
                                        Filing of Request for Change of Name</h2>
                                    <div class="w-24 h-1 bg-blue-900 mx-auto mt-2"></div>
                                </div>

                                <!-- Checklist Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-green-50 border border-green-200 rounded-lg">
                                        <thead class="bg-green-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-green-900 uppercase tracking-wider">
                                                    Checklist of Standard Requirements</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-green-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Notarized Signed Deed
                                                    of Absolute Sale which includes all improvements – One (1)
                                                    Photocopy</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Valid Government ID –
                                                    One (1) Photocopy</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Additional Requirements Tables (Condensed for Space) -->
                                <div class="grid md:grid-cols-2 gap-6 mb-8">
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">In the Absence of
                                            a Notarized Deed of Absolute Sale</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Notarized Signed Affidavit of Waiver – One (1) Original Copy</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">For Married
                                            Deceased Account Owner</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Death Certificate of the Registered Owner – One (1) Photocopy
                                            </li>
                                            <li>2. Marriage Contract – One (1) Photocopy</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">For Widow/Widower
                                            Deceased Account Owner</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Death Certificate of the Deceased Account Owner – One (1)
                                                Photocopy</li>
                                            <li>2. Death Certificate of the Registered Owner – One (1) Photocopy
                                            </li>
                                            <li>3. Birth Certificate of the Successor – One (1) Photocopy</li>
                                            <li>4. Valid Government ID of Successor – One (1) Photocopy</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">For Authorized
                                            Representative</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Authorization Letter – One (1) Original Copy</li>
                                            <li>2. Valid Government ID – One (1) Photocopy</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Procedure Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <thead class="bg-yellow-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Procedure</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Processing Time and Amount to be Paid</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Person Responsible (Designation; Office)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-yellow-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Get a queuing ticket
                                                    from the Lobby Guard for Public Assistance Complaint Desk
                                                    <br> Location: Lobby
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Guard on
                                                    Duty; Security Services</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Receive and review
                                                    the submitted documents, and issue of Order of Payment <br>
                                                    Location:
                                                    One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">11 minutes /
                                                    None</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 5/6)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3. Payment for Change of
                                                    Name <br> Location: Lobby</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">10 minutes /
                                                    Php 30.00</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Budget and
                                                    Cash Management Division (Window 3)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">4. Return to Window 5 or
                                                    6 for Encoding of O.R. number <br> Location: One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">15 minutes /
                                                    None</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 5/6)</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-yellow-100">
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Time:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">37
                                                    minutes</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Fee:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">Php
                                                    30.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- General Remarks -->
                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mt-8">
                                    <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase">General Remarks</h4>
                                    <ul class="text-sm space-y-2 text-gray-700 list-disc list-inside">
                                        <li>Immediate family refers to husband, wife, children, parent/s or siblings
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- New Water Connection Tab -->
                        <div id="watconn" class="tab-content">
                            <div
                                class="bg-white border-t-4 rounded-[.5rem] border-blue-900 shadow-md p-10 animate-slide-up">
                                <div class="text-center mb-8">
                                    <h2 class="text-3xl font-serif font-bold text-gray-900 uppercase tracking-wide">
                                        Payment of Application for New Water Service Connection</h2>
                                    <div class="w-24 h-1 bg-blue-900 mx-auto mt-2"></div>
                                </div>
                                <!-- Checklist Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-green-50 border border-green-200 rounded-lg">
                                        <thead class="bg-green-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-green-900 uppercase tracking-wider">
                                                    Checklist of Standard Requirements</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-green-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Certificate of
                                                    Ownership – One (1) Photocopy</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Barangay Clearance –
                                                    One (1) Original or One (1) Photocopy</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3. Water Bill Receipt –
                                                    One (1) Original or One (1) Photocopy</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">4. Certificate of
                                                    Inspection – One (1) Original or One (1) Photocopy</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">5. Valid Government
                                                    Receipt of Purchased Materials – One (1) Photocopy</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Additional Requirements Tables (Condensed for Space) -->
                                <div class="grid md:grid-cols-2 gap-6 mb-8">
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">Additional – For
                                            Authorized Representative of Applicant living in the Philippines</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Signed Government ID – One (1) Photocopy</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">Additional – For
                                            Authorized Representative of Applicant living Abroad</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Special Power of Attorney – One (1) Photocopy by Philippine
                                                Consul – One (1) Original</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">Additional – For
                                            Authorized Representative of Corporate Application</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Notarized Board Resolution – One (1) Original or One (1)
                                                Photocopy</li>
                                            <li>2. Government ID – One (1) Photocopy</li>
                                            <li>3. Signed Authorization Letter from the Administrator, General
                                                Manager, Branch or School Principal – One (1) Original</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">Additional – For
                                            Application with Concrete Breaking</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Signed Concrete Breaking Permit – One (1) Original with One (1)
                                                Photocopy</li>
                                        </ul>
                                    </div>
                                    <div class="md:col-span-2">
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">Additional – For
                                            Series Connection</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Letter of Consent – One (1) Original</li>
                                            <li>2. Valid Government ID – One (1) Photocopy</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-2 text-sm uppercase">For New Water
                                            Service Application within a Subdivision As Needs Arises</h4>
                                        <ul class="text-xs space-y-1 list-disc list-inside text-gray-700">
                                            <li>1. Homeowners Association Certification – One (1) Original</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Procedure Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <thead class="bg-yellow-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Procedure</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Processing Time and Amount to be Paid</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Person Responsible (Designation; Office)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-yellow-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Get a queuing ticket
                                                    from the Lobby Guard for New Connection <br> Location: Lobby
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Guard on
                                                    Duty; Security Services</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Verification of
                                                    Application on the New Connection System <br> Location:
                                                    One-Stop-Shop
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">3 minutes /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 5)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2.1 Evaluation and
                                                    Acceptance of Documentary Requirements <br> Location:
                                                    One-Stop-Shop
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">5 minutes /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 5)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3. Issuance of Order of
                                                    Payment Location: One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 5)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">4. Payment of New
                                                    Connection Fees <br> Location: Treasury Section (Lobby)</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">5 minutes
                                                    (See Below)</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Budget and
                                                    Cash Management Division (Window 3)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">5. Encoding and
                                                    Contract, Fill-out Customer's Information Sheet and Waiver,
                                                    Signing of Service Connection Contract <br> Location:
                                                    One-Stop-Shop
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">26 minutes /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division / Applicant (Window 5)</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-yellow-100">
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Time:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">41
                                                    minutes</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Fees Tables -->
                                <div class="grid md:grid-cols-2 gap-6">
                                    <!-- Residential Fees -->
                                    <div class="overflow-x-auto">
                                        <h4
                                            class="font-bold text-gray-900 mb-2 text-sm uppercase text-center bg-blue-50 p-2 rounded">
                                            Residential Connection without Excavation</h4>
                                        <table class="min-w-full bg-blue-50 border border-blue-200 rounded-lg">
                                            <thead class="bg-blue-100">
                                                <tr>
                                                    <th
                                                        class="px-4 py-2 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">
                                                        Particulars</th>
                                                    <th
                                                        class="px-4 py-2 text-right text-xs font-medium text-blue-900 uppercase tracking-wider">
                                                        Amount (Php)</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-blue-200">
                                                <tr>
                                                    <td class="px-4 py-2 text-sm text-gray-900">Customer's
                                                        Contribution</td>
                                                    <td class="px-4 py-2 text-right text-sm font-bold">3,040.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 text-sm text-gray-900">Valve with Tail
                                                        Piece</td>
                                                    <td class="px-4 py-2 text-right text-sm font-bold">421.30</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 text-sm text-gray-900">Water Bill Deposit
                                                    </td>
                                                    <td class="px-4 py-2 text-right text-sm font-bold">1,500.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 text-sm text-gray-900">Notary Labor</td>
                                                    <td class="px-4 py-2 text-right text-sm font-bold">100.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 text-sm text-gray-900">Municipal Fee</td>
                                                    <td class="px-4 py-2 text-right text-sm font-bold">10.00</td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="bg-blue-100">
                                                <tr>
                                                    <td class="px-4 py-2 text-right font-bold text-sm">Total</td>
                                                    <td class="px-4 py-2 text-right text-sm font-bold">5,071.30</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- Commercial Fees -->
                                    <div class="overflow-x-auto">
                                        <h4
                                            class="font-bold text-gray-900 mb-2 text-sm uppercase text-center bg-green-50 p-2 rounded">
                                            Commercial Connection without Excavation</h4>
                                        <table class="min-w-full bg-green-50 border border-green-200 rounded-lg">
                                            <thead class="bg-green-100">
                                                <tr>
                                                    <th
                                                        class="px-4 py-2 text-left text-xs font-medium text-green-900 uppercase tracking-wider">
                                                        Particulars</th>
                                                    <th
                                                        class="px-4 py-2 text-right text-xs font-medium text-green-900 uppercase tracking-wider">
                                                        Amount (Php)</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-green-200">
                                                <tr>
                                                    <td class="px-4 py-2 text-sm text-gray-900">Customer's
                                                        Contribution</td>
                                                    <td class="px-4 py-2 text-right text-sm font-bold">3,090.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 text-sm text-gray-900">Valve with Tail
                                                        Piece</td>
                                                    <td class="px-4 py-2 text-right text-sm font-bold">342.30</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 text-sm text-gray-900">Water Bill Deposit
                                                    </td>
                                                    <td class="px-4 py-2 text-right text-sm font-bold">1,500.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 text-sm text-gray-900">Notary Labor</td>
                                                    <td class="px-4 py-2 text-right text-sm font-bold">100.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-2 text-sm text-gray-900">Municipal Fee</td>
                                                    <td class="px-4 py-2 text-right text-sm font-bold">20.00</td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="bg-green-100">
                                                <tr>
                                                    <td class="px-4 py-2 text-right font-bold text-sm">Total</td>
                                                    <td class="px-4 py-2 text-right text-sm font-bold">5,052.30</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filing of Complaint or Request Tab -->
                        <div id="compl" class="tab-content">
                            <div
                                class="bg-white border-t-4 rounded-[.5rem] border-blue-900 shadow-md p-10 animate-slide-up">
                                <div class="text-center mb-8">
                                    <h2 class="text-2xl font-serif font-bold text-gray-900 uppercase tracking-wide">
                                        Filing of Complaint or Request</h2>
                                    <div class="w-24 h-1 bg-blue-900 mx-auto mt-2"></div>
                                </div>

                                <!-- Checklist Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-green-50 border border-green-200 rounded-lg">
                                        <thead class="bg-green-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-green-900 uppercase tracking-wider">
                                                    Checklist of Requirements</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-green-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Water Bill Receipt –
                                                    One (1) Original Copy or One (1) Photocopy</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Procedure Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <thead class="bg-yellow-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Procedure</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Processing Time and Amount to be Paid</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Person Responsible (Designation; Office)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-yellow-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Get a queuing ticket
                                                    from the Lobby Guard for Complaint/Request <br> Location: Lobby
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Guard on
                                                    Duty; Security Services</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Approach the
                                                    corresponding window when the number is called, Preparation and
                                                    Printing of Service Request <br> Location: One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">17 minutes /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 5)</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-yellow-100">
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Time:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">18
                                                    minutes</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Fee:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">Php
                                                    0.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- General Remarks -->
                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mt-8">
                                    <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase">General Remarks</h4>
                                    <ul class="text-sm space-y-2 text-gray-700 list-disc list-inside">
                                        <li><strong>Reports under major repair (within 24 hours):</strong> Leak on
                                            Distribution Line / Leak on Transmission Line / Pump & Motor Control
                                            Breakdown</li>
                                        <li><strong>Reports under minor repair (within 2 days):</strong> Leak
                                            Service Line / Tapping Point / Before the Meter / Leak on Meter / Leak
                                            on Disinfection Equipment</li>
                                        <li><strong>Reports under verification of consumption / meter (within 2
                                                days):</strong> High and Low Consumption / Calibration & Replacement
                                            of Meter</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Payment of Bulk Sale Tab -->
                        <div id="bulks" class="tab-content">
                            <div
                                class="bg-white border-t-4 rounded-[.5rem] border-blue-900 shadow-md p-10 animate-slide-up">
                                <div class="text-center mb-8">
                                    <h2 class="text-2xl font-serif font-bold text-gray-900 uppercase tracking-wide">
                                        Payment of Bulk Sale</h2>
                                    <div class="w-24 h-1 bg-blue-900 mx-auto mt-2"></div>
                                </div>

                                <!-- Checklist Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-green-50 border border-green-200 rounded-lg">
                                        <thead class="bg-green-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-green-900 uppercase tracking-wider">
                                                    Checklist of Requirements</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-green-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Request to purchase
                                                    bulk water – (1) Original Copy or (1) Photo Copy</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Procedure Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <thead class="bg-yellow-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Procedure</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Processing Time and Amount to be Paid</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Person Responsible (Designation; Office)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-yellow-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Approach the Customer
                                                    Accounts Division <br> Location: Lobby</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">3 minutes /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Accounts Division (Window 1 or 2)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Payment of Bulk Water
                                                    <br> Location: Treasury Section (Lobby)
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">5 minutes /
                                                    See formula fees below</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Budget and
                                                    Cash Management Division (Window 3)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3. Proceed to Bucal Pump
                                                    Station for the withdrawal of bulk water <br> Location: Bucal
                                                    Pump
                                                    Station - Brgy. Bucal</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">15 minutes
                                                    (for every 6 cubic meter)</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Operations
                                                    Department</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-yellow-100">
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Time:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">23
                                                    minutes</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Fee:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">Php
                                                    0.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <!-- Formula Table -->
                                <div class="overflow-x-auto mb-8">
                                    <h4
                                        class="font-bold text-gray-900 mb-2 text-sm uppercase text-center bg-blue-50 p-2 rounded">
                                        List of Formula</h4>
                                    <div class="overflow-x-auto mb-8">
                                        <table class="min-w-full bg-blue-50 border border-blue-200 rounded-lg">
                                            <thead class="bg-blue-100">
                                                <tr>
                                                    <th rowspan="2" colspan="2"
                                                        class="px-4 py-2 text-left text-xs font-medium text-blue-900 uppercase tracking-wider border-b border-r border-blue-200">
                                                        Cubic Meter
                                                    </th>
                                                    <th
                                                        class="px-4 py-2 text-right text-xs font-medium text-blue-900 uppercase tracking-wider border-r border-blue-200">
                                                        Minimum Charge
                                                    </th>
                                                    <th colspan="4"
                                                        class="px-4 py-2 text-center text-xs font-medium text-blue-900 uppercase tracking-wider">
                                                        Per Cubic Meter
                                                    </th>
                                                </tr>
                                                <tr class="bg-blue-50">
                                                    <td
                                                        class="px-4 py-2 text-right text-xs font-bold text-blue-800 border-b border-r border-blue-200">
                                                        First 10 Cubic Meter</td>
                                                    <td
                                                        class="px-4 py-2 text-right text-xs font-medium text-blue-900 border-b border-r border-blue-200">
                                                        11-20</td>
                                                    <td
                                                        class="px-4 py-2 text-right text-xs font-medium text-blue-900 border-b border-r border-blue-200">
                                                        21-30</td>
                                                    <td
                                                        class="px-4 py-2 text-right text-xs font-medium text-blue-900 border-b border-r border-blue-200">
                                                        31-40</td>
                                                    <td
                                                        class="px-4 py-2 text-right text-xs font-medium text-blue-900 border-b border-blue-200">
                                                        41+</td>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-blue-200">
                                                <tr>
                                                    <td colspan="2"
                                                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-gray-50 border-r border-blue-200">
                                                        Amount</td>
                                                    <td
                                                        class="px-4 py-2 text-right text-sm font-bold text-blue-700 border-r border-blue-200">
                                                        549.00</td>
                                                    <td
                                                        class="px-4 py-2 text-right text-sm border-r border-blue-200 font-bold">
                                                        60.90</td>
                                                    <td
                                                        class="px-4 py-2 text-right text-sm border-r border-blue-200 font-bold">
                                                        72.15</td>
                                                    <td
                                                        class="px-4 py-2 text-right text-sm border-r border-blue-200 font-bold">
                                                        92.40</td>
                                                    <td
                                                        class="px-4 py-2 text-right text-sm border-r border-blue-200 font-bold">
                                                        109.35</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Water Analysis Tab -->
                        <div id="wata" class="tab-content">
                            <div
                                class="bg-white border-t-4 rounded-[.5rem] border-blue-900 shadow-md p-10 animate-slide-up">
                                <div class="text-center mb-8">
                                    <h2 class="text-2xl font-serif font-bold text-gray-900 uppercase tracking-wide">
                                        Water Analysis</h2>
                                    <div class="w-24 h-1 bg-blue-900 mx-auto mt-2"></div>
                                    <p class="text-sm text-blue-700 font-medium italic mt-2">(Accredited Testing
                                        Services)</p>
                                </div>
                                <div class="bg-cyan-50 border border-cyan-200 rounded-lg p-6 mb-8">
                                    <p class="text-sm text-cyan-800 font-medium">Offers microbiological and
                                        bacteriological testing for drinking water analysis, accredited by the
                                        Department of Health (DOH) with Accreditation No. 254 issued on March 2012.
                                    </p>
                                </div>

                                <!-- Checklist Table -->
                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-green-50 border border-green-200 rounded-lg">
                                        <thead class="bg-green-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-green-900 uppercase tracking-wider">
                                                    Checklist of Requirements</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-green-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Water Bill Notice for
                                                    Ground Water - (1) Original Copy Or (1) Photo Copy</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="overflow-x-auto mb-8">
                                    <table class="min-w-full bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <thead class="bg-yellow-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-2 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Procedure</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Processing Time and Amount to be Paid</th>
                                                <th
                                                    class="px-4 py-2 text-center text-xs font-medium text-yellow-900 uppercase tracking-wider">
                                                    Person Responsible (Designation; Office)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-yellow-200">
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">1. Get a queuing ticket
                                                    from the Lobby Guard for Public Assistance <br> Location: Lobby
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    No Fee</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Guard on
                                                    Duty; Security Services</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">2. Account verification
                                                    on the billing System <br> Location: One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">15 minutes /
                                                    See formula fees below</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 4 or 5)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">3. Issuance of Order of
                                                    Payment <br> Location: One-Stop-Shop</td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">1 minute /
                                                    None
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Customer
                                                    Care Division (Window 4 or 5)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-gray-900">4. Payment of Ground
                                                    Water Assessment Bill <br> Location: Treasury Section (Lobby)
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">5 minutes/
                                                    Amount is based on Assessment
                                                </td>
                                                <td class="px-4 py-2 text-center text-sm text-gray-900">Budget and
                                                    Cash Management Division (Window 3)</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-yellow-100">
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Time:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">22
                                                    minutes</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-right font-bold text-sm">Total
                                                    Processing Fee:</td>
                                                <td colspan="2" class="px-4 py-2 text-center font-bold text-sm">Php
                                                    0.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="grid md:grid-cols-2 gap-8 mb-8">
                                    <!-- Ground Water Assessment -->
                                    <div>
                                        <h4
                                            class="text-xl font-bold text-gray-900 mb-4 uppercase tracking-wide text-center bg-blue-50 p-3 rounded">
                                            Ground Water Assessment</h4>
                                        <ul class="text-sm space-y-2 text-gray-700 list-disc list-inside">
                                            <li class="font-medium text-blue-900">A) Metered</li>
                                            <li class="font-medium text-blue-900">B) Fixed Rate</li>
                                        </ul>
                                    </div>
                                    <!-- Water Rationing -->
                                    <div>
                                        <h4
                                            class="text-xl font-bold text-gray-900 mb-4 uppercase tracking-wide text-center bg-green-50 p-3 rounded">
                                            Water Rationing</h4>
                                        <ul class="text-sm space-y-2 text-gray-700 list-disc list-inside">
                                            <li class="font-medium text-green-900">A) Regular Sale</li>
                                            <li class="font-medium text-green-900">B) Bulk Sale</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                </article>
            </div>

        </div>

    </div>
</section>