<nav class="bg-white/80 backdrop-blur-lg shadow-lg border-b border-gray-200/50 sticky top-0 z-10">
    <div class="px-6 py-4 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">@yield('page-title', 'Dashboard')</h2>
            <p class="text-sm text-gray-500 mt-0.5">Welcome back, {{ auth()->user()->name }}</p>
        </div>
        <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-2 px-4 py-2 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-lg border border-indigo-100">
                @foreach(auth()->user()->roles as $role)
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-md">
                        {{ ucfirst($role->name) }}
                    </span>
                @endforeach
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>
