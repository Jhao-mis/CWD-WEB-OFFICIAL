<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About CWD</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/ind.css">
    <link rel="stylesheet" href="index.css">

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
        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">ABOUT US</h1>
        </div><br><br>

        <svg class="absolute bottom-0 left-0 w-full h-[60px] sm:h-[120px] md:h-[100px] lg:h-[80px] z-0"
            viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="white" fill-opacity="1"
                d="M0,128L40,133.3C80,139,160,149,240,144C320,139,400,117,480,133.3C560,149,640,203,720,186.7C800,171,880,85,960,74.7C1040,64,1120,128,1200,144C1280,160,1360,128,1400,112L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
    </div>

    <!-- History Section -->
    <div class="container mx-auto mb-4">
        <h3 class="text-4xl font-black text-[#1a589e] uppercase tracking-wide text-center mt-8 mb-8" id="History">
            Our History
        </h3><br>

        <div class="card history-card" id="History">
            <div class="history-image-wrapper">
                <img src="./img/bldsm.jpg" class="w-full" alt="cwd history">
            </div>

            <div class="card-body p-md-5">
                <p class="card-text">
                    In 1926, the water supply system in Calamba was managed by the Municipal Government, under the
                    administration of <span style="font-weight: bold;">National Water Sewerage Authority
                        (NAWASA)</span>, through the then called Calamba Water
                    Works System with Tigbe Spring as the sole source of water that supplied the whole town. Come 1964,
                    Bucal Spring was utilized with approximately 16.4 kilometer of pipelines and 380 cubic meter
                    concrete reservoir.
                </p><br>

                <p class="card-text">
                    The creation of The Provincial Water Utilities Act of 1973 also known as the <span
                        style="font-weight: bold;">Presidential Decree No. 198</span> (P.D. 198) paved the way for birth of various local water districts in the country.
                    On <span style="font-weight: bold;">August 07, 1974</span>, the Sangguniang Bayan of Calamba, headed by then Mayor Taciano Rizal, passed the
                    Municipal Board Resolution No. 82 Series of 1974 in pursuant to P.D. 198 as amended which gave rise to the
                    organization of the <span style="font-weight: bold; color: #007bff;">Calamba Water District</span>
                    (also known as CWD). Two years after, Local Water Utilities
                    Administration awarded the Conditional Certificate of Conformance No. 29 on September 04, 1976 which
                    entitled CWD to the rights and privileges authorized under PD 198. This then pronounced the official
                    day of CWD in carrying out its mission, which at that time, provided service to a total of <span
                        style="font-weight: bold;">1,100</span> active service connections.
                </p><br>

                <p class="card-text mb-0">
                    <span style="font-weight: bold; color: #007bff;">Safe drinking water</span> is what CWD guarantees
                    to its concessionaires by supplying potable water
                    conforming to the standard specified in the PNSDW 2007 and as certified by the City Health Office
                    through our DOH-Accredited Laboratory with Accreditation No. 254 and with the use of the latest
                    technology, aiming mainly toward its <span style="font-weight: bold;">commitment to be of good
                        service to the community</span> and to
                    <span style="font-weight: bold;">capture satisfaction of its concessionaires.</span>
                </p>
            </div>
        </div>
    </div>

    <br>

    <!-- Guiding Principles, The Organization and Redirect Pages -->
    <?php include 'includes/abus.php'; ?>

    <br><br>

    <!-- Back to Top Button -->
    <?php include 'includes/backtotop.php'; ?>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script>
        async function openOrgModal(code) {
            const modal = document.getElementById('orgChartModal');
            const modalBody = document.getElementById('modalBody');
            const mainNavbar = document.getElementById('main-navbar');

            if (!modal || !modalBody) {
                alert('Hindi maipakita ang organizational chart details.');
                return;
            }

            modalBody.innerHTML = '<p class="text-slate-500">Loading organization details...</p>';
            modal.classList.remove('hidden');
            if (mainNavbar) mainNavbar.classList.add('hidden');

            try {
                const response = await fetch(`api.php?action=get_details&code=${encodeURIComponent(code)}`);
                if (!response.ok) {
                    throw new Error(`Server returned ${response.status}.`);
                }
                const data = await response.json();

                // Pagsuri kung matagumpay ang pagkuha ng datos
                if (!data || data.status !== 'success') {
                    throw new Error(data?.message || 'Hindi mahanap ang datos.');
                }

                // I-populate ang Category at Title ng Modal
                const catElement = document.getElementById('modalCategory');
                const titleElement = document.getElementById('modalTitle');
                if (catElement) catElement.innerText = data.type || 'Department View';
                if (titleElement) titleElement.innerText = data.title || '';

                let html = '';

                // Helper Function para sa Pag-render ng Empleyado / Vacant list
                const renderNames = (nameStr) => {
                    if (!nameStr) return `<p class="text-amber-600 italic font-medium">Vacant</p>`;
                    const namesList = nameStr.split(',').map(n => n.trim());
                    return namesList.map(n => 
                        `<p class="${n.toLowerCase() === 'vacant' ? 'text-amber-600 italic font-medium' : 'text-slate-700 font-medium'}">${n}</p>`
                    ).join('');
                };

                // 1. Leadership & Administrative Support (Manager & Secretary)
                if (data.manager || data.secretary) {
                    html += `<div class="grid grid-cols-1 ${data.secretary ? 'md:grid-cols-5' : ''} gap-4 mb-4 items-stretch">`;
                    
                    if (data.manager) {
                        html += `
                        <div class="${data.secretary ? 'md:col-span-3' : 'col-span-1'} p-4 bg-blue-50/80 border border-blue-200 rounded-2xl flex flex-col justify-between">
                            <div>
                                <span class="text-[10px] uppercase font-extrabold text-blue-600 tracking-wider">Leadership</span>
                                <p class="font-black text-slate-800 text-lg leading-snug mt-1">${data.manager.employee_name || 'Vacant'}</p>
                                <p class="text-xs text-slate-600 font-semibold">${data.manager.position_title || ''}</p>
                            </div>
                            <div>
                                ${data.manager.salary_grade && data.manager.salary_grade !== '0' && data.manager.salary_grade !== 'N/A' ? `<span class="inline-block mt-2 text-[10px] bg-blue-600 text-white font-bold px-2 py-0.5 rounded">SG ${data.manager.salary_grade}</span>` : ''}
                            </div>
                        </div>`;
                    }

                    if (data.secretary) {
                        html += `
                        <div class="md:col-span-2 p-3.5 bg-slate-100 border border-slate-200 rounded-2xl flex flex-col justify-between">
                            <div>
                                <span class="text-[9px] uppercase font-extrabold text-slate-500 tracking-wider">Administrative Support</span>
                                <p class="font-bold text-slate-800 text-base leading-snug mt-1">${data.secretary.employee_name || 'Vacant'}</p>
                                <p class="text-[11px] text-slate-600 font-medium">${data.secretary.position_title || ''}</p>
                            </div>
                            <div>
                                ${data.secretary.salary_grade && data.secretary.salary_grade !== '0' && data.secretary.salary_grade !== 'N/A' ? `<span class="inline-block mt-2 text-[9px] bg-slate-600 text-white font-bold px-2 py-0.5 rounded">SG ${data.secretary.salary_grade}</span>` : ''}
                            </div>
                        </div>`;
                    }

                    html += `</div>`;
                }

                // 2. Direct Sections (e.g. MIS)
                if (data.sections && Array.isArray(data.sections) && data.sections.length > 0) {
                    html += `<h4 class="text-sm font-black text-slate-700 uppercase tracking-wider mb-3 mt-4">Sections</h4>`;
                    data.sections.forEach(sec => {
                        const positions = sec.positions || [];
                        const secHead = positions.find(p => p.is_head == 1);
                        const regularPositions = positions.filter(p => p.is_head == 0);

                        html += `
                        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm mb-4">
                            <h5 class="text-base font-bold text-[#1a589e] mb-3">${sec.name || sec.code || ''}</h5>`;

                        if (secHead) {
                            html += `
                            <div class="p-3.5 bg-blue-50/80 border border-blue-200 rounded-xl mb-3 flex justify-between items-center">
                                <div>
                                    <span class="text-[9px] uppercase font-black text-blue-600 tracking-wider bg-blue-100 px-2 py-0.5 rounded">Section Head</span>
                                    <p class="font-bold text-slate-800 text-sm mt-1">${secHead.position_title || ''}</p>
                                    <div class="text-xs mt-0.5">${renderNames(secHead.employee_name)}</div>
                                </div>
                                <div>
                                    ${secHead.salary_grade && secHead.salary_grade !== '0' && secHead.salary_grade !== 'N/A' ? `<span class="text-[10px] bg-blue-600 text-white font-bold px-2 py-1 rounded-md">SG ${secHead.salary_grade}</span>` : ''}
                                </div>
                            </div>`;
                        }

                        if (regularPositions.length > 0) {
                            html += `<div class="text-xs space-y-2">`;
                            regularPositions.forEach(pos => {
                                html += `
                                <div class="p-2.5 bg-slate-50 border border-slate-100 rounded-lg flex justify-between items-center">
                                    <div>
                                        <p class="font-bold text-slate-800">${pos.position_title || ''}</p>
                                        <div class="mt-0.5">${renderNames(pos.employee_name)}</div>
                                    </div>
                                    ${pos.salary_grade && pos.salary_grade !== '0' && pos.salary_grade !== 'N/A' ? `<span class="text-[10px] font-bold bg-slate-200 text-slate-700 px-2 py-1 rounded">SG ${pos.salary_grade}</span>` : ''}
                                </div>`;
                            });
                            html += `</div>`;
                        }

                        html += `</div>`;
                    });
                }

                // 3. Divisions
                if (data.divisions && Array.isArray(data.divisions) && data.divisions.length > 0) {
                    html += `<h4 class="text-sm font-black text-slate-700 uppercase tracking-wider mb-3 mt-4">Divisions</h4>`;
                    data.divisions.forEach(div => {
                        const positions = div.positions || [];
                        const divHead = positions.find(p => p.is_head == 1);
                        const regularPositions = positions.filter(p => p.is_head == 0);

                        html += `
                        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm mb-4">
                            <h5 class="text-base font-bold text-[#1a589e] mb-3">${div.name || div.code || ''}</h5>`;

                        if (divHead) {
                            html += `
                            <div class="p-3.5 bg-blue-50/80 border border-blue-200 rounded-xl mb-3 flex justify-between items-center">
                                <div>
                                    <span class="text-[9px] uppercase font-black text-blue-600 tracking-wider bg-blue-100 px-2 py-0.5 rounded">Division Head</span>
                                    <p class="font-bold text-slate-800 text-sm mt-1">${divHead.position_title || ''}</p>
                                    <div class="text-xs mt-0.5">${renderNames(divHead.employee_name)}</div>
                                </div>
                                <div>
                                    ${divHead.salary_grade && divHead.salary_grade !== '0' && divHead.salary_grade !== 'N/A' ? `<span class="text-[10px] bg-blue-600 text-white font-bold px-2 py-1 rounded-md">SG ${divHead.salary_grade}</span>` : ''}
                                </div>
                            </div>`;
                        }

                        if (regularPositions.length > 0) {
                            html += `<div class="text-xs space-y-2">`;
                            regularPositions.forEach(pos => {
                                html += `
                                <div class="p-2.5 bg-slate-50 border border-slate-100 rounded-lg flex justify-between items-center">
                                    <div>
                                        <p class="font-bold text-slate-800">${pos.position_title || ''}</p>
                                        <div class="mt-0.5">${renderNames(pos.employee_name)}</div>
                                    </div>
                                    ${pos.salary_grade && pos.salary_grade !== '0' && pos.salary_grade !== 'N/A' ? `<span class="text-[10px] font-bold bg-slate-200 text-slate-700 px-2 py-1 rounded">SG ${pos.salary_grade}</span>` : ''}
                                </div>`;
                            });
                            html += `</div>`;
                        }

                        html += `</div>`;
                    });
                }

                // 4. Direct Department Positions
                if (data.positions && Array.isArray(data.positions) && data.positions.length > 0) {
                    html += `<h4 class="text-sm font-black text-slate-700 uppercase tracking-wider mb-3 mt-4">Plantilla Positions</h4>`;
                    html += `<div class="grid grid-cols-1 md:grid-cols-2 gap-3">`;
                    data.positions.forEach(pos => {
                        html += `
                        <div class="p-3 bg-white border border-slate-200 rounded-xl shadow-sm flex justify-between items-start">
                            <div>
                                <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">${pos.position_title || ''}</p>
                                <div class="text-sm mt-0.5">${renderNames(pos.employee_name)}</div>
                            </div>
                            ${pos.salary_grade && pos.salary_grade !== '0' && pos.salary_grade !== 'N/A' ? `<span class="text-[9px] bg-slate-100 text-slate-600 font-bold px-2 py-0.5 rounded">SG ${pos.salary_grade}</span>` : ''}
                        </div>`;
                    });
                    html += `</div>`;
                }

                // I-inject ang HTML sa Modal
                modalBody.innerHTML = html;

            } catch (error) {
                console.error('Error fetching org chart details:', error);
                modalBody.textContent = error instanceof Error
                    ? error.message
                    : 'Nagkaroon ng problema sa pag-load ng datos mula sa server.';
            }
        }

        function closeOrgModal() {
            const modal = document.getElementById('orgChartModal');
            if (modal) modal.classList.add('hidden');

            const mainNavbar = document.getElementById('main-navbar');
            if (mainNavbar) mainNavbar.classList.remove('hidden');
        }

        window.addEventListener('click', function (event) {
            const modal = document.getElementById('orgChartModal');
            if (event.target === modal) closeOrgModal();
        });
    </script>

    <script src="./js/index.js"></script>
    <script src="./js/imgprev.js"></script>
    <script src="./js/tabpane.js"></script>
    <script src="./js/about.js"></script>
    <script src='includes/scripts.js'></script>

</body>

</html>