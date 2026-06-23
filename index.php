<?php
require 'db.php';

/* ===============================
   FETCH LATEST FEATURED ARTICLE
=================================*/
$featuredStmt = $conn->prepare("
    SELECT id, news_headline, news_image, date_published
    FROM news
    ORDER BY date_published DESC
    LIMIT 1
");
$featuredStmt->execute();
$featuredNews = $featuredStmt->fetch(PDO::FETCH_ASSOC);


/* ===============================
   FETCH RECENT NEWS (EXCLUDE LATEST)
=================================*/
$recentStmt = $conn->prepare("
    SELECT id, news_headline, news_image, date_published
    FROM news
    ORDER BY date_published DESC
    LIMIT 5 OFFSET 1
");
$recentStmt->execute();
$recentNews = $recentStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calamba Water District</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/ind.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/indbac.css">
    <link rel="stylesheet" href="index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @keyframes pulse-glow {
            0% {
                box-shadow: 0 0 0 0 rgba(26, 88, 158, 0.4);
            }

            70% {
                box-shadow: 0 0 0 20px rgba(26, 88, 158, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(26, 88, 158, 0);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .logo-glow {
            animation: pulse-glow 3s infinite;
        }

        .active-tab {
            color: #1a589e !important;
            border-bottom: 4px solid #1a589e !important;
            opacity: 1 !important;
        }

        .tab-content-hidden {
            display: none;
        }

        .tab-pane {
            transition: all 0.3s ease;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 200%;
            }
        }
    </style>

</head>

<body>

    <!-- Kuya Daloy Chatbot -->
    <?php include 'includes/modals.php'; ?>

    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Header Section (Carousel) -->
    <section class="carousel-container overflow-hidden shadow-lg">

        <!-- Slide 0 -->
        <div class="carousel-item active">
            <img src="./img/50th1.png"
                onerror="this.src='https://images.unsplash.com/photo-1542332213-31f87348057f?q=80&w=1600'">
            <div class="carousel-overlay">
                <div class="carousel-content">
                    <span
                        class="inline-block bg-yellow-600 text-[10px] md:text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">CELEBRATION</span>
                    <h2 class="text-3xl sm:text-4xl md:text-6xl font-black leading-tight mb-4">CWD's 50th Anniversary
                    </h2>
                    <p class="text-sm md:text-lg text-gray-200 mb-6 max-w-md md:max-w-xl">Calamba Water District : 50
                        Years of Service Securing Life & Progress for our Community</p>

                </div>
            </div>
        </div>

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="./img/bgmain.png"
                onerror="this.src='https://images.unsplash.com/photo-1542332213-31f87348057f?q=80&w=1600'">
            <div class="carousel-overlay">
                <div class="carousel-content">
                    <span
                        class="inline-block bg-blue-600 text-[10px] md:text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">WELCOME</span>
                    <h2 class="text-3xl sm:text-4xl md:text-6xl font-black leading-tight mb-4">This is the New <br> CWD
                        Website!</h2>
                    <p class="text-sm md:text-lg text-gray-200 mb-6 max-w-md md:max-w-xl">Providing better water
                        services through innovative infrastructure and community-focused management for a sustainable
                        future.</p>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1538300342682-cf57afb97285?q=80&w=1600">
            <div class="carousel-overlay">
                <div class="carousel-content">
                    <span
                        class="inline-block bg-green-600 text-[10px] md:text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2">Community</span>
                    <h2 class="text-3xl sm:text-4xl md:text-6xl font-black leading-tight mb-4">Clean Water<br>For Every
                        Home</h2>
                    <p class="text-sm md:text-lg text-gray-200 mb-6 max-w-md md:max-w-xl">Our mission is to ensure safe,
                        accessible, and high-quality water for all families in our district.</p>
                    <!-- <button
                        class="px-6 md:px-8 py-2 md:py-3 bg-white text-blue-900 font-bold rounded-lg hover:bg-blue-50 transition-colors">View
                        Projects</button> -->
                </div>
            </div>
        </div>


        <div class="carousel-arrow arrow-left" id="prevBtn"><i class="fa-solid fa-circle-chevron-left"></i></div>
        <div class="carousel-arrow arrow-right" id="nextBtn"><i class="fa-solid fa-circle-chevron-right"></i></div>

        <div class="indicator-container">
            <div class="indicator active" data-index="0"></div>
            <div class="indicator" data-index="1"></div>
            <div class="indicator" data-index="2"></div>
        </div>
    </section>

    <!-- NEW LOGO SECTION -->
    <section class="bg-white border-b py-2">
        <div class="container mx-auto px-3">
            <div class="logo-container">
                <!-- Placeholder URLs - Replace with actual local paths if necessary -->
                <img src="./img/icons/BP.png" alt="Bagong Pilipinas" class="logo-item">
                <img src="./img/icons/300.png" alt="300" class="logo-item">
                <img src="img/icons/PTS.png" alt="PTS" class="logo-item">
                <img src="./img/icons/FOI.png" alt="FOI" class="logo-item">
                <img src="./img/icons/PAB.png" alt="PAB" class="logo-item"
                    onerror="this.src='https://via.placeholder.com/100x60?text=PCOO'">
                <img src="./img/icons/ISO.png" alt="ISO" class="logo-item">
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section id="stats-section" class="relative py-10 bg-[#1a589e] text-white shadow-inner">
        <div class="max-w-5xl mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">

                <!-- Stat 1: Barangays -->
                <div class="flex flex-col items-center">
                    <div class="bg-white/10 p-3 rounded-full mb-3">
                        <i class="fa-solid fa-map-location-dot text-xl"></i>
                    </div>
                    <div class="text-3xl font-bold mb-1">
                        <span class="stat-number" data-val="47">0</span>
                    </div>
                    <p class="text-blue-100 text-sm font-medium opacity-90">Barangays Serviced</p>
                </div>

                <!-- Stat 2: Accounts -->
                <div class="flex flex-col items-center">
                    <div class="bg-white/10 p-3 rounded-full mb-3">
                        <i class="fa-solid fa-users-rectangle text-xl"></i>
                    </div>
                    <div class="text-3xl font-bold mb-1">
                        <span class="stat-number" data-val="77000">0</span>+
                    </div>
                    <p class="text-blue-100 text-sm font-medium opacity-90">Active Service Connections</p>
                </div>

                <!-- Stat 3: Population -->
                <div class="flex flex-col items-center">
                    <div class="bg-white/10 p-3 rounded-full mb-3">
                        <i class="fa-solid fa-people-group text-xl"></i>
                    </div>
                    <div class="text-3xl font-bold mb-1">
                        <span class="stat-number" data-val="385000">0</span>+
                    </div>
                    <p class="text-blue-100 text-sm font-medium opacity-90">Populations Serviced</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Quick Links Grid Section -->
    <div class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->

            <div class="flex items-center justify-center gap-3 mb-10">
                <div class="h-1 w-10 bg-[#1a589e] rounded-full"></div>
                <h2 class="text-4xl font-black text-[#1a589e] uppercase tracking-wide text-center mt-8 mb-10">Quick
                    Links</h2>
                <div class="h-1 w-10 bg-[#1a589e] rounded-full"></div>
            </div>

            <!-- 4-Column Grid (4 cols on desktop, 2 on tablet, 1 on mobile) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <a href="02_watr"
                    class="group bg-white rounded-2xl shadow-lg border-t-8 border-[#1a589e] overflow-hidden transition-all duration-300 hover:shadow-md hover:translate-y-[-4px]">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="mb-4 transition-transform duration-300 group-hover:scale-110">
                            <img src="img\qlicons\10.png" alt="Water Rates" class="w-12 h-12 object-contain"
                                onerror="this.onerror=null; this.src='https://placehold.co/80x80/1a589e/ffffff?text=WR';">
                        </div>
                        <h4 class="text-xl font-bold text-[#1a589e] mb-2">Water Rates</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">View laboratory service and calibration fees.
                        </p>
                    </div>
                </a>

                <!-- Card 1: Transparency Seal -->
                <a href="transpc"
                    class="group bg-white rounded-2xl shadow-lg border-t-8 border-[#1a589e] overflow-hidden transition-all duration-300 hover:shadow-md hover:translate-y-[-4px]">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="mb-4 transition-transform duration-300 group-hover:scale-110">
                            <img src="./img/qlicons/7.png" alt="Transparency Seal" class="w-12 h-12 object-contain"
                                onerror="this.onerror=null; this.src='https://placehold.co/80x80/1a589e/ffffff?text=TS';">
                        </div>
                        <h4 class="text-xl font-bold text-[#1a589e] mb-2">Transparency Seal</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Access compliance documents and corporate
                            records.</p>
                    </div>
                </a>

                <!-- Card 2: eFOI -->
                <a href="https://www.foi.gov.ph/agencies/clwd/" target="_blank"
                    class="group bg-white rounded-2xl shadow-lg border-t-8 border-[#1a589e] overflow-hidden transition-all duration-300 hover:shadow-md hover:translate-y-[-4px]">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="mb-4 transition-transform duration-300 group-hover:scale-110">
                            <img src="./img/qlicons/8.png" alt="eFOI" class="w-12 h-12 object-contain"
                                onerror="this.onerror=null; this.src='https://placehold.co/80x80/1a589e/ffffff?text=FOI';">
                        </div>
                        <h4 class="text-xl font-bold text-[#1a589e] mb-2">eFOI</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Submit and track your Freedom of Information
                            requests.</p>
                    </div>
                </a>

                <!-- Card 3: Water Rates -->


                <!-- Card 4: Payment Centers -->
                <a href="02_paymc"
                    class="group bg-white rounded-2xl shadow-lg border-t-8 border-[#1a589e] overflow-hidden transition-all duration-300 hover:shadow-md hover:translate-y-[-4px]">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="mb-4 transition-transform duration-300 group-hover:scale-110">
                            <img src="./img/qlicons/9.png" alt="Payment" class="w-12 h-12 object-contain"
                                onerror="this.onerror=null; this.src='https://placehold.co/80x80/1a589e/ffffff?text=PC';">
                        </div>
                        <h4 class="text-xl font-bold text-[#1a589e] mb-2">Payment Centers</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Find authorized collection establishments near
                            you.</p>
                    </div>
                </a>

                <!-- Card 5: Job Opportunities -->
                <a href="03_jo"
                    class="group bg-white rounded-2xl shadow-lg border-t-8 border-[#1a589e] overflow-hidden transition-all duration-300 hover:shadow-md hover:translate-y-[-4px]">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="mb-4 transition-transform duration-300 group-hover:scale-110">
                            <img src="./img/qlicons/11.png" alt="Jobs" class="w-12 h-12 object-contain"
                                onerror="this.onerror=null; this.src='https://placehold.co/80x80/1a589e/ffffff?text=JO';">
                        </div>
                        <h4 class="text-xl font-bold text-[#1a589e] mb-2">Job Opportunities</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Join our team and view current career openings.
                        </p>
                    </div>
                </a>

                <!-- Card 6: FAQs -->
                <a href="02_faqs"
                    class="group bg-white rounded-2xl shadow-lg border-t-8 border-[#1a589e] overflow-hidden transition-all duration-300 hover:shadow-md hover:translate-y-[-4px]">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="mb-4 transition-transform duration-300 group-hover:scale-110">
                            <img src="./img/qlicons/12.png" alt="FAQ" class="w-12 h-12 object-contain"
                                onerror="this.onerror=null; this.src='https://placehold.co/80x80/1a589e/ffffff?text=FAQ';">
                        </div>
                        <h4 class="ttext-xl font-bold text-[#1a589e] mb-2">FAQs</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Find answers to frequently asked questions.</p>
                    </div>
                </a>

                <!-- Card 7: Septage Management -->
                <a href="02_smp"
                    class="group bg-white rounded-2xl shadow-lg border-t-8 border-[#1a589e] overflow-hidden transition-all duration-300 hover:shadow-md hover:translate-y-[-4px]">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="mb-4 transition-transform duration-300 group-hover:scale-110">
                            <img src="./img/qlicons/13.png" alt="Charter" class="w-12 h-12 object-contain"
                                onerror="this.onerror=null; this.src='https://placehold.co/80x80/1a589e/ffffff?text=CC';">
                        </div>
                        <h4 class="text-xl font-bold text-[#1a589e] mb-2">Septage Management Program</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Our commitment to efficient and quality
                            water service.</p>
                    </div>
                </a>

                <!-- Card 8: Water Quality Report -->
                <a href="03_gad"
                    class="group bg-white rounded-2xl shadow-lg border-t-8 border-[#1a589e] overflow-hidden transition-all duration-300 hover:shadow-md hover:translate-y-[-4px]">
                    <div class="p-6 flex flex-col items-center text-center">
                        <div class="mb-4 transition-transform duration-300 group-hover:scale-110">
                            <img src="./img/qlicons/14.png" alt="Quality" class="w-12 h-12 object-contain"
                                onerror="this.onerror=null; this.src='https://placehold.co/80x80/1a589e/ffffff?text=WQ';">
                        </div>
                        <h4 class="text-xl font-bold text-[#1a589e] mb-2">GAD</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Fairness and equity in our workplace and
                            service delivery.</p>
                    </div>
                </a>

            </div>
        </div>
    </div>

    <!-- About -->
    <section class="py-20 px-4 font-['Montserrat']">
        <div class="max-w-7xl mx-auto">

            <div
                class="relative bg-white rounded-[2rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] overflow-hidden border border-slate-100">
                <div class="flex flex-wrap items-stretch">

                    <!-- Content Column (Left) -->
                    <div class="w-full lg:w-7/12 p-8 md:p-16 relative z-10">
                        <div class="mb-10">
                            <span
                                class="text-[#1a589e] font-black text-[15px] uppercase tracking-[0.3em] mt-3 mb-3 block">We
                                are</span>
                            <h2 class="text-4xl md:text-5xl font-black text-slate-900 leading-tight"><span
                                    class="text-[#1a589e]">Calamba Water District</span></h2>
                        </div>

                        <!-- Tabs Navigation -->
                        <div class="flex gap-10 border-b border-slate-100 mb-12">
                            <button onclick="switchTab('mission')" id="btn-mission"
                                class="tab-btn pb-4 font-bold uppercase tracking-widest text-xs transition-all border-b-4 border-transparent text-slate-400 active-tab">
                                <i class="fa-solid fa-bullseye"></i>
                                Our Mission
                            </button>
                            <button onclick="switchTab('vision')" id="btn-vision"
                                class="tab-btn pb-4 font-bold uppercase tracking-widest text-xs transition-all border-b-4 border-transparent text-slate-400">
                                <i class="fa-solid fa-eye"></i>
                                Our Vision
                            </button>
                        </div>

                        <!-- Tab Panels -->
                        <div class="min-h-[180px]">
                            <!-- Mission Content -->
                            <div id="pane-mission" class="tab-pane">
                                <p
                                    class="text-xl md:text-2xl font-medium text-slate-700 leading-relaxed italic relative">
                                    <span class="text-7xl absolute -top-8 -left-5 font-serif text-[#1a589e]/60 italic 
                                    drop-shadow-[2px_2px_rgba(30,58,138,0.05)] select-none mb-2"> &ldquo; </span>
                                    Calamba Water District will ensure the Calambeños with sufficient supply of potable
                                    water 24/7 along with its commitment to establish sewerage and septage management
                                    system as part of our environmental concern.
                                </p>
                            </div>

                            <!-- Vision Content -->
                            <div id="pane-vision" class="tab-pane tab-content-hidden">
                                <p
                                    class="text-xl md:text-2xl font-medium text-slate-700 leading-relaxed italic relative">
                                    <span class="text-7xl absolute -top-8 -left-5 font-serif text-[#1a589e]/60 italic 
                                    drop-shadow-[2px_2px_rgba(30,58,138,0.05)] select-none"> &ldquo; </span>
                                    A Water District with the highest quality of service that ensures customer
                                    satisfaction by providing continuous supply of potable water at an affordable cost
                                    and committed to an environmental preservation and protection.
                                </p>
                            </div>

                        </div>

                        <div class="mt-12">
                            <a href="about_us"
                                class="group inline-flex items-center bg-slate-900 text-white px-8 py-4 rounded-full font-bold text-xs uppercase tracking-widest hover:bg-[#1a589e] transition-all shadow-lg hover:shadow-blue-200">
                                Discover More
                                <i
                                    class="fa-solid fa-arrow-right ml-3 group-hover:translate-x-2 transition-transform"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Dynamic Logo Column (Right) -->
                    <div
                        class="w-full lg:w-5/12 bg-gradient-to-br from-[#1a589e] to-[#0e3a6b] p-12 flex flex-col justify-center items-center relative overflow-hidden">
                        <!-- Decorative background circles -->
                        <div class="absolute w-64 h-64 bg-white/5 rounded-full -top-20 -right-20"></div>
                        <div class="absolute w-32 h-32 bg-white/5 rounded-full bottom-10 left-10"></div>

                        <div class="relative z-10 animate-float">
                            <div class="p-8 rounded-[3rem] shadow-2xl logo-glow">
                                <img src="./img/CWDIcon2.png" class="w-55 h-auto object-contain" alt="CWD 24/7"
                                    onerror="this.src='https://via.placeholder.com/200?text=CWD+24/7'">
                            </div>
                        </div>

                        <div class="mt-10 text-center z-10">
                            <h4 class="text-white font-bold tracking-[0.4em] uppercase text-[18px]">24 / 7
                                Public Service</h4>
                            <div class="w-12 h-1 bg-white/20 mx-auto mt-4 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>
    <br>
    <br>

    <!-- News & Advisory -->
<div class="py-12 px-4 sm:px-6 lg:px-8 bg-[#1a589e] shadow-lg">

    <div class="flex items-center justify-center gap-3 mb-10">
        <div class="h-1 w-10 bg-red-500 rounded-full"></div>
        <h2 class="text-4xl font-black text-white uppercase tracking-wide text-center mt-8 mb-10">
            News & Advisory
        </h2>
        <div class="h-1 w-10 bg-red-500 rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8">

<<<<<<< HEAD
            <!-- ================= FEATURED (LATEST NEWS) ================= -->
            <?php if ($featuredNews): ?>
                <div
                    class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col group transition-all duration-300 hover:shadow-md">

                    <?php if (!empty($featuredNews['news_image'])): ?>
                        <div class="w-full h-56 lg:h-72 overflow-hidden bg-slate-100">
                            <img class="w-full h-full object-cover transition duration-500 group-hover:scale-105 group-hover:opacity-95"
                                src="uploads/news/<?= htmlspecialchars($featuredNews['news_image']) ?>">
                        </div>
                    <?php else: ?>
                        <div
                            class="w-full h-56 lg:h-72 bg-slate-100 flex flex-col items-center justify-center text-slate-400 gap-2">
                            <i class="fa-regular fa-image text-2xl"></i>
                            <span class="text-xs font-bold uppercase tracking-wider">No Image Available</span>
                        </div>
                    <?php endif; ?>

                    <div class="p-6 sm:p-8 flex-grow flex flex-col justify-between">
                        <div>
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-red-50 text-xs font-black text-red-600 uppercase tracking-wider mb-3">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span>
                                Latest News
                            </span>

                            <h3
                                class="text-xl sm:text-2xl font-black text-slate-800 mb-2 leading-snug group-hover:text-blue-600 transition duration-200">
                                <?= htmlspecialchars($featuredNews['news_headline']) ?>
                            </h3>

                            <p class="text-xs font-semibold text-slate-400 flex items-center gap-1 mb-4">
                                <i class="fa-regular fa-calendar text-[11px]"></i>
                                <?= date('F d, Y', strtotime($featuredNews['date_published'])) ?>
                            </p>
                        </div>

                        <a href="03_newspost.php?id=<?= $featuredNews['id'] ?>"
                            class="inline-flex items-center gap-1 text-blue-600 font-bold text-xs uppercase tracking-wider hover:text-blue-700 transition group/btn">
                            Read Full Article
                            <i
                                class="fa-solid fa-arrow-right text-[10px] transition-transform group-hover/btn:translate-x-0.5"></i>
                        </a>
=======
        <!-- ================= FEATURED (LATEST NEWS) ================= -->
        <?php if ($featuredNews): ?>

            <?php
            $featuredImage = null;

            if (!empty($featuredNews['news_image'])) {

                $decoded = json_decode($featuredNews['news_image'], true);

                if (is_array($decoded)) {
                    $featuredImage = $decoded[0] ?? null;
                } else {
                    $featuredImage = $featuredNews['news_image'];
                }
            }
            ?>

            <div
                class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col group transition-all duration-300 hover:shadow-md">

                <?php if (!empty($featuredImage)): ?>
                    <div class="w-full h-56 lg:h-72 overflow-hidden bg-slate-100">
                        <img
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-105 group-hover:opacity-95"
                            src="uploads/news/<?= htmlspecialchars($featuredImage) ?>"
                            alt="News Image">
                    </div>
                <?php else: ?>
                    <div class="w-full h-56 lg:h-72 bg-slate-100 flex flex-col items-center justify-center text-slate-400 gap-2">
                        <i class="fa-regular fa-image text-2xl"></i>
                        <span class="text-xs font-bold uppercase tracking-wider">No Image Available</span>
                    </div>
                <?php endif; ?>

                <div class="p-6 sm:p-8 flex-grow flex flex-col justify-between">
                    <div>
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-red-50 text-xs font-black text-red-600 uppercase tracking-wider mb-3">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span>
                            Latest News
                        </span>

                        <h3
                            class="text-xl sm:text-2xl font-black text-slate-800 mb-2 leading-snug group-hover:text-blue-600 transition duration-200">
                            <?= htmlspecialchars($featuredNews['news_headline']) ?>
                        </h3>

                        <p class="text-xs font-semibold text-slate-400 flex items-center gap-1 mb-4">
                            <i class="fa-regular fa-calendar text-[11px]"></i>
                            <?= date('F d, Y', strtotime($featuredNews['date_published'])) ?>
                        </p>
>>>>>>> Test-2
                    </div>

<<<<<<< HEAD

            <!-- ================= RECENT NEWS LIST ================= -->
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col">

                <div class="p-4 border-b border-slate-100 bg-slate-50/70 flex items-center justify-between">
                    <h3 class="text-sm font-black text-slate-700 uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-newspaper text-slate-400"></i> Recent News
                    </h3>
                </div>

                <div class="h-[30rem] overflow-y-auto p-3 space-y-2 flex-grow scrollbar-thin">

                    <?php foreach ($recentNews as $news): ?>
                        <a href="03_newspost.php?id=<?= $news['id'] ?>"
                            class="flex items-center justify-between p-3 rounded-xl border border-transparent hover:border-slate-100 hover:bg-slate-50/50 transition-all duration-200 group">

                            <div class="flex items-center space-x-3.5 pr-2">
                                <div
                                    class="flex-shrink-0 w-11 h-11 rounded-xl overflow-hidden shadow-2xs border border-white bg-slate-100">
                                    <?php if (!empty($news['news_image'])): ?>
                                        <img src="uploads/news/<?= htmlspecialchars($news['news_image']) ?>"
                                            class="w-full h-full object-cover transition duration-300 group-hover:scale-105">
                                    <?php else: ?>
                                        <div
                                            class="w-full h-full bg-slate-200 flex items-center justify-center text-[10px] font-bold text-slate-400">
                                            N/A
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="flex flex-col gap-0.5">
                                    <p
                                        class="text-xs font-bold text-slate-700 leading-snug group-hover:text-blue-600 transition duration-150 line-clamp-2">
                                        <?= htmlspecialchars($news['news_headline']) ?>
                                    </p>
                                    <p class="text-[10px] font-medium text-slate-400 flex items-center gap-1 mt-0.5">
                                        <i class="fa-regular fa-calendar text-[9px]"></i>
                                        <?= date('F d, Y', strtotime($news['date_published'])) ?>
                                    </p>
                                </div>
                            </div>

                            <div
                                class="text-slate-300 group-hover:text-blue-600 transition-colors duration-150 pl-2 shrink-0">
                                <i
                                    class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-0.5 transition-transform"></i>
                            </div>
                        </a>
                    <?php endforeach; ?>

                    <?php if (empty($recentNews)): ?>
                        <div class="text-center py-12 text-slate-400 flex flex-col items-center justify-center gap-2">
                            <i class="fa-solid fa-folder-open text-xl text-slate-300"></i>
                            <p class="text-xs font-medium">No recent posts available.</p>
                        </div>
                    <?php endif; ?>

                </div>

                <div class="p-4 border-t border-slate-100 bg-white text-center">
                    <a href="03_news.php"
                        class="inline-flex items-center gap-1.5 text-xs font-black text-blue-600 hover:text-blue-700 uppercase tracking-wider transition-colors group">
                        View More News
                        <i
                            class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-0.5 transition-transform"></i>
=======
                    <a href="03_newspost.php?id=<?= $featuredNews['id'] ?>"
                        class="inline-flex items-center gap-1 text-blue-600 font-bold text-xs uppercase tracking-wider hover:text-blue-700 transition group/btn">
                        Read Full Article
                        <i class="fa-solid fa-arrow-right text-[10px] transition-transform group-hover/btn:translate-x-0.5"></i>
>>>>>>> Test-2
                    </a>
                </div>

            </div>

<<<<<<< HEAD
        </div>
    
<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 5px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
=======
        <?php endif; ?>
>>>>>>> Test-2


        <!-- ================= RECENT NEWS LIST ================= -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col">

            <div class="p-4 border-b border-slate-100 bg-slate-50/70 flex items-center justify-between">
                <h3 class="text-sm font-black text-slate-700 uppercase tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-newspaper text-slate-400"></i> Recent News
                </h3>
            </div>

            <div class="h-[30rem] overflow-y-auto p-3 space-y-2 flex-grow scrollbar-thin">

                <?php foreach ($recentNews as $news): ?>

                    <?php
                    $recentImage = null;

                    if (!empty($news['news_image'])) {

                        $decoded = json_decode($news['news_image'], true);

                        if (is_array($decoded)) {
                            $recentImage = $decoded[0] ?? null;
                        } else {
                            $recentImage = $news['news_image'];
                        }
                    }
                    ?>

                    <a href="03_newspost.php?id=<?= $news['id'] ?>"
                        class="flex items-center justify-between p-3 rounded-xl border border-transparent hover:border-slate-100 hover:bg-slate-50/50 transition-all duration-200 group">

                        <div class="flex items-center space-x-3.5 pr-2">

                            <div class="flex-shrink-0 w-11 h-11 rounded-xl overflow-hidden shadow-2xs border border-white bg-slate-100">

                                <?php if (!empty($recentImage)): ?>
                                    <img
                                        src="uploads/news/<?= htmlspecialchars($recentImage) ?>"
                                        class="w-full h-full object-cover transition duration-300 group-hover:scale-105"
                                        alt="News Image">
                                <?php else: ?>
                                    <div class="w-full h-full bg-slate-200 flex items-center justify-center text-[10px] font-bold text-slate-400">
                                        N/A
                                    </div>
                                <?php endif; ?>

                            </div>

                            <div class="flex flex-col gap-0.5">
                                <p class="text-xs font-bold text-slate-700 leading-snug group-hover:text-blue-600 transition duration-150 line-clamp-2">
                                    <?= htmlspecialchars($news['news_headline']) ?>
                                </p>
                                <p class="text-[10px] font-medium text-slate-400 flex items-center gap-1 mt-0.5">
                                    <i class="fa-regular fa-calendar text-[9px]"></i>
                                    <?= date('F d, Y', strtotime($news['date_published'])) ?>
                                </p>
                            </div>

                        </div>

                        <div class="text-slate-300 group-hover:text-blue-600 transition-colors duration-150 pl-2 shrink-0">
                            <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-0.5 transition-transform"></i>
                        </div>

                    </a>

                <?php endforeach; ?>

                <?php if (empty($recentNews)): ?>
                    <div class="text-center py-12 text-slate-400 flex flex-col items-center justify-center gap-2">
                        <i class="fa-solid fa-folder-open text-xl text-slate-300"></i>
                        <p class="text-xs font-medium">No recent posts available.</p>
                    </div>
                <?php endif; ?>

            </div>

            <div class="p-4 border-t border-slate-100 bg-white text-center">
                <a href="03_news.php"
                    class="inline-flex items-center gap-1.5 text-xs font-black text-blue-600 hover:text-blue-700 uppercase tracking-wider transition-colors group">
                    View More News
                    <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-0.5 transition-transform"></i>
                </a>
            </div>

        

    </div>
<<<<<<< HEAD
    <!-- VIEW MORE LINK -->
    <div class="p-4 border-t border-gray-200 text-center">
        <a href="02_ol_serv2.php" class="text-blue-600 hover:text-blue-800 font-bold text-lg">
            VIEW MORE ADVISORY
        </a>
    </div>

=======
>>>>>>> Test-2
</div>

        <div id="main-nav-wrapper"
            class="bg-white p-6 rounded-2xl border border-slate-100 shadow-lg max-w-6xl mx-auto my-8">

            <div class="border-b border-slate-100 pb-4 mb-6">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-blue-600 animate-pulse"></span>
                    <h1 class="text-xl font-black text-slate-800 tracking-wide">Service Advisories</h1>
                </div>
                <p class="text-xs font-medium text-slate-400 mt-1">Stay updated with the latest service movements,
                    maintenance, and announcements.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="space-y-3">
                    <div class="bg-red-50/50 px-3 py-2 rounded-xl border border-red-100/70 flex items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation text-red-600 text-sm"></i>
                        <h2 class="text-xs font-black text-red-600 uppercase tracking-wider">Emergency Interruptions
                        </h2>
                    </div>

                    <div class="space-y-2">
                        <button type="button"
                            class="advisory-trigger w-full text-left p-3.5 rounded-xl border border-slate-100 bg-white hover:bg-red-50/30 hover:border-red-200 transition-all duration-200 flex items-center justify-between group shadow-2xs"
                            data-title="Emergency Water Service Interruption on April 17, 2026"
                            data-content="<img class='w-full h-auto object-cover rounded-lg mb-4 shadow-md' src='./img/data/notice.jpg' alt='Emergency Notice'>">

                            <div class="flex flex-col items-start gap-1">
                                <span
                                    class="text-xs font-bold text-slate-700 group-hover:text-red-700 leading-snug line-clamp-2">Emergency
                                    Water Service Interruption</span>
                                <span class="text-[11px] font-semibold text-slate-400 flex items-center gap-1">
                                    <i class="fa-regular fa-calendar"></i> April 17, 2026
                                </span>
                            </div>
                            <div
                                class="w-7 h-7 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-red-600 group-hover:text-white transition-colors duration-200 shrink-0 ml-3 shadow-3xs">
                                <i class="fa-regular fa-eye text-xs"></i>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="bg-blue-50/50 px-3 py-2 rounded-xl border border-blue-100/70 flex items-center gap-2">
                        <i class="fa-solid fa-clock text-blue-600 text-sm"></i>
                        <h2 class="text-xs font-black text-blue-600 uppercase tracking-wider">Scheduled Maintenance</h2>
                    </div>

                    <div class="space-y-2">
                        <button type="button"
                            class="advisory-trigger w-full text-left p-3.5 rounded-xl border border-slate-100 bg-white hover:bg-blue-50/30 hover:border-blue-200 transition-all duration-200 flex items-center justify-between group shadow-2xs"
                            data-title="Scheduled Water Service Interruption on July 01, 2026"
                            data-content="<img class='w-full h-auto object-cover rounded-lg mb-4 shadow-md' src='./img/data/notice.jpg' alt='Scheduled Notice'>">

                            <div class="flex flex-col items-start gap-1">
                                <span
                                    class="text-xs font-bold text-slate-700 group-hover:text-blue-700 leading-snug line-clamp-2">Scheduled
                                    Water Service Interruption</span>
                                <span class="text-[11px] font-semibold text-slate-400 flex items-center gap-1">
                                    <i class="fa-regular fa-calendar"></i> July 01, 2026
                                </span>
                            </div>
                            <div
                                class="w-7 h-7 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-200 shrink-0 ml-3 shadow-3xs">
                                <i class="fa-regular fa-eye text-xs"></i>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="bg-amber-50/50 px-3 py-2 rounded-xl border border-amber-100/70 flex items-center gap-2">
                        <i class="fa-solid fa-bullhorn text-amber-600 text-sm"></i>
                        <h2 class="text-xs font-black text-amber-600 uppercase tracking-wider">General Announcements
                        </h2>
                    </div>

                    <div class="space-y-2">
                        <button type="button"
                            class="advisory-trigger w-full text-left p-3.5 rounded-xl border border-slate-100 bg-white hover:bg-amber-50/30 hover:border-amber-200 transition-all duration-200 flex items-center justify-between group shadow-2xs"
                            data-title="Holiday Notice: June 12, 2026 (No Office Operations)"
                            data-content="<img class='w-full h-auto object-cover rounded-lg mb-4 shadow-md' src='./img/data/notice.jpg' alt='Holiday Notice'>">

                            <div class="flex flex-col items-start gap-1">
                                <span
                                    class="text-xs font-bold text-slate-700 group-hover:text-amber-700 leading-snug line-clamp-2">Holiday
                                    Notice: No Office Operations</span>
                                <span class="text-[11px] font-semibold text-slate-400 flex items-center gap-1">
                                    <i class="fa-regular fa-calendar"></i> June 12, 2026
                                </span>
                            </div>
                            <div
                                class="w-7 h-7 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-amber-600 group-hover:text-white transition-colors duration-200 shrink-0 ml-3 shadow-3xs">
                                <i class="fa-regular fa-eye text-xs"></i>
                            </div>
                        </button>
                    </div>
                </div>

            </div>

            <div class="border-t border-slate-100 mt-6 pt-4 text-center">
                <a href="/02_ol_serv2.php"
                    class="inline-flex items-center gap-1.5 text-xs font-black text-blue-600 hover:text-blue-700 uppercase tracking-wider transition-colors group">
                    View More Advisory
                    <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-0.5 transition-transform"></i>
                </a>
            </div>

        </div>

    </div>

    <!-- Advisory Modal -->
    <div id="main-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-slate-900/60 backdrop-blur-sm">

        <!-- Modal Wrapper -->
        <div class="relative p-4 w-full max-w-2xl max-h-full my-auto">
            <!-- Modal content -->
            <div
                class="relative bg-white border border-slate-200 rounded-2xl shadow-2xl p-5 md:p-6 max-h-[90vh] flex flex-col">

                <!-- Modal header -->
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <h3 id="modal-title" class="text-sm md:text-base font-black text-slate-800 tracking-wide">
                        Modal Title Placeholder
                    </h3>
                    <!-- Close Button (X) -->
                    <button id="modal-close-x" type="button"
                        class="text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg p-1.5 inline-flex items-center transition-colors">
                        <i class="fa-solid fa-xmark text-lg"></i>
                    </button>
                </div>

                <!-- Modal body -->
                <div id="modal-body-wrapper" class="py-4 overflow-y-auto max-h-[65vh]">
                    <div id="modal-content" class="leading-relaxed text-slate-600 text-sm">
                        <!-- Ang HTML code ng inyong imahe/poster ay awtomatikong papasok dito -->
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center justify-end border-t border-slate-100 space-x-3 pt-4">
                    <button id="modal-accept" type="button"
                        class="text-white bg-blue-600 hover:bg-blue-700 shadow-sm font-bold text-xs px-4 py-2.5 rounded-xl transition-colors">
                        Acknowledge
                    </button>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>

    <!-- BAC -->
    <section class="py-16">
        <div class="container mx-auto px-4">

            <!-- Header Section -->
            <div class="flex items-center justify-center gap-4 mb-16">
                <div class="h-1 w-12 bg-[#1a589e] rounded-full hidden sm:block"></div>
                <h2 class="text-3xl md:text-4xl font-black text-[#1a589e] uppercase tracking-wider text-center">
                    Bids & Awards
                </h2>
                <div class="h-1 w-12 bg-[#1a589e] rounded-full hidden sm:block"></div>
            </div>

            <!-- Grid Container -->
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                    <!-- 1. Bidding Opportunities -->
                    <div
                        class="bg-white rounded-2xl shadow-xl overflow-hidden border-t-8 border-[#1a589e] flex flex-col h-full transition-transform duration-300 hover:-translate-y-2">
                        <div class="p-8 text-center flex-grow flex flex-col">
                            <div
                                class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-gavel text-[#1a589e] text-3xl"></i>
                            </div>
                            <h5 class="text-xl font-bold text-[#1a589e] mb-4">Bidding Opportunities</h5>
                            <p class="text-gray-600 text-sm mb-8 flex-grow">
                                View current Invitations to Bid and request for quotations for goods and infrastructure
                                projects.
                            </p>
                            <a href="03_bac1"
                                class="inline-flex items-center justify-center w-full px-6 py-3 text-white bg-[#1a589e] hover:bg-blue-800 rounded-lg font-semibold transition duration-200 shadow-md group">
                                View List <i
                                    class="fas fa-arrow-right ms-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>

                    <!-- 2. Bid Bulletin -->
                    <div
                        class="bg-white rounded-2xl shadow-xl overflow-hidden border-t-8 border-[#1a589e] flex flex-col h-full transition-transform duration-300 hover:-translate-y-2">
                        <div class="p-8 text-center flex-grow flex flex-col">
                            <div
                                class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-file-signature text-[#1a589e] text-3xl"></i>
                            </div>
                            <h5 class="text-xl font-bold text-[#1a589e] mb-4">Bid Bulletin / Addendum</h5>
                            <p class="text-gray-600 text-sm mb-8 flex-grow">
                                Official amendments, clarifications, and additional information regarding active bidding
                                processes.
                            </p>
                            <a href="03_bac2"
                                class="inline-flex items-center justify-center w-full px-6 py-3 text-white bg-[#1a589e] hover:bg-blue-800 rounded-lg font-semibold transition duration-200 shadow-md group">
                                Check Updates <i
                                    class="fas fa-arrow-right ms-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>

                    <!-- 3. Notices -->
                    <div
                        class="bg-white rounded-2xl shadow-xl overflow-hidden border-t-8 border-[#1a589e] flex flex-col h-full transition-transform duration-300 hover:-translate-y-2">
                        <div class="p-8 text-center flex-grow flex flex-col">
                            <div
                                class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-calendar-times text-[#1a589e] text-3xl"></i>
                            </div>
                            <h5 class="text-xl font-bold text-[#1a589e] mb-4">Notices of Postponement</h5>
                            <p class="text-gray-600 text-sm mb-8 flex-grow">
                                Announcements regarding changes in schedules for pre-bid conferences or bid openings.
                            </p>
                            <a href="03_bac3"
                                class="inline-flex items-center justify-center w-full px-6 py-3 text-white bg-[#1a589e] hover:bg-blue-800 rounded-lg font-semibold transition duration-200 shadow-md group">
                                See Notices <i
                                    class="fas fa-arrow-right ms-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>

                    <!-- 4. Post-Award -->
                    <div
                        class="bg-white rounded-2xl shadow-xl overflow-hidden border-t-8 border-[#1a589e] flex flex-col h-full transition-transform duration-300 hover:-translate-y-2">
                        <div class="p-8 text-center flex-grow flex flex-col">
                            <div
                                class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-trophy text-[#1a589e] text-3xl"></i>
                            </div>
                            <h5 class="text-xl font-bold text-[#1a589e] mb-4">Post-Award Information</h5>
                            <p class="text-gray-600 text-sm mb-8 flex-grow">
                                Transparency in the conclusion of bids, including Notices of Award and Proceed.
                            </p>
                            <a href="03_bac4"
                                class="inline-flex items-center justify-center w-full px-6 py-3 text-white bg-[#1a589e] hover:bg-blue-800 rounded-lg font-semibold transition duration-200 shadow-md group">
                                Awards Granted <i
                                    class="fas fa-arrow-right ms-2 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <br>

    <!-- Waterlife -->
    <div class="container mx-auto mb-10">

        <div class="flex items-center justify-center gap-3 mb-4">
            <div class="h-1 w-10 bg-[#1a589e] rounded-full"></div>
            <h2 class="text-4xl font-black text-[#1a589e] uppercase tracking-wide text-center mt-8 mb-4">Waterlife
                Magazine</h2>
            <div class="h-1 w-10 bg-[#1a589e] rounded-full"></div>
        </div>

        <!-- WL Body -->

        <div id="waterlifeCarousel" class="relative w-full mx-auto max-w-7xl p-4" data-carousel="static">

            <!-- Carousel Wrapper - Explicit minimum height added here -->
            <div class="relative overflow-hidden rounded-lg  min-h-[800px] sm:min-h-[400px]">

                <!-- Item 1: 2025 Issue -->
                <div class="duration-700 ease-in-out" data-carousel-item="active">
                    <div class="w-full h-full p-6 flex justify-center items-center">
                        <!-- Card structure with new accent border -->
                        <div class="max-w-3xl h-full bg-white rounded-xl shadow-sm border-t-8 border-[#15467e]
                    flex flex-col md:flex-row md:items-center w-full">
                            <div class="w-full md:w-5/12 p-4 flex justify-center md:block ">
                                <!-- Placeholder image URL used, added bg-gray-100 to differentiate from card background -->
                                <img class="object-contain w-full rounded-xl bg-[#15467e] max-h-56 md:w-full md:h-auto shadow-lg"
                                    src="./img/wl25.png" alt="Waterlife Magazine 2025 Issue">
                            </div>
                            <!-- SCROLLING ADDED HERE: max-h-48 (sets max height on mobile) and overflow-y-auto (enables scrolling) -->
                            <div
                                class="w-full md:w-7/12 p-4 md:p-8 max-h-61 overflow-y-auto md:max-h-full md:overflow-y-visible">
                                <h5 class="mb text-2xl font-bold tracking-tight text-gray-900">Volume 11 Issue 1</h5>
                                <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900">Renewing Commitment &
                                    Strengthening Service</h5>
                                <p class="mb-6 font-normal text-gray-700">The cover features "Peter the Plumber,"
                                    symbolizing CWD's dedication and technical expertise. It is surrounded by real-life
                                    images highlighting CWD's infrastructure and operations, reflecting its continuous
                                    effort to deliver clean, safe water through innovation and sustainability.</p>
                                <a href="./pdf/CWD WL, Vol 11, Issue 1 (2025) [Compressed Ver].pdf" target="_blank"
                                    class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-center text-white bg-[#1a589e] rounded-lg
                    hover:bg-[#15467e] focus:ring-4 focus:outline-none focus:ring-blue-300 transition duration-200 shadow-md">
                                    Read Issue
                                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" fill="none" viewBox="0 0 14 10"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="duration-700 ease-in-out" data-carousel-item="">
                    <div class="w-full h-full p-6 flex justify-center items-center">
                        <!-- Card structure with new accent border -->
                        <div class="max-w-3xl h-full bg-white rounded-xl shadow-sm border-t-8 border-[#15467e]
                    flex flex-col md:flex-row md:items-center w-full">
                            <div class="w-full md:w-5/12 p-4 flex justify-center md:block ">
                                <!-- Placeholder image URL used, added bg-gray-100 to differentiate from card background -->
                                <img class="object-contain w-full rounded-xl bg-[#15467e] max-h-56 md:w-full md:h-auto shadow-lg"
                                    src="./img/wl25.png" alt="Waterlife Magazine 2025 Issue">
                            </div>
                            <!-- SCROLLING ADDED HERE: max-h-48 (sets max height on mobile) and overflow-y-auto (enables scrolling) -->
                            <div
                                class="w-full md:w-7/12 p-4 md:p-8 max-h-61 overflow-y-auto md:max-h-full md:overflow-y-visible">
                                <h5 class="mb text-2xl font-bold tracking-tight text-gray-900">Archives</h5>
                                <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900">View all archives issues
                                </h5>
                                <p class="mb-6 font-normal text-gray-700">Looks like you've checked out all this year's
                                    issues. Keep
                                    reading on our past issues here!</p>
                                <a href="03_wl" target="_blank"
                                    class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-center text-white bg-[#1a589e] rounded-lg
                                    hover:bg-[#15467e] focus:ring-4 focus:outline-none focus:ring-blue-300 transition duration-200 shadow-md">
                                    Go to Waterlife
                                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" fill="none" viewBox="0 0 14 10"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Previous Button -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>

                <span class="inline-flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                        stroke="#15467e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chevron-left-icon lucide-chevron-left">
                        <path d="m15 18-6-6 6-6" />
                    </svg>

                </span>
            </button>

            <!-- Next Button -->
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span class="inline-flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                        stroke="#15467e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chevron-right-icon lucide-chevron-right">
                        <path d="m9 18 6-6-6-6" />
                    </svg>

                </span>
            </button>

        </div>

    </div>

    <br>
    <br>
    <br>

    <!-- Offices -->
    <div class="relative overflow-hidden mx-auto shadow-2xl group" style="max-width: 100%; min-height: 50vh;">

        <!-- Background Image with Hover Zoom Effect -->
        <img src="./img/bld1.jpg"
            onerror="this.src='https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop';"
            class="w-full h-full object-cover absolute inset-0 transition-transform duration-1000 scale-105 group-hover:scale-110"
            alt="CWD Building">

        <!-- Gradient Overlay for better text legibility -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/40 to-transparent"></div>

        <!-- Content Container -->
        <div class="absolute inset-0 flex flex-col items-center justify-center p-8 text-center">

            <!-- Animated Badge -->
            <div
                class="mb-4 py-1 px-4 bg-blue-500/80 backdrop-blur-md border border-blue-400/30 rounded-full inline-block">
                <span class="text-white text-[10px] font-bold uppercase tracking-[0.3em]"><i
                        class="fa-solid fa-building-flag mr-2"></i>Ready to serve you!</span>
            </div>

            <!-- Headline with subtle Text Shadow -->
            <h2
                class="text-white font-black text-5xl md:text-7xl uppercase tracking-tighter mb-8 max-w-4xl leading-[0.9] drop-shadow-2xl">
                Visit Our <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Office</span>
                Today!
            </h2>

            <!-- Enhanced Button with Shimmer Effect -->
            <div class="relative group/btn">
                <a href="contact_us"
                    class="relative overflow-hidden bg-[#facc15] text-slate-900 px-10 py-3 rounded-2xl font-black text-sm uppercase tracking-widest transition-all duration-300 transform hover:-translate-y-1 hover:shadow-[0_20px_40px_rgba(250,204,21,0.3)] inline-block">

                    <!-- Shimmer Element -->
                    <div
                        class="absolute top-0 -inset-full h-full w-1/2 z-5 block transform -skew-x-12 bg-gradient-to-r from-transparent via-white/40 to-transparent opacity-40 group-hover/btn:animate-[shimmer_1.5s_infinite]">
                    </div>

                    <span class="relative z-10 flex items-center">
                        Check Our Locations
                        <i class="fa-solid fa-location-dot ml-3 text-xs"></i>
                    </span>
                </a>
            </div>

            <!-- Subtle Hint -->
            <p class="mt-6 text-slate-300/80 text-xs font-medium tracking-wide">Open Mondays to Fridays, 8:00 AM - 5:00
                PM <br> Saturdays 8:00 to 12:00 NN

            </p>
        </div>
    </div>

    <!-- Back to Top Button -->
    <?php include 'includes/backtotopwkd.php'; ?>


    <?php include 'footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/gsap.min.js"></script>


    <script src="./js/index.js"></script>
    <script src="./js/counter.js"></script>
    <script src="./js/style.js"></script>
    <script src="./js/tabpane2.js"></script>
    <script src='includes/scripts.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('main-modal');
            const mainNavWrapper = document.getElementById('main-nav-wrapper'); // Reference sa blue/red/amber content lists
            const mainNavbar = document.getElementById('main-navbar'); // Reference sa fixed top bar

            const modalTitle = document.getElementById('modal-title');
            const modalContent = document.getElementById('modal-content');
            const modalAccept = document.getElementById('modal-accept');

            // In-update para sa bagong card elements gamit ang class na .advisory-trigger
            const navLinks = document.querySelectorAll('.advisory-trigger');

            // In-update ang selectors para magtugma sa mga ID ng close button sa iyong modal html (X button at Close button)
            const closeButtons = document.querySelectorAll('#modal-close-x, #modal-close-btn');

            // Mobile menu references
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMenuButton = document.getElementById('close-menu-button');
            const offcanvasMenu = document.getElementById('offcanvas-menu');

            // --- Mobile Menu Logic ---
            if (mobileMenuButton && offcanvasMenu) {
                mobileMenuButton.addEventListener('click', () => {
                    offcanvasMenu.classList.remove('translate-x-full');
                });
            }

            if (closeMenuButton && offcanvasMenu) {
                closeMenuButton.addEventListener('click', () => {
                    offcanvasMenu.classList.add('translate-x-full');
                });
            }

            // --- Modal Open/Close Functions ---
            const openModal = (title, content) => {
                // HIDE BOTH MAIN NAVIGATION ELEMENTS (Gaya ng original script)
                if (mainNavWrapper) {
                    mainNavWrapper.classList.add('hidden');
                }
                if (mainNavbar) {
                    mainNavbar.classList.add('hidden');
                }

                modalTitle.textContent = title;
                modalContent.innerHTML = content;

                // Static single button implementation: Palaging "Acknowledge" at nagsasara lang ng modal
                modalAccept.textContent = 'Acknowledge';
                modalAccept.onclick = () => {
                    closeModal();
                };

                modal.classList.remove('hidden');
                modal.setAttribute('aria-hidden', 'false');
                document.body.classList.add('overflow-hidden'); // Prevent background scrolling
            };

            const closeModal = () => {
                // SHOW BOTH MAIN NAVIGATION ELEMENTS AGAIN (Gaya ng original script)
                if (mainNavWrapper) {
                    mainNavWrapper.classList.remove('hidden');
                }
                if (mainNavbar) {
                    mainNavbar.classList.remove('hidden');
                }

                modal.classList.add('hidden');
                modal.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('overflow-hidden');
            };

            // --- Attach Event Listeners to Advisory Cards ---
            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();

                    // Kukunin ang pamagat mula sa data-title attribute ng button
                    const title = link.getAttribute('data-title') || 'Service Advisory';
                    const content = link.getAttribute('data-content') || '<p class="text-body">No detailed content available for this service.</p>';

                    openModal(title, content);
                });
            });

            // --- Attach Event Listeners to Close Buttons ---
            closeButtons.forEach(btn => {
                btn.addEventListener('click', closeModal);
            });

            // Close modal when clicking outside (on the backdrop)
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal();
                }
            });

            // Close modal on escape key press
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        });
    </script>

</body>

</html>
