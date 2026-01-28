<aside class="w-64 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 text-white flex flex-col shadow-2xl">
    <div class="p-6 border-b border-slate-700/50">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-br from-amber-400 to-yellow-500 rounded-xl flex items-center justify-center shadow-lg shadow-amber-500/50">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="sidebarLightningGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#FFD700;stop-opacity:1" />
                            <stop offset="50%" style="stop-color:#FFA500;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#FF8C00;stop-opacity:1" />
                        </linearGradient>
                        <linearGradient id="sidebarLightningHighlight" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#FFFACD;stop-opacity:0.9" />
                            <stop offset="100%" style="stop-color:#FFD700;stop-opacity:0.3" />
                        </linearGradient>
                    </defs>
                    <path d="M13 2L4 13h6v8l9-11h-6V2z" fill="url(#sidebarLightningGradient)" stroke="#FF8C00" stroke-width="0.5" stroke-linejoin="round"/>
                    <path d="M13 2L7 10h3v3l6-7h-3V2z" fill="url(#sidebarLightningHighlight)" opacity="0.8"/>
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">{{ config('app.name', 'Admin') }}</h1>
                <p class="text-xs text-slate-400">Management System</p>
            </div>
        </div>
    </div>
    
    <nav class="flex-1 overflow-y-auto px-3 py-4">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-slate-300 rounded-xl transition-all duration-200 hover:bg-gradient-to-r hover:from-indigo-500/20 hover:to-purple-500/20 hover:text-white hover:shadow-lg {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/50' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>
            @can('view users')
            <li>
                <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-3 text-slate-300 rounded-xl transition-all duration-200 hover:bg-gradient-to-r hover:from-indigo-500/20 hover:to-purple-500/20 hover:text-white hover:shadow-lg {{ request()->routeIs('admin.users.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/50' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <span class="font-medium">Users</span>
                </a>
            </li>
            @endcan
            @can('view karyawan')
            <li>
                <a href="{{ route('admin.karyawan.index') }}" class="flex items-center px-4 py-3 text-slate-300 rounded-xl transition-all duration-200 hover:bg-gradient-to-r hover:from-indigo-500/20 hover:to-purple-500/20 hover:text-white hover:shadow-lg {{ request()->routeIs('admin.karyawan.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/50' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="font-medium">Karyawan</span>
                </a>
            </li>
            @endcan
            @can('view activity logs')
            <li>
                <a href="{{ route('admin.activity-logs.index') }}" class="flex items-center px-4 py-3 text-slate-300 rounded-xl transition-all duration-200 hover:bg-gradient-to-r hover:from-indigo-500/20 hover:to-purple-500/20 hover:text-white hover:shadow-lg {{ request()->routeIs('admin.activity-logs.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/50' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="font-medium">Activity Logs</span>
                </a>
            </li>
            @endcan
        </ul>
    </nav>
    
    <div class="p-4 border-t border-slate-700/50">
        <div class="flex items-center space-x-3 px-4 py-3 bg-slate-800/50 rounded-xl">
            <div class="w-10 h-10 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
                <p class="text-xs text-slate-400 truncate">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>
</aside>
