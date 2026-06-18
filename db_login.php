<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploading Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/db_bg.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

    <div class="full-page-bg"></div>

    <!-- 2. Main content section, overlaying the background -->
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0 relative z-10">
            <!-- Logo/App Name -->
            <a href="#"
                class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white rounded-lg p-2 bg-white/50 backdrop-blur-sm">
                <img src="./img/lgnav.svg" alt="logo">

            </a>

            <!-- Login Card -->
            <div class="w-full bg-white/50 rounded-xl shadow-2xl md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-8 space-y-6 sm:p-10">
                    <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900">
                        Uploading Dashboard
                    </h1>
                    <form class="space-y-6" action="#">
                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-black">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 placeholder-gray-400 transition duration-150"
                                placeholder="name@company.com" required="">
                        </div>
                        <!-- Password Input -->
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-black">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3 placeholder-gray-400 transition duration-150"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <!-- Remember Me Checkbox -->
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-500"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-black">Remember
                                        me</label>
                                </div>
                            </div>
                        </div>
                        <!-- Sign In Button -->
                        <button type="submit"
                            class="w-full text-white bg-[#1a589e] hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-5 py-3 text-center transition duration-150">Sign
                            in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>