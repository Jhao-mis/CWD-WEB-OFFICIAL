<?php
/**
 * gadposts/view.php
 * Dynamic replacement for the old one-file-per-post pattern
 * (gadpost25-01.php, gadpost25-02.php, ...). Renders a single GAD
 * event's full article + photo carousel based on ?id=.
 */

include __DIR__ . '/../db.php'; // provides $conn (PDO)

$id = (int) ($_GET['id'] ?? 0);

if ($id <= 0) {
    http_response_code(404);
    include __DIR__ . '/../404.php';
    exit;
}

$stmt = $conn->prepare(
    "SELECT id, event_title, date_published, article_body
     FROM gad_events
     WHERE id = ? AND is_deleted = 0
     LIMIT 1"
);
$stmt->execute([$id]);
$event = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$event) {
    http_response_code(404);
    if (file_exists(__DIR__ . '/../404.php')) {
        include __DIR__ . '/../404.php';
    } else {
        echo 'GAD event not found.';
    }
    exit;
}

$imgStmt = $conn->prepare(
    "SELECT image_path, caption
     FROM gad_event_images
     WHERE event_id = ?
     ORDER BY sort_order ASC, id ASC"
);
$imgStmt->execute([$id]);
$images = $imgStmt->fetchAll(PDO::FETCH_ASSOC);

function gadpost_esc(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES);
}

$year = date('Y', strtotime($event['date_published']));
$publishedLabel = date('F j, Y', strtotime($event['date_published']));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= gadpost_esc($event['event_title']) ?> | CWD Gad Posts</title>

    <link rel="icon" type="image/x-icon" href="../img/CWDIcon.png" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/navtwnew.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        .article-content p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
            color: #374151;
            font-size: 1.05rem;
        }

        .carousel-item img,
        .carousel-slide img {
            height: 500px;
            object-fit: cover;
        }

        @media (max-width: 768px) {

            .carousel-item img,
            .carousel-slide img {
                height: 300px;
            }
        }

        .carousel-caption-overlay {
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem 1.25rem 1.25rem;
            color: white;
        }
    </style>

</head>

<body class="bg-gray-50 font-['Montserrat']">

    <main class="container mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-12">

            <!-- Main Content Area -->
            <div class="lg:w-2/3">
                <header class="mb-8">
                    <span
                        class="inline-block bg-pink-100 text-pink-600 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest mb-4">
                        <?= gadpost_esc($year) ?> Events
                    </span>
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                        <?= gadpost_esc($event['event_title']) ?>
                    </h1>

                    <div class="flex items-center text-gray-500 text-sm border-y border-gray-100 py-4">
                        <div class="flex items-center mr-6">
                            <i class="far fa-calendar-alt mr-2 text-[#1a589e]"></i>
                            Published on <?= gadpost_esc($publishedLabel) ?>
                        </div>
                    </div>
                </header>

                <?php if (!empty($images)): ?>
                    <!-- Carousel -->
                    <div class="relative w-full overflow-hidden rounded-2xl shadow-xl bg-black mb-8"
                        id="gad-carousel-container">
                        <div class="carousel-track flex transition-transform duration-300 ease-in-out"
                            id="carouselTrack">
                            <?php foreach ($images as $img): ?>
                                <div class="carousel-slide flex-shrink-0 w-full relative">
                                    <img src="../<?= gadpost_esc($img['image_path']) ?>" class="w-full h-[500px] object-cover"
                                        alt="<?= gadpost_esc($event['event_title']) ?>">
                                    <?php if (!empty($img['caption'])): ?>
                                        <div class="carousel-caption-overlay">
                                            <p class="text-sm italic"><?= gadpost_esc($img['caption']) ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <?php if (count($images) > 1): ?>
                            <button onclick="changeSlide(-1)"
                                class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 p-3 rounded-full text-white transition-all z-10">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button onclick="changeSlide(1)"
                                class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 p-3 rounded-full text-white transition-all z-10">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Article Body -->
                <div class="article-content">
                    <?php
                    // article_body is stored as plain text from the admin
                    // textarea; escape then preserve line breaks/paragraphs.
                    $paragraphs = preg_split('/\r\n\r\n|\n\n/', trim($event['article_body']));
                    foreach ($paragraphs as $para) {
                        echo '<p>' . nl2br(gadpost_esc(trim($para))) . '</p>';
                    }
                    ?>
                </div>

                <!-- Footer of Article -->
                <div class="mt-12 pt-8 border-t border-gray-200 flex flex-wrap gap-4 items-center justify-between">
                    <a href="../03_gad" class="inline-flex items-center text-[#1a589e] font-bold">
                        <i class="fas fa-arrow-left mr-2"></i> Back to GAD Reports
                    </a>
                </div>
            </div>

            <!-- Sidebar with FB Page Info -->
            <aside class="lg:w-1/3">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                    <div class="h-24 bg-[#1a589e] relative">
                        <div class="absolute -bottom-10 left-6">
                            <div class="w-20 h-20 bg-white p-1 rounded-xl shadow-md">
                                <img src="../img/gad.png" alt="CWD Logo"
                                    class="w-full h-full object-contain rounded-lg">
                            </div>
                        </div>
                    </div>

                    <div class="px-6 pt-12 pb-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">CWD Gender & Development</h3>
                        <p class="text-sm text-gray-500 mb-6 italic">@CWD_GAD</p>

                        <p class="text-sm text-gray-600 mb-8 leading-relaxed">
                            Stay updated with our latest activities, advocacies, and community programs. Follow our
                            official Facebook page for real-time updates.
                        </p>

                        <a href="https://www.facebook.com/profile.php?id=100088376628492" target="_blank"
                            class="w-full bg-[#1877F2] text-white py-3 rounded-xl font-bold flex items-center justify-center gap-3 hover:bg-[#166fe5] transition-colors shadow-lg">
                            <i class="fab fa-facebook text-xl"></i>
                            Follow us on Facebook
                        </a>
                    </div>
                </div>
            </aside>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php if (count($images) > 1): ?>
        <script>
            let currentSlideIndex = 0;

            function updateCarouselView() {
                const track = document.getElementById('carouselTrack');
                if (track) {
                    track.style.transform = `translateX(-${currentSlideIndex * 100}%)`;
                }
            }

            function changeSlide(direction) {
                const slides = document.querySelectorAll('.carousel-slide');
                currentSlideIndex += direction;
                if (currentSlideIndex >= slides.length) currentSlideIndex = 0;
                if (currentSlideIndex < 0) currentSlideIndex = slides.length - 1;
                updateCarouselView();
            }

            window.addEventListener('load', updateCarouselView);
        </script>
    <?php endif; ?>

</body>

</html>