<?php
/**
 * includes/jo.php
 * Public listing of published career opportunities, styled to match
 * the original static design (pill tabs, "Plantilla" badges, paired
 * View/Download buttons). Pulls from career_opportunities for the
 * 2026/2025/2024 tabs; the Archives tab keeps the pre-digitization
 * ZIP compilations (2020-2023) as static entries, with any DB rows
 * older than 2024 shown above them automatically.
 *
 * Expected location: <root>/includes/jo.php
 * db.php lives at:   <root>/db.php
 */

include __DIR__ . '/../db.php'; // provides $conn (PDO)

$knownYears = ['2026', '2025', '2024'];

$postingsByYear = ['2026' => [], '2025' => [], '2024' => []];
$archivedFromDb = [];

try {
    $stmt = $conn->prepare(
        "SELECT id, plantilla_title, date_published, deadline_date, file_name, file_path
         FROM career_opportunities
         WHERE is_deleted = 0
         ORDER BY date_published DESC, id DESC"
    );
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $rows = [];
}

foreach ($rows as $row) {
    $year = date('Y', strtotime($row['date_published']));
    if (in_array($year, $knownYears, true)) {
        $postingsByYear[$year][] = $row;
    } else {
        $archivedFromDb[] = $row;
    }
}

function jo_esc(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES);
}

function jo_postedLabel(string $dateStr): string
{
    // "September 8" style, matching the original cards
    return date('F j', strtotime($dateStr));
}

function jo_deadlineLabel(?string $dateStr): string
{
    if (empty($dateStr)) {
        return '';
    }
    // "September 8, 2026" style, so the year is unambiguous for deadlines
    return date('F j, Y', strtotime($dateStr));
}

/**
 * Renders one job-posting card (used for the 2026/2025/2024 tabs
 * and for any DB rows that fall outside the known years).
 */
