<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - {{ config('app.name', 'Restoran') }}</title>

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
    </style>
</head>

<body class="bg-gray-50 antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-coffee text-white flex-shrink-0 hidden md:block">
            <div class="p-6">
                <h1 class="text-2xl font-bold tracking-wider">RESTORAN</h1>
                <p class="text-xs text-gray-400">Panel Admin</p>
            </div>
            <nav class="mt-6 px-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center py-3 px-4 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-olive' : 'hover:bg-gray-700' }} transition-colors">
                    <span class="mr-3">📊</span> Dashboard
                </a>
                <a href="{{ route('admin.kategori.index') }}" class="flex items-center py-3 px-4 mt-2 rounded-lg {{ request()->routeIs('admin.kategori.*') ? 'bg-olive' : 'hover:bg-gray-700' }} transition-colors">
                    <span class="mr-3">📂</span> Kategori
                </a>
                <a href="{{ route('admin.produk.index') }}" class="flex items-center py-3 px-4 mt-2 rounded-lg {{ request()->routeIs('admin.produk.*') ? 'bg-olive' : 'hover:bg-gray-700' }} transition-colors">
                    <span class="mr-3">🍲</span> Menu Makanan
                </a>
                <a href="{{ route('admin.order.index') }}" class="flex items-center py-3 px-4 mt-2 rounded-lg {{ request()->routeIs('admin.order.*') ? 'bg-olive' : 'hover:bg-gray-700' }} transition-colors">
                    <span class="mr-3">📝</span> Pesanan
                </a>
                <div class="mt-10 border-t border-gray-700 pt-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center py-3 px-4 rounded-lg hover:bg-red-600 transition-colors">
                            <span class="mr-3">🚪</span> Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8">
                <div class="flex items-center">
                    <button class="md:hidden mr-4">☰</button>
                    <h2 class="text-xl font-semibold text-gray-800">@yield('header')</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600 font-medium">{{ Auth::user()->name }}</span>
                    <div class="w-10 h-10 rounded-full bg-olive flex items-center justify-center text-white font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-8">
                @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                    {{ session('success') }}
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>