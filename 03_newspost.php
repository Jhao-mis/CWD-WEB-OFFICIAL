<?php
require 'db.php';

/* =====================
   VALIDATE ID
===================== */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid article.");
}

$id = (int) $_GET['id'];

/* =====================
   FETCH ARTICLE
===================== */
$stmt = $conn->prepare("
    SELECT 
        news_headline, 
        article_body, 
        article_writer,
        news_image, 
        date_published
    FROM news
    WHERE id = ?
    LIMIT 1
");

$stmt->execute([$id]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$article) {
    die("Article not found.");
}

/* =====================
   HANDLE IMAGES (FIXED)
===================== */
$images = [];

if (!empty($article['news_image'])) {

    $decoded = json_decode($article['news_image'], true);

    // ✅ If valid JSON array
    if (is_array($decoded)) {
        $images = $decoded;
    }
    // ✅ If old single image (fallback)
    else {
        $images = [$article['news_image']];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD News Article</title>
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
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">News
                                Post</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold uppercase tracking-wide">CWD News
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
    <div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">

        <!-- Article Container -->
        <article class="bg-white shadow-xl rounded-lg border-t-4 border-[#1a589e] overflow-hidden">

            <?php if (!empty($images)): ?>
                <div class="carousel-box relative w-full aspect-video overflow-hidden">

                    <?php foreach ($images as $index => $img): ?>
                        <img src="Uploads/News/<?= htmlspecialchars($img) ?>"
                            class="carousel-img absolute w-full h-full object-cover transition-opacity duration-500 pointer-events-none <?= $index === 0 ? 'opacity-100' : 'opacity-0' ?>">
                    <?php endforeach; ?>

                    <button type="button" onclick="prevSlide(this)"
                        class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/50 text-white px-3 py-1 rounded">
                        ‹
                    </button>

                    <button type="button" onclick="nextSlide(this)"
                        class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/50 text-white px-3 py-1 rounded">
                        ›
                    </button>

                </div>
            <?php endif; ?>



            <div class="p-6 sm:p-8">

                <!-- Title -->
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4 leading-tight">
                    <?= htmlspecialchars($article['news_headline']) ?>
                </h1>

                <!-- Metadata -->
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 border-b pb-4">
                    <p class="text-sm font-semibold text-gray-500">
                        <time datetime="<?= $article['date_published'] ?>">
                            <?= date('F d, Y', strtotime($article['date_published'])) ?>
                        </time>
                    </p>

                    <?php if (!empty($article['article_writer'])): ?>
                        <p class="text-sm font-semibold text-[#1a589e]">
                            Written by: <?= htmlspecialchars($article['article_writer']) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Article Body -->
                <div class="text-gray-700 leading-relaxed space-y-6 whitespace-pre-line">
                    <?= htmlspecialchars($article['article_body']) ?>
                </div>

                <!-- Share Section -->
                <div class="mt-10 pt-6 border-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">
                        Share this Article!
                    </h3>

                    <button onclick="copyShareLink()" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md
                           text-white bg-blue-600 hover:bg-blue-700 transition">
                        Copy Share Link
                    </button>

                    <div id="copy-message"
                        class="mt-2 text-sm text-green-600 opacity-0 transition-opacity duration-300">
                        Link copied to clipboard!
                    </div>
                </div>

            </div>
        </article>
    </div>


    <!-- Back to Top -->
    <?php include 'includes/backtotop.php'; ?>

    <!-- Footer -->
    <?php include 'footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Js File for Sticky Nav -->
    <script src="./js/style.js"></script>
    <script src="./js/index.js"></script>

     <script>
        function copyShareLink() {
            navigator.clipboard.writeText(window.location.href);
            const msg = document.getElementById("copy-message");
            msg.classList.remove("opacity-0");
            setTimeout(() => msg.classList.add("opacity-0"), 2000);
        }
    </script>

    <script>
        function getImages(container) {
            return container.querySelectorAll('.carousel-img');
        }

        function showSlide(images, index) {
            if (!images.length) return;

            images.forEach(img => {
                img.classList.remove('opacity-100');
                img.classList.add('opacity-0');
            });

            images[index].classList.remove('opacity-0');
            images[index].classList.add('opacity-100');
        }

        function nextSlide(btn) {
            const container = btn.closest('.carousel-box');
            if (!container) return;

            const images = getImages(container);

            let current = [...images].findIndex(img => img.classList.contains('opacity-100'));
            if (current === -1) current = 0;

            let next = (current + 1) % images.length;
            showSlide(images, next);
        }

        function prevSlide(btn) {
            const container = btn.closest('.carousel-box');
            if (!container) return;

            const images = getImages(container);

            let current = [...images].findIndex(img => img.classList.contains('opacity-100'));
            if (current === -1) current = 0;

            let prev = (current - 1 + images.length) % images.length;
            showSlide(images, prev);
        }
    </script>

</body>

</html>