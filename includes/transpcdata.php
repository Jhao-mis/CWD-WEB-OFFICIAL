<?php
/**
 * Transparency Seal Data Management
 */

// 1. Static Content (Section I) - Shared across all years
$static_section_i = [
    'title' => 'I. Agency Mandate, Vision, Mission and List of Officials',
    'items' => [
        ['label' => 'Agency Mandate, Vision and Mission', 'url' => 'pdf/transpc1.pdf'],
        ['label' => 'List of Officials, Co-Terminus with their Positions and Designations', 'url' => 'pdf/transpc2.pdf'],
    ],
    
];
$static_section_iii = [
    'title' => 'I. Agency Mandate, Vision, Mission and List of Officials',
    'content' => 'N/A' 
    
];

// 2. Annual Data - Section X is now integrated here
$transparency_years = [
    '2025' => [
        'is_latest' => true,
        'sections' => [
            'II. Annual Financial Reports' => [
                ['label' => 'FAR No. 1: SAAOBDB', 'url' => '#'],
                ['label' => 'Summary Report on Disbursements', 'url' => '#'],
            ],
            // 'III. DBM Approved Budgets and Targets' => 'N/A', 
            'IV. Projects, Programs and Activities' => [
                ['label' => 'Projects, Programs and Activities (PPA)', 'url' => '#'],
            ],
            'X. Compliance with Good Governance Conditions' => [
                'Specific Compliance' => [
                    ['label' => 'A. Arta Compliance', 'url' => '#'],
                    ['label' => 'B. SALN Submission', 'url' => '#'],
                    ['label' => 'C. Procurement Monitoring Report', 'url' => '#'],
                    ['label' => 'D. Agency Procurement Compliance and Performance Indicator (APCPI)', 'url' => '#'],
                    ['label' => 'E. Posting Certification', 'url' => '#'],
                ],
                'Other Good Governance Conditions' => [
                    ['label' => 'I. PHILGEPS Posting', 'url' => '#'],
                ]
            ]
        ]
    ],
    '2024' => [
        'is_latest' => false,
        'sections' => [
            'II. Annual Financial Reports' => [
                ['label' => '2024 Archive PDF Report', 'url' => '#'],
            ],
            'X. Compliance with Good Governance Conditions' => [
                'Specific Compliance' => [
                    ['label' => 'A. Arta Compliance (2024)', 'url' => '#'],
                    ['label' => 'B. SALN Submission (2024)', 'url' => '#'],
                    ['label' => 'C. Procurement Monitoring Report (2024)', 'url' => '#'],
                    ['label' => 'D. Agency Procurement Compliance and Performance Indicator (APCPI) (2024)', 'url' => '#'],
                    ['label' => 'E. Posting Certification (2024)', 'url' => '#'],
                ],
                'Other Good Governance Conditions' => [
                    ['label' => 'I. PHILGEPS Posting (2024)', 'url' => '#'],
                ]
            ]
        ]
    ],
    '2023' => [
        'is_latest' => false,
        'sections' => [
            'II. Annual Financial Reports' => [
                ['label' => '2024 Archive PDF Report', 'url' => '#'],
            ],
            'X. Compliance with Good Governance Conditions' => [
                'Specific Compliance' => [
                    ['label' => 'A. Arta Compliance (2024)', 'url' => '#'],
                    ['label' => 'B. SALN Submission (2024)', 'url' => '#'],
                    ['label' => 'C. Procurement Monitoring Report (2024)', 'url' => '#'],
                    ['label' => 'D. Agency Procurement Compliance and Performance Indicator (APCPI) (2024)', 'url' => '#'],
                    ['label' => 'E. Posting Certification (2024)', 'url' => '#'],
                ],
                'Other Good Governance Conditions' => [
                    ['label' => 'I. PHILGEPS Posting (2024)', 'url' => '#'],
                ]
            ]
        ]
    ]
    
];

$years_keys = array_keys($transparency_years);
$default_year = !empty($years_keys) ? $years_keys[0] : null;
?>

