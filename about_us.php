<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About CWD</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png"/>

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

    <!-- Kuya Daloy Chatbot -->

    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Header -->
    <div class="relative bg-[#1a589e] text-white overflow-hidden py-16 sm:py-20 md:py-24">

        <!-- Heading -->
        <div class="container-fluid mx-auto text-center relative z-10 px-4">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">ABOUT US
            </h1>
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

        <h3 class="text-4xl font-black text-[#1a589e] uppercase tracking-wide text-center mt-8 mb-8" id="History">Our History</h3><br>

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
                        style="font-weight: bold;">Presidential Decree No.
                        198</span> (P.D. 198) paved the way for birth of various local water districts in the country.
                    On <span style="font-weight: bold;">August 07,
                        1974</span>, the Sangguniang Bayan of Calamba, headed by then Mayor Taciano Rizal, passed the
                    Municipal
                    Board Resolution No. 82 Series of 1974 in pursuant to P.D. 198 as amended which gave rise to the
                    organization of the <span style="font-weight: bold; color: #007bff;">Calamba Water District</span>
                    (also known as CWD). Two years after, Local Water Utilities
                    Administration awarded the Conditional Certificate of Conformance No. 29 on September 04, 1976 which
                    entitled CWD to the rights and privileges authorized under PD 198. This then pronounced the official
                    day of CWD in carrying out its mission, which at that time, provided service to a total of <span
                        style="font-weight: bold;">1,100</span>
                    active service connections.
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

    <br>
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
    <script src="./js/imgprev.js"></script>
    <script src="./js/tabpane.js"></script>
    <script src="./js/about.js"></script>
    <script src='includes/scripts.js'></script> 

</body>

</html>