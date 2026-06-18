<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD Online Services</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png"/>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/olserv.css">

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
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Online
                                Services</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">Online Services
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Card 1: New Service Connection Application --><a href="./02_ol_serv" class="feature-card group">
                <div class="icon-wrapper">
                    <img src="./img/icons/olpay.png" alt="Online Payment Icon">
                </div>
                <h3 class="text-2xl font-black text-[#1a589e] uppercase tracking-wide mt-2 mb-2">Online Payment</h3>
                <p class="text-gray-600 text-sm font-semibold">Pay your water bills online thru our verified partners</p>
            </a>

            <!-- Card 2: Bill Calculator --><a href="./02_ol_serv3" class="feature-card group">
                <div class="icon-wrapper">
                    <img src="./img/icons/calc.png" alt="Bill Calculator Icon">
                </div>
                <h3 class="text-2xl font-black text-[#1a589e] uppercase tracking-wide mt-2 mb-2">Bill Calculator</h3>
                <p class="text-gray-600 text-sm font-semibold">Know and calculate your bill consumption.</p>
            </a>

            <!-- Card 3: Water Service Notices --><a href="./02_ol_serv2" class="feature-card group">
                <div class="icon-wrapper">
                    <img src="./img/icons/noti.png" alt="Water Service Notices Icon">
                </div>
                <h3 class="text-2xl font-black text-[#1a589e] uppercase tracking-wide mt-2 mb-2">Water Service Notices</h3>
                <p class="text-gray-600 text-sm font-semibold">Learn about the emergency and scheduled water service interruptions.</p>
            </a>

            <!-- Card 4: FOI --><a href="https://docs.google.com/forms/d/e/1FAIpQLSeN07_EsXAdLg6odGiWAUvU7T5mVR7UvjsohcdLQVhmJEm9ZQ/viewform" target="_blank" class="feature-card group">
                <div class="icon-wrapper">
                    <img src="./img/icons/text.png" alt="Freedom of Information Icon">
                </div>
                <h3 class="text-2xl font-black text-[#1a589e] uppercase tracking-wide mt-2 mb-2">Text & Email Blast Service</h3>
                <p class="text-gray-600 text-sm font-semibold">Be updated on the latest news and advisory from CWD</p>
            </a>

            <!-- Card 5: Avail our Text Blast Service --><a href="https://www.foi.gov.ph/agencies/clwd/" target="_blank" class="feature-card group">
                <div class="icon-wrapper">
                    <img src="./img/icons/foi3d.png" alt="Freedom of Information Icon">
                </div>
                <h3 class="text-2xl font-black text-[#1a589e] uppercase tracking-wide mt-2 mb-2">Freedom of Information
                    Request</h3>
                <p class="text-gray-600 text-sm font-semibold">File document requests on the FOI page of CWD</p>
            </a>

        </div>
    </div>

    </div>

    <br>
    <br>

    <!-- Back to Top -->
    <?php include 'includes/backtotop.php'; ?>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="./js/index.js"></script>
    <script src="./js/imgprev.js"></script>

</body>

</html>