<section class="container mx-auto px-4 lg:px-0">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-[#1a589e]">Compliance with Transparency Seal</h2>
        <p class="text-gray-600">Access official documents and compliance reports.</p>
    </div>

    <div class="max-w-7xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="lg:flex">
            
            <!-- SIDEBAR NAVIGATION -->
            <aside class="lg:w-64 bg-gray-50 border-r border-gray-100">
                <nav class="flex lg:flex-col overflow-x-auto lg:overflow-x-visible sticky top-0" id="transparency-nav">
                    <?php foreach ($transparency_years as $year => $data): ?>
                        <button 
                            data-tab-target="content-<?php echo $year; ?>"
                            class="nav-btn whitespace-nowrap px-6 py-4 text-sm font-semibold transition-all duration-200 border-b-2 lg:border-b-0 lg:border-l-4 text-left
                            <?php echo ($year === $default_year) ? 'active-tab bg-white text-[#1a589e] border-[#1a589e]' : 'text-gray-500 border-transparent hover:bg-gray-100'; ?>">
                            Year <?php echo $year; ?>
                        </button>
                    <?php endforeach; ?>

                    <button 
                        data-tab-target="content-archive"
                        class="nav-btn whitespace-nowrap px-6 py-4 text-sm font-semibold transition-all duration-200 border-b-2 lg:border-b-0 lg:border-l-4 text-left text-gray-500 border-transparent hover:bg-gray-100">
                        <i class="fas fa-archive mr-2 opacity-70"></i> Archive
                    </button>
                </nav>
            </aside>

            <!-- CONTENT AREA -->
            <div class="flex-1 p-6 lg:p-10 min-h-[600px]" id="transparency-content">
                
                <?php foreach ($transparency_years as $year => $data): ?>
                    <div id="content-<?php echo $year; ?>" 
                         class="tab-panel <?php echo ($year === $default_year) ? '' : 'hidden'; ?> animate-fade-in">
                        
                        <h3 class="text-2xl font-bold text-gray-800 mb-8 pb-4 border-b border-gray-100">
                            Transparency Seal Data — <?php echo $year; ?>
                        </h3>

                        <div class="space-y-10">

                            <!-- SECTION I (STATIC) -->
                            <div class="bg-blue-50/50 rounded-xl p-6 border border-blue-100">
                                <h4 class="text-lg font-bold text-blue-900 mb-4 flex items-center">
                                    <i class="fas fa-info-circle mr-3 text-blue-600"></i>
                                    <?php echo $static_section_i['title']; ?>
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <?php foreach ($static_section_i['items'] as $item): ?>
                                        <a href="<?php echo $item['url']; ?>" target="_blank"
                                           class="flex items-center p-3 bg-white rounded-lg border border-blue-100 hover:shadow-md transition-all group">
                                            <div class="w-10 h-10 rounded bg-blue-50 flex items-center justify-center mr-3 text-blue-600 group-hover:bg-[#1a589e] group-hover:text-white transition-colors">
                                                <i class="far fa-file-pdf"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-700"><?php echo $item['label']; ?></span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- DYNAMIC ANNUAL SECTIONS (II, III, IV) -->
                            <?php foreach ($data['sections'] as $sectionTitle => $sectionContent): ?>
                                <?php if ($sectionTitle !== 'X. Compliance with Good Governance Conditions'): ?>
                                    <div class="section-group">
                                        <h4 class="text-md font-bold text-gray-900 mb-4 flex items-center">
                                            <span class="w-2 h-2 bg-[#1a589e] rounded-full mr-3"></span>
                                            <?php echo $sectionTitle; ?>
                                        </h4>
                                        <div class="ml-5">
                                            <?php if (is_array($sectionContent)): ?>
                                                <div class="grid grid-cols-1 gap-2">
                                                    <?php foreach ($sectionContent as $file): ?>
                                                        <a href="<?php echo $file['url']; ?>" target="_blank" class="flex items-center text-sm text-gray-600 hover:text-blue-600 py-1 group">
                                                            <i class="fas fa-file-alt mr-3 text-gray-300 group-hover:text-blue-500"></i>
                                                            <?php echo $file['label']; ?>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php else: ?>
                                                <span class="inline-flex items-center px-3 py-1 bg-gray-100 text-gray-500 text-[10px] font-bold uppercase tracking-wider rounded-md border border-gray-200">
                                                    <?php echo $sectionContent; ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <div class="section-group">
                                <h4 class="text-md font-bold text-gray-900 mb-4 flex items-center">
                                    <span class="w-2 h-2 bg-[#1a589e] rounded-full mr-3"></span>
                                    <?php echo $static_sections['section_iii']['title']; ?>
                                </h4>
                                <div class="ml-5">
                                    <span class="inline-flex items-center px-3 py-1 bg-gray-100 text-gray-500 text-[10px] font-bold uppercase tracking-wider rounded-md">
                                        <?php echo $static_sections['section_iii']['content']; ?>
                                    </span>
                                </div>
                            </div>
                            
                                                
                            <!-- SECTION X (ANNUAL WITH SUBCATEGORIES) -->
                            <?php if (isset($data['sections']['X. Compliance with Good Governance Conditions'])): ?>
                                <?php $sectionX = $data['sections']['X. Compliance with Good Governance Conditions']; ?>
                                <div class="section-group border-t border-gray-100 pt-8">
                                    <h4 class="text-md font-bold text-gray-900 mb-6 flex items-center">
                                        <span class="w-2 h-2 bg-[#1a589e] rounded-full mr-3"></span>
                                        X. Compliance with Good Governance Conditions
                                    </h4>
                                    
                                    <div class="ml-5 space-y-8">
                                        <?php foreach ($sectionX as $groupName => $items): ?>
                                            <div>
                                                <h5 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-4">
                                                    <?php echo $groupName; ?>
                                                </h5>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-3">
                                                    <?php foreach ($items as $item): ?>
                                                        <a href="<?php echo $item['url']; ?>" target="_blank" 
                                                           class="flex items-start text-sm text-gray-600 hover:text-blue-600 group">
                                                            <i class="fas fa-check-circle mt-1 mr-3 text-emerald-400 group-hover:text-blue-500 opacity-60"></i>
                                                            <span class="leading-tight"><?php echo $item['label']; ?></span>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- ARCHIVE PANEL (SAME AS BEFORE) -->
                <div id="content-archive" class="tab-panel hidden animate-fade-in">
                    <div class="max-w-md mx-auto my-12 p-8 bg-white border-t-4 border-[#1a589e] rounded-3xl shadow-lg text-center">
                        <div class="w-20 h-20 mx-auto mb-6 bg-slate-50 rounded-2xl flex items-center justify-center border border-slate-100">
                            <i class="fas fa-archive text-3xl text-slate-300"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2">Visit Our Old Website</h3>
                        <p class="text-slate-500 text-sm mb-8 leading-relaxed">Looking for documents prior to 2024?</p>
                        <a href="https://cwd.com.ph/careers.html" target="_blank"
                            class="inline-block px-10 py-3 bg-[#1a589e] text-white font-semibold rounded-full hover:bg-slate-700 transition-all duration-200">
                            Open Archive <i class="fas fa-external-link-alt ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navButtons = document.querySelectorAll('#transparency-nav .nav-btn');
    const contentPanels = document.querySelectorAll('#transparency-content .tab-panel');

    navButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetId = button.getAttribute('data-tab-target');
            navButtons.forEach(btn => {
                btn.classList.remove('active-tab', 'bg-white', 'text-[#1a589e]', 'border-[#1a589e]');
                btn.classList.add('text-gray-500', 'border-transparent');
            });
            button.classList.add('active-tab', 'bg-white', 'text-[#1a589e]', 'border-[#1a589e]');
            button.classList.remove('text-gray-500', 'border-transparent');
            contentPanels.forEach(panel => panel.classList.add('hidden'));
            const activePanel = document.getElementById(targetId);
            if (activePanel) activePanel.classList.remove('hidden');
        });
    });
});
</script>

<style>
    .active-tab { border-color: #1a589e !important; color: #1a589e !important; background-color: #fff; }
    .animate-fade-in { animation: fadeIn 0.4s ease-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>