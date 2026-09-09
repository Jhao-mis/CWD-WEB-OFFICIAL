<?php
/**
 * includes/gad.php
 * Public listing for the GAD module: the "GAD Memos & Policy" card and
 * the year-tabbed "Annual GAD Reports" event grid on 03_gad.php.
 *
 * Expected location: <root>/includes/gad.php
 * db.php lives at:   <root>/db.php
 */

include __DIR__ . '/../db.php'; // provides $conn (PDO)

/* ---------- Memos ---------- */
try {
    $stmt = $conn->prepare(
        "SELECT id, memo_title, file_name, file_path
         FROM gad_memos
         WHERE is_deleted = 0
         ORDER BY created_at DESC, id DESC"
    );
    $stmt->execute();
    $memos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $memos = [];
}

/* ---------- Events ---------- */
try {
    $stmt = $conn->prepare(
        "SELECT id, event_title, date_published, excerpt, cover_image
         FROM gad_events
         WHERE is_deleted = 0
         ORDER BY date_published DESC, id DESC"
    );
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $events = [];
}

$eventsByYear = [];
foreach ($events as $ev) {
    $year = date('Y', strtotime($ev['date_published']));
    $eventsByYear[$year][] = $ev;
}
// Most recent year first
krsort($eventsByYear);
$years = array_keys($eventsByYear);

function gad_esc(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES);
}

function gad_dateLabel(string $dateStr): string
{
    return date('F j, Y', strtotime($dateStr));
}
?>

<style>
    #gad-pills-tab .nav-link-pag {
        padding: 0.5rem 1.25rem;
        border-radius: 9999px;
        font-weight: 700;
        font-size: 0.85rem;
        color: #64748b;
        background: #f1f5f9;
        border: none;
        transition: all 0.2s;
    }
    #gad-pills-tab .nav-link-pag:hover {
        background: #fce7f3;
        color: #db2777;
    }
    #gad-pills-tab .nav-link-pag.active {
        background: #ec4899;
        color: #ffffff;
    }
</style>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-20">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- COLUMN 1: GAD Memo (PDF Opener) -->
        <div class="lg:col-span-1">
            <div class="top-8 space-y-6">
                <div class="bg-white rounded-xl p-6 shadow-xl border-t-4 border-pink-500">
                    <div class="flex items-center justify-start space-x-3 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-pink-500 w-6 h-6">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                            <path d="M14 2v6h6" />
                            <path d="M10 13H8" />
                            <path d="M16 17H8" />
                            <path d="M16 21H8" />
                        </svg>
                        <h2 class="text-2xl font-black uppercase tracking-wide mt-2">GAD Memos & Policy</h2>
                    </div>
                    <p class="text-gray-600 mb-4 text-sm">Access recent GAD-related official documents and
                        directives.</p>

                    <div class="space-y-3">
                        <?php if (empty($memos)): ?>
                            <p class="text-sm text-gray-400 text-center py-6">No memos posted yet.</p>
                        <?php else: ?>
                            <?php foreach ($memos as $memo): ?>
                                <div class="border rounded-lg p-3 flex justify-between items-center gap-3">
                                    <span class="text-sm font-medium text-gray-700"><?= gad_esc($memo['memo_title']) ?></span>
                                    <a href="<?= gad_esc($memo['file_path']) ?>" target="_blank"
                                       class="text-xs font-semibold text-pink-600 hover:text-pink-800 transition whitespace-nowrap">
                                        View PDF
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- COLUMN 2 & 3: GAD Reports and Year Navigation -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-xl p-6 border-t-4 border-pink-500">

            <h2 class="text-2xl font-black uppercase tracking-wide mt-2 mb-2">Annual GAD Reports & Accomplishments</h2>
            <p class="text-gray-500 mt-1 mb-4">Stay updated with our latest GAD initiatives and milestones.</p>

            <?php if (empty($years)): ?>

                <div class="text-center text-slate-400 py-16">
                    <i class="fa-regular fa-folder-open text-4xl mb-3 block text-slate-300"></i>
                    No GAD events posted yet.
                </div>

            <?php else: ?>

                <!-- Year Tabs -->
                <nav aria-label="Year navigation" class="mb-6 flex flex-wrap gap-2" id="gad-pills-tab" role="tablist">
                    <?php foreach ($years as $i => $year): ?>
                        <button class="nav-link-pag<?= $i === 0 ? ' active' : '' ?>" id="gad-pills-<?= gad_esc($year) ?>-tab"
                            data-bs-toggle="pill" data-bs-target="#gad-pills-<?= gad_esc($year) ?>" type="button"
                            role="tab" aria-controls="gad-pills-<?= gad_esc($year) ?>"
                            aria-selected="<?= $i === 0 ? 'true' : 'false' ?>">
                            <?= gad_esc($year) ?>
                        </button>
                    <?php endforeach; ?>
                </nav>

                <!-- Tab Content -->
                <div class="tab-content" id="gad-pills-tabContent">
                    <?php foreach ($years as $i => $year): ?>
                        <div class="tab-pane fade<?= $i === 0 ? ' show active' : '' ?>" id="gad-pills-<?= gad_esc($year) ?>"
                            role="tabpanel" aria-labelledby="gad-pills-<?= gad_esc($year) ?>-tab">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <?php foreach ($eventsByYear[$year] as $ev): ?>
                                    <?php
                                    $thumb = !empty($ev['cover_image'])
                                        ? gad_esc($ev['cover_image'])
                                        : 'https://placehold.co/400x225/1a589e/ffffff?text=GAD+Event';
                                    ?>
                                    <a href="gadposts/view.php?id=<?= (int) $ev['id'] ?>"
                                       class="bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-md hover:border-pink-200 transition-all duration-300 overflow-hidden flex flex-col group">
                                        <img src="<?= $thumb ?>" alt="<?= gad_esc($ev['event_title']) ?>"
                                             class="w-full h-44 object-cover">
                                        <div class="p-5 flex flex-col flex-1">
                                            <span class="text-xs text-slate-400 font-semibold mb-1 flex items-center gap-1.5">
                                                <i class="fa-regular fa-calendar"></i> <?= gad_dateLabel($ev['date_published']) ?>
                                            </span>
                                            <h4 class="text-base font-bold text-slate-800 group-hover:text-pink-600 transition-colors duration-200 leading-snug mb-2">
                                                <?= gad_esc($ev['event_title']) ?>
                                            </h4>
                                            <?php if (!empty($ev['excerpt'])): ?>
                                                <p class="text-sm text-slate-500 flex-1"><?= gad_esc($ev['excerpt']) ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>

        </div>

    </div>
</main>