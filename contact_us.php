<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact CWD</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>


    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/cont.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        .directory-container {
            background: linear-gradient(135deg, #1a589e 0%, #0f345e 100%);
            border-radius: 2rem;
            overflow: hidden;
        }

        .directory-preview {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1.5rem;
            transition: transform 0.4s ease;
        }

        .directory-preview:hover {
            transform: scale(1.02);
        }

        .download-btn {
            background: white;
            color: #1a589e;
            font-weight: 800;
            padding: 1rem 2rem;
            border-radius: 1rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .download-btn:hover {
            background: #f1f5f9;
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
            color: #0f345e;
        }

        .email-text {
            word-break: break-all;
        }
    </style>


</head>

<body>

    <!-- Kuya Daloy Chatbot -->


    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Header -->
    <div class="relative bg-[#1a589e] text-white overflow-hidden py-16 sm:py-20 md:py-24">

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">CONTACT US
            </h1>

        </div>
        <svg class="absolute bottom-0 left-0 w-full h-[60px] sm:h-[120px] md:h-[100px] lg:h-[80px] z-0"
            viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="white" fill-opacity="1"
                d="M0,128L40,133.3C80,139,160,149,240,144C320,139,400,117,480,133.3C560,149,640,203,720,186.7C800,171,880,85,960,74.7C1040,64,1120,128,1200,144C1280,160,1360,128,1400,112L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>

    </div>

    <br>

    <!-- Hero Header -->
    <header class="bg-white py-16 mb-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-black text-[#1a589e] uppercase tracking-tight mb-4">Reach Us Out!</h1>
            <p class="text-slate-500 max-w-2xl font-semibold mx-auto">We are committed to providing reliable water
                services. Reach
                out to us through our various offices and customer channels.</p>
        </div>
    </header>

    <!-- Offices Section -->
    <section class="container mx-auto px-4 mb-20">
        <div class="flex items-center justify-center gap-3 mb-10">
            <div class="h-1 w-10 bg-[#1a589e] rounded-full"></div>
            <h3 class="text-3xl font-black text-slate-800 uppercase tracking-wide">Our Offices</h3>
            <div class="h-1 w-10 bg-[#1a589e] rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 max-w-5xl mx-auto gap-8">
            <!-- Halang Main Office -->
            <div class="office-card bg-white shadow-md">
                <div class="office-img-container">
                    <img src="./img/bldsq.jpg" alt="Halang Main Office">
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <h5 class="text-xl font-black text-[#1a589e] mb-4">Halang Main Office</h5>

                    <div class="space-y-4 flex-grow">
                        <div class="flex gap-3">
                            <div class="info-icon-wrapper"><i class="fa-solid fa-location-dot"></i></div>
                            <p class="text-slate-600 text-sm leading-relaxed">Lakeview Subd., Brgy. Halang, Calamba City
                            </p>
                        </div>
                        <div class="flex gap-3">
                            <div class="info-icon-wrapper"><i class="fa-solid fa-clock"></i></div>
                            <p class="text-slate-600 text-sm">
                                <span class="font-bold">Mon-Fri:</span> 8:00 AM - 5:00 PM<br>
                                <!-- <span class="font-bold">Sat:</span> 8:00 AM - 12:00 NN -->
                            </p>
                        </div>
                        <div class="flex gap-3">
                            <div class="info-icon-wrapper"><i class="fa-solid fa-phone"></i></div>
                            <p class="text-slate-600 text-sm font-medium">
                                (049) 545-2863; 545-1614<br>
                            
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Canlubang Office -->
            <div class="office-card bg-white shadow-md">
                <div class="office-img-container">
                    <img src="./img/anx.png" alt="Canlubang Extension Office">
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
                                <span class="font-bold">Mon-Fri:</span> 8:00 AM - 5:00 PM<br>
                                <!-- <span class="font-bold">Sat:</span> 8:00 AM - 12:00 NN -->
                            </p>
                        </div>
                        <div class="flex gap-3">
                            <div class="info-icon-wrapper"><i class="fa-solid fa-phone"></i></div>
                            <p class="text-slate-600 text-sm font-medium">(049) 549-0812</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Shopping Center -->
            
        </div>
    </section>

    <!-- Contact Center Section -->
    <section class="container mx-auto px-4 mb-20">
        <div class="flex items-center justify-center gap-3 mb-12">
            <div class="h-1 w-10 bg-red-500 rounded-full"></div>
            <h3 class="text-3xl font-black text-slate-800 uppercase tracking-wide">CWD Contact Center</h3>
            <div class="h-1 w-10 bg-red-500 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto mb-10">
            <!-- Customer Service -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden contact-accent-red flex flex-col">
                <div class="p-8 md:p-12 text-center flex-grow">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-red-50 text-red-600 rounded-2xl mb-6">
                        <i class="fa-solid fa-headset text-2xl"></i>
                    </div>
                    <h4 class="text-2xl font-black text-slate-800 mb-2">CUSTOMER SERVICE</h4>
                    <p class="text-slate-500 text-sm mb-8 uppercase tracking-widest font-bold">Inquiries & Reports</p>

                    <div class="mb-8">
                        <a href="tel:0495452863"
                            class="text-3xl md:text-4xl font-black text-red-600 hover:text-red-700 transition-colors block mb-2">(049)
                            545-2863</a>
                        <a href="tel:0495451614"
                            class="text-2xl md:text-3xl font-black text-[#1a589e] hover:text-[#1a589e] transition-colors block mb-4">(049)
                            545-1614</a>
                        <a href="mailto:cwd_customerservice@yahoo.com"
                            class="text-xl md:text-lg font-bold text-[#1a589e] hover:underline break-all sm:break-normal block">
                            cwd_customerservice@yahoo.com
                        </a>
                    </div>

                    <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">
                        <p class="text-slate-600 text-sm italic">Concessionaires may report all types of their concerns
                            on these channels.</p>
                    </div>
                </div>
            </div>

            <!-- Other Channels -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden contact-accent-blue flex flex-col">
                <div class="p-8 md:p-10 flex-grow">
                    <div class="flex items-center gap-4 mb-8">
                        <div
                            class="inline-flex items-center justify-center w-12 h-12 bg-blue-50 text-[#1a589e] rounded-xl">
                            <i class="fa-solid fa-circle-nodes text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-black text-slate-800">OTHER CHANNELS</h4>
                            <p class="text-xs text-[#1a589e] font-bold uppercase tracking-wider">Official Correspondence
                            </p>
                        </div>
                    </div>

                    <div
                        class="mb-8 p-4 bg-slate-50 rounded-2xl border border-slate-100 flex flex-col sm:flex-row items-start sm:items-center gap-3 overflow-hidden">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-envelope text-[#1a589e]"></i>
                            <span class="sm:hidden text-xs font-bold text-slate-400 uppercase">Email Us:</span>
                        </div>
                        <div class="w-full overflow-hidden">
                            <a href="mailto:calambawaterdistrict@yahoo.com" class="block">
                                <span
                                    class="text-lg font-bold text-slate-700 break-all sm:break-normal hover:text-blue-600 transition-colors">
                                    calambawaterdistrict@yahoo.com
                                </span>
                            </a>
                        </div>
                    </div>

                    <h5 class="text-sm font-black text-slate-400 uppercase tracking-widest mb-4">Telephone Hotlines</h5>
                    <div class="space-y-3">
                        <div
                            class="flex items-center justify-between p-3 rounded-xl border border-slate-100 hover:bg-slate-50 transition-colors">
                            <span class="badge-custom">BOD</span>
                            <span class="font-black text-slate-700">5100</span>
                        </div>
                        <div
                            class="flex items-center justify-between p-3 rounded-xl border border-slate-100 hover:bg-slate-50 transition-colors">
                            <span class="badge-custom">OGM</span>
                            <span class="font-black text-slate-700">4100</span>
                        </div>
                        <div
                            class="flex items-center justify-between p-3 rounded-xl border border-slate-100 hover:bg-slate-50 transition-colors">
                            <span class="badge-custom">BAC</span>
                            <span class="font-black text-slate-700">1007</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Media row -->
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- CWD Main FB -->
            <a href="https://www.facebook.com/CalambaWaterDistrict2019" target="_blank"
                class="social-card bg-white p-6 rounded-2xl shadow-lg flex items-center gap-6 group">
                <div
                    class="w-14 h-14 bg-[#1877F2] text-white rounded-full flex items-center justify-center text-2xl shadow-lg shadow-blue-200">
                    <i class="fa-brands fa-facebook-f"></i>
                </div>
                <div>
                    <h5 class="font-black text-slate-800 group-hover:text-[#1877F2] transition-colors">Calamba Water
                        District
                    </h5>
                    <p class="text-slate-500 text-sm">Official announcements and district updates.</p>
                </div>
                <i
                    class="fa-solid fa-arrow-right ml-auto text-slate-300 group-hover:text-[#1877F2] group-hover:translate-x-1 transition-all"></i>
            </a>

            <!-- CWD Connects -->
            <a href="https://www.facebook.com/profile.php?id=61582854260211" target="_blank"
                class="social-card bg-white p-6 rounded-2xl shadow-lg flex items-center gap-6 group">
                <div
                    class="w-14 h-14 bg-[#1877F2] text-white rounded-full flex items-center justify-center text-2xl shadow-lg shadow-blue-200">
                    <i class="fa-brands fa-facebook-f"></i>
                </div>
                <div>
                    <h5 class="font-black text-slate-800 group-hover:text-[#1877F2] transition-colors">CWD Connect</h5>
                    <p class="text-slate-500 text-sm">Community engagement and customer support.</p>
                </div>
                <i
                    class="fa-solid fa-arrow-right ml-auto text-slate-300 group-hover:text-[#1877F2] group-hover:translate-x-1 transition-all"></i>
            </a>
        </div>
    </section>


    <!-- Directory -->
    <section class="container mx-auto px-4 mb-24">
        <div class="directory-container p-8 md:p-12 shadow-2xl">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <!-- Content -->
                <div class="w-full lg:w-1/2 text-center lg:text-left">
                    <div
                        class="inline-block px-4 py-1 rounded-full bg-blue-400/20 text-blue-200 text-xs font-black tracking-widest uppercase mb-4">
                        Resource Library
                    </div>
                    <h3 class="text-3xl md:text-4xl font-black text-white mb-4">CWD Official Directory</h3>
                    <p class="text-blue-100 text-lg mb-8 leading-relaxed">
                        Need a specific department? Download our complete digital directory to keep all essential
                        Calamba Water District contact numbers at your fingertips.
                    </p>
                    <a href="assets\Files\transpc_data\All\DirectoryNew.png" download class="download-btn group">
                        <i class="fa-solid fa-cloud-arrow-down group-hover:bounce"></i>
                        Download Full Directory
                    </a>
                </div>

                <!-- Preview Area -->
                <div class="w-full lg:w-1/2">
                    <div class="directory-preview p-4 shadow-inner">
                        <div class="flex items-center gap-2 mb-4 px-2">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                            

                        </div>
                        <div class="rounded-lg overflow-hidden border border-white/10">
                            <img src="assets\Files\transpc_data\All\DirectoryNew.png"
                                class="w-full h-auto opacity-90 hover:opacity-100 transition-opacity"
                                alt="CWD Directory Preview">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>

    <!-- Back to Top Button -->
    <?php include 'includes/backtotop.php'; ?>


    <!-- Footer -->

    <?php include 'footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="./js/index.js"></script>
    <script src='includes/scripts.js'></script>

</body>

</html>