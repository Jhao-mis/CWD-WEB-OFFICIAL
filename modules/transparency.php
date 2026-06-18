<?php
/* =====================
   AUTH + SESSION GUARD
===================== */
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include '../db.php';

/* =====================
   FETCH LOGGED-IN USER
===================== */
function getLoggedInUser(PDO $conn, int $userId): ?array
{
    $sql = "SELECT 
                id, emp_id, username, firstname, middlename, lastname,
                email, department, role
            FROM users
            WHERE id = ?
            LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

$userInfo = getLoggedInUser($conn, (int) $_SESSION['user_id']);

/* =====================
   HARD FAIL IF USER NOT FOUND
===================== */
if (!$userInfo || empty($userInfo['role'])) {
    // Session exists but user no longer valid
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transparency Seal</title>
    <link rel="icon" type="image/svg+xml" href="../img/CWDIcon.png">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/db_bg.css">
    <link rel="stylesheet" href="../css/faqs.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

    <button id="sidebarToggle" type="button"
        class="text-gray-900 bg-transparent box-border border border-transparent hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 font-medium leading-5 rounded-lg ms-3 mt-3 text-sm p-2 focus:outline-none inline-flex fixed top-0 left-0 z-50 sm:hidden transition duration-300">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10" />
        </svg>
    </button>

    <?php
    switch ($userInfo['role']) {
        case 'superadmin':
            include '../superadmin/superadmin.php';
            break;

        case 'bidding':
            include '../users/bidding.php';
            break;

        case 'gad':
            include '../users/gad.php';
            break;

        case 'job':
            include '../users/job.php';
            break;

        case 'news':
            include '../users/news.php';
            break;

        default:
            // Invalid role in DB
            session_destroy();
            header("Location: ../login.php");
            exit;
    }
    ?>
    <!-- Main Content Area -->
    <div class="sm:ml-64 p-4 mt-16 sm:mt-4 my-auto">

        <!-- Content Placeholder: Using the previous card component structure for demonstration -->
        <div class="bg-white p-6 mb-8">

            <div class="container mx-auto max-w-4xl py-6">

                <div class="container mx-auto max-w-4xl py-6 mb-4">

                    <div class="container mx-auto max-w-4xl py-6 mb-4">

                        <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Upload Transparency Seal
                            Document</h1>

                        <div
                            class="bg-white block max-w-5xl p-6 rounded-lg border-t-4 shadow-xl border-[#1a589e] mx-auto my-6">

                            <form id="add-transparency-seal-form" enctype="multipart/form-data">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                    <div>
                                        <label for="ts_year"
                                            class="block text-sm font-medium text-gray-700">Year</label>
                                        <select id="ts_year" name="ts_year" required
                                            class="mt-1 block w-full pl-3 pr-10 py-2.5 text-base border-gray-300 focus:outline-none focus:ring-[#1a589e] focus:border-[#1a589e] sm:text-sm rounded-lg shadow-sm">
                                            <option value="2026">2026</option>
                                            <option value="2025">2025</option>
                                            <option value="2024">2024</option>
                                            <option value="Archives">Archives</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="ts_document_title"
                                            class="block text-sm font-medium text-gray-700">Document Title</label>
                                        <input type="text" id="ts_document_title" name="ts_document_title"
                                            class="mt-1 p-2.5 border border-gray-300 rounded-lg text-sm w-full focus:ring-[#1a589e] focus:border-[#1a589e] shadow-sm"
                                            placeholder="Enter specific document name (e.g., Q1 Financial Report)">
                                    </div>
                                </div>

                                <div class="mt-6 border border-gray-200 p-4 rounded-lg bg-gray-50">
                                    <h3 class="text-lg font-bold text-gray-800 mb-3">Category (Select ONE)</h3>

                                    <div id="ts-category-list"
                                        class="grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-4 text-sm">
                                        <div class="md:col-span-2 space-y-2">
                                            <label class="flex items-start">
                                                <input type="radio" name="ts_category" value="I"
                                                    data-label="I. Calamba Water District's Mandate and Functions..."
                                                    class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]"
                                                    required>
                                                <span>I. Calamba Water District's Mandate and Functions; Names of
                                                    Officials with their Position, Designation, and Contact
                                                    Information</span>
                                            </label>
                                            <label class="flex items-start">
                                                <input type="radio" name="ts_category" value="II"
                                                    data-label="II. Annual Financial Reports"
                                                    class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                                <span>II. Annual Financial Reports</span>
                                            </label>
                                            <label class="flex items-start">
                                                <input type="radio" name="ts_category" value="III"
                                                    data-label="III. DBM Approved Budget and Corresponding Targets"
                                                    class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                                <span>III. DBM Approved Budget and Corresponding Targets</span>
                                            </label>
                                            <label class="flex items-start">
                                                <input type="radio" name="ts_category" value="IV"
                                                    data-label="IV. Projects, Programs and Activities, Beneficiaries, and Status of Implementation"
                                                    class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                                <span>IV. Projects, Programs and Activities, Beneficiaries, and Status
                                                    of Implementation</span>
                                            </label>
                                            <label class="flex items-start">
                                                <input type="radio" name="ts_category" value="V"
                                                    data-label="V. Annual Procurement Plan (APP non-CSE), Indicative APP non-CSE; and APP for Common-Supplies and Equipment"
                                                    class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                                <span>V. Annual Procurement Plan (APP non-CSE), Indicative APP non-CSE;
                                                    and APP for Common-Supplies and Equipment</span>
                                            </label>
                                            <label class="flex items-start">
                                                <input type="radio" name="ts_category" value="VI"
                                                    data-label="VI. QMS Certification of at least (1) one core process by any of the certification bodies (CB)"
                                                    class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                                <span>VI. QMS Certification of at least (1) one core process by any of
                                                    the certification bodies (CB)</span>
                                            </label>
                                            <label class="flex items-start">
                                                <input type="radio" name="ts_category" value="VII"
                                                    data-label="VII. System of Ranking Delivery Units for PBB"
                                                    class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                                <span>VII. System of Ranking Delivery Units for PBB</span>
                                            </label>
                                            <label class="flex items-start">
                                                <input type="radio" name="ts_category" value="VIII"
                                                    data-label="VIII. Agency Review and Compliance Procedure of Statements and Financial Disclosures"
                                                    class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                                <span>VIII. Agency Review and Compliance Procedure of Statements and
                                                    Financial Disclosures</span>
                                            </label>
                                            <label class="flex items-start">
                                                <input type="radio" name="ts_category" value="IX"
                                                    data-label="IX. Updated People's Freedom to Information (FOI) Manual, Agency Information Inventory, FOI Registry, and FOI Summary Report"
                                                    class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                                <span>IX. Updated People's Freedom to Information (FOI) Manual, Agency
                                                    Information Inventory, FOI Registry, and FOI Summary Report</span>
                                            </label>
                                        </div>

                                        <div class="md:col-span-2 pt-4 mt-2 border-t border-gray-200">
                                            <span class="block font-semibold text-gray-700 mb-2">X. Annexes
                                                (Sub-categories):</span>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-4 pl-4">
                                                <label class="flex items-start">
                                                    <input type="radio" name="ts_category" value="X-APTA"
                                                        data-label="X. Annexes - APTA Compliance"
                                                        class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                                    <span>APTA Compliance</span>
                                                </label>
                                                <label class="flex items-start">
                                                    <input type="radio" name="ts_category" value="X-PMR"
                                                        data-label="X. Annexes - Procurement Monitoring Report"
                                                        class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                                    <span>Procurement Monitoring Report</span>
                                                </label>
                                                <label class="flex items-start">
                                                    <input type="radio" name="ts_category" value="X-APCPI"
                                                        data-label="X. Annexes - Agency Procurement Compliance and Performance Indicator (APCPI)"
                                                        class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                                    <span>Agency Procurement Compliance and Performance Indicator
                                                        (APCPI)</span>
                                                </label>
                                                <label class="flex items-start">
                                                    <input type="radio" name="ts_category" value="X-PC"
                                                        data-label="X. Annexes - Posting Certification"
                                                        class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                                    <span>Posting Certification</span>
                                                </label>
                                                <label class="flex items-start">
                                                    <input type="radio" name="ts_category" value="X-PP"
                                                        data-label="X. Annexes - PHILGEPS Posting"
                                                        class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                                    <span>PHILGEPS Posting</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <label for="ts_pdf_file" class="block text-sm font-medium text-gray-700">File Upload
                                        (PDF)</label>
                                    <input type="file" id="ts_pdf_file" name="ts_pdf_file" accept="application/pdf"
                                        required
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 focus:ring-[#1a589e] focus:border-[#1a589e] shadow-sm">
                                    <p class="mt-1 text-xs text-gray-500">Only PDF files are accepted.</p>
                                </div>

                                <div class="flex justify-center mt-6">
                                    <button type="submit"
                                        class="w-full md:w-auto px-8 py-3 bg-[#1a589e] text-white font-bold text-lg rounded-full shadow-lg hover:bg-pink-600 focus:outline-none focus:ring-4 focus:ring-[#1a589e]/50 transition duration-300 ease-in-out">
                                        Upload Transparency Documemt
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>

            <div class="container mx-auto max-w-4xl py-6">

                <div class="relative max-w-6xl mx-auto bg-white rounded-xl">

                    <h1 class="text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-[#1a589e]">Transparency Seal
                    </h1>

                    <!-- Dropdown Trigger and Menu -->
                    <div class="absolute top-10 right-0 p-3 z-10">
                        <!-- Added data-dropdown-placement for correct positioning inside absolute div -->
                        <button id="dropdownIssueButton" data-dropdown-toggle="issueDropdown"
                            data-dropdown-placement="bottom-end"
                            class="p-2 text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-full" type="button">
                            <!-- Ellipsis Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                                fill="none" stroke="black" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-circle-ellipsis-icon lucide-circle-ellipsis">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M17 12h.01" />
                                <path d="M12 12h.01" />
                                <path d="M7 12h.01" />
                            </svg>
                        </button>

                        <!-- Dropdown Content -->
                        <div id="issueDropdown"
                            class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 absolute right-0 mt-2 border border-gray-100">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownIssueButton">
                                <li>
                                    <a href="#" id="editIssueButton"
                                        class="block px-4 py-2 hover:bg-gray-100 transition duration-100"
                                        data-modal-target="editTSModal" data-modal-toggle="editTSModal">
                                        Edit Advisory
                                    </a>
                                </li>
                                <li>
                                    <a href="#" id="deleteIssueButton"
                                        class="block px-4 py-2 text-red-600 hover:bg-red-50 transition duration-100">
                                        Delete Advisory
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Main container: Horizontal on large screens (sidebar), vertical blocks on small -->
                    <div class="lg:flex lg:flex-row h-full">

                        <!-- 1. TABS NAVIGATION (Sidebar on desktop, Tab Bar on mobile) -->
                        <div class="lg:w-48  lg:border-gray-200 lg:h-full">

                            <!-- Horizontal Tab Bar (Mobile/Default) with horizontal scroll and no vertical scroll -->
                            <div
                                class="text-sm font-medium text-center text-gray-700 scroll-tabs overflow-x-auto overflow-y-hidden whitespace-nowrap border-b border-gray-200 lg:border-b-0">
                                <ul class="flex -mb-px lg:flex-col sm:flex-row lg:mb-0 lg:space-y-1 lg:p-4">

                                    <!-- Tab: 2025 -->
                                    <li class="me-2 lg:me-0 lg:w-full">
                                        <button data-tab-target="#content-2025"
                                            class="tab-link w-full text-left inline-block p-3 border-b-2 border-transparent rounded-t-lg hover:text-blue-700 hover:border-gray-300 transition duration-150 ease-in-out
                                lg:p-3 lg:border-b-0 lg:rounded-lg lg:hover:bg-blue-50 lg:border-l-4 lg:hover:border-blue-700/50">
                                            2026
                                        </button>
                                    </li>

                                    <!-- Tab: 2024 -->
                                    <li class="me-2 lg:me-0 lg:w-full">
                                        <button data-tab-target="#content-2024"
                                            class="tab-link w-full text-left inline-block p-3 border-b-2 border-transparent rounded-t-lg hover:text-blue-700 hover:border-gray-300 transition duration-150 ease-in-out
                                    lg:p-3 lg:border-b-0 lg:rounded-lg lg:hover:bg-blue-50 lg:border-l-4 lg:hover:border-blue-700/50">
                                            2025
                                        </button>
                                    </li>

                                    <!-- Tab: 2023 -->
                                    <li class="me-2 lg:me-0 lg:w-full">
                                        <button data-tab-target="#content-2023"
                                            class="tab-link w-full text-left inline-block p-3 border-b-2 border-transparent rounded-t-lg hover:text-blue-700 hover:border-gray-300 transition duration-150 ease-in-out
                                    lg:p-3 lg:border-b-0 lg:rounded-lg lg:hover:bg-blue-50 lg:border-l-4 lg:hover:border-blue-700/50">
                                            2024
                                        </button>
                                    </li>

                                    <!-- Tab: Pre-2022 -->
                                    <li class="me-2 lg:me-0 lg:w-full">
                                        <button data-tab-target="#content-p2022"
                                            class="tab-link w-full text-left inline-block p-3 border-b-2 border-transparent rounded-t-lg hover:text-blue-700 hover:border-gray-300 transition duration-150 ease-in-out
                                    lg:p-3 lg:border-b-0 lg:rounded-lg lg:hover:bg-blue-50 lg:border-l-4 lg:hover:border-blue-700/50">
                                            Archives
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <!-- 2. CONTENT AREA -->
                        <div class="p-6 md:p-8 flex-grow bg-white rounded-br-xl rounded-bl-xl lg:rounded-bl-none">

                            <!-- Content for 2025 -->
                            <div id="content-2025" class="tab-content hidden">

                                <div class="max-w-3xl mx-auto">
                                    <div id="accordion-color-2025" data-accordion="collapse"
                                        class="rounded-lg  overflow-hidden ">

                                        <!-- PST 1 -->
                                        <h2 id="accordion-heading-1">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-1" aria-expanded="true"
                                                aria-controls="accordion-body-1">
                                                <span>I. Calamba Water District's Mandate and Functions; Names of
                                                    Officials
                                                    with their Position, Designation, and Contact Information</span>
                                                <!-- Initial state: Down arrow (closed appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 closed shrink-0 text-custom-brand"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>


                                        </h2>

                                        <div id="accordion-body-1" class="accordion-content bg-white"
                                            aria-labelledby="accordion-heading-1">
                                            <div class="p-4 md:p-4 border-b border-gray-50">
                                                <p class="mb-2 text-gray-600">

                                                </p>
                                            </div>
                                        </div>


                                        <!-- PST 2 -->
                                        <h2 id="accordion-heading-2" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-2" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>II. Annual Financial Reports</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-2" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">
                                                <p class="mb-2 text-gray-600"></p>
                                            </div>
                                        </div>


                                        <!-- PST 3 -->
                                        <h2 id="accordion-heading-3" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-3" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>III. DBM Approved Budget and Corresponding Targets</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-3" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">
                                                <p class="mb-2 text-gray-600">Not Applicable</p>
                                            </div>
                                        </div>

                                        <!-- PST 4 -->
                                        <h2 id="accordion-heading-4" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 hover:text-custom-brand hover:bg-custom-brand gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-4" aria-expanded="false"
                                                aria-controls="accordion-body-4">
                                                <span>IV. Projects, Programs and Activities, Beneficiaries, and Status
                                                    of
                                                    Implementation</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-4" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-3">
                                            <div class="p-4 md:p-5">

                                            </div>
                                        </div>

                                        <!-- PST 5 -->
                                        <h2 id="accordion-heading-5" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-5" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>V. Annual Procurement Plan (APP non-CSE), Indicative APP non-CSE;
                                                    and APP
                                                    for Common-Supplies and Equipment</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-5" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 6 -->
                                        <h2 id="accordion-heading-6" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-6" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>VI. QMS Certification of at least (1) one core process by any of
                                                    the
                                                    certification bodies (CB)</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-6" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 7 -->
                                        <h2 id="accordion-heading-6" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-7" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>VII. System of Ranking Delivery Units for PBB</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-7" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 8 -->
                                        <h2 id="accordion-heading-6" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-8" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>VIII. Agency Review and Compliance Procedure of Statements and
                                                    Financial
                                                    Disclosures</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-8" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 9 -->
                                        <h2 id="accordion-heading-9" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-9" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>IX. Updated People's Freedom to Information (FOl) Manual, Agency
                                                    Information Inventory, FOI Registry, and FOl Summary Report</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-9" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 10 -->
                                        <h2 id="accordion-heading-9" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-10" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>X. Annexes</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-10" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                                <h3 class="font-bold"> ARTA Compliance </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> Procurement Monitoring Report </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> Agency Procurement Compliance and Performance
                                                    Indicator
                                                    (APCPI) </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> Posting Certification </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> PHILGEPS Posting </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- Content for 2024 -->
                            <div id="content-2024" class="tab-content hidden">

                                <div class="max-w-3xl mx-auto">
                                    <div id="accordion-color-2024" data-accordion="collapse"
                                        class="rounded-lg  overflow-hidden ">

                                        <!-- PST 1 -->
                                        <h2 id="accordion-heading-124">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-124" aria-expanded="true"
                                                aria-controls="accordion-body-1">
                                                <span>I. Calamba Water District's Mandate and Functions; Names of
                                                    Officials
                                                    with their Position, Designation, and Contact Information</span>
                                                <!-- Initial state: Down arrow (closed appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 closed shrink-0 text-custom-brand"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-124" class="accordion-content bg-white"
                                            aria-labelledby="accordion-heading-1">
                                            <div class="p-4 md:p-4 border-b border-gray-50">
                                                <p class="mb-2 text-gray-600">

                                                </p>
                                            </div>
                                        </div>


                                        <!-- PST 2 -->
                                        <h2 id="accordion-heading-224" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-224" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>II. Annual Financial Reports</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-224" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">
                                                <p class="mb-2 text-gray-600"></p>
                                            </div>
                                        </div>


                                        <!-- PST 3 -->
                                        <h2 id="accordion-heading-324" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-324" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>III. DBM Approved Budget and Corresponding Targets</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-324" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">
                                                <p class="mb-2 text-gray-600">Not Applicable</p>
                                            </div>
                                        </div>

                                        <!-- PST 4 -->
                                        <h2 id="accordion-heading-424" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 hover:text-custom-brand hover:bg-custom-brand gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-424" aria-expanded="false"
                                                aria-controls="accordion-body-4">
                                                <span>IV. Projects, Programs and Activities, Beneficiaries, and Status
                                                    of
                                                    Implementation</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-424" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-3">
                                            <div class="p-4 md:p-5">

                                            </div>
                                        </div>

                                        <!-- PST 5 -->
                                        <h2 id="accordion-heading-524" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-524" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>V. Annual Procurement Plan (APP non-CSE), Indicative APP non-CSE;
                                                    and APP
                                                    for Common-Supplies and Equipment</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-524" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 6 -->
                                        <h2 id="accordion-heading-624" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-624" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>VI. QMS Certification of at least (1) one core process by any of
                                                    the
                                                    certification bodies (CB)</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-624" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 7 -->
                                        <h2 id="accordion-heading-724" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-724" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>VII. System of Ranking Delivery Units for PBB</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-724" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 8 -->
                                        <h2 id="accordion-heading-824" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-824" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>VIII. Agency Review and Compliance Procedure of Statements and
                                                    Financial
                                                    Disclosures</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-824" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 9 -->
                                        <h2 id="accordion-heading-924" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-924" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>IX. Updated People's Freedom to Information (FOl) Manual, Agency
                                                    Information Inventory, FOI Registry, and FOl Summary Report</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-924" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 10 -->
                                        <h2 id="accordion-heading-1024" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-1024" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>X. Annexes</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-1024" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                                <h3 class="font-bold"> ARTA Compliance </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> Procurement Monitoring Report </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> Agency Procurement Compliance and Performance
                                                    Indicator
                                                    (APCPI) </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> Posting Certification </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> PHILGEPS Posting </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- Content for 2023 -->
                            <div id="content-2023" class="tab-content hidden">

                                <div class="max-w-3xl mx-auto">
                                    <div id="accordion-color-2023" data-accordion="collapse"
                                        class="rounded-lg  overflow-hidden ">

                                        <!-- PST 1 -->
                                        <h2 id="accordion-heading-123">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-123" aria-expanded="true"
                                                aria-controls="accordion-body-1">
                                                <span>I. Calamba Water District's Mandate and Functions; Names of
                                                    Officials
                                                    with their Position, Designation, and Contact Information</span>
                                                <!-- Initial state: Down arrow (closed appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 closed shrink-0 text-custom-brand"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-123" class="accordion-content bg-white"
                                            aria-labelledby="accordion-heading-1">
                                            <div class="p-4 md:p-4 border-b border-gray-50">
                                                <p class="mb-2 text-gray-600">

                                                </p>
                                            </div>
                                        </div>


                                        <!-- PST 2 -->
                                        <h2 id="accordion-heading-223" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-223" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>II. Annual Financial Reports</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-223" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">
                                                <p class="mb-2 text-gray-600"></p>
                                            </div>
                                        </div>


                                        <!-- PST 3 -->
                                        <h2 id="accordion-heading-323" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-323" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>III. DBM Approved Budget and Corresponding Targets</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-323" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">
                                                <p class="mb-2 text-gray-600">Not Applicable</p>
                                            </div>
                                        </div>

                                        <!-- PST 4 -->
                                        <h2 id="accordion-heading-423" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 hover:text-custom-brand hover:bg-custom-brand gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-423" aria-expanded="false"
                                                aria-controls="accordion-body-4">
                                                <span>IV. Projects, Programs and Activities, Beneficiaries, and Status
                                                    of
                                                    Implementation</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-423" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-3">
                                            <div class="p-4 md:p-5">

                                            </div>
                                        </div>

                                        <!-- PST 5 -->
                                        <h2 id="accordion-heading-523" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-523" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>V. Annual Procurement Plan (APP non-CSE), Indicative APP non-CSE;
                                                    and APP
                                                    for Common-Supplies and Equipment</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-523" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 6 -->
                                        <h2 id="accordion-heading-623" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-623" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>VI. QMS Certification of at least (1) one core process by any of
                                                    the
                                                    certification bodies (CB)</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-623" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 7 -->
                                        <h2 id="accordion-heading-723" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-723" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>VII. System of Ranking Delivery Units for PBB</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-723" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 8 -->
                                        <h2 id="accordion-heading-823" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-823" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>VIII. Agency Review and Compliance Procedure of Statements and
                                                    Financial
                                                    Disclosures</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-823" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 9 -->
                                        <h2 id="accordion-heading-923" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-923" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>IX. Updated People's Freedom to Information (FOl) Manual, Agency
                                                    Information Inventory, FOI Registry, and FOl Summary Report</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-923" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 10 -->
                                        <h2 id="accordion-heading-1023" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-1023" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>X. Annexes</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-1023" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                                <h3 class="font-bold"> ARTA Compliance </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> Procurement Monitoring Report </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> Agency Procurement Compliance and Performance
                                                    Indicator
                                                    (APCPI) </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> Posting Certification </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> PHILGEPS Posting </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- Content for pre-2022 -->
                            <div id="content-p2022" class="tab-content hidden">

                                <div class="max-w-3xl mx-auto">
                                    <div id="accordion-color-p2022" data-accordion="collapse"
                                        class="rounded-lg  overflow-hidden ">

                                        <!-- PST 1 -->
                                        <h2 id="accordion-heading-122">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-122" aria-expanded="true"
                                                aria-controls="accordion-body-1">
                                                <span>I. Calamba Water District's Mandate and Functions; Names of
                                                    Officials
                                                    with their Position, Designation, and Contact Information</span>
                                                <!-- Initial state: Down arrow (closed appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 closed shrink-0 text-custom-brand"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-122" class="accordion-content bg-white"
                                            aria-labelledby="accordion-heading-1">
                                            <div class="p-4 md:p-4 border-b border-gray-50">
                                                <p class="mb-2 text-gray-600">

                                                </p>
                                            </div>
                                        </div>


                                        <!-- PST 2 -->
                                        <h2 id="accordion-heading-222" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-222" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>II. Annual Financial Reports</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-222" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">
                                                <p class="mb-2 text-gray-600"></p>
                                            </div>
                                        </div>


                                        <!-- PST 3 -->
                                        <h2 id="accordion-heading-322" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-322" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>III. DBM Approved Budget and Corresponding Targets</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-322" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">
                                                <p class="mb-2 text-gray-600">Not Applicable</p>
                                            </div>
                                        </div>

                                        <!-- PST 4 -->
                                        <h2 id="accordion-heading-422" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 hover:text-custom-brand hover:bg-custom-brand gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-422" aria-expanded="false"
                                                aria-controls="accordion-body-4">
                                                <span>IV. Projects, Programs and Activities, Beneficiaries, and Status
                                                    of
                                                    Implementation</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-422" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-3">
                                            <div class="p-4 md:p-5">

                                            </div>
                                        </div>

                                        <!-- PST 5 -->
                                        <h2 id="accordion-heading-522" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-522" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>V. Annual Procurement Plan (APP non-CSE), Indicative APP non-CSE;
                                                    and APP
                                                    for Common-Supplies and Equipment</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-522" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 6 -->
                                        <h2 id="accordion-heading-622" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-622" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>VI. QMS Certification of at least (1) one core process by any of
                                                    the
                                                    certification bodies (CB)</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-622" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 7 -->
                                        <h2 id="accordion-heading-722" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-722" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>VII. System of Ranking Delivery Units for PBB</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-722" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">
                                            </div>
                                        </div>

                                        <!-- PST 8 -->
                                        <h2 id="accordion-heading-822" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-822" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>VIII. Agency Review and Compliance Procedure of Statements and
                                                    Financial
                                                    Disclosures</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-822" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 9 -->
                                        <h2 id="accordion-heading-922" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-922" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>IX. Updated People's Freedom to Information (FOl) Manual, Agency
                                                    Information Inventory, FOI Registry, and FOl Summary Report</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-922" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                            </div>
                                        </div>

                                        <!-- PST 10 -->
                                        <h2 id="accordion-heading-1022" class="mt-4">
                                            <button type="button"
                                                class="accordion-button flex items-center justify-between w-full p-4 font-semibold rtl:text-right text-gray-700 border-b border-gray-200 hover:text-custom-brand hover:bg-custom-brand-light gap-3 transition-colors duration-200"
                                                data-accordion-target="#accordion-body-1022" aria-expanded="false"
                                                aria-controls="accordion-body-2">
                                                <span>X. Annexes</span>
                                                <!-- Initial state: Up arrow (open appearance) -->
                                                <svg class="svg-icon-rotate w-5 h-5 open shrink-0" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                                </svg>
                                            </button>
                                        </h2>

                                        <div id="accordion-body-1022" class="accordion-content hidden bg-white"
                                            aria-labelledby="accordion-heading-2">
                                            <div class="p-4 md:p-5 border-b border-gray-50">

                                                <h3 class="font-bold"> ARTA Compliance </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> Procurement Monitoring Report </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> Agency Procurement Compliance and Performance
                                                    Indicator
                                                    (APCPI) </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> Posting Certification </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                                <h3 class="font-bold"> PHILGEPS Posting </h3>
                                                <a href="#" target="_blank">
                                                    <p class="mb-2 text-gray-600">
                                                        - link
                                                    </p>
                                                </a><br>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>

    <!-- Edit Transparency Seal Files Modal -->

    <div id="editTSModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-2xl">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t bg-gray-50 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit Transparency Seal Document
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="editTSModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body (Contains the user's form content) -->
                <div class="p-6 space-y-6 max-h-[80vh] overflow-y-auto">

                    <form id="edit-transparency-seal-form" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label for="ts_year" class="block text-sm font-medium text-gray-700">Year</label>
                                <select id="ts_year" name="ts_year" required
                                    class="mt-1 block w-full pl-3 pr-10 py-2.5 text-base border-gray-300 focus:outline-none focus:ring-[#1a589e] focus:border-[#1a589e] sm:text-sm rounded-lg shadow-sm">
                                    <option value="2026">2026</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="Archives">Archives</option>
                                </select>
                            </div>

                            <div>
                                <label for="ts_document_title" class="block text-sm font-medium text-gray-700">Document
                                    Title</label>
                                <input type="text" id="ts_document_title" name="ts_document_title"
                                    class="mt-1 p-2.5 border border-gray-300 rounded-lg text-sm w-full focus:ring-[#1a589e] focus:border-[#1a589e] shadow-sm"
                                    placeholder="Enter specific document name (e.g., Q1 Financial Report)">
                            </div>
                        </div>

                        <div class="mt-6 border border-gray-200 p-4 rounded-lg bg-gray-50">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">Category (Select ONE)</h3>

                            <div id="ts-category-list" class="grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-4 text-sm">
                                <div class="md:col-span-2 space-y-2">
                                    <label class="flex items-start">
                                        <input type="radio" name="ts_category" value="I"
                                            data-label="I. Calamba Water District's Mandate and Functions..."
                                            class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]" required>
                                        <span>I. Calamba Water District's Mandate and Functions; Names of
                                            Officials with their Position, Designation, and Contact
                                            Information</span>
                                    </label>
                                    <label class="flex items-start">
                                        <input type="radio" name="ts_category" value="II"
                                            data-label="II. Annual Financial Reports"
                                            class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                        <span>II. Annual Financial Reports</span>
                                    </label>
                                    <label class="flex items-start">
                                        <input type="radio" name="ts_category" value="III"
                                            data-label="III. DBM Approved Budget and Corresponding Targets"
                                            class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                        <span>III. DBM Approved Budget and Corresponding Targets</span>
                                    </label>
                                    <label class="flex items-start">
                                        <input type="radio" name="ts_category" value="IV"
                                            data-label="IV. Projects, Programs and Activities, Beneficiaries, and Status of Implementation"
                                            class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                        <span>IV. Projects, Programs and Activities, Beneficiaries, and Status
                                            of Implementation</span>
                                    </label>
                                    <label class="flex items-start">
                                        <input type="radio" name="ts_category" value="V"
                                            data-label="V. Annual Procurement Plan (APP non-CSE), Indicative APP non-CSE; and APP for Common-Supplies and Equipment"
                                            class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                        <span>V. Annual Procurement Plan (APP non-CSE), Indicative APP non-CSE;
                                            and APP for Common-Supplies and Equipment</span>
                                    </label>
                                    <label class="flex items-start">
                                        <input type="radio" name="ts_category" value="VI"
                                            data-label="VI. QMS Certification of at least (1) one core process by any of the certification bodies (CB)"
                                            class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                        <span>VI. QMS Certification of at least (1) one core process by any of
                                            the certification bodies (CB)</span>
                                    </label>
                                    <label class="flex items-start">
                                        <input type="radio" name="ts_category" value="VII"
                                            data-label="VII. System of Ranking Delivery Units for PBB"
                                            class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                        <span>VII. System of Ranking Delivery Units for PBB</span>
                                    </label>
                                    <label class="flex items-start">
                                        <input type="radio" name="ts_category" value="VIII"
                                            data-label="VIII. Agency Review and Compliance Procedure of Statements and Financial Disclosures"
                                            class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                        <span>VIII. Agency Review and Compliance Procedure of Statements and
                                            Financial Disclosures</span>
                                    </label>
                                    <label class="flex items-start">
                                        <input type="radio" name="ts_category" value="IX"
                                            data-label="IX. Updated People's Freedom to Information (FOI) Manual, Agency Information Inventory, FOI Registry, and FOI Summary Report"
                                            class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                        <span>IX. Updated People's Freedom to Information (FOI) Manual, Agency
                                            Information Inventory, FOI Registry, and FOI Summary Report</span>
                                    </label>
                                </div>

                                <div class="md:col-span-2 pt-4 mt-2 border-t border-gray-200">
                                    <span class="block font-semibold text-gray-700 mb-2">X. Annexes
                                        (Sub-categories):</span>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-4 pl-4">
                                        <label class="flex items-start">
                                            <input type="radio" name="ts_category" value="X-APTA"
                                                data-label="X. Annexes - APTA Compliance"
                                                class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                            <span>APTA Compliance</span>
                                        </label>
                                        <label class="flex items-start">
                                            <input type="radio" name="ts_category" value="X-PMR"
                                                data-label="X. Annexes - Procurement Monitoring Report"
                                                class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                            <span>Procurement Monitoring Report</span>
                                        </label>
                                        <label class="flex items-start">
                                            <input type="radio" name="ts_category" value="X-APCPI"
                                                data-label="X. Annexes - Agency Procurement Compliance and Performance Indicator (APCPI)"
                                                class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                            <span>Agency Procurement Compliance and Performance Indicator
                                                (APCPI)</span>
                                        </label>
                                        <label class="flex items-start">
                                            <input type="radio" name="ts_category" value="X-PC"
                                                data-label="X. Annexes - Posting Certification"
                                                class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                            <span>Posting Certification</span>
                                        </label>
                                        <label class="flex items-start">
                                            <input type="radio" name="ts_category" value="X-PP"
                                                data-label="X. Annexes - PHILGEPS Posting"
                                                class="mt-1 mr-2 text-[#1a589e] rounded-full focus:ring-[#1a589e]">
                                            <span>PHILGEPS Posting</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <label for="ts_pdf_file" class="block text-sm font-medium text-gray-700">File Upload
                                (PDF)</label>
                            <input type="file" id="ts_pdf_file" name="ts_pdf_file" accept="application/pdf" required
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 focus:ring-[#1a589e] focus:border-[#1a589e] shadow-sm">
                            <p class="mt-1 text-xs text-gray-500">Only PDF files are accepted.</p>
                        </div>

                    </form>

                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                    <button type="submit" form="news-creation-form"
                        class="px-5 py-2.5 bg-[#1a589e] text-white font-bold rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out">
                        Save Changes
                    </button>
                    <button data-modal-hide="editTSModal" type="button"
                        class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-200">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="../js/sidenav.js"></script>
    <script src="../js/pts.js"></script>
    <script src="../js/tabpane.js"></script>


</body>

</html>