// Global Instance Handles
let modalOrgChartInstance = null;
let mainOrgChartInstance = null;

// ==========================================
// SET GLOBAL SEARCH PLACEHOLDER TEXT
// ==========================================
OrgChart.SEARCH_PLACEHOLDER = "Search for department, division or plantilla...";

// ==========================================
// 0. MODERN TAILWIND-INSPIRED TWO-TONE CARD TEMPLATE
// ==========================================
// Builds a two-tone card template. Only colors change between variants.
function buildCardTemplate(c) {
    const t = Object.assign({}, OrgChart.templates.ana);
    t.size = [290, 105];

    t.node = `
        <filter id="card-shadow" x="-10%" y="-10%" width="120%" height="120%">
            <feDropShadow dx="0" dy="6" stdDeviation="6" flood-color="#0f172a" flood-opacity="0.12"/>
            <feDropShadow dx="0" dy="1" stdDeviation="2" flood-color="#0f172a" flood-opacity="0.08"/>
        </filter>
        <rect x="0" y="0" width="290" height="105" fill="${c.body}" rx="16" ry="16" filter="url(#card-shadow)" stroke="${c.stroke}" stroke-width="1.5"></rect>
        <path d="M 0 16 A 16 16 0 0 1 16 0 L 274 0 A 16 16 0 0 1 290 16 L 290 50 L 0 50 Z" fill="#f8fafc" />
        <line x1="0" y1="50" x2="290" y2="50" stroke="#e2e8f0" stroke-width="1" />
    `;

    // Top header text (auto-wrapping)
    t.field_0 = `
        <foreignObject x="12" y="6" width="266" height="40">
            <div xmlns="http://www.w3.org/1999/xhtml" style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%; text-align: center; font-size: 10.5px; font-weight: 800; color: #0f172a; font-family: 'Inter', system-ui, sans-serif; text-transform: uppercase; line-height: 1.2; overflow: hidden; word-break: break-word; text-rendering: geometricPrecision; -webkit-font-smoothing: antialiased;">
                {val}
            </div>
        </foreignObject>
    `;
    // Body text
    t.field_1 = `<text style="font-size: 11.5px; font-weight: 700; font-family: 'Inter', system-ui, sans-serif;" fill="#ffffff" x="145" y="72" text-anchor="middle">{val}</text>`;
    // Salary grade
    t.field_2 = `<text style="font-size: 10px; font-weight: 600; font-family: 'Inter', system-ui, sans-serif;" fill="${c.sub}" x="145" y="90" text-anchor="middle">{val}</text>`;
    t.img_0 = '';

    // Cleaner connector lines
    if (typeof OrgChart.templates.ana.link === 'string') {
        t.link = OrgChart.templates.ana.link
            .replace(/stroke="[^"]*"/, 'stroke="#94a3b8"')
            .replace(/stroke-width="[^"]*"/, 'stroke-width="2px"');
    }
    return t;
}

// Default card (also used by the modal charts) - unchanged look
OrgChart.templates.twoToneTemplate = buildCardTemplate({ body: "#1e3a8a", stroke: "#3b82f6", sub: "#bfdbfe" });

// Variants for the main chart (picked by node tag, see `tags` in renderBalkanOrgChart)
OrgChart.templates.topTemplate      = buildCardTemplate({ body: "#0f2a5c", stroke: "#38bdf8", sub: "#bae6fd" }); // BOD / OGM
OrgChart.templates.deptTemplate     = buildCardTemplate({ body: "#1e3a8a", stroke: "#3b82f6", sub: "#bfdbfe" }); // Departments
OrgChart.templates.divisionTemplate = buildCardTemplate({ body: "#2563eb", stroke: "#93c5fd", sub: "#dbeafe" }); // Divisions
OrgChart.templates.staffTemplate    = buildCardTemplate({ body: "#475569", stroke: "#94a3b8", sub: "#e2e8f0" }); // Secretaries
OrgChart.templates.sectionTemplate  = buildCardTemplate({ body: "#0f766e", stroke: "#2dd4bf", sub: "#ccfbf1" }); // MIS section


