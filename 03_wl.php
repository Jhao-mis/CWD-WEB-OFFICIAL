<?php
require 'db.php';

/* =====================================================
   FETCH: CAROUSEL (FEATURED) ISSUES
===================================================== */
$carouselStmt = $conn->prepare("
    SELECT id, volume_issue, issue_title, cover_description, cover_image, pdf_file, issue_year
    FROM waterlife_issues
    WHERE is_featured = 1
    ORDER BY issue_year DESC, created_at DESC
");
$carouselStmt->execute();
$carouselIssues = $carouselStmt->fetchAll(PDO::FETCH_ASSOC);

/* =====================================================
   FETCH: ARCHIVE ISSUES
===================================================== */
$archiveStmt = $conn->prepare("
    SELECT id, issue_title, pdf_file, issue_year
    FROM waterlife_issues
    WHERE is_featured = 0
    ORDER BY issue_year DESC, created_at DESC
");
$archiveStmt->execute();
$archiveIssues = $archiveStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD Waterlife Magazine</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png"/>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>


    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/ind.css">

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
                        <a href="events"
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
                            <i class="fa-solid fa-book w-5 mr-2"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Waterlife</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">Waterlife
            </h1>
        </div>

        <svg class="absolute bottom-0 left-0 w-full h-[60px] sm:h-[120px] md:h-[100px] lg:h-[80px] z-0"
            viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="white" fill-opacity="1"
                d="M0,128L40,133.3C80,139,160,149,240,144C320,139,400,117,480,133.3C560,149,640,203,720,186.7C800,171,880,85,960,74.7C1040,64,1120,128,1200,144C1280,160,1360,128,1400,112L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
    </div>

    <br>


    <div class="container-fluid">
        <img src="./img/wlcv.png" class="img-fluid d-block mx-auto" alt="Responsive image">
        <h4 class="text-lg font-black text-center uppercase tracking-wide mt-2 mb-2">The Official News Magazine of Calamba
            Water District</h4>
    </div>

    <br>
    <br>

    <!-- WL Body -->

    <div id="waterlifeCarousel" class="relative w-full mx-auto max-w-7xl mt-12 p-4" data-carousel="static">

        <!-- Carousel Wrapper - Explicit minimum height added here -->
        <div class="relative overflow-hidden rounded-lg  min-h-[800px] sm:min-h-[400px]">

            <?php if (empty($carouselIssues)): ?>
                <div class="duration-700 ease-in-out" data-carousel-item="active">
                    <div class="w-full h-full p-6 flex justify-center items-center">
                        <div class="max-w-3xl h-full bg-white rounded-xl shadow-sm border-t-8 border-[#15467e]
                                    flex flex-col md:flex-row md:items-center w-full p-8 text-center">
                            <p class="w-full text-gray-500 text-lg">No issues have been published yet. Check back soon!</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php foreach ($carouselIssues as $index => $issue): ?>
                <!-- Item: <?= htmlspecialchars($issue['volume_issue']) ?> -->
                <div class="duration-700 ease-in-out" data-carousel-item="<?= $index === 0 ? 'active' : '' ?>">
                    <div class="w-full h-full p-6 flex justify-center items-center">
                        <!-- Card structure with new accent border -->
                        <div class="max-w-3xl h-full bg-white rounded-xl shadow-sm border-t-8 border-[#15467e]
                        flex flex-col md:flex-row md:items-center w-full">
                            <div class="w-full md:w-5/12 p-4 flex justify-center md:block ">
                                <img class="object-contain w-full rounded-xl bg-[#15467e] max-h-56 md:w-full md:h-auto shadow-lg"
                                    src="uploads/waterlife/covers/<?= htmlspecialchars($issue['cover_image']) ?>"
                                    alt="<?= htmlspecialchars($issue['volume_issue']) ?>">
                            </div>
                            <div
                                class="w-full md:w-7/12 p-4 md:p-8 max-h-61 overflow-y-auto md:max-h-full md:overflow-y-visible">
                                <h5 class="mb text-2xl font-bold tracking-tight text-gray-900">
                                    <?= htmlspecialchars($issue['volume_issue']) ?>
                                </h5>
                                <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900">
                                    <?= htmlspecialchars($issue['issue_title']) ?>
                                </h5>
                                <p class="mb-6 font-normal text-gray-700">
                                    <?= nl2br(htmlspecialchars($issue['cover_description'])) ?>
                                </p>
                                <a href="uploads/waterlife/pdf/<?= htmlspecialchars($issue['pdf_file']) ?>" target="_blank"
                                    class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-center text-white bg-[#1a589e] rounded-lg
                    hover:bg-[#15467e] focus:ring-4 focus:outline-none focus:ring-blue-300 transition duration-200 shadow-md">
                                    Read Issue
                                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" fill="none" viewBox="0 0 14 10"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Fixed CTA slide: link to the Archive modal -->
            <div class="duration-700 ease-in-out" data-carousel-item="">
                <div class="w-full h-full p-6 flex justify-center items-center">
                    <!-- Card structure with new accent border -->
                    <div class="max-w-3xl h-full bg-white rounded-xl shadow-sm border-t-8 border-[#15467e]
                    flex flex-col md:flex-row md:items-center w-full">
                        <div class="w-full md:w-5/12 p-4 flex justify-center md:block ">
                            <!-- Placeholder image URL used, added bg-gray-100 to differentiate from card background -->
                            <img class="object-contain w-full rounded-xl bg-[#15467e] max-h-56 md:w-full md:h-auto shadow-lg"
                                src="./img/wl25.png" alt="Waterlife Magazine 2025 Issue">
                        </div>
                        <!-- SCROLLING ADDED HERE: max-h-48 (sets max height on mobile) and overflow-y-auto (enables scrolling) -->
                        <div
                            class="w-full md:w-7/12 p-4 md:p-8 max-h-61 overflow-y-auto md:max-h-full md:overflow-y-visible">
                            <h5 class="mb text-2xl font-bold tracking-tight text-gray-900">Archives</h5>
                            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900">View all archives issues
                            </h5>
                            <p class="mb-6 font-normal text-gray-700">Looks like you've checked out all this year's
                                issues. Keep
                                reading on our past issues here!
                            </p>
                            <button type="button"
                                class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-center text-white bg-[#1a589e] rounded-lg
                    hover:bg-[#15467e] focus:ring-4 focus:outline-none focus:ring-blue-300 transition duration-200 shadow-md"
                                data-modal-target="archive-modal" data-modal-toggle="archive-modal">
                                View Archive
                                <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" viewBox="0 0 14 10"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Previous Button -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>

            <span class="inline-flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="#15467e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-left-icon lucide-chevron-left">
                    <path d="m15 18-6-6 6-6" />
                </svg>

            </span>
        </button>

        <!-- Next Button -->
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span class="inline-flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="#15467e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-right-icon lucide-chevron-right">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </span>
        </button>
    </div>

    <!-- WL ARCHIVE MODAL (Light Theme Enforced) -->
    <div id="archive-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">

            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-xl">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-200 bg-[#15467e]">
                    <h3 class="text-xl font-semibold text-white">
                        <i class="fa-solid fa-box-archive text-[#fff] mr-2"></i>  Waterlife Magazine Archives
                    </h3>
                    <button type="button"
                        class="text-gray-200 bg-transparent hover:bg-[#0f345a] hover:text-white rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center transition duration-150"
                        data-modal-hide="archive-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body (Table of Archives) -->
                <div class="p-6 space-y-6 max-h-[70vh] overflow-y-auto">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-200">
                        
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 sticky top-0">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Issue Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center w-32">
                                        Year
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center w-32">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($archiveIssues)): ?>
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                            No archived issues yet.
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <?php foreach ($archiveIssues as $row): ?>
                                    <tr class="bg-white border-b hover:bg-blue-50">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <?= htmlspecialchars($row['issue_title']) ?>
                                        </th>
                                        <td class="px-6 py-4 text-center">
                                            <?= htmlspecialchars($row['issue_year']) ?>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="uploads/waterlife/pdf/<?= htmlspecialchars($row['pdf_file']) ?>" target="_blank"
                                                class="font-medium text-[#1a589e]"><i class="fa-solid fa-eye"></i> View</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <!-- Fixed reference row for issues predating the database records -->
                                <tr class="bg-white border-b hover:bg-blue-50">
                                    <th scope="row" colspan="2" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        <i class="fa-solid fa-box-archive text-[#1a589e] mr-2"></i> Waterlife Issues Before 2014
                                    </th>

                                    <td class="px-6 py-4 text-center">
                                        <a href="https://cwd.com.ph/events_past1.html" target="_blank"
                                            class="font-medium text-[#1a589e]"><i class="fa-solid fa-arrow-up-right-from-square mr-2"></i> Visit</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="archive-modal" type="button"
                        class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-150">
                        Close
                    </button>
                </div>
            </div>

        </div>
    </div>

    <br>
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