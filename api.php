<?php
// api.php
header('Content-Type: application/json');
require_once 'db.php';

$action = $_GET['action'] ?? '';
$code   = trim($_GET['code'] ?? '');

if ($action === 'get_details' && !empty($code)) {
    try {
        $searchCode = strtolower($code);

        // Helper function para mag-format ng position card object
        function formatPositionCard($p) {
            return [
                'id'             => (int)$p['id'],
                'position_title' => $p['plantilla_position'] ?? 'Position',
                'employee_name'  => (!empty($p['personnel_name']) && $p['personnel_name'] !== 'Vacant') ? $p['personnel_name'] : 'Vacant',
                'salary_grade'   => $p['salary_grade'] ?? 'N/A',
                'is_head'        => (int)$p['is_head'],
                'is_secretary'   => (int)$p['is_secretary']
            ];
        }

        // -------------------------------------------------------------
        // 1. DEPARTMENT LEVEL QUERY (sa pamamagitan ng dept_code o department name)
        // -------------------------------------------------------------
        $stmtDept = $conn->prepare("
            SELECT DISTINCT department, dept_code 
            FROM orgchart 
            WHERE LOWER(dept_code) = :code OR LOWER(department) LIKE :likeCode 
            LIMIT 1
        ");
        $stmtDept->execute([':code' => $searchCode, ':likeCode' => "%$searchCode%"]);
        $deptRow = $stmtDept->fetch(PDO::FETCH_ASSOC);

        if ($deptRow) {
            $deptName = $deptRow['department'];
            $deptCode = $deptRow['dept_code'];

            // Department Head / Manager
            $stmtM = $conn->prepare("
                SELECT * FROM orgchart 
                WHERE department = :dept 
                  AND (division IS NULL OR division = '') 
                  AND (section IS NULL OR section = '') 
                  AND is_head = 1 
                ORDER BY salary_grade DESC LIMIT 1
            ");
            $stmtM->execute([':dept' => $deptName]);
            $manager = $stmtM->fetch(PDO::FETCH_ASSOC);

            // Department Secretary
            $stmtS = $conn->prepare("
                SELECT * FROM orgchart 
                WHERE department = :dept 
                  AND (division IS NULL OR division = '') 
                  AND (section IS NULL OR section = '') 
                  AND is_secretary = 1 
                LIMIT 1
            ");
            $stmtS->execute([':dept' => $deptName]);
            $secretary = $stmtS->fetch(PDO::FETCH_ASSOC);

            // Direct Positions sa Department level
            $stmtDirect = $conn->prepare("
                SELECT * FROM orgchart 
                WHERE department = :dept 
                  AND (division IS NULL OR division = '') 
                  AND (section IS NULL OR section = '') 
                ORDER BY salary_grade DESC
            ");
            $stmtDirect->execute([':dept' => $deptName]);
            $rawDirect = $stmtDirect->fetchAll(PDO::FETCH_ASSOC);

            $directPositions = [];
            foreach ($rawDirect as $p) {
                if (($manager && $p['id'] == $manager['id']) || ($secretary && $p['id'] == $secretary['id'])) {
                    continue;
                }
                $directPositions[] = formatPositionCard($p);
            }

            // Mga Divisions sa ilalim ng Department
            $stmtDivs = $conn->prepare("
                SELECT DISTINCT division, div_code 
                FROM orgchart 
                WHERE department = :dept AND division IS NOT NULL AND division != ''
            ");
            $stmtDivs->execute([':dept' => $deptName]);
            $divisions = $stmtDivs->fetchAll(PDO::FETCH_ASSOC);

            $divisionsData = [];
            foreach ($divisions as $div) {
                $divName = $div['division'];
                $divCode = $div['div_code'];

                $stmtPos = $conn->prepare("
                    SELECT * FROM orgchart 
                    WHERE department = :dept AND division = :div 
                    ORDER BY salary_grade DESC
                ");
                $stmtPos->execute([':dept' => $deptName, ':div' => $divName]);
                $rawPos = $stmtPos->fetchAll(PDO::FETCH_ASSOC);

                $positions = [];
                foreach ($rawPos as $p) {
                    $positions[] = formatPositionCard($p);
                }

                $divisionsData[] = [
                    'id'        => $divCode ?? $divName,
                    'name'      => $divName,
                    'code'      => $divCode ?? $divName,
                    'positions' => $positions
                ];
            }

            // Mga Sections na direktang nasa ilalim ng Department (halimbawa: MIS)
            $stmtSecs = $conn->prepare("
                SELECT DISTINCT section, div_code 
                FROM orgchart 
                WHERE department = :dept 
                  AND (division IS NULL OR division = '') 
                  AND section IS NOT NULL AND section != ''
            ");
            $stmtSecs->execute([':dept' => $deptName]);
            $sections = $stmtSecs->fetchAll(PDO::FETCH_ASSOC);

            $sectionsData = [];
            foreach ($sections as $sec) {
                $secName = $sec['section'];
                $secCode = $sec['div_code'];

                $stmtPos = $conn->prepare("
                    SELECT * FROM orgchart 
                    WHERE department = :dept AND section = :sec 
                    ORDER BY salary_grade DESC
                ");
                $stmtPos->execute([':dept' => $deptName, ':sec' => $secName]);
                $rawPos = $stmtPos->fetchAll(PDO::FETCH_ASSOC);

                $positions = [];
                foreach ($rawPos as $p) {
                    $positions[] = formatPositionCard($p);
                }

                $sectionsData[] = [
                    'id'        => $secCode ?? $secName,
                    'name'      => $secName,
                    'code'      => $secCode ?? $secName,
                    'positions' => $positions
                ];
            }

            echo json_encode([
                'status'    => 'success',
                'title'     => $deptName,
                'dept_code' => $deptCode,
                'type'      => 'DEPARTMENT',
                'manager'   => $manager ? formatPositionCard($manager) : null,
                'secretary' => $secretary ? formatPositionCard($secretary) : null,
                'divisions' => $divisionsData,
                'sections'  => $sectionsData,
                'positions' => $directPositions
            ], JSON_PRETTY_PRINT);
            exit;
        }

        // -------------------------------------------------------------
        // 2. DIVISION LEVEL QUERY (sa pamamagitan ng div_code o division name)
        // -------------------------------------------------------------
        $stmtDiv = $conn->prepare("
            SELECT DISTINCT division, div_code, department 
            FROM orgchart 
            WHERE (LOWER(div_code) = :code OR LOWER(division) LIKE :likeCode) 
              AND division IS NOT NULL AND division != ''
            LIMIT 1
        ");
        $stmtDiv->execute([':code' => $searchCode, ':likeCode' => "%$searchCode%"]);
        $divRow = $stmtDiv->fetch(PDO::FETCH_ASSOC);

        if ($divRow) {
            $divName = $divRow['division'];
            $divCode = $divRow['div_code'];

            // Manager / Head ng Division
            $stmtM = $conn->prepare("
                SELECT * FROM orgchart 
                WHERE division = :div AND is_head = 1 
                ORDER BY salary_grade DESC LIMIT 1
            ");
            $stmtM->execute([':div' => $divName]);
            $manager = $stmtM->fetch(PDO::FETCH_ASSOC);

            // Secretary ng Division
            $stmtS = $conn->prepare("
                SELECT * FROM orgchart 
                WHERE division = :div AND is_secretary = 1 
                LIMIT 1
            ");
            $stmtS->execute([':div' => $divName]);
            $secretary = $stmtS->fetch(PDO::FETCH_ASSOC);

            // Lahat ng Positions sa Division
            $stmtPos = $conn->prepare("
                SELECT * FROM orgchart 
                WHERE division = :div 
                ORDER BY salary_grade DESC
            ");
            $stmtPos->execute([':div' => $divName]);
            $rawPos = $stmtPos->fetchAll(PDO::FETCH_ASSOC);

            $positions = [];
            foreach ($rawPos as $p) {
                if (($manager && $p['id'] == $manager['id']) || ($secretary && $p['id'] == $secretary['id'])) {
                    continue;
                }
                $positions[] = formatPositionCard($p);
            }

            echo json_encode([
                'status'    => 'success',
                'title'     => $divName,
                'div_code'  => $divCode,
                'type'      => 'DIVISION',
                'manager'   => $manager ? formatPositionCard($manager) : null,
                'secretary' => $secretary ? formatPositionCard($secretary) : null,
                'positions' => $positions
            ], JSON_PRETTY_PRINT);
            exit;
        }

        // -------------------------------------------------------------
        // 3. SECTION LEVEL QUERY (halimbawa: MIS na may section name / div_code)
        // -------------------------------------------------------------
        $stmtSec = $conn->prepare("
            SELECT DISTINCT section, div_code, department 
            FROM orgchart 
            WHERE (LOWER(div_code) = :code OR LOWER(section) LIKE :likeCode) 
              AND section IS NOT NULL AND section != ''
            LIMIT 1
        ");
        $stmtSec->execute([':code' => $searchCode, ':likeCode' => "%$searchCode%"]);
        $secRow = $stmtSec->fetch(PDO::FETCH_ASSOC);

        if ($secRow) {
            $secName = $secRow['section'];
            $secCode = $secRow['div_code'];

            // Head ng Section
            $stmtM = $conn->prepare("
                SELECT * FROM orgchart 
                WHERE section = :sec AND is_head = 1 
                ORDER BY salary_grade DESC LIMIT 1
            ");
            $stmtM->execute([':sec' => $secName]);
            $manager = $stmtM->fetch(PDO::FETCH_ASSOC);

            if (!$manager) {
                // Fallback: Kunin ang pinakamataas na Salary Grade kapag walang nakamarka na is_head = 1
                $stmtFallback = $conn->prepare("
                    SELECT * FROM orgchart 
                    WHERE section = :sec 
                    ORDER BY salary_grade DESC LIMIT 1
                ");
                $stmtFallback->execute([':sec' => $secName]);
                $manager = $stmtFallback->fetch(PDO::FETCH_ASSOC);
            }

            // Secretary ng Section
            $stmtS = $conn->prepare("
                SELECT * FROM orgchart 
                WHERE section = :sec AND is_secretary = 1 
                LIMIT 1
            ");
            $stmtS->execute([':sec' => $secName]);
            $secretary = $stmtS->fetch(PDO::FETCH_ASSOC);

            // Lahat ng Positions sa Section
            $stmtPos = $conn->prepare("
                SELECT * FROM orgchart 
                WHERE section = :sec 
                ORDER BY salary_grade DESC
            ");
            $stmtPos->execute([':sec' => $secName]);
            $rawPos = $stmtPos->fetchAll(PDO::FETCH_ASSOC);

            $positions = [];
            foreach ($rawPos as $p) {
                if (($manager && $p['id'] == $manager['id']) || ($secretary && $p['id'] == $secretary['id'])) {
                    continue;
                }
                $positions[] = formatPositionCard($p);
            }

            echo json_encode([
                'status'    => 'success',
                'title'     => $secName,
                'sec_code'  => $secCode,
                'type'      => 'SECTION',
                'manager'   => $manager ? formatPositionCard($manager) : null,
                'secretary' => $secretary ? formatPositionCard($secretary) : null,
                'positions' => $positions
            ], JSON_PRETTY_PRINT);
            exit;
        }

        echo json_encode(['status' => 'error', 'message' => 'Hindi mahanap ang requested code o department sa database.']);

    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action or missing code parameter.']);
}