// ==========================================
// CHART HELPERS
// ==========================================
function styleChartSearch(container) {
    if (!container) return;
    const searchInput = container.querySelector('input');
    if (searchInput) {
        // Only cosmetic border changes. Do NOT touch placeholder/padding/font-size:
        // Balkan draws its own placeholder layer behind the input, so changing those
        // makes the two texts overlap. The text comes from OrgChart.SEARCH_PLACEHOLDER above.
        searchInput.style.borderRadius = "20px";
        searchInput.style.border = "1px solid #cbd5e1";
        searchInput.style.outline = "none";
    }
}


// ==========================================
// 1. POPUP MODAL ORG CHART
// ==========================================
async function openOrgModal(code) {
    const modal = document.getElementById('orgChartModal');
    const modalBody = document.getElementById('modalBody');
    const mainNavbar = document.getElementById('main-navbar');

    if (!modal || !modalBody) return;

    // Reset header text so the previous department doesn't flash while loading
    const catEl = document.getElementById('modalCategory');
    const titleEl = document.getElementById('modalTitle');
    if (catEl) catEl.innerText = 'Loading';
    if (titleEl) titleEl.innerText = '...';

    // Chart area (responsive height) with a centered loading overlay
    modalBody.innerHTML = `
        <div style="position: relative; width: 100%;">
            <div id="modalTreeContainer" style="width: 100%; height: min(560px, 62vh); background-color: #f8fafc; background-image: radial-gradient(#dbe3ee 1px, transparent 1px); background-size: 22px 22px; border-radius: 1rem; overflow: hidden; border: 1px solid #e2e8f0; position: relative;"></div>
            <div id="modalLoadingText" style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; gap: 10px; border-radius: 1rem; background: rgba(248,250,252,0.85); color: #64748b; font-weight: 600; font-size: 14px;">
                <span style="width: 18px; height: 18px; border: 3px solid #cbd5e1; border-top-color: #1a589e; border-radius: 50%; animation: orgModalSpin 0.8s linear infinite;"></span>
                Loading structure...
            </div>
        </div>
    `;
    injectModalSpinnerStyle();

    modal.classList.remove('hidden');
    if (mainNavbar) mainNavbar.classList.add('hidden');

    try {
        const response = await fetch(`api.php?action=get_details&code=${encodeURIComponent(code)}`);
        if (!response.ok) throw new Error(`Server returned ${response.status}.`);
        const data = await response.json();

        if (!data || data.status !== 'success') throw new Error(data?.message || 'Hindi mahanap ang datos.');

        const catElement = document.getElementById('modalCategory');
        const titleElement = document.getElementById('modalTitle');
        if (catElement) catElement.innerText = data.type || 'Department View';
        if (titleElement) titleElement.innerText = data.title || '';

        let subNodes = [];

        if (code === 'bod') {
            subNodes.push({ id: "bod_root", pid: null, name: "OFFICE OF THE BOARD OF DIRECTORS", title: "Board of Directors", sg: "" });
            subNodes.push({ id: "bod_chair", pid: "bod_root", name: "RONALDO J. PUA", title: "Chairperson", sg: "" });
            subNodes.push({ id: "bod_vice", pid: "bod_root", name: "ATTY. DANTE M. MANGUIAT", title: "Vice-Chairperson", sg: "" });
            subNodes.push({ id: "bod_sec", pid: "bod_root", name: "SATURNINO J. LAJARA", title: "Corporate Secretary", sg: "" });
            subNodes.push({ id: "bod_treas", pid: "bod_root", name: "ALICIA V. LLAMAS", title: "Treasurer", sg: "" });
            subNodes.push({ id: "bod_pro", pid: "bod_root", name: "BRYAN A. ERCIA", title: "Public Relations Officer", sg: "" });

            subNodes.push({ id: "agenda_officer", pid: "bod_chair", tags: ["assistant"], name: "AMIE B. MENDOZA", title: "Minutes/Agenda Officer B", sg: "SG 11" });
            subNodes.push({ id: "tech_assist", pid: "bod_chair", tags: ["assistant"], name: "VACANT", title: "Technical Assistant B", sg: "SG 20" });
            subNodes.push({ id: "admin_assist", pid: "agenda_officer", name: "VACANT", title: "Admin Services Assistant C", sg: "SG 8" });
        } else if (code === 'ogm') {
            let gm = data.manager;
            subNodes.push({ id: "ogm_root", pid: null, name: gm ? gm.employee_name : 'Exequiel A. Aguilar, Jr.', title: gm ? gm.position_title : 'General Manager A', sg: gm ? `SG ${gm.salary_grade}` : 'SG 26' });

            let dbPositions = [];
            if (data.positions && Array.isArray(data.positions)) dbPositions = dbPositions.concat(data.positions);
            if (data.sections && Array.isArray(data.sections)) {
                data.sections.forEach(sec => { if (sec.positions) dbPositions = dbPositions.concat(sec.positions); });
            }

            let privSec = dbPositions.find(p => p.position_title.toLowerCase().includes('private secretary'));
            let driver = dbPositions.find(p => p.position_title.toLowerCase().includes('driver'));

            if (privSec) subNodes.push({ id: "priv_sec", pid: "ogm_root", tags: ["assistant"], name: privSec.employee_name, title: privSec.position_title, sg: `SG ${privSec.salary_grade}` });
            if (driver) subNodes.push({ id: "driver_node", pid: "ogm_root", tags: ["assistant"], name: driver.employee_name, title: driver.position_title, sg: `SG ${driver.salary_grade}` });

            let filteredPositions = dbPositions.filter(p => (!gm || p.id !== gm.id) && (!privSec || p.id !== privSec.id) && (!driver || p.id !== driver.id));

            let col1 = filteredPositions.filter(p => p.position_title.toLowerCase().includes('executive assistant') || p.position_title.toLowerCase().includes('customer service'));
            let col2 = filteredPositions.filter(p => p.position_title.toLowerCase().includes('plan'));
            let col3 = filteredPositions.filter(p => p.position_title.toLowerCase().includes('internal control'));
            let col4 = filteredPositions.filter(p => p.position_title.toLowerCase().includes('attorney') || p.position_title.toLowerCase().includes('legal'));
            let col5 = filteredPositions.filter(p => p.position_title.toLowerCase().includes('mis') || p.position_title.toLowerCase().includes('computer') || p.position_title.toLowerCase().includes('encoder') || p.position_title.toLowerCase().includes('data') || p.employee_name.toLowerCase().includes('fajarda') || p.employee_name.toLowerCase().includes('dave'));

            col5.sort((a, b) => (a.employee_name.toLowerCase().includes('fajarda') || a.employee_name.toLowerCase().includes('dave')) ? -1 : 1);

            function addColumnNodes(colArray, colPrefix) {
                let parentId = "ogm_root";
                colArray.forEach((pos, idx) => {
                    let nodeId = `${colPrefix}_${idx}`;
                    subNodes.push({ id: nodeId, pid: parentId, name: pos.employee_name, title: pos.position_title, sg: `SG ${pos.salary_grade}`, tags: (colPrefix === 'col5') ? ["mis-style"] : [] });
                    parentId = nodeId;
                });
            }

            addColumnNodes(col1, "col1"); addColumnNodes(col2, "col2"); addColumnNodes(col3, "col3"); addColumnNodes(col4, "col4"); addColumnNodes(col5, "col5");
        } else {
            let rootId = "dept_root";
            subNodes.push({ id: rootId, pid: null, name: data.manager ? (data.manager.employee_name || 'Vacant') : (data.title || 'Office'), title: data.manager ? data.manager.position_title : 'Department Manager', sg: data.manager?.salary_grade ? `SG ${data.manager.salary_grade}` : 'SG 26' });

            if (data.secretary) {
                subNodes.push({ id: "sec_node", pid: rootId, tags: ["assistant"], name: data.secretary.employee_name || 'Vacant', title: data.secretary.position_title, sg: `SG ${data.secretary.salary_grade || 7}` });
            }

            let allPositions = [];
            if (data.sections && Array.isArray(data.sections)) data.sections.forEach(sec => sec.positions && sec.positions.forEach(p => allPositions.push(p)));
            if (data.divisions && Array.isArray(data.divisions)) data.divisions.forEach(div => div.positions && div.positions.forEach(p => allPositions.push(p)));
            if (data.positions && Array.isArray(data.positions)) data.positions.forEach(p => allPositions.push(p));

            allPositions.sort((a, b) => (parseInt(b.salary_grade) || 0) - (parseInt(a.salary_grade) || 0));

            let previousId = rootId;
            allPositions.forEach((pos, idx) => {
                let currentId = `pos_sg_${idx}`;
                subNodes.push({ id: currentId, pid: previousId, name: pos.employee_name || 'Vacant', title: pos.position_title, sg: pos.salary_grade ? `SG ${pos.salary_grade}` : 'SG --' });
                previousId = currentId;
            });
        }

        const loadingText = document.getElementById('modalLoadingText');
        if (loadingText) loadingText.remove();

        const modalContainer = document.getElementById('modalTreeContainer');
        if (modalContainer) {
            if (modalOrgChartInstance) { modalOrgChartInstance.destroy(); modalOrgChartInstance = null; }

            modalOrgChartInstance = new OrgChart(modalContainer, {
                nodes: subNodes,
                enableSearch: true,
                mouseScrool: OrgChart.action.zoom,
                scaleMin: 0.2,
                scaleMax: 3,
                nodeMouseClick: OrgChart.action.none,
                layout: OrgChart.top,
                template: "twoToneTemplate",
                nodeBinding: { field_0: "name", field_1: "title", field_2: "sg" }
            });

            setTimeout(() => {
                if (modalOrgChartInstance) {
                    modalOrgChartInstance.fit();
                    modalOrgChartInstance.center();
                    styleChartSearch(modalContainer);
                }
            }, 100);
        }
    } catch (error) {
        console.error('Error:', error);
        const box = document.getElementById('modalLoadingText');
        if (box) {
            box.innerHTML = '<span style="color:#b91c1c;">Unable to load the structure. Please close this window and try again.</span>';
        }
        const t = document.getElementById('modalTitle');
        const c = document.getElementById('modalCategory');
        if (t) t.innerText = 'Unavailable';
        if (c) c.innerText = 'Error';
    }
}

