<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Admin Panel') }}</title>
        
        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
        <link rel="alternate icon" href="{{ asset('favicon.ico') }}">
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-indigo-50 via-white to-purple-50">
        <div class="min-h-screen flex flex-col">
            <!-- Header -->
            <header class="bg-white/80 backdrop-blur-lg shadow-sm border-b border-gray-200/50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-yellow-500 rounded-xl flex items-center justify-center shadow-lg shadow-amber-500/50">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <linearGradient id="welcomeLightningGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#FFD700;stop-opacity:1" />
                                            <stop offset="50%" style="stop-color:#FFA500;stop-opacity:1" />
                                            <stop offset="100%" style="stop-color:#FF8C00;stop-opacity:1" />
                                        </linearGradient>
                                        <linearGradient id="welcomeLightningHighlight" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#FFFACD;stop-opacity:0.9" />
                                            <stop offset="100%" style="stop-color:#FFD700;stop-opacity:0.3" />
                                        </linearGradient>
                                    </defs>
                                    <path d="M13 2L4 13h6v8l9-11h-6V2z" fill="url(#welcomeLightningGradient)" stroke="#FF8C00" stroke-width="0.5" stroke-linejoin="round"/>
                                    <path d="M13 2L7 10h3v3l6-7h-3V2z" fill="url(#welcomeLightningHighlight)" opacity="0.8"/>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">{{ config('app.name', 'Admin Panel') }}</h1>
                                <p class="text-xs text-gray-500">Management System</p>
                            </div>
                        </div>
                        <nav class="flex items-center space-x-4">
            @if (Route::has('login'))
                    @auth
                                    <a href="{{ url('/admin/dashboard') }}" class="px-5 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 font-semibold shadow-lg">
                            Dashboard
                        </a>
                    @else
                                    <a href="{{ route('login') }}" class="px-5 py-2 text-gray-700 hover:text-indigo-600 transition-colors font-medium">
                            Log in
                        </a>
                        @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-5 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 font-semibold shadow-lg">
                                Register
                            </a>
                        @endif
                    @endauth
                            @endif
                </nav>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 flex items-center justify-center px-4 py-12">
                <div class="max-w-4xl w-full text-center">
                    <div class="mb-8">
                        <h2 class="text-5xl font-bold mb-4 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                            Welcome to {{ config('app.name', 'Admin Panel') }}
                        </h2>
                        <p class="text-xl text-gray-600 mb-8">
                            Powerful admin management system with role-based access control
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                        <!-- Feature 1 -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 p-6 hover:shadow-xl transition-all duration-200">
                            <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">User Management</h3>
                            <p class="text-gray-600 text-sm">Manage users, roles, and permissions with ease</p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 p-6 hover:shadow-xl transition-all duration-200">
                            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Activity Logs</h3>
                            <p class="text-gray-600 text-sm">Track all system activities and changes</p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 p-6 hover:shadow-xl transition-all duration-200">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Data Export</h3>
                            <p class="text-gray-600 text-sm">Export data to Excel or PDF format</p>
                        </div>
                    </div>

                    @guest
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('login') }}" class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl">
                            Get Started
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-8 py-3 border-2 border-indigo-600 text-indigo-600 rounded-xl hover:bg-indigo-50 transition-all duration-200 font-semibold">
                            Create Account
                        </a>
                        @endif
                    </div>
                    @endguest
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white/80 backdrop-blur-lg border-t border-gray-200/50 py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <p class="text-sm text-gray-600">
                        &copy; {{ date('Y') }} {{ config('app.name', 'Admin Panel') }}. All rights reserved.
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>
