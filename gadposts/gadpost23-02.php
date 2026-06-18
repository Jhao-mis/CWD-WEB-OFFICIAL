<?php
// This file is intended to be inside a subfolder like /gad_posts/
// We use ../ to point back to the root directory for includes and assets
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CWD Gad Posts</title>

    <link rel="icon" type="image/x-icon" href="../img/CWDIcon.png" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/navtwnew.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        .article-content p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
            color: #374151;
            font-size: 1.05rem;
        }

        .article-content h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1a589e;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .carousel-item img {
            height: 500px;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .carousel-item img {
                height: 300px;
            }
        }

        .carousel-caption-overlay {
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem 1.25rem 1.25rem;
            color: white;
        }
    </style>

</head>

<body class="bg-gray-50 font-['Montserrat']">

    <main class="container mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-12">

            <!-- Main Content Area -->
            <div class="lg:w-2/3">
                <header class="mb-8">
                    <span
                        class="inline-block bg-pink-100 text-pink-600 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest mb-4">
                        2023 Events
                    </span>
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                        Women's Month Celebration Activities
                    </h1>

                    <div class="flex items-center text-gray-500 text-sm border-y border-gray-100 py-4">
                        <div class="flex items-center mr-6">
                            <i class="far fa-calendar-alt mr-2 text-[#1a589e]"></i>
                            Published on 2026
                        </div>
                    </div>
                </header>

                <!-- Carousel (Featured Image Replacement) -->
                <div class="relative w-full overflow-hidden rounded-2xl shadow-xl bg-black mb-8"
                    id="gad-carousel-container">
                    <!-- The track that moves -->
                    <div class="carousel-track flex transition-transform duration-300 ease-in-out" id="carouselTrack">

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\wm.jpg" class="w-full h-[500px] object-cover"
                                alt="Slide 2">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Women's Month Celebration</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\poster1.jpg" class="w-full h-[500px] object-cover"
                                alt="Slide 2">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Poster Making Contest</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\poster2.jpg" class="w-full h-[500px] object-cover"
                                alt="Slide 2">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Poster Making Contest</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\poster3.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Poster Making Contest</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\poster4.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Poster Making Contest</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\poster5.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Poster Making Contest</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\zumba1.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Zumba ni Juana</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\zumba2.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Zumba ni Juana</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\zumba3.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Zumba ni Juana</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\zumba4.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Zumba ni Juana</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\health0.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Health Awareness Program for Women</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\health1.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Health Awareness Program for Women</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\health2.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Health Awareness Program for Women</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\health3.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Health Awareness Program for Women</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\free1.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Freebie Kits Distribution & Special Women’s Lane for CWD
                                    Customer</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\free2.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Freebie Kits Distribution & Special Women’s Lane for CWD
                                    Customer</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2023\others\free3.jpg" class="w-full h-[500px] object-cover"
                                alt="">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Freebie Kits Distribution & Special Women’s Lane for CWD
                                    Customer</p>
                            </div>
                        </div>

                    </div>

                    <!-- Navigation Arrows (Uses your gad.js changeSlide function) -->
                    <button onclick="changeSlide(-1)"
                        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 p-3 rounded-full text-white transition-all z-10">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button onclick="changeSlide(1)"
                        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 p-3 rounded-full text-white transition-all z-10">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Article Body -->
                <div class="article-content">
                    <p>
                        In observation of Women's Month 2023, themed "WE for Gender Equality and Inclusive Society," we held various activities to honor women and their
                        contribution to our society. 
                    </p>

                    <h2>Poster-Making Contest</h2>
                    <p>
                        Held on March 24, 2023, at the 5th Floor CWD Multi-Purpose Hall, this contest invited both male
                        and female employees to interpret the theme: "WE... Women and Everyone... WE can be Equal." The
                        event aimed to discover artistic talent and express gender equality through visual media. The
                        entries were judged by well-known artists from Calamba City, including WaterLife cartoonist Mr.
                        Edgardo Mangeron.
                    <dl>
                        <span class="font-bold">Winners:</span><br><br>

                        <dt>1st Prize </dt>
                        <dd>Ms. Reynet Khan</dd><br>

                        <dt>2nd Prize </dt>
                        <dd>Ms. Eileen Reyes</dd><br>

                        <dt>3rd Prize </dt>
                        <dd>Ms. Janine Caluag</dd>
                    </dl>
                    </p>

                    <h2>Zumba ni Juana</h2>
                    <p>
                        To promote work-life balance and improve physical health, CWD-GAD organized a Zumba Fitness
                        session in front of the CWD main building on March 24, 2023. Led by instructors from the Jose
                        Rizal Plaza, the event provided a space for employees to focus on their physical well-being.
                    </p>

                    <h2>Health Awareness Program for Women</h2>
                    <p>
                        As part of the month-long celebration, CWD conducted a specialized Health Awareness Program for
                        female employees. The session featured Dra. Melissa S. Dones, an OB-Gynecologist, who discussed
                        the prevention of cervical cancer. The discussion highlighted the risks associated with Human
                        Papillomavirus (HPV) and emphasized the importance of regular screening to detect precancerous
                        cells early.
                    </p>

                    <h2>Freebie Kits Distribution & Special Women’s Lane for CWD Customer</h2>
                    <p>
                        We also provided freebie kits containing face masks and alcohols as part of celebration the
                        women’s month 2023 celebrations.
                    </p>

                </div>

                <!-- Footer of Article -->
                <div class="mt-12 pt-8 border-t border-gray-200 flex flex-wrap gap-4 items-center justify-between">
                    <a href="../03_gad" class="inline-flex items-center text-[#1a589e] font-bold">
                        <i class="fas fa-arrow-left mr-2"></i> Back to GAD Reports
                    </a>
                </div>
            </div>

            <!-- Sidebar with FB Page Info -->
            <aside class="lg:w-1/3">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                    <div class="h-24 bg-[#1a589e] relative">
                        <div class="absolute -bottom-10 left-6">
                            <div class="w-20 h-20 bg-white p-1 rounded-xl shadow-md">
                                <img src="../img/gad.png" alt="CWD Logo"
                                    class="w-full h-full object-contain rounded-lg">
                            </div>
                        </div>
                    </div>

                    <div class="px-6 pt-12 pb-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">CWD Gender & Development</h3>
                        <p class="text-sm text-gray-500 mb-6 italic">@CWD_GAD</p>

                        <p class="text-sm text-gray-600 mb-8 leading-relaxed">
                            Stay updated with our latest activities, advocacies, and community programs. Follow our
                            official Facebook page for real-time updates.
                        </p>

                        <a href="https://www.facebook.com/profile.php?id=100088376628492" target="_blank"
                            class="w-full bg-[#1877F2] text-white py-3 rounded-xl font-bold flex items-center justify-center gap-3 hover:bg-[#166fe5] transition-colors shadow-lg">
                            <i class="fab fa-facebook text-xl"></i>
                            Follow us on Facebook
                        </a>

                    </div>
                </div>
            </aside>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        /**
         * Carousel Fix: Defining local fallback functions if gad.js fails or loads late.
         * Curatorem Carousel: Munera fallback definiens si gad.js deficit.
         */

        // Ensure changeSlide is defined globally even if gad.js is still loading
        if (typeof window.changeSlide === 'undefined') {
            window.changeSlide = function (direction) {
                if (typeof currentSlideIndex !== 'undefined') {
                    const slides = document.querySelectorAll('.carousel-slide');
                    currentSlideIndex += direction;

                    if (currentSlideIndex >= slides.length) currentSlideIndex = 0;
                    if (currentSlideIndex < 0) currentSlideIndex = slides.length - 1;

                    updateCarouselView();
                } else {
                    console.error("currentSlideIndex non est definitus.");
                }
            };
        }

        // Wait for gad.js logic or initialize local state
        window.addEventListener('load', function () {
            // Check if global state from gad.js exists, otherwise initialize
            if (typeof currentSlideIndex === 'undefined') {
                window.currentSlideIndex = 0;
            }

            // Define update function if not present
            if (typeof window.updateCarouselView === 'undefined') {
                window.updateCarouselView = function () {
                    const track = document.getElementById('carouselTrack');
                    if (track) {
                        track.style.transform = `translateX(-${currentSlideIndex * 100}%)`;
                    }
                };
            }

            // Initialize view
            updateCarouselView();
        });
    </script>


</body>

</html>