function injectModalSpinnerStyle() {
    if (document.getElementById('org-modal-spinner-style')) return;
    const st = document.createElement('style');
    st.id = 'org-modal-spinner-style';
    st.textContent = '@keyframes orgModalSpin { to { transform: rotate(360deg); } }';
    document.head.appendChild(st);
}

function closeOrgModal() {
    const modal = document.getElementById('orgChartModal');
    if (modal) modal.classList.add('hidden');
    const mainNavbar = document.getElementById('main-navbar');
    if (mainNavbar) mainNavbar.classList.remove('hidden');
    if (modalOrgChartInstance) { modalOrgChartInstance.destroy(); modalOrgChartInstance = null; }
}


// ==========================================
// 2. MAIN ORG CHART (`#balkan-tree-container` sa `#tree` Tab)
// ==========================================
// Initial / return view: close-up on the BOD + OGM cards.
// (Balkan's center() has no "scale" option, so we set the viewBox ourselves.)
const MAIN_CHART_START_SCALE = 1.0;   // 1.0 = real card size; lower = farther, higher = closer

function focusOnTopNodes(chart, container) {
    if (!chart || !container) return;
    try {
        const cw = container.clientWidth;
        const ch = container.clientHeight;
        const bod = chart.getNode ? chart.getNode("bod") : null;

        if (!cw || !ch || !bod || typeof bod.x !== 'number' || typeof bod.y !== 'number') {
            chart.fit();
            chart.center("bod");
            return;
        }

        const vw = cw / MAIN_CHART_START_SCALE;
        const vh = ch / MAIN_CHART_START_SCALE;
        const x = bod.x + (bod.w || 290) / 2 - vw / 2;   // BOD centered horizontally
        const y = bod.y - 40;                              // BOD near the top, OGM right under it
        chart.setViewBox([x, y, vw, vh]);
    } catch (e) {
        console.error("focusOnTopNodes error:", e);
        try { chart.fit(); chart.center("bod"); } catch (_) { }
    }
}

