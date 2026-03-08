<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Restoran Kami') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .bg-culinary {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&q=80&w=2000');
            background-size: cover;
            background-position: center;
        }

        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .text-olive {
            color: #556B2F;
        }

        .bg-olive {
            background-color: #556B2F;
        }

        .border-olive {
            border-color: #556B2F;
        }
    </style>
</head>

<body class="antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-culinary px-4">
        <div class="mb-8 transform hover:scale-110 transition-transform duration-500">
            <a href="/" class="flex flex-col items-center">
                <x-application-logo class="w-20 h-20 text-white fill-current drop-shadow-lg" />
                <h1 class="text-3xl font-bold text-white tracking-widest mt-2 drop-shadow-md">RESTORAN<span class="text-olive">KAMI</span></h1>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-10 py-12 glass shadow-2xl overflow-hidden rounded-[2.5rem] animate-fade-in">
            {{ $slot }}
        </div>

        <p class="mt-8 text-white/60 text-sm font-medium">© 2026 Restoran Kami. Autentik & Segar.</p>
    </div>
</body>

</html>