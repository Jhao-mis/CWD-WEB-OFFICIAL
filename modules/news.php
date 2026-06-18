<?php
/* =====================
   AUTH + SESSION GUARD
===================== */
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

require '../db.php';

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

if (!$userInfo || empty($userInfo['role'])) {
    session_destroy();
    header("Location: ../login.php");
    exit;
}

$role = strtolower(trim($userInfo['role']));

$uploadDir = "../Uploads/News/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$errorMsg = '';

/* =====================
   HANDLE CREATE NEWS
===================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['update_news']) && !isset($_POST['delete_news'])) {

    if (!in_array($role, ['superadmin', 'news'])) {
        $errorMsg = 'You are not authorized to publish news.';
    } else {

        $news_headline = trim($_POST['news_headline'] ?? '');
        $article_body = trim($_POST['article_body'] ?? '');
        $article_writer = trim($_POST['article_writer'] ?? '');
        $date_published = $_POST['date_published'] ?? '';

        if ($news_headline === '' || $article_body === '' || $article_writer === '' || $date_published === '') {
            $errorMsg = 'All fields are required.';
        } else {

            /* IMAGE UPLOAD */
            /* MULTIPLE IMAGE UPLOAD */
            $uploadedImages = [];

            if (!empty($_FILES['news_images']['name'][0])) {

                $allowedExt = ['jpg', 'jpeg', 'png', 'webp'];

                foreach ($_FILES['news_images']['name'] as $key => $fileName) {

                    $tmp = $_FILES['news_images']['tmp_name'][$key];
                    $size = $_FILES['news_images']['size'][$key];
                    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                    if (!in_array($ext, $allowedExt)) {
                        $errorMsg = "Invalid image format.";
                        break;
                    }

                    if ($size > 50 * 1024 * 1024) {
                        $errorMsg = "Each image must be less than 50MB.";
                        break;
                    }

                    $newName = 'news_' . time() . '_' . rand(1000, 9999) . '_' . $key . '.' . $ext;

                    if (move_uploaded_file($tmp, $uploadDir . $newName)) {
                        $uploadedImages[] = $newName;
                    }
                }
            }

            if (!$errorMsg) {

                $stmt = $conn->prepare("
                    INSERT INTO news (
                        news_headline,
                        article_body,
                        article_writer,
                        news_image,
                        date_published,
                        created_by
                    ) VALUES (
                        :headline,
                        :body,
                        :writer,
                        :image,
                        :date,
                        :created_by
                    )
                ");

                $stmt->execute([
                    ':headline' => $news_headline,
                    ':body' => $article_body,
                    ':writer' => $article_writer,
                    ':image' => json_encode($uploadedImages),
                    ':date' => $date_published,
                    ':created_by' => $userInfo['id']
                ]);

                $_SESSION['news_success'] = true;
                header("Location: news.php");
                exit;
            }
        }
    }
}

