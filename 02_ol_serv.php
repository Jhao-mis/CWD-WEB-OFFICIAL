<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online Services</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png"/>


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/about.css">

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
                        <a href="./services"
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
                            <i class="fa-solid fa-mobile-screen-button mr-2"></i>
                            <a href="./02_ol_serv4"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Online
                                Services</a>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-3.5 h-3.5 rtl:rotate-180 text-body" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m9 5 7 7-7 7" />
                            </svg>
                            <i class="fa-solid fa-money-bill-wave"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Online
                                Payment</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">Online Payment
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
    <br>

    <!-- Page Content -->

    <div class="container mx-auto">
        <div class="row g-0 mt-4">

            <!-- Main Content -->
            <div class="col-sm-6 col-md-8">
                <h4 class="mb-3 text-2xl font-bold tracking-tight text-center text-[#1a589e] text-heading leading-8">

                    <div class="mb-4 border-b border-gray-50 ">
                        <ul class="flex -mb-px text-sm font-medium text-center whitespace-nowrap" id="default-tab"
                            data-tabs-toggle="#default-tab-content" role="tablist">
                            <li class="me-2 " role="presentation">
                                <button class="tab-button inline-block p-2 border-b-2 rounded-t-base" id="profile-tab"
                                    data-tabs-target="#du" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">

                                    <img src="./img/icons/gclogo.webp"
                                        class="h-[4vh] lg:w-[120px] sm:w-[100px] rounded-lg" alt="gcash">

                                </button>
                            </li>
                            <li class=" me-2 " role="presentation">
                                <button
                                    class="tab-button inline-block p-2 border-b-2 rounded-t-base hover:text-fg-brand hover:border-brand"
                                    id="dashboard-tab" data-tabs-target="#uas" type="button" role="tab"
                                    aria-controls="dashboard" aria-selected="false">
                                    <img src="./img/icons/lblogo.png"
                                        class="h-[4vh] lg:w-[140px] sm:w-[9rem]  rounded-lg" alt="Landbank">
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div id="default-tab-content">
                        <div class="hidden p-4 rounded-base bg-neutral-secondary-soft" id="du" role="tabpanel"
                            aria-labelledby="profile-tab">

                            <!-- Image 1 -->
                            <div class="image-container rounded-lg ">
                                <img src="./img/data/gcash1.jpg"
                                    class="w-auto h-[75vh] object-contain rounded-lg mx-auto" alt="Project Alpha"
                                    data-image-url="./img/data/gcash1.jpg" data-image-caption="Gcash Payments" />
                                <!-- Calls the function to display the image -->
                                <div class="preview-overlay" onclick="showModal(this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye">
                                        <path
                                            d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                    <span class="text-white text-lg p-2 rounded-full">Preview</span>
                                </div>
                            </div>

                            <br><br>

                            <!-- Image 2 -->
                            <div class="image-container rounded-lg">
                                <img src="./img/data/gcash2.jpg"
                                    class="w-auto h-[75vh] object-contain rounded-lg mx-auto" alt="Project Alpha"
                                    data-image-url="./img/data/gcash2.jpg" data-image-caption="Gcash Payments" />
                                <!-- Calls the function to display the image -->
                                <div class="preview-overlay" onclick="showModal(this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye">
                                        <path
                                            d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                    <span class="text-white text-lg p-2 rounded-full">Preview</span>
                                </div>
                            </div>


                        </div>
                        <div class="hidden p-4 rounded-base bg-neutral-secondary-soft" id="uas" role="tabpanel"
                            aria-labelledby="dashboard-tab">

                            <!-- Image 1 -->
                            <div class="image-container rounded-lg">
                                <img src="./img/data/landbank2.jpg"
                                    class="w-[55vw] h-auto object-cover rounded-lg mx-auto" alt="Project Alpha"
                                    data-image-url="./img/data/landbank2.jpg" data-image-caption="Landbank Payments" />
                                <!-- Calls the function to display the image -->
                                <div class="preview-overlay" onclick="showModal(this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye">
                                        <path
                                            d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                    <span class="text-white text-lg p-2 rounded-full">Preview</span>
                                </div>
                            </div>

                            <br><br>

                            <!-- Image 2 -->
                            <div class="image-container rounded-lg">
                                <img src="./img/data/landbank.jpg"
                                    class="w-[55vw] h-auto object-cover rounded-lg mx-auto" alt="Project Alpha"
                                    data-image-url="./img/data/landbank.jpg" data-image-caption="Landbank Payments" />
                                <!-- Calls the function to display the image -->
                                <div class="preview-overlay" onclick="showModal(this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye">
                                        <path
                                            d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                    <span class="text-white text-lg p-2 rounded-full">Preview</span>
                                </div>
                            </div>

                        </div>
                    </div>

            </div>


            <!-- Left Navigation -->
            <div class="col-6 col-md-3 mx-auto">
                <nav class="nav flex-column sidebar-nav">
                    <h3
                        class="text-2xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">
                        Online Services</h3>
                    <a class="tab-card active" aria-current="page" href="#">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-mobile-screen"></i> Online Payment</h5>
                    </a>
                    <a class="tab-card" href="./02_ol_serv3" tabindex="-1" aria-disabled="true">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-calculator"></i> Bill Calculator</h5>
                    </a>
                    <a class="tab-card" href="./02_ol_serv2" tabindex="-1" aria-disabled="true">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-bullhorn"></i> Water Service Notices</h5>
                    </a>
                    <a class="tab-card"
                        href="https://docs.google.com/forms/d/e/1FAIpQLSeN07_EsXAdLg6odGiWAUvU7T5mVR7UvjsohcdLQVhmJEm9ZQ/viewform"
                        target="_blank">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-comment-sms"></i> Email & Text Blast</h5>
                    </a>
                    <a class="tab-card" href="https://www.foi.gov.ph/agencies/clwd/" target="_blank">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-inbox"></i> eFOI
                        </h5>
                    </a>

                </nav>
            </div>


        </div>
    </div>

    <!-- Zoomable Image Preview Modal -->
    <div id="image-modal" class="fixed inset-0 z-50 hidden" style="background-color: rgba(0, 0, 0, 0.9);"
        onwheel="handleWheelEvent(event)">
        <!-- Modal Backdrop - Click anywhere to close -->
        <div class="absolute inset-0" onclick="closeModal()"></div>

        <!-- Modal Content Container -->
        <div class="relative flex items-center justify-center w-full h-full p-4 ">

            <!-- 
                Combined Controls (Zoom + Close) at Bottom Center 
            -->
            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 z-60 flex items-center space-x-4">


                <!-- Close Button -->

            </div>

            <!-- Image Area (The image itself is now inside a draggable/transformable wrapper) -->
            <div
                class="max-w-4xl max-h-full overflow-hidden flex flex-col items-center scrollbar-hidden overflow-y-auto max-h-[60vh]">
                <!-- Wrapper for Zoom and Pan -->
                <div id="modal-image-wrapper" class="rounded-lg shadow-2xl">
                    <img id="modal-image" src="" alt="Preview" class="object-contain"
                        onerror="this.src='https://placehold.co/600x400/CCCCCC/000000?text=Image+Load+Failed'">
                </div>

                <!-- Image Caption -->

                <div id="modal-caption" class="text-white text-center mt-3 p-2 text-lg">
                    <!-- Caption will be inserted here -->
                </div>

                <button onclick="closeModal()" title="Close Preview"
                    class="p-2 text-white text-3xl font-bold w-12 h-12 flex items-center justify-center bg-red-600 rounded-full shadow-xl hover:bg-red-700 transition">
                    &times;
                </button>
            </div>
        </div>
    </div>

    <br>
    <br>

    <!-- Back to Top -->
    <?php include 'includes/backtotop.php'; ?>
    
    <!-- Footer -->

    <?php include 'footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Js File for Sticky Nav -->
    <script src="./js/imgprev.js"></script>
    <script src="./js/index.js"></script>



</body>

</html>