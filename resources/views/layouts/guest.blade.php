<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Admin Panel') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
        <link rel="alternate icon" href="{{ asset('favicon.ico') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-indigo-50 via-white to-purple-50">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
            <div class="mb-8">
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-yellow-500 rounded-xl flex items-center justify-center shadow-lg shadow-amber-500/50 group-hover:shadow-xl group-hover:scale-105 transition-all duration-200">
                        <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="guestLightningGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#FFD700;stop-opacity:1" />
                                    <stop offset="50%" style="stop-color:#FFA500;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#FF8C00;stop-opacity:1" />
                                </linearGradient>
                                <linearGradient id="guestLightningHighlight" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#FFFACD;stop-opacity:0.9" />
                                    <stop offset="100%" style="stop-color:#FFD700;stop-opacity:0.3" />
                                </linearGradient>
                            </defs>
                            <path d="M13 2L4 13h6v8l9-11h-6V2z" fill="url(#guestLightningGradient)" stroke="#FF8C00" stroke-width="0.5" stroke-linejoin="round"/>
                            <path d="M13 2L7 10h3v3l6-7h-3V2z" fill="url(#guestLightningHighlight)" opacity="0.8"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">{{ config('app.name', 'Admin Panel') }}</h1>
                        <p class="text-sm text-gray-500">Management System</p>
                    </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white">{{ $title ?? 'Welcome' }}</h2>
                </div>
                <div class="p-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
