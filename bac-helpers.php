<?php
/**
 * Shared helpers for the public "Bids and Awards" pages
 * (03_bac1.php - 03_bac4.php).
 *
 * These pages simply display, per-category, the same records that get
 * uploaded through modules/bidding.php into the `bidding_documents` table.
 */

/** Fetch every non-deleted document for one bidding category. */
function bacFetchDocuments(PDO $conn, string $category): array
{
    $stmt = $conn->prepare(
        "SELECT bid_code, bidding_title, upload_date, file_path, file_name, file_type
         FROM bidding_documents
         WHERE category = ? AND is_deleted = 0
         ORDER BY upload_date IS NULL, upload_date ASC, id ASC"
    );
    $stmt->execute([$category]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Group dated documents into Q1-Q4, then by month name (calendar order).
 * Undated documents (e.g. Notice of Postponement, which never has an
 * upload_date) are skipped here — handle those separately as a flat list.
 */
function bacGroupByQuarterAndMonth(array $docs): array
{
    $quarters = ['Q1' => [], 'Q2' => [], 'Q3' => [], 'Q4' => []];
    $monthNames = [
        1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
        5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
        9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December',
    ];

    foreach ($docs as $doc) {
        if (empty($doc['upload_date'])) {
            continue;
        }
        $month = (int) substr($doc['upload_date'], 5, 2);
        $quarter = $month <= 3 ? 'Q1' : ($month <= 6 ? 'Q2' : ($month <= 9 ? 'Q3' : 'Q4'));
        $quarters[$quarter][$monthNames[$month]][] = $doc;
    }

    return $quarters;
}

/** Total number of postings inside one quarter's month groups. */
function bacQuarterCount(array $monthGroups): int
{
    return array_sum(array_map('count', $monthGroups));
}

/** "August 19" style date for list rows. */
function bacFriendlyDate(?string $ymd): string
{
    if (!$ymd) return '';
    $d = DateTime::createFromFormat('Y-m-d', $ymd);
    return $d ? $d->format('F j') : $ymd;
}

function bacH(?string $s): string
{
    return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8');
}
