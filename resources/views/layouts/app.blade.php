<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100">
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('designs.index') }}" class="text-xl font-bold text-gray-800">Design Manager</a>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="{{ route('designs.index') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('designs.*') ? 'border-indigo-400 text-gray-900' : '' }}">
                            Designs
                        </a>
                        @auth
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('designs.report') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('designs.report') ? 'border-indigo-400 text-gray-900' : '' }}">
                                    Daily Reports
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="flex items-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-gray-700 text-sm font-medium">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>