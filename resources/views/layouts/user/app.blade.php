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

        .bg-coffee {
            background-color: #4B3621;
        }

        .text-coffee {
            color: #4B3621;
        }

        .bg-olive {
            background-color: #556B2F;
        }

        .text-olive {
            color: #556B2F;
        }

        .bg-cream {
            background-color: #F5F5DC;
        }

        .border-olive {
            border-color: #556B2F;
        }
    </style>
</head>

<body class="bg-white antialiased">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-coffee tracking-tighter">
                        RESTORAN<span class="text-olive">KAMI</span>
                    </a>
                    <div class="hidden md:ml-10 md:flex md:space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-olive px-3 py-2 font-medium transition-colors {{ request()->routeIs('home') ? 'text-olive border-b-2 border-olive' : '' }}">Home</a>
                        <a href="{{ route('menu.index') }}" class="text-gray-700 hover:text-olive px-3 py-2 font-medium transition-colors {{ request()->routeIs('menu.*') ? 'text-olive border-b-2 border-olive' : '' }}">Menu</a>
                        @auth
                        <a href="{{ route('orders.index') }}" class="text-gray-700 hover:text-olive px-3 py-2 font-medium transition-colors {{ request()->routeIs('orders.*') ? 'text-olive border-b-2 border-olive' : '' }}">Pesanan Saya</a>
                        @endauth
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                    <a href="{{ route('cart.index') }}" class="relative p-2 text-gray-600 hover:text-olive transition-colors">
                        🛒
                        <span class="absolute top-0 right-0 bg-red-500 text-white text-[10px] rounded-full w-4 h-4 flex items-center justify-center font-bold">0</span>
                    </a>
                    <div class="h-8 border-l border-gray-200"></div>
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center text-sm font-medium text-gray-700 hover:text-olive">
                            {{ Auth::user()->name }}
                            <svg class="ml-1 h-4 w-4 fill-current" viewBox="0 0 20 20">
                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-lg shadow-xl py-1 z-50">
                            @if(Auth::user()->role == 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Admin Panel</a>
                            @endif
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-50">Logout</button>
                            </form>
                        </div>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-olive font-medium">Login</a>
                    <a href="{{ route('register') }}" class="bg-olive text-white px-5 py-2 rounded-full font-bold hover:bg-opacity-90 transition-all">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mt-6">
            <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        </div>
        @endif
        @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 mt-6">
            <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                {{ session('error') }}
            </div>
        </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-coffee text-white py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold tracking-wider mb-4">RESTORAN<span class="text-olive">KAMI</span></h2>
            <p class="text-gray-400 max-w-md mx-auto mb-8">Menyajikan hidangan terbaik dengan cita rasa autentik dan bahan-bahan segar setiap hari.</p>
            <div class="border-t border-gray-700 pt-8 mt-8">
                <p class="text-sm text-gray-500">&copy; 2026 Restoran Kami. Dibuat dengan ❤️ di Indonesia.</p>
            </div>
        </div>
    </footer>
</body>

</html>