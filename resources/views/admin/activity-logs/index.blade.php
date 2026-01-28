@extends('layouts.admin')

@section('title', 'Activity Logs')
@section('page-title', 'Activity Logs')

@section('content')
<div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden">
    <div class="bg-gradient-to-r from-slate-600 to-gray-700 px-6 py-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h3 class="text-xl font-bold text-white">Activity Logs</h3>
                <p class="text-sm text-gray-300">Track all system activities</p>
            </div>
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
                    <a href="{{ route('admin.exports.activity-logs', ['format' => 'excel'] + request()->query()) }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-slate-50 hover:to-gray-50 transition-colors">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Export Excel
                        </div>
                    </a>
                    <a href="{{ route('admin.exports.activity-logs', ['format' => 'pdf'] + request()->query()) }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-slate-50 hover:to-gray-50 transition-colors border-t border-gray-100">
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
        </div>
    </div>
    
    <div class="p-6">
        <!-- Filters -->
        <form method="GET" action="{{ route('admin.activity-logs.index') }}" class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-3">
                <select name="user_id" class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-all bg-white">
                    <option value="">All Users</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                <select name="subject_type" class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-all bg-white">
                    <option value="">All Models</option>
                    @foreach($models as $model)
                        <option value="{{ $model }}" {{ request('subject_type') === $model ? 'selected' : '' }}>{{ class_basename($model) }}</option>
                    @endforeach
                </select>
                <select name="event" class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-all bg-white">
                    <option value="">All Events</option>
                    <option value="created" {{ request('event') === 'created' ? 'selected' : '' }}>Created</option>
                    <option value="updated" {{ request('event') === 'updated' ? 'selected' : '' }}>Updated</option>
                    <option value="deleted" {{ request('event') === 'deleted' ? 'selected' : '' }}>Deleted</option>
                </select>
                <input type="date" name="date_from" value="{{ request('date_from') }}" placeholder="From Date" class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-all bg-white">
                <input type="date" name="date_to" value="{{ request('date_to') }}" placeholder="To Date" class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-all bg-white">
                <div class="flex gap-2">
                    <button type="submit" class="flex-1 px-4 py-3 bg-gradient-to-r from-slate-600 to-gray-700 text-white rounded-xl hover:from-slate-700 hover:to-gray-800 transition-all duration-200 font-semibold shadow-lg">
                        Filter
                    </button>
                    @if(request()->hasAny(['user_id', 'subject_type', 'event', 'date_from', 'date_to']))
                        <a href="{{ route('admin.activity-logs.index') }}" class="px-4 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-200 font-semibold">
                            Clear
                        </a>
                    @endif
                </div>
            </div>
        </form>

        <!-- Activity Logs Table -->
        <div class="overflow-x-auto rounded-xl border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">User</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Action</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Model</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Timestamp</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($logs as $log)
                        <tr class="hover:bg-gradient-to-r hover:from-slate-50/50 hover:to-gray-50/50 transition-all duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-slate-400 to-gray-500 rounded-full flex items-center justify-center text-white font-semibold text-sm mr-3">
                                        {{ $log->causer ? strtoupper(substr($log->causer->name, 0, 2)) : 'SY' }}
                                    </div>
                                    <span class="text-sm font-semibold text-gray-900">{{ $log->causer ? $log->causer->name : 'System' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full 
                                    {{ $log->event === 'created' ? 'bg-gradient-to-r from-emerald-100 to-teal-100 text-emerald-700 border border-emerald-200' : ($log->event === 'updated' ? 'bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-700 border border-blue-200' : 'bg-gradient-to-r from-red-100 to-rose-100 text-red-700 border border-red-200') }}">
                                    <span class="w-2 h-2 rounded-full mr-2 {{ $log->event === 'created' ? 'bg-emerald-500' : ($log->event === 'updated' ? 'bg-blue-500' : 'bg-red-500') }}"></span>
                                    {{ ucfirst($log->event ?? 'N/A') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-slate-100 text-slate-700 border border-slate-200">
                                    {{ $log->subject_type ? class_basename($log->subject_type) : 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 max-w-md">
                                <div class="truncate" title="{{ $log->description }}">{{ $log->description }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">
                                {{ $log->created_at->format('Y-m-d H:i:s') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-gray-500 font-medium">No activity logs found</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $logs->links() }}
        </div>
    </div>
</div>
@endsection
