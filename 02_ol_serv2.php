<?php
require 'db.php';

/* =====================================================
   ADVISORY PAGINATION & FETCH LOGIC
===================================================== */
$limit = 5; // Items per page

// 1. EMERGENCY LOGIC
$emergencyPage = isset($_GET['e_page']) ? max(1, (int) $_GET['e_page']) : 1;
$e_offset = ($emergencyPage - 1) * $limit;

$totalE = $conn->query("SELECT COUNT(*) FROM advisories WHERE advisory_type='Emergency'")->fetchColumn();
$totalEmergencyPages = max(1, ceil($totalE / $limit));

$emergencyStmt = $conn->prepare("SELECT * FROM advisories WHERE advisory_type='Emergency' ORDER BY advisory_date DESC LIMIT $limit OFFSET $e_offset");
$emergencyStmt->execute();
$emergency = $emergencyStmt->fetchAll(PDO::FETCH_ASSOC);

// 2. SCHEDULED LOGIC
$scheduledPage = isset($_GET['s_page']) ? max(1, (int) $_GET['s_page']) : 1;
$s_offset = ($scheduledPage - 1) * $limit;

$totalS = $conn->query("SELECT COUNT(*) FROM advisories WHERE advisory_type='Scheduled'")->fetchColumn();
$totalScheduledPages = max(1, ceil($totalS / $limit));

$scheduledStmt = $conn->prepare("SELECT * FROM advisories WHERE advisory_type='Scheduled' ORDER BY advisory_date DESC LIMIT $limit OFFSET $s_offset");
$scheduledStmt->execute();
$scheduled = $scheduledStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Water Service Notices | Online Services</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/about.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        .advisory-scroll {
            max-height: 290px; 
            overflow-y: auto;
            scrollbar-width: thin;
        }
        .advisory-scroll::-webkit-scrollbar { width: 6px; }
        .advisory-scroll::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 10px; }
        
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }
    </style>
</head>