function jo_renderCard(array $row): void
{
    $title = jo_esc($row['plantilla_title']);
    $posted = jo_postedLabel($row['date_published']);
    $href = jo_esc($row['file_path']);
    $downloadName = jo_esc($row['file_name']);

    $deadlineRaw = $row['deadline_date'] ?? null;
    $deadlineLabel = jo_deadlineLabel($deadlineRaw);
    $isExpired = !empty($deadlineRaw) && strtotime($deadlineRaw) < strtotime('today');
    ?>
    <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
        <div>
            <div class="flex justify-between items-center mb-4">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-50 text-[#1a589e] border border-blue-100/50 uppercase tracking-wider">
                    <i class="fa-solid fa-briefcase text-[10px] text-[#1a589e]"></i>
                    Plantilla
                </span>
                <span class="text-sm text-slate-500 font-semibold flex items-center gap-1.5">
                    <i class="fa-regular fa-calendar text-slate-400"></i> Posted on <?= $posted ?>
                </span>
            </div>

            <h4 class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                <?= $title ?>
            </h4>

            <?php if ($deadlineLabel !== ''): ?>
                <p class="mt-3 text-xs font-semibold flex items-center gap-1.5 <?= $isExpired ? 'text-red-500' : 'text-emerald-600' ?>">
                    <i class="fa-regular fa-clock"></i>
                    <?php if ($isExpired): ?>
                        Application deadline was <?= $deadlineLabel ?>
                        <span class="inline-block px-2 py-0.5 rounded-full text-[9px] font-bold bg-red-50 text-red-600 uppercase tracking-wider">Closed</span>
                    <?php else: ?>
                        Apply before <?= $deadlineLabel ?>
                    <?php endif; ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-2 gap-3 mt-6 pt-4 border-t border-slate-100">
            <a href="<?= $href ?>" target="_blank"
               class="inline-flex items-center justify-center gap-1.5 bg-slate-50 hover:bg-slate-100 text-[#1a589e] text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 transition-all duration-200 text-center"
               title="View PDF">
                <i class="fa-regular fa-eye"></i> View
            </a>
            <a href="<?= $href ?>" download="<?= $downloadName ?>"
               class="inline-flex items-center justify-center gap-1.5 bg-[#1a589e] hover:bg-blue-700 text-white text-xs font-bold uppercase py-2.5 rounded-xl transition-all duration-200 shadow-sm text-center"
               title="Download PDF">
                <i class="fa-solid fa-cloud-arrow-down"></i> Download
            </a>
        </div>
    </div>
    <?php
}

function jo_renderEmptyState(string $label): void
{
    ?>
    <div class="col-span-full text-center text-slate-400 py-16">
        <i class="fa-regular fa-folder-open text-4xl mb-3 block text-slate-300"></i>
        No career opportunities posted for <?= jo_esc($label) ?> yet.
    </div>
    <?php
}
?>

<!-- Modern Year Segmented Controller -->
<nav aria-label="Year navigation" class="mb-10 flex justify-center">
    <div class="inline-flex p-2 bg-slate-100/80 backdrop-blur-lg rounded-xl  shadow-lg" id="pills-tab" role="tablist">

        <button class="nav-link-pag active" id="pills-2026-tab" data-bs-toggle="pill" data-bs-target="#pills-2026"
            type="button" role="tab" aria-controls="pills-2026" aria-selected="true">
            <span class="flex items-center gap-2">
                <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>2026</span>
            </span>
        </button>

        <button class="nav-link-pag" id="pills-2025-tab" data-bs-toggle="pill" data-bs-target="#pills-2025"
            type="button" role="tab" aria-controls="pills-2025" aria-selected="false">
            <span>2025</span>
        </button>

        <button class="nav-link-pag" id="pills-2024-tab" data-bs-toggle="pill" data-bs-target="#pills-2024"
            type="button" role="tab" aria-controls="pills-2024" aria-selected="false">
            <span>2024</span>
        </button>

        <button class="nav-link-pag" id="pills-archives-tab" data-bs-toggle="pill" data-bs-target="#pills-archives"
            type="button" role="tab" aria-controls="pills-archives" aria-selected="false">
            <span class="flex items-center gap-1.5">
                <i class="fa-solid fa-box-archive text-xs"></i>
                <span class="hidden xs:inline">Archives</span>
            </span>
        </button>

    </div>
</nav>

<!-- Tab Content (Job Postings) -->
<div class="tab-content" id="pills-tabContent">

    <!-- ==================== 2026 ==================== -->
    <div class="tab-pane fade show active" id="pills-2026" role="tabpanel" aria-labelledby="pills-2026-tab">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (empty($postingsByYear['2026'])): ?>
                <?php jo_renderEmptyState('2026'); ?>
            <?php else: ?>
                <?php foreach ($postingsByYear['2026'] as $row) jo_renderCard($row); ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- ==================== 2025 ==================== -->
    <div class="tab-pane fade" id="pills-2025" role="tabpanel" aria-labelledby="pills-2025-tab">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (empty($postingsByYear['2025'])): ?>
                <?php jo_renderEmptyState('2025'); ?>
            <?php else: ?>
                <?php foreach ($postingsByYear['2025'] as $row) jo_renderCard($row); ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- ==================== 2024 ==================== -->
    <div class="tab-pane fade" id="pills-2024" role="tabpanel" aria-labelledby="pills-2024-tab">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (empty($postingsByYear['2024'])): ?>
                <?php jo_renderEmptyState('2024'); ?>
            <?php else: ?>
                <?php foreach ($postingsByYear['2024'] as $row) jo_renderCard($row); ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- ==================== ARCHIVES ==================== -->
    <div class="tab-pane fade" id="pills-archives" role="tabpanel" aria-labelledby="pills-archives-tab">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">

            <?php if (!empty($archivedFromDb)): ?>
                <?php foreach ($archivedFromDb as $row) jo_renderCard($row); ?>
            <?php endif; ?>

            <!-- Card: 2023 Archive -->
            <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200/50 uppercase tracking-wider">
                            <i class="fa-solid fa-archive text-[10px]"></i>
                            Archive
                        </span>
                        <span class="text-sm text-slate-400 font-bold flex items-center gap-1.5">
                            FY 2023
                        </span>
                    </div>
                    <h4 class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        Compilation of Posted Positions (2023)
                    </h4>
                    <p class="text-xs text-slate-400 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-file-zipper text-sm text-slate-400"></i>
                        <span>Format: <strong class="text-slate-500 font-bold">ZIP File Archive</strong></span>
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2023.zip" download="2023.zip"
                        class="inline-flex items-center justify-center gap-2 w-full bg-slate-50 hover:bg-[#1a589e] text-[#1a589e] hover:text-white text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 hover:border-[#1a589e] transition-all duration-200 text-center shadow-sm"
                        title="Download 2023 ZIP">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download ZIP
                    </a>
                </div>
            </div>

            <!-- Card: 2022 Archive -->
            <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200/50 uppercase tracking-wider">
                            <i class="fa-solid fa-archive text-[10px]"></i>
                            Archive
                        </span>
                        <span class="text-sm text-slate-400 font-bold flex items-center gap-1.5">
                            FY 2022
                        </span>
                    </div>
                    <h4 class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        Compilation of Posted Positions (2022)
                    </h4>
                    <p class="text-xs text-slate-400 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-file-zipper text-sm text-slate-400"></i>
                        <span>Format: <strong class="text-slate-500 font-bold">ZIP File Archive</strong></span>
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2022.zip" download="2022.zip"
                        class="inline-flex items-center justify-center gap-2 w-full bg-slate-50 hover:bg-[#1a589e] text-[#1a589e] hover:text-white text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 hover:border-[#1a589e] transition-all duration-200 text-center shadow-sm"
                        title="Download 2022 ZIP">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download ZIP
                    </a>
                </div>
            </div>

            <!-- Card: 2021 Archive -->
            <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200/50 uppercase tracking-wider">
                            <i class="fa-solid fa-archive text-[10px]"></i>
                            Archive
                        </span>
                        <span class="text-sm text-slate-400 font-bold flex items-center gap-1.5">
                            FY 2021
                        </span>
                    </div>
                    <h4 class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        Compilation of Posted Positions (2021)
                    </h4>
                    <p class="text-xs text-slate-400 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-file-zipper text-sm text-slate-400"></i>
                        <span>Format: <strong class="text-slate-500 font-bold">ZIP File Archive</strong></span>
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2021.zip" download="2021.zip"
                        class="inline-flex items-center justify-center gap-2 w-full bg-slate-50 hover:bg-[#1a589e] text-[#1a589e] hover:text-white text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 hover:border-[#1a589e] transition-all duration-200 text-center shadow-sm"
                        title="Download 2021 ZIP">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download ZIP
                    </a>
                </div>
            </div>

            <!-- Card: 2020 Archive -->
            <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200/50 uppercase tracking-wider">
                            <i class="fa-solid fa-archive text-[10px]"></i>
                            Archive
                        </span>
                        <span class="text-sm text-slate-400 font-bold flex items-center gap-1.5">
                            FY 2020
                        </span>
                    </div>
                    <h4 class="text-base font-bold text-slate-800 group-hover:text-[#1a589e] transition-colors duration-200 leading-snug">
                        Compilation of Posted Positions (2020)
                    </h4>
                    <p class="text-xs text-slate-400 font-medium mt-3 flex items-center gap-1.5">
                        <i class="fa-solid fa-file-zipper text-sm text-slate-400"></i>
                        <span>Format: <strong class="text-slate-500 font-bold">ZIP File Archive</strong></span>
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100">
                    <a href=".\assets\Files\jobs\2020.zip" download="2020.zip"
                        class="inline-flex items-center justify-center gap-2 w-full bg-slate-50 hover:bg-[#1a589e] text-[#1a589e] hover:text-white text-xs font-bold uppercase py-2.5 rounded-xl border border-slate-200/60 hover:border-[#1a589e] transition-all duration-200 text-center shadow-sm"
                        title="Download 2020 ZIP">
                        <i class="fa-solid fa-cloud-arrow-down"></i> Download ZIP
                    </a>
                </div>
            </div>

        </div>

        <!-- Old Website Call to Action -->
        <div class="max-w-md mx-auto bg-white rounded-2xl shadow-sm border border-slate-100 border-t-4 border-t-[#1a589e] overflow-hidden">
            <div class="p-8 text-center">
                <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-archive text-[#1a589e] text-2xl"></i>
                </div>
                <h5 class="text-lg font-bold text-[#1a589e] mb-1">Visit Our Old Website</h5>
                <p class="text-slate-500 text-xs mb-6">
                    Looking for older documents? Access our previous website containing past job opportunities and
                    historical data.
                </p>
                <a href="https://cwd.com.ph/careers.html" target="_blank"
                    class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-[#1a589e] hover:bg-blue-800 rounded-xl font-bold text-xs transition duration-200 shadow-sm group gap-2">
                    <span>Visit Archive Portal</span>
                    <i class="fas fa-arrow-up-right-from-square text-[10px] transition-transform group-hover:-translate-y-0.5 group-hover:translate-x-0.5"></i>
                </a>
            </div>
        </div>

    </div>

</div> <!-- End tab-content -->