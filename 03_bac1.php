<?php

include 'db.php';
const PUBLIC_CATEGORY = 'Bidding Opportunities';

const QUARTER_MONTHS = [
    'Q1' => [1, 2, 3],
    'Q2' => [4, 5, 6],
    'Q3' => [7, 8, 9],
    'Q4' => [10, 11, 12],
];

function quarterFromDate(string $ymd): string
{
    $month = (int) substr($ymd, 5, 2);
    if ($month <= 3) return 'Q1';
    if ($month <= 6) return 'Q2';
    if ($month <= 9) return 'Q3';
    return 'Q4';
}

function h(?string $s): string
{
    return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8');
}

$year = $_GET['year'] ?? date('Y');
if (!ctype_digit((string) $year) || strlen((string) $year) !== 4) {
    $year = date('Y');
}

$stmt = $conn->prepare(
    "SELECT id, bid_code, bidding_title, upload_date, file_name, file_path
     FROM bidding_documents
     WHERE is_deleted = 0
       AND category = ?
       AND YEAR(upload_date) = ?
     ORDER BY upload_date DESC, id DESC"
);
$stmt->execute([PUBLIC_CATEGORY, $year]);
$allDocs = $stmt->fetchAll(PDO::FETCH_ASSOC);

$grouped = ['Q1' => [], 'Q2' => [], 'Q3' => [], 'Q4' => []];
foreach ($allDocs as $doc) {
    $q = quarterFromDate($doc['upload_date']);
    $monthName = date('F', strtotime($doc['upload_date']));
    $grouped[$q][$monthName][] = $doc;
}

$defaultQuarter = !empty($allDocs) ? quarterFromDate($allDocs[0]['upload_date']) : 'Q1';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD Bidding Opportunities</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png"/>


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>


    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/ind.css">
    <link rel="stylesheet" href="./css/bac.css">
    <link rel="stylesheet" href="./css/sidenav.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>


    <!-- Header -->

    <div class="relative bg-[#1a589e] text-white overflow-hidden py-16 sm:py-20 md:py-24">

        <div class="container">

            <!-- Breadcrumb -->
            <nav class="flex mt-3 mx-7" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="./events"
                            class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">
                            <i class="fa-solid fa-calendar-days text-sm mr-2"></i>
                            Events
                        </a>
                    </li>

                    <li>
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-3.5 h-3.5 rtl:rotate-180 text-body" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m9 5 7 7-7 7" />
                            </svg>
                            <i class="fa-solid fa-gavel w-5 mr-2"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Bidding Opportunities</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">Bids and Awards
            </h1>
        </div>

        <svg class="absolute bottom-0 left-0 w-full h-[60px] sm:h-[120px] md:h-[100px] lg:h-[80px] z-0"
            viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="white" fill-opacity="1"
                d="M0,128L40,133.3C80,139,160,149,240,144C320,139,400,117,480,133.3C560,149,640,203,720,186.7C800,171,880,85,960,74.7C1040,64,1120,128,1200,144C1280,160,1360,128,1400,112L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto">
        <div class="row g-0 mt-4">

            <!-- Bidding -->
            <div class="col-sm-6 col-md-8 mb-4">
                <h4 class="text-2xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">
                    Bidding Opportunities</h4>

                <h5 class="inv text-slate-600">Invitation to Bid for the Year <span id="bacyear"><?= h((string) $year) ?></span></h5>

                <div class="container mx-auto bo">

                    <!-- Pagination Component (Bootstrap Pills for Quarters) -->
                    <nav aria-label="Year navigation" class="mb-4 d-flex justify-content-center">
                        <ul class="nav nav-pills shadow-sm rounded-pill p-1 bg-white" id="pills-tab" role="tablist">
                            <?php foreach (['Q1', 'Q2', 'Q3', 'Q4'] as $q): ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link-pag <?= $q === $defaultQuarter ? 'active' : '' ?>"
                                        id="pills-<?= strtolower($q) ?>-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-<?= strtolower($q) ?>" type="button" role="tab"
                                        aria-controls="pills-<?= strtolower($q) ?>"
                                        aria-selected="<?= $q === $defaultQuarter ? 'true' : 'false' ?>">
                                        <?= $q ?>
                                    </button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>

                    <!-- Tab Content (Bidding Postings Tables) -->
                    <div class="tab-content" id="pills-tabContent">

                        <?php foreach (['Q1', 'Q2', 'Q3', 'Q4'] as $q): ?>
                            <div class="tab-pane fade <?= $q === $defaultQuarter ? 'show active' : '' ?>"
                                id="pills-<?= strtolower($q) ?>" role="tabpanel"
                                aria-labelledby="pills-<?= strtolower($q) ?>-tab">
                                <div class="content-table">

                                    <div class="header-row bg-[#1a589e]">
                                        <div class="col-bidcode">Bid Code</div>
                                        <div class="col-title text-center font-bold">Bidding Title</div>
                                        <div class="col-date bac">Upload Date</div>
                                    </div>

                                    <div id="scrollableTableBody">
                                        <?php if (empty($grouped[$q])): ?>
                                            <div class="data-row justify-content-center">
                                                <div class="header-month font-bold text-slate-400">No postings for this quarter</div>
                                            </div>
                                        <?php else: ?>
                                            <?php foreach ($grouped[$q] as $monthName => $docs): ?>
                                                <div class="data-row justify-content-center">
                                                    <div class="header-month font-bold"><?= strtoupper(h($monthName)) ?></div>
                                                </div>

                                                <?php foreach ($docs as $doc): ?>
                                                    <div class="data-row">
                                                        <a href="<?= h($doc['file_path']) ?>" download="<?= h($doc['file_name']) ?>"
                                                            class="col-date bac text-left text-decoration-none">
                                                            <?= h($doc['bid_code']) ?>
                                                        </a>
                                                        <a href="<?= h($doc['file_path']) ?>" download="<?= h($doc['file_name']) ?>"
                                                            class="col-title bac text-decoration-none">
                                                            <?= h($doc['bidding_title']) ?>
                                                        </a>
                                                        <div class="col-date"><?= date('F j', strtotime($doc['upload_date'])) ?></div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div> <!-- End tab-content -->

                </div>

            </div>


            <!-- Left Navigation -->
            <?php include 'includes/bacleftnav.php'; ?>

        </div>
    </div>

    <br>
    <br>

    <!-- Back to Top -->
    <?php include 'includes/backtotop.php'; ?>

    <!-- Footer -->
    <?php include 'footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="./js/index.js"></script>

</body>

</html>