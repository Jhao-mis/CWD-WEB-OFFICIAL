<?php
require 'db.php';

/* ================= PAGINATION ================= */
$limit = 4; // 6 articles per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

/* Get total count */
$countStmt = $conn->query("SELECT COUNT(*) FROM news");
$totalNews = $countStmt->fetchColumn();
$totalPages = ceil($totalNews / $limit);

/* Fetch paginated news */
$stmt = $conn->prepare("
    SELECT id, news_headline, article_body, article_writer,
           news_image, date_published
    FROM news
    ORDER BY date_published DESC
    LIMIT :limit OFFSET :offset
");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$newsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* Latest 5 posts for sidebar */
$latestStmt = $conn->prepare("
    SELECT id, news_headline, news_image, date_published
    FROM news
    ORDER BY date_published DESC
    LIMIT 5
");
$latestStmt->execute();
$latestNews = $latestStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD News</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">

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
                            <i class="fa-solid fa-newspaper w-5 mr-2"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">News</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">CWD News
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
    <br>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-10">

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">

            <!-- ================= LEFT SECTION (ARTICLES) ================= -->
            <div class="lg:col-span-3 space-y-10">

                <h2
                    class="text-2xl font-black uppercase tracking-wide mt-2 mb-2 text-[#1a589e] border-b-2 border-blue-500 pb-2">
                    Featured Articles
                </h2>

                <!-- Article Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <?php foreach ($newsList as $news): ?>
                        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300
                                border border-gray-100 overflow-hidden flex flex-col">

                            <!-- IMAGE -->
                            <?php
                            $image = null;

                            if (!empty($news['news_image'])) {
                                $decoded = json_decode($news['news_image'], true);

                                if (is_array($decoded)) {
                                    $image = $decoded[0] ?? null; // first image
                                } else {
                                    $image = $news['news_image']; // fallback
                                }
                            }
                            ?>

                            <?php if (!empty($image)): ?>
                                <div class="overflow-hidden">
                                    <img src="uploads/news/<?= htmlspecialchars($image) ?>"
                                        class="w-full h-48 object-cover hover:scale-105 transition duration-500">
                                </div>
                            <?php else: ?>
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400 text-sm">
                                    No Image Available
                                </div>
                            <?php endif; ?>

                            <!-- CONTENT -->
                            <div class="p-6 flex flex-col flex-grow">

                                <div class="bg-[#1a589e]/10 px-4 py-3 mb-4 rounded-md">
                                    <h3 class="text-lg font-bold text-[#1a589e] line-clamp-2">
                                        <?= htmlspecialchars($news['news_headline']) ?>
                                    </h3>
                                </div>

                                <p class="text-sm text-gray-500 mb-4">
                                    <?= date('F d, Y', strtotime($news['date_published'])) ?>
                                    <?php if (!empty($news['article_writer'])): ?>
                                        • <?= htmlspecialchars($news['article_writer']) ?>
                                    <?php endif; ?>
                                </p>

                                <?php
                                $excerpt = strip_tags($news['article_body']); // remove HTML if any
                                $excerpt = preg_replace('/\s+/', ' ', $excerpt); // remove extra spaces
                                $maxLength = 150;

                                if (strlen($excerpt) > $maxLength) {
                                    $excerpt = substr($excerpt, 0, $maxLength);
                                    $excerpt = substr($excerpt, 0, strrpos($excerpt, ' ')); // avoid cutting word
                                    $excerpt .= '...';
                                }
                                ?>

                                <p class="text-sm text-gray-700 mb-6">
                                    <?= htmlspecialchars($excerpt) ?>
                                </p>


                                <a href="03_newspost.php?id=<?= $news['id'] ?>"
                                    class="text-[#1a589e] font-semibold text-sm hover:text-blue-700 transition">
                                    View article →
                                </a>


                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if (empty($newsList)): ?>
                        <p class="text-gray-500 col-span-full">
                            No news articles available.
                        </p>
                    <?php endif; ?>

                </div>

                <!-- Pagination -->
                <?php if ($totalPages > 1): ?>
                    <div class="flex justify-center pt-10">
                        <nav>
                            <ul
                                class="flex items-center gap-1 text-sm rounded-lg overflow-hidden border border-gray-300 shadow-md bg-white">

                                <li>
                                    <a href="?page=<?= max(1, $page - 1) ?>" class="w-10 h-10 flex items-center justify-center hover:bg-gray-100
                                   <?= ($page <= 1) ? 'pointer-events-none opacity-40' : '' ?>">
                                        ‹
                                    </a>
                                </li>

                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li>
                                        <a href="?page=<?= $i ?>" class="w-10 h-10 flex items-center justify-center
                                       <?= ($page == $i)
                                           ? 'bg-blue-600 text-white'
                                           : 'hover:bg-gray-100 text-gray-700' ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <li>
                                    <a href="?page=<?= min($totalPages, $page + 1) ?>" class="w-10 h-10 flex items-center justify-center hover:bg-gray-100
                                   <?= ($page >= $totalPages) ? 'pointer-events-none opacity-40' : '' ?>">
                                        ›
                                    </a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                <?php endif; ?>

            </div>


            <!-- ================= RIGHT SECTION (LATEST HEADLINES) ================= -->
            <aside class="lg:col-span-1 space-y-6">

                <h2
                    class="text-2xl font-black uppercase tracking-wide mt-2 mb-2 text-[#1a589e] border-b-2 border-blue-500 pb-2">
                    Latest Headlines
                </h2>

                <div class="space-y-4">

                    <?php foreach ($latestNews as $news): ?>
                        <a href="03_newspost.php?id=<?= $news['id'] ?>"
                            class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-100 transition group">

                            <div class="w-12 h-12 rounded-lg overflow-hidden shadow-md flex-shrink-0">
                                <?php if (!empty($news['news_image'])): ?>
                                    <?php
                                    $thumb = null;

                                    if (!empty($news['news_image'])) {
                                        $decoded = json_decode($news['news_image'], true);
                                        $thumb = is_array($decoded) ? ($decoded[0] ?? null) : $news['news_image'];
                                    }
                                    ?>

                                    <?php if (!empty($thumb)): ?>
                                        <img src="uploads/news/<?= htmlspecialchars($thumb) ?>" class="w-full h-full object-cover">
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="w-full h-full bg-[#1a589e] flex items-center justify-center text-white text-xs">
                                        N
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-900 group-hover:text-blue-700 line-clamp-2">
                                    <?= htmlspecialchars($news['news_headline']) ?>
                                </p>
                                <p class="text-xs text-gray-500 mt-1">
                                    <?= date('F d, Y', strtotime($news['date_published'])) ?>
                                </p>
                            </div>

                        </a>
                    <?php endforeach; ?>

                    <?php if (empty($latestNews)): ?>
                        <p class="text-sm text-gray-500">
                            No recent posts.
                        </p>
                    <?php endif; ?>

                </div>

            </aside>

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