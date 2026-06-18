<style>
    .video-glow {
        box-shadow: 0 0 50px -12px rgba(26, 88, 158, 0.2);
    }

    .play-button-pulse {
        animation: pulse-ring 2s cubic-bezier(0.455, 0.03, 0.515, 0.955) infinite;
    }

    @keyframes pulse-ring {
        0% {
            transform: scale(0.33);
            opacity: 0.8;
        }

        80%,
        100% {
            opacity: 0;
        }
    }

    .banner-gradient {
        background: linear-gradient(135deg, rgba(26, 88, 158, 0.95) 0%, rgba(14, 165, 233, 0.8) 100%);
    }

    .brand-bg {
        background-color: #1a589e;
    }

    video {
        width: 100%;
        height: auto;
        border-radius: 1rem;
        display: block;
        /* Ensure controls are styled by the browser naturally */
        background-color: #000;
    }

    /* Subtle Gradient Background for the section */
    .bg-gradient-soft {
        background: radial-gradient(circle at top right, #eff6ff 0%, #f8fafc 100%);
    }

    /* Floating Animation for Decoration */
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    /* FAQ Accordion Styling (Pure CSS) */
    details summary::-webkit-details-marker {
        display: none;
    }

    details summary {
        list-style: none;
        outline: none;
        cursor: pointer;
    }

    details[open] summary .faq-icon {
        transform: rotate(180deg);
        background-color: #1a589e;
        color: white;
    }


    /* Force Indicators to be visible and on top */
    .carousel-indicators {
        z-index: 50 !important;
        margin-bottom: 2rem !important;
    }

    .carousel-indicators [data-bs-target] {
        width: 12px !important;
        height: 12px !important;
        border-radius: 50% !important;
        background-color: #fff !important;
        border: 2px solid rgba(0, 0, 0, 0.3) !important;
        opacity: 0.5 !important;
        transition: opacity 0.3s ease;
    }

    .carousel-indicators .active {
        opacity: 1 !important;
        background-color: #1a589e !important;
    }

    /* Force Navigation Buttons to be visible */
    .custom-carousel-control {
        width: 50px !important;
        height: 50px !important;
        background: rgba(0, 0, 0, 0.6) !important;
        border-radius: 50% !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        opacity: 1 !important;
        /* Always fully opaque */
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        z-index: 60 !important;
        border: none !important;
        margin: 0 15px !important;
        transition: all 0.3s ease !important;
    }

    .custom-carousel-control:hover {
        background: rgba(26, 88, 158, 0.9) !important;
        transform: translateY(-50%) scale(1.1) !important;
    }

    .custom-carousel-control i {
        color: white !important;
        font-size: 1.2rem !important;
    }

    .email-text {
        word-break: break-all;
    }
</style>

<!-- Banner -->
<div class="max-w-7xl mx-auto">

    <div class="space-y-8 m-4">
        <div class="relative rounded-[2rem] overflow-hidden shadow-xl border border-[#1a589e]">
            <!-- Background Image -->
            <img src="assets\septage\stp.JPG" alt="Facility Banner" class="absolute inset-0 w-full h-full object-cover">

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 banner-gradient opacity-75"></div>

            <!-- 2. FIXED: Changed md:flex-row to lg:flex-row to prevent crowding on tablets -->
            <div class="relative p-8 md:p-12 lg:p-16 flex flex-col lg:flex-row items-center gap-8 lg:gap-16">

                <div class="flex-1 text-center lg:text-left">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-white text-xs font-semibold mb-4 border border-white/10">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-400"></span>
                        </span>
                        Operational Facility
                    </div>

                    <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4 leading-tight">
                        Protecting Our Water, <br> <span class="text-cyan-200">Preserving Our Future.</span>
                    </h2>

                    <p
                        class="text-white/90 text-sm font-semibold md:text-base lg:text-lg leading-relaxed max-w-xl mb-6 mx-auto lg:mx-0">
                        CWD's Septage Management Program ensures the proper collection, transport, and treatment
                        of septage to prevent groundwater contamination and promote community health.
                    </p>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 border-t border-white/10 pt-6">
                        <div>
                            <p class="text-white text-xl md:text-2xl font-bold">LAW</p>
                            <p class="text-white text-[10px] uppercase tracking-wider font-medium">Mandated
                                Operation
                            </p>
                        </div>
                        <div>
                            <p class="text-white text-xl md:text-2xl font-bold">100%</p>
                            <p class="text-white font-bold text-[10px] uppercase tracking-wider font-medium">
                                Compliance
                            </p>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <p class="text-white text-xl md:text-2xl font-bold">ISO</p>
                            <p class="text-white text-[10px] text uppercase tracking-wider font-medium">
                                Certified
                                Company</p>
                        </div>
                    </div>
                </div>

                <div class="shrink-0 flex justify-center lg:justify-end order-1 lg:order-2">
                    <div class="relative group">
                        <!-- Outer decorative ring/glow -->


                        <!-- Glassmorphism Logo Box -->
                        <div
                            class="relative w-48 h-48 md:w-60 md:h-60  flex items-center justify-center p-8 logo-glow transform group-hover:scale-105 transition-transform duration-500">
                            <img src="img\cwd2471.png" alt="CWD Logo"
                                class="w-full h-auto object-contain drop-shadow-sm"
                                onerror="this.src='https://via.placeholder.com/200x200?text=CWD+LOGO'">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<br><br>

<!-- Facility Highllight -->
<div class="bg-slate-50 py-12 border-y border-gray-200 mt-4">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="order-2 lg:order-1">

                <h3 class="text-2xl md:text-5xl font-black text-slate-900 mb-4 tracking-tight">
                    First <span class="text-[#1a589e]">Government-Owned Septage Treatment Plant</span> in Laguna
                </h3>

                <div class="space-y-6 text-slate-600 leading-relaxed text-lg">
                    <p>
                        <strong>Calamba Water District</strong> reached a historic milestone with the opening of its
                        fully
                        operational facility in <strong>Brgy. Palo Alto</strong>. As the first government-owned
                        plant of its kind in the province, we provide residents with a safer, high-filtration
                        waste management solution at significantly more affordable rates.
                    </p>
                    <p>
                        As supported by our Local Government Officials <strong>Mayor Roseller Rizal and the City
                            Council,</strong>
                        the plant is a direct response to the <strong>Clean Water Act</strong> and environmental
                        mandates for Manila Bay. By converting collected waste into eco-friendly fertilizer and
                        returning purified water to our local ecosystems, we ensure that CWD remains at the
                        forefront of sustainable sanitation.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row flex-wrap items-center justify-center gap-3 mt-8">
                    <!-- DENR Compliant -->
                    <div
                        class="flex items-center gap-2 bg-white px-3 py-1.5 rounded-lg shadow-sm border border-slate-200 w-fit">
                        <i class="fa-solid fa-check-circle text-green-500 text-xs"></i>
                        <span class="text-xs font-bold text-slate-700 whitespace-nowrap">DENR Compliant</span>
                    </div>

                    <!-- Eco-Friendly Process -->
                    <div
                        class="flex items-center gap-2 bg-white px-3 py-1.5 rounded-lg shadow-sm border border-slate-200 w-fit">
                        <i class="fa-solid fa-leaf text-cyan-500 text-xs"></i>
                        <span class="text-xs font-bold text-slate-700 whitespace-nowrap">Eco-Friendly Process</span>
                    </div>

                    <!-- Clean Water Act Aligned -->
                    <div
                        class="flex items-center gap-2 bg-white px-3 py-1.5 rounded-lg shadow-sm border border-slate-200 w-fit">
                        <i class="fa-solid fa-scale-balanced text-blue-500 text-xs"></i>
                        <span class="text-xs font-bold text-slate-700 whitespace-nowrap">Clean Water Act Aligned</span>
                    </div>
                </div>

            </div>

            <div class="order-1 lg:order-2">

                <div class="flex justify-center w-full">
                    <span
                        class="inline-block px-4 py-1.5 mb-6 text-[13px] font-black uppercase tracking-[0.2em] text-[#1a589e] bg-blue-50 rounded-full border border-blue-100">
                        <i class="fa-solid fa-building-shield mr-2"></i>Facility Spotlight
                    </span>
                </div>

                <div id="septage-carousel" class="relative w-full group" data-carousel="slide">
                    <div class="relative h-64 md:h-[450px] overflow-hidden rounded-[2.5rem] shadow-2xl">

                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="assets\septage\stp.JPG" class="absolute block w-full h-full object-cover"
                                alt="STP Exterior">
                        </div>

                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="assets\septage\666.JPG" class="absolute block w-full h-full object-cover"
                                alt="Filtration">
                        </div>

                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="assets\septage\111.png" class="absolute block w-full h-full object-cover"
                                alt="Filtration">
                        </div>

                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="assets\septage\222.png" class="absolute block w-full h-full object-cover"
                                alt="Filtration">
                        </div>

                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="assets\septage\333.png" class="absolute block w-full h-full object-cover"
                                alt="Filtration">
                        </div>

                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="assets\septage\444.png" class="absolute block w-full h-full object-cover"
                                alt="Filtration">
                        </div>

                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="assets\septage\555.png" class="absolute block w-full h-full object-cover"
                                alt="Filtration">
                        </div>

                    </div>

                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
                        <button type="button" class="w-3 h-3 rounded-full bg-white/50"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-white/50"
                            data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-white/50"
                            data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-white/50"
                            data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-white/50"
                            data-carousel-slide-to="4"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-white/50"
                            data-carousel-slide-to="5"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-white/50"
                            data-carousel-slide-to="6"></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<br><br>

<!-- Video -->

<section class="relative pt-24 pb-20 px-4 overflow-hidden">

    <!-- Decorative Background Elements -->
    <div
        class="absolute top-20 right-[-10%] w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float">
    </div>
    <div class="absolute bottom-10 left-[-5%] w-72 h-72 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float"
        style="animation-delay: 2s;"></div>

    <div class="max-w-5xl mx-auto relative z-10">

        <!-- Header Text -->
        <div class="text-center mb-8">
            <span
                class="inline-block px-4 py-1.5 mb-6 text-[13px] font-black uppercase tracking-[0.2em] text-[#1a589e] bg-blue-50 rounded-full border border-blue-100">
                <i class="fa-solid fa-clapperboard mr-2"></i>Introduction Video
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6 tracking-tight">
                Septage Management <span class="text-[#1a589e]">Program</span>
            </h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed">
                Watch the history on how our new program was established and how it helps preserve our local
                ecology.
            </p>
        </div>

        <!-- Modern Video Player Container -->
        <div class="glass-container p-2 md:p-4 rounded-[2rem] transition-all duration-500 hover:shadow-2xl">
            <div class="relative rounded-2xl overflow-hidden bg-black group shadow-inner">
                <video controls preload="metadata" poster="./img/video-poster-placeholder.jpg"
                    class="w-full aspect-video">
                    <source src="assets\septage\Septage Treatment Facility.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

            <!-- Info Bar Below Video -->
            <div class="mt-8 flex flex-col md:flex-row items-center justify-between gap-6 px-4 pb-4">
                <div class="flex items-center gap-5">
                    <div
                        class="shrink-0 w-14 h-14 bg-[#1a589e] rounded-2xl flex items-center justify-center shadow-lg shadow-blue-200">
                        <i class="fa-solid fa-truck-droplet text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-slate-800">CWD Septage Management Program </h4>
                        <p class="text-sm text-slate-500 font-medium">Protecting our water, serving the
                            community.</p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div
                        class="px-5 py-2.5 bg-white rounded-xl border border-slate-100 shadow-sm flex items-center gap-2 text-slate-600 text-sm font-semibold">
                        <i class="fa-regular fa-clock text-blue-500"></i>
                        <span>6:26 Mins</span>
                    </div>
                    <div
                        class="px-5 py-2.5 bg-white rounded-xl border border-slate-100 shadow-sm flex items-center gap-2 text-slate-600 text-sm font-semibold">
                        <i class="fa-solid fa-high-definition text-blue-500"></i>
                        <span>1080p</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contextual Footer -->
        <p class="text-center mt-4 text-slate-400 text-sm flex items-center justify-center gap-2">
            <i class="fa-solid fa-clapperboard"></i>
            Official Presentation of the CWD - Office of the General Manager, Management Information Services
            Section
        </p>

    </div>
</section>

<!-- SMP Introduction & Objectives -->

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-16 items-center">
            <!-- Left: Definition -->
            <div class="lg:w-1/2">
                <div
                    class="inline-block px-4 py-1.5 mb-6 text-[13px] font-black uppercase tracking-[0.2em] text-[#1a589e] bg-blue-50 rounded-full border border-blue-100">
                    <i class="fa-solid fa-lightbulb mr-2"></i>Program Overview
                </div>
                <h2 class="text-4xl font-black text-slate-900 mb-6 leading-tight">
                    What is the <span class="text-[#1a589e]">Septage Management</span> Program?
                </h2>
                <p class="text-slate-600 text-lg leading-relaxed mb-8">
                    The Septage Management Program (SMP) of Calamba Water District is the comprehensive programs
                    for managing septic tanks and the procedures for the desludging, transporting, treating
                    and disposing of septic tank contents. <br><br>

                    Ito ay ang proseso ng pangongolekta ng septage/sludge sa mga bahay at establishimento sa
                    lungsod ng Calamba
                    upang ito ay iproseso at linisin. Ang mga natitirang by-product naman ay wastong itatapon
                    upang hindi magdulot ng pinsala sa kapaligiran.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="p-5 rounded-3xl bg-slate-50 border border-slate-100 transition-hover hover:shadow-md">
                        <i class="fa-solid fa-microscope text-2xl text-[#1a589e] mb-3"></i>
                        <h4 class="font-bold text-slate-800 mb-1">Advanced Treatment</h4>
                        <p class="text-sm text-slate-500">Utilizing modern technology to neutralize harmful
                            pathogens.</p>
                    </div>
                    <div class="p-5 rounded-3xl bg-slate-50 border border-slate-100 transition-hover hover:shadow-md">
                        <i class="fa-solid fa-truck-front text-2xl text-[#1a589e] mb-3"></i>
                        <h4 class="font-bold text-slate-800 mb-1">Scheduled Desludging</h4>
                        <p class="text-sm text-slate-500">Regular maintenance every 5 years for every household.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right: Objectives -->
            <div class="lg:w-1/2 w-full">
                <div class="bg-[#1a589e] rounded-[3rem] p-8 md:p-12 text-white shadow-2xl relative overflow-hidden">
                    <!-- Decorative Circle -->
                    <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/5 rounded-full"></div>

                    <h3 class="text-2xl font-bold mb-8 flex items-center gap-3">
                        <i class="fa-solid fa-bullseye text-white"></i> Our Core Objectives
                    </h3>

                    <ul class="space-y-6">
                        <li class="flex gap-4">
                            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                                <span class="font-black text-white">01</span>
                            </div>
                            <div>
                                <h5 class="font-bold text-lg">Environmental Protection</h5>
                                <p class="text-blue-100/70 text-sm">Preventing the overflow of untreated waste
                                    into our precious groundwater and rivers.</p>
                            </div>
                        </li>
                        <li class="flex gap-4">
                            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                                <span class="font-black text-white">02</span>
                            </div>
                            <div>
                                <h5 class="font-bold text-lg">Public Health Safety</h5>
                                <p class="text-blue-100/70 text-sm">Eliminating water-borne diseases caused by
                                    leaking or poorly maintained septic systems.</p>
                            </div>
                        </li>
                        <li class="flex gap-4">
                            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                                <span class="font-black text-white">03</span>
                            </div>
                            <div>
                                <h5 class="font-bold text-lg">Sustainable Compliance</h5>
                                <p class="text-blue-100/70 text-sm">Adhering to national sanitation laws and
                                    ensuring a greener future for the next generation.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>


</section>

<!-- Legal Basis -->

<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-slate-900">Legal <span
                    class="text-[#1a589e]">Framework</span></h2>
            <p class="text-slate-500 mt-4 max-w-2xl mx-auto">The implementation of our Septage Management
                Program is backed by national laws and local ordinances to ensure strict adherence to safety
                standards.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Law Card 1 -->
            <div
                class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group">
                <div
                    class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-[#1a589e] mb-6 group-hover:bg-[#1a589e] group-hover:text-white transition-colors">
                    <i class="fa-solid fa-hand-holding-droplet text-xl"></i>
                </div>
                <h4 class="text-xl font-black text-slate-800 mb-3 uppercase tracking-tight">R.A. 9275</h4>
                <p class="text-blue-600 font-bold text-[11px] mb-4 tracking-widest uppercase">Philippine Clean
                    Water Act of 2004</p>
                <p class="text-slate-500 text-sm leading-relaxed">
                    An act setting the duties of the LGUs to ensure the proper handling,
                    collection, and treatment of septage or waste from septic tanks. <br><br>

                    Itinatakda nito ang tungkulin ng mga LGU na tiyakin ang
                    tamang paghawak, koleksyon, at treatment ng septage
                    o dumi sa poso negro.
                </p>
            </div>

            <!-- Law Card 2 -->
            <div
                class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group">
                <div
                    class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-[#1a589e] mb-6 group-hover:bg-[#1a589e] group-hover:text-white transition-colors">
                    <i class="fa-solid fa-file-contract text-xl"></i>
                </div>
                <h4 class="text-xl font-black text-slate-800 mb-3 uppercase tracking-tight">City Ordinance #456
                    S. 2009 </h4>
                <p class="text-blue-600 font-bold text-[11px] mb-4 tracking-widest uppercase">Ordinance
                    establishing a sewerage and septage management system in the City of Calamba</p>
                <p class="text-slate-500 text-sm leading-relaxed">

                    It establishes the Sewerage and Septage Management System in the City of Calamba. <br><br>
                    Ang nagtatag ng Sewerage and Septage Management System sa lungsod ng Calamba.
                </p>
            </div>

            <!-- Law Card 3 -->
            <div
                class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group">
                <div
                    class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-[#1a589e] mb-6 group-hover:bg-[#1a589e] group-hover:text-white transition-colors">
                    <i class="fa-solid fa-gavel text-xl"></i>
                </div>
                <h4 class="text-xl font-black text-slate-800 mb-3 uppercase tracking-tight">Supreme Court
                    Mandamus</h4>
                <p class="text-blue-600 font-bold text-[11px] mb-4 tracking-widest uppercase">Administrative
                    Order No. 16 S. 2019
                </p>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Mandates all water-related agencies, such as the Calamba Water District,
                    to ensure the cleanliness of Laguna de Bay and other water bodies. <br><br>

                    Ang nag-aatas sa lahat ng ahensyang may kinalaman
                    sa tubig katulad ng Calamba Water District na
                    siguraduhing malinis ang Laguna de Bay at iba pang water bodies.
                </p>
            </div>
        </div>
    </div>

</section>

<!-- Notice of Tariff Implementation + Sample Bill Computation-->
<section class="pt-10 md:pt-20 pb-10 px-4">
    <div class="max-w-7xl mx-auto">
        <div
            class="bg-slate-50 rounded-[2rem] md:rounded-[3rem] border border-slate-200 overflow-hidden shadow-2xl flex flex-col lg:flex-row">
            <!-- Sidebar Notice -->
            <div class="lg:w-1/3 relative bg-[#1a589e] p-8 md:p-12 flex flex-col justify-center text-white">
                <div class="absolute top-0 right-0 p-8 opacity-10 hidden md:block">
                    <i class="fa-solid fa-receipt text-7xl"></i>
                </div>
                <h2 class="text-3xl md:text-4xl font-black mb-6 leading-tight">Notice of <span
                        class="text-cyan-300">Implementation</span> of Tariff</h2>
                <p class="text-blue-100/80 mb-8 leading-relaxed text-sm md:text-base">In compliance with <span
                        class="font-bold text-white">R.A. 9275 "Philippine Clean Water Act"</span> and <span
                        class="font-bold text-white">Calamba City Septage Management Program No. 456 s. 2009.
                    </span> Please be informed that pursuant to LWUA Board Resolution No. 62 dated August 20,
                    2025 <br><br>
                    <span class="font-bold text-white">Calamba Water District</span> will impose the following
                    septage / sanitation fee.
                </p>
                <div class="flex items-center gap-3 bg-white/10 p-4 rounded-2xl backdrop-blur-sm">
                    <i class="fa-solid fa-calendar-check text-cyan-300 shrink-0"></i>
                    <span class="text-xs md:text-sm">Tariff effective on December 1, 2025.</span>
                </div>
            </div>

            <div class="lg:w-2/3 p-6 md:p-12">
                <div class="grid md:grid-cols-2 gap-6 md:gap-8">

                    <div
                        class="bg-white p-6 md:p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-4 mb-6">
                                <div
                                    class="w-10 h-10 bg-blue-50 text-[#1a589e] rounded-lg flex items-center justify-center">
                                    <i class="fa-solid fa-house-user"></i>
                                </div>
                                <h4 class="text-xl font-bold text-slate-900">CWD Customers</h4>
                            </div>

                            <div class="space-y-2 py-2">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-4xl md:text-5xl font-black text-[#1a589e] tracking-tight">₱
                                        2.99</span>
                                    <span class="text-base font-bold text-slate-400">per cu. m.</span>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 border-t mt-auto">
                            <p class="text-[13px] text-slate-500 font-medium leading-relaxed">
                                Added to your monthly water bill based on actual usage.
                                <span class="block text-xs text-slate-400 mt-2 font-normal">(Basic ₱2.93 + 2% Franchise
                                    Tax)</span>
                            </p>
                        </div>
                    </div>

                    <div
                        class="bg-white p-6 md:p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-4 mb-6">
                                <div
                                    class="w-10 h-10 bg-slate-50 text-slate-600 rounded-lg flex items-center justify-center">
                                    <i class="fa-solid fa-users-slash"></i>
                                </div>
                                <h4 class="text-xl font-bold text-slate-900">Non-CWD Customers</h4>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <span class="text-2xl md:text-3xl font-black text-slate-800 tracking-tight">₱
                                        3,736.25</span>
                                    <p class="text-xs text-slate-500 font-medium mt-0.5">For the first 2 cubic meters
                                    </p>
                                </div>

                                <div class="pt-4 border-t border-slate-100">
                                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-3">
                                        Additional Consumption</p>

                                    <div class="space-y-3">

                                        <div class="flex justify-between items-baseline">
                                            <span class="text-sm text-slate-600 font-medium">0.1 to 0.5 cubic
                                                meter</span>
                                            <span class="text-base font-bold text-slate-800">₱ 934.07</span>
                                        </div>

                                        <div class="flex justify-between items-baseline">
                                            <span class="text-sm text-slate-600 font-medium">0.6 to 1.0 cubic
                                                meter</span>
                                            <span class="text-base font-bold text-slate-800">₱ 1,868.13</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-slate-100 mt-6">
                            <p class="text-xs text-slate-400 font-medium italic">All rates inclusive of 2% franchise
                                tax.</p>
                        </div>
                    </div>

                </div>

                <!-- Sample Computation -->
                <div class="mt-8 md:mt-12 bg-blue-50/50 p-6 md:p-8 rounded-[2rem] border border-blue-100">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-6">
                                <i class="fa-solid fa-calculator text-2xl text-[#1a589e]"></i>
                                <h4 class="font-black uppercase tracking-widest text-sm text-[#1a589e]">Sample
                                    Bill Computation
                                    <p class="text-[8px] tracking-wider opacity-1 mb-1"> > Residential
                                        Connection with 1/2" Meter Size</p>
                                </h4>

                            </div>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center text-slate-600 text-sm">
                                    <span>Monthly Consumption</span>
                                    <span class="font-bold">15 cu.m.</span>
                                </div>
                                <div class="flex justify-between items-center text-slate-600 text-sm">
                                    <span>Water Charge</span>
                                    <span class="font-bold">₱ 284.50</span>
                                </div>
                                <div
                                    class="flex justify-between items-center text-[#1a589e] pt-3 border-t border-blue-100">
                                    <div class="flex flex-col">
                                        <span class="font-bold">Septage Fee</span>
                                        <span class="text-[10px] uppercase font-medium">(15 cu.m x ₱
                                            2.99)</span>
                                    </div>
                                    <span class="text-xl font-black">₱ 44.85</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-4 w-full md:w-auto md:min-w-[240px]">
                            <div class="bg-[#1a589e] text-white p-5 rounded-2xl shadow-lg shadow-blue-900/10">
                                <p class="text-[10px] uppercase tracking-wider opacity-1 mb-1">Estimated Total
                                </p>
                                <span class="text-3xl font-black">₱ 329.35</span>
                                <p class="text-[10px] italic tracking-wider opacity-80 mb-1 mt-2">Past Due Date
                                    Payment: <br> <strong class="text-white text-[12px]">₱ 361.63</strong> </p>
                            </div>
                            <a href="02_ol_serv3"
                                class="flex items-center justify-center gap-3 bg-white border-2 border-[#1a589e] text-[#1a589e] py-3 px-6 rounded-2xl font-bold hover:bg-[#1a589e] hover:text-cyan-300 transition-all group text-center">
                                <i
                                    class="fa-solid fa-calculator text-sm group-hover:translate-x-1 transition-transform"></i>
                                <span class="text-sm md:text-base">Use Bill Calculator</span>

                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Fast FAQs Section -->
<section class="py-24 px-4 bg-slate-50/50">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row gap-16 items-start">


            <!-- Left: FAQ Accordion -->

            <div class="lg:w-1/2 w-full">
                <div class="mb-10">
                    <span
                        class="inline-block px-4 py-1.5 mb-6 text-[13px] font-black uppercase tracking-[0.2em] text-[#1a589e] bg-blue-50 rounded-full border border-blue-100">
                        <i class="fa-brands fa-readme"></i> Helpful Information</span>
                    <h2 class="text-4xl font-black text-slate-900 leading-tight">Fast <span
                            class="text-[#1a589e]">Facts</span></h2>
                    <p class="mt-4 text-slate-500">Narito po ang sagot sa mga madalas na katanungan ukol sa
                        bagong programa ng CWD, ang septage management program</p>
                </div>

                <div class="space-y-4">

                    <!-- FAQ Item 1 -->
                    <details class="group bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <summary class="flex items-center justify-between p-6 transition-all">
                            <span class="text-lg font-bold text-slate-800">Paano kokolektahin ang Septage sa mga
                                bahay at establishimento?</span>
                            <span
                                class="faq-icon w-8 h-8 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center transition-all">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </span>
                        </summary>
                        <div class="px-6 pb-6 text-slate-600 leading-relaxed">
                            Mayroong dalawang vacuum trucks sa kasalukuyan ang Calamba Water
                            District na iikot sa lungsod araw-araw base sa lugar na naka-schedule.
                            Ang isang vacuum truck ay may kapasidad na makapangolekta ng
                            limang metro kubiko (5 cu.mtr) ng septage o sludge sa mga poso negro.
                        </div>
                    </details>

                    <!-- FAQ Item 2 -->
                    <details class="group bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <summary class="flex items-center justify-between p-6 transition-all">
                            <span class="text-lg font-bold text-slate-800">Saan dadalhin ang nakolektang
                                septage?</span>
                            <span
                                class="faq-icon w-8 h-8 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center transition-all">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </span>
                        </summary>
                        <div class="px-6 pb-6 text-slate-600 leading-relaxed">
                            Ang mga nakolektang septage ay dadalhin sa septage treatment plant
                            na ipinatayo ng Calamba Water District sa Brgy. Palo-Alto
                            para ito ay iproseso.
                        </div>
                    </details>

                    <!-- FAQ Item 3 -->
                    <details class="group bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <summary class="flex items-center justify-between p-6 transition-all">
                            <span class="text-lg font-bold text-slate-800">Sinu-sino ang maaaring kolektahan at
                                gaano ito kadalas gagawin?</span>
                            <span
                                class="faq-icon w-8 h-8 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center transition-all">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </span>
                        </summary>
                        <div class="px-6 pb-6 text-slate-600 leading-relaxed">
                            Ang mga customers ng Calamba Water District na mayroong mga poso negro ang uunahing
                            kolektahan ng septage o sludge.
                            Ang koleksyon ng sludge ay gagawin kada limang (5) taon.
                        </div>
                    </details>

                    <!-- FAQ Item 4 -->
                    <details class="group bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <summary class="flex items-center justify-between p-6 transition-all">
                            <span class="text-lg font-bold text-slate-800">Maaari bang hindi magpakolekta ng
                                septage?</span>
                            <span
                                class="faq-icon w-8 h-8 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center transition-all">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </span>
                        </summary>
                        <div class="px-6 pb-6 text-slate-600 leading-relaxed">
                            Ang lahat ng customers ng Calamba Water District na mayroong mga poso negro ay
                            otomatikong kokolektahan ng septage o sludge. <br><br>

                            Alinsunod pa sa Seksyon 8 ng R.A. 9275, o ang 'Philippine Clean Water Act of 2004,'
                            ang lahat ng kabahayan at establisyimento
                            ay kinakailangang kumonekta sa mga sewerage system kung mayroon nito; sa kawalan
                            naman nito, dapat tiyakin ang maayos
                            na septage management sa pamamagitan ng paggamit ng mga standard na poso negro at
                            regular na pagpapalinis o desludging."
                        </div>
                    </details>

                    <!-- FAQ Item 5 -->
                    <details class="group bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <summary class="flex items-center justify-between p-6 transition-all">
                            <span class="text-lg font-bold text-slate-800">Paano babayaran ang gastusin sa
                                pagpapasipsip ng septage?</span>
                            <span
                                class="faq-icon w-8 h-8 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center transition-all">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </span>
                        </summary>
                        <div class="px-6 pb-6 text-slate-600 leading-relaxed">
                            Ang halagang babayaran para sa koleksyon ng septage ay isasama sa resibo sa tubig na
                            matatanggap ng customers ng Calamba Water District na nakasaad bilang Septage
                            Management Fee.
                            <br><br> Kung ang konsumo sa tubig ay tumaas ng hindi inaasahan dahil sa leak after
                            the meter,
                            posibleng i-recompute ang septage management fee batay sa huling tatlong (3)
                            buwang konsumo sa tubig matapos ang masusing pag-aaral.
                            <br><br> Ang gastusin sa pagbabakbak at muling pagsesemento ng poso negro ay sagot
                            ng may-ari ng bahay.
                        </div>
                    </details>


                </div>
            </div>

            <!-- Right: Carousel -->

            <div class="lg:w-1/2 w-full lg:top-24">
                <div id="faqCarousel" class="carousel slide rounded-[2.5rem] overflow-hidden shadow-2xl aspect-square"
                    data-bs-ride="carousel">

                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#faqCarousel" data-bs-slide-to="0" class="active"
                            aria-current="true"></button>
                        <button type="button" data-bs-target="#faqCarousel" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#faqCarousel" data-bs-slide-to="2"></button>
                        <button type="button" data-bs-target="#faqCarousel" data-bs-slide-to="3"></button>
                        <button type="button" data-bs-target="#faqCarousel" data-bs-slide-to="4"></button>
                        <button type="button" data-bs-target="#faqCarousel" data-bs-slide-to="5"></button>
                    </div>

                    <!-- Slides -->
                    <div class="carousel-inner h-full">
                        <div class="carousel-item active h-full">
                            <img src="assets/septage/0.jpg" class="w-full h-full object-cover" alt="Septage Facility">
                        </div>
                        <div class="carousel-item h-full">
                            <img src="assets/septage/1.jpg" class="w-full h-full object-cover" alt="Septage Plant">
                        </div>
                        <div class="carousel-item h-full">
                            <img src="assets/septage/2.jpg" class="w-full h-full object-cover" alt="Water Treatment">
                        </div>
                        <div class="carousel-item h-full">
                            <img src="assets/septage/3.jpg" class="w-full h-full object-cover" alt="Water Treatment">
                        </div>
                        <div class="carousel-item h-full">
                            <img src="assets/septage/4.jpg" class="w-full h-full object-cover" alt="Water Treatment">
                        </div>
                        <div class="carousel-item h-full">
                            <img src="assets/septage/5.jpg" class="w-full h-full object-cover" alt="Water Treatment">
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <button class="carousel-control-prev custom-carousel-control" type="button"
                        data-bs-target="#faqCarousel" data-bs-slide="prev">
                        <i class="fa-solid fa-chevron-left"></i>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next custom-carousel-control" type="button"
                        data-bs-target="#faqCarousel" data-bs-slide="next">
                        <i class="fa-solid fa-chevron-right"></i>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>




        </div>
    </div>
</section>

<!-- Contact Center Section for Septage Inquiries -->
<section class="container mx-auto mt-12 px-4 mb-20">
    <div class="flex items-center justify-center gap-3 mb-12">
        <div class="h-1 w-10 bg-red-500 rounded-full"></div>
        <h3 class="text-3xl font-black text-slate-800 uppercase tracking-wide">Inquiries & Scheduling</h3>
        <div class="h-1 w-10 bg-red-500 rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto mb-10">
        <!-- Customer Service -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden contact-accent-red flex flex-col">
            <div class="p-8 md:p-12 text-center flex-grow">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-red-50 text-red-600 rounded-2xl mb-6">
                    <i class="fa-solid fa-headset text-2xl"></i>
                </div>
                <h4 class="text-2xl font-black text-slate-800 mb-2">SEPTAGE HOTLINE</h4>
                <p class="text-slate-500 text-sm mb-8 uppercase tracking-widest font-bold">Request Desludging
                </p>

                <div class="mb-8">
                    <a href="tel:0495459344"
                        class="text-3xl md:text-4xl font-black text-red-600 hover:text-red-700 transition-colors block mb-2">(049)
                        545-9344</a>
                    <a href="mailto:cwd_customerservice@yahoo.com"
                        class="text-xl md:text-lg font-bold text-[#1a589e] hover:underline break-all sm:break-normal block">calambawaterdistrict@yahoo.com
                    </a>
                </div>

                <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">
                    <p class="text-slate-600 text-sm italic">Contact us to check your schedule or request an
                        urgent desludging service.</p>
                </div>
            </div>
        </div>

        <!-- Other Channels -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden contact-accent-blue flex flex-col">
            <div class="p-8 md:p-10 flex-grow">
                <div class="flex items-center gap-4 mb-8">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-blue-50 text-[#1a589e] rounded-xl">
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
                        <a href="mailto:cwd_customerservice@yahoo.com" class="block">
                            <span
                                class="text-lg font-bold text-slate-700 break-all sm:break-normal hover:text-blue-600 transition-colors">
                                cwd_customerservice@yahoo.com
                            </span>
                        </a>
                    </div>
                </div>

                <h5 class="text-sm font-black text-slate-400 uppercase tracking-widest mb-4">Telephone Hotlines</h5>
                <div class="space-y-3">
                    <div
                        class="flex items-center justify-between p-3 rounded-xl border border-slate-100 hover:bg-slate-50 transition-colors">
                        <span class="badge-custom">BOD</span>
                        <span class="font-black text-slate-700">545-6382</span>
                    </div>
                    <div
                        class="flex items-center justify-between p-3 rounded-xl border border-slate-100 hover:bg-slate-50 transition-colors">
                        <span class="badge-custom">OGM</span>
                        <span class="font-black text-slate-700">502-9531</span>
                    </div>
                    <div
                        class="flex items-center justify-between p-3 rounded-xl border border-slate-100 hover:bg-slate-50 transition-colors">
                        <span class="badge-custom">BAC</span>
                        <span class="font-black text-slate-700">545-1614</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>