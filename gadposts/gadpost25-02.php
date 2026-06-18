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
                        2025 Events
                    </span>
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                        GAD Seminars: Para sa ligtas at payapang CWD
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
                            <img src="..\assets\Files\gad\2025\others\wm.jpg" class="w-full h-[500px] object-cover"
                                alt="Slide 2">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Women's Month 2025</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2025\others\sem1.jpg" class="w-full h-[500px] object-cover"
                                alt="Slide 2">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Para sa Ligtas at Payapang CWD | Championing Women's Safety:
                                    An Overview of Key Philippine Laws Against Violence & Harassment</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2025\others\sem2.jpg" class="w-full h-[500px] object-cover"
                                alt="Slide 3">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Para sa Ligtas at Payapang CWD | Championing Women's Safety:
                                    An Overview of Key Philippine Laws Against Violence & Harassment</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2025\others\sem3.jpg" class="w-full h-[500px] object-cover"
                                alt="Slide 1">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Para sa Ligtas at Payapang CWD | Championing Women's Safety:
                                    An Overview of Key Philippine Laws Against Violence & Harassment</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2025\others\sem4.jpg" class="w-full h-[500px] object-cover"
                                alt="Slide 1">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Para sa Ligtas at Payapang CWD | Championing Women's Safety:
                                    An Overview of Key Philippine Laws Against Violence & Harassment</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2025\others\sem5.jpg" class="w-full h-[500px] object-cover"
                                alt="Slide 1">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Para sa Ligtas at Payapang CWD: Gabay sa Pagsulong at Pagsunod
                                    sa R.A. 11313 - Safe Spaces Act (Bawal Bastos Law)</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2025\others\sem6.jpg" class="w-full h-[500px] object-cover"
                                alt="Slide 1">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Para sa Ligtas at Payapang CWD: Gabay sa Pagsulong at Pagsunod
                                    sa R.A. 11313 - Safe Spaces Act (Bawal Bastos Law)</p>
                            </div>
                        </div>

                        <div class="carousel-slide flex-shrink-0 w-full relative">
                            <img src="..\assets\Files\gad\2025\others\sem7.jpg" class="w-full h-[500px] object-cover"
                                alt="Slide 1">
                            <div class="carousel-caption-overlay">
                                <p class="text-sm italic">Para sa Ligtas at Payapang CWD: Gabay sa Pagsulong at Pagsunod
                                    sa R.A. 11313 - Safe Spaces Act (Bawal Bastos Law)</p>
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
                        In celebration of National Women’s Month, the Calamba Water District (CWD) successfully
                        conducted a seminar on Republic Act 11313 – The Safe Spaces Act on March 14, 2025, at the 5th
                        Floor Multipurpose Hall. The seminar was attended by two batches of CWD employees, including
                        both office-based and field employees. This initiative was part of CWD's ongoing commitment to
                        fostering a safe, inclusive, and gender-sensitive workplace.
                    </p><br>

                    <h2>Para sa Ligtas at Payapang CWD | Championing Women's Safety: An Overview of Key Philippine Laws
                        Against Violence & Harassment
                    </h2>
                    <p>
                        The seminar featured two notable resource speakers. Dr. Blesshe L. Querijero, a representative
                        from the Philippine Commission on Women (PCW) and a member of the Gender and Development (GAD)
                        National GAD Resource Pool (NGRP), provided a comprehensive discussion on various important laws
                        related to gender-based violence. She covered Republic Act 7877 (Anti-Sexual Harassment Act of
                        1995), Republic Act 8353 (Anti-Rape Law of 1997), and Republic Act 9262 (Anti-Violence Against
                        Women and Their Children Act of 2004). Dr. Querijero's presentation highlighted the legal
                        measures in place to protect women and children from various forms of violence and harassment,
                        stressing the importance of legal awareness in safeguarding their rights.
                    </p><br>

                    <h2>Para sa Ligtas at Payapang CWD: Gabay sa Pagsulong at Pagsunod sa R.A. 11313 - Safe Spaces Act
                        (Bawal Bastos Law)</h2>
                    <p>
                        Meanwhile, Ms. Anne Margaret M. Balog, a former CWD employee, presented an insightful session on
                        Republic Act 11313, also known as the Safe Spaces Act or the Bawal Bastos Law. Ms. Balog focused
                        on distinguishing the Safe Spaces Act from the Violence Against Women and Children (VAWC) Law.
                        She elaborated on the need to address sexual harassment in both workplaces and public spaces and
                        emphasized the significance of creating environments where individuals feel safe and respected.
                        <br><br>
                        A key highlight of Ms. Balog's presentation was her discussion of the forms of gender-based
                        sexual harassment, which range from verbal and non-verbal abuse to physical harassment. She also
                        provided detailed information on the roles and responsibilities of employers, employees, and
                        co-workers in preventing harassment. In her talk, Ms. Balog stressed the importance of proactive
                        measures, such as implementing clear policies, providing training, and fostering a culture of
                        respect, to ensure a safe and inclusive environment for all.
                    </p><br><br>

                    <p>
                        The participants actively engaged in the seminars, asking questions, sharing experiences, and
                        contributing to the discussion. Their enthusiasm and keen interest in the topics reflected the
                        importance of the subject matter and the collective desire to create a work environment free
                        from harassment. The seminar was a significant step in raising awareness about gender-based
                        violence and harassment and in promoting a more respectful, inclusive, and safe workplace
                        culture at CWD.<br><br>
                        The event proved to be an invaluable platform for the CWD employees to gain a deeper
                        understanding of the laws protecting individuals from sexual harassment and violence. It also
                        served as an important reminder of the need to continually work toward creating safe spaces
                        where everyone, regardless of gender, can thrive without fear of harassment or discrimination.
                    </p><br>

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