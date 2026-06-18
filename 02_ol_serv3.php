<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online Services</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
    <link rel="stylesheet" href="./css/calcu.css">
    <link rel="stylesheet" href="./css/about.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        .calculator-card {
            background: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        .input-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .custom-select,
        .custom-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem !important;
            border: 1px solid #e2e8f0;
            background-color: #f1f5f9;
            transition: all 0.2s;
            outline: none;
        }

        .custom-select:focus,
        .custom-input:focus {
            border-color: #1a589e;
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(26, 88, 158, 0.1);
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px dashed #e2e8f0;
        }

        .total-box {
            background: linear-gradient(135deg, #1a589e 0%, #0f3d70 100%);
            color: white;
            border-radius: 1rem;
            padding: 1.5rem;
        }

        .animate-fade-in {
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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
                            <i class="fa-solid fa-calculator"></i>
                            <a href="#"
                                class="inline-flex items-center text-m font-medium text-white hover:text-fg-brand">Bill
                                Calculator</a>
                        </div>
                    </li>

                </ol>
            </nav>

        </div>

        <br><br>

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">Bill Calculator
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
                </h4>

                <?php include 'includes/calcu2.php'; ?>
            </div>


            <!-- Left Navigation -->
            <div class="col-6 col-md-3 mx-auto">
                <nav class="nav flex-column">
                    <h3
                        class="text-2xl font-black text-[#1a589e] text-center uppercase tracking-wide mt-2 mb-2">
                        Online Services</h3>
                    <a class="tab-card" aria-current="page" href="./02_ol_serv">
                        <h5 class="font-bold text-sm"><i class="fa-solid fa-mobile-screen"></i> Online Payment</h5>
                    </a>
                    <a class="tab-card active" href="#" tabindex="-1" aria-disabled="true">
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


    <br>
    <br>
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

    <script src="./js/index.js"></script>
    <script src="./js/calcu2.js"></script>

</body>

</html>