<body class="bg-gray-50">

    <?php include 'includes/navigation.php'; ?>

    <div class="relative bg-[#1a589e] text-white overflow-hidden py-16 sm:py-20 md:py-24">
        <div class="container mx-auto">
            <br>
            <nav class="flex mt-3 mx-7" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="./services" class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">
                            <i class="fa-solid fa-droplet text-sm mr-2"></i> Services
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-3.5 h-3.5 text-white" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                            </svg>
                            <i class="fa-solid fa-mobile-screen-button mr-2"></i>
                            <a href="./02_ol_serv" class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Online Services</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-3.5 h-3.5 text-white" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                            </svg>
                            <i class="fa-solid fa-bullhorn mr-2 ml-1"></i>
                            <span class="text-m font-medium">Notices</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <br><br>

        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">Water Service Notices</h1>
        </div>
        <svg class="absolute bottom-0 left-0 w-full h-[60px] z-0" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="white" d="M0,128L1440,96L1440,320L0,320Z"></path>
        </svg>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="row">

            <div class="col-12 col-md-9">
                <div class="bg-white block p-6 border rounded-lg shadow-lg mb-6">
                    <h5 class="mb-3 text-2xl font-black uppercase text-[#f61a1a] flex items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation"></i> Emergency
                    </h5>
                    <div class="advisory-scroll">
                        <nav class="nav flex-column lnav-red">
                            <?php if (empty($emergency)): ?>
                                <p class="text-gray-400 italic p-4">No emergency notices found.</p>
                            <?php else: foreach ($emergency as $row): ?>
                                <a class="lnav-link-red cursor-pointer" 
                                   data-title="<?= htmlspecialchars($row['advisory_title']) ?>"
                                   data-date="<?= date('F d, Y', strtotime($row['advisory_date'])) ?>"
                                   data-img="uploads/advisory/<?= $row['notice_image'] ?>">
                                    <h5 class="text-m font-semibold"><?= htmlspecialchars($row['advisory_title']) ?> on <?= date('M d, Y', strtotime($row['advisory_date'])) ?></h5>
                                </a>
                            <?php endforeach; endif; ?>
                        </nav>
                    </div>
                </div>

                <div class="bg-white block p-6 border rounded-lg shadow-lg">
                    <h5 class="mb-3 text-2xl font-black uppercase text-[#1a589e] flex items-center gap-2">
                        <i class="fa-solid fa-calendar-check"></i> Scheduled
                    </h5>
                    <div class="advisory-scroll">
                        <nav class="nav flex-column lnav">
                            <?php if (empty($scheduled)): ?>
                                <p class="text-gray-400 italic p-4">No scheduled notices found.</p>
                            <?php else: foreach ($scheduled as $row): ?>
                                <a class="lnav-link cursor-pointer" 
                                   data-title="<?= htmlspecialchars($row['advisory_title']) ?>"
                                   data-date="<?= date('F d, Y', strtotime($row['advisory_date'])) ?>"
                                   data-img="uploads/advisory/<?= $row['notice_image'] ?>">
                                    <h5 class="text-m font-semibold"><?= htmlspecialchars($row['advisory_title']) ?> on <?= date('M d, Y', strtotime($row['advisory_date'])) ?></h5>
                                </a>
                            <?php endforeach; endif; ?>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3 mx-auto mt-4 mt-md-0">
                <nav class="nav flex-column sidebar-nav">
                    <h3 class="text-2xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">
                        Online Services</h3>
                    <a class="tab-card" href="./02_ol_serv">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-mobile-screen"></i> Online Payment</h5>
                    </a>
                    <a class="tab-card" href="./02_ol_serv3">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-calculator"></i> Bill Calculator</h5>
                    </a>
                    <a class="tab-card active" href="#" aria-current="page">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-bullhorn"></i> Water Service Notices</h5>
                    </a>
                    <a class="tab-card" href="https://docs.google.com/forms/d/e/1FAIpQLSeN07_EsXAdLg6odGiWAUvU7T5mVR7UvjsohcdLQVhmJEm9ZQ/viewform" target="_blank">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-comment-sms"></i> Email & Text Blast</h5>
                    </a>
                    <a class="tab-card" href="https://www.foi.gov.ph/agencies/clwd/" target="_blank">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-inbox"></i> eFOI</h5>
                    </a>
                </nav>
            </div>

        </div>
    </div>

    <div id="main-modal" class="fixed inset-0 z-[1050] hidden flex justify-center items-center p-4 modal-overlay">
        <div class="relative w-full max-w-2xl bg-white rounded-xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">
            <div class="px-6 py-4 border-b flex justify-between items-center bg-gray-50">
                <div>
                    <h3 id="m-title" class="text-lg font-bold text-gray-900 leading-tight">Notice</h3>
                    <p id="m-date" class="text-sm text-gray-500 font-medium"></p>
                </div>
                <button id="modal-close-x" class="text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>
            </div>
            <div class="p-6 overflow-y-auto">
                <img id="m-img" src="" alt="Notice" class="w-full h-auto rounded-lg shadow-sm border mb-4">
            </div>
            <div class="px-6 py-4 border-t bg-gray-50 flex justify-end">
                <button id="modal-close-btn" class="bg-[#1a589e] text-white px-6 py-2 rounded-lg font-bold">Close</button>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('main-modal');
        const mTitle = document.getElementById('m-title');
        const mDate = document.getElementById('m-date');
        const mImg = document.getElementById('m-img');

        function openModal(title, date, imgPath) {
            mTitle.innerText = title;
            mDate.innerText = "Posted on: " + date;
            mImg.src = imgPath;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }

        document.addEventListener('click', function(e) {
            const link = e.target.closest('.lnav-link, .lnav-link-red');
            if (link) {
                e.preventDefault();
                openModal(link.dataset.title, link.dataset.date, link.dataset.img);
            }
        });

        document.getElementById('modal-close-x').onclick = closeModal;
        document.getElementById('modal-close-btn').onclick = closeModal;
        modal.onclick = (e) => { if(e.target === modal) closeModal(); };
    });
    </script>

    <?php include 'footer.php'; ?>
</body>
</html>