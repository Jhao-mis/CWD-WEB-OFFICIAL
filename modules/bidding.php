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
    <title>Bidding</title>
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

                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Add Bidding Opportunity</h1>

                <div class="bg-white block max-w-5xl p-6 rounded-lg border-t-4 shadow-xl border-[#1a589e] mx-auto my-6">

                    <form id="upload-bidding-form" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 gap-6">

                            <!-- Category (Dropdown Field) -->
                            <div>
                                <label for="category"
                                    class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                <select id="category" name="category" required
                                    class="block w-full pl-3 pr-10 py-2.5 text-base border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#1a589e] focus:border-[#1a589e] sm:text-sm">
                                    <option value="" disabled selected>Select a document type</option>
                                    <option value="Bidding Opportunities">Bidding Opportunities</option>
                                    <option value="Bid Bulletin/Addendum">Bid Bulletin/Addendum</option>
                                    <option value="Notice of Postponement">Notice of Postponement</option>
                                    <option value="Post Award Information">Post Award Information</option>
                                </select>
                            </div>

                            <!-- Bid Code (Text Field) -->
                            <div>
                                <label for="bid_code" class="block text-sm font-medium text-gray-700 mb-1">Bid
                                    Code</label>
                                <input type="text" id="bid_code" name="bid_code" required
                                    class="block w-full p-2.5 border border-gray-300 rounded-lg text-sm shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]"
                                    placeholder="e.g. CWD YYYY-##">
                            </div>

                            <!-- Bidding Title (Text Field) -->
                            <div>
                                <label for="bidding_title" class="block text-sm font-medium text-gray-700 mb-1">Bidding
                                    Title</label>
                                <input type="text" id="bidding_title" name="bidding_title" required
                                    class="block w-full p-2.5 border border-gray-300 rounded-lg text-sm shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]"
                                    placeholder="e.g., Supply and Delivery Various Office Equipment, Furniture and Fixtures of Different Departments">
                            </div>

                            <!-- Upload Date (Date Picker) -->
                            <div>
                                <label for="upload_date" class="block text-sm font-medium text-gray-700 mb-1">Upload
                                    Date</label>
                                <input type="date" id="upload_date" name="upload_date" required
                                    class="block w-full p-2.5 border border-gray-300 rounded-lg text-sm shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]">
                            </div>

                            <!-- Document File Upload (PDF/Zip) -->
                            <div>
                                <label for="document_file" class="block text-sm font-medium text-gray-700 mb-1">Document
                                    File (PDF or ZIP)</label>
                                <input type="file" id="document_file" name="document_file" accept=".pdf, .zip" required
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]">
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="w-full md:w-auto px-8 py-3 bg-[#1a589e] text-white font-bold text-lg rounded-full shadow-lg hover:bg-pink-600 focus:outline-none focus:ring-4 focus:ring-[#1a589e]/50 transition duration-300 ease-in-out">
                                    Upload Opportunity
                                </button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

            <div class="container mx-auto max-w-4xl py-6">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-[#1a589e]">Bidding Opportunities
                </h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">

                    <!-- Category Selector Card -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                        <label for="category"
                            class="block text-sm font-semibold text-gray-600 mb-2 uppercase tracking-wider">Document
                            Category</label>
                        <select id="category" name="category"
                            class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1a589e] focus:border-[#1a589e] sm:text-sm transition ease-in-out cursor-pointer">
                            <option value="Bidding Opportunities" selected>Bidding Opportunities</option>
                            <option value="Bid Bulletin/Addendum">Bid Bulletin/Addendum</option>
                            <option value="Notice of Postponement">Notice of Postponement</option>
                            <option value="Post Award Information">Post Award Information</option>
                        </select>
                    </div>

                    <!-- Quarter Selector Card -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                        <label for="quarter"
                            class="block text-sm font-semibold text-gray-600 mb-2 uppercase tracking-wider">Fiscal
                            Quarter</label>
                        <select id="quarter" name="quarter"
                            class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1a589e] focus:border-[#1a589e] sm:text-sm transition ease-in-out cursor-pointer">
                            <option value="Q1">First Quarter (Q1)</option>
                            <option value="Q2">Second Quarter (Q2)</option>
                            <option value="Q3">Third Quarter (Q3)</option>
                            <option value="Q4">Fourth Quarter (Q4)</option>
                        </select>
                    </div>

                </div>
                <!-- End Selectors Grid -->


                <!-- Dynamic Data Display Section -->
                <div>
                    <div id="message-box" class="hidden fixed top-4 right-4 w-full max-w-sm z-50"></div>

                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-4 gap-2">
                        <h2 id="table-title" class="text-2xl font-bold text-gray-800">Existing Bidding Documents</h2>

                    </div>

                    <div id="data-table-container"
                        class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                        <div class="text-center text-gray-500 py-20">Loading documents...</div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Editing Modal -->
    <!-- <div id="edit-modal" class="fixed inset-0 bg-gray-600 bg-opacity-75 hidden items-center justify-center p-4 z-40 transition-opacity duration-300" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden transform transition-all sm:my-8 sm:align-middle">
            <div class="bg-white px-6 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-xl leading-6 font-bold text-gray-900" id="modal-title">Edit Document Details</h3>
                        <div class="mt-4">
                            <form id="edit-form">
                                <input type="hidden" id="edit-doc-id">
                                <input type="hidden" id="edit-doc-category">

                                <div class="mb-4">
                                    <label for="edit-bid-code" class="block text-sm font-medium text-gray-700">Bid Code</label>
                                    <input type="text" id="edit-bid-code" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]">
                                </div>
                                <div class="mb-4">
                                    <label for="edit-bidding-title" class="block text-sm font-medium text-gray-700">Bidding Title</label>
                                    <input type="text" id="edit-bidding-title" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]">
                                </div>
                                <div class="mb-4">
                                    <label for="edit-upload-date" class="block text-sm font-medium text-gray-700">Upload Date</label>
                                    <input type="date" id="edit-upload-date" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]">
                                </div>
                                <div class="mb-4 border-b pb-4 border-gray-200">
                                    <label for="current-file-link" class="block text-sm font-medium text-gray-700">Current File</label>
                                    <p id="current-file-name" class="text-sm text-gray-500 mb-1"></p>
                                    <a id="current-file-link" href="#" target="_blank" class="text-[#1a589e] hover:underline block mt-1 text-sm truncate font-semibold">View Current Document Link</a>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="edit-document-file" class="block text-sm font-medium text-gray-700">Re-upload New File (PDF or ZIP)</label>
                                    <input type="file" id="edit-document-file" name="edit-document-file" accept=".pdf, .zip"
                                        class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]">
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-3 flex justify-end gap-3 rounded-b-xl">
                <button type="button" onclick="closeEditModal()" class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                    Cancel
                </button>
                <button type="button" onclick="saveEdit()"
                    class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#1a589e] text-base font-medium text-white hover:bg-[#15467e] focus:outline-none focus:ring-4 focus:ring-[#5b8ec5] sm:w-auto sm:text-sm">
                    Save Changes
                </button>
            </div>
        </div>
    </div> -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="../js/sidenav.js"></script>



</body>

</html>