// Soft dotted background, border, and pointer cursor on clickable cards
function applyMainChartLook(container) {
    container.style.backgroundColor = '#f8fafc';
    container.style.backgroundImage = 'radial-gradient(#dbe3ee 1px, transparent 1px)';
    container.style.backgroundSize = '22px 22px';
    container.style.border = '1px solid #e2e8f0';

    if (document.getElementById('orgchart-extra-styles')) return;
    const st = document.createElement('style');
    st.id = 'orgchart-extra-styles';
    st.textContent = `
        #balkan-tree-container svg { background: transparent !important; }
        #balkan-tree-container [data-n-id] { cursor: pointer; }
        #balkan-tree-container [data-n-id="admin"], #balkan-tree-container [data-n-id="finance"],
        #balkan-tree-container [data-n-id="commercial"], #balkan-tree-container [data-n-id="tsd"],
        #balkan-tree-container [data-n-id="ops"], #balkan-tree-container [data-n-id$="_sec"] { cursor: default; }
    `;
    document.head.appendChild(st);
}

// Small instructions text placed right under the search bar (same style as the modal footer hint).
// Added from JS and positioned from the search input, so it doesn't depend on any page markup.
function addChartHint(container) {
    if (!container) return;

    let hint = container.querySelector('#orgchart-hint');
    if (!hint) {
        hint = document.createElement('p');
        hint.id = 'orgchart-hint';
        hint.style.cssText = "position:absolute;margin:0;font-size:12px;line-height:1.5;color:#64748b;pointer-events:none;z-index:1;font-family:'Inter', system-ui, sans-serif;";
        hint.innerHTML = ' Click a card for details &middot; Scroll to zoom &middot; Drag to pan';
        container.appendChild(hint);
    }

    const input = container.querySelector('input');

    const position = function () {
        const cr = container.getBoundingClientRect();
        const ir = input ? input.getBoundingClientRect() : null;
        if (ir && ir.width > 0) {
            hint.style.top = (ir.bottom - cr.top + 8) + 'px';
            hint.style.left = (ir.left - cr.left + 12) + 'px';
            hint.style.right = 'auto';
            hint.style.width = Math.max(ir.width - 12, 220) + 'px';
        } else {
            hint.style.top = '70px';
            hint.style.right = '16px';
            hint.style.left = 'auto';
            hint.style.width = '320px';
        }
    };
    position();

    // Hide the hint while the user is typing in the search box (so it never covers the results)
    if (input && !input.dataset.hintBound) {
        input.dataset.hintBound = '1';
        input.addEventListener('input', function () {
            hint.style.display = input.value ? 'none' : 'block';
        });
    }

    if (!container.dataset.hintResizeBound) {
        container.dataset.hintResizeBound = '1';
        window.addEventListener('resize', function () { setTimeout(position, 100); });
    }
}

