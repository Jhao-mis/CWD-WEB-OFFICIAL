<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD Gender & Development</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/gadnew.css">
    <link rel="stylesheet" href="./css/navtwnew.css">

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

        <div class="container">

            <!-- Breadcrumb -->
            <nav class="flex mt-3 mx-7" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="events"
                            class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">
                            <i class="fa-solid fa-calendar-days text-sm mr-2"></i>
                            Events
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
                            <i class="fa-solid fa-venus-mars w-5 mr-2"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">GAD</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">Gender & Development
            </h1>
        </div>

        <svg class="absolute bottom-0 left-0 w-full h-[60px] sm:h-[120px] md:h-[100px] lg:h-[80px] z-0"
            viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="white" fill-opacity="1"
                d="M0,128L40,133.3C80,139,160,149,240,144C320,139,400,117,480,133.3C560,149,640,203,720,186.7C800,171,880,85,960,74.7C1040,64,1120,128,1200,144C1280,160,1360,128,1400,112L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
    </div>

    <!-- Gad Logo & Symbolism-->

    <div
        class="container mx-auto bg-neutral-primary-soft block max-w-m p-6 rounded-base shadow-xs hover:bg-neutral-secondary-medium">

        <img class="rounded-full w-180 h-60 mx-auto" src="./img/gad.png" alt="image description">
        <br>

        <h5 class="text-2xl font-black uppercase tracking-wide mt-2 mb-2">The CWD Gender & Development
            Initiatives</h5>
        <p class="text-justify text-body">In celebration of National Women's Month, the Calamba Water District being a
            gender responsive agency launches its GAD Official logo that symbolizes 24/7 continuous supply of potable
            water to the people of Calamba City. The Management together with the GAD Focal Point System is committed to
            mainstream Gender and Development in all the CWD's Programs, Projects and Activities (PPAs) and promote
            gender equality within the organization and communities.</p>
    </div>


    <!-- Main Content -->

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- COLUMN 1: GAD Memo (PDF Opener) -->
            <div class="lg:col-span-1">
                <div class="top-8 space-y-6">

                    <!-- GAD Memo Card -->
                    <div class="bg-white rounded-xl p-6 shadow-xl border-t-4 border-pink-500">
                        <div class="flex items-center justify-start space-x-3 mb-4">
                            <!-- Icon using Lucide SVG style -->
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
                            <!-- Memo List Item -->
                            <div class="border rounded-lg p-3 flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-700">GAD Guidelines</span>
                                <button class="text-xs font-semibold text-pink-600 hover:text-pink-800 transition">
                                    <a href="./pdf/GAD_Guidelines.pdf" target="_blank">View PDF</a>
                                </button>
                            </div>
                            <!-- Memo List Item -->
                            <div class="border rounded-lg p-3 flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-700">Collection & Use of SDD for GAD
                                    Programs</span>
                                <button class="text-xs font-semibold text-pink-600 hover:text-pink-800 transition">
                                    <a href="./pdf/GAD_DataColl.pdf" target="_blank">View PDF</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLUMN 2 & 3: GAD Reports and Year Navigation -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-xl p-6 border-t-4 border-pink-500">

                <h2 class="text-2xl font-black uppercase tracking-wide mt-2 mb-2">Annual GAD Reports & Accomplishments</h2>
                <p class="text-gray-500 mt-1 mb-4">Stay updated with our latest GAD initiatives and milestones.</p>

                <!-- Dynamic Tabs Container -->
                <div id="year-tabs-container"
                    class="flex space-x-2 mt-6 md:mt-0 overflow-x-auto pb-2 scrollbar-hide mb-6">
                    <!-- Tabs generated by JS -->
                </div>

                <!-- News Card Grid Container -->
                <div id="gad-news-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 min-h-[400px]">
                    <!-- News Cards generated by JS -->
                </div>

            </div>

        </div>
    </main>

    <!-- === HIDDEN DATA SOURCE === -->
    <!-- This structure allows you to easily add more items in PHP/HTML -->
    <div id="gad-data-source" class="hidden">

        <div class="gad-post" data-year="2025" data-title="Walk In Her Shoes 2025" data-date="March 11, 2025"
            data-link="gadposts\gadpost25-01"
            data-image="assets\Files\gad\2025\wihs\wihs.png">
            <p class="excerpt">Theme: "Kababaihan ng CWD, Kaagapay sa PaghahanGAD ng Magandang Bukas para sa Bagong Pilipinas"</p>
        </div>

        <div class="gad-post" data-year="2025" data-title="GAD Seminars" data-date="March 14 2025"
            data-link="gadposts\gadpost25-02"
            data-image="assets\Files\gad\2025\others\wm.jpg">
            <p class="excerpt"> Seminars covering comprehensive discussions on various important laws related to gender-based violence </p>
        </div>

        <div class="gad-post" data-year="2024" data-title="Walk In Her Shoes 2024" data-date="March 6, 2024"
            data-link="gadposts\gadpost24-01"
            data-image="assets\Files\gad\2024\wihs\1.jpg">
            <p class="excerpt">Theme: "Ikaw, Ako, Tayo at Si Juana hanGAD magandang pagbabago"</p>
        </div>

        <div class="gad-post" data-year="2024" data-title="Gandang CWD & Fab Over 40" data-date="March 22, 2024"
            data-link="gadposts\gadpost24-02"
            data-image="assets\Files\gad\2024\others\gcwd.jpg">
            <p class="excerpt">Recognizing the contribution and sacrifices of women in nation building.
            </p>
        </div>

        <div class="gad-post" data-year="2024" data-title="That's My Tatay" data-date="June 13, 2024"
            data-link="gadposts\gadpost24-03"
            data-image="assets\Files\gad\2024\others\tmt.jpg">
            <p class="excerpt">Highlighting the vital role of fathers as pillars of the family and the organization.
            </p>
        </div>

        <div class="gad-post" data-year="2024" data-title="Various GAD Activities" data-date="March, July & November 2024"
            data-link="gadposts\gadpost24-04"
            data-image="assets\Files\gad\2024\others\wm.jpg">
            <p class="excerpt">Health Awareness Program, Defensive Driving Seminar, Rice Distribution, and Poster Making Contest.
            </p>
        </div>


        <div class="gad-post" data-year="2023" data-title="Walk In Her Shoes 2023" data-date="March 13, 2023"
            data-link="gadposts\gadpost23-01" data-image="assets\Files\gad\2023\wihs\0.jpg">
            <p class="excerpt">Theme: WE for Gender Equality and Inclusive Society
            </p>
        </div>

        <div class="gad-post" data-year="2023" data-title="Women's Month 2023" data-date="March 23, 2023"
            data-link="gadposts\gadpost23-02" data-image="assets\Files\gad\2023\others\wm.jpg">
            <p class="excerpt">Poster Making, Zumba ni Juana, Health Awareness Program, Freebie Kits Distribution
            </p>
        </div>


        <div class="gad-post" data-year="Archives" data-title="Walk In Her Shoes 2022" data-date="March 7, 2022"
            data-link="gadposts\gadpost22-01" data-image="assets\Files\gad\2022\wihs\0.jpg">
            <p class="excerpt">Theme: Adhikain ni Juana, HanGAD CWD na Maunlad
            </p>
        </div>

        <div class="gad-post" data-year="Archives" data-title="GAD Seminars & Trainings" data-date="June, July & October 2022"
            data-link="gadposts\gadpost22-02" data-image="assets\Files\gad\2022\others\gst.jpg">
            <p class="excerpt">Gender Sensitivity Training & Seminar-Workshop on GMEF and GAD Agenda
            </p>
        </div>

        <div class="gad-post" data-year="Archives" data-title="Various GAD Activities" data-date="May & June 2022"
            data-link="gadposts\gadpost22-03" data-image="assets\Files\gad\2022\others\fount1.png">
            <p class="excerpt">Mother's & Father's Day, Rice Distribution & Fountain for Public School
            </p>
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
    <script src="./js/gadnew.js"></script>

</body>

</html>