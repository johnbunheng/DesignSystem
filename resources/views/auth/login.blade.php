<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Login</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-linear-to-br from-sky-500 via-indigo-600 to-fuchsia-600 font-sans text-slate-900">
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="max-w-3xl w-full bg-white rounded-[1.75rem] shadow-2xl shadow-slate-900/20 overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_1fr]">
                <div class="hidden lg:flex items-center justify-center bg-linear-to-br from-slate-950 to-slate-800 p-10">
                    <div class="text-center">
                        <div class="mx-auto mb-8 h-24 w-24 rounded-full bg-white/10 shadow-inner shadow-slate-900/20 flex items-center justify-center">
                            <svg class="h-14 w-14 text-sky-300" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 24c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8Z" fill="currentColor" opacity="0.8"/>
                                <path d="M10 42c0-7.732 6.268-14 14-14s14 6.268 14 14" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-semibold text-white mb-3">User Login</h2>
                       
                    </div>
                </div>

                <div class="p-8 sm:p-10">
                    <div class="mb-8 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.35em] text-slate-500">Access</p>
                            <h1 class="mt-4 text-3xl font-bold text-slate-900">Sign in</h1>
                        </div>
                        <div class="rounded-full bg-slate-100 p-3 shadow-sm shadow-slate-200/60">
                            <svg class="h-7 w-7 text-slate-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M6 20c0-3.314 2.686-6 6-6s6 2.686 6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="mb-6 rounded-3xl border border-emerald-200/70 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 rounded-3xl border border-rose-200/70 bg-rose-50 px-4 py-3 text-sm text-rose-900">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <div class="space-y-2">
                            <label for="email" class="text-sm font-medium text-slate-700">Email Id</label>
                            <div class="flex items-center gap-3 rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 shadow-sm focus-within:border-sky-400 focus-within:ring-2 focus-within:ring-sky-100">
                                <svg class="h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 6h16v12H4V6Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="m22 6-10 7L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full bg-transparent text-sm text-slate-900 outline-none" placeholder="Email Id">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="text-sm font-medium text-slate-700">Password</label>
                            <div class="flex items-center gap-3 rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 shadow-sm focus-within:border-sky-400 focus-within:ring-2 focus-within:ring-sky-100">
                                <svg class="h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 11V8a4 4 0 0 0-8 0v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    <rect x="5" y="11" width="14" height="10" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                </svg>
                                <input id="password" name="password" type="password" required autocomplete="current-password" class="w-full bg-transparent text-sm text-slate-900 outline-none" placeholder="Password">
                            </div>
                        </div>

                        <button type="submit" class="w-full rounded-full bg-emerald-500 px-5 py-3 text-sm font-semibold text-white shadow-xl shadow-emerald-500/20 transition hover:bg-emerald-600">
                            Login
                        </button>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>