function renderBalkanOrgChart() {
    const container = document.getElementById("balkan-tree-container");
    if (!container) return;

    if (mainOrgChartInstance) {
        setTimeout(() => {
            focusOnTopNodes(mainOrgChartInstance, container);
            styleChartSearch(container);
            addChartHint(container);
        }, 50);
        return;
    }

    OrgChart.templates.misTemplate = Object.assign({}, OrgChart.templates.ana);
    OrgChart.templates.misTemplate.size = [220, 65];
    OrgChart.templates.misTemplate.node = '<rect x="0" y="0" width="220" height="65" fill="#34d399" rx="10" ry="10" stroke="#059669" stroke-width="2"></rect>';
    OrgChart.templates.misTemplate.field_0 = '<text style="font-size: 12px; font-weight: bold;" fill="#ffffff" x="110" y="28" text-anchor="middle">{val}</text>';
    OrgChart.templates.misTemplate.field_1 = '<text style="font-size: 10px;" fill="#ecfdf5" x="110" y="46" text-anchor="middle">{val}</text>';

    const orgChartData = [
        { id: "bod", pid: null, tags: ["top"], name: "OFFICE OF THE BOARD OF DIRECTORS", title: "Board of Directors", sg: "" },
        { id: "ogm", pid: "bod", tags: ["top"], name: "OFFICE OF THE GENERAL MANAGER", title: "Exequiel A. Aguilar, Jr.", sg: "SG 26" },
        { id: "mis", pid: "ogm", tags: ["assistant", "section"], name: "Management Info Services", title: "Engr. Jonathan Dave Fajarda", sg: "SG 19" },
        
        // Administrative Department & Divisions
        { id: "admin", pid: "ogm", tags: ["dept"], name: "ADMINISTRATIVE DEPARTMENT", title: "Edwin L. Cartago", sg: "SG 26" },
        { id: "admin_sec", pid: "admin", tags: ["assistant", "staff"], name: "Janine S. Bercasio", title: "Secretary B", sg: "SG 7" },
        { id: "hrd", pid: "admin", tags: ["division"], name: "HUMAN RESOURCE DIVISION", title: "Elenita V. Panganiban", sg: "SG 24" },
        { id: "pmmd", pid: "admin", tags: ["division"], name: "PROPERTY & MATERIALS MGT.", title: "Rolando M. Pizzara (OIC)", sg: "SG 24" },
        { id: "gsd", pid: "admin", tags: ["division"], name: "GENERAL SERVICES DIVISION", title: "Emmanuel T. Salvador", sg: "SG 24" },
        
        // Finance Department & Divisions
        { id: "finance", pid: "ogm", tags: ["dept"], name: "FINANCE DEPARTMENT", title: "Mercedes A. Carreon (OIC)", sg: "SG 26" },
        { id: "finance_sec", pid: "finance", tags: ["assistant", "staff"], name: "Vacant", title: "Secretary B", sg: "SG 7" },
        { id: "budget", pid: "finance", tags: ["division"], name: "BUDGET DIVISION", title: "Mercedes A. Carreon", sg: "SG 24" },
        { id: "accounting", pid: "finance", tags: ["division"], name: "GENERAL ACCOUNTING DIV.", title: "Junsy Y. Nieron, CPA (OIC)", sg: "SG 24" },
        
        // Commercial Department & Divisions
        { id: "commercial", pid: "ogm", tags: ["dept"], name: "COMMERCIAL DEPARTMENT", title: "Ma. Carmela M. Elepaño", sg: "SG 26" },
        { id: "commercial_sec", pid: "commercial", tags: ["assistant", "staff"], name: "Verra Mae Mariano", title: "Secretary B", sg: "SG 7" },
        { id: "bmrd", pid: "commercial", tags: ["division"], name: "BILLING & METER READING", title: "Basilisa Gillera (OIC)", sg: "SG 24" },
        { id: "cad", pid: "commercial", tags: ["division"], name: "CUSTOMER ACCOUNTS DIV.", title: "Henry B. Junio", sg: "SG 24" },
        { id: "ccd", pid: "commercial", tags: ["division"], name: "CUSTOMER CARE DIVISION", title: "Ronnie G. Sierva", sg: "SG 24" },
        
        // Technical Services Department & Divisions
        { id: "tsd", pid: "ogm", tags: ["dept"], name: "TECHNICAL SERVICES DEPT.", title: "Engr. Ranely S. Cartago", sg: "SG 26" },
        { id: "tsd_sec", pid: "tsd", tags: ["assistant", "staff"], name: "Joana Leana May V. Villanueva", title: "Secretary B", sg: "SG 7" },
        { id: "eamd", pid: "tsd", tags: ["division"], name: "ENGINEERING & MAINTENANCE", title: "Engr. Rolando V. Baro", sg: "SG 24" },
        { id: "pamd", pid: "tsd", tags: ["division"], name: "PIPELINE & APPURTENANCES", title: "Engr. Bernard Joseph Rodriguez (OIC)", sg: "SG 24" },
        
        // Operations Department & Divisions
        { id: "ops", pid: "ogm", tags: ["dept"], name: "OPERATIONS DEPARTMENT", title: "Engr. Joselito A. Gillera", sg: "SG 26" },
        { id: "ops_sec", pid: "ops", tags: ["assistant", "staff"], name: "Vacant", title: "Secretary B", sg: "SG 7" },
        { id: "production", pid: "ops", tags: ["division"], name: "PRODUCTION DIVISION", title: "Engr. Elizaldy D. Novillos", sg: "SG 24" }
    ];

    try {
        container.style.position = 'relative';
        applyMainChartLook(container);

        mainOrgChartInstance = new OrgChart(container, {
            nodes: orgChartData,
            enableSearch: true,
            mouseScrool: OrgChart.action.zoom,
            scaleMin: 0.2,
            scaleMax: 3,
            nodeMouseClick: OrgChart.action.none,
            layout: OrgChart.top,
            template: "twoToneTemplate",
            tags: {
                top:      { template: "topTemplate" },
                dept:     { template: "deptTemplate" },
                division: { template: "divisionTemplate" },
                staff:    { template: "staffTemplate" },
                section:  { template: "sectionTemplate" }
            },
            nodeBinding: { field_0: "name", field_1: "title", field_2: "sg" }
        });

        mainOrgChartInstance.onNodeClick(function (args) {
            const nodeId = args.node.id;
            const nonClickableIds = ['admin', 'finance', 'commercial', 'tsd', 'ops', 'admin_sec', 'finance_sec', 'commercial_sec', 'tsd_sec', 'ops_sec'];
            if (nonClickableIds.includes(nodeId)) return false;
            if (typeof openOrgModal === 'function') openOrgModal(nodeId);
            return false;
        });

        setTimeout(() => {
            if (mainOrgChartInstance) {
                focusOnTopNodes(mainOrgChartInstance, container);
                styleChartSearch(container);
                addChartHint(container);
            }
        }, 150);

    } catch (err) {
        console.error("OrgChart error:", err);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const treeTab = document.getElementById("tree");

    if (treeTab) {
        const observer = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                if (mutation.attributeName === "class" || mutation.attributeName === "style") {
                    const isHidden = treeTab.classList.contains("hidden") || treeTab.style.display === "none";
                    if (!isHidden) {
                        renderBalkanOrgChart();
                    }
                }
            });
        });

        observer.observe(treeTab, { attributes: true });

        const treeButtons = document.querySelectorAll('[onclick*="tree"]');
        treeButtons.forEach(btn => {
            btn.addEventListener("click", function () {
                setTimeout(renderBalkanOrgChart, 100);
            });
        });
    }
});

// Close the modal with Esc, or by clicking the dark backdrop.
// (Tracks mousedown too, so dragging the chart and releasing outside never closes it.)
document.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') return;
    const modal = document.getElementById('orgChartModal');
    if (modal && !modal.classList.contains('hidden')) closeOrgModal();
});

(function () {
    let downOnBackdrop = false;
    document.addEventListener('mousedown', function (e) {
        const modal = document.getElementById('orgChartModal');
        downOnBackdrop = !!modal && e.target === modal;
    });
    document.addEventListener('click', function (e) {
        const modal = document.getElementById('orgChartModal');
        if (modal && downOnBackdrop && e.target === modal) closeOrgModal();
        downOnBackdrop = false;
    });
})();