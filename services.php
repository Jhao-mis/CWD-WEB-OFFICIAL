<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CWD Services</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png"/>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/navtwnew.css">
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

            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight mb-4">OUR SERVICES
            </h1>


        </div>
        <svg class="absolute bottom-0 left-0 w-full h-[60px] sm:h-[120px] md:h-[100px] lg:h-[80px] z-0"
            viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="white" fill-opacity="1"
                d="M0,128L40,133.3C80,139,160,149,240,144C320,139,400,117,480,133.3C560,149,640,203,720,186.7C800,171,880,85,960,74.7C1040,64,1120,128,1200,144C1280,160,1360,128,1400,112L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>

    </div>

    <!-- Subpages -->

    <div class="container mx-auto py-12 px-4">

        <div class="row g-4 justify-content-center">

            <!-- Cards: col-12 (full width on mobile), col-sm-6 (2 per row on small screens), col-lg-3 (4 per row on large screens) -->

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card shadow-lg h-full">
                    <img class="card-img-top-custom"
                        src="img/data/ols.png"
                        alt="Card image">
                    <div class="card-body">
                        <h4 class="text-2xl font-black text-[#1a589e] uppercase tracking-wide mt-2 mb-2">Online Services</h4>
                        <p class="card-text text-justify text-gray-600 mb-4">
                            Easily manage your account! Quickly calculate your bill, find online payment partners, and
                            get immediate alerts for service interruptions, all in one convenient place.</p>
                        <a href="./02_ol_serv4"
                            class="btn btn-primary bg-[#1a589e] hover:bg-bg-[#1a589e] w-full">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card shadow-lg h-full">
                    <img class="card-img-top-custom"
                        src="img/data/fls.png"
                        alt="Card image">
                    <div class="card-body">
                        <h4 class="text-2xl font-black text-[#1a589e] uppercase tracking-wide mt-2 mb-2">Frontline Services</h4>
                        <p class="card-text text-justify text-gray-600 mb-4">
                            We're here to guide you every step of the way! Discover the clear requirements and
                            straightforward procedures for every service we offer in our Citizen’s Charter.
                        </p>
                        <a href="./02_fl_serv"
                            class="btn btn-primary bg-[#1a589e] hover:bg-bg-[#1a589e] w-full">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card shadow-lg h-full">
                    <img class="card-img-top-custom"
                        src="img/data/pmc.png"
                        alt="Card image">
                    <div class="card-body">
                        <h4 class="text-2xl font-black text-[#1a589e] uppercase tracking-wide mt-2 mb-2">Payment Centers</h4>
                        <p class="card-text text-justify text-gray-600 mb-4">Ready to settle your bill? Quickly view the
                            comprehensive list and locations of all authorized third-party payment channels for safe and
                            convenient transactions.</p>
                        <a href="./02_paymc"
                            class="btn btn-primary bg-[#1a589e] hover:bg-bg-[#1a589e] w-full">Learn More</a>
                    </div>
                </div>
            </div><br>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card shadow-lg h-full">
                    <img class="card-img-top-custom"
                        src="img/data/wr.png"
                        alt="Card image">
                    <div class="card-body">
                        <h4 class="text-2xl font-black text-[#1a589e] uppercase tracking-wide mt-2 mb-2">Water Rates</h4>
                        <p class="card-text text-justify text-gray-600 mb-4">Know exactly what you're paying for. Review
                            the detailed, current water consumption tariffs and charges specific to your customer
                            classification.</p><br>
                        <a href="./02_watr" class="btn btn-primary bg-[#1a589e] hover:bg-bg-[#1a589e] w-full">Learn
                            More</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card shadow-lg h-full">
                    <img class="card-img-top-custom"
                        src="img/data/stat.png"
                        alt="Card image">
                    <div class="card-body">
                        <h4 class="text-2xl font-black text-[#1a589e] uppercase tracking-wide mt-2 mb-2">Statistics</h4>
                        <p class="card-text text-justify text-gray-600 mb-4">Get the facts! Explore the latest official
                            data on CWD’s operational performance, including service connections, water facilities, and
                            workforce statistics.</p>
                        <a href="./02_stats"
                            class="btn btn-primary bg-[#1a589e] hover:bg-bg-[#1a589e] w-full">Learn More</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card shadow-lg h-full">
                    <img class="card-img-top-custom"
                        src="img/data/faq.png" alt="Card image">
                    <div class="card-body">
                        <h4 class="text-2xl font-black text-[#1a589e] uppercase tracking-wide mt-2 mb-2">FAQs</h4>
                        <p class="card-text text-justify text-gray-600 mb-4">Have a question? Find reliable, immediate
                            answers to your most common concerns regarding billing, services, and our official district
                            policies.</p><br>
                        <a href="./02_faqs" class="btn btn-primary bg-[#1a589e] hover:bg-bg-[#1a589e] w-full">Learn
                            More</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card shadow-lg h-full">
                    <img class="card-img-top-custom"
                        src="img/data/smp.png"
                        alt="Card image">
                    <div class="card-body">
                        <h4 class="text-2xl font-black text-[#1a589e] uppercase tracking-wide mt-2 mb-2">Desludging Services</h4>
                        <p class="card-text text-justify text-gray-600 mb-4">Discover our newest program! Learn how we
                            protect our environment
                            through sustainable wastewater treatment & desludging services.</p><br>
                        <a href="02_smp" class="btn btn-primary bg-[#1a589e] hover:bg-bg-[#1a589e] w-full">Learn
                            More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <br>

    <br>

    <!-- Quality Policy -->

    <h1 class="text-4xl font-black text-[#1a589e] uppercase tracking-wide text-center mt-8 mb-4"><a href="about_us#policy">Quality Policy</a></h1><br>

    <div class="container  mx-auto text-center">The Calamba Water District is dedicated to effectively provide our water
        management services that meet or exceed our customers' requirements, expectations and
        conformance to all quality parameters required by the international and statutory standards.</div>
    <br>
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

    <!-- Js File for Sticky Nav -->
    <script src="./js/index.js"></script>
    <script src='includes/scripts.js'></script> 


</body>

</html>