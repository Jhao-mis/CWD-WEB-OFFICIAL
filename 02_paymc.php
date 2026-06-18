<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD Payment Centers</title>
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

    <style>
        .horizontal-scroll-container::-webkit-scrollbar {
            height: 4px;
            width: 4px;
        }

        .horizontal-scroll-container::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .horizontal-scroll-container::-webkit-scrollbar-thumb {
            background: #1a589e;
            border-radius: 10px;
        }

        .tab-active {
            color: #1a589e;
            border-bottom-color: #1a589e;
            background-color: #f0f7ff;
            font-weight: 600;
        }

        .card-img-container {
            overflow: hidden;
            background-color: #f3f4f6;
        }

        .card-img-container img {
            transition: transform 0.5s ease;
        }

        .card-hover:hover img {
            transform: scale(1.05);
        }
    </style>

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
                        <a href="services"
                            class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">
                            <i class="fa-solid fa-droplet text-sm mr-2"></i>
                            Services
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
                            <i class="fa-solid fa-building-columns w-5"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Payment
                                Centers</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">Payment Centers
            </h1>


        </div>
        <svg class="absolute bottom-0 left-0 w-full h-[60px] sm:h-[120px] md:h-[100px] lg:h-[80px] z-0"
            viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="white" fill-opacity="1"
                d="M0,128L40,133.3C80,139,160,149,240,144C320,139,400,117,480,133.3C560,149,640,203,720,186.7C800,171,880,85,960,74.7C1040,64,1120,128,1200,144C1280,160,1360,128,1400,112L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>

    </div>


    <!-- water Rates -->

    <div
        class="container mx-auto bg-neutral-primary-soft block max-w-m p-6 rounded-base  hover:bg-neutral-secondary-medium">

        <h5 class="text-2xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">Over the
            Counter Payments</h5>
        <p class="text-center text-body">Over-the-counter payments are accepted at any of the following accredited banks
            and commercial establishments.</p>

    </div>

    <div class="container mx-auto px-4 py-8 max-w-7xl">

        <!-- Tab Navigation -->
        <div class="mb-8 border-b border-gray-200 overflow-x-auto overflow-y-hidden horizontal-scroll-container">
            <ul class="flex -mb-px text-sm font-medium text-center whitespace-nowrap" id="payment-tabs" role="tablist">
                <li class="me-2 flex-shrink-0" role="presentation">
                    <button
                        class="tab-btn inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-700 hover:bg-blue-50 transition-all duration-200 tab-active"
                        data-target="offices" type="button" role="tab">
                        Office-Based Collection Outlets
                    </button>
                </li>
                <li class="me-2 flex-shrink-0" role="presentation">
                    <button
                        class="tab-btn inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-700 hover:bg-blue-50 transition-all duration-200"
                        data-target="banks" type="button" role="tab">
                        Banks
                    </button>
                </li>
                <li class="me-2 flex-shrink-0" role="presentation">
                    <button
                        class="tab-btn inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-700 hover:bg-blue-50 transition-all duration-200"
                        data-target="commercial" type="button" role="tab">
                        Commercial Establishments
                    </button>
                </li>
                <li class="me-2 flex-shrink-0" role="presentation">
                    <button
                        class="tab-btn inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-700 hover:bg-blue-50 transition-all duration-200"
                        data-target="online" type="button" role="tab">
                        Online Payments
                    </button>
                </li>
            </ul>
        </div>

        <!-- Tab Contents -->
        <div id="tab-content-container">

            <!-- Tab 1: Office-Based -->
            <div id="offices" class="tab-panel block animate-in fade-in duration-500">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 max-w-5xl mx-auto gap-8">

                    <!-- Halang Main Office -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden card-hover border border-gray-100 flex flex-column h-full">
                        <div class="card-img-container h-85">
                            <img src="./img/bldsq.jpg" alt="Halang Main Office" class="w-full h-full object-cover">
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h5 class="text-xl font-black text-[#1a589e] mb-4">Halang Main Office</h5>

                            <div class="space-y-4 flex-grow">
                                <div class="flex gap-3">
                                    <div class="info-icon-wrapper"><i class="fa-solid fa-location-dot"></i></div>
                                    <p class="text-slate-600 text-sm leading-relaxed">Lakeview Subd., Brgy. Halang,
                                        Calamba City
                                    </p>
                                </div>
                                <div class="flex gap-3">
                                    <div class="info-icon-wrapper"><i class="fa-solid fa-clock"></i></div>
                                    <p class="text-slate-600 text-sm">
                                        <span class="font-bold">Mon-Fri:</span> 7:00 AM - 5:00 PM<br>
                                        <span class="font-bold">Sat:</span> 8:00 AM - 12:00 NN
                                    </p>
                                </div>
                                <div class="flex gap-3">
                                    <div class="info-icon-wrapper"><i class="fa-solid fa-phone"></i></div>
                                    <p class="text-slate-600 text-sm font-medium">
                                        (049) 545-1614; 545-2863<br>
                                        545-2728; 545-7895
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Canlubang Office -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden card-hover border border-gray-100 flex flex-column h-full">
                        <div class="card-img-container h-85">
                            <img src="./img/anx.png" alt="Annex Office" class="w-full h-full object-cover">
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h5 class="text-xl font-black text-[#1a589e] mb-4">Canlubang Extension</h5>

                            <div class="space-y-4 flex-grow">
                                <div class="flex gap-3">
                                    <div class="info-icon-wrapper"><i class="fa-solid fa-location-dot"></i></div>
                                    <p class="text-slate-600 text-sm leading-relaxed">Asia 1, Kapayapaan Village, Brgy.
                                        Canlubang, Calamba City</p>
                                </div>
                                <div class="flex gap-3">
                                    <div class="info-icon-wrapper"><i class="fa-solid fa-clock"></i></div>
                                    <p class="text-slate-600 text-sm">
                                        <span class="font-bold">Mon-Fri:</span> 7:00 AM - 5:00 PM<br>
                                        <span class="font-bold">Sat:</span> 8:00 AM - 12:00 NN
                                    </p>
                                </div>
                                <div class="flex gap-3">
                                    <div class="info-icon-wrapper"><i class="fa-solid fa-phone"></i></div>
                                    <p class="text-slate-600 text-sm font-medium">(049) 549-0812</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Calamba Shopping Center -->
                    
                </div>
            </div>

            <!-- Tab 2: Banks -->
            <div id="banks" class="tab-panel hidden animate-in fade-in duration-500">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Planbank -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex flex-col items-center text-center">
                        <img src="./img/paymc/pb.jpg" class="card-img m-3 mx-auto rounded-base"
                        style="height: 225px; width: 225px;" alt="Mactan Office">

                        <h5 class="text-xl font-bold text-[#1a589e] mb-2">Planbank</h5>
                        <p class="text-gray-500 text-sm">Brgy. Halang, Brgy. Canlubang & Brgy. 5 Poblacion Calamba City
                            Branches</p>
                    </div>

                    <!-- Banco Makiling -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex flex-col items-center text-center">
                        <img src="./img/paymc/bm.jpg" class="card-img m-3 mx-auto rounded-base"
                            style="height: 225px; width: 225px;" alt="Mactan Office">
                        <h5 class="text-xl font-bold text-[#1a589e] mb-2">Banco Makiling</h5>
                        <p class="text-gray-500 text-sm">Brgy. Makiling Branch, Calamba City</p>
                    </div>

                    <!-- Philippine Veterans Bank -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex flex-col items-center text-center">
                        <img src="./img/paymc/pvb.png" class="card-img m-3 mx-auto rounded-base"
                                style="height: 225px; width: 225px;" alt="Mactan Office">
                        <h5 class="text-xl font-bold text-[#1a589e] mb-2">Philippine Veterans Bank</h5>
                        <p class="text-gray-500 text-sm">PVB Calamba Branch Building, Crossing St., Barangay Real,
                            Calamba City (Near SM Calamba)</p>
                    </div>
                </div>
            </div>

            <!-- Tab 3: Commercial -->
            <div id="commercial" class="tab-panel hidden animate-in fade-in duration-500">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Waltermart -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex flex-col items-center text-center">
                        <img src="./img/paymc/wm.jpg" class="card-img m-3 mx-auto rounded-base"
                            style="height: 225px; width: 225px;" alt="Mactan Office">
                        <h5 class="text-xl font-bold text-[#1a589e] mb-2">Waltermart</h5>
                        <p class="text-gray-500 text-sm">Brgy. Makiling Calamba City & Cabuyao City, Laguna</p>
                    </div>

                    <!-- SM Calamba -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex flex-col items-center text-center">
                        <img src="./img/paymc/sm.png" class="card-img m-3 mx-auto rounded-base" style="height: 225px; width: 225px;" alt="Mactan Office">
                        <h5 class="text-xl font-bold text-[#1a589e] mb-2">SM Calamba City</h5>
                        <p class="text-gray-500 text-sm">National Road, Brgy Real Calamba City</p>
                    </div>

                    <!-- Savemore -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex flex-col items-center text-center">
                        <img src="./img/paymc/svm.jpg" class="card-img m-3 mx-auto rounded-base" style="height: 225px; width: 225px;" alt="Mactan Office">
                        <h5 class="text-xl font-bold text-[#1a589e] mb-2">Savemore</h5>
                        <p class="text-gray-500 text-sm">Brgy. Banlic, Cabuyao, Laguna</p>
                    </div>
                </div>
            </div>

            <!-- Tab 4: Online -->
            <div id="online" class="tab-panel hidden animate-in fade-in duration-500">
                    <div
                        class="max-w-md mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border-t-8 border-[#1a589e]">
                        <div class="p-8 text-center">
                            <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-wallet text-[#1a589e] text-3xl"></i>
                            </div>
                            <h5 class="text-2xl font-bold text-[#1a589e] mb-4">Online Payments</h5>
                            <p class="text-gray-600 mb-8">
                                Discover how you can pay through GCash & Landbank Biz Portal for a faster, hassle-free
                                transaction.
                            </p>
                            <a href="02_ol_serv"
                                class="inline-flex items-center justify-center w-full px-6 py-3 text-white bg-[#1a589e] hover:bg-blue-800 rounded-lg font-semibold transition duration-200 shadow-lg group">
                                Click Here to Proceed
                                <i class="fas fa-arrow-right ms-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
            </div>

        </div>
    </div>


    <!-- Back to Top -->
    <?php include 'includes/backtotop.php'; ?>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


    <script src="./js/index.js"></script>
    <script src="./js/nav-sticky.js"></script>
    <script src="./js/style.js"></script>
    <script src="./js/tabpane2.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab-btn');
            const panels = document.querySelectorAll('.tab-panel');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const target = tab.getAttribute('data-target');

                    // Update Tab Styles
                    tabs.forEach(t => {
                        t.classList.remove('tab-active');
                        t.classList.add('border-transparent');
                    });
                    tab.classList.add('tab-active');
                    tab.classList.remove('border-transparent');

                    // Show/Hide Panels
                    panels.forEach(panel => {
                        if (panel.id === target) {
                            panel.classList.remove('hidden');
                            panel.classList.add('block');
                        } else {
                            panel.classList.remove('block');
                            panel.classList.add('hidden');
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>