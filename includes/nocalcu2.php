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

<div class="max-w-5xl mx-auto mb-6 px-4">
    <!-- Header Section -->
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-extrabold text-[#1a589e] mb-4 uppercase tracking-tight">
            <i class="fa-solid fa-calculator mr-2"></i> Bill Calculator
        </h1>
        <p class="text-slate-500 max-w-2xl font-semibold mx-auto">
            Estimate your monthly commodity charge and fees based on consumption and service type based
            on approved tariff effective 2010.
        </p>
    </div>

    <!-- Maintenance / Offline Alert Box -->
    <div class="text-center p-8 max-w-md bg-white rounded-xl shadow-md border border-gray-100 mx-auto my-8">
        <div class="text-amber-500 text-5xl mb-4">⚠️</div>
        <h2 class="text-2xl font-black text-slate-800 uppercase tracking-wide mb-2">
            Service Offline
        </h2>
        <p class="text-gray-500 text-sm font-semibold mb-6">
            Our Bill Calculator is currently undergoing maintenance. Please try again later.
        </p>
        <a href="./index.php"
            class="inline-block bg-[#1a589e] text-white font-bold text-xs uppercase px-5 py-2.5 rounded-lg shadow hover:bg-blue-700 transition duration-200">
            Go Back to Home
        </a>
    </div>
</div>