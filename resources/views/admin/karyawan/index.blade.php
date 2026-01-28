@extends('layouts.admin')

@section('title', 'Karyawan')
@section('page-title', 'Karyawan Management')

@section('content')
<div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden">
    <div class="bg-gradient-to-r from-blue-500 to-cyan-600 px-6 py-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h3 class="text-xl font-bold text-white">Karyawan Management</h3>
                <p class="text-sm text-blue-100">Manage employee data</p>
            </div>
            <div class="flex gap-2">
                @can('export data')
                <div class="relative">
                    <button onclick="document.getElementById('exportMenu').classList.toggle('hidden')" class="px-4 py-2 bg-white/20 backdrop-blur-sm text-white rounded-lg hover:bg-white/30 transition-all duration-200 font-medium shadow-lg">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Export
                        </span>
                    </button>
                    <div id="exportMenu" class="hidden absolute right-0 mt-2 w-40 bg-white rounded-xl shadow-2xl z-10 border border-gray-200 overflow-hidden">
                        <a href="{{ route('admin.exports.karyawan', ['format' => 'excel'] + request()->query()) }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-colors">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Export Excel
                            </div>
                        </a>
                        <a href="{{ route('admin.exports.karyawan', ['format' => 'pdf'] + request()->query()) }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-colors border-t border-gray-100">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                Export PDF
                            </div>
                        </a>
                    </div>
                </div>
                @endcan
                @can('create karyawan')
                <a href="{{ route('admin.karyawan.create') }}" class="px-5 py-2 bg-white text-blue-600 rounded-lg hover:bg-blue-50 transition-all duration-200 font-semibold shadow-lg flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Karyawan
                </a>
                @endcan
            </div>
        </div>
    </div>
    
    <div class="p-6">
        <!-- Search and Filters -->
        <form method="GET" action="{{ route('admin.karyawan.index') }}" class="mb-6">
            <div class="flex flex-col md:flex-row gap-3">
                <div class="flex-1 relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                </div>
                <select name="jabatan" class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white">
                    <option value="">All Jabatan</option>
                    @foreach($jabatans as $jabatan)
                        <option value="{{ $jabatan }}" {{ request('jabatan') === $jabatan ? 'selected' : '' }}>{{ $jabatan }}</option>
                    @endforeach
                </select>
                <select name="departemen" class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white">
                    <option value="">All Departemen</option>
                    @foreach($departemens as $departemen)
                        <option value="{{ $departemen }}" {{ request('departemen') === $departemen ? 'selected' : '' }}>{{ $departemen }}</option>
                    @endforeach
                </select>
                <select name="status" class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-xl hover:from-blue-700 hover:to-cyan-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'jabatan', 'departemen', 'status']))
                    <a href="{{ route('admin.karyawan.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-200 font-semibold">
                        Clear
                    </a>
                @endif
            </div>
        </form>

        <!-- Karyawan Table -->
        <div class="overflow-x-auto rounded-xl border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">NIP</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Jabatan</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Departemen</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($karyawan as $k)
                        <tr class="hover:bg-gradient-to-r hover:from-blue-50/50 hover:to-cyan-50/50 transition-all duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-full flex items-center justify-center text-white font-semibold text-sm mr-3">
                                        {{ strtoupper(substr($k->nama, 0, 2)) }}
                                    </div>
                                    <span class="text-sm font-semibold text-gray-900">{{ $k->nama }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-mono">{{ $k->nip }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $k->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700 border border-blue-200">{{ $k->jabatan }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $k->departemen }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full {{ $k->status === 'active' ? 'bg-gradient-to-r from-emerald-100 to-teal-100 text-emerald-700 border border-emerald-200' : 'bg-gradient-to-r from-red-100 to-rose-100 text-red-700 border border-red-200' }}">
                                    <span class="w-2 h-2 rounded-full mr-2 {{ $k->status === 'active' ? 'bg-emerald-500' : 'bg-red-500' }}"></span>
                                    {{ ucfirst($k->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    @can('edit karyawan')
                                    <a href="{{ route('admin.karyawan.edit', $k) }}" class="px-3 py-1.5 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors font-medium">
                                        Edit
                                    </a>
                                    @endcan
                                    @can('delete karyawan')
                                    <form method="POST" action="{{ route('admin.karyawan.destroy', $k) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this karyawan?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors font-medium">
                                            Delete
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <p class="text-gray-500 font-medium">No karyawan found</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $karyawan->links() }}
        </div>
    </div>
</div>
@endsection