/* =====================
   HANDLE UPDATE NEWS
===================== */
/* =====================
   HANDLE UPDATE NEWS (FIXED MULTI IMAGE)
===================== */
if (isset($_POST['update_news'])) {

    $newsId = $_POST['news_id'];

    $news_headline = trim($_POST['news_headline']);
    $article_body = trim($_POST['article_body']);
    $article_writer = trim($_POST['article_writer']);
    $date_published = $_POST['date_published'];

    // 🔥 EXISTING IMAGES
    $existingImages = $_POST['existing_images'] ?? [];

    // 🔥 DELETE SELECTED IMAGES
    $deleteImages = $_POST['delete_images'] ?? [];

    foreach ($deleteImages as $img) {
        if (file_exists($uploadDir . $img)) {
            unlink($uploadDir . $img);
        }
        $existingImages = array_diff($existingImages, [$img]);
    }

    // 🔥 ADD NEW IMAGES
    $newImages = [];

    if (!empty($_FILES['news_images']['name'][0])) {

        $allowedExt = ['jpg', 'jpeg', 'png', 'webp'];

        foreach ($_FILES['news_images']['name'] as $key => $fileName) {

            $tmp = $_FILES['news_images']['tmp_name'][$key];
            $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (!in_array($ext, $allowedExt))
                continue;

            $newName = 'news_' . time() . '_' . rand(1000, 9999) . '_' . $key . '.' . $ext;

            if (move_uploaded_file($tmp, $uploadDir . $newName)) {
                $newImages[] = $newName;
            }
        }
    }

    // 🔥 MERGE ALL IMAGES
    $finalImages = array_merge($existingImages, $newImages);

    $stmt = $conn->prepare("
        UPDATE news SET
            news_headline = :headline,
            article_body = :body,
            article_writer = :writer,
            news_image = :image,
            date_published = :date
        WHERE id = :id
    ");

    $stmt->execute([
        ':headline' => $news_headline,
        ':body' => $article_body,
        ':writer' => $article_writer,
        ':image' => json_encode(array_values($finalImages)),
        ':date' => $date_published,
        ':id' => $newsId
    ]);

    $_SESSION['news_success'] = true;
    header("Location: news.php");
    exit;
}

/* =====================
   HANDLE DELETE NEWS
===================== */
/* =====================
   HANDLE DELETE NEWS (FIXED)
===================== */
if (isset($_POST['delete_news'])) {

    $newsId = $_POST['news_id'];

    $stmtImg = $conn->prepare("SELECT news_image FROM news WHERE id = ?");
    $stmtImg->execute([$newsId]);
    $news = $stmtImg->fetch(PDO::FETCH_ASSOC);

    if (!empty($news['news_image'])) {

        $images = json_decode($news['news_image'], true);

        if (is_array($images)) {
            foreach ($images as $img) {
                if (file_exists($uploadDir . $img)) {
                    unlink($uploadDir . $img);
                }
            }
        } else {
            if (file_exists($uploadDir . $news['news_image'])) {
                unlink($uploadDir . $news['news_image']);
            }
        }
    }

    $stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
    $stmt->execute([$newsId]);

    $_SESSION['news_success'] = true;
    header("Location: news.php");
    exit;
}

/* =====================
   FETCH NEWS POSTS
===================== */
$newsStmt = $conn->prepare("
    SELECT n.*, u.firstname, u.lastname
    FROM news n
    LEFT JOIN users u ON u.id = n.created_by
    ORDER BY n.created_at DESC
");
$newsStmt->execute();
$newsList = $newsStmt->fetchAll(PDO::FETCH_ASSOC);

/* =====================
   PAGINATION SETTINGS
===================== */
$limit = 6;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

/* Get total records */
$countStmt = $conn->query("SELECT COUNT(*) FROM news");
$totalNews = $countStmt->fetchColumn();
$totalPages = ceil($totalNews / $limit);

/* Fetch paginated results */
$newsStmt = $conn->prepare("
    SELECT n.*, u.firstname, u.lastname
    FROM news n
    LEFT JOIN users u ON u.id = n.created_by
    ORDER BY n.created_at DESC
    LIMIT :limit OFFSET :offset
");

$newsStmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$newsStmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$newsStmt->execute();

$newsList = $newsStmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="icon" type="image/svg+xml" href="../img/CWDIcon.png">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/db_bg.css">

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
    switch ($role) {
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
            session_destroy();
            header("Location: ../login.php");
            exit;
    }

    ?>

    <!-- =====================
     MAIN CONTENT AREA
===================== -->
    <div class="sm:ml-64 p-4 mt-16 sm:mt-4 my-auto">

        <div class="bg-white p-6 mb-8">
            <div class="container mx-auto max-w-4xl py-6">

                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
                    Create News Post
                </h1>
                <!-- SWEET ALERT -->
                <?php if (!empty($_SESSION['news_success'])): ?>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'News post published successfully.',
                                confirmButtonColor: '#1a589e'
                            });
                        });
                    </script>
                    <?php unset($_SESSION['news_success']); endif; ?>

                <?php if ($errorMsg): ?>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: '<?= htmlspecialchars($errorMsg) ?>',
                                confirmButtonColor: '#d33'
                            });
                        });
                    </script>
                <?php endif; ?>

                <!-- UPLOAD FORM -->
                <form id="publishForm" method="POST" enctype="multipart/form-data" class="bg-white p-6 md:p-10 rounded-xl shadow-2xl 
           border-t-4 border-[#1a589e]
           min-h-[650px]">

                    <div class="mb-6">
                        <label class="block text-lg font-semibold text-gray-700 mb-2">
                            News Headline
                        </label>
                        <input type="text" name="news_headline" required
                            value="<?= htmlspecialchars($_POST['news_headline'] ?? '') ?>"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500"
                            placeholder="Enter the title of the news article">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                        <div>
                            <label class="block text-lg font-semibold text-gray-700 mb-2">
                                Date Published
                            </label>
                            <input type="date" name="date_published" required
                                value="<?= htmlspecialchars($_POST['date_published'] ?? '') ?>"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
                        </div>

                        <div>
                            <label class="block text-lg font-semibold text-gray-700 mb-2">
                                Article Writer
                            </label>
                            <input type="text" name="article_writer" required
                                value="<?= htmlspecialchars($_POST['article_writer'] ?? '') ?>"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500"
                                placeholder="e.g., John Doe">
                        </div>

                    </div>

                    <div class="mb-6">
                        <label class="block text-lg font-semibold text-gray-700 mb-2">
                            Upload News Image
                        </label>
                        <input type="file" name="news_images[]" accept="image/*" multiple
                            class="w-full p-2 border border-gray-300 rounded-lg">
                        <p class="text-sm text-gray-500 mt-1">
                            Allowed: JPG, PNG,(Max 50MB) Multiple image
                        </p>
                    </div>


                    <div class="mb-8">
                        <label class="block text-lg font-semibold text-gray-700 mb-2">
                            Article Body
                        </label>
                        <textarea name="article_body" required class="w-full p-3 border border-gray-300 rounded-lg 
                   focus:ring-pink-500 focus:border-pink-500 
                   h-[220px] resize-y"
                            placeholder="Start writing your news content here..."><?= htmlspecialchars($_POST['article_body'] ?? '') ?></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="w-full md:w-auto px-8 py-3 bg-[#1a589e] text-white 
    font-bold text-lg rounded-full shadow-lg 
    hover:bg-pink-600 focus:ring-4 focus:ring-[#1a589e]/50 transition">
                            Publish News Post
                        </button>
                    </div>
                    <script>
                        const publishForm = document.getElementById('publishForm');

                        publishForm.addEventListener('submit', function (e) {

                            e.preventDefault(); // 🚫 stop normal submit

                            Swal.fire({
                                title: 'Publish News?',
                                text: "This will make the news visible.",
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor: '#1a589e',
                                cancelButtonColor: '#6b7280',
                                confirmButtonText: 'Yes, publish it!'
                            }).then((result) => {

                                if (result.isConfirmed) {
                                    publishForm.submit(); // ✅ continue submit
                                }
                            });
                        });
                    </script>
                </form>

            </div>
        </div>
    </div>

    <!-- POSTED NEWS CARD -->


    <div class="sm:ml-64 p-4 mt-16 sm:mt-4 my-auto">

        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center md:text-left">
            Published News
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($newsList as $news): ?>

                <?php
                $images = [];
                if (!empty($news['news_image'])) {
                    $images = json_decode($news['news_image'], true) ?? [];
                }
                ?>

                <div onclick="openNewsModal(<?= $news['id'] ?>)"
                    class="cursor-pointer bg-white border rounded-xl shadow hover:shadow-xl transition p-5">

                    <!-- 🔥 CAROUSEL -->
                    <?php if (!empty($images)): ?>
                        <div class="relative w-full h-40 overflow-hidden rounded-lg mb-3">

                            <?php foreach ($images as $index => $img): ?>
                                <img src="../Uploads/News/<?= htmlspecialchars($img) ?>"
                                    class="carousel-img absolute w-full h-full object-cover transition-opacity duration-500 <?= $index === 0 ? 'opacity-100' : 'opacity-0' ?>">
                            <?php endforeach; ?>

                            <?php if (count($images) > 1): ?>
                                <button onclick="event.stopPropagation(); prevSlide(this)"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 bg-black/50 text-white px-2 rounded">
                                    ‹
                                </button>

                                <button onclick="event.stopPropagation(); nextSlide(this)"
                                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-black/50 text-white px-2 rounded">
                                    ›
                                </button>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>

                    <h3 class="font-bold text-lg text-gray-900 mb-2 line-clamp-2">
                        <?= htmlspecialchars($news['news_headline']) ?>
                    </h3>

                    <p class="text-sm text-gray-500 mb-2">
                        <?= date('F d, Y', strtotime($news['date_published'])) ?>
                    </p>

                    <p class="text-gray-700 text-sm line-clamp-3">
                        <?= htmlspecialchars($news['article_body']) ?>
                    </p>

                    <div class="mt-4 text-xs text-gray-500">
                        By <?= htmlspecialchars($news['article_writer']) ?>
                    </div>

                </div>

            <?php endforeach; ?>
        </div>

        <!-- SCRIPT FOR KAROSEL -->
        <script>
            function getImages(container) {
                return container.querySelectorAll('.carousel-img');
            }

            function showSlide(images, index) {
                images.forEach((img, i) => {
                    img.classList.remove('opacity-100');
                    img.classList.add('opacity-0');
                });

                images[index].classList.remove('opacity-0');
                images[index].classList.add('opacity-100');
            }

            function nextSlide(btn) {
                const container = btn.closest('.relative');
                const images = getImages(container);

                let current = [...images].findIndex(img => img.classList.contains('opacity-100'));

                let next = (current + 1) % images.length;
                showSlide(images, next);
            }

            function prevSlide(btn) {
                const container = btn.closest('.relative');
                const images = getImages(container);

                let current = [...images].findIndex(img => img.classList.contains('opacity-100'));

                let prev = (current - 1 + images.length) % images.length;
                showSlide(images, prev);
            }
        </script>
        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
            <div class="flex justify-center mt-10">
                <nav>
                    <ul
                        class="flex items-center gap-1 text-sm rounded-lg overflow-hidden border border-gray-300 shadow-md bg-white">

                        <!-- Previous -->
                        <li>
                            <a href="?page=<?= max(1, $page - 1) ?>" class="w-10 h-10 flex items-center justify-center hover:bg-gray-100
                       <?= ($page <= 1) ? 'pointer-events-none opacity-40' : '' ?>">
                                ‹
                            </a>
                        </li>

                        <!-- Page Numbers -->
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li>
                                <a href="?page=<?= $i ?>" class="w-10 h-10 flex items-center justify-center
                           <?= ($page == $i)
                               ? 'bg-[#1a589e] text-white'
                               : 'hover:bg-gray-100 text-gray-700' ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <!-- Next -->
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

    <!-- EDIT MODEL FOR NEWS -->

    <div id="newsModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center">

        <!-- CLICK OUTSIDE FIX -->
        <div class="absolute inset-0" onclick="closeNewsModal()"></div>

        <div class="bg-white w-full max-w-2xl rounded-xl p-6 relative z-10">

            <!-- ✅ FIX: type="button" -->
            <button type="button" onclick="closeNewsModal()"
                class="absolute top-3 right-3 text-gray-500 hover:text-black text-xl">
                ✕
            </button>

            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="news_id" id="modal_news_id">

                <label class="font-semibold">Headline</label>
                <input type="text" name="news_headline" id="modal_headline" class="w-full p-2 border rounded mb-4">

                <label class="font-semibold">Writer</label>
                <input type="text" name="article_writer" id="modal_writer" class="w-full p-2 border rounded mb-4">

                <label class="font-semibold">Date</label>
                <input type="date" name="date_published" id="modal_date" class="w-full p-2 border rounded mb-4">

                <label class="font-semibold">Article</label>
                <textarea name="article_body" id="modal_body" class="w-full p-2 border rounded mb-6"
                    rows="6"></textarea>

                <!-- IMAGE PREVIEW -->
                <div class="mb-4">
                    <label class="font-semibold block mb-2">Uploaded Images</label>
                    <div id="modal_images_preview" class="flex flex-wrap gap-3"></div>
                </div>

                <!-- ADD NEW -->
                <div class="mb-4">
                    <label class="font-semibold">Add More Images</label>
                    <input type="file" name="news_images[]" multiple class="w-full p-2 border rounded">
                </div>

                <div class="flex justify-between">
                    <button type="button" onclick="confirmUpdate(this.form)"
                        class="px-6 py-2 bg-blue-600 text-white rounded">
                        Update
                    </button>

                    <button type="button" onclick="confirmDelete(this.form)"
                        class="px-6 py-2 bg-red-600 text-white rounded">
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT FOR MODAL POP OUT -->

    <script>
        function confirmUpdate(form) {
            Swal.fire({
                title: 'Update News?',
                text: "Do you want to save the changes?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#1a589e',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    // 🔥 inject hidden input
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'update_news';
                    input.value = '1';

                    form.appendChild(input);
                    form.submit();
                }
            });
        }

        function confirmDelete(form) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will permanently delete the news!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'delete_news';
                    input.value = '1';

                    form.appendChild(input);
                    form.submit();
                }
            });
        }
    </script>
    <script>
        const newsData = <?= json_encode($newsList) ?>;

        function openNewsModal(id) {
            const news = newsData.find(n => n.id == id);

            document.getElementById('modal_news_id').value = news.id;
            document.getElementById('modal_headline').value = news.news_headline;
            document.getElementById('modal_writer').value = news.article_writer;
            document.getElementById('modal_date').value = news.date_published;
            document.getElementById('modal_body').value = news.article_body;

            const container = document.getElementById('modal_images_preview');
            container.innerHTML = '';

            let images = [];

            try {
                images = JSON.parse(news.news_image) || [];
            } catch {
                images = [news.news_image];
            }

            images.forEach(img => {
                const div = document.createElement('div');
                div.className = "relative";

                div.innerHTML = `
            <img src="../Uploads/News/${img}" class="w-24 h-24 object-cover rounded">
            <button type="button" onclick="removeImage(this, '${img}')"
                class="absolute top-0 right-0 bg-red-500 text-white text-xs px-1 rounded">
                ✕
            </button>
            <input type="hidden" name="existing_images[]" value="${img}">
        `;

                container.appendChild(div);
            });

            document.getElementById('newsModal').classList.remove('hidden');
        }

        /* ✅ CLOSE FUNCTION (MISSING BEFORE) */
        function closeNewsModal() {
            document.getElementById('newsModal').classList.add('hidden');
        }

        /* REMOVE IMAGE */
        function removeImage(btn, imgName) {
            const parent = btn.parentElement;

            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'delete_images[]';
            input.value = imgName;

            document.querySelector('#newsModal form').appendChild(input);

            parent.remove();
        }

        /* ESC CLOSE (BONUS) */
        document.addEventListener('keydown', function (e) {
            if (e.key === "Escape") {
                closeNewsModal();
            }
        });
    </script>

    <script>
        function removeImage(btn, imgName) {

            const parent = btn.parentElement;

            // 🔥 mark for deletion
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'delete_images[]';
            input.value = imgName;

            document.querySelector('#newsModal form').appendChild(input);

            parent.remove();
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="../js/sidenav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>

</html>