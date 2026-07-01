<!-- Guiding Principles & The Organization -->
<section class="container mx-auto px-4 lg:px-8 mb-4">

    <div class="mb-10">
        <h3 class="text-4xl font-black text-[#1a589e] uppercase tracking-wide text-center mt-8" id="History">Who We Are
        </h3><br>
    </div>

    <div class="flex flex-col lg:flex-row gap-8 lg:gap-16">

        <!-- SIDEBAR NAVIGATION -->
        <aside class="w-full lg:w-80 sidebar-nav space-y-6">

            <!-- Section: Guiding Principles -->
            <div class="space-y-1.5">
                <span class="block px-3 text-xs font-bold uppercase tracking-wider text-slate-400 italic">
                    Guiding Principles
                </span>

                <button onclick="switchTab(event, 'mission')"
                    class="tab-card active w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                    <i class="fa-solid fa-bullseye mr-3 text-base shrink-0 w-5 text-center"></i>
                    <span>Mission</span>
                </button>

                <button onclick="switchTab(event, 'vision')"
                    class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                    <i class="fa-solid fa-eye mr-3 text-base shrink-0 w-5 text-center"></i>
                    <span>Vision</span>
                </button>

                <button onclick="switchTab(event, 'values')"
                    class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                    <i class="fa-solid fa-heart mr-3 text-base shrink-0 w-5 text-center"></i>
                    <span>Core Values</span>
                </button>

                <button onclick="switchTab(event, 'policy')"
                    class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                    <i class="fa-solid fa-medal mr-3 text-base shrink-0 w-5 text-center"></i>
                    <span>Quality Policy</span>
                </button>

                <button onclick="switchTab(event, 'gadgoals')"
                    class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                    <i class="fa-solid fa-venus-mars mr-3 text-base shrink-0 w-5 text-center"></i>
                    <span>GAD Goals</span>
                </button>
            </div>

            <!-- Section: The Organization -->
            <div class="space-y-1.5">
                <span class="block px-3 text-xs font-bold uppercase tracking-wider text-slate-400 italic">
                    The Organization
                </span>

                <button onclick="switchTab(event, 'board')"
                    class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                    <i class="fa-solid fa-users-rectangle mr-3 text-base shrink-0 w-5 text-center"></i>
                    <span>Board of Directors</span>
                </button>

                <button onclick="switchTab(event, 'management')"
                    class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                    <i class="fa-solid fa-user-tie mr-3 text-base shrink-0 w-5 text-center"></i>
                    <span>Key Personnel</span>
                </button>

                <button onclick="switchTab(event, 'chart')"
                    class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm">
                    <i class="fa-solid fa-sitemap mr-3 text-base shrink-0 w-5 text-center"></i>
                    <span>Organizational Chart</span>
                </button>
            </div>

            <!-- Section: Others -->
            <div class="space-y-1.5">
                <span class="block px-3 text-xs font-bold uppercase tracking-wider text-slate-400 italic">
                    Others
                </span>

                <button onclick="switchTab(event, 'pts')"
                    class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm gap-3">
                    <!-- Image Container matching icon dimensions -->
                    <div class="shrink-0 w-5 h-5 flex items-center justify-center">
                        <img src="img/icons/PTS.png" alt="Transparency Seal"
                            class="max-w-full max-h-full object-contain"
                            onerror="this.src='https://placehold.co/24x24?text=TS'">
                    </div>
                    <span class="leading-tight">Philippine Transparency Seal</span>
                </button>

                <button onclick="switchTab(event, 'old')"
                    class="tab-card w-full flex items-center px-4 py-3 text-left rounded-xl transition-all duration-200 font-bold text-sm gap-3">
                    <!-- Image Container matching icon dimensions -->
                    <div class="shrink-0 w-5 h-5 flex items-center justify-center">
                        <img src="img/cwd2471.png" alt="CWD Archive Website"
                            class="max-w-full max-h-full object-contain"
                            onerror="this.src='https://placehold.co/24x24?text=TS'">
                    </div>
                    <span class="leading-tight">CWD Archive Website</span>
                </button>
            </div>

        </aside>

        <!-- MAIN CONTENT -->
        <article class="flex-1">
            <div
                class="bg-white rounded-[2rem] p-8 lg:p-14 shadow-2xl shadow-slate-200/60 border border-slate-100 min-h-[500px]">

                <!-- Mission -->
                <div id="mission" class="tab-content active">

                    <!-- Section Title -->
                    <h2 class="text-2xl font-black mb-6 text-[#1a589e] flex items-center gap-2">
                        <i class="fa-solid fa-bullseye"></i>
                        <span>Our Mission</span>
                    </h2>

                    <!-- Introduction Text -->
                    <p class="text-sm text-slate-600 leading-relaxed mb-6">
                        The Calamba Water District, hereinafter referred to as "District," upholds the following
                        principles embodied in its vision, mission and core values.
                    </p>

                    <!-- Mission Highlight Box -->
                    <div class="p-6 bg-blue-50/60 rounded-xl border-l-4 border-[#1a589e]">
                        <p class="font-semibold text-sm md:text-base text-blue-950 leading-relaxed text-justify mb-0">
                            The District will ensure the Calambeños with sufficient supply of potable water 24/7 along
                            with its commitment to establish sewerage and septage management system as part of our
                            environmental concern.
                        </p>
                    </div>

                </div>

                <!-- Vision -->
                <div id="vision" class="tab-content">

                    <!-- Section Title -->
                    <h2 class="text-2xl font-black mb-6 text-[#1a589e] flex items-center gap-2">
                        <i class="fa-solid fa-eye"></i>
                        <span>Our Vision</span>
                    </h2>

                    <!-- Introduction Text -->
                    <p class="text-sm text-slate-600 leading-relaxed mb-6">
                        The Calamba Water District, hereinafter referred to as "District," upholds the following
                        principles embodied in its vision, mission and core values.
                    </p>

                    <!-- Vision Highlight Box -->
                    <div class="p-6 bg-blue-50/60 rounded-xl border-l-4 border-[#1a589e]">
                        <p class="font-semibold text-sm md:text-base text-blue-950 leading-relaxed text-justify mb-0">
                            A District with the highest quality of service that ensures customer satisfaction by
                            providing continuous supply of potable water at an affordable cost and committed to an
                            environmental preservation and protection.
                        </p>
                    </div>

                </div>

                <!-- Core Values -->
                <div id="values" class="tab-content">

                    <h2 class="text-2xl font-black mb-6 text-[#1a589e] flex items-center gap-2">
                        <i class="fa-solid fa-heart"></i>
                        <span>Core Values</span>
                    </h2>

                    <p class="text-sm text-slate-600 leading-relaxed mb-6">
                        The Calamba Water District upholds the following principles embodied in its vision, mission and
                        core values.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                        <div
                            class="p-5 rounded-xl bg-blue-50/60 border-l-4 border-[#1a589e] hover:bg-blue-50 hover:border-blue-500 transition-all duration-200 flex flex-col justify-between">
                            <div>
                                <h4 class="font-extrabold text-lg text-[#1a589e] tracking-wide mb-2 uppercase">
                                    Knowledgeability
                                </h4>
                                <p class="text-xs md:text-sm text-slate-600 leading-relaxed text-justify">
                                    Wisdom as evidenced by possession of knowledge.
                                </p>
                            </div>
                        </div>

                        <div
                            class="p-5 rounded-xl bg-blue-50/60 border-l-4 border-[#1a589e] hover:bg-blue-50 hover:border-blue-500 transition-all duration-200 flex flex-col justify-between">
                            <div>
                                <h4 class="font-extrabold text-lg text-[#1a589e] tracking-wide mb-2 uppercase">
                                    Dedication
                                </h4>
                                <p class="text-xs md:text-sm text-slate-600 leading-relaxed text-justify">
                                    Wholehearted devotion to one's work.
                                </p>
                            </div>
                        </div>

                        <div
                            class="p-5 rounded-xl bg-blue-50/60 border-l-4 border-[#1a589e] hover:bg-blue-50 hover:border-blue-500 transition-all duration-200 flex flex-col justify-between">
                            <div>
                                <h4 class="font-extrabold text-lg text-[#1a589e] tracking-wide mb-2 uppercase">
                                    Commitment
                                </h4>
                                <p class="text-xs md:text-sm text-slate-600 leading-relaxed text-justify">
                                    Pledging one's self to a purposeful endeavor, while practicing righteous beliefs and
                                    faithfully adhering to those beliefs; It is also referred to as “Persistence with
                                    Purpose."
                                </p>
                            </div>
                        </div>

                        <div
                            class="p-5 rounded-xl bg-blue-50/60 border-l-4 border-[#1a589e] hover:bg-blue-50 hover:border-blue-500 transition-all duration-200 flex flex-col justify-between">
                            <div>
                                <h4 class="font-extrabold text-lg text-[#1a589e] tracking-wide mb-2 uppercase">
                                    Loyalty
                                </h4>
                                <p class="text-xs md:text-sm text-slate-600 leading-relaxed text-justify">
                                    Means being absolutely true at all times in any circumstances.
                                </p>
                            </div>
                        </div>

                        <div
                            class="p-5 rounded-xl bg-blue-50/60 border-l-4 border-[#1a589e] hover:bg-blue-50 hover:border-blue-500 transition-all duration-200 flex flex-col justify-between">
                            <div>
                                <h4 class="font-extrabold text-lg text-[#1a589e] tracking-wide mb-2 uppercase">
                                    Integrity
                                </h4>
                                <p class="text-xs md:text-sm text-slate-600 leading-relaxed text-justify">
                                    Possession of strong moral character.
                                </p>
                            </div>
                        </div>

                        <div
                            class="p-5 rounded-xl bg-blue-50/60 border-l-4 border-[#1a589e] hover:bg-blue-50 hover:border-blue-500 transition-all duration-200 flex flex-col justify-between">
                            <div>
                                <h4 class="font-extrabold text-lg text-[#1a589e] tracking-wide mb-2 uppercase">
                                    Simple Living
                                </h4>
                                <p class="text-xs md:text-sm text-slate-600 leading-relaxed text-justify">
                                    The act of moving from a lifestyle of greater consumption towards a lifestyle based
                                    on voluntary simplicity.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Quality Policy -->
                <div id="policy" class="tab-content">

                    <!-- Section Title -->
                    <h2 class="text-2xl font-black mb-6 text-[#1a589e] flex items-center gap-2">
                        <i class="fa-solid fa-medal"></i>
                        <span>Quality Policy</span>
                    </h2>

                    <!-- Introduction Paragraphs -->
                    <div class="text-sm text-slate-600 leading-relaxed space-y-4 mb-6 text-justify">
                        <p>
                            The Calamba Water District is dedicated to effectively provide our water management services
                            that meet or exceed our customers' requirements, expectations and conformance to all quality
                            parameters required by the international and statutory standards.
                        </p>
                        <p>
                            In order to achieve this goal, we think and act as a team to give our customers the best
                            service that we can give. Towards this end, we commit:
                        </p>
                    </div>

                    <!-- Commitments Highlight Box -->
                    <div class="p-6 bg-blue-50/60 rounded-xl border-l-4 border-[#1a589e]">
                        <ul class="space-y-4 font-semibold text-xs md:text-sm text-blue-950 text-justify list-none">

                            <li class="flex items-start gap-3">
                                <i class="fa fa-check-circle text-[#1a589e] text-base shrink-0 mt-0.5"
                                    aria-hidden="true"></i>
                                <span>To meet, if not exceed, the standards set by the Philippine National Standard for
                                    Drinking Water (PNSDW).</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <i class="fa fa-check-circle text-[#1a589e] text-base shrink-0 mt-0.5"
                                    aria-hidden="true"></i>
                                <span>To communicate our quality policy with our customers, and all other interested
                                    parties and encourage our employees to embrace quality as their personal commitment
                                    to the water district.</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <i class="fa fa-check-circle text-[#1a589e] text-base shrink-0 mt-0.5"
                                    aria-hidden="true"></i>
                                <span>To identify areas for continual improvement by conducting regular review of the
                                    Quality Management System and subjecting the performance of Calamba Water District
                                    to regular internal audit.</span>
                            </li>

                        </ul>
                    </div>

                </div>

                <!-- GAD Goals -->
                <div id="gadgoals" class="tab-content">

                    <!-- Main Section Title -->
                    <h2 class="text-2xl font-black mb-6 text-[#1a589e] flex items-center gap-2">
                        <i class="fa-solid fa-venus-mars"></i>
                        <span>GAD Goals</span>
                    </h2>

                    <!-- Mission Section -->
                    <div class="mb-6">
                        <span
                            class="block text-sm font-bold uppercase tracking-wider text-[#1a589e] mb-2 flex items-center gap-2">
                            <i class="fa-solid fa-bullseye text-xs"></i> Mission
                        </span>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            The District will ensure the women and men in Calamba City to equitably access potable water
                            24/7 and will promote participative discussion and feedback to enhancing services.
                        </p>
                    </div>

                    <!-- Vision Section -->
                    <div class="mb-8">
                        <span
                            class="block text-sm font-bold uppercase tracking-wider text-[#1a589e] mb-2 flex items-center gap-2">
                            <i class="fa-solid fa-eye text-xs"></i> Vision
                        </span>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            A gender responsive water district providing the highest quality of service to ensure
                            continuous supply of potable water at an affordable cost to women and men in Calamba City,
                            and committed to an environmental preservation and protection.
                        </p>
                    </div>

                    <!-- Core Values Section -->
                    <div class="mb-8">
                        <span
                            class="block text-sm font-bold uppercase tracking-wider text-[#1a589e] mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-heart text-xs"></i> Core Values
                        </span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                            <div
                                class="p-4 rounded-xl bg-blue-50/60 border-l-4 border-[#1a589e] hover:bg-blue-50 hover:border-blue-500 transition-all duration-200">
                                <h4 class="font-bold text-sm text-[#1a589e]">Knowledgeability</h4>
                            </div>
                            <div
                                class="p-4 rounded-xl bg-blue-50/60 border-l-4 border-[#1a589e] hover:bg-blue-50 hover:border-blue-500 transition-all duration-200">
                                <h4 class="font-bold text-sm text-[#1a589e]">Dedication</h4>
                            </div>
                            <div
                                class="p-4 rounded-xl bg-blue-50/60 border-l-4 border-[#1a589e] hover:bg-blue-50 hover:border-blue-500 transition-all duration-200">
                                <h4 class="font-bold text-sm text-[#1a589e]">Commitment</h4>
                            </div>
                            <div
                                class="p-4 rounded-xl bg-blue-50/60 border-l-4 border-[#1a589e] hover:bg-blue-50 hover:border-blue-500 transition-all duration-200">
                                <h4 class="font-bold text-sm text-[#1a589e]">Loyalty</h4>
                            </div>
                            <div
                                class="p-4 rounded-xl bg-blue-50/60 border-l-4 border-[#1a589e] hover:bg-blue-50 hover:border-blue-500 transition-all duration-200">
                                <h4 class="font-bold text-sm text-[#1a589e]">Integrity</h4>
                            </div>
                            <div
                                class="p-4 rounded-xl bg-blue-50/60 border-l-4 border-[#1a589e] hover:bg-blue-50 hover:border-blue-500 transition-all duration-200">
                                <h4 class="font-bold text-sm text-[#1a589e]">Simple Living</h4>
                            </div>
                            <div
                                class="p-4 rounded-xl bg-blue-50/60 border-l-4 border-[#1a589e] hover:bg-blue-50 hover:border-blue-500 transition-all duration-200">
                                <h4 class="font-bold text-sm text-[#1a589e]">Gender Responsive</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Goals Section -->
                    <div class="mb-8">
                        <span
                            class="block text-sm font-bold uppercase tracking-wider text-[#1a589e] mb-3 flex items-center gap-2">
                            <i class="fa-solid fa-anchor text-xs"></i> Goals
                        </span>
                        <div class="p-5 bg-blue-50/60 rounded-xl border-l-4 border-[#1a589e]">
                            <ol class="space-y-3 font-semibold text-xs md:text-sm text-blue-950 text-justify list-none">
                                <li class="flex items-start gap-2">
                                    <span class="shrink-0 text-[#1a589e]">1.</span>
                                    <span>To mainstream gender in policies, people, programs and services, and enabling
                                        mechanisms for a gender responsive Calamba Water District.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="shrink-0 text-[#1a589e]">2.</span>
                                    <span>To strengthen the participation of external clients in stakeholder's
                                        discussions as partners to equally contribute and benefit in identifying and
                                        addressing needs and concerns.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="shrink-0 text-[#1a589e]">3.</span>
                                    <span>Enhance the capacity of internal clients to develop gender lens and address
                                        gender concerns in the performance of its mandate and programs.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="shrink-0 text-[#1a589e]">4.</span>
                                    <span>To serve as a model to institutionalize GAD across all water districts.</span>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <!-- Quality Policy Section -->
                    <div class="mb-6">
                        <span
                            class="block text-sm font-bold uppercase tracking-wider text-[#1a589e] mb-2 flex items-center gap-2">
                            <i class="fa-solid fa-medal text-xs"></i> Quality Policy
                        </span>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify mb-4">
                            At Calamba Water District (CWD), we are committed to providing safe, reliable, and
                            sustainable water services by embracing our core principles. Our commitment as a
                            gender-responsive water district includes actively promoting gender equality and inclusion
                            in all aspects of our operations and service delivery, recognizing that water access, use,
                            and management impact all genders differently.
                        </p>

                        <!-- CWD Acronym Breakdown Box -->
                        <div class="p-6 bg-blue-50/60 rounded-xl border-l-4 border-[#1a589e]">
                            <ol class="list-none space-y-6 text-justify">

                                <!-- C - Commitment -->
                                <li>
                                    <div class="flex items-start gap-4 mb-2">
                                        <span class="font-black text-4xl leading-none text-[#1a589e]">C</span>
                                        <span class="text-base font-bold text-blue-950 pt-1">Commitment to Compliance to
                                            Quality Standards, Customer Satisfaction, and Community Inclusion</span>
                                    </div>
                                    <ul
                                        class="list-disc pl-5 ml-9 space-y-1.5 text-xs md:text-sm font-normal text-blue-900/90">
                                        <li>Comply with the Philippine National Standards for Drinking Water (PNSDW),
                                            statutory, regulatory, and international requirements, including those
                                            promoting gender equality and non-discrimination.</li>
                                        <li>Consistently meet or exceed customer requirements and expectations by
                                            understanding and addressing the diverse water needs of all community
                                            members, particularly women and marginalized groups who often bear the
                                            primary responsibility for water collection and household water management.
                                        </li>
                                    </ul>
                                </li>

                                <!-- W - Workforce -->
                                <li>
                                    <div class="flex items-start gap-4 mb-2">
                                        <span class="font-black text-4xl leading-none text-[#1a589e]">W</span>
                                        <span class="text-base font-bold text-blue-950 pt-1">Workforce Engagement,
                                            Continuous Improvement, and Welcoming Environment</span>
                                    </div>
                                    <ul
                                        class="list-disc pl-5 ml-9 space-y-1.5 text-xs md:text-sm font-normal text-blue-900/90">
                                        <li>Work as a team and empower all employees, regardless of gender, to take
                                            ownership of quality as a personal responsibility. This includes promoting
                                            equal opportunities for training, career advancement, and leadership roles
                                            for all genders.</li>
                                        <li>Enhance our Quality Management System (QMS) through regular reviews, audits,
                                            and continual improvement initiatives, with a specific focus on identifying
                                            and addressing potential gender-based disparities in the workplace and
                                            in-service delivery.</li>
                                        <li>Foster a respectful, inclusive, and safe working environment free from
                                            harassment and discrimination for all genders in our workforce.</li>
                                    </ul>
                                </li>

                                <!-- D - Dedication -->
                                <li>
                                    <div class="flex items-start gap-4 mb-2">
                                        <span class="font-black text-4xl leading-none text-[#1a589e]">D</span>
                                        <span class="text-base font-bold text-blue-950 pt-1">Dedication to
                                            Sustainability, Service Excellence, and Diversity</span>
                                    </div>
                                    <ul
                                        class="list-disc pl-5 ml-9 space-y-1.5 text-xs md:text-sm font-normal text-blue-900/90">
                                        <li>Deliver services that ensure long-term water security, resource efficiency,
                                            and environmental stewardship by integrating gender perspectives into
                                            planning and decision-making and implementation processes, recognizing
                                            women's critical roles in water conservation and resource management.</li>
                                        <li>Demonstrate excellence in public service through accountability,
                                            transparency, and innovation, ensuring that feedback mechanisms and
                                            grievance procedures are accessible and responsive to the needs of all
                                            community members, including those who are often underrepresented.</li>
                                    </ul>
                                </li>

                            </ol>
                        </div>
                    </div>

                </div>



                <!-- Board -->
                <div id="board" class="tab-content py-8">
                    <!-- Main Title -->
                    <div class="text-center mb-16">
                        <h2 class="text-4xl font-black text-[#1a589e] flex items-center justify-center gap-4">
                            <i class="fa-solid fa-users-rectangle"></i> Board of Directors
                        </h2>
                        <div class="w-24 h-1.5 bg-[#1a589e] mx-auto mt-4 rounded-full"></div>
                    </div>

                    <!-- LEVEL 1: Chairperson (Featured) -->
                    <div class="mb-16">
                        <div class="flex justify-center px-4">
                            <div class="relative group max-w-[480px] w-full">
                                <!-- Glow Effect -->
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-[2rem] blur opacity-10 group-hover:opacity-30 transition duration-1000">
                                </div>

                                <!-- Card Container -->
                                <div
                                    class="relative bg-white rounded-[2rem] shadow-xl overflow-hidden border border-slate-100">
                                    <div class="aspect-[4/5] overflow-hidden bg-slate-100">
                                        <img src="assets\orgphotos\BOD1.png" alt="Mr. Ronald J. Pua"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    </div>
                                    <div class="p-6 text-center bg-white border-t border-slate-50">
                                        <p class="text-xl font-black text-slate-900 tracking-tight mb-1">Mr. Ronald J.
                                            Pua</p>
                                        <p class="text-[#1a589e] font-bold text-xs uppercase tracking-[0.2em]">
                                            Chairperson</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- LEVEL 2: Other Board Members Grid -->
                    <div class="max-w-6xl mx-auto px-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">

                            <!-- Vice-Chairperson -->
                            <div
                                class="bg-white rounded-[2rem] shadow-xl overflow-hidden border border-slate-100 group transition-all hover:shadow-2xl">
                                <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                    <img src="assets\orgphotos\BOD2.png" alt="Atty. Dante Manguiat"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-6 text-center">
                                    <h4 class="text-lg font-extrabold text-slate-800 leading-tight">Atty. Dante Manguiat
                                    </h4>
                                    <p class="text-blue-600 text-[10px] font-bold uppercase mt-2 tracking-wider">
                                        Vice-Chairperson</p>
                                </div>
                            </div>

                            <!-- Corporate Secretary -->
                            <div
                                class="bg-white rounded-[2rem] shadow-xl overflow-hidden border border-slate-100 group transition-all hover:shadow-2xl">
                                <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                    <img src="assets\orgphotos\BOD3.png" alt="Mr. Aldrin Gamilla"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-6 text-center">
                                    <h4 class="text-lg font-extrabold text-slate-800 leading-tight">Mr. Aldrin Gamilla
                                    </h4>
                                    <p class="text-blue-600 text-[10px] font-bold uppercase mt-2 tracking-wider">
                                        Corporate Secretary</p>
                                </div>
                            </div>

                            <!-- Treasurer -->
                            <div
                                class="bg-white rounded-[2rem] shadow-xl overflow-hidden border border-slate-100 group transition-all hover:shadow-2xl">
                                <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                    <img src="assets\orgphotos\BOD4.png" alt="Ms. Alicia V. Llamas"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-6 text-center">
                                    <h4 class="text-lg font-extrabold text-slate-800 leading-tight">Ms. Alicia V. Llamas
                                    </h4>
                                    <p class="text-blue-600 text-[10px] font-bold uppercase mt-2 tracking-wider">
                                        Treasurer</p>
                                </div>
                            </div>

                            <!-- P.R.O. -->
                            <div
                                class="bg-white rounded-[2rem] shadow-xl overflow-hidden border border-slate-100 group transition-all hover:shadow-2xl">
                                <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                    <img src="assets\orgphotos\BOD5.png" alt="Mr. Bryan A. Ercia"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-6 text-center">
                                    <h4 class="text-lg font-extrabold text-slate-800 leading-tight">Mr. Bryan A. Ercia
                                    </h4>
                                    <p class="text-blue-600 text-[10px] font-bold uppercase mt-2 tracking-wider">P.R.O.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

                <!-- Management -->
                <div id="management" class="tab-content">
                    <!-- Main Title -->
                    <div class="text-center mb-16">
                        <h2 class="text-2xl text-center font-black mb-8 text-[#1a589e]">
                            <i class="fa-solid fa-user-tie"></i> Key Personnel
                        </h2>
                        <div class="w-24 h-1.5 bg-[#1a589e] mx-auto mt-4 rounded-full"></div>
                    </div>

                    <!-- LEVEL 1: General Manager -->
                    <div class="mb-16">
                        <h3 class="text-xl font-bold text-slate-400 uppercase tracking-[0.2em] text-center mb-10">
                            Office of the General Manager</h3>
                        <div class="flex justify-center px-4">
                            <div class="relative group max-w-[400px] w-full">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-[2.5rem] blur opacity-25 group-hover:opacity-50 transition duration-1000">
                                </div>
                                <div
                                    class="relative bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-100">
                                    <div class="aspect-[4/5] overflow-hidden bg-slate-100">
                                        <img src="assets\orgphotos\GM3.png" alt="Mr. Exequiel A. Aguilar, Jr."
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    </div>
                                    <div class="p-8 text-center bg-white">
                                        <p class="text-2xl font-black text-slate-900 tracking-tight mb-1">Mr. Exequiel
                                            A. Aguilar, Jr.</p>
                                        <p class="text-[#1a589e] font-bold text-sm uppercase tracking-widest">General
                                            Manager</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row md:justify-center w-full mb-16">

                        <!-- Unang Card (Left Alignment Features preserved) -->
                        <div class="flex justify-center md:justify-end md:mr-16 lg:mr-17 lg:top-[100%] xl:mr-50 mb-5">
                            <div
                                class="bg-white w-[75%] md:w-full max-w-[300px] rounded-3xl shadow-lg overflow-hidden border border-slate-100 group/card transition-all hover:shadow-lg">
                                <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                    <img src="assets\orgphotos\DvM Fin 2.png"
                                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-4 text-center">
                                    <h5 class="text-m font-bold text-slate-800">Ms. Junsy Y. Nieron, CPA</h5>
                                    <p class="text-blue-600 text-[10px] font-bold uppercase mt-0.5">Supervising Internal
                                        Control Officer</p>
                                </div>
                            </div>
                        </div>

                        <!-- Pangalawang Card (Right Alignment Features preserved) -->
                        <div class="flex justify-center md:justify-start md:ml-16 lg:ml-17 lg:top-[100%] xl:ml-50 mb-5">
                            <div
                                class="bg-white w-[75%] md:w-full max-w-[300px] rounded-3xl shadow-lg overflow-hidden border border-slate-100 group/card transition-all hover:shadow-lg">
                                <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                    <img src="assets\orgphotos\MIS.png"
                                        class="w-full h-full object-cover group-hover/card:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-4 text-center">
                                    <h5 class="text-m font-bold text-slate-800">Engr. Jonathan Dave A. Fajarda</h5>
                                    <p class="text-blue-600 text-[10px] font-bold uppercase mt-0.5">Management
                                        Information Design Specialist</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- LEVEL 2.1: Administrative Department -->
                    <div class="mb-16">
                        <h3 class="text-xl font-bold text-slate-400 uppercase tracking-[0.2em] text-center mb-10">
                            Administrative Department</h3>

                        <div class="flex justify-center px-4 mb-6">
                            <div
                                class="w-full max-w-[380px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                    <img src="assets\orgphotos\DpM Adm.png"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-4 text-center">
                                    <h4 class="text-lg font-extrabold text-slate-800">Mr. Edwin L. Cartago</h4>
                                    <p class="text-blue-600 text-[15px] font-bold uppercase mt-1">Administrative
                                        Department Manager</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">

                            <!-- HRD -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-[75%] md:w-full max-w-[300px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                    <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                        <img src="assets\orgphotos\DvM Adm 1.png"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="p-4 text-center">
                                        <h4 class="text-lg font-extrabold text-slate-800">Ms. Elenita V. Panganiban</h4>
                                        <p class="text-blue-600 text-[12px] font-bold uppercase mt-1">Human Resources
                                            Division Manager</p>
                                    </div>
                                </div>

                            </div>

                            <!-- PMMD -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-[75%] md:w-full max-w-[300px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                    <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                        <img src="assets\orgphotos\DvM Adm 2.png"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="p-4 text-center">
                                        <h4 class="text-lg font-extrabold text-slate-800">Mr. Rolando M. Pizzara</h4>
                                        <p class="text-blue-600 text-[12px] font-bold uppercase mt-1">OIC, Property &
                                            Materials Management Division
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <!-- GSD -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-[75%] md:w-full max-w-[300px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                    <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                        <img src="assets\orgphotos\DvM Adm 3.png"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="p-4 text-center">
                                        <h4 class="text-lg font-extrabold text-slate-800">Mr. Emmanuel T. Salvador
                                        </h4>
                                        <p class="text-blue-600 text-[12px] font-bold uppercase mt-1">General Services
                                            Division Manager
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- LEVEL 2.2: Finance Department -->
                    <div class="mb-16">
                        <h3 class="text-xl font-bold text-slate-400 uppercase tracking-[0.2em] text-center mb-10">
                            Finance Department</h3>

                        <div class="flex justify-center px-4 mb-6">
                            <div
                                class="w-full max-w-[380px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                    <img src="assets\orgphotos\DvM Fin 1.png"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-4 text-center">
                                    <h4 class="text-lg font-extrabold text-slate-800">Ms. Mercedes A. Carreon</h4>
                                    <p class="text-blue-600 text-[15px] font-bold uppercase mt-1">OIC, Finance
                                        Department
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row justify-center gap-12 lg:gap-24 items-start">

                            <!-- Accounting -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-[75%] md:w-full max-w-[300px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                    <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                        <img src="assets\orgphotos\DvM Fin 2.png"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="p-4 text-center">
                                        <h4 class="text-lg font-extrabold text-slate-800">Ms. Junsy Y. Nieron, CPA</h4>
                                        <p class="text-blue-600 text-[12px] font-bold uppercase mt-1">OIC, General
                                            Accounting Division</p>
                                    </div>
                                </div>

                            </div>

                            <!-- Budget -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-[75%] md:w-full max-w-[300px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                    <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                        <img src="assets\orgphotos\DvM Fin 1.png"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="p-4 text-center">
                                        <h4 class="text-lg font-extrabold text-slate-800">Ms. Mercedes M. Carreon</h4>
                                        <p class="text-blue-600 text-[12px] font-bold uppercase mt-1">Budget Division
                                            Manager
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- LEVEL 2.3: Finance Department -->
                    <div class="mb-16">
                        <h3 class="text-xl font-bold text-slate-400 uppercase tracking-[0.2em] text-center mb-10">
                            Commercial Department</h3>

                        <div class="flex justify-center px-4 mb-6">
                            <div
                                class="w-full max-w-[380px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                    <img src="assets\orgphotos\DpM Com.png"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-4 text-center">
                                    <h4 class="text-lg font-extrabold text-slate-800">Ms. Ma. Carmela M. Elepano
                                    </h4>
                                    <p class="text-blue-600 text-[15px] font-bold uppercase mt-1">Commercial Department
                                        Manager</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">

                            <!-- CC -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-[75%] md:w-full max-w-[300px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                    <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                        <img src="assets\orgphotos\DvM Com 1.png"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="p-4 text-center">
                                        <h4 class="text-lg font-extrabold text-slate-800">Mr. Ronnie G. Sierva</h4>
                                        <p class="text-blue-600 text-[12px] font-bold uppercase mt-1">Customer Care
                                            Division Manager</p>
                                    </div>
                                </div>

                            </div>

                            <!-- CA -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-[75%] md:w-full max-w-[300px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                    <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                        <img src="assets\orgphotos\DvM Com 2.png"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="p-4 text-center">
                                        <h4 class="text-lg font-extrabold text-slate-800">Mr. Henry B. Junio</h4>
                                        <p class="text-blue-600 text-[12px] font-bold uppercase mt-1">Customer Accounts
                                            Division Manager
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <!-- BMR -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-[75%] md:w-full max-w-[300px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                    <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                        <img src="assets\orgphotos\DvM Com 3.png"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="p-4 text-center">
                                        <h4 class="text-lg font-extrabold text-slate-800">Ms. Basilisa Gillera
                                        </h4>
                                        <p class="text-blue-600 text-[12px] font-bold uppercase mt-1">OIC, Billing &
                                            Meter Reading Division
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- LEVEL 2.4: Technical Services Department -->
                    <div class="mb-16">
                        <h3 class="text-xl font-bold text-slate-400 uppercase tracking-[0.2em] text-center mb-10">
                            Technical Services Department</h3>

                        <div class="flex justify-center px-4 mb-6">
                            <div
                                class="w-full max-w-[380px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                    <img src="assets\orgphotos\DpM tsd.png"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-4 text-center">
                                    <h4 class="text-lg font-extrabold text-slate-800">Engr. Ranely S. Cartago
                                    </h4>
                                    <p class="text-blue-600 text-[15px] font-bold uppercase mt-1">Technical Services
                                        Department Manager</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row justify-center gap-12 lg:gap-24 items-start">

                            <!-- EMD -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-[75%] md:w-full max-w-[300px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                    <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                        <img src="assets\orgphotos\DvM tsd 1.png"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="p-4 text-center">
                                        <h4 class="text-lg font-extrabold text-slate-800">Engr. Rolando V. Baro</h4>
                                        <p class="text-blue-600 text-[12px] font-bold uppercase mt-1">OIC, Engineering
                                            and Maintenance Division Manager</p>
                                    </div>
                                </div>

                            </div>

                            <!-- PAMD -->
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-[75%] md:w-full max-w-[300px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                    <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                        <img src="assets\orgphotos\DvM tsd 2.png"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="p-4 text-center">
                                        <h4 class="text-lg font-extrabold text-slate-800">Engr. Bernard Joseph Rodriguez
                                        </h4>
                                        <p class="text-blue-600 text-[12px] font-bold uppercase mt-1">OIC, Pipeline &
                                            Appurtenances Maintenance Division
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- LEVEL 2.4: Operations Department -->
                    <div class="mb-16">
                        <h3 class="text-xl font-bold text-slate-400 uppercase tracking-[0.2em] text-center mb-10">
                            Operations Department</h3>

                        <div class="flex justify-center px-4 mb-6">
                            <div
                                class="w-full max-w-[380px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                    <img src="assets\orgphotos\DpM Opr.png"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-4 text-center">
                                    <h4 class="text-lg font-extrabold text-slate-800">Engr. Joselito A. Gillera</h4>
                                    <p class="text-blue-600 text-[15px] font-bold uppercase mt-1">Operations Department
                                        Manager</p>
                                </div>
                            </div>
                        </div>

                        <!-- Production -->
                        <div class="flex flex-col items-center">
                            <div
                                class="w-[75%] md:w-full max-w-[300px] bg-white rounded-3xl shadow-lg overflow-hidden border border-slate-100 group mb-8">
                                <div class="aspect-[4.5/5] overflow-hidden bg-slate-50">
                                    <img src="assets\orgphotos\DvM Ops 1.png"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-4 text-center">
                                    <h4 class="text-lg font-extrabold text-slate-800">Engr. Elizaldy D. Novillos
                                    </h4>
                                    <p class="text-blue-600 text-[12px] font-bold uppercase mt-1">Production Division
                                        Manager</p>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

                <!-- Org Chart -->
                <div id="chart" class="tab-content">

                    <!-- Chart Main Title -->
                    <h2
                        class="text-2xl text-center font-black mb-8 text-[#1a589e] flex items-center justify-center gap-2">
                        <i class="fa-solid fa-sitemap"></i>
                        <span>Organizational Chart</span>
                    </h2>

                    <!-- TOP LEVEL: Board of Directors -->
                    <div class="mb-4 flex justify-center">
                        <div
                            class="w-full sm:w-72 text-center p-6 rounded-xl bg-white border border-slate-100 shadow-md">
                            <img src="https://placehold.co/96x96/15467e/ffffff?text=BOD" alt="Board of Directors"
                                class="w-20 h-20 mx-auto rounded-full object-cover mb-3 ring-4 ring-blue-50">
                            <p class="text-lg font-black text-slate-800 leading-tight">Board of Directors</p>
                            <p class="text-xs font-bold text-slate-500 mt-1 uppercase tracking-wider">Office of the
                                B.O.D</p>
                        </div>
                    </div>

                    <!-- LEVEL 1: General Manager -->
                    <div class="mb-4 flex justify-center">
                        <div
                            class="w-full sm:w-72 text-center p-6 rounded-xl bg-white border border-slate-100 shadow-md">
                            <img src="https://placehold.co/96x96/15467e/ffffff?text=OGM" alt="General Manager's Office"
                                class="w-20 h-20 mx-auto rounded-full object-cover mb-3 ring-4 ring-blue-50">
                            <p class="text-lg font-black text-slate-800 leading-tight">General Manager</p>
                            <p class="text-xs font-bold text-slate-500 mt-1 uppercase tracking-wider">Office of the
                                General Manager</p>
                        </div>
                    </div>

                    <!-- STAFF LEVEL: MIS Section (Attached to OGM Side/Below) -->
                    <div class="flex justify-center mb-12">
                        <!-- Ginawang flex row at text-left para magkapantay ang imahe at teksto -->
                        <div
                            class="p-3 px-4 rounded-xl bg-slate-50 border border-slate-200 shadow-sm max-w-xs flex items-center gap-3 text-left">

                            <!-- MIS Avatar Image -->
                            <img src="https://placehold.co/48x48/34d399/ffffff?text=MIS"
                                alt="Management Information Services Section"
                                class="w-8 h-8 rounded-full object-cover shrink-0 ring-2 ring-white shadow-sm">

                            <!-- MIS Text Content -->
                            <div>
                                <p class="text-xs font-bold text-slate-600 text-center uppercase tracking-wide leading-tight">
                                    Management Information Services Section
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- LOWER LEVELS: Departments, Divisions, and Sections Container -->
                    <div class="pt-4 border-t border-slate-100">

                        <h3 class="text-xl font-extrabold text-slate-700 mb-8 text-center uppercase tracking-wide">
                            Departments, Divisions & Sections
                        </h3>

                        <!-- ROW 1: 3 Main Departments -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

                            <!-- 1. Administrative Department -->
                            <div class="flex flex-col bg-slate-50/50 p-4 rounded-xl border border-slate-100">
                                <!-- Dept Head Card -->
                                <div
                                    class="p-4 rounded-xl bg-white border-l-4 border-emerald-500 shadow-sm flex items-center space-x-3 mb-4">
                                    <img src="https://placehold.co/48x48/34d399/ffffff?text=ADM"
                                        alt="Administrative Department"
                                        class="w-10 h-10 rounded-full object-cover shrink-0">
                                    <div class="text-left">
                                        <p class="text-sm font-black text-slate-800">Administrative Department</p>
                                    </div>
                                </div>
                                <!-- L3 Divisions -->
                                <div class="space-y-2">
                                    <div
                                        class="p-3 rounded-lg bg-blue-50/60 border border-blue-100/50 flex items-center space-x-3">
                                        <img src="https://placehold.co/32x32/60a5fa/ffffff?text=HRD"
                                            alt="Human Resource Division"
                                            class="w-7 h-7 rounded-full object-cover shrink-0">
                                        <p class="text-xs font-bold text-slate-700">Human Resource Division</p>
                                    </div>
                                    <div
                                        class="p-3 rounded-lg bg-blue-50/60 border border-blue-100/50 flex items-center space-x-3">
                                        <img src="https://placehold.co/32x32/60a5fa/ffffff?text=PMMD"
                                            alt="Property & Materials Management Division"
                                            class="w-7 h-7 rounded-full object-cover shrink-0">
                                        <p class="text-xs font-bold text-slate-700">Property & Materials Management
                                            Division</p>
                                    </div>
                                    <div
                                        class="p-3 rounded-lg bg-blue-50/60 border border-blue-100/50 flex items-center space-x-3">
                                        <img src="https://placehold.co/32x32/60a5fa/ffffff?text=GSD"
                                            alt="General Services Division"
                                            class="w-7 h-7 rounded-full object-cover shrink-0">
                                        <p class="text-xs font-bold text-slate-700">General Services Division</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. Finance Department -->
                            <div class="flex flex-col bg-slate-50/50 p-4 rounded-xl border border-slate-100">
                                <!-- Dept Head Card -->
                                <div
                                    class="p-4 rounded-xl bg-white border-l-4 border-emerald-500 shadow-sm flex items-center space-x-3 mb-4">
                                    <img src="https://placehold.co/48x48/34d399/ffffff?text=FIN"
                                        alt="Finance Department" class="w-10 h-10 rounded-full object-cover shrink-0">
                                    <div class="text-left">
                                        <p class="text-sm font-black text-slate-800">Finance Department</p>
                                    </div>
                                </div>
                                <!-- L3 Divisions -->
                                <div class="space-y-2">
                                    <div
                                        class="p-3 rounded-lg bg-blue-50/60 border border-blue-100/50 flex items-center space-x-3">
                                        <img src="https://placehold.co/32x32/60a5fa/ffffff?text=BD"
                                            alt="Budget Division" class="w-7 h-7 rounded-full object-cover shrink-0">
                                        <p class="text-xs font-bold text-slate-700">Budget Division</p>
                                    </div>
                                    <div
                                        class="p-3 rounded-lg bg-blue-50/60 border border-blue-100/50 flex items-center space-x-3">
                                        <img src="https://placehold.co/32x32/60a5fa/ffffff?text=GAD"
                                            alt="General Accounting Division"
                                            class="w-7 h-7 rounded-full object-cover shrink-0">
                                        <p class="text-xs font-bold text-slate-700">General Accounting Division</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. Commercial Department -->
                            <div class="flex flex-col bg-slate-50/50 p-4 rounded-xl border border-slate-100">
                                <!-- Dept Head Card -->
                                <div
                                    class="p-4 rounded-xl bg-white border-l-4 border-emerald-500 shadow-sm flex items-center space-x-3 mb-4">
                                    <img src="https://placehold.co/48x48/34d399/ffffff?text=COM"
                                        alt="Commercial Department"
                                        class="w-10 h-10 rounded-full object-cover shrink-0">
                                    <div class="text-left">
                                        <p class="text-sm font-black text-slate-800">Commercial Department</p>
                                    </div>
                                </div>
                                <!-- L3 Divisions & L4 Sections -->
                                <div class="space-y-3">
                                    <!-- Div 1: No Sections -->
                                    <div
                                        class="p-3 rounded-lg bg-blue-50/60 border border-blue-100/50 flex items-center space-x-3">
                                        <img src="https://placehold.co/32x32/60a5fa/ffffff?text=BMD"
                                            alt="Billing and Meter Reading Division"
                                            class="w-7 h-7 rounded-full object-cover shrink-0">
                                        <p class="text-xs font-bold text-slate-700">Billing and Meter Reading Division
                                        </p>
                                    </div>

                                    <!-- Div 2: With Sections -->
                                    <div class="p-3 rounded-lg bg-blue-50/60 border border-blue-100/50">
                                        <div class="flex items-center space-x-3 mb-2">
                                            <img src="https://placehold.co/32x32/60a5fa/ffffff?text=CA"
                                                alt="Customer Accounts Division"
                                                class="w-7 h-7 rounded-full object-cover shrink-0">
                                            <p class="text-xs font-bold text-slate-700">Customer Accounts Division</p>
                                        </div>
                                        <!-- L4 Sub-Sections -->
                                        <div class="pl-10 space-y-1 border-l-2 border-slate-200">
                                            <p class="text-[11px] font-semibold text-slate-500 py-0.5">• Billing Section
                                            </p>
                                            <p class="text-[11px] font-semibold text-slate-500 py-0.5">• Meter Reading
                                                Section</p>
                                            <p class="text-[11px] font-semibold text-slate-500 py-0.5">• Collection
                                                Section</p>
                                        </div>
                                    </div>

                                    <!-- Div 3: With Sections -->
                                    <div class="p-3 rounded-lg bg-blue-50/60 border border-blue-100/50">
                                        <div class="flex items-center space-x-3 mb-2">
                                            <img src="https://placehold.co/32x32/60a5fa/ffffff?text=CC"
                                                alt="Customer Care Division"
                                                class="w-7 h-7 rounded-full object-cover shrink-0">
                                            <p class="text-xs font-bold text-slate-700">Customer Care Division</p>
                                        </div>
                                        <!-- L4 Sub-Sections -->
                                        <div class="pl-10 space-y-1 border-l-2 border-slate-200">
                                            <p class="text-[11px] font-semibold text-slate-500 py-0.5">• Investigation
                                                Section</p>
                                            <p class="text-[11px] font-semibold text-slate-500 py-0.5">• Servicing
                                                Section</p>
                                            <p class="text-[11px] font-semibold text-slate-500 py-0.5">•
                                                Disconnection/Reconnection Section</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- ROW 2: 2 Technical/Ops Departments (Centered Grid) -->
                        <div class="flex justify-center">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full lg:w-2/3">

                                <!-- 4. Technical Services Department -->
                                <div class="flex flex-col bg-slate-50/50 p-4 rounded-xl border border-slate-100">
                                    <!-- Dept Head Card -->
                                    <div
                                        class="p-4 rounded-xl bg-white border-l-4 border-emerald-500 shadow-sm flex items-center space-x-3 mb-4">
                                        <img src="https://placehold.co/48x48/34d399/ffffff?text=TSD"
                                            alt="Technical Services Department"
                                            class="w-10 h-10 rounded-full object-cover shrink-0">
                                        <div class="text-left">
                                            <p class="text-sm font-black text-slate-800">Technical Services Department
                                            </p>
                                        </div>
                                    </div>
                                    <!-- L3 Divisions -->
                                    <div class="space-y-2">
                                        <div
                                            class="p-3 rounded-lg bg-blue-50/60 border border-blue-100/50 flex items-center space-x-3">
                                            <img src="https://placehold.co/32x32/60a5fa/ffffff?text=EAMD"
                                                alt="Engineering and Maintenance Division"
                                                class="w-7 h-7 rounded-full object-cover shrink-0">
                                            <p class="text-xs font-bold text-slate-700">Engineering and Maintenance
                                                Division</p>
                                        </div>
                                        <div
                                            class="p-3 rounded-lg bg-blue-50/60 border border-blue-100/50 flex items-center space-x-3">
                                            <img src="https://placehold.co/32x32/60a5fa/ffffff?text=PAMD"
                                                alt="Pipeline and Maintenance Division"
                                                class="w-7 h-7 rounded-full object-cover shrink-0">
                                            <p class="text-xs font-bold text-slate-700">Pipeline and Maintenance
                                                Division</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- 5. Operations Department -->
                                <div class="flex flex-col bg-slate-50/50 p-4 rounded-xl border border-slate-100">
                                    <!-- Dept Head Card -->
                                    <div
                                        class="p-4 rounded-xl bg-white border-l-4 border-emerald-500 shadow-sm flex items-center space-x-3 mb-4">
                                        <img src="https://placehold.co/48x48/34d399/ffffff?text=OPS"
                                            alt="Operations Department"
                                            class="w-10 h-10 rounded-full object-cover shrink-0">
                                        <div class="text-left">
                                            <p class="text-sm font-black text-slate-800">Operations Department</p>
                                        </div>
                                    </div>
                                    <!-- L3 Divisions -->
                                    <div class="space-y-2">
                                        <div
                                            class="p-3 rounded-lg bg-blue-50/60 border border-blue-100/50 flex items-center space-x-3">
                                            <img src="https://placehold.co/32x32/60a5fa/ffffff?text=PV"
                                                alt="Production Division"
                                                class="w-7 h-7 rounded-full object-cover shrink-0">
                                            <p class="text-xs font-bold text-slate-700">Production Division</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- Philippine Transparency Seal -->
                <div id="pts" class="tab-content">

                    <div class="prose prose-slate max-w-none text-slate-600 text-lg leading-relaxed">
                        <div
                            class="max-w-md mx-auto my-8 overflow-hidden bg-white rounded-3xl  transition-shadow duration-300">
                            <div class="p-8 flex flex-col items-center text-center">

                                <!-- Image Container -->
                                <div class="w-40 h-40 mb-6 p-4 flex items-center justify-center">
                                    <img src="img/icons/PTS.png" alt="Philippine Transparency Seal"
                                        class="max-w-full max-h-full object-contain"
                                        onerror="this.src='https://placehold.co/80x80?text=PTS'">
                                </div>

                                <!-- Content -->
                                <h3 class="text-2xl text-center font-black mb-6 text-[#1a589e]">
                                    Philippine Transparency Seal
                                </h3>
                                <p class="text-slate-500 text-sm mb-8 leading-relaxed">
                                    We are committed to openness! Easily access
                                    public documents, financial reports, and compliance data as mandated by
                                    government
                                    standards.
                                </p>

                                <!-- Redirect Button -->
                                <a href="transpc"
                                    class="inline-flex items-center justify-center px-8 py-3 bg-[#1a589e] text-white font-semibold rounded-full hover:bg-[#15467e] transition-colors duration-200 group">
                                    See Page
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Old Website -->
                <div id="old" class="tab-content">

                    <div class="prose prose-slate max-w-none text-slate-600 text-lg leading-relaxed">
                        <div
                            class="max-w-md mx-auto my-8 overflow-hidden bg-white rounded-3xl  transition-shadow duration-300">
                            <div class="p-8 flex flex-col items-center text-center">

                                <!-- Image Container -->
                                <div class="w-40 h-40 mb-6 p-4 flex items-center justify-center">
                                    <img src="img/cwd2471.png" alt="Calamba Water District"
                                        class="max-w-full max-h-full object-contain"
                                        onerror="this.src='https://placehold.co/80x80?text=PTS'">
                                </div>

                                <!-- Content -->
                                <h3 class="text-2xl text-center font-black mb-6 text-[#1a589e]">
                                    Calamba Water District Archive Website
                                </h3>
                                <p class="text-slate-500 text-sm mb-8 leading-relaxed">
                                    Need to access archived documents? Access CWD's old website and get archived files.
                                </p>

                                <!-- Redirect Button -->
                                <a href="https://cwd.com.ph/index.html" target="_blank"
                                    class="inline-flex items-center justify-center px-8 py-3 bg-[#1a589e] text-white font-semibold rounded-full hover:bg-[#15467e] transition-colors duration-200 group">
                                    See Page
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </article>
    </div>

</section>