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
                <aside class="w-full lg:w-80 sidebar-nav space-y-6">

                    <div class="space-y-1.5">
                        <span class="block px-3 text-xs font-bold uppercase tracking-wider text-slate-400 italic">
                            Simple transactions
                        </span>

                        <button onclick="switchTab(event, 'wbill')"
                            class="tab-card active w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                            <i class="fas fa-receipt mr-3 text-base shrink-0 w-5 text-center"></i>
                            <span>Payment of Water Bill</span>
                        </button>

                        <button onclick="switchTab(event, 'estimate')"
                            class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                            <i class="fa-solid fa-bullseye mr-3 text-base shrink-0 w-5 text-center"></i>
                            <span>Application for Estimate</span>
                        </button>

                        <button onclick="switchTab(event, 'reconn')"
                            class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                            <i class="fas fa-link mr-3 text-base shrink-0 w-5 text-center"></i>
                            <span>Procedure of Reconnection</span>
                        </button>
                    </div>

                    <div class="space-y-1.5">
                        <span class="block px-3 text-xs font-bold uppercase tracking-wider text-slate-400 italic">
                            Filing of Request
                        </span>

                        <button onclick="switchTab(event, 'disconn')"
                            class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                            <i class="fas fa-unlink mr-3 text-base shrink-0 w-5 text-center"></i>
                            <span>For Disconnection</span>
                        </button>

                        <button onclick="switchTab(event, 'ledger')"
                            class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                            <i class="fas fa-file-invoice mr-3 text-base shrink-0 w-5 text-center"></i>
                            <span>For Account Ledger Copy</span>
                        </button>

                        <button onclick="switchTab(event, 'name-change')"
                            class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                            <i class="fas fa-user-edit mr-3 text-base shrink-0 w-5 text-center"></i>
                            <span>For Change of Name</span>
                        </button>
                    </div>

                    <div class="space-y-1.5">
                        <span class="block px-3 text-xs font-bold uppercase tracking-wider text-slate-400 italic">
                            Complex Transactions
                        </span>

                        <button onclick="switchTab(event, 'watconn')"
                            class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                            <i class="fas fa-plug mr-3 text-base shrink-0 w-5 text-center"></i>
                            <span>New Water Service Connection</span>
                        </button>

                        <button onclick="switchTab(event, 'compl')"
                            class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                            <i class="fas fa-exclamation-triangle mr-3 text-base shrink-0 w-5 text-center"></i>
                            <span>Filing of Complaint or Request</span>
                        </button>
                    </div>

                    <div class="space-y-1.5">
                        <span class="block px-3 text-xs font-bold uppercase tracking-wider text-slate-400 italic">
                            Others
                        </span>

                        <button onclick="switchTab(event, 'bulks')"
                            class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                            <i class="fas fa-truck mr-3 text-base shrink-0 w-5 text-center"></i>
                            <span>Payment of Bulk Sale</span>
                        </button>

                        <button onclick="switchTab(event, 'wata')"
                            class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                            <i class="fas fa-flask mr-3 text-base shrink-0 w-5 text-center"></i>
                            <span>Water Analysis</span>
                        </button>
                    </div>

                </aside>

                <!-- Content -->
                <article class="flex-1">
                    <div class="bg-white  p-8 lg:p-14  min-h-[500px]">

                        <?php include 'includes/flserv301.php'; ?>
                        <?php include 'includes/flserv302.php'; ?>
                        <?php include 'includes/flserv303.php'; ?>

                </article>
            </div>

        </div>

    </div>
</section>