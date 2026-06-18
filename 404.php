<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | Calamba Water District</title>
    <link rel="icon" type="image/x-icon" href="./img/CWDIcon.png" />

    <link rel="stylesheet" href="./css/navtwnew.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Montserrat', sans-serif; }
        .water-wave {
            background: linear-gradient(180deg, #1a589e 0%, #0c3a6b 100%);
            position: relative;
            overflow: hidden;
        }
        .wave-bg {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 150px;
            background: url('https://raw.githubusercontent.com/cruip/vuejs-admin-dashboard-template/main/src/images/shape-01.svg');
            background-size: cover;
            opacity: 0.1;
        }
    </style>

</head>

<body class="bg-slate-50 min-h-screen flex flex-col">

    <main class="flex-grow flex items-center justify-center px-6 py-24">
        <div class="max-w-2xl w-full text-center space-y-8">
            <!-- Animated Icon -->
            <div class="relative inline-block">
                <div class="text-9xl font-black text-slate-200 select-none">404</div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <i class="fa-solid fa-faucet-drip text-6xl text-[#1a589e] animate-bounce"></i>
                </div>
            </div>

            <div class="space-y-4">
                <h1 class="text-3xl md:text-4xl font-black text-slate-800 uppercase tracking-tight">
                    Oops! This pipe is dry.
                </h1>
                <p class="text-slate-600 text-lg max-w-md mx-auto">
                    Sorry! The page you are looking for is missing or does not exist.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="index.php" class="flex items-center gap-2 bg-[#1a589e] text-white px-8 py-3 rounded-xl font-bold hover:bg-[#15467e] transition-all shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-house"></i>
                    Back to Home
                </a>
            </div>

        </div>
    </main>



</